<?php

namespace App\Http\Controllers\API;

use App\Models\UserBackendtechLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserBackendtechLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userBackendtechLevels = UserBackendtechLevel::all();
        return response()->json($userBackendtechLevels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'backend_technologies' => 'required|array',
            'backend_technologies.*' => 'exists:backend_technologies,id',
            'levels' => 'required|array',
            'levels.*' => 'required|integer|min:1|max:3',
        ]);


        $data = $request->only(['backend_technologies', 'levels']);


        foreach ($data['backend_technologies'] as $key => $backendTechnologyId) {
            $user->backendTechnologies()->attach($backendTechnologyId, ['level_id' => $data['levels'][$key]]);
        }

        return response()->json(['message' => 'Registros creados correctamente'], 201);
    }
}
