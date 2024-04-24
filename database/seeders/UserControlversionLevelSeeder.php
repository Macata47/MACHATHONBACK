<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ControlVersion;
use App\Models\Level;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserControlVersionLevelSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create(); // Creamos una instancia de Faker

        // Obtener todos los IDs de los usuarios, versiones de control y niveles
        $userIds = User::pluck('id')->toArray();
        $controlVersionIds = ControlVersion::pluck('id')->toArray();
        $levelIds = Level::pluck('id')->toArray();

        // Iterar para crear relaciones
        foreach ($userIds as $userId) {
            $controlVersionId = $faker->randomElement($controlVersionIds);
            $levelId = $faker->randomElement($levelIds);

            // Insertar en la tabla pivot
            DB::table('users_control_versiones_levels')->insert([
                'user_id' => $userId,
                'controlversion_id' => $controlVersionId,
                'level_id' => $levelId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
