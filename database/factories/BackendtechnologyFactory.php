<?php

namespace Database\Factories;

use App\Models\Backendtechnology;
use Illuminate\Database\Eloquent\Factories\Factory;

class BackendtechnologyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Backendtechnology::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Array de tecnologías de backend
        $technologies = ['Node.js', 'Python', 'Ruby on Rails', 'Django', 'Laravel', 'Express.js', 'Spring Boot', 'Flask', 'ASP.NET'];

        // Seleccionar una tecnología al azar del array
        $technology = $this->faker->randomElement($technologies);

        return [
            'backendtechnology' => $technology,
        ];
    }
}

