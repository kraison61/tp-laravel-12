<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ImageUpload;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $serviceId = $request->service_id;
        $perPage   = 9; // จำนวนรูปต่อครั้ง (เหมาะกับ masonry)

        $query = ImageUpload::query();

        // filter ตาม service_id (ถ้ามี)
        if ($serviceId) {
            $query->where('service_id', $serviceId);
        }

        // เรียงรูปใหม่ก่อน
        $query->orderBy('id', 'desc');

        // paginate
        $images = $query->paginate($perPage);

        return response()->json([
            'data' => $images->items(),
            'current_page' => $images->currentPage(),
            'last_page' => $images->lastPage(),
            'has_more' => $images->hasMorePages(),
        ]);
    }
}
