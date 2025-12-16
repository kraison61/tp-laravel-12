<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('pages.service',[
            'title' => 'Service Page'
        ]);
    }
    public function show($id){
        // $service = Service::findOrFail($id);
        $service = Service::findOrFail($id);
        return view('pages.service',['service'=>$service]);
        
    }
}
