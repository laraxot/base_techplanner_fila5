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
<<<<<<< HEAD
=======
>>>>>>> dev
    public function __construct(
        private readonly OauthRefreshToken $refreshTokenModel,
    ) {
    }

<<<<<<< HEAD
=======
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
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
<<<<<<< HEAD
            $token = $this->refreshTokenModel->find($token);
=======
            $token = OauthRefreshToken::find($token);
>>>>>>> 4b6b99016 (first commit)
=======
            $token = $this->refreshTokenModel->find($token);
>>>>>>> dev
        }

        if (! $token instanceof OauthRefreshToken) {
            return false;
        }

<<<<<<< HEAD
        $token->revoked = true;
=======
        $token->setAttribute('revoked', true);
>>>>>>> dev
        $token->save();

        return true;
    }
}
