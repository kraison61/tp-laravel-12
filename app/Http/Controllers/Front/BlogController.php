<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index($id = null)
    {
        //
        if($id){
            $blogs = Blog::where('service_category_id', $id)->latest()->paginate(8);

        }
        else{
            $blogs = Blog::latest()->paginate(8);
        }
        $allBlogs = Blog::latest()
            ->get()
            ->unique('service_category_id')
            ->take(4);
        return view('blogs.index',compact('blogs'));

    }

    // public function show(string $id)
    public function show(Blog $blog)
    {
        // $blog=Blog::findOrFail($id);
        // return view('blogs.show',compact('blog'));
        return view('blogs.show',compact('blog'));
    }
}
