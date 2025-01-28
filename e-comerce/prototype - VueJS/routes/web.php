<?php

use App\Models\Product;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::resource('/products' , ProductController::class);

Auth::routes();


Route::get('/' , function(){
    return view('welcome');
});
