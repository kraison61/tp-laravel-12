<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ImageUpload;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function getImages(Request $request)
    {
        // 1. รับค่าจาก Query String
        $serviceId = $request->query('service_id');

        // 2. สร้าง Query
        $query = ImageUpload::query();

        // 3. ถ้าค่าไม่ใช่ 'all' ให้ทำการ Filter ตาม service_id
        if ($serviceId && $serviceId !== 'all') {
            $query->where('service_id', $serviceId);
        }

        // 4. ใช้ paginate เพื่อแบ่งหน้า (ส่งทีละ 9 รูปตามที่ Template ออกแบบไว้)
        // ข้อมูลที่ส่งกลับไปจะเป็น JSON ที่มีโครงสร้าง data, next_page_url ฯลฯ อัตโนมัติ
        $images = $query->orderBy('id', 'desc')->paginate(9);

        return response()->json($images);
    }
}
