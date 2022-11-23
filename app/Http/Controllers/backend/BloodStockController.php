<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BloodStock;
use App\Models\Donar;
use Illuminate\Http\Request;

class BloodStockController extends Controller
{
    //

    public function stockList(){

        $allDonarsBlood = Donar::where(['status' =>'approved'])->with('blood_stock')->orderBy('id','desc')->paginate('10');
        // dd($allDonarsBlood);
        return view('backend.partials.bloodStock.bloodGroupList',compact('allDonarsBlood'));
    }

    public function donarProfile($id){
        $profile = Donar::where('id',$id)->with('blood_stock','donated_user')->first(); 
        // return $profile;
        return view('backend.partials.bloodStock.profile',compact('profile'));
    }
}
