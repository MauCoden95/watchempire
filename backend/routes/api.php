<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(ProductController::class)->group(function () {
    Route::get('/random-products', 'randomProducts');
    Route::get('/one-product', 'oneProduct');
    Route::get('/all-products', 'allProducts');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/analogical', 'getAnalogicalWatchs');
    Route::get('/wall', 'getWallWatchs');
    Route::get('/luxury', 'getLuxuryWatchs');
    Route::get('/smartwatch', 'getSmartWatchs');
});