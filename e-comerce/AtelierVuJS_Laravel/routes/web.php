<?php

use Illuminate\Support\Facades\Route;

Route::get('/testme', function () {
    return response()->json(['message' => 'Hello from Laravel!']);
});

Route::get('/', function(){
    return view('welcome');
});