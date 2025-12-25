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
    public function show($slug)
    {
        $service = ServiceCategory::where('slug', $slug)
            ->with(['services.images'])
            ->firstOrFail();
        return view('pages.service', compact('service'));
    }
}
