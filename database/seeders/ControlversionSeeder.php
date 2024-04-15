<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Controlversion;

class ControlversionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Controlversion::factory()->count(10)->create();
    }
}

