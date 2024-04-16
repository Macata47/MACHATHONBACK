<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bootcamp;
use Carbon\Carbon;

class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        
        Bootcamp::create(['bootcamp' => 'AST_FEM', 'created_at' => $now, 'updated_at' => $now]);
        Bootcamp::create(['bootcamp' => 'BARC_FEM', 'created_at' => $now, 'updated_at' => $now]);
        Bootcamp::create(['bootcamp' => 'RURAL', 'created_at' => $now, 'updated_at' => $now]);
        Bootcamp::create(['bootcamp' => 'GIJÓN', 'created_at' => $now, 'updated_at' => $now]);
        Bootcamp::create(['bootcamp' => 'MALG_FEM', 'created_at' => $now, 'updated_at' => $now]);
        Bootcamp::create(['bootcamp' => 'MAD_FULL', 'created_at' => $now, 'updated_at' => $now]);
        Bootcamp::create(['bootcamp' => 'MAD_FULL', 'created_at' => $now, 'updated_at' => $now]);
        Bootcamp::create(['bootcamp' => 'BARC_FULL', 'created_at' => $now, 'updated_at' => $now]);
        Bootcamp::create(['bootcamp' => 'MALG_FULL', 'created_at' => $now, 'updated_at' => $now]);
    }
}

