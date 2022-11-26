<?php

namespace App\Models;

use App\Models\BloodBankRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
