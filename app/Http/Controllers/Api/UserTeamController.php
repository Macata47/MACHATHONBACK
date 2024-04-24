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

        $userTeams = DB::table('users_teams')
            ->join('users', 'users_teams.user_id', '=', 'users.id')
            ->select('users_teams.team_id', 'users.id as user_id', 'users.name')
            ->get();


        $results = [];


        foreach ($userTeams as $userTeam) {

            if (!array_key_exists($userTeam->team_id, $results)) {

                $results[$userTeam->team_id] = [
                    'team_id' => $userTeam->team_id,
                    'users' => []
                ];
            }


            $results[$userTeam->team_id]['users'][] = [
                'user_id' => $userTeam->user_id,
                'name' => $userTeam->name
            ];
        }


        return response()->json(array_values($results));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required|integer',
            'team_id' => 'required|integer',
        ]);


        UserTeam::create([
            'user_id' => $request->user_id,
            'team_id' => $request->team_id,
        ]);


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
