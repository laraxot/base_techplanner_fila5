<?php

declare(strict_types=1);

namespace Modules\User\Actions\Passport;

use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthToken;
use Spatie\QueueableAction\QueueableAction;

/**
 * RevokeClientAction: Revoca un client OAuth2 e tutti i suoi token.
 *
 * Questa action revoca un client OAuth2 e tutti i token associati,
 * rendendoli immediatamente non validi.
 */
class RevokeClientAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * Revoca un client OAuth2 e opzionalmente i suoi token.
=======
     * Revoca un client OAuth2 e tutti i suoi token.
>>>>>>> 6ed19256f (.)
     *
     * @param OauthClient|string $client       Il client da revocare (istanza o ID)
     * @param bool               $revokeTokens Se true, revoca anche tutti i token associati
     *
     * @return bool True se il client è stato revocato con successo
     */
<<<<<<< HEAD
    public function execute(OauthClient|string $client, bool $revokeTokens): bool
    {
        $oauthClientModel = app(OauthClient::class);
        $oauthTokenModel = app(OauthToken::class);

        if (is_string($client)) {
            $client = $oauthClientModel->find($client);
=======
    public function execute(OauthClient|string $client, bool $revokeTokens = true): bool
    {
        if (is_string($client)) {
            $client = OauthClient::find($client);
>>>>>>> 6ed19256f (.)
        }

        if (! $client instanceof OauthClient) {
            return false;
        }

        // Revoca tutti i token associati se richiesto
        if ($revokeTokens) {
<<<<<<< HEAD
            $oauthTokenModel->where('client_id', $client->id)
=======
            OauthToken::where('client_id', $client->id)
>>>>>>> 6ed19256f (.)
                ->where('revoked', false)
                ->update(['revoked' => true]);
        }

        // Revoca il client
        $client->revoked = true;
        $client->save();

        return true;
    }
}
