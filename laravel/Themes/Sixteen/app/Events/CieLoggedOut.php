<?php

declare(strict_types=1);

namespace Themes\Sixteen\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
<<<<<<< HEAD
use Modules\User\Models\User;

=======
use Themes\Sixteen\Models\User;
>>>>>>> 8215f950 (.)
/**
 * Evento lanciato quando un utente effettua il logout da CIE
 *
 * Questo evento permette di reagire al logout CIE per cleanup,
 * logging, sincronizzazione con sistemi esterni, etc.
 */
class CieLoggedOut
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public User $user,
        public array $cieAttributes
    ) {}

    /**
     * Ottiene il metodo di autenticazione CIE utilizzato
     */
    public function getAuthMethod(): ?string
    {
<<<<<<< HEAD
$value = $this->cieAttributes['auth_method'] ?? null;

        return is_string($value) ? $value : null;
    }

    /**
     * Ottiene il codice fiscale dall'autenticazione CIE
     */
    public function getFiscalCode(): ?string
    {
        $value = $this->cieAttributes['fiscal_code'] ?? null;

        return is_string($value) ? $value : null;
    }
=======
        return $this->cieAttributes['auth_method'] ?? null;
    }

    /**
     * Ottiene il codice fiscale dell'utente
     */
    public function getFiscalCode(): ?string
    {
        return $this->cieAttributes['fiscal_code'] ?? null;    }
>>>>>>> 8215f950 (.)

    /**
     * Ottiene l'ID CIE dell'utente
     */
    public function getCieId(): ?string
    {
<<<<<<< HEAD
$value = $this->cieAttributes['cie_id'] ?? null;

        return is_string($value) ? $value : null;
    }
=======
        return $this->cieAttributes['cie_id'] ?? null;    }
>>>>>>> 8215f950 (.)

    /**
     * Ottiene attributi specifici per logging sicuro
     */
    public function getLoggingData(): array
    {
        return [
            'user_id' => $this->user->id,
            'auth_method' => $this->getAuthMethod(),
            'fiscal_code' => $this->getFiscalCode(),
            'logout_timestamp' => now()->toISOString(),
        ];
    }
}
