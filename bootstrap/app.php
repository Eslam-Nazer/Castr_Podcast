<?php

declare(strict_types=1);

use Castr\Domains\catalog\Console\Commands\FetchPotcastFeed;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            // Static application routes; all public pages.
            Route::middleware('web')
                ->as("static:")
                ->group(base_path("routes" . DIRECTORY_SEPARATOR . "static.php"));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class,
            \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
        ]);

        //
    })
    ->withCommands([
        FetchPotcastFeed::class
    ])
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
