<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;


// 1. Route ที่เป็นชื่อเฉพาะ (Static) ต้องอยู่บนสุด
Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/contact-us', [HomeController::class,'contact'])->name('contact');

// 2. Route กลุ่ม images (ย้ายมาไว้ก่อน {slug})
Route::prefix('gallery')->group(function(){
    Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
});

Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('gallery.index');
});



Route::prefix('blog')->group(function(){
    Route::get('/',[BlogController::class,'index'])->name('blog.index');
});


//  Route ที่เป็นตัวแปรแบบกว้างมากๆ ({slug}) "ต้องอยู่ล่างสุดเสมอ"
Route::get('/{slug}', [PageController::class,'show'])->name('service.show');
