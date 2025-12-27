<?php

use App\Http\Controllers\Api\GalleryController;
use Illuminate\Support\Facades\Route;

Route::get('/gallery-images', [GalleryController::class, 'getImages']);
