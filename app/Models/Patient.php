<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        "name_en",
        "name_ar",
        "age",
        "gender",
        "address",
        "viste_type",
        "phone"
    ];

    // public function gender() : Attribute
    // {
    //     return Attribute:make(
    //         get
    //     );
    // }

    public function prescription() : HasMany
    {
        return $this->hasmany(Prescription::class);
    }
    
    public function treatment() : BelongsTo
    {
        return $this->belongsTo(Treatment::class);
    }
}
