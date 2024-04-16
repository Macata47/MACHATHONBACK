<?php

namespace App\Http\Controllers\Api;

use App\Models\UserTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userTeams = UserTeam::all();
        return response()->json($userTeams);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'team_id' => 'required|exists:teams,id',
        ]);

        $userTeam = UserTeam::create($request->all());

        return response()->json($userTeam, 201);
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

