<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageUpload ;


class GalleryController extends Controller
{
    public function index($id = null)
    {
        return view('images.index', ['id' => $id]);
    }

    public function show(string $id)
    {
        $images=ImageUpload::where('service_id', $id)->paginate(15);
        return view('images.show',compact('images'));
    }
}
