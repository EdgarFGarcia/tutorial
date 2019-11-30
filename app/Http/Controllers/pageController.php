<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    //

    public function test(){
    	return view('welcome');
    }

    public function start(){
    	return view('home');
    }
}
