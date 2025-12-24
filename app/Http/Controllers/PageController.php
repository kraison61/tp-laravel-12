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
    public function show(ServiceCategory $serviceCategory){
        $services = $serviceCategory->services;
        // $service = Service::findOrFail($service);
        dd($services);
        return view('pages.service',['service'=>$slug]);
    }

}
