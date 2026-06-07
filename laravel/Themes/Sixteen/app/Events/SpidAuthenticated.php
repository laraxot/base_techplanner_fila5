<?php

declare(strict_types=1);

namespace Themes\Sixteen\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
<<<<<<< HEAD
use Themes\Sixteen\Models\User;

/**
 * Evento lanciato quando un utente si autentica con successo tramite SPID
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\User\Models\User;

/**
 * Evento lanciato quando un utente si autentica con successo tramite SPID
 *
>>>>>>> dev
 * Questo evento permette di reagire all'autenticazione SPID
 * per logging, analytics, integrazione con sistemi esterni, etc.
 */
class SpidAuthenticated
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public User $user,
        public array $spidAttributes
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
     * Ottiene il provider SPID utilizzato
     */
    public function getProvider(): ?string
    {
<<<<<<< HEAD
        return $this->spidAttributes['provider'] ?? null;
=======
        $value = $this->spidAttributes['provider'] ?? null;

        return is_string($value) ? $value : null;
>>>>>>> dev
    }

    /**
     * Ottiene il livello SPID utilizzato
     */
    public function getAuthLevel(): ?int
    {
<<<<<<< HEAD
        return $this->spidAttributes['auth_level'] ?? null;
=======
        $value = $this->spidAttributes['auth_level'] ?? null;

        return is_int($value) ? $value : null;
>>>>>>> dev
    }

    /**
     * Ottiene il codice fiscale dall'autenticazione SPID
     */
    public function getFiscalCode(): ?string
    {
<<<<<<< HEAD
        return $this->spidAttributes['fiscal_code'] ?? null;
=======
        $value = $this->spidAttributes['fiscal_code'] ?? null;

        return is_string($value) ? $value : null;
>>>>>>> dev
    }

    /**
     * Verifica se è la prima autenticazione dell'utente
     */
    public function isFirstLogin(): bool
    {
        return $this->user->wasRecentlyCreated;
    }

    /**
     * Ottiene tutti gli attributi SPID ricevuti
     */
    public function getSpidAttributes(): array
    {
        return $this->spidAttributes;
    }

    /**
     * Ottiene attributi specifici per logging sicuro
     */
    public function getLoggingData(): array
    {
        return [
            'user_id' => $this->user->id,
            'provider' => $this->getProvider(),
            'auth_level' => $this->getAuthLevel(),
            'fiscal_code' => $this->getFiscalCode(),
            'is_first_login' => $this->isFirstLogin(),
            'timestamp' => now()->toISOString(),
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
