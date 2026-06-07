<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class SubscriptionData - Gestisce la configurazione degli abbonamenti per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 */
final class SubscriptionData extends Data
{
    /**
     * @param bool                     $enable         Se il sistema di abbonamenti è abilitato
     * @param string                   $driver         Driver per gli abbonamenti (stripe, paddle, ecc.)
     * @param array<string, mixed>     $plans          Piani di abbonamento disponibili
     * @param string                   $currency       Valuta predefinita
     * @param array<int, class-string> $allowedModels Modelli abilitati per gli abbonamenti
     * @param bool                     $trialEnabled  Se abilitare i periodi di prova
     * @param int                      $trialDays     Durata periodo di prova in giorni
     */
    public function __construct(
        public readonly bool $enable = false,
        public readonly string $driver = 'stripe',
        public readonly array $plans = [],
        public readonly string $currency = 'EUR',
        public readonly array $allowedModels = [],
        public readonly bool $trialEnabled = true,
        public readonly int $trialDays = 14,
    ) {
    }

    /**
     * Create a new instance of SubscriptionData with default values.
     */
    public static function make(): self
    {
        return new self();
    }
}
