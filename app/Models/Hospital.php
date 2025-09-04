<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //
    use HasUuids;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'admin_id',
        'subscription_status',
    ];

    // A hospital is managed by one admin (a User).
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    // A hospital has many users associated with it (admins, doctors).
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // A hospital has many doctors.
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    // A hospital has many patients.
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
