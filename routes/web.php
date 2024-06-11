<?php

use App\Http\Controllers\AddProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, "index"]) -> name ('home');

Route::get('/addProduct', [AddProductController::class, "index"]) -> name ('add');

