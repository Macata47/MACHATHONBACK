<?php

namespace Database\Factories;

use App\Models\UserControlversionLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserControlversionLevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserControlversionLevel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory()->create()->id,
            'controlversion_id' => \App\Models\Controlversion::factory()->create()->id,
            'level_id' => \App\Models\Level::factory()->create()->id,
        ];
    }
}

