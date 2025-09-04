<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    private const ROLE_SUPERADMIN = 'superadmin';
    private const ROLE_ADMIN = 'admin';
    private const ROLE_DOCTOR = 'doctor';
    private const ROLE_PATIENT = 'patient';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'hospital_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function hasAnyRole($roles)
    {
        return in_array($this->role, $roles);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

      public function doctorProfile()
    {
        return $this->hasOne(Doctor::class);
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
