<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = ['id', 'name', 'slug'];
        $data = ServiceCategory::select($columns)->orderBy('name', 'asc')->get();
        $headers = [
            'id' => 'id',
            'name' => 'ชื่อ',
            'slug' => 'Slug-SEO'
        ];
        return view('admin.index', [
            'title' => 'Admin-ServiceCategories',
            'data' => $data,
            'headers' => $headers,
            'routeBase' => 'admin.category',
            'createRoute' => 'admin.category.create',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new ServiceCategory();
        return view('admin.categories.index', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $category = new ServiceCategory();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Category created successfully');
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
        $category = ServiceCategory::findOrFail($id);
        return view('admin.categories.index', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = ServiceCategory::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');

        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ServiceCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully');
    }
}
