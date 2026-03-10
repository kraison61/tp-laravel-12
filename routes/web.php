<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\HomeController as FrontHomeController;
use App\Http\Controllers\Front\PageController as FrontPageController;
use App\Http\Controllers\Front\BlogController as FrontBlogController;
use App\Http\Controllers\Front\GalleryController as FrontGalleryController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;


// 1. Route ที่เป็นชื่อเฉพาะ (Static) ต้องอยู่บนสุด
Route::get('/', [FrontHomeController::class, 'index'])->name('home');
Route::get('/contact-us', [FrontHomeController::class, 'contactUs'])->name('contact');
Route::get('/about-us', [FrontHomeController::class, 'aboutUs'])->name('about');




// Gallery Routes
Route::prefix('gallery')->group(function () {
    Route::get('/{id?}', [FrontGalleryController::class, 'index'])->name('gallery.index');
});

//Admin Route
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/services', [AdminServiceController::class, 'index'])->name('admin.service.index');
    // Route::get('/blogs',[AdminBlogController::class,'index'])->name('admin.blog.index');
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/faqs', [\App\Http\Controllers\Admin\FaqController::class, 'index'])->name('admin.faq.index');
});
Route::prefix('admin/blog')->group(
    function () {
        Route::get('/', [AdminBlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/create', [AdminBlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/store', [AdminBlogController::class, 'store']);
        Route::get('/edit', [AdminBlogController::class, 'edit'])->name('admin.blog.edit');
    }
);

// Blog Routes
Route::prefix('blogs')->group(function () {
    Route::get('/', [FrontBlogController::class, 'index'])->name('blog.index');
    Route::get('/category/{id}', [FrontBlogController::class, 'index'])->name('blog.filter');
    Route::get('/{blog}', [FrontBlogController::class, 'show'])->name('blog.show');
});


//  Route ที่เป็นตัวแปรแบบกว้างมากๆ ({slug}) "ต้องอยู่ล่างสุดเสมอ"
Route::prefix('services')->group(function () {
    Route::get('/', [FrontPageController::class, 'index'])->name('services.index');
    Route::get('/calculate', [FrontHomeController::class, 'soilCalculate'])->name('calculate');
});
Route::get('/{slug}', [FrontPageController::class, 'show'])->name('service.show');

// Route::fallback(function () {
//     return redirect()->route('home');
// });

Route::fallback(function (Request $request) {

    // 1. ดึง URL ทั้งหมดมาถอดรหัส (รวมถึงพารามิเตอร์หลัง ?)
    $fullUrl = urldecode($request->fullUrl());

    // 2. ตรวจสอบเงื่อนไขบทความ "เทปูน 1 คิว"
    // เราใช้การเช็คคำสำคัญ (Keywords) เพื่อให้ครอบคลุมทั้งลิงก์ที่มีช่องว่าง หรือ %3F (?)
    if (Str::contains($fullUrl, 'เทปูน') && Str::contains($fullUrl, '1 คิว') && Str::contains($fullUrl, 'คำนวณวัสดุ')) {

        // 3. ปลายทางที่ต้องการ (blogs แบบมี s และใช้ขีดแทนช่องว่าง)
        $destination = 'https://www.theeraphong.com/blogs/เทปูน-1-คิว-ใช้ปูนกี่ถุง-คำนวณวัสดุและต้นทุนอย่างมืออาชีพ';

        // 4. สั่ง 301 Permanent Redirect (สำคัญมากต่อ SEO)
        return redirect()->to($destination, 301);
    }

    // หากไม่ตรงเงื่อนไขใดๆ ให้แสดงหน้า 404 ตามมาตรฐาน
    abort(404);
});
