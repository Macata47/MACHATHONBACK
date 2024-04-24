<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Frontendtechnology;
use App\Models\Level;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserFrontendTechLevelSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();


        $userIds = User::pluck('id')->toArray();
        $frontendTechIds = Frontendtechnology::pluck('id')->toArray();
        $levelIds = Level::pluck('id')->toArray();


        foreach ($userIds as $userId) {
            $frontendTechId = $faker->randomElement($frontendTechIds);
            $levelId = $faker->randomElement($levelIds);


            DB::table('users_frontendtech_levels')->insert([
                'user_id' => $userId,
                'frontendtechnology_id' => $frontendTechId,
                'level_id' => $levelId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
