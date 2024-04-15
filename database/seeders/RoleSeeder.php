<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear el rol "admin"
        Role::factory()->create(['role' => 'admin']);

        // Crear otros roles (en este caso, 199 roles de tipo "coder")
        Role::factory()->count(199)->create();
    }
}

