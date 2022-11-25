<?php

namespace App\Http\Controllers\frontend;

use App\Models\Donar;
use App\Models\BloodRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DonarController extends Controller
{
    public function donarList(){
        $allDonarsBlood = Donar::where(['status' =>'approved'])->with('blood_stock')->orderBy('id','desc')->get();
            // dd($allDonarsBlood);
        return view('frontend.partials.donars.donarList',compact('allDonarsBlood'));
    }

    public function sendRequestToDonar($donar_id,$patient_id,$user_id){
        // return [$donar_id,$patient_id,$user_id];
        BloodRequest::create([
            'user_id' => $user_id,
            'donar_id' => $donar_id,
            'patient_id'=>$patient_id

        ]);
        
        // send mail
        $donarInfo = Donar::where('id', $donar_id)->with('user')->first();
        // return ($donarInfo);
        
        Mail::send('backend.mail.mailSend', ['donarInfo' => $donarInfo], function ($m) use ($donarInfo) 
        {
            $m->from(Auth::user()->email, 'BBMS-Blood Bank Management System');
            $m->to($donarInfo->user->email, $donarInfo->d_name)->subject('You have a blood request!');
        });

        return back()->with('message', 'Request sent successfully with an Email to the donar');
    }

    public function deleteRequest($donar_id,$patient_id,$user_id)
    {
        $delete = BloodRequest::where(['donar_id' => $donar_id, 'patient_id'=>$patient_id,'user_id' => $user_id])->first();
        $delete->delete();
        return back()->with('message', 'Request cancled!');
    }
}
