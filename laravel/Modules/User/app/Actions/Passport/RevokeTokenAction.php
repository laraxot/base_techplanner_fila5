<?php

declare(strict_types=1);

namespace Modules\User\Actions\Passport;

use Modules\User\Models\OauthToken;
use Spatie\QueueableAction\QueueableAction;

/**
 * RevokeTokenAction: Revoca un token OAuth2.
 *
 * Questa action revoca un token di accesso OAuth2, rendendolo immediatamente non valido.
 * Revoca anche il refresh token associato se presente.
 */
class RevokeTokenAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function __construct(
        private readonly OauthToken $oauthTokenModel,
    ) {
    }

=======
>>>>>>> 6ed19256f (.)
    /**
     * Revoca un token OAuth2.
     *
     * @param OauthToken|string $token Il token da revocare (istanza o ID)
     *
     * @return bool True se il token è stato revocato con successo
     */
    public function execute(OauthToken|string $token): bool
    {
        if (is_string($token)) {
<<<<<<< HEAD
            $token = $this->oauthTokenModel->find($token);
=======
            $token = OauthToken::find($token);
>>>>>>> 6ed19256f (.)
        }

        if (! $token instanceof OauthToken) {
            return false;
        }

        $token->revoke();

        // Revoca anche il refresh token associato se presente
        if ($token->refreshToken) {
            $token->refreshToken->revoke();
        }

        return true;
    }
}
