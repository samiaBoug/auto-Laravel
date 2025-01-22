<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();
Route::prefix('articles')->group(function(){
    Route::get('/',[ ArticleController::class , 'index'])->name('articles.index');
    Route::get('/create',[ ArticleController::class , 'create']);
    Route::post('/store',[ ArticleController::class , 'store']);
    Route::get('/{article}',[ ArticleController::class , 'show']);
    Route::get('/{article}/edit',[ ArticleController::class , 'edit']);
    Route::put('/{article}',[ ArticleController::class , 'update']);
    Route::delete('/{article}',[ ArticleController::class , 'destroy'])->name('articles.destroy');
});
Route::get('/',[ ArticleController::class , 'index']);
