<?php

namespace App\Http\Controllers\API;

use App\Models\UserBackendtechLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function store(Request $request)
    {
        $request->validate([
            // Aquí podrías agregar validaciones si fuera necesario
        ]);

        $userBackendtechLevel = UserBackendtechLevel::create($request->all());

        return response()->json($userBackendtechLevel, 201);
    }

    // No se implementan los métodos show, update y destroy, ya que
    // generalmente no se realizan operaciones CRUD directamente en una tabla pivote.
    // Si necesitas estas funcionalidades, se deberían aplicar a los modelos relacionados.
}

