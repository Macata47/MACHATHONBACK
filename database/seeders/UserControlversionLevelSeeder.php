<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserControlversionLevel;

class UserControlversionLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserControlversionLevel::factory()->count(10)->create();
    }
}
