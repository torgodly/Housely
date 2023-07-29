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

        //search
        Builder::macro('search', function ($fields, $string) {
            return $string ? $this->where(function ($query) use ($fields, $string) {
                foreach ($fields as $field) {
                    $query->orWhere($field, 'like', $string . '%');
                }
            }) : $this;
        });


        Builder::macro('wherePrice', function ($MinPrice, $MaxPrice) {
            return $MinPrice != null && $MaxPrice != null ? $this->whereBetween('price', [$MinPrice, $MaxPrice]) : $this;
        });


        Builder::macro('whereArea', function ($MinArea, $MaxArea) {
            return $MinArea != null && $MaxArea != null ? $this->whereBetween('land_area', [$MinArea, $MaxArea]) : $this;
        });

        //create macro to get all estates with utility named Bedroom and has qunaity of 3
        Builder::macro('whereBedroom', function ($bedroom) {
            return $bedroom != null ? $this->where('bedrooms', $bedroom) : $this;
        });

        //create macro to get all estates with utility named Bathroom and has qunaity of 3
        Builder::macro('whereBathroom', function ($bathroom) {
            return $bathroom != null ? $this->where('bathrooms', $bathroom) : $this;
        });

        //create macro to get estates with no commission
        Builder::macro('whereNoCommission', function ($noCommission) {
            return $noCommission != null ? $this->where('commission', 0) : $this;
        });
        //create macro to get estates with  discount
        Builder::macro('whereDiscount', function ($discount) {
            return $discount != null ? $this->where('discount', '>', 0) : $this;
        });

        //create macro to get estates with  floors count
        Builder::macro('whereFloors', function ($floors) {
            return $floors != null ? $this->where('floors', $floors) : $this;
        });


        //create macro to get estates with  Type
        Builder::macro('whereType', function ($type) {
            return $type != null ? $this->where('type', $type) : $this;
        });

        //create macro to get estates that hass the givien utlitys ids
        Builder::macro('whereUtilities', function ($utilities) {
            return $utilities !== null ? $this->where(function ($query) use ($utilities) {
                foreach ($utilities as $utilityId) {
                    $query->whereHas('utilities', function ($subQuery) use ($utilityId) {
                        $subQuery->where('utility_id', $utilityId);
                    });
                }
            }) : $this;
        });


        //create macro to get estates by given city
        Builder::macro('whereCity', function ($city) {
            return $city != null ? $this->where('city', $city) : $this;
        });

        //create macro to get estates by given Country
        Builder::macro('whereCountry', function ($country) {
            return $country != null ? $this->where('country', $country) : $this;
        });




    }
}
