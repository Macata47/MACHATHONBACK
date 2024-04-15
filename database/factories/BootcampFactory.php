<?php

namespace Database\Factories;

use App\Models\Bootcamp;
use Illuminate\Database\Eloquent\Factories\Factory;

class BootcampFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bootcamp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Array de nombres de ciudades españolas
        $cities = ['Barcelona', 'Madrid', 'Málaga', 'Valencia', 'Sevilla', 'Bilbao', 'Granada', 'Gijón', 'Oviedo', 'Alicante', 'Córdoba', 'Toledo', 'Zaragoza', 'Santiago de Compostela', 'Pamplona', 'Cádiz', 'Valladolid', 'Salamanca', 'Murcia', 'San Sebastián', 'Cáceres', 'Logroño', 'Almería', 'Badajoz'];

        // Seleccionar una ciudad al azar del array
        $city = $this->faker->randomElement($cities);

        return [
            'bootcamp' => $city,
        ];
    }
}



