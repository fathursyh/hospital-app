<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorLog extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorLogFactory> */
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'id_doctor',
        'id_patient',
        'finished_at',
        'status',
    ];

    public function doctor() {
        return $this->belongsTo(User::class);
    }
    public function patient() {
        return $this->hasOne(Patient::class);
    }
}
