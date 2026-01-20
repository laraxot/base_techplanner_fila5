<?php

declare(strict_types=1);

namespace Themes\Sixteen\Filters;

use Illuminate\Support\Facades\Gate;
use Themes\Sixteen\Contracts\MenuFilterInterface;

/**
 * Filtro menu per autorizzazioni Laravel Gate
 * Nasconde elementi del menu basati su permessi utente
 */
class GateMenuFilter implements MenuFilterInterface
{
    public function filter(array $item): array|false
    {
        // Controllo permesso con Laravel Gate
        if (isset($item['can'])) {
<<<<<<< HEAD
            if (! Gate::allows($item['can'])) {
                return false;
            }
        }

        // Controllo ruolo utente
        if (isset($item['role'])) {
            if (! auth()->check()) {
                return false;
            }

            $user = auth()->user();

            // Se l'utente ha un metodo hasRole (es. Spatie/Permission)
            if (method_exists($user, 'hasRole')) {
                if (! $user->hasRole($item['role'])) {
=======
            if (!Gate::allows($item['can'])) {
                return false;
            }
        }
        
        // Controllo ruolo utente
        if (isset($item['role'])) {
            if (!auth()->check()) {
                return false;
            }
            
            $user = auth()->user();
            
            // Se l'utente ha un metodo hasRole (es. Spatie/Permission)
            if (method_exists($user, 'hasRole')) {
                if (!$user->hasRole($item['role'])) {
>>>>>>> 4b6b99016 (first commit)
                    return false;
                }
            }
        }

        // Controllo permesso diretto
        if (isset($item['permission'])) {
<<<<<<< HEAD
            if (! auth()->check()) {
=======
            if (!auth()->check()) {
>>>>>>> 4b6b99016 (first commit)
                return false;
            }

            $user = auth()->user();
<<<<<<< HEAD

            // Se l'utente ha un metodo hasPermissionTo (es. Spatie/Permission)
            if (method_exists($user, 'hasPermissionTo')) {
                if (! $user->hasPermissionTo($item['permission'])) {
=======
            
            // Se l'utente ha un metodo hasPermissionTo (es. Spatie/Permission)
            if (method_exists($user, 'hasPermissionTo')) {
                if (!$user->hasPermissionTo($item['permission'])) {
>>>>>>> 4b6b99016 (first commit)
                    return false;
                }
            }
            // Fallback a Laravel Gate
<<<<<<< HEAD
            elseif (! Gate::allows($item['permission'])) {
=======
            elseif (!Gate::allows($item['permission'])) {
>>>>>>> 4b6b99016 (first commit)
                return false;
            }
        }

        // Controllo se utente è autenticato
        if (isset($item['auth']) && $item['auth'] === true) {
<<<<<<< HEAD
            if (! auth()->check()) {
=======
            if (!auth()->check()) {
>>>>>>> 4b6b99016 (first commit)
                return false;
            }
        }

        // Controllo se utente è guest
        if (isset($item['guest']) && $item['guest'] === true) {
            if (auth()->check()) {
                return false;
            }
        }

        // Controllo custom con callback
        if (isset($item['when']) && is_callable($item['when'])) {
<<<<<<< HEAD
            if (! call_user_func($item['when'])) {
=======
            if (!call_user_func($item['when'])) {
>>>>>>> 4b6b99016 (first commit)
                return false;
            }
        }

        return $item;
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 4b6b99016 (first commit)
