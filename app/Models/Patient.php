<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'patient_name',
        'patient_age',
        'patient_address',
        'patient_mobile',
        'patient_reason',
    ];
    
    	
}
