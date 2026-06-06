<?php

declare(strict_types=1);

namespace Modules\Xot\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Webmozart\Assert\Assert;

        // Skip security headers for Debugbar routes in local environment
        // to allow Debugbar to function properly
        if (! $this->isDebugbarRoute($request) || ! app()->environment('local')) {
            $this->addSecurityHeaders($response);
        }

        // 3. Logging sicurezza
        $this->logSecurityEvents($request, $response);

        // 4. Validazione input avanzata
        $this->validateInputs($request);

        // 5. Protezione CSRF avanzata
        $this->enhanceCSRFProtection($request);

        return $response;
    }

    /**
* Check if the request is for Debugbar routes.
     */
    private function isDebugbarRoute(Request $request): bool
    {
        $debugbarPrefix = (string) config('debugbar.route_prefix', '_debugbar');

        return str_starts_with($request->path(), $debugbarPrefix)
            || str_starts_with($request->path(), 'vendor/debugbar')
            || str_contains($request->path(), '_debugbar');
    }

    /**
        if ($response->getStatusCode() === 401 || $response->getStatusCode() === 403) {
            Log::warning('Failed access attempt', $securityData);
        }

        // Log errori server
        if ($response->getStatusCode() >= 500) {
            Log::error('Server error', $securityData);
        }
    }

    /**
     * Verifica se la richiesta è sospetta.
     */
    private function isSuspiciousRequest(Request $request, Response $response): bool
    {
        // Pattern sospetti negli URL
        $suspiciousPatterns = [
            '/\.\.\//',           // Directory traversal
            '/<script/i',         // XSS attempts
            '/union\s+select/i',  // SQL injection
            '/eval\s*\(/i',       // Code injection
            '/base64_decode/i',   // PHP code injection
            '/system\s*\(/i',     // Command injection
            '/exec\s*\(/i',       // Command injection
            '/shell_exec/i',      // Command injection
        ];

        $url = $request->fullUrl();
        $input = $request->all();

        foreach ($suspiciousPatterns as $pattern) {
            $jsonInput = json_encode($input);
            if (preg_match($pattern, $url) || preg_match($pattern, $jsonInput)) {
                return true;
            }
        }

        // User Agent sospetti
        $userAgent = $request->userAgent();
        $suspiciousUserAgents = [
            'sqlmap',
            'nikto',
            'nmap',
            'masscan',
            'zap',
            'burp',
            'w3af',
            'acunetix',
            'nessus',
            'openvas',
        ];

        foreach ($suspiciousUserAgents as $suspicious) {
if ($userAgent !== null && stripos($userAgent, $suspicious) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Valida input avanzata.
     */
    private function validateInputs(Request $request): void
    {
        $inputs = $request->all();

        foreach ($inputs as $key => $value) {
if ($value !== null && is_string($value)) {
                $this->validateStringInput($key, $value);
            } elseif (is_array($value)) {
                $this->validateArrayInput($key, $value);
            }
        }
    }

    /**
     * Valida input stringa.
     */
    private function validateStringInput(string $key, string $value): void
    {
        // Controlla lunghezza eccessiva
        if (strlen($value) > 10000) {
            Log::warning('Suspicious input length', [
                'key' => $key,
                'length' => strlen($value),
            ]);
            abort(400, 'Input too long');
        }

        // Controlla caratteri sospetti
        $suspiciousChars = ['<', '>', '"', "'", '&', ';', '(', ')', '{', '}', '[', ']'];
        $suspiciousCount = 0;

        foreach ($suspiciousChars as $char) {
            $suspiciousCount += substr_count($value, $char);
        }

        if ($suspiciousCount > 10) {
            Log::warning('Suspicious input characters', [
                'key' => $key,
                'suspicious_count' => $suspiciousCount,
            ]);
        }
    }

    /**
     * Valida input array.
     */
    private function validateArrayInput(string $key, array $value): void
    {
        // Controlla profondità array
        if ($this->getArrayDepth($value) > 10) {
            Log::warning('Suspicious array depth', [
                'key' => $key,
                'depth' => $this->getArrayDepth($value),
            ]);
            abort(400, 'Array too deep');
        }

        // Controlla dimensione array
        if (count($value) > 1000) {
            Log::warning('Suspicious array size', [
                'key' => $key,
                'size' => count($value),
            ]);
            abort(400, 'Array too large');
        }
    }

    /**
     * Ottieni profondità array.
     */
    private function getArrayDepth(array $array): int
    {
        $maxDepth = 1;

        foreach ($array as $value) {
            if (is_array($value)) {
                $depth = $this->getArrayDepth($value) + 1;
                if ($depth > $maxDepth) {
                    $maxDepth = $depth;
                }
            }
        }

        return $maxDepth;
    }

    /**
     * Migliora protezione CSRF.
     */
    private function enhanceCSRFProtection(Request $request): void
    {
        // Verifica token CSRF per richieste POST/PUT/DELETE
        if (in_array($request->method(), ['POST', 'PUT', 'DELETE', 'PATCH'])) {
            $token = $request->header('X-CSRF-TOKEN') ?: $request->input('_token');

            if (! $token || ! hash_equals(session()->token(), (string) $token)) {
                Log::warning('CSRF token mismatch', [
                    'ip' => $request->ip(),
                    'method' => $request->method(),
                    'url' => $request->fullUrl(),
                    'user_id' => auth()->id(),
                ]);

                abort(419, 'CSRF token mismatch');
            }
        }

        // Verifica referer per richieste sensibili
        if (in_array($request->method(), ['POST', 'PUT', 'DELETE', 'PATCH'])) {
            $referer = $request->header('referer');
            $host = $request->getHost();

            if ($referer && ! str_starts_with($referer, $request->getSchemeAndHttpHost())) {
                Log::warning('Suspicious referer', [
                    'ip' => $request->ip(),
                    'referer' => $referer,
                    'host' => $host,
                ]);

                abort(403, 'Invalid referer');
            }
        }
    }
}
