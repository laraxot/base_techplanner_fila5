<?php

declare(strict_types=1);

namespace Themes\Sixteen\Filters;

use Illuminate\Support\Facades\Request;
use Themes\Sixteen\Contracts\MenuFilterInterface;

use function Safe\parse_url;
use function Safe\preg_match;

                if (! is_string($activeUrl)) {
                    continue;
                }
                if ($this->matchesPattern($currentPath, $activeUrl) ||
                    $this->matchesPattern($currentUrl, $activeUrl)) {
                    return true;
                }
            }
        }

        // Se ha una route specifica per l'active state
        if (isset($item['active_route'])) {
            return Request::routeIs($item['active_route']);
        }

        // Se non ha URL, non può essere attivo
        if (! isset($item['url'])) {
            return false;
        }

        $itemUrl = $item['url'];

if (! is_string($itemUrl)) {
            return false;
        }

        // Rimuovi il domain per confronto
        if (str_starts_with($itemUrl, 'http')) {
            $parsedUrl = parse_url($itemUrl, PHP_URL_PATH);
            $itemUrl = is_string($parsedUrl) && $parsedUrl !== '' ? $parsedUrl : '/';
        }

        // Normalizza gli URL
        $itemPath = trim($itemUrl, '/');
        $currentPath = trim($currentPath, '/');

        // Exact match
        if ($itemPath === $currentPath) {
            return true;
        }

        // Root path special case
        if ($itemPath === '' && $currentPath === '') {
            return true;
        }

        // Se l'elemento è la homepage
        if ($itemPath === '' || $itemPath === '/') {
            return $currentPath === '';
        }

        // Sub-path match (l'URL corrente è sotto l'URL dell'elemento)
if (str_starts_with($currentPath.'/', $itemPath.'/')) {
            return true;
        }

        return false;
    }

    /**
     * Controlla se un path corrisponde a un pattern (supporta wildcards)
     */
    protected function matchesPattern(string $path, string $pattern): bool
    {
        // Exact match
        if ($path === $pattern) {
            return true;
        }

        // Wildcard pattern
        if (str_contains($pattern, '*')) {
            $pattern = str_replace('*', '.*', preg_quote($pattern, '/'));

            return (bool) preg_match('/^'.$pattern.'$/i', $path);
        }

        // Sub-path pattern (ends with /*)
        if (str_ends_with($pattern, '/*')) {
            $basePath = rtrim($pattern, '/*');

            return str_starts_with($path, $basePath.'/') || $path === $basePath;
        }

        return false;
    }
}
