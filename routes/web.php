<?php

use App\Http\Controllers\backend\auth\AuthenticationController;
use App\Http\Controllers\backend\DonarController;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\PatientController;
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

Route::group(['prefix' => 'app'], function () {

    Route::get('/login-page', [AuthenticationController::class, 'loginPage'])->name('login.page');
    Route::post('/login-submit', [AuthenticationController::class, 'submitLogin'])->name('login.submit');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'admin'], function () {

        // home pages
        Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

        // Patient routes
        Route::get('/allPatients', [PatientController::class, 'allPatients'])->name('allPatients');
        Route::get('/patient', [PatientController::class, 'createpatient'])->name('create.patient');
        Route::post('/patient-save', [PatientController::class, 'savePatient'])->name('patient.save');
        Route::get('/patient-edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
        Route::put('/patient-update/{id}', [PatientController::class, 'updatePatient'])->name('patient.update');
        Route::get('/patient-delete/{id}', [PatientController::class, 'deletePatient'])->name('patient.delete');

        // Donars Routes
        Route::get('/donar-form', [DonarController::class, 'donarForm'])->name('donar.form');
        Route::get('/all-donars', [DonarController::class, 'allDonars'])->name('all.donar');
        Route::post('/create-donar', [DonarController::class, 'createDonar'])->name('create.donar');
        Route::get('/donar-edit/{id}', [DonarController::class, 'editDonar'])->name('edit.donar');
        Route::put('/donar-update/{id}', [DonarController::class, 'updateDonar'])->name('update.donar'); Route::put('/donar-update/{id}', [DonarController::class, 'updateDonar'])->name('update.donar');
        Route::get('/donar-delete/{id}', [DonarController::class, 'deleteDonar'])->name('delete.donar');

    });

});
