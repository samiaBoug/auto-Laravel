<?php

namespace App\Providers;

use App\Policies\ArticlePolicy;
use Illuminate\Support\ServiceProvider;
use App\Models\Article;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    protected $policies = [
        Article::class => ArticlePolicy::class ,
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
       
    }
}
