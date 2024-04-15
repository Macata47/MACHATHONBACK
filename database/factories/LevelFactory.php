<?php

namespace Database\Factories;

use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Level::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Array de nombres de niveles
        $levels = ['Beginner', 'Intermediate', 'Advanced'];

        // Seleccionar un nivel al azar del array
        $level = $this->faker->randomElement($levels);

        return [
            'level' => $level,
        ];
    }
}

