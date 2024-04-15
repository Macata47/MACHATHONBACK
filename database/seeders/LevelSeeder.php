<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;


class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Level::factory()->create(['level' =>'Senior']);
       Level::factory()->create(['level' =>'Mind']);
       Level::factory()->create(['level' =>'Junior']);
       
    }
}

