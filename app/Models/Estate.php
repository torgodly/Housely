<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Estate extends Model
{
    use HasFactory;

    protected $guarded = [];

//    protected $with = ['utilities:id,name,estate_utility.quantity', 'images'];


    public
    function utilities()
    {
        return $this->belongsToMany(Utility::class)->withPivot('quantity');
    }

    public
    function images()
    {
        return $this->hasMany(Image::class);
    }

    public
    function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    //check if this estate is favorite for this user
    public
    function isFavorited()
    {
        return $this->favoritedBy()->where('user_id', auth()->id())->exists();
    }

    public
    function orders()
    {
        return $this->hasMany(Order::class);
    }

//scop get only the estate with available true and if available is false sold_at must be less than 24 hours from now
    public
    function scopeAvailable($query)
    {
        return $query->where('available', true)->orWhere('sold_at', '>', now()->subHours(24));
    }

    protected static function booted() {
        static::addGlobalScope('available', function (Builder $builder) {
            $builder->where(function($query) {
                $query->where('available', true)
                    ->orWhere(function($query) {
                        $query->where('available', false)
                            ->where('sold_at', '<=', now()->addHour(24));
                    });
            });
        });
    }

}
