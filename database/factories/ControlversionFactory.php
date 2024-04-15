<?php

namespace Database\Factories;

use App\Models\Controlversion;
use Illuminate\Database\Eloquent\Factories\Factory;

class ControlversionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Controlversion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Array de nombres de versiones de control
        $versions = ['Git', 'Github', 'SVN', 'Mercurial', 'Perforce', 'Bazaar', 'TFS', 'CVS', 'Fossil'];

        // Seleccionar una versión al azar del array
        $version = $this->faker->randomElement($versions);

        return [
            'controlversion' => $version,
        ];
    }
}




