<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Backendtechnology;
use App\Models\Level;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserBackendTechLevelSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create(); // Creamos una instancia de Faker

        // Obtener todos los IDs de los usuarios, tecnologías backend y niveles
        $userIds = User::pluck('id')->toArray();
        $backendTechIds = Backendtechnology::pluck('id')->toArray();
        $levelIds = Level::pluck('id')->toArray();

        // Iterar para crear relaciones
        foreach ($userIds as $userId) {
            $backendTechId = $faker->randomElement($backendTechIds);
            $levelId = $faker->randomElement($levelIds);

            // Insertar en la tabla pivot
            DB::table('users_backendtech_levels')->insert([
                'user_id' => $userId,
                'backendtechnology_id' => $backendTechId,
                'level_id' => $levelId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

