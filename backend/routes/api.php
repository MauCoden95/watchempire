<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(ProductController::class)->group(function () {
    Route::get('/random-products', 'randomProducts');
    Route::get('/one-product', 'oneProduct');
    Route::get('/all-products', 'allProducts');
    Route::get('/data-product/{id}', 'dataProduct');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/analogical', 'getAnalogicalWatchs');
    Route::get('/wall', 'getWallWatchs');
    Route::get('/luxury', 'getLuxuryWatchs');
    Route::get('/smartwatch', 'getSmartWatchs');
});


Route::group(['middleware'=>'api'], function ($routes) {
    Route::post('/register/verify/{code}', [UserController::class,'verify']);
    Route::post('/register', [UserController::class,'register']);
    Route::post('/login', [UserController::class,'login']);
});