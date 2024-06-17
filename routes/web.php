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
    Route::post('/{product_id}/updateStatus', [ProductController::class, "updateStatus"])->name('product.status');
    Route::get('/{product_id}/delete', [ProductController::class, "delete"])->name('product.delete');
});



Route::prefix('/admin')->group(function () {
    Route::get('/login', [AdminController::class, "index"])->name('admin');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::get('/dashboard', [AdminController::class, "dashboard"])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, "logout"])->name('admin.logout');
    Route::get('/adminDashboard/orders', [AdminController::class, "orders"])->name('admin.orders');
    Route::get('/admin/generate-order-report', [AdminController::class, 'generateOrderReport'])
        ->name('admin.generate.order.report');
    Route::get('/adminDashboard/products', [AdminController::class, "products"])->name('admin.products');
    Route::get('/adminDashboard/products/create', [AdminController::class, "AddProduct"])->name('admin.addProducts');
    Route::post('/admin/products/store', [AdminController::class, "store"])->name('admin.products.store');
    Route::post('/admin/{product_id}/update', [AdminController::class, "update"])->name('admin.product.update');
    Route::get('/admin/{product_id}/delete', [AdminController::class, "delete"])->name('admin.product.delete');
    Route::get('/admin/generate-product-report', [AdminController::class, 'generateProductReport'])
        ->name('admin.generate.product.report');
});
