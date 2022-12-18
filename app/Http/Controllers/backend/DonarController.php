<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BloodStock;
use App\Models\Donar;
use App\Models\DonatedUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class DonarController extends Controller
{

    // register
    public function register()
    {
        return view('backend.partials.donar.register');
    }

    public function submitRegistration(Request $request)
    {
        // return $request->all();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'd_name' => 'required|string',
            'd_age' => 'required|numeric',
            'd_mobile' => 'required|numeric',
            'd_address' => 'required|string',
            'd_disease' => 'required|string',
            'd_blood_group' => 'required',
            'd_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $userData = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'postion' => 'Donar',
        ]);

        if ($request->file('d_image')) {
            $file = $request->file('d_image');
            $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/images/donar/'), $filename);
        }

        $donarData = Donar::create([
            'user_id' => $userData->id,
            'd_name' => $request->d_name,
            'd_age' => $request->d_age,
            'd_mobile' => $request->d_mobile,
            'd_address' => $request->d_address,
            'd_disease' => $request->d_disease,
            'd_blood_group' => $request->d_blood_group,
            'd_image' => $filename,
        ]);
        $stockData = BloodStock::create([
            'donar_id' => $donarData->id,
            'blood_group' => $donarData->d_blood_group,
            'avalability' => $request->status,
        ]);

        DonatedUser::create([
            'blood_stock_id' => $stockData->id,
            'donar_id' => $stockData->donar_id,
            'last_donation_date' => $request->last_donation_date,
        ]);

        return redirect()->route('donar.login')->with('message', 'Donar registration successfull!');

    }

    // Donar authentication
    public function donarLogin()
    {
        return view('backend.partials.donar.login');
    }

    public function submitLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if ($request->has('rememberMe')) {
                Cookie::queue('backendcookieNameEmail', $request->email, 1440); /* 1440 means cookie will clear after 24 hours*/
                Cookie::queue('backendcookieNamePassword', $request->password, 1440);
            }

            return redirect()->route('donar.dashboard')->with('message', 'Donar Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records!',
        ])->onlyInput('email');

    }

    public function donarlogout()
    {
        Auth::logout();
        return redirect()->route('donar.login')->with('message', 'Donar Logout successful!');

    }

    //displaying all donars
    public function allDonars()
    {
        $allDonars = Donar::orderBy('id', 'desc')->with('blood_stock')->paginate('10');
        return view('backend.partials.donar.allDonars', compact('allDonars'));
    }

    public function status($id, $status)
    {
        $data = Donar::where('id', $id)->first();
        $data->update(['status' => $status]);
        return redirect()->back();
    }

    public function donarForm()
    {
        return view('backend.partials.donar.createDonar');
    }

    public function createDonar(Request $request)
    {
        $request->validate([
            'd_name' => 'required|string',
            'd_age' => 'required|numeric',
            'd_mobile' => 'required|numeric',
            'd_address' => 'required|string',
            'd_disease' => 'required|string',
            'd_blood_group' => 'required',
            'd_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->file('d_image')) {
            $file = $request->file('d_image');
            $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/images/donar/'), $filename);
        }

        $userData = User::create([
            'position' => 'Donar',
            'email' => 'donar' . date('hs') . '@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        $data = Donar::create([
            'user_id' => $userData->id,
            'd_name' => $request->d_name,
            'd_age' => $request->d_age,
            'd_mobile' => $request->d_mobile,
            'd_address' => $request->d_address,
            'd_disease' => $request->d_disease,
            'd_blood_group' => $request->d_blood_group,
            'd_image' => $filename,
        ]);

        // dd($data->id);

        $stockData = BloodStock::create([
            'donar_id' => $data->id,
            'blood_group' => $data->d_blood_group,
            'avalability' => $request->status,
        ]);

        DonatedUser::create([
            'blood_stock_id' => $stockData->id,
            'donar_id' => $stockData->donar_id,
            'last_donation_date' => $request->last_donation_date,
        ]);

        return redirect()->back()->with('message', 'Donar created successfully');
    }

    public function editDonar()
    { //edit donar information
        // dd($id);
        $user = User::where('id', Auth::user()->id)->first();
        $id = $user->id;
        $data = Donar::where('user_id', $id)->first();
        // return $data;
        return view('backend.partials.donar.editDonar', compact('data'));
    }

    public function updateDonar(Request $request)
    { //update donar information
        //  return $request->all();
        $request->validate([
            'd_name' => 'required|string',
            'd_age' => 'required|numeric',
            'd_mobile' => 'required|numeric',
            'd_address' => 'required|string',
            'd_disease' => 'required|string',
            'd_blood_group' => 'required',
            'd_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $id = $user->id;
        $data = Donar::where('user_id', $id)->first();

        if ($request->file('d_image')) {
            $file = $request->file('d_image');
            $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/images/donar/'), $filename);

            @unlink(public_path('backend/images/donar/') . $data->d_image); // delete previous image
        }

        $data->update([
            'd_name' => $request->d_name,
            'd_age' => $request->d_age,
            'd_mobile' => $request->d_mobile,
            'd_address' => $request->d_address,
            'd_disease' => $request->d_disease,
            'd_blood_group' => $request->d_blood_group,
            'd_image' => $filename,

        ]);
        $id = $data->id;
        $updateStock = BloodStock::where('donar_id', $id)->first();
        // dd($updateStock);
        $updateStock->update([
            'donar_id' => $id,
            'blood_group' => $data->d_blood_group,
            'avalability' => $request->avalability,
        ]);

        $stockDataID = $updateStock->id;
        $donatedUserData = DonatedUser::where('blood_stock_id', $stockDataID)->first();
        $donatedUserData->update([
            'blood_stock_id' => $stockDataID,
            'donar_id' => $updateStock->donar_id,
            'last_donation_date' => $request->last_donation_date,
        ]);

        return redirect()->back()->with('message', 'Donar updated successfully');
    }
    public function deleteDonar($id)
    {
        $delete = Donar::where('id', $id)->first();
        @unlink(public_path('backend/images/donar/') . $delete->d_image);
        $delete->delete();
        $user = User::where('id', $delete->user_id)->first();
        $user->delete();
        return redirect()->back()->with('message', 'Donar deleted successfully');
    }
}
