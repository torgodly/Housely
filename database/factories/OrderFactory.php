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
            'code' => uniqid('order-', false),
            'estate_id' => $this->faker->numberBetween(1, 100),
            'phone_number' => $this->faker->phoneNumber,
        ];
    }
}
