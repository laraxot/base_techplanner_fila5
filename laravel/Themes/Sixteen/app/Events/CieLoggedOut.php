<?php

declare(strict_types=1);

namespace Themes\Sixteen\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
<<<<<<< HEAD
use Themes\Sixteen\Models\User;

/**
 * Evento lanciato quando un utente effettua il logout da CIE
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\User\Models\User;

/**
 * Evento lanciato quando un utente effettua il logout da CIE
 *
>>>>>>> dev
 * Questo evento permette di reagire al logout CIE per cleanup,
 * logging, sincronizzazione con sistemi esterni, etc.
 */
class CieLoggedOut
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public User $user,
        public array $cieAttributes
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> 4b6b99016 (first commit)
=======
    ) {}
>>>>>>> dev

    /**
     * Ottiene il metodo di autenticazione CIE utilizzato
     */
    public function getAuthMethod(): ?string
    {
<<<<<<< HEAD
        return $this->cieAttributes['auth_method'] ?? null;
    }

    /**
     * Ottiene il codice fiscale dell'utente
     */
    public function getFiscalCode(): ?string
    {
        return $this->cieAttributes['fiscal_code'] ?? null;
=======
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
>>>>>>> dev
    }

    /**
     * Ottiene l'ID CIE dell'utente
     */
    public function getCieId(): ?string
    {
<<<<<<< HEAD
        return $this->cieAttributes['cie_id'] ?? null;
=======
        $value = $this->cieAttributes['cie_id'] ?? null;

        return is_string($value) ? $value : null;
>>>>>>> dev
    }

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
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> 4b6b99016 (first commit)
=======
}
>>>>>>> dev
