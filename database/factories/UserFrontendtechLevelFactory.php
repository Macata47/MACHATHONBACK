<?php

namespace Database\Factories;

use App\Models\UserFrontendtechLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFrontendtechLevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserFrontendtechLevel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory()->create()->id,
            'frontendtechnology_id' => \App\Models\Frontendtechnology::factory()->create()->id,
            'level_id' => \App\Models\Level::factory()->create()->id,
        ];
    }
}
