<?php

namespace App\Http\Controllers\Admin;
use App\Models\ImageUpload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $columns = ['id', 'service_id', 'img_url', 'location'];
        $data = ImageUpload::select($columns)->with('category')->orderBy('service_id', 'asc')->get();
        $headers = [
            'service_id' => 'บริการ',
            'img_url' => 'รูปภาพ',
            'location' => 'สถานที่'
        ];
        return view('admin.index', [
            'title' => 'Admin-ImageUploads',
            'data' => $data,
            'headers' => $headers,
            'routeBase' => 'admin.image',
            'createRoute' => 'admin.image.create',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $image = new ImageUpload();
        return view('admin.images.index', compact('image'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = new ImageUpload();
        $request->validate([
            'service_id'=>'required|exists:service_categories,id',
            'photos.*'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'location'=>'required|string|max:255',
        ]);
        if($request->hasFile('photos')){
            foreach ($request->file('photos') as $file) {
                $fileName = time().'_'.Str::random(10).'.'.$file->getClientOriginalExtension();
                $path = $file->storeAs('images/gallery', $fileName,'s3');
            }
            ImageUpload::create([
                'service_id'=>$request->service_id,
                'img_url'=>$path,
                'location'=>$request->location,
            ]);
            return redirect()->route('admin.image.index')->with('success','Image uploaded successfully');
        }
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
        //
    }
}
