<?php

use App\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Host accettati: APP_URL e i suoi sottodomini (default di TrustHosts, SEC-007/018). Un Host ostile riceve 400 prima del
        // routing invece di finire in canonical, sitemap e Location. Inattivo in ambiente `local` e nei test (vedi TrustHosts).
        // Altri domini serviti dallo stesso codice: `trustHosts(at: [...])`. In produzione APP_URL deve essere il dominio reale.
        $middleware->trustHosts();
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
