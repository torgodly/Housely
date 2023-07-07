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
            $table->string('title');
            $table->string('type');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->float('land_area');
            $table->float('building_area');
            $table->string('long');
            $table->string('lat');
            $table->integer('price');
            $table->float('discount')->nullable();
            $table->float('commission')->default(0);
            $table->integer('floors')->nullable();
            $table->integer('year_built')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1);
            $table->string('company');
            //TODO: add  estate rent or sale boolean field
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
