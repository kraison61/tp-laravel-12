<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use App\Models\ServiceCategory as Category;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = ['id', 'service_category_id', 'title', 'description', 'h1', 'top_1', 'top_2', 'img_1', 'img_2', 'top_alt', 'bottom_alt'];
        $data = Service::select($columns)->with('category')->get();
        $headers = [
            'service_category_id' => 'หมวดหมู่',
            'title' => 'Title',
            'description' => 'Description',
            'h1' => 'H1-SEO',
            'top_1' => 'หัวข้อ-1',
            'top_2' => 'หัวข้อ-2',
            'img_1' => 'รูปภาพ-1',
            'img_2' => 'รูปภาพ-2',
            'top_alt' => 'alt-รูปภาพ-บน',
            'bottom_alt' => 'alt-รูปภาพ-ล่าง',
        ];
        return view('admin.index', [
            'title' => 'Admin-Service',
            'data' => $data,
            'headers' => $headers,
            'routeBase' => 'admin.service',
            'createRoute' => 'admin.service.create',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service = new Service();
        $categories = Category::all();
        return view('admin.services.index', compact('service', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->service_category_id = $request->input('service_category_id');
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->content_1 = $request->input('content_1');
        $service->content_2 = $request->input('content_2');
        $service->h1 = $request->input('h1');
        $service->top_1 = $request->input('top_1');
        $service->top_2 = $request->input('top_2');
        $service->top_alt = $request->input('top_alt');
        $service->bottom_alt = $request->input('bottom_alt');
        $service->schema_type = $request->input('schema_type');
        $service->is_active = $request->input('is_active', 1);
        $service->rating_value = $request->input('rating_value', 5.00);
        $service->review_count = $request->input('review_count', 0);
        if ($request->hasFile('img_1')) {
            $folder = 'images/services';
            $image = $request->file('img_1');
            $imageName = 'service' . time() . '.' . $image->getClientOriginalExtension();
            try {
                if ($service->img_1) {
                    Storage::disk('s3')->delete($service->img_1);
                }
                Storage::disk('s3')->putFileAs($folder, $image, $imageName);
                $service->img_1 = $folder . '/' . $imageName;
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['img_1' => 'เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ: ' . $e->getMessage()]);
            }
        }
        if ($request->hasFile('img_2')) {
            $folder = 'images/services';
            $image = $request->file('img_2');
            $imageName = 'service' . time() . '.' . $image->getClientOriginalExtension();
            try {
                if ($service->img_2) {
                    Storage::disk('s3')->delete($service->img_2);
                }
                Storage::disk('s3')->putFileAs($folder, $image, $imageName);
                $service->img_2 = $folder . '/' . $imageName;
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['img_2' => 'เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ: ' . $e->getMessage()]);
            }
        }
        // dd($service);
        $service->save();
        return redirect()->route('admin.service.index')->with('success', 'Service created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        $categories = Category::all();
        return view('admin.services.index', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);
        $service->service_category_id = $request->input('service_category_id');
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->content_1 = $request->input('content_1');
        $service->content_2 = $request->input('content_2');
        $service->h1 = $request->input('h1');
        $service->top_1 = $request->input('top_1');
        $service->top_2 = $request->input('top_2');
        $service->top_alt = $request->input('top_alt');
        $service->bottom_alt = $request->input('bottom_alt');
        $service->schema_type = $request->input('schema_type');
        $service->is_active = $request->input('is_active', 1);
        $service->rating_value = $request->input('rating_value', 5.00);
        $service->review_count = $request->input('review_count', 0);

        if ($request->hasFile('img_1')) {
            $folder = 'images/services';
            $image = $request->file('img_1');
            $imageName = 'service' . time() . '_1.' . $image->getClientOriginalExtension();
            try {
                if ($service->img_1) {
                    Storage::disk('s3')->delete($service->img_1);
                }
                Storage::disk('s3')->putFileAs($folder, $image, $imageName);
                $service->img_1 = $folder . '/' . $imageName;
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['img_1' => 'เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ 1: ' . $e->getMessage()]);
            }
        }

        if ($request->hasFile('img_2')) {
            $folder = 'images/services';
            $image = $request->file('img_2');
            $imageName = 'service' . time() . '_2.' . $image->getClientOriginalExtension();
            try {
                if ($service->img_2) {
                    Storage::disk('s3')->delete($service->img_2);
                }
                Storage::disk('s3')->putFileAs($folder, $image, $imageName);
                $service->img_2 = $folder . '/' . $imageName;
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['img_2' => 'เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ 2: ' . $e->getMessage()]);
            }
        }

        $service->save();

        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        // ลบรูปภาพออกจาก S3 (เปลี่ยนจาก public เป็น s3 ให้ตรงกับตอน store)
        if ($service->img_1) {
            Storage::disk('s3')->delete($service->img_1);
        }
        if ($service->img_2) {
            Storage::disk('s3')->delete($service->img_2);
        }
        $service->delete();
        return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully');
    }
}
