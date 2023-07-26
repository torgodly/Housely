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
        $propertyTypes = ['house', 'apartment', 'villa', 'land', 'office', 'shop', 'warehouse', 'farm', 'building', 'hotel', 'motel', 'hostel', 'resort', 'restaurant', 'cafe', 'factory', 'clinic', 'hospital', 'school', 'university', 'library', 'mosque', 'church', 'temple', 'synagogue', 'castle', 'palace', 'museum', 'theater', 'cinema', 'gym', 'stadium', 'park', 'zoo', 'amusement park', 'casino', 'gas station', 'airport', 'port', 'train station', 'bus station', 'subway station', 'taxi stand', 'car rental', 'car repair', 'car wash', 'parking', 'bank', 'atm', 'post office', 'police', 'fire station', 'hospital', 'pharmacy', 'supermarket', 'shopping mall', 'clothing store', 'jewelry store', 'pet store', 'book store', 'bicycle store', 'hardware store', 'furniture store', 'electronics store', 'florist', 'liquor store', 'shoe store', 'convenience store', 'department store', 'home goods store', 'store', 'school', 'library', 'university', 'hospital', 'pharmacy', 'gym', 'stadium', 'park', 'zoo', 'amusement park', 'casino', 'gas station', 'airport', 'port', 'train station', 'bus station', 'subway station', 'taxi stand', 'car rental', 'car repair', 'car wash', 'parking', 'bank', 'atm', 'post office', 'police', 'fire station', 'hospital', 'pharmacy', 'supermarket', 'shopping mall', 'clothing store', 'jewelry store', 'pet store', 'book store', 'bicycle store', 'hardware store', 'furniture store', 'electronics store', 'florist', 'liquor store', 'shoe store', 'convenience store', 'department store', 'home goods store', 'store'];
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
            'title' => $this->faker->sentence(3),
            'type' => $this->faker->randomElement($propertyTypes),
            'address' => $this->faker->randomElement($addresses),
            'city' => $this->faker->randomElement($cities),
            'country' => $country,
            'land_area' => $landArea,
            'building_area' => $buildingArea,
            'price' => $this->faker->numberBetween(100000, 1000000),
            'status' => $this->faker->boolean(),
            'long' => $this->faker->longitude(),
            'lat' => $this->faker->latitude(),
            'description' => $this->faker->paragraph(3),
            'floors' => $this->faker->numberBetween(1, 10),
//            'year_built' => $this->faker->numberBetween(1990, 2021),
            'discount' => $this->faker->numberBetween(1, 10),
            'commission' => $this->faker->numberBetween(1, 10),
            'company' => $this->faker->company(),
            'bedrooms' => $this->faker->numberBetween(1, 10),
            'bathrooms' => $this->faker->numberBetween(1, 10),


        ];
    }
}
