<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController as FrontHomeController;
use App\Http\Controllers\Front\PageController as FrontPageController;
use App\Http\Controllers\Front\BlogController as FrontBlogController;
use App\Http\Controllers\Front\GalleryController as FrontGalleryController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;


// 1. Route ที่เป็นชื่อเฉพาะ (Static) ต้องอยู่บนสุด
Route::get('/', [FrontHomeController::class,'index'])->name('home');
Route::get('/contact-us', [FrontHomeController::class,'contactUs'])->name('contact');
Route::get('/about-us', [FrontHomeController::class,'aboutUs'])->name('about');




// Gallery Routes
Route::prefix('gallery')->group(function(){
    Route::get('/{id?}', [FrontGalleryController::class, 'index'])->name('gallery.index');
});

//Admin Route
Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::get('/services',[AdminServiceController::class,'index'])->name('admin.service.index');
    Route::get('/blogs',[AdminBlogController::class,'index'])->name('admin.blog.index');
    Route::get('/categories',[AdminCategoryController::class,'index'])->name('admin.category.index');

});


// Blog Routes
Route::prefix('blogs')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('blog.index');
    Route::get('/category/{id}',[FrontBlogController::class,'index'])->name('blog.filter');
    Route::get('/{blog}',[FrontBlogController::class,'show'])->name('blog.show');
});


//  Route ที่เป็นตัวแปรแบบกว้างมากๆ ({slug}) "ต้องอยู่ล่างสุดเสมอ"
Route::prefix('services')->group(function(){
    Route::get('/', [FrontPageController::class,'index'])->name('services.index');
    Route::get('/calculate', [FrontHomeController::class,'soilCalculate'])->name('calculate');
});
Route::get('/{slug}', [FrontPageController::class,'show'])->name('service.show');
