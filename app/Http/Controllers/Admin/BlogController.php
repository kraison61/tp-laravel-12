<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = ['service_category_id', 'title', 'description', 'image', 'slug', 'content'];
        $data = Blog::select($columns)->with('category')->get();
        $headers = [
            'service_category_id' => 'หมวดหมู่',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'รูปภาพ',
            'slug' => 'Slug-SEO',
        ];
        // dd($data);
        return view('admin.index', [
            'title' => 'Admin-Blog',
            'data' => $data,
            'headers' => $headers,
            'createRoute' => 'admin.blog.create',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog = new Blog();
        $categories = ServiceCategory::select('id', 'name')->get();
        return view('admin.blogs.create', compact('categories', 'blog'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'service_category_id' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->slug = $request->input('slug');
        $blog->service_category_id = $request->input('service_category_id');
        $blog->description = $request->input('description');
        $blog->content = $request->input('content');
        if ($request->hasFile('image')) {
            $folder = 'images/blogs';
            $image = $request->file('image');
            $imageName = 'blog' . time() . '.' . $image->getClientOriginalExtension();

            try {
                // Delete old image if exists
                if ($blog->image) {
                    Storage::disk('s3')->delete($blog->image);
                }

                // Upload new image
                Storage::disk('s3')->putFileAs($folder, $image, $imageName);

                // Save path to DB
                $blog->image = $folder . '/' . $imageName;
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['image' => 'เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ: ' . $e->getMessage()]);
            }
        }

        $blog->save();
        return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully');
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
        $blog = Blog::where('slug', $id)->firstOrFail();
        $categories = ServiceCategory::select('id', 'name')->get();

        return view('admin.blogs.edit', compact('categories', 'blog'));
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
