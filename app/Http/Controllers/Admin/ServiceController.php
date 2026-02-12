<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = ['service_category_id', 'title', 'description', 'h1','top_1','top_2','img_1','img_2','top_alt','bottom_alt'];
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
