<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'home']);

Route::prefix('service')->group(function(){
    Route::get('/service1',[PageController::class,'service1']);
});
