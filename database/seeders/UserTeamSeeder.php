<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserTeam;
use App\Models\Team;

class UserTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener los equipos en orden descendente
        $teams = Team::orderBy('id', 'desc')->get();

        // Crear usuarios para cada equipo
        $teams->each(function ($team) {
            UserTeam::factory()->count(8)->create(['team_id' => $team->id]);
        });
    }
}
