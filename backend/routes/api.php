<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DesiredController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SalesProductController;



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

Route::controller(DesiredController::class)->group(function () {
    Route::post('/toggle-desired/{user_id}/{product_id}', 'toggleDesired');
    Route::get('/desired-products/{user_id}', [DesiredController::class, 'getDesiredProducts']);
    Route::get('/get-desired-products-by-userid/{user_id}', [DesiredController::class, 'getDesiredProductsByUserId']);
});


Route::group(['middleware'=>'api'], function ($routes) {
    Route::post('/register/verify/{code}', [UserController::class,'verify']);
    Route::post('/register', [UserController::class,'register']);
    Route::post('/login', [UserController::class,'login']);
});


Route::group(['middleware'=>'api'], function ($routes) {
    Route::post('/store_sale', [SaleController::class,'store']);
    Route::get('/get_sales_by_user_id/{id}', [SaleController::class,'getSalesByUserID']);
});


Route::group(['middleware'=>'api'], function ($routes) {
    Route::post('/store_sales_product', [SalesProductController::class,'store']);
    Route::get('/user/{userId}/sale/{saleId}/products', [SalesProductController::class, 'getProductsByUserAndSale']);

});
