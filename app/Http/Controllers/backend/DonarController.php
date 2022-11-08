<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BloodStock;
use App\Models\Donar;
use Illuminate\Http\Request;

class DonarController extends Controller
{
    //displaying all donars
    public function allDonars()
    {
        $allDonars = Donar::orderBy('id', 'desc')->with('blood_stock')->paginate('10');
        // dd($allDonars);
        return view('backend.partials.donar.allDonars', compact('allDonars'));
    }

    public function donarForm()
    { //Donar form
        return view('backend.partials.donar.createDonar');
    }

    public function createDonar(Request $request)
    { //save donar information
        // dd('kaj kortese');
        // dd($request);
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
        $data = Donar::create([
            'd_name' => $request->d_name,
            'd_age' => $request->d_age,
            'd_mobile' => $request->d_mobile,
            'd_address' => $request->d_address,
            'd_disease' => $request->d_disease,
            'd_blood_group' => $request->d_blood_group,
            'd_image' => $filename,
        ]);

        // dd($data->id);

        BloodStock::create([
            'donar_id' => $data->id,
            'blood_group' => $data->d_blood_group,
            'avalability' => 'ready',
        ]);
        return redirect()->back()->with('message', 'Donar created successfully');
    }

    public function editDonar($id)
    { //edit donar information
        // dd($id);
        $data = Donar::findorFail($id);
        return view('backend.partials.donar.editDonar', compact('data'));
    }

    public function updateDonar(Request $request, $id)
    { //update donar information

    }
    public function deleteDonar($id)
    {

    }
}
