<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'hospital_id',
        'name',
        'date_of_birth',
        'gender',
        'contact',
        'address',
        'medical_history',
    ];

    // A patient belongs to one hospital.
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    // A patient can have many appointments.
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
