<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();

// Identity
            $table->string('title');
            $table->string('address');
            $table->string('city');
            $table->string('country');

// Location
            $table->string('lat');
            $table->string('long');

// Details
            $table->string('type');
            $table->float('land_area');
            $table->float('building_area');
            $table->integer('floors');
            $table->integer('bedrooms');
            $table->integer('bathrooms');

// Pricing
            $table->integer('price');
            $table->float('discount')->nullable();
            $table->float('commission')->default(0);

// Status
            $table->boolean('available')->default(true);
            $table->timestamp('sold_at')->nullable();

// Description
            $table->text('description')->nullable();

// Metadata
            $table->string('company');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estates');
    }
};
