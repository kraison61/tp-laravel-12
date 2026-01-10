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
        $images = ImageUpload::orderBy('id','desc')
            ->limit(10)
            ->get();
        return view('images.index', ['images' => $images]);
    }

}
