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
        $images = ImageUpload::latest()->paginate(10);
        return view('images.index', ['images' => $images]);
    }
    public function loadMore(Request $request){
        $images=ImageUpload::latest()->paginate(9);
         return response()->json([
            'html' => view('images.partials.image-list', compact('images'))->render(),
            'next_page' => $images->nextPageUrl(),
        ]);
    }
}
