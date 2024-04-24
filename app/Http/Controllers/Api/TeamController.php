<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los equipos con los usuarios asociados
        $teamsWithUsers = Team::with('users')->get();

        return response()->json($teamsWithUsers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teams = $request->input('teams');

        try {
            foreach ($teams as $teamData) {
                $team = new Team();
                $team->team = $teamData['team']; // Se accede al nombre del equipo dentro del arreglo

                // Obtener los IDs de los usuarios para este equipo
                $userIds = $teamData['users'];

                // Asociar usuarios al equipo
                $team->save(); // Guardar el equipo primero para obtener el ID
                $team->users()->attach($userIds);

                $team->save();
            }

            // Cargar los usuarios asociados a cada equipo y devolverlos en la respuesta
            $teamsWithUsers = Team::with('users')->get();

            return response()->json(['message' => 'Equipos almacenados exitosamente', 'teams' => $teamsWithUsers], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al almacenar equipos: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Create teams based on specified criteria.
     */
    public function createTeams(Request $request)
    {
        try {

            Team::truncate();

            $minParticipants = $request->input('minParticipants');
            $maxParticipants = $request->input('maxParticipants');


            $backendSeniors = User::whereHas('backendTechnologies', function ($query) {
                $query->where('level_id', 1);
            })->get();

            $frontendSeniors = User::whereHas('frontendTechnologies', function ($query) {
                $query->where('level_id', 1);
            })->get();

            $versionControlSeniors = User::whereHas('controlVersions', function ($query) {
                $query->where('level_id', 1);
            })->get();


            $teams = collect();
            $seniors = [$backendSeniors, $frontendSeniors, $versionControlSeniors];

            foreach ($seniors as $seniorType) {
                foreach ($seniorType as $senior) {

                    $randomTeam = Team::inRandomOrder()->firstOrCreate([]);


                    if (!$randomTeam->users()->where('user_id', $senior->id)->wherePivot('level_id', $senior->pivot->level_id)->exists()) {

                        $randomTeam->users()->attach($senior, ['level_id' => $senior->pivot->level_id]);
                    }

                    $teams->push($randomTeam);
                }
            }


            $teamUserIds = $teams->pluck('users')->flatten()->pluck('id')->toArray();


            $remainingUsers = User::whereNotIn('id', $teamUserIds)->get();


            foreach ($remainingUsers as $user) {

                $randomTeam = $teams->random();


                $teamSize = $randomTeam->users()->count();


                if ($teamSize < $maxParticipants) {

                    $randomTeam->users()->attach($user);
                } else {

                    $newTeam = Team::create(['team' => 'Nuevo Equipo']);
                    $newTeam->users()->attach($user);
                    $teams->push($newTeam);
                }
            }


            foreach ($teams as $team) {
                $team->save();
            }


            $teamsWithUsers = Team::with('users')->get();

            return response()->json(['message' => 'Equipos creados exitosamente', 'teams' => $teamsWithUsers], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear equipos: ' . $e->getMessage()], 500);
        }
    }
}
