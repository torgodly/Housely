<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function estates()
    {
        return $this->belongsToMany(Estate::class)->withPivot('quantity');
    }
}
