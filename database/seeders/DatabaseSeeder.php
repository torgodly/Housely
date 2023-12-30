<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
//    /**
//     * Seed the application's database.
//     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();
//        Utility::factory(100)->create();
//
////        create 10 estate and attach 5 utilities to each one with random quantity
//        Estate::factory(100)->create()->each(function ($estate) {
//            $utilities = Utility::all()->random(5)->pluck('id');
//            $estate->utilities()->attach($utilities, ['quantity' => rand(1, 8)]);
//            $images = \App\Models\Image::factory(5)->create(
//                [
//                    'estate_id' => $estate->id,
//
//                ]
//            );
//        });
////        create 10 orders
//        \App\Models\Order::factory(500)->create();


        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'role' => 'admin',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'user@user.com',
        ]);
    }
}
