<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Treatment extends Model
{
    use HasFactory;
    protected $fillabe = [
        'service_id',
        'doctor_id',
        'patient_id',
        'today',
        'total',
        'paid_up',
        'rest',
        'notes',
        'next_visit'

    ];

    public function service() : HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function doctor() : HasMany
    {
        return $this->hasMany(Doctor::class);
    }

    public function patient() : HasOne
    {
        return $this->hasOne(Patient::class);
    }
}
