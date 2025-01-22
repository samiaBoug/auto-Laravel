<?php

use App\Models\Product;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class , 'index']);

Route::resource('/admin/products' , ProductController::class);
