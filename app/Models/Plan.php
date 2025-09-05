<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'features',
    ];

    protected $casts = [
        'features' => 'array', // Automatically cast JSON to array
    ];

    // A plan can be part of many orders.
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
