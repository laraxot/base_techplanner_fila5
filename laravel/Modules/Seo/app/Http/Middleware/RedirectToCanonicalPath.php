<?php

declare(strict_types=1);

namespace Modules\Seo\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Seo\Actions\Url\NormalizeLocalizedPathAction;
use Symfony\Component\HttpFoundation\Response;

/**
 * 301 dalle copie di una pagina (lingua maiuscola, doppio slash, slash finale) alla forma canonica, con la query intatta (DCP-288, FO-6-20).
 * Solo GET e HEAD: un POST non si reindirizza. E' un middleware globale, cosi' agisce prima della ricerca della rotta.
 */
final class RedirectToCanonicalPath
{
    /**
     * @param  Closure(Request):Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->isMethodSafe()) {
            return $next($request);
        }

        $locales = array_map('strval', array_keys((array) config('laravellocalization.supportedLocales', [])));
        $canonical = app(NormalizeLocalizedPathAction::class)->execute($request->getPathInfo(), $locales);
        if ($canonical === null) {
            return $next($request);
        }

        // La query grezza del server: `getQueryString()` riordina i parametri, e il reindirizzamento deve lasciarla com'era.
        $query = $request->server->getString('QUERY_STRING');

        return redirect()->to($canonical.($query !== '' ? '?'.$query : ''), 301);
    }
}
