<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserTeam;

class UserTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserTeam::factory()->count(25)->create();
    }
}

