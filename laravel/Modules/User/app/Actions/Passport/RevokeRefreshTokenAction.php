<?php

declare(strict_types=1);

namespace Modules\User\Actions\Passport;

use Modules\User\Models\OauthRefreshToken;
use Spatie\QueueableAction\QueueableAction;

/**
 * RevokeRefreshTokenAction: Revoca un refresh token OAuth2.
 */
class RevokeRefreshTokenAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function __construct(
        private readonly OauthRefreshToken $refreshTokenModel,
    ) {
    }

=======
>>>>>>> 4b6b99016 (first commit)
    /**
     * Revoca un refresh token OAuth2.
     *
     * @param OauthRefreshToken|string $token Il token da revocare (istanza o ID)
     *
     * @return bool True se il token è stato revocato con successo
     */
    public function execute(OauthRefreshToken|string $token): bool
    {
        if (is_string($token)) {
<<<<<<< HEAD
            $token = $this->refreshTokenModel->find($token);
=======
            $token = OauthRefreshToken::find($token);
>>>>>>> 4b6b99016 (first commit)
        }

        if (! $token instanceof OauthRefreshToken) {
            return false;
        }

        $token->revoked = true;
        $token->save();

        return true;
    }
}
