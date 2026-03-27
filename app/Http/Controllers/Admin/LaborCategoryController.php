<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaborCategory;
use Illuminate\Http\Request;

class LaborCategoryController extends Controller
{
    // 1. หน้าแสดงรายการทั้งหมด (Dynamic Index ที่เราทำไว้)
    public function index()
    {
        $data = LaborCategory::with('parent')->orderBy('name', 'asc')->get();
        $headers = [
            'name' => 'ชื่อหมวดหมู่',
            'parent_name' => 'อยู่ภายใต้หมวดหมู่', // Virtual Column จาก Accessor ใน Model
        ];

        return view('admin.index', [
            'title' => 'จัดการหมวดหมู่ค่าแรง',
            'data' => $data,
            'headers' => $headers,
            'routeBase' => 'admin.labor_category',
            'createRoute' => 'admin.labor_category.create',
        ]);
    }

    // 2. หน้าสร้างใหม่
    public function create()
    {
        // ส่ง Object เปล่าไป เพื่อให้หน้า View เช็ค $category->exists เป็น false
        $category = new LaborCategory();

        // ดึงเฉพาะหมวดหมู่หลัก (ที่ไม่มี parent_id) มาให้เลือกเป็นหัวหน้าหมวด
        $mainCategories = LaborCategory::whereNull('parent_id')->get();

        return view('admin.labor_categories.index', compact('category', 'mainCategories'));
    }

    // 3. หน้าแก้ไข
    public function edit(LaborCategory $laborCategory)
    {
        // ใช้ตัวแปรชื่อ $category เพื่อให้ตรงกับหน้า View
        $category = $laborCategory;

        // ดึงหมวดหลักมาให้เลือก ยกเว้น "ตัวเอง" เพื่อป้องกันการเลือกตัวเองเป็น Parent
        $mainCategories = LaborCategory::whereNull('parent_id')
            ->where('id', '!=', $category->id)
            ->get();

        return view('admin.labor_categories.index', compact('category', 'mainCategories'));
    }

    // 4. บันทึกข้อมูลใหม่ (Store)
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:labor_categories,id',
        ]);

        LaborCategory::create($data);
        return redirect()->route('admin.labor_category.index')->with('success', 'เพิ่มหมวดหมู่สำเร็จ');
    }

    // 5. อัปเดตข้อมูลเดิม (Update)
    public function update(Request $request, LaborCategory $laborCategory)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:labor_categories,id',
        ]);

        $laborCategory->update($data);
        return redirect()->route('admin.labor_category.index')->with('success', 'อัปเดตหมวดหมู่สำเร็จ');
    }

    public function destroy(LaborCategory $laborCategory)
    {
        $laborCategory->delete();
        return redirect()->route('admin.labor_category.index')->with('success', 'ลบหมวดหมู่สำเร็จ');
    }
}