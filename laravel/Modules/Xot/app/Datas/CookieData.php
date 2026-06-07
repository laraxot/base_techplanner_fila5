<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class CookieData - Gestisce la configurazione dei cookie.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 */
final class CookieData extends Data
{
    /**
     * @param bool   $accept
     * @param string $type
     * @param int    $durationDays
     * @param string $policyUrl
     * @param string $bannerStyle
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
    public static function make(): static
    {
        return new static();
    }
}
