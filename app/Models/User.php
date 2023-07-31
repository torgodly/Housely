<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function favorites()
    {
        return $this->belongsToMany(Estate::class, 'favorites')->withTimestamps();
    }

    //is admin
    public function getIsAdminAttribute()
    {
        return $this->role === 'admin';
    }

    //orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    //check if user has ordered an estate
    public function hasOrdered(Estate $estate)
    {
        return $this->orders()->where('estate_id', $estate->id)->exists();
    }


}
