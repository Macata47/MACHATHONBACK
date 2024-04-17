<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
use Carbon\Carbon;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Insertamos los niveles manualmente
        Level::create(['level' => 'Senior', 'created_at' => $now, 'updated_at' => $now]);
        Level::create(['level' => 'Mid', 'created_at' => $now, 'updated_at' => $now]);
        Level::create(['level' => 'Junior', 'created_at' => $now, 'updated_at' => $now]);
       
    }
}

