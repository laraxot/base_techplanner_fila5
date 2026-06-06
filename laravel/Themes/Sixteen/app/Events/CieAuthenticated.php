<?php

declare(strict_types=1);

namespace Themes\Sixteen\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
<<<<<<< HEAD
use Themes\Sixteen\Models\User;
=======
use Modules\User\Models\User;
>>>>>>> origin/dev

/**
 * Evento lanciato quando un utente si autentica con successo tramite CIE
 *
 * Questo evento permette di reagire all'autenticazione CIE
 * per logging, analytics, integrazione con sistemi esterni, etc.
 */
class CieAuthenticated
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
        return $this->cieAttributes['auth_method'] ?? null;
=======
        $value = $this->cieAttributes['auth_method'] ?? null;

        return is_string($value) ? $value : null;
>>>>>>> origin/dev
    }

    /**
     * Verifica se l'autenticazione è avvenuta tramite app mobile
     */
    public function isMobileAuth(): bool
    {
        return $this->getAuthMethod() === 'mobile';
    }

    /**
     * Ottiene il codice fiscale dall'autenticazione CIE
     */
    public function getFiscalCode(): ?string
    {
<<<<<<< HEAD
        return $this->cieAttributes['fiscal_code'] ?? null;
=======
        $value = $this->cieAttributes['fiscal_code'] ?? null;

        return is_string($value) ? $value : null;
>>>>>>> origin/dev
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
>>>>>>> origin/dev
    }

    /**
     * Verifica se è la prima autenticazione dell'utente
     */
    public function isFirstLogin(): bool
    {
        return $this->user->wasRecentlyCreated;
    }

    /**
     * Verifica se l'email è stata verificata da CIE
     */
    public function isEmailVerified(): bool
    {
<<<<<<< HEAD
        return $this->cieAttributes['email_verified'] ?? false;
=======
        $value = $this->cieAttributes['email_verified'] ?? false;

        return is_bool($value) && $value;
>>>>>>> origin/dev
    }

    /**
     * Verifica se il telefono è stato verificato da CIE
     */
    public function isPhoneVerified(): bool
    {
<<<<<<< HEAD
        return $this->cieAttributes['phone_verified'] ?? false;
=======
        $value = $this->cieAttributes['phone_verified'] ?? false;

        return is_bool($value) && $value;
>>>>>>> origin/dev
    }

    /**
     * Ottiene tutti gli attributi CIE ricevuti
     */
    public function getCieAttributes(): array
    {
        return $this->cieAttributes;
    }

    /**
     * Ottiene attributi specifici per logging sicuro
     */
    public function getLoggingData(): array
    {
        return [
            'user_id' => $this->user->id,
            'auth_method' => $this->getAuthMethod(),
            'is_mobile' => $this->isMobileAuth(),
            'fiscal_code' => $this->getFiscalCode(),
            'is_first_login' => $this->isFirstLogin(),
            'email_verified' => $this->isEmailVerified(),
            'phone_verified' => $this->isPhoneVerified(),
            'timestamp' => now()->toISOString(),
        ];
    }
}
