<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;

use App\Http\Controllers\DashboardController ;
use App\Models\Article;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth' , 'role:admin'
])->group(function(){
    Route::get('/admin', function(){
        return 'Admin Dashboard' ;
    });
});
Route::get('/settings' , function(){
    return 'Settings Page ' ;
})->middleware(['auth' , 'role:admin']);

Route::get('/manager', function(){
    return 'liste des utilisateur';
})->middleware('role:manager' , 'auth');

Route::get('/dashboard', function(){
    return 'permission is working';
})->middleware('permission:view dashboard');

Route::get('/where', function(){
    $article = Article::where('id' , 1)->get();
    echo 'article 1 :' ;
    print_r($article);

    $articles = Article::whereBetween('created_at', ['2024-01-01', '2024-12-31'])->get();

    $articles = Article::whereNotIn('category_id', [4, 5])->get();

    $articles = Article::orderBy('created_at', 'desc')->get();

    $articles = Article::paginate(10);
    print_r($articles);
});