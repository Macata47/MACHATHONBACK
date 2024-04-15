<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Frontendtechnology;

class FrontendtechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Frontendtechnology::factory()->count(10)->create();
    }
}

