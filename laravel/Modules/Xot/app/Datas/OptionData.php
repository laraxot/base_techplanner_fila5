<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class OptionData - Gestisce le opzioni di configurazione per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 */
<<<<<<< HEAD
final class OptionData extends Data
{
    /**
     * @param  string  $cache_driver  Driver per la cache delle opzioni
     * @param  bool  $enable_cache  Se abilitare la cache delle opzioni
     * @param  int  $cache_ttl  TTL cache in secondi
     * @param  string  $prefix  Prefisso per le chiavi delle opzioni
     * @param  array  $autoload  Opzioni da caricare automaticamente
     */
=======
class OptionData extends Data
{
    /**
     * @param string $cache_driver Driver per la cache delle opzioni
     * @param bool   $enable_cache Se abilitare la cache delle opzioni
     * @param int    $cache_ttl    TTL cache in secondi
     * @param string $prefix       Prefisso per le chiavi delle opzioni
     * @param array  $autoload     Opzioni da caricare automaticamente     */
>>>>>>> 8215f950 (.)
    public function __construct(
        public readonly string $cache_driver = 'file',
        public readonly bool $enable_cache = true,
        public readonly int $cache_ttl = 86400,
        public readonly string $prefix = 'options_',
        public readonly array $autoload = ['site_name', 'site_description', 'site_logo'],
<<<<<<< HEAD
) {}

=======
    ) {
    }
>>>>>>> 8215f950 (.)
    /**
     * Create a new instance of OptionData with default values.
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
