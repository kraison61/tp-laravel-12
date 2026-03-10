<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // Dummy data for Admin UX/UI Preview
        $data = collect([
            (object)[
                'id' => 1,
                'question' => 'ทำไมต้องเลือกบริการของเรา?',
                'answer' => 'เพราะเรามีทีมงานคุณภาพและให้บริการมายาวนาน',
                'status' => 'Active',
                'sort_order' => 1
            ],
            (object)[
                'id' => 2,
                'question' => 'ราคาเริ่มต้นเท่าไหร่?',
                'answer' => 'ราคาเริ่มต้นที่ 1,500 บาท ขึ้นอยู่กับหน้างาน',
                'status' => 'Active',
                'sort_order' => 2
            ]
        ]);

        $headers = [
            'question' => 'คำถาม (Question)',
            'answer' => 'คำตอบ (Answer)',
            'status' => 'สถานะ',
            'sort_order' => 'ลำดับ'
        ];

        return view('admin.index', [
            'title' => 'Admin - FAQ (คำถามที่พบบ่อย)',
            'data' => $data,
            'headers' => $headers
        ]);
    }
}
