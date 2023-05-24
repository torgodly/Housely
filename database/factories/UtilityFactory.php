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
        $utility = ["Bathroom", "Kitchen", "Living Room", "Bedroom", "Garage", "Laundry Room", "Pool", "Garden", "Patio", "Attic", "Basement", "Closet", "Den", "Dining Room", "Foyer", "Home Office", "Mudroom", "Playroom"];
        return [
            'name' => $this->faker->unique()->randomElement($utility),
        ];
    }
}
