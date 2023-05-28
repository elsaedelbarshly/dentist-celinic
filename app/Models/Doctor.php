<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'phone',
        'email',
        'password',
        "password_confirmation",
        'image'
    ];

    public function treatment() : BelongsTo
    {
        return $this->belongsTo(Treatment::class);
    }
}
