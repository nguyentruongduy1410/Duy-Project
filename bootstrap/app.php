<?php

use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\View\Middleware\ShareErrorsFromSession;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(EncryptCookies::class);
        $middleware->append(AddQueuedCookiesToResponse::class);
        $middleware->append(StartSession::class);
        $middleware->append(ShareErrorsFromSession::class);
        // $middleware->append(SubstituteBindings::class);
        $middleware->append(VerifyCsrfToken::class);
        $middleware->append(\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class); // QUAN TRỌNG
        $middleware->append(LanguageMiddleware::class);
        // $middleware->append(Authenticate::class);
    })  
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
