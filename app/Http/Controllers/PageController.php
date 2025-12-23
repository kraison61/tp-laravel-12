<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('pages.service',[
            'title' => 'Service Page'
        ]);
    }
    public function show(ServiceCategory $slug){
        // $service = Service::findOrFail($service);
        dd($slug->slug);
        return view('pages.service',['service'=>$slug]);
    }

}
