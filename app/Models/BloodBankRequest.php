<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\BloodBank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BloodBankRequest extends Model
{
    use HasFactory;

    protected $fillable=[
        'blood_bank_id','patient_id','user_id','message','required_date'
    ];

    public function patientMessage()
    {
        return $this->belongsTo(Patient::class,'patient_id','id');
    }

    public function bloodGroup()
    {
        return $this->belongsTo(BloodBank::class,'blood_bank_id','id');
    }
    
}
