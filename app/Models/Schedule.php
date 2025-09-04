<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'doctor_id',
        'hospital_id',
        'day_of_week',
        'start_time',
        'end_time',
        'is_available',
    ];

    // A schedule belongs to one doctor.
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // A schedule belongs to one hospital.
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
