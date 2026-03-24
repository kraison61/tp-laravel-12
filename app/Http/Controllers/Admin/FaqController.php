<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // ดึงรายการ FAQ ทั้งหมด + เตรียม faq ใหม่สำหรับฟอร์ม Create
    public function index()
    {
        $faqs = Faq::with('service')->orderBy('sort_order')->orderBy('id')->paginate(20);
        $services = Service::select('id', 'title')->orderBy('title')->get();
        $faq = new Faq();

        return view('admin.faqs.index', compact('faqs', 'services', 'faq'));
    }

    // โหลดข้อมูล FAQ ที่ต้องการแก้ไขพร้อมรายการทั้งหมด
    public function edit(int $id)
    {
        $faqs = Faq::with('service')->orderBy('sort_order')->orderBy('id')->paginate(20);
        $services = Service::select('id', 'title')->orderBy('title')->get();
        $faq = Faq::findOrFail($id);

        return view('admin.faqs.index', compact('faqs', 'services', 'faq'));
    }

    // บันทึก FAQ ใหม่
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'question'   => 'required|string',
            'answer'     => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'required|boolean',
        ]);

        Faq::create($request->only('service_id', 'question', 'answer', 'sort_order', 'is_active'));

        return redirect()->route('admin.faq.index')->with('success', 'เพิ่ม FAQ เรียบร้อยแล้ว');
    }

    // อัปเดต FAQ ที่มีอยู่
    public function update(Request $request, int $id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'question'   => 'required|string',
            'answer'     => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'required|boolean',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->only('service_id', 'question', 'answer', 'sort_order', 'is_active'));

        return redirect()->route('admin.faq.index')->with('success', 'แก้ไข FAQ เรียบร้อยแล้ว');
    }

    // ลบ FAQ
    public function destroy(int $id)
    {
        Faq::findOrFail($id)->delete();

        return redirect()->route('admin.faq.index')->with('success', 'ลบ FAQ เรียบร้อยแล้ว');
    }
}
