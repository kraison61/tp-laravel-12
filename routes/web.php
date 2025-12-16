<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/contact-us', [HomeController::class,'contact'])->name('contact');

Route::prefix('service')->group(function(){
    Route::get('/service1',[PageController::class,'index'])->name('service.index');
    Route::get('/{id}',[PageController::class,'show'])->name('service.show');
});
