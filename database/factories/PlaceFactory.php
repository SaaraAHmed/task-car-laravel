<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => fake()->imageUrl(800,600),
            'exploreTitle' => fake()->company(),
            'from' => fake()->boolean(),
            'to' => fake()->boolean(),
            'description' => fake()->text(),
            'category_id' => fake()->numberBetween($min=1,$max=2),

            // 'shortDescription' => fake()->text(),
        ];
    }

}
