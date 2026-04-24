<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index($id = null)
    {
        //
        if ($id) {
            $blogs = Blog::where('service_category_id', $id)->latest()->paginate(8);

        } else {
            $blogs = Blog::latest()->paginate(8);
        }
        $allBlogs = Blog::latest()
            ->get()
            ->unique('service_category_id')
            ->take(4);
        return view('blogs.index', compact('blogs'));

    }

    // public function show(string $id)
    public function show(Blog $blog)
    {
        // 1. โหลดความสัมพันธ์ที่ต้องใช้ล่วงหน้า (Eager Loading) เพื่อประสิทธิภาพที่ดี
        $blog->load(['category', 'prices']);

        // 2. เตรียมข้อมูลช่วงราคาสำหรับนำไปใช้แสดงผล และทำ SEO Schema
        $minPrice = null;
        $maxPrice = null;

        if ($blog->prices->isNotEmpty()) {
            $minPrice = $blog->prices->min('price'); // แก้ 'price_value' ตามชื่อคอลัมน์ราคาจริงใน DB ของคุณ
            $maxPrice = $blog->prices->max('max_price');
        }

        // 3. เตรียม URL ปัจจุบันสำหรับใส่ใน Schema
        $currentUrl = request()->url();

        // dd($blog->toArray());

        // 4. ส่งข้อมูลทั้งหมดไปที่ View
        return view('blogs.show', compact('blog', 'minPrice', 'maxPrice', 'currentUrl'));
    }
}
