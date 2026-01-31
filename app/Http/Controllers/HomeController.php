<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home.index');
    }
    public function contactUs(){
        return view('home.contact');
    }
    public function aboutUs(){
        return view('home.about');
    }
}
