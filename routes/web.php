<?php

use App\Http\Controllers\AddProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, "index"])->name('home');

Route::get('/addProduct', [AddProductController::class, "index"])->name('add');


Route::prefix('/product')->group(function () {
    Route::get('/dashboard', [ProductController::class, "index"])->name('productsView');
    Route::post('/store', [ProductController::class, "store"])->name('product.store');
    Route::post('/{product_id}/update', [ProductController::class, "update"])->name('product.update');
    Route::get('/{product_id}/delete', [ProductController::class, "delete"])->name('product.delete');
});

Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, "index"])->name('admin');
    Route::get('/admin/login', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
    // Route::get('/{product_id}/delete', [AdminController::class, "delete"])->name('product.delete');
});
