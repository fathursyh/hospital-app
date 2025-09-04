<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasUuids;
    protected $fillable = [
        'doctor_id',
        'hospital_id',
        'salary',
        'bonus',
        'deductions',
        'pay_date',
        'status',
    ];

    // A payroll record belongs to one doctor.
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // A payroll record is issued by one hospital.
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
