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

        $teams = Team::orderBy('id', 'desc')->get();


        $teams->each(function ($team) {
            UserTeam::factory()->count(8)->create(['team_id' => $team->id]);
        });
    }
}
