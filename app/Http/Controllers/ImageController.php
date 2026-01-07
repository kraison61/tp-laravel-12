<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ImageUpload;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = ImageUpload::simplePaginate(12);
        // $images = ImageUpload::all();
        return view('pages.image',['images' => $images]);
    }

    public function show(){
        return "Show Image Page";
    }

    public function fetch(Request $request)
    {
        $serviceId = $request->get('service_id', 'all');

        $query = ImageUpload::query();

        if ($serviceId !== 'all') {
            $query->where('service_id', $serviceId);
        }

        $images = $query
            ->orderByDesc('id')
            ->paginate(12);

        $images->getCollection()->transform(function ($image) {
            $image->img_url = asset($image->img_url);
            return $image;
        });

        return response()->json($images);
    }
}
