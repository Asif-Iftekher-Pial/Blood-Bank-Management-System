<?php

namespace App\Http\Controllers\frontend;

use App\Models\Patient;
use App\Models\BloodBank;
use Illuminate\Http\Request;
use App\Models\BloodBankRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BloodBankController extends Controller
{
    public function bloodBankList(){
      $bloodBank =  BloodBank::orderBy('id','desc')->get();
    //   return $bloodBank;
      return view('frontend.partials.bloodBank.bloodBank',compact('bloodBank'));
    }



    public function message($id){
        // return $id;
        $id = BloodBank::find($id);
        $patient_id = Patient::where('user_id',Auth::user()->id)->pluck('id')->first();
        $messages = BloodBankRequest::where([
            'patient_id'=>$patient_id,
            'blood_bank_id'=>$id->id
        ])->first();
        // return $id;
        return view('frontend.partials.bloodBank.message',compact('id','messages'));
    }


    public function sendMessage(Request $request){
        $data= $request->all();
        $messages = BloodBankRequest::where([
            'patient_id'=>$request->patient_id,
            'blood_bank_id'=>$request->blood_bank_id
        ])->first();
        if($messages ==!null){
            $messages->fill($data)->save();
        }else{
            BloodBankRequest::create($data);
        }
        return back()->with('message','Message sent to the admin');
    }
}
