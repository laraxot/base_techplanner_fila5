<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class RouteData - Gestisce la configurazione delle rotte per il framework Laraxot.
 */
<<<<<<< HEAD
final class RouteData extends Data
{
    /**
     * @param  string  $prefix  Prefisso per tutte le rotte
     * @param  array<int, string>  $middleware  Middleware applicati a tutte le rotte
     * @param  string  $namespace  Namespace per i controller
     * @param  bool  $use_passport  Se utilizzare Passport per l'autenticazione API
     * @param  array<int, string>  $except_verify  Rotte eccettuate dalla verifica
     * @param  bool  $enable  Se le rotte sono abilitate
     */
=======
class RouteData extends Data
{
    /**
     * @param string             $prefix        Prefisso per tutte le rotte
     * @param array<int, string> $middleware    Middleware applicati a tutte le rotte
     * @param string             $namespace     Namespace per i controller
     * @param bool               $use_passport  Se utilizzare Passport per l'autenticazione API
     * @param array<int, string> $except_verify Rotte eccettuate dalla verifica
     * @param bool               $enable        Se le rotte sono abilitate     */
>>>>>>> 8215f950 (.)
    public function __construct(
        public readonly string $prefix = '',
        public readonly array $middleware = [],
        public readonly string $namespace = '',
        public readonly bool $use_passport = false,
        public readonly array $except_verify = [],
        public readonly bool $enable = true,
<<<<<<< HEAD
) {}

=======
    ) {
    }
>>>>>>> 8215f950 (.)
    /**
     * Create a new instance of RouteData with default values.
     */
    public static function make(): static
    {
<<<<<<< HEAD
return new self();
    }
=======
        return new static();    }
>>>>>>> 8215f950 (.)
}
