<?php

namespace App\Http\Controllers\backend;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    //
    public function createPatient(){
        return view('backend.partials.patient.create');
    }
    
    public function allPatients(){
        
        $allPatients = Patient::orderBy('id','desc')->paginate('10');
        return view('backend.partials.patient.allPatient',compact('allPatients'));
    }
    // Save data
    // public function savePatient(Request $request){
        
    //     $request->validate([
    //         'patient_name' => 'required',
    //         'patient_age' => 'required|numeric',
    //         'patient_address' => 'required|string',
    //         'mobile' => 'required|numeric|unique:patients,patient_mobile',
    //         'reason' => 'required|string',
    //     ]);
        
    //     Patient::create([
    //         'patient_name' => $request->patient_name,
    //         'patient_age' => $request->patient_age,
    //         'patient_address' => $request->patient_address,
    //         'patient_mobile' => $request->mobile,
    //         'patient_reason' => $request->reason,
    //     ]);
    //     return redirect()->back()->with('message', 'Patient saved successfully!');
    // }

    // public function edit($id){

    //    $data= Patient::findorFail($id);
    // //    dd($data);
    //     return view('backend.partials.patient.edit',compact('data'));
    // }


    // public function updatePatient(Request $request , $id){

    //     $request->validate([
    //         'patient_name' => 'required',
    //         'patient_age' => 'required|numeric',
    //         'patient_address' => 'required|string',
    //         'mobile' => 'required|numeric|unique:patients,patient_mobile',
    //         'reason' => 'required|string',
    //     ]);

    //     $currentID = Patient::find($id);
        
    //     $currentID->update([
    //         'patient_name' => $request->patient_name,
    //         'patient_age' => $request->patient_age,
    //         'patient_address' => $request->patient_address,
    //         'patient_mobile' => $request->mobile,
    //         'patient_reason' => $request->reason,
    //     ]);

    //     return redirect()->back()->with('message', 'Patient updated successfully!');

    // }

    public function deletePatient($id){

        $data= Patient::findorFail($id);
        $data->delete();
        return redirect()->back()->with('message', 'Patient deleted successfully!');
     }
}
