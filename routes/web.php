<?php

use App\Http\Controllers\MouController;
use App\Http\Controllers\SakibController;
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
//     return view('welcome');
// });

Route::get('/mou',[MouController::class,'indexAction']);

Route::get('/pial',[MouController::class,'index']);

Route::get('/sakib',[SakibController::class,'myIndex']);