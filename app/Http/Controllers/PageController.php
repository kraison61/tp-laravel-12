<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.service', [
            'title' => 'Service Page'
        ]);
    }
    public function show(ServiceCategory $serviceCategory)
    {
        // $service = Service::whereHas('category', function ($query) use ($serviceCategory) {
        //     $query->where('slug', $serviceCategory);
        // })->firstOrFail();
        dd($serviceCategory->id);
        return view('pages.service', compact('service'));
    }
}
