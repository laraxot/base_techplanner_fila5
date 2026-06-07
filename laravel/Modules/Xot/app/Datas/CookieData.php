<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class CookieData - Gestisce la configurazione dei cookie per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 */
final class CookieData extends Data
{
    /**
     * @param bool   $accept        Se il cookie è stato accettato
     * @param string $type          Tipo di cookie (es. necessari, analitici, marketing)
     * @param int    $durationDays Durata dei cookie in giorni
     * @param string $policyUrl    URL della cookie policy
     * @param string $bannerStyle  Stile del banner dei cookie
     */
    public function __construct(
        public readonly bool $accept = false,
        public readonly string $type = 'necessary',
        public readonly int $durationDays = 365,
        public readonly string $policyUrl = '/cookie-policy',
        public readonly string $bannerStyle = 'bottom',
    ) {
    }

    /**
     * Create a new instance of CookieData with default values.
     */
    public static function make(): self
    {
        return new self();
    }
}
