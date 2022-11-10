<?php

namespace App\Http\Controllers\backend\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthenticationController extends Controller
{
    //
    public function loginPage(){
        return view('backend.partials.auth.loginPage');
    }

    
    public function submitLogin(Request $request){
        // return $request;
        $credentials  = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) { //login attempt
            $request->session()->regenerate();

            if ($request->has('rememberMe')) {
                Cookie::queue('backendcookieNameEmail', $request->email, 1440); /* 1440 means cookie will clear after 24 hours*/
                Cookie::queue('backendcookieNamePassword', $request->password, 1440);
            }

            return redirect()->route('dashboard')->with('message', 'Login successful!');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.page')->with('message', 'Logout successful!');

    }
}
