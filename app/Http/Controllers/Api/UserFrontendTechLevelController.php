<?php

namespace App\Http\Controllers\Api;

use App\Models\UserFrontendTechLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserFrontendTechLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userFrontendTechLevels = UserFrontendTechLevel::all();
        return response()->json($userFrontendTechLevels);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'frontend_technologies' => 'required|array',
            'frontend_technologies.*' => 'exists:frontend_technologies,id',
            'levels' => 'required|array',
            'levels.*' => 'required|integer|min:1|max:3',
        ]);


        $data = $request->only(['frontend_technologies', 'levels']);


        foreach ($data['frontend_technologies'] as $key => $frontendTechnologyId) {
            $user->frontendTechnologies()->attach($frontendTechnologyId, ['level_id' => $data['levels'][$key]]);
        }

        return response()->json(['message' => 'Registros creados correctamente'], 201);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userFrontendTechLevel = UserFrontendTechLevel::findOrFail($id);
        return response()->json($userFrontendTechLevel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userFrontendTechLevel = UserFrontendTechLevel::findOrFail($id);

        $request->validate([
            // Aquí puedes agregar validaciones si es necesario
        ]);

        $userFrontendTechLevel->update($request->all());

        return response()->json($userFrontendTechLevel, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userFrontendTechLevel = UserFrontendTechLevel::findOrFail($id);
        $userFrontendTechLevel->delete();

        return response()->json(null, 204);
    }
}
