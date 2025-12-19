<?php

namespace App\Http\Controllers;

use App\Models\ImageUploads;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        $images = ImageUploads::all();
        return view('pages.image',[
            'title' => 'Service Image Page',
            'images' => $images,
        ]);
    }
}
