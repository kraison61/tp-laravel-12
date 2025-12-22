<?php

namespace App\Http\Controllers;

use App\Models\ImageUploads;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(Request $request){
        // $images = ImageUploads::select('img_url','service_id')->orderBy('created_at', 'desc')->cursorPaginate(9);
        // $images = ImageUploads::select('img_url','service_id')->orderBy('created_at', 'desc')->get();
        // return view('pages.image',[
        //     'title' => 'Service Image Page',
        //     'images' => $images,
        // ]);

        $query = ImageUploads::query()->select('id', 'img_url', 'service_id', 'created_at');

    // ถ้ามีการคลิกเลือกหมวดหมู่ ให้กรองที่ Database ทันที
    if ($request->has('service_id')) {
        $query->where('service_id', $request->service_id);
    }

    // ใช้ cursorPaginate เพื่อความเร็วสูงสุดสำหรับข้อมูล 2,000 แถว
    $images = $query->orderBy('created_at', 'desc')->cursorPaginate(12)->withQueryString();

    return view('pages.image', [
        'title'  => 'Service Image Page',
        'images' => $images,
    ]);
    }
}
