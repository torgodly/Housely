<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utility>
 */
class UtilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $utility = ["Bathroom", "Kitchen", "Living Room", "Bedroom", "Garage", "Laundry Room", "Storage Room", "Outdoor Space"];
        return [
            'name' => $this->faker->unique()->randomElement($utility),
        ];
    }
}
