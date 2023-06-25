<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Estate;
use App\Models\Utility;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
//        Utility::factory(8)->create();
//
//        //create 10 estate and attach 5 utilities to each one with random quantity
//        Estate::factory(100)->create()->each(function ($estate) {
//            $utilities = Utility::all()->random(5)->pluck('id');
//            $estate->utilities()->attach($utilities, ['quantity' => rand(1, 5)]);
//            $images = \App\Models\Image::factory(5)->create(
//                [
//                    'estate_id' => $estate->id,
//
//                ]
//            );
//        });


//
         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'admin@admin.com',
         ]);
    }
}
