<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Controlversion;
use Carbon\Carbon;

class ControlversionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        // Insertamos los control version stacks manualmente
        Controlversion::create(['controlversion' => 'Git', 'created_at' => $now, 'updated_at' => $now]);
        Controlversion::create(['controlversion' => 'GitHub', 'created_at' => $now, 'updated_at' => $now]);
        Controlversion::create(['controlversion' => 'SVN', 'created_at' => $now, 'updated_at' => $now]);
        Controlversion::create(['controlversion' => 'Mercurial', 'created_at' => $now, 'updated_at' => $now]);
        Controlversion::create(['controlversion' => 'Perforce', 'created_at' => $now, 'updated_at' => $now]);
        Controlversion::create(['controlversion' => 'Bazaar', 'created_at' => $now, 'updated_at' => $now]);
        Controlversion::create(['controlversion' => 'TFS', 'created_at' => $now, 'updated_at' => $now]);
        Controlversion::create(['controlversion' => 'CVS', 'created_at' => $now, 'updated_at' => $now]);
        Controlversion::create(['controlversion' => 'Fossil', 'created_at' => $now, 'updated_at' => $now]);
    }
}

