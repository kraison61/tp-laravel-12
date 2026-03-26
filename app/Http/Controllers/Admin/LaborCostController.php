<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaborCost;
use App\Models\LaborCategory;
use Illuminate\Http\Request;

class LaborCostController extends Controller
{
    // 1. หน้าแสดงรายการทั้งหมด
    public function index()
    {
        // โหลดข้อมูลหมวดหมู่มาด้วยเสมอ (Eager Loading) ป้องกันเว็บช้า
        $data = LaborCost::with('category.parent')->latest()->get();

        // กำหนดหัวตาราง (สังเกตว่าเราใช้ category_name ที่เพิ่งสร้างใน Model)
        $headers = [
            'category_name' => 'หมวดหมู่งาน',
            'item_name' => 'ชื่อรายการค่าแรง',
            'cost_per_unit' => 'ค่าแรง/หน่วย',
            'unit' => 'หน่วย',
        ];

        return view('admin.index', [
            'title' => 'จัดการรายการค่าแรง',
            'data' => $data,
            'headers' => $headers,
            'routeBase' => 'admin.labor_cost',
            'createRoute' => 'admin.labor_cost.create',
        ]);
    }

    // 2. หน้าฟอร์มสร้างข้อมูลใหม่
    public function create()
    {
        $laborCost = new LaborCost(); // วัตถุว่าง

        // แก้ไข: เอา whereNotNull ออก เพื่อให้ดึงหมวดหมู่มาทั้งหมด
        $categories = LaborCategory::with('parent')
            ->orderBy('name')
            ->get();

        return view('admin.labor_costs.create_edit', compact('laborCost', 'categories'));
    }

    // 3. หน้าฟอร์มแก้ไขข้อมูล
    public function edit(LaborCost $laborCost)
    {
        // แก้ไข: เอา whereNotNull ออก เพื่อให้ดึงหมวดหมู่มาทั้งหมด
        $categories = LaborCategory::with('parent')
            ->orderBy('name')
            ->get();

        return view('admin.labor_costs.create_edit', compact('laborCost', 'categories'));
    }

    // 4. บันทึกข้อมูลใหม่
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:labor_categories,id',
            'item_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'cost_per_unit' => 'required|numeric|min:0',
            'document_ref' => 'nullable|string|max:100',
            'remark' => 'nullable|string',
        ]);

        LaborCost::create($data);
        return redirect()->route('admin.labor_cost.index')->with('success', 'เพิ่มรายการค่าแรงเรียบร้อยแล้ว');
    }

    // 5. อัปเดตข้อมูล
    public function update(Request $request, LaborCost $laborCost)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:labor_categories,id',
            'item_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'cost_per_unit' => 'required|numeric|min:0',
            'document_ref' => 'nullable|string|max:100',
            'remark' => 'nullable|string',
        ]);

        $laborCost->update($data);
        return redirect()->route('admin.labor_cost.index')->with('success', 'อัปเดตรายการค่าแรงเรียบร้อยแล้ว');
    }

    // 6. ลบข้อมูล
    public function destroy(LaborCost $laborCost)
    {
        $laborCost->delete();
        return back()->with('success', 'ลบรายการค่าแรงเรียบร้อยแล้ว');
    }
}