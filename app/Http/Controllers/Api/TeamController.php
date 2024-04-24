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
    // Obtener todos los equipos con los usuarios asociados y sus respectivas tecnologías y versiones de control
    $teamsWithUsers = Team::with(['users' => function ($query) {
        // Cargar las relaciones necesarias para cada usuario
        $query->with([
            'backendTechnologies' => function ($query) {
                $query->select('id', 'backendtechnology');
            },
            'frontendTechnologies' => function ($query) {
                $query->select('id', 'frontendtechnology');
            },
            'controlVersions' => function ($query) {
                $query->select('id', 'controlversion');
            },
            'bootcamp:id,bootcamp',
        ])->select('id', 'name'); // Seleccionar solo los campos necesarios para cada usuario
    }])->get();

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
            // Eliminar equipos existentes
            Team::truncate();

            $minParticipants = $request->input('minParticipants');
            $maxParticipants = $request->input('maxParticipants');

            // Obtener usuarios senior en backendtech, frontendtech y control de versiones
            $backendSeniors = User::whereHas('backendTechnologies', function ($query) {
                $query->where('level_id', 1); 
            })->get();

            $frontendSeniors = User::whereHas('frontendTechnologies', function ($query) {
                $query->where('level_id', 1); 
            })->get();

            $versionControlSeniors = User::whereHas('controlVersions', function ($query) {
                $query->where('level_id', 1);
            })->get();

            // Asignar usuarios senior a los equipos en rondas
            $teams = collect();
            $seniors = [$backendSeniors, $frontendSeniors, $versionControlSeniors];

            foreach ($seniors as $seniorType) {
                foreach ($seniorType as $senior) {
                    // Obtener un equipo al azar o crear uno nuevo si no existe
                    $randomTeam = Team::inRandomOrder()->firstOrCreate([]);

                    // Verificar si el usuario ya está asociado al equipo con este nivel
                    if (!$randomTeam->users()->where('user_id', $senior->id)->wherePivot('level_id', $senior->pivot->level_id)->exists()) {
                        // Asociar al usuario al equipo con este nivel
                        $randomTeam->users()->attach($senior, ['level_id' => $senior->pivot->level_id]);
                    }
                    // Agregar el equipo a la colección
                    $teams->push($randomTeam);
                }
            }

            // Obtener los IDs de los usuarios en los equipos
            $teamUserIds = $teams->pluck('users')->flatten()->pluck('id')->toArray();

            // Obtener los usuarios que no están en los equipos
            $remainingUsers = User::whereNotIn('id', $teamUserIds)->get();

            // Asignar los usuarios restantes a los equipos
            foreach ($remainingUsers as $user) {
                // Obtener un equipo al azar
                $randomTeam = $teams->random();

                // Verificar el tamaño del equipo
                $teamSize = $randomTeam->users()->count();

                // Verificar si el equipo ya alcanzó el límite máximo de participantes
                if ($teamSize < $maxParticipants) {
                    // Asociar al usuario al equipo
                    $randomTeam->users()->attach($user);
                } else {
                    // Si el equipo está lleno, crear un nuevo equipo
                    $newTeam = Team::create(['team' => 'Nuevo Equipo']);
                    $newTeam->users()->attach($user);
                    $teams->push($newTeam);
                }
            }

            // Almacenar equipos en la base de datos
            foreach ($teams as $team) {
                $team->save();
            }

            // Cargar los usuarios asociados a cada equipo y devolverlos en la respuesta
            $teamsWithUsers = Team::with('users')->get();

            return response()->json(['message' => 'Equipos creados exitosamente', 'teams' => $teamsWithUsers], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear equipos: ' . $e->getMessage()], 500);
        }
    }
}




    // public function deleteAll()
    // {
    //     try {
    //         Team::truncate(); // Eliminar todos los registros de la tabla teams
    //         return response()->json(['message' => 'Todos los equipos han sido eliminados correctamente'], 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'Error al eliminar equipos: ' . $e->getMessage()], 500);
    //     }
    // }


