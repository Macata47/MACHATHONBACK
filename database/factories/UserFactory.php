<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$uzrqB2btMk8E3iAVH/bbq.wv0dWsb42noGw6YIwrK/y3B4GoKlCYS', // password
            // Obtener el ID del rol existente "admin" o "coder"
            'role_id' => \App\Models\Role::where('role', 'admin')->orWhere('role', 'coder')->first()->id,
            'bootcamp_id' => \App\Models\Bootcamp::factory()->create()->id,
            'active' => $this->faker->boolean
        ];
    }
}


