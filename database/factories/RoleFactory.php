<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Genera el rol "admin" como el primer registro y "coder" para el resto
        static $adminCreated = false;

        return [
            'role' => $adminCreated ? 'coder' : 'admin',
        ];
    }
}

