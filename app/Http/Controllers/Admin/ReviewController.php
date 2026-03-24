<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    // แสดงรายการรีวิวทั้งหมด + เตรียมฟอร์ม Create ว่างเปล่า
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc')->paginate(15);
        $review  = new Review();

        return view('admin.reviews.index', compact('reviews', 'review'));
    }

    // โหลดข้อมูลรีวิวที่ต้องการแก้ไขพร้อมรายการทั้งหมด
    public function edit(int $id)
    {
        $reviews = Review::orderBy('created_at', 'desc')->paginate(15);
        $review  = Review::findOrFail($id);

        return view('admin.reviews.index', compact('reviews', 'review'));
    }

    // บันทึกรีวิวใหม่ พร้อมอัปโหลดรูปไปยัง S3
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'rating'        => 'required|integer|between:1,5',
            'comment'       => 'nullable|string',
            'image'         => 'nullable|image|max:2048',
            'is_active'     => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            // อัปโหลดรูปไปยัง Cloudflare R2 / S3 ในโฟลเดอร์ reviews/
            $validated['image'] = $request->file('image')
                ->store('images/reviews', 's3');
        }

        Review::create($validated);

        return redirect()->route('admin.review.index')
            ->with('success', 'เพิ่มรีวิวเรียบร้อยแล้ว');
    }

    // อัปเดตรีวิว — ถ้ามีรูปใหม่ให้ลบรูปเก่าออกจาก S3 ก่อน
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'rating'        => 'required|integer|between:1,5',
            'comment'       => 'nullable|string',
            'image'         => 'nullable|image|max:2048',
            'is_active'     => 'required|boolean',
        ]);

        $review = Review::findOrFail($id);

        if ($request->hasFile('image')) {
            // ลบรูปเก่าออกจาก S3 (ถ้ามี)
            if ($review->image) {
                Storage::disk('s3')->delete($review->image);
            }
            $validated['image'] = $request->file('image')
                ->store('images/reviews', 's3');
        } else {
            // ถ้าไม่ได้อัปโหลดรูปใหม่ ให้คงรูปเดิมไว้
            unset($validated['image']);
        }

        $review->update($validated);

        return redirect()->route('admin.review.index')
            ->with('success', 'แก้ไขรีวิวเรียบร้อยแล้ว');
    }

    // ลบรีวิว พร้อมลบรูปออกจาก S3
    public function destroy(int $id)
    {
        $review = Review::findOrFail($id);

        if ($review->image) {
            Storage::disk('s3')->delete($review->image);
        }

        $review->delete();

        return redirect()->route('admin.review.index')
            ->with('success', 'ลบรีวิวเรียบร้อยแล้ว');
    }
}
