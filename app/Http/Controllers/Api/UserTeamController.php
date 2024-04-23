<?php

namespace App\Http\Controllers\Api;

use App\Models\UserTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Obtener todos los UserTeam con sus usuarios asociados
    $userTeams = DB::table('users_teams')
                    ->join('users', 'users_teams.user_id', '=', 'users.id')
                    ->select('users_teams.team_id', 'users.id as user_id', 'users.name')
                    ->get();

    // Crear un array para almacenar los resultados
    $results = [];

    // Iterar sobre los resultados para agrupar los usuarios por equipo
    foreach ($userTeams as $userTeam) {
        // Verificar si ya existe una entrada para este team_id en los resultados
        if (!array_key_exists($userTeam->team_id, $results)) {
            // Si no existe, creamos una nueva entrada para este team_id
            $results[$userTeam->team_id] = [
                'team_id' => $userTeam->team_id,
                'users' => []
            ];
        }

        // Agregar el nombre del usuario al array de usuarios del equipo correspondiente
        $results[$userTeam->team_id]['users'][] = [
            'user_id' => $userTeam->user_id,
            'name' => $userTeam->name
        ];
    }

    // Retornar la respuesta JSON
    return response()->json(array_values($results));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // Validar los datos recibidos en la solicitud
      $request->validate([
        'user_id' => 'required|integer', // Valida que el campo 'user_id' sea requerido y que sea un entero
        'team_id' => 'required|integer', // Valida que el campo 'team_id' sea requerido y que sea un entero
      ]);
    
      // Crear una nueva entrada en la tabla pivot con los datos proporcionados en la solicitud
      UserTeam::create([
        'user_id' => $request->user_id,
        'team_id' => $request->team_id,
      ]);
    
      // Devolver una respuesta con el código de estado 201 (Created)
      return response()->json([], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userTeam = UserTeam::findOrFail($id);
        return response()->json($userTeam);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userTeam = UserTeam::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'team_id' => 'required|exists:teams,id',
        ]);

        $userTeam->update($request->all());

        return response()->json($userTeam, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userTeam = UserTeam::findOrFail($id);
        $userTeam->delete();

        return response()->json(null, 204);
    }
}

