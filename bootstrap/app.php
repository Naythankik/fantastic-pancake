<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            $api_routes_path = base_path('routes/api.php');
            $api_routes = glob("$api_routes_path", GLOB_BRACE);
            array_walk($api_routes, function ($route) use ($api_routes_path) {
                $prefix = substr($route, strlen($api_routes_path) + 1, -4);
                Route::prefix("api/$prefix")
                    ->group($route);
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
