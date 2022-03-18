<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'productname' => $this->faker->words(3, true),
            'price' => $this->faker->numberBetween(50, 200),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text(),
        ];
    }
}
