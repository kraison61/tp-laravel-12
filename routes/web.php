<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/contact-us', [HomeController::class,'contact'])->name('contact');

Route::prefix('images')->group(function(){
    Route::get('/image',[ImageController::class,'index'])->name('image.index');
    Route::get('/load-more', [ImageController::class, 'loadMore'])->name('image.load-more');
    // Route::get('/{id}',[ImageController::class,'show'])->name('image.show');

});

//services
Route::get('/{slug}',[PageController::class,'show'])->name('service.show');
