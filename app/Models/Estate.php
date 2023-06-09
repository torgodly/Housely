<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'address',
        'city',
        'country',
        'land_area',
        'building_area',
        'price',
        'status',
        'longitude',
        'latitude',
    ];
    protected $with = ['utilities:id,name,estate_utility.quantity', 'images'];

    public function utilities()
    {
        return $this->belongsToMany(Utility::class)->withPivot('quantity');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
