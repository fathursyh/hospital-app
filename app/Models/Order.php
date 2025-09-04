<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'admin_id',
        'hospital_id',
        'plan_id',
        'amount',
        'order_date',
        'status',
    ];

    protected $casts = [
        'order_date' => 'datetime',
    ];

    // An order is placed by one admin (a User).
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    // An order is for one hospital.
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    // An order is for one specific plan.
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
