<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MouController extends Controller
{
    function indexAction(){
        return view('pial');
    }

    public function index(){
        return view('welcome');
    }
}
