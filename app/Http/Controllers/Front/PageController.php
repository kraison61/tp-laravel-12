<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Price;
use App\Models\Faq;

class PageController extends Controller
{
    public function index()
    {
        $services = Service::all();
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
        $faqs = Faq::where('service_id', $service->id)->get();
        // dd($service->services->first()->rating_value);
        return view('pages.service', compact('service', 'prices', 'faqs'));
    }
}
