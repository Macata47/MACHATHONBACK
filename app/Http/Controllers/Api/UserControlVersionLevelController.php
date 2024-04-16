<?php

namespace App\Http\Controllers\Api;

use App\Models\UserControlversionLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function store(Request $request)
    {
        $request->validate([
            // Aquí puedes agregar validaciones si es necesario
        ]);

        $userControlversionLevel = UserControlversionLevel::create($request->all());

        return response()->json($userControlversionLevel, 201);
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
