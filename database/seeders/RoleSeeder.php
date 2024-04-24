<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('roles')->insert([
            ['role' => 'Admin', 'created_at' => $now, 'updated_at' => $now],
            ['role' => 'Coder', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}


