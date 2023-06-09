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
//        Estate::factory(10)->create();
        Utility::factory(8)->create();


         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'admin@admin.com',
         ]);
    }
}
