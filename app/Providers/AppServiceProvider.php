<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::macro('wherePrice', function ($MinPrice, $MaxPrice) {
            return $MinPrice != null && $MaxPrice != null ? $this->whereBetween('price', [$MinPrice, $MaxPrice]) : $this;
        });


        Builder::macro('whereArea', function ($MinArea, $MaxArea) {
            return $MinArea != null && $MaxArea != null ? $this->whereBetween('land_area', [$MinArea, $MaxArea]) : $this;
        });


    }
}
