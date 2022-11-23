<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonatedUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'blood_stock_id',
        'donar_id',
        'last_donation_date'
    ];

    
}
