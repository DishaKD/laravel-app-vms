<?php

use App\Http\Controllers\AddProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, "index"]) -> name ('home');

Route::get('/addProduct', [AddProductController::class, "index"]) -> name ('add');


Route::prefix('/product')->group(function (){
    Route::get('/dashboard', [ProductController::class, "index"]) -> name ('productsView');
    Route::post('/store', [ProductController::class, "store"]) -> name ('product.store');
    Route::get('/{product_id}/delete', [ProductController::class, "delete"]) -> name ('product.delete');
});
