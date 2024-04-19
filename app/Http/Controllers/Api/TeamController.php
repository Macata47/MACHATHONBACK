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
        $teams = Team::all();
        return response()->json($teams);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     return Team::create($request->all());
    // }

    public function store(Request $request)
    {
        $teamNames = $request->input('teams');

        // Iterar sobre los nombres de los equipos y almacenarlos en la base de datos
        foreach ($teamNames as $teamName) {
            Team::create(['team' => $teamName]);
        }

        return response()->json(['message' => 'Equipos almacenados exitosamente'], 201);
    }


    public function createTeams(Request $request)
{
    // Obtener el número mínimo y máximo de participantes por equipo
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

            // Verificar si el usuario ya está asociado al equipo
            if (!$randomTeam->users()->where('user_id', $senior->id)->exists()) {
                // Asignar al usuario al equipo
                $randomTeam->users()->attach($senior);
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
    $this->assignRemainingUsers($remainingUsers, $teams, $minParticipants, $maxParticipants);

    // Almacenar equipos en la base de datos
    foreach ($teams as $team) {
        $team->save();
    }

    return response()->json(['message' => 'Equipos creados exitosamente', 'teams' => $teams], 200);
}

    private function assignUserToTeam($user, $team)
    {
        // Verificar si el usuario ya está asignado a algún equipo
        if ($user->team) {
            return null;
        }
    
        // Asignar el usuario al equipo y crear la relación pivot
        $team->users()->attach($user->id);
    
        // Retornar el equipo actualizado
        return $team;
    }
    

    private function assignRemainingUsers($users, $teams, $minParticipants, $maxParticipants)
{
    $usersArray = $users->toArray(); // Convertir la colección de usuarios a un array

    foreach ($usersArray as $user) {
        $team = $teams->random();
        $teamSize = $team->users()->count();
        if ($teamSize < $maxParticipants) {
            // Asignar al usuario al equipo y actualizar el equipo
            $updatedTeam = $this->assignUserToTeam($user, $team);
            // Si el equipo se actualiza correctamente, asignarlo al array de equipos
            if ($updatedTeam) {
                $teams->push($updatedTeam);
            }
        }
    }

    foreach ($teams as $team) {
        $teamSize = $team->users()->count();
        $additionalUsersNeeded = $minParticipants - $teamSize;
        if ($additionalUsersNeeded > 0) {
            // Utilizar array_splice para extraer usuarios del array de usuarios restantes
            $additionalUsers = array_splice($usersArray, 0, $additionalUsersNeeded);
            foreach ($additionalUsers as $user) {
                // Asignar al usuario al equipo y actualizar el equipo
                $updatedTeam = $this->assignUserToTeam($user, $team);
                // Si el equipo se actualiza correctamente, asignarlo al array de equipos
                if ($updatedTeam) {
                    $teams->push($updatedTeam);
                }
            }
        }
    }
}
}