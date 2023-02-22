<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'name' => $this->faker->name(),
        'price' => $this->faker->randomDigit(),
        'amount' => 1,
        'category_id' => 1,
        'description' => $this->faker->text(),
        'image' => $this->faker->image(),
        'size' => $this->faker->randomDigit(),
        'color' => $this->faker->randomDigit(),
    ];
}

}
