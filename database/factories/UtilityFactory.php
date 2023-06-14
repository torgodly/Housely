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
        $utility = ["bathroom", "kitchen", "Living Room", "bedroom", "garage", "laundry Room", "storage Room", "outdoor Space"];
        return [
            'name' => $this->faker->unique()->randomElement($utility),
        ];
    }
}
