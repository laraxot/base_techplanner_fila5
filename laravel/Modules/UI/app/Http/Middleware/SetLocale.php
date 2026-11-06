<?php

declare(strict_types=1);

namespace Modules\UI\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

final class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, \Closure $next): Response
    {
        // Recupera la lingua dalla sessione/URL o usa quella predefinita
        $locale = $request->route('lang') ?? $request->segment(1);
        if ($request->segment(1) === 'en') {
            $locale = 'en';
        }
        if (! is_string($locale) || ! in_array($locale, ['it', 'en'], true)) {
            $locale = Session::get('locale', config('app.locale'));
        }
        if (! is_string($locale)) {
            $locale = Config::string('app.locale');
        }
        // Imposta la lingua e salva in sessione
        App::setLocale($locale);
        Session::put('locale', $locale);

        $response = $next($request);
<<<<<<< HEAD
        if (! $response instanceof Response) {
<<<<<<< .merge_file_gZXYJi
            throw new RuntimeException('Middleware must return a Response instance');
=======
=======
        if (! ($response instanceof Response)) {
>>>>>>> 6ed19256f (.)
            throw new \RuntimeException('Middleware must return a Response instance');
>>>>>>> .merge_file_YA5VQ1
        }

        return $response;
    }
}
