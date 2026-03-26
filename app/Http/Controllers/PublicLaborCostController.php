<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaborCost;
use App\Models\LaborCategory;

class PublicLaborCostController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');

        $categories = LaborCategory::has('costs')->orderBy('name', 'asc')->get();

        $query = LaborCost::with('category');

        if (!empty($search)) {
            $query->where('item_name', 'like', '%' . $search . '%');
        }

        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        // ดึงข้อมูลมาแสดงหน้าละ 30 รายการ
        $laborCosts = $query->orderBy('item_name', 'asc')->paginate(30);

        // ส่งไปที่โฟลเดอร์ pages (สมมติว่าเป็นโฟลเดอร์สำหรับหน้าเว็บสาธารณะ)
        // dd($laborCosts);
        return view('pages.labor.index', compact('laborCosts', 'categories', 'search', 'categoryId'));
    }
}
