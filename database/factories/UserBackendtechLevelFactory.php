<?php

namespace Database\Factories;

use App\Models\UserBackendtechLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserBackendtechLevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserBackendtechLevel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory()->create()->id,
            'backendtechnology_id' => \App\Models\Backendtechnology::factory()->create()->id,
            'level_id' => \App\Models\Level::factory()->create()->id,
        ];
    }
}

