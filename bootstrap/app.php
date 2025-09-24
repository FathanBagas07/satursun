<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;   
use Illuminate\Foundation\Configuration\Exceptions;
use App\Http\Middleware\EnsureUserRole;            

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
             'role' => \App\Http\Middleware\EnsureUserRole::class,
        ]);

        // (Opsional) bikin group jika mau dipakai singkat:
        // $middleware->group('poster', ['auth', 'role:poster']);
        // $middleware->group('freelancer', ['auth', 'role:freelancer']);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
