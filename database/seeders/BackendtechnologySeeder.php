<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backendtechnology;

class BackendtechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Backendtechnology::factory()->count(10)->create();
    }
}

