<?php

namespace App\Http\Controllers\Api;

use App\Models\UserControlversionLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserControlversionLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userControlversionLevels = UserControlversionLevel::all();
        return response()->json($userControlversionLevels);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'control_versions' => 'required|array',
            'control_versions.*' => 'exists:control_versions,id',
            'levels' => 'required|array',
            'levels.*' => 'required|integer|min:1|max:3', // Ajusta los límites según tus necesidades
        ]);
    
        // Obtener los datos del formulario
        $data = $request->only(['control_versions', 'levels']);
    
        // Crear registros en la tabla pivot
        foreach ($data['control_versions'] as $key => $controlVersionId) {
            $user->controlVersions()->attach($controlVersionId, ['level_id' => $data['levels'][$key]]);
        }
    
        return response()->json(['message' => 'Registros creados correctamente'], 201);
    }
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userControlversionLevel = UserControlversionLevel::findOrFail($id);
        return response()->json($userControlversionLevel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userControlversionLevel = UserControlversionLevel::findOrFail($id);

        $request->validate([
            // Aquí puedes agregar validaciones si es necesario
        ]);

        $userControlversionLevel->update($request->all());

        return response()->json($userControlversionLevel, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userControlversionLevel = UserControlversionLevel::findOrFail($id);
        $userControlversionLevel->delete();

        return response()->json(null, 204);
    }
}
