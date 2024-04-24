<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'lastname' => 'required|string',
        'email' => 'required|email|unique:users',
        // Quita la regla de validación requerida para el campo 'password'
        //'password' => 'nullable|string',
        'role_id' => 'required|exists:roles,id',
        'bootcamp_id' => 'required|exists:bootcamps,id',
        'active' => 'required|boolean',
    ]);

    // Crear el usuario
    $user = User::create($request->all());

    // Alimentar las relaciones muchos a muchos
    $user->backendTechnologies()->attach($request->backendtechnology, ['level_id' => $request->backend_level]);
    $user->frontendTechnologies()->attach($request->frontendtechnology, ['level_id' => $request->frontend_level]);
    $user->controlVersions()->attach($request->controlversion, ['level_id' => $request->version_control_level]);

    return response()->json($user, 201);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // Cargar solo las relaciones necesarias
        $user->load([
            'backendTechnologies:id,backendtechnology',
            'frontendTechnologies:id,frontendtechnology',
            'controlVersions:id,controlversion',
        ]);
    
        // Retorna solo los datos específicos que necesitas
        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'bootcamp_name' => $user->bootcamp->bootcamp, // Obtener el nombre del bootcamp
                'backend_technologies' => $user->backendTechnologies,
                'frontend_technologies' => $user->frontendTechnologies,
                'control_versions' => $user->controlVersions,
            ]
        ], 200);
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string',
            'role_id' => 'required|exists:roles,id',
            'bootcamp_id' => 'required|exists:bootcamps,id',
            'active' => 'required|boolean',
        ]);

        $user->update($request->all());

        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
