<?php

declare(strict_types=1);

namespace Themes\Sixteen\Filters;

<<<<<<< HEAD
use Exception;
use Illuminate\Support\Facades\Route;
use Themes\Sixteen\Contracts\MenuFilterInterface;

use function Safe\parse_url;
=======
use Illuminate\Support\Facades\Route;
use Themes\Sixteen\Contracts\MenuFilterInterface;
>>>>>>> 8215f950 (.)
/**
 * Filtro menu per processare URL e route
 * Converte route in URL e aggiunge informazioni di navigazione
 */
class HrefMenuFilter implements MenuFilterInterface
{
    public function filter(array $item): array|false
    {
        // Converti route in URL
<<<<<<< HEAD
$route = isset($item['route']) && is_string($item['route']) ? $item['route'] : null;
        if (is_string($route)) {
            $parameters = isset($item['route_parameters']) && is_array($item['route_parameters']) ? $item['route_parameters'] : [];

=======
        if (isset($item['route'])) {
            $route = $item['route'];
            $parameters = $item['route_parameters'] ?? [];
>>>>>>> 8215f950 (.)
            try {
                if (Route::has($route)) {
                    $item['url'] = route($route, $parameters);
                    $item['route_name'] = $route;
                } else {
                    // Se la route non esiste, rimuovi l'elemento o mostra errore in dev
                    if (app()->environment('local', 'development')) {
                        $item['url'] = '#';
<<<<<<< HEAD
$item['title'] = "Route '".$route."' not found";
                        $existingClass = isset($item['class']) && is_string($item['class']) ? $item['class'] : '';
                        $item['class'] = $existingClass.' text-danger';
                    } else {
=======
                        $item['title'] = "Route '{$route}' not found";
                        $item['class'] = ($item['class'] ?? '').' text-danger';                    } else {
>>>>>>> 8215f950 (.)
                        return false;
                    }
                }
            } catch (Exception $e) {
<<<<<<< HEAD
if (app()->environment('local', 'development')) {
                    $item['url'] = '#';
                    $item['title'] = "Error with route '".$route."': ".$e->getMessage();
                    $existingClass = isset($item['class']) && is_string($item['class']) ? $item['class'] : '';
                    $item['class'] = $existingClass.' text-danger';
                } else {
=======
            } catch (Exception $e) {
                if (app()->environment('local', 'development')) {
                    $item['url'] = '#';
                    $item['title'] = "Error with route '{$route}': ".$e->getMessage();
                    $item['class'] = ($item['class'] ?? '').' text-danger';                } else {
>>>>>>> 8215f950 (.)
                    return false;
                }
            }
        }

        // Assicurati che ci sia un URL
<<<<<<< HEAD
$type = isset($item['type']) && is_string($item['type']) ? $item['type'] : '';
        if (! isset($item['url']) && $type !== 'header' && $type !== 'separator') {
            $item['url'] = '#';
        }

        // Aggiungi protocollo se mancante per URL esterni
$url = isset($item['url']) && is_string($item['url']) ? $item['url'] : '';
        if ($url !== '' &&
            ! str_starts_with($url, '#') &&
            ! str_starts_with($url, '/') &&
            ! str_starts_with($url, 'http://') &&
            ! str_starts_with($url, 'https://')) {
            $item['url'] = 'https://'.$url;
            $item['external'] = true;
        }

        // Determina se il link è esterno
$url = isset($item['url']) && is_string($item['url']) ? $item['url'] : '';
        if ($url !== '' &&
            (str_starts_with($url, 'http://') || str_starts_with($url, 'https://'))) {
            $currentDomain = request()->getHost();
            $linkDomain = parse_url($url, PHP_URL_HOST);

            if (is_string($linkDomain) && $linkDomain !== '' && $linkDomain !== $currentDomain) {
                $item['external'] = true;
=======
        if (! isset($item['url']) && $item['type'] !== 'header' && $item['type'] !== 'separator') {            $item['url'] = '#';
        }

        // Aggiungi protocollo se mancante per URL esterni
        if (isset($item['url']) &&
            ! str_starts_with($item['url'], '#') &&
            ! str_starts_with($item['url'], '/') &&
            ! str_starts_with($item['url'], 'http://') &&
            ! str_starts_with($item['url'], 'https://')) {
            $item['url'] = 'https://'.$item['url'];            $item['external'] = true;
        }

        // Determina se il link è esterno
        if (isset($item['url']) &&
            (str_starts_with($item['url'], 'http://') || str_starts_with($item['url'], 'https://'))) {
            $currentDomain = request()->getHost();
            $linkDomain = parse_url($item['url'], PHP_URL_HOST);

            if ($linkDomain && $linkDomain !== $currentDomain) {                $item['external'] = true;
>>>>>>> 8215f950 (.)
                $item['target'] = $item['target'] ?? '_blank';
                $item['rel'] = 'noopener noreferrer';
            }
        }

        // Aggiungi attributi di sicurezza per link esterni
        if ($item['external'] ?? false) {
<<<<<<< HEAD
$attributes = isset($item['attributes']) && is_array($item['attributes']) ? $item['attributes'] : [];
            $item['attributes'] = array_merge($attributes, [
                'rel' => 'noopener noreferrer',
=======
            $item['attributes'] = array_merge($item['attributes'] ?? [], [                'rel' => 'noopener noreferrer',
>>>>>>> 8215f950 (.)
                'target' => '_blank',
            ]);
        }

        return $item;
    }
}
