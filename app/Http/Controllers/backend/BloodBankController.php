<?php

namespace App\Http\Controllers\backend;

use App\Models\Donar;
use App\Models\BloodBank;
use App\Models\BloodStock;
use App\Models\DonatedUser;
use App\Models\BloodRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BloodBankController extends Controller
{
    public function donateNow(){

        $donar =  Donar::where('user_id',Auth::user()->id)->with('donated_user')->first();
        // return $donar;
        return view('backend.partials.donar.donateToBank',compact('donar'));
    }

    public function donateSaveifo(Request $request){

        // return $request->all();
       $exists = BloodBank::where('donar_id',$request->donar_id)->first();
    //    dd($exists);
        if ($exists == null) {
            # donar ID not exists
            BloodStock::where('donar_id',$request->donar_id)->update(['avalability'=>$request->status]);
            DonatedUser::where('donar_id',$request->donar_id)->update(['last_donation_date' =>$request->last_donation_date]);
            BloodBank::create([
                'donar_id' => $request->donar_id,
                'qty' => "1",
                'donated_user_id' => $request->donar_id,
                'blood_group' => $request->blood_group
            ]);
    
            $received_requests = BloodRequest::where(['donar_id' => $request->donar_id])->get();
            if ($received_requests == !null) {
                $delete = BloodRequest::where(['donar_id' => $request->donar_id])->get();
                foreach($delete as $item){
                    $item->delete();
                }
            // $delete->delete();
            }
            // $delete->delete();
            return back()->with('message','Thank you for your donation.Please do not donate blood within 3 months.');
        } else {
            # code...
            BloodStock::where('donar_id',$request->donar_id)->update(['avalability'=>$request->status]);
            DonatedUser::where('donar_id',$request->donar_id)->update(['last_donation_date' =>$request->last_donation_date]);
            
           $received_requests = BloodRequest::where(['donar_id' => $request->donar_id])->get();
            if ($received_requests == !null) {
                $delete = BloodRequest::where(['donar_id' => $request->donar_id])->get();
                foreach($delete as $item){
                    $item->delete();
                }
            // $delete->delete();
            }
            
            
            return back()->with('message','Thank you for your donation.Please do not donate blood within 3 months.');
        }
        

       
    }


    public function bloodList(){
        $bank_donar = BloodBank::with('bank_donated_donar')->get();
        // dd($bank_donar);
        return view('backend.partials.bank.bloodList',compact('bank_donar'));
    }

    public function deleteBankBlood($id){
        $delete = BloodBank::where('id',$id)->first();
        $delete->delete();
        return back()->with('message','Blood deleted from the bank list');
    }
}
