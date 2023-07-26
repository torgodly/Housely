<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;

    protected $guarded = [];
//    protected $with = ['utilities:id,name,estate_utility.quantity', 'images'];

    public function utilities()
    {
        return $this->belongsToMany(Utility::class)->withPivot('quantity');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    //check if this estate is favorite for this user
    public function isFavorited()
    {
        return $this->favoritedBy()->where('user_id', auth()->id())->exists();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
