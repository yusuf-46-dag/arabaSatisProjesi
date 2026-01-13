<?php

use App\Http\Middleware\isAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            // Hem isAuth hem kayitliMi olarak kullanabilmek için ikisini de ekleyebilirsin
            // Ama web.php'de 'isAuth' yazdığın için burası mutlaka olmalı:
            'isAuth' => \App\Http\Middleware\isAuth::class, 
            'kayitliMi' => \App\Http\Middleware\isAuth::class,
            'isAdmin' => isAdmin::class,
            'roleredirect' => roleredirect::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
