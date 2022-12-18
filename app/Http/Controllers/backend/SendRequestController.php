<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BloodRequest;
use App\Models\Donar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendRequestController extends Controller
{
    //

    public function sendRequest($donar_id, $user_id)
    {
        BloodRequest::create([
            'user_id' => $user_id,
            'donar_id' => $donar_id,

        ]);

        // send mail
        $donarInfo = Donar::where('id', $donar_id)->with('user')->first();

        Mail::send('backend.mail.mailSend', ['donarInfo' => $donarInfo], function ($m) use ($donarInfo) {
            $m->from(Auth::user()->email, 'BBMS-Blood Bank Management System');
            $m->to($donarInfo->user->email, $donarInfo->d_name)->subject('You have a blood request!');
        });

        return back()->with('message', 'Request sent successfully with an Email to the donar');
    }

    public function deleteRequest($donar_id, $user_id)
    {
        $delete = BloodRequest::where(['donar_id' => $donar_id, 'user_id' => $user_id])->first();
        $delete->delete();
        return back()->with('message', 'Request cancled!');
    }

    public function requestedList()
    {
        $myID = Donar::where('user_id', Auth::user()->id)->pluck('id')->first();
        $brTableMyId = BloodRequest::where('donar_id', $myID)->with('patients')->get();
        return view('backend.partials.donar.requestList', compact('brTableMyId'));
    }

    public function confirmRequest($user_id)
    {
        $donar_ID = Donar::where('user_id', Auth::user()->id)->pluck('id')->first();
        $data = BloodRequest::where([
            'donar_id' => $donar_ID,
            'user_id' => $user_id,
        ])->first();
        $data->update([
            'action' => 'confirmed',
        ]);
        return back()->with('message', 'Request confirmed!');

    }

    public function deletePatientRequest($user_id)
    {
        $myID = Donar::where('user_id', Auth::user()->id)->pluck('id')->first();
        $data = BloodRequest::where('donar_id', $myID)->where('user_id', $user_id)->first();
        $data->delete();
        return back()->with('error', 'Request removed!');

    }

}
