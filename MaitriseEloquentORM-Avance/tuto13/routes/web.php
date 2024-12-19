<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;
use App\Http\Controllers\DashboardController ;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard' , [DashboardController::class, 'dashboard'])->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
