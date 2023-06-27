<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_number',
        'estate_id',
        'phone_number',
    ];

    public function estate()
    {
        return $this->belongsTo(Estate::class);
    }
}
