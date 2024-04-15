<?php

namespace Database\Factories;

use App\Models\Frontendtechnology;
use Illuminate\Database\Eloquent\Factories\Factory;

class FrontendtechnologyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Frontendtechnology::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Array de tecnologías de frontend
        $technologies = ['React', 'Angular', 'Vue.js', 'Ember.js', 'Backbone.js', 'Svelte', 'Bootstrap', 'Foundation'];

        // Seleccionar una tecnología al azar del array
        $technology = $this->faker->randomElement($technologies);

        return [
            'frontendtechnology' => $technology,
        ];
    }
}


