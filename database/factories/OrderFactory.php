<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'quantity' => $this->faker->randomNumber(2),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'image' => $this->faker->image(),
            // $table->integer('quantity');
            // $table->longText('note');
            // $table->text('address');
            // $table->string('phone');
            // $table->string('color');
            // $table->string('name');
        ];
    }
}
