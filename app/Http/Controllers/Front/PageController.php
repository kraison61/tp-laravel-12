<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Price;

class PageController extends Controller
{
    public function index()
    {
        $services=Service::all();
        return view('pages.index', [
            'title' => 'Service Page',
            'services' => $services
        ]);
    }
    public function show($slug)
    {
        $service = ServiceCategory::where('slug', $slug)
            ->with(['services.images'])
            ->firstOrFail();
        $prices = Price::where('service_id', $service->id)->get();
        // dd($prices);
        return view('pages.service', compact('service', 'prices'));
    }
}
