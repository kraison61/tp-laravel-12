<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }
    public function contactUs(){
        return view('home.contact');
    }
    public function aboutUs(){
        return view('home.about');
    }
    public function soilCalculate(){
        return view('home.calculate');
    }
}
