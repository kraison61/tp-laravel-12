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
            ->limit(3)
            ->get();
        return view('images.index', ['images' => $images]);
    }
    public function loadMore(Request $request)
    {
        $lastId = $request->last_id;

        // ดึงข้อมูลที่ id น้อยกว่ารูปล่าสุดที่แสดง
        $images = ImageUpload::where('id', '<', $lastId)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $data = $images->map(function ($image) {
            return [
                'id'      => $image->id,
                'img_url' => asset($image->img_url), // ✅ URL เต็ม
                'class'   => $image->class ?? 'cat1 cat2 cat4',
            ];
        });
        return response()->json($data);
    }

}
