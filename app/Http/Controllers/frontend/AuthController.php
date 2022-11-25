<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.partials.auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('error','Logout Successfull');
    }
    public function submitRegistration(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'patient_name' => 'required',
            'patient_address' => 'required',
            'patient_reason' => 'required',
            'patient_age' => 'required',
            'patient_mobile' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'position' => $request->position,
        ]);

        Patient::create([
            'user_id' => $user->id,
            'patient_name' => $request->patient_name,
            'patient_address' => $request->patient_address,
            'patient_reason' => $request->patient_reason,
            'patient_age' => $request->patient_age,
            'patient_mobile' => $request->patient_mobile,
        ]);

        return back()->with('message', 'Registration Completed');

    }

    public function submitLogin(Request $request)
    {
        $credentials  = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) { //login attempt
            $request->session()->regenerate();
            return redirect()->route('home')->with('message', 'Login successful!');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function profileEdit(){

        $profile = Patient::where('user_id',Auth::user()->id)->first();
        return view('frontend.partials.profile.profile',compact('profile'));
    }

    public function profileUpdate(Request $request){
        
        $request->validate([
            'patient_name' => 'required',
            'patient_address' => 'required',
            'patient_reason' => 'required',
            'patient_age' => 'required',
            'patient_mobile' => 'required',
        ]);
        $newData = $request->all();
        $data = Patient::where('user_id',$request->patient_user_id)->first();
        $data->fill($newData)->save();
        return redirect()->route('home')->with('message','Profile updated successfully');
    }
    
}
