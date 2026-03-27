<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // เปลี่ยน with('service') เป็น with('category') ให้ตรงกับ Model Faq
        $faqs = Faq::with('category')->orderBy('sort_order')->orderBy('id')->paginate(20);

        // ดึงข้อมูลจาก ServiceCategory และเลือกคอลัมน์ id, name (ตามที่คุณแจ้ง)
        $serviceCategories = ServiceCategory::select('id', 'name')->orderBy('name')->get();

        $faq = new Faq();

        // ส่งตัวแปร serviceCategories ไปแทน services
        return view('admin.faqs.index', [
            'faqs' => $faqs,
            'serviceCategories' => $serviceCategories,
            'faq' => $faq
        ]);
    }

    // โหลดข้อมูล FAQ ที่ต้องการแก้ไขพร้อมรายการทั้งหมด
    public function edit(int $id)
    {
        $faqs = Faq::with('category')->orderBy('sort_order')->orderBy('id')->paginate(20);
        $serviceCategories = ServiceCategory::select('id', 'name')->orderBy('name')->get();
        $faq = Faq::findOrFail($id);

        return view('admin.faqs.index', compact('faqs', 'serviceCategories', 'faq'));
    }

    // บันทึก FAQ ใหม่
    public function store(Request $request)
    {
        $request->validate([
            // แก้ไขให้เช็คการมีอยู่ (exists) ในตาราง service_categories
            'service_id' => 'required|exists:service_categories,id',
            'question' => 'required|string',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'required|in:0,1', // ปรับให้รองรับค่า 0, 1 จาก Select
        ]);

        Faq::create($request->all());

        return redirect()->route('admin.faqs.index')->with('success', 'เพิ่ม FAQ เรียบร้อยแล้ว');
    }

    // อัปเดต FAQ ที่มีอยู่
    public function update(Request $request, int $id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'question' => 'required|string',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'required|boolean',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->only('service_id', 'question', 'answer', 'sort_order', 'is_active'));

        return redirect()->route('admin.faqs.index')->with('success', 'แก้ไข FAQ เรียบร้อยแล้ว');
    }

    // ลบ FAQ
    public function destroy(int $id)
    {
        Faq::findOrFail($id)->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'ลบ FAQ เรียบร้อยแล้ว');
    }
}
