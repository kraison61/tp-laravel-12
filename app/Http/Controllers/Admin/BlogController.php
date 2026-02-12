<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = ['service_category_id', 'title', 'description','image','slug'];
        $data = Blog::select($columns)->with('serviceCategory')->get();
        $headers = [
            'service_category_id' => 'หมวดหมู่',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'รูปภาพ',
            'slug' => 'Slug-SEO',
        ];
        // dd($data);
        return view('admin.index',[
            'title' => 'Admin-Service',
            'data' => $data,
            'headers' => $headers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
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
