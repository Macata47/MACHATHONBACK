<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return response()->json($teams);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'team' => 'required|string|unique:teams',
        ]);

        $team = Team::create($request->all());

        return response()->json($team, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = Team::findOrFail($id);
        return response()->json($team);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail($id);

        $request->validate([
            'team' => 'required|string|unique:teams,team,' . $team->id,
        ]);

        $team->update($request->all());

        return response()->json($team, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return response()->json(null, 204);
    }
}
