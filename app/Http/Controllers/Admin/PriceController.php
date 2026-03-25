<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Price;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Storage;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = ['id', 'service_id', 'sku', 'name', 'description', 'price', 'max_price', 'sale_price', 'price_type', 'unit_text', 'currency', 'price_valid_until', 'availability', 'url', 'sort_order', 'is_active'];
        $data = Price::select($columns)
            ->with('category')
            ->orderBy('updated_at', 'desc')
            ->get()
            ->map(function ($item) {
                // 2. แปลงค่า service_id ให้เป็นชื่อหมวดหมู่ เพื่อให้หน้า index กลางโชว์ชื่อได้ทันที
                // เราเก็บชื่อไว้ใน property ชื่อเดิม (service_id) เพื่อให้ตรงกับ $headers
                $item->service_id = $item->category->name ?? 'ไม่มีหมวดหมู่';

                // (ตัวเลือกเสริม) แปลงสถานะจาก 0,1 ให้เป็นข้อความภาษาไทย
                $item->is_active = $item->is_active ? 'ใช้งาน' : 'ปิดใช้งาน';

                return $item;
            });
        $headers = [
            'service_id' => 'หมวดหมู่',
            'sku' => 'รหัสบริการ',
            'name' => 'ชื่อบริการ',
            'description' => 'รายละเอียด',
            'price' => 'ราคา',
            'max_price' => 'ราคาสูงสุด',
            'sale_price' => 'ราคาขาย',
            'price_type' => 'ประเภทราคา',
            'unit_text' => 'หน่วย',
            'currency' => 'สกุลเงิน',
            'price_valid_until' => 'ราคาถึงวันที่',
            'availability' => 'ความพร้อมใช้งาน',
            'url' => 'URL',
            'sort_order' => 'ลำดับ',
            'is_active' => 'สถานะ',
        ];

        return view('admin.index', [
            'title' => 'Admin-Price',
            'data' => $data,
            'headers' => $headers,
            'routeBase' => 'admin.price',
            'createRoute' => 'admin.price.create',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $price = new Price();
        $services = ServiceCategory::select('id', 'name')->get();
        return view('admin.prices.index', compact('price', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. กำหนดข้อความแจ้งเตือนภาษาไทย (Custom Messages) เพื่อให้ User เข้าใจง่ายขึ้น
        $messages = [
            'max_price.required_if' => 'กรุณาระบุราคาสูงสุด เมื่อเลือกประเภทราคาเป็น "ช่วงราคา"',
            'max_price.gt' => 'ราคาสูงสุด ต้องมีมูลค่ามากกว่าราคาปกติ/เริ่มต้น',
            'service_id.required' => 'กรุณาเลือกบริการที่เกี่ยวข้อง',
        ];

        // 2. ตรวจสอบข้อมูล (Validation)
        $validatedData = $request->validate([
            'service_id' => 'required|exists:service_categories,id',
            'sku' => 'nullable|string|max:100',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',

            'price_type' => 'required|in:exact,starting,range,variable',
            'price' => 'required|numeric|min:0',

            // 🔴 ไฮไลท์สำคัญ: บังคับกรอกถ้าระบุเป็น range และค่าต้องมากกว่า price
            'max_price' => 'nullable|required_if:price_type,range|numeric|gt:price',

            'sale_price' => 'nullable|numeric|min:0',
            'unit_text' => 'nullable|string|max:100',
            'currency' => 'required|string|max:3',
            'price_valid_until' => 'nullable|date',
            'availability' => 'required|string',
            'url' => 'nullable|url|max:255',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
        ], $messages);

        // 3. ป้องกันความผิดพลาดทาง Logic (Defensive Programming)
        // ถ้าผู้ใช้ไม่ได้เลือกเป็น 'range' แต่แอบส่งค่า max_price มา ให้เคลียร์ทิ้งเป็น null
        if ($validatedData['price_type'] !== 'range') {
            $validatedData['max_price'] = null;
        }

        // 4. บันทึกข้อมูลลงฐานข้อมูล
        Price::create($validatedData);

        // 5. ส่งกลับไปหน้าแสดงรายการ พร้อมข้อความสำเร็จ
        return redirect()->route('admin.price.index')
            ->with('success', 'บันทึกแพ็กเกจราคาใหม่เรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $price = Price::findOrFail($id);
        $services = ServiceCategory::select('id', 'name')->get();
        return view('admin.prices.index', compact('price', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $messages = [
            'max_price.required_if' => 'กรุณาระบุราคาสูงสุด เมื่อเลือกประเภทราคาเป็น "ช่วงราคา"',
            'max_price.gt' => 'ราคาสูงสุด ต้องมีมูลค่ามากกว่าราคาปกติ/เริ่มต้น',
            'service_id.required' => 'กรุณาเลือกบริการที่เกี่ยวข้อง',
        ];

        $validatedData = $request->validate([
            'service_id' => 'required|exists:service_categories,id',
            'sku' => 'nullable|string|max:100',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',

            'price_type' => 'required|in:exact,starting,range,variable',
            'price' => 'required|numeric|min:0',

            // 🔴 ไฮไลท์สำคัญ: บังคับกรอกถ้าระบุเป็น range และค่าต้องมากกว่า price
            'max_price' => 'nullable|required_if:price_type,range|numeric|gt:price',

            'sale_price' => 'nullable|numeric|min:0',
            'unit_text' => 'nullable|string|max:100',
            'currency' => 'required|string|max:3',
            'price_valid_until' => 'nullable|date',
            'availability' => 'required|string',
            'url' => 'nullable|url|max:255',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
        ], $messages);

        // 3. ป้องกันความผิดพลาดทาง Logic (Defensive Programming)
        // ถ้าผู้ใช้ไม่ได้เลือกเป็น 'range' แต่แอบส่งค่า max_price มา ให้เคลียร์ทิ้งเป็น null
        if ($validatedData['price_type'] !== 'range') {
            $validatedData['max_price'] = null;
        }

        // 4. บันทึกข้อมูลลงฐานข้อมูล
        $price = Price::findOrFail($id);
        $price->update($validatedData);

        // 5. ส่งกลับไปหน้าแสดงรายการ พร้อมข้อความสำเร็จ
        return redirect()->route('admin.price.index')
            ->with('success', 'ปรับปรุงแพ็กเกจราคาเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $price = Price::findOrFail($id);

        // ลบรูปภาพออกจาก S3 (เปลี่ยนจาก public เป็น s3 ให้ตรงกับตอน store)
        if ($price->image) {
            Storage::disk('s3')->delete($price->image);
        }
        $price->delete();
        return redirect()->route('admin.price.index')->with('success', 'Price deleted successfully');
    }
}
