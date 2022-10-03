<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'ct_id' => rand(1, 10),
            'name' => fake()->name(),
            'image' => 'hinh'.rand(1, 5).'.jpg',
            'gia' => rand(10000, 50000),
            'gia_km' => rand(10000, 50000),
            'description' =>fake()->name(),
            // 'model' => fake()->unique()->safeEmail(),
            // 'produce_on' => now(),
        ];
    }
}