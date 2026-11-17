<?php

declare(strict_types=1);

namespace Modules\User\Support;

<<<<<<< .merge_file_L3XAh7
use Illuminate\Support\Facades\Auth;
use Modules\Xot\Contracts\UserContract;

/**
 * Risolve la chiave del tenant dell'utente autenticato.
 *
 * Usata da {@see \Modules\User\Models\Scopes\TenantScope} e
 * {@see \Modules\User\Models\Traits\InteractsWithTenant} come fallback quando
 * non c'e' un tenant Filament corrente: i pannelli operativi senza tenancy
 * (es. cameriere, cassa, cucina) vedono comunque solo il proprio tenant.
 *
 * Per utenti con piu' tenant si prende il primo in ordine di appartenenza:
 * il caso d'uso target e' l'utente operativo legato a un solo tenant.
 */
final class AuthenticatedTenantKey
{
    /**
     * Chiave (id) del tenant dell'utente autenticato.
     *
     * @return int|string|null `null` se non c'e' utente autenticato, se
     *                          l'utente non ha tenant o se la chiave non e'
     *                          uno scalare (uuid/stringa o intero).
     */
    public static function resolve(): int|string|null
    {
        $user = Auth::user();
=======
use Illuminate\Support\Facades\Context;
use Modules\Xot\Contracts\UserContract;

/**
 * Chiave del tenant dell'utente autenticato, come fallback quando non c'e' un
 * tenant Filament corrente (pannelli operativi senza tenancy: cameriere, cassa,
 * cucina, bar, HACCP).
 *
 * Il personale appartiene a un solo ristorante: si prende il primo tenant.
 * Se un domani un utente potra' appartenere a piu' ristoranti, serve una
 * selezione esplicita del ristorante corrente.
 *
 * Il risultato e' memoizzato in Context (per richiesta, sicuro sotto Octane)
 * per non ripetere la query su `tenant_user` a ogni apply() dello scope.
 */
final class AuthenticatedTenantKey
{
    private function __construct() {}

    public static function resolve(): string|int|null
    {
        $user = auth()->user();
>>>>>>> .merge_file_kafXLV

        if (! $user instanceof UserContract) {
            return null;
        }

<<<<<<< .merge_file_L3XAh7
        $tenant = $user->tenants()->first();
        $key = $tenant?->getKey();

        return is_int($key) || is_string($key) ? $key : null;
=======
        $authId = $user->getAuthIdentifier();
        if (! \is_string($authId) && ! \is_int($authId)) {
            return null;
        }
        $userKey = (string) $authId;

        /** @var string|int|null */
        return Context::remember('user.authenticated_tenant_key.'.$userKey, static function () use ($user): string|int|null {
            $key = $user->tenants()->first()?->getKey();

            return \is_string($key) || \is_int($key) ? $key : null;
        });
>>>>>>> .merge_file_kafXLV
    }
}
