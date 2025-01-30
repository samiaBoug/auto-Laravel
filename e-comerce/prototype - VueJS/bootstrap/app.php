<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //

    })
    ->withMiddleware(fn (Middleware $middleware) => $middleware
    ->statefulApi(EnsureFrontendRequestsAreStateful::class) // Ajout de Sanctum ici
)
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
