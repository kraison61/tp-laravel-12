<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\ServiceCategory;

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
        return view('pages.service', compact('service'));
    }
}
