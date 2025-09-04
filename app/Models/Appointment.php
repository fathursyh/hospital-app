<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'hospital_id',
        'appointment_date',
        'appointment_time',
        'reason',
        'status',
    ];

    // An appointment belongs to one patient.
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // An appointment is with one doctor.
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // An appointment belongs to one hospital.
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
