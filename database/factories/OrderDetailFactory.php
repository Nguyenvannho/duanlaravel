<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'=>$this->faker->product_id,
            'order_id' => $this->faker->order_id,
            'quantity' => $this->faker->quantity,
            'total' =>$this->faker->total,
          
        ];
    }
}
