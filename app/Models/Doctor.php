<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'hospital_id',
        'specialization',
        'phone',
    ];

    // A doctor profile belongs to a single user account.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A doctor works at one hospital.
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    // A doctor has many schedules.
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    // A doctor has many appointments.
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // A doctor has many payroll records.
    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
}
