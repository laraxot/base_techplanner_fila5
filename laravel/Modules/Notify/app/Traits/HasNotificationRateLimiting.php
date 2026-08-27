<?php

declare(strict_types=1);

namespace Modules\Notify\Traits;

use Illuminate\Cache\RateLimiter;
use Webmozart\Assert\Assert;

<<<<<<< .merge_file_VIwh8q
/** @phpstan-ignore trait.unused */
=======
/**
 * Fornisce funzionalità per la gestione del rate limiting delle notifiche.
 *
 * @phpstan-ignore trait.unused
 */
>>>>>>> .merge_file_Kbbfi3
trait HasNotificationRateLimiting
{
    /**
     * Verifica se l'invio della notifica è consentito dal rate limiting.
     *
     * @param  string  $key  Chiave univoca per il rate limiting
     */
    protected function shouldSendNotification(string $key): bool
    {
        if (! config('notify.rate_limiting.enabled')) {
            return true;
        }

<<<<<<< .merge_file_VIwh8q
        $maxAttempts = (int) config('notify.rate_limiting.max_attempts', 5);
        $decayMinutes = (int) config('notify.rate_limiting.decay_minutes', 1);
=======
        $maxAttempts = config('notify.rate_limiting.max_attempts', 5);
        $decayMinutes = config('notify.rate_limiting.decay_minutes', 1);
        Assert::integerish($maxAttempts);
        Assert::integerish($decayMinutes);
        $maxAttempts = (int) $maxAttempts;
        $decayMinutes = (int) $decayMinutes;
>>>>>>> .merge_file_Kbbfi3

        $limiter = app(RateLimiter::class);

        if ($limiter->tooManyAttempts($key, $maxAttempts)) {
            return false;
        }

        $limiter->hit($key, $decayMinutes * 60);

        return true;
    }

    /**
     * Ottiene il tempo rimanente prima che il rate limiting si resetti.
     *
     * @param  string  $key  Chiave univoca per il rate limiting
     *
     * @return int Secondi rimanenti
     */
    protected function getNotificationRateLimitRetryAfter(string $key): int
    {
        $limiter = app(RateLimiter::class);

        return $limiter->availableIn($key);
    }

    /**
     * Ottiene il numero di tentativi rimanenti per il rate limiting.
     *
     * @param  string  $key  Chiave univoca per il rate limiting
     *
     * @return int Tentativi rimanenti
     */
    protected function getNotificationRateLimitRemainingAttempts(string $key): int
    {
<<<<<<< .merge_file_VIwh8q
        $maxAttempts = (int) config('notify.rate_limiting.max_attempts', 5);
=======
        $maxAttempts = config('notify.rate_limiting.max_attempts', 5);
        Assert::integerish($maxAttempts);
        $maxAttempts = (int) $maxAttempts;
>>>>>>> .merge_file_Kbbfi3

        $limiter = app(RateLimiter::class);

<<<<<<< .merge_file_VIwh8q
        return $maxAttempts - (int) $limiter->attempts($key);
=======
        // RateLimiter::attempts() legge dalla cache e non dichiara un tipo di ritorno:
        // il valore va ristretto qui, non castato dentro l'espressione aritmetica.
        $attempts = $limiter->attempts($key);
        Assert::integerish($attempts);

        return $maxAttempts - (int) $attempts;
>>>>>>> .merge_file_Kbbfi3
    }

    /**
     * Resetta il rate limiting per una chiave specifica.
     *
     * @param  string  $key  Chiave univoca per il rate limiting
     */
    protected function resetNotificationRateLimit(string $key): void
    {
        $limiter = app(RateLimiter::class);
        $limiter->clear($key);
    }

    /**
     * Genera una chiave univoca per il rate limiting.
     *
     * @param  string  $type  Tipo di notifica
     * @param  int|string  $identifier  Identificatore univoco (es. ID utente)
     */
    protected function getNotificationRateLimitKey(string $type, int|string $identifier): string
    {
<<<<<<< .merge_file_tWsuKh
        return 'notify:'.$type.':'.(string) $identifier;
=======
<<<<<<< .merge_file_VIwh8q
        return 'notify:'.$type.':'.(string) $identifier;
=======
        return 'notify:'.$type.':'.$identifier;
>>>>>>> .merge_file_Kbbfi3
>>>>>>> .merge_file_vO7rsU
    }
}
