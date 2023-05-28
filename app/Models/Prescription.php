<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prescription extends Model
{
    use HasFactory;
    public $fillable= [
        'medicien_name',
        'dosage',
        'patient_id'
    ];

    public function patient() : BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    
    
}
