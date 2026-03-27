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

        // ดึงหมวดหมู่ที่มีรายการค่าแรงอยู่ เพื่อไปแสดงใน Dropdown ค้นหา
        $categories = LaborCategory::has('costs')->orderBy('name', 'asc')->get();

        // เริ่มต้น Query โดยการ join กับตาราง categories เพื่อให้ sort ตามชื่อหมวดหมู่ได้
        $query = LaborCost::with('category')
            ->join('labor_categories', 'labor_costs.category_id', '=', 'labor_categories.id')
            ->select('labor_costs.*'); // เลือกเฉพาะ column จากตารางหลักเพื่อป้องกัน id ทับกัน

        if (!empty($search)) {
            $query->where('item_name', 'like', '%' . $search . '%');
        }

        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        // 🌟 ปรับปรุงการ Sort: เรียงตามชื่อหมวดหมู่ก่อน แล้วตามด้วยชื่อรายการ
        $laborCosts = $query->orderBy('labor_categories.name', 'asc')
            ->orderBy('labor_costs.item_name', 'asc')
            ->paginate(30);

        return view('pages.labor.index', compact('laborCosts', 'categories', 'search', 'categoryId'));
    }

    public function autocomplete(Request $request)
    {
        $query = $request->input('query');

        // ถ้าไม่ได้พิมพ์อะไรมา ให้ส่งค่าว่างกลับไป
        if (empty($query)) {
            return response()->json([]);
        }

        // ค้นหาข้อมูลที่ตรงกับคำที่พิมพ์ (จำกัดแค่ 10 รายการเพื่อความรวดเร็ว)
        $results = LaborCost::with('category')
            ->where('item_name', 'LIKE', "%{$query}%")
            ->orWhere('document_ref', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get();

        return response()->json($results);
    }
}
