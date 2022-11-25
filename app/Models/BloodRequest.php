<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id','donar_id','patient_id','action'
    ];

    public function patients()
    {
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
