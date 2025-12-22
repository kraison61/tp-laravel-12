<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use App\Models\ServiceCategory;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        // $images = ImageUploads::select('img_url','service_id')->orderBy('created_at', 'desc')->cursorPaginate(9);
        $images = ImageUpload::select('img_url', 'service_id')->orderBy('created_at', 'desc')->get();
        return view('pages.image', [
            'title' => 'Service Image Page',
            'images' => $images,
        ]);



        return view('pages.image', [
            'title'  => 'Service Image Page',
            'images' => $images,
        ]);
    }


}
