<?php

use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\PatientController;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('master');
// });

Route::get('/',[HomeController::class,'dashboard']);

// Patient routes
Route::get('/allPatients',[PatientController::class,'allPatients'])->name('allPatients');
Route::get('/patient',[PatientController::class,'createpatient'])->name('create.patient');
Route::post('/patient-save',[PatientController::class,'savePatient'])->name('patient.save');
Route::get('/patient-edit/{id}',[PatientController::class,'edit'])->name('patient.edit');
Route::put('/patient-update/{id}',[PatientController::class,'updatePatient'])->name('patient.update');
Route::get('/patient-delete/{id}',[PatientController::class,'deletePatient'])->name('patient.delete');