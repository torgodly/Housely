<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estate>
 */
class EstateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $propertyTypes = ['منزل', 'شقة', 'عقار تجاري'];
        $addresses = [
            '23 شارع الفتح',
            '14 شارع عمر المختار',
            '5 طريق طرابلس',
            '22 بوليفارد بنغازي',
            '10 طريق القرقارش'
        ];
        $cities = ['طرابلس', 'بنغازي', 'مصراتة', 'ترهونة', 'الزاوية'];
        $country = 'ليبيا';

        $landArea = $this->faker->randomFloat(2, 100, 1000);
        $buildingArea = round($landArea * 0.75, 2); // Set building area to 3/4 of land area

        return [
            'type' => $this->faker->randomElement($propertyTypes),
            'address' => $this->faker->randomElement($addresses),
            'city' => $this->faker->randomElement($cities),
            'country' => $country,
            'land_area' => $landArea,
            'building_area' => $buildingArea,
            'price' => $this->faker->randomFloat(2, 10000, 1000000),
            'status' => $this->faker->boolean(),
        ];
    }
}
