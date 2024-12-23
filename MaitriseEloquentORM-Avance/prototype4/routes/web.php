<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard' , function(){
return view('admin.dashboard');
});

Route::get('/test' , function(){
    return 'hi admin';
    })->middleware('role:admin');

