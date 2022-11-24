<?php

namespace App\Models;

use App\Models\Donar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BloodBank extends Model
{
    use HasFactory;
    protected $fillable=[
        'donar_id','donated_user_id','qty','blood_group'
    ];


    public function bank_donated_donar()
    {
        return $this->hasOne(Donar::class,'id','donar_id');
    }
}
