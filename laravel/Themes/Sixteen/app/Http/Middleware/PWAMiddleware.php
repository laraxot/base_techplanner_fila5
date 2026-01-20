<?php

declare(strict_types=1);

namespace Themes\Sixteen\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware per gestire le richieste PWA
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> 4b6b99016 (first commit)
 * Aggiunge header necessari per il funzionamento
 * della Progressive Web App e gestisce il caching.
 */
class PWAMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
<<<<<<< HEAD

        // Aggiungi header PWA
        $this->addPWAHeaders($response);

        // Gestisci caching per risorse statiche
        $this->handleCaching($request, $response);

        // Gestisci offline fallback
        $this->handleOfflineFallback($request, $response);

        return $response;
    }

=======
        
        // Aggiungi header PWA
        $this->addPWAHeaders($response);
        
        // Gestisci caching per risorse statiche
        $this->handleCaching($request, $response);
        
        // Gestisci offline fallback
        $this->handleOfflineFallback($request, $response);
        
        return $response;
    }
    
>>>>>>> 4b6b99016 (first commit)
    /**
     * Aggiungi header necessari per PWA
     */
    private function addPWAHeaders(Response $response): void
    {
        // Header per PWA
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
<<<<<<< HEAD

        // Header per Service Worker
        $response->headers->set('Service-Worker-Allowed', '/');

        // Header per manifest
        $response->headers->set('Link', '</manifest.json>; rel="manifest"');

        // Header per viewport mobile
        if ($response->headers->has('Content-Type') &&
=======
        
        // Header per Service Worker
        $response->headers->set('Service-Worker-Allowed', '/');
        
        // Header per manifest
        $response->headers->set('Link', '</manifest.json>; rel="manifest"');
        
        // Header per viewport mobile
        if ($response->headers->has('Content-Type') && 
>>>>>>> 4b6b99016 (first commit)
            str_contains($response->headers->get('Content-Type'), 'text/html')) {
            $this->addViewportMeta($response);
        }
    }
<<<<<<< HEAD

=======
    
>>>>>>> 4b6b99016 (first commit)
    /**
     * Gestisci caching per risorse statiche
     */
    private function handleCaching(Request $request, Response $response): void
    {
        $path = $request->path();
<<<<<<< HEAD

        // Cache per risorse statiche
        if ($this->isStaticResource($path)) {
            $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
            $response->headers->set('Expires', gmdate('D, d M Y H:i:s', time() + 31536000).' GMT');
        }

=======
        
        // Cache per risorse statiche
        if ($this->isStaticResource($path)) {
            $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
            $response->headers->set('Expires', gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
        }
        
>>>>>>> 4b6b99016 (first commit)
        // Cache per API
        if (str_starts_with($path, 'api/')) {
            $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', '0');
        }
<<<<<<< HEAD

=======
        
>>>>>>> 4b6b99016 (first commit)
        // Cache per pagine HTML
        if ($this->isPageRequest($request)) {
            $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        }
    }
<<<<<<< HEAD

=======
    
>>>>>>> 4b6b99016 (first commit)
    /**
     * Gestisci fallback offline
     */
    private function handleOfflineFallback(Request $request, Response $response): void
    {
        // Solo per richieste GET di pagine
<<<<<<< HEAD
        if ($request->method() !== 'GET' || ! $this->isPageRequest($request)) {
            return;
        }

        // Aggiungi meta tag per offline
        if ($response->headers->has('Content-Type') &&
=======
        if ($request->method() !== 'GET' || !$this->isPageRequest($request)) {
            return;
        }
        
        // Aggiungi meta tag per offline
        if ($response->headers->has('Content-Type') && 
>>>>>>> 4b6b99016 (first commit)
            str_contains($response->headers->get('Content-Type'), 'text/html')) {
            $this->addOfflineMeta($response);
        }
    }
<<<<<<< HEAD

=======
    
>>>>>>> 4b6b99016 (first commit)
    /**
     * Aggiungi meta tag viewport
     */
    private function addViewportMeta(Response $response): void
    {
        $content = $response->getContent();
<<<<<<< HEAD

=======
        
>>>>>>> 4b6b99016 (first commit)
        // Verifica se viewport meta è già presente
        if (str_contains($content, 'name="viewport"')) {
            return;
        }
<<<<<<< HEAD

        // Aggiungi viewport meta tag
        $viewportMeta = '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">';

        // Inserisci dopo <head>
        $content = str_replace('<head>', "<head>\n    {$viewportMeta}", $content);

        $response->setContent($content);
    }

=======
        
        // Aggiungi viewport meta tag
        $viewportMeta = '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">';
        
        // Inserisci dopo <head>
        $content = str_replace('<head>', "<head>\n    {$viewportMeta}", $content);
        
        $response->setContent($content);
    }
    
>>>>>>> 4b6b99016 (first commit)
    /**
     * Aggiungi meta tag per offline
     */
    private function addOfflineMeta(Response $response): void
    {
        $content = $response->getContent();
<<<<<<< HEAD

=======
        
>>>>>>> 4b6b99016 (first commit)
        // Meta tag per PWA
        $pwaMeta = implode("\n    ", [
            '<meta name="theme-color" content="#0066cc">',
            '<meta name="apple-mobile-web-app-capable" content="yes">',
            '<meta name="apple-mobile-web-app-status-bar-style" content="default">',
            '<meta name="apple-mobile-web-app-title" content="FixCity">',
            '<meta name="msapplication-TileColor" content="#0066cc">',
<<<<<<< HEAD
            '<meta name="msapplication-config" content="/browserconfig.xml">',
        ]);

        // Inserisci prima di </head>
        $content = str_replace('</head>', "    {$pwaMeta}\n</head>", $content);

        $response->setContent($content);
    }

=======
            '<meta name="msapplication-config" content="/browserconfig.xml">'
        ]);
        
        // Inserisci prima di </head>
        $content = str_replace('</head>', "    {$pwaMeta}\n</head>", $content);
        
        $response->setContent($content);
    }
    
>>>>>>> 4b6b99016 (first commit)
    /**
     * Verifica se è una risorsa statica
     */
    private function isStaticResource(string $path): bool
    {
        $staticExtensions = ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'svg', 'ico', 'woff', 'woff2', 'ttf', 'eot'];
<<<<<<< HEAD

        foreach ($staticExtensions as $ext) {
            if (str_ends_with($path, '.'.$ext)) {
                return true;
            }
        }

        return false;
    }

=======
        
        foreach ($staticExtensions as $ext) {
            if (str_ends_with($path, '.' . $ext)) {
                return true;
            }
        }
        
        return false;
    }
    
>>>>>>> 4b6b99016 (first commit)
    /**
     * Verifica se è una richiesta di pagina
     */
    private function isPageRequest(Request $request): bool
    {
<<<<<<< HEAD
        return $request->header('Accept') &&
=======
        return $request->header('Accept') && 
>>>>>>> 4b6b99016 (first commit)
               str_contains($request->header('Accept'), 'text/html');
    }
}
