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
        return view('images.index',['images' => $images]);
    }

    public function show($id){
        
        $imageService = ImageUpload::findOrFail($id);
        return view('images.show',['imageService'=>'$imageService']);
    }

}
