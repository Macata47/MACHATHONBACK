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
        // Obtén todos los IDs de los bootcamps disponibles
        $bootcampIds = \App\Models\Bootcamp::pluck('id')->toArray();

        return [
            'name' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$uzrqB2btMk8E3iAVH/bbq.wv0dWsb42noGw6YIwrK/y3B4GoKlCYS', // password
            // Asigna aleatoriamente el ID del rol "coder"
            'role_id' => \App\Models\Role::where('role', 'coder')->first()->id,
            // Asigna aleatoriamente el bootcamp_id de entre los disponibles
            'bootcamp_id' => $this->faker->randomElement($bootcampIds),
            'active' => $this->faker->boolean
        ];
    }

    /**
     * Indica al factory que el bootcamp_id puede ser especificado manualmente.
     *
     * @param int $bootcampId
     * @return UserFactory
     */
    public function withBootcampId($bootcampId)
    {
        return $this->state(function (array $attributes) use ($bootcampId) {
            return [
                'bootcamp_id' => $bootcampId,
            ];
        });
    }
}



