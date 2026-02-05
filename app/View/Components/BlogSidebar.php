<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Blog;

class BlogSidebar extends Component
{
    public $blogs;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->blogs = Blog::latest()
        ->get()
        ->unique('service_category_id')
        ->take(4);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-sidebar');
    }
}
