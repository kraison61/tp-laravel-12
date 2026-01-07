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
        $images = ImageUpload::paginate(12);
        return view('images.index',['images' => $images]);
        // dd($images);
    }

    public function show($id){
        
        $imageService = ImageUpload::findOrFail($id);
        return view('images.show',['imageService'=>'$imageService']);
    }

}
