<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageUrl = sprintf('https://picsum.photos/1024/683');
        $imageContents = file_get_contents($imageUrl);
        $imageName = $this->faker->uuid . '.jpg';
        $imagePath = 'public/estates/' . $imageName;

// Download the image and store it locally
        Storage::put($imagePath, $imageContents);

        // Create a new image record in the database
        return [
            'path' => $imageName,
        ];
    }
}
