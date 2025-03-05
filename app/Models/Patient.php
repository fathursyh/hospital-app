<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /** @use HasFactory<\Database\Factories\PatientFactory> */
    use HasFactory;
    use HasUuids;
    protected $primaryKey = 'id_patient';
    protected $fillable = [
        'fullname',
        'email',
        'date',
        'gender',
        'phone',
        'address',
        'reason',
        'status',
    ];

}
