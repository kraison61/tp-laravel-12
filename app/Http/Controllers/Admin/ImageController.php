<?php

namespace App\Http\Controllers\Admin;
use App\Models\ImageUpload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {
        // $columns = ['id', 'service_id', 'img_url', 'location'];
        // $data = ImageUpload::select($columns)->with('category')->orderBy('service_id', 'asc')->get();
        // $headers = [
        //     'service_id' => 'บริการ',
        //     'img_url' => 'รูปภาพ',
        //     'location' => 'สถานที่'
        // ];
        // return view('admin.index', [
        //     'title' => 'Admin-ImageUploads',
        //     'data' => $data,
        //     'headers' => $headers,
        //     'routeBase' => 'admin.image',
        //     'createRoute' => 'admin.image.create',
        // ]);
        return view('admin.images.index', [
            'id' => $id,
            'title' => 'Admin-ImageUploads',
            'routeBase' => 'admin.photo',
            'createRoute' => 'admin.photo.create',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $image = new ImageUpload();
        $categories = \App\Models\ServiceCategory::all();
        $phases = \App\Models\ProjectPhase::with('project')->get();
        return view('admin.images.create', compact('image', 'categories', 'phases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = new ImageUpload();
        $request->validate([
            'service_id' => 'required|exists:service_categories,id',
            'phase_id' => 'nullable|integer',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'location' => 'required|string|max:255',
        ]);
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('images/gallery', $fileName, 's3');

                ImageUpload::create([
                    'service_id' => $request->service_id,
                    'phase_id' => $request->phase_id ?? 0,
                    'img_url' => $path,
                    'location' => $request->location,
                ]);
            }
            return redirect()->route('admin.photo.index')->with('success', 'อัปโหลดรูปภาพ 1 โพสต์หลายไฟล์เรียบร้อยแล้ว');
        }

        return back()->withErrors(['photos' => 'กรุณาเลือกไฟล์ภาพอย่างน้อย 1 ไฟล์'])->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $images = ImageUpload::where('service_id', $id)->paginate(15);
        return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = ImageUpload::findOrFail($id);
        return view('admin.images.index', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = ImageUpload::findOrFail($id);

        // ลบไฟล์ออกจาก S3
        if (Storage::disk('s3')->exists($image->img_url)) {
            Storage::disk('s3')->delete($image->img_url);
        }

        $image->delete();

        return back()->with('success', 'ลบรูปภาพเรียบร้อยแล้ว');
    }
}
