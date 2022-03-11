<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'image' => null,
            'price' => $this->faker->numberBetween(0, 999000000),
            'mortgage_status' => $this->faker->boolean(),
            'description' => $this->faker->paragraph()
        ];
    }
}
