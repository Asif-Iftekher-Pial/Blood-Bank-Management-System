<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BloodRequest;
use Illuminate\Http\Request;

class SendRequestController extends Controller
{
    //

    public function sendRequest($donar_id,$user_id){
        // return [$donar_id , $user_id];
        BloodRequest::create([
            'user_id' => $user_id,
            'donar_id' =>$donar_id,

        ]);
        return back();
    }
}
