<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserFrontendtechLevel;

class UserFrontendtechLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserFrontendtechLevel::factory()->count(10)->create();
    }
}
