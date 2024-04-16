<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        // ID del rol "coder"
        $coderRoleId = \App\Models\Role::where('role', 'coder')->value('id');

        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Utiliza la función bcrypt para cifrar la contraseña
            'role_id' => $coderRoleId, // Establecer el ID del rol "coder"
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
