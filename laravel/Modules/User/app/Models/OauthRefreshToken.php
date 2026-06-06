<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Laravel\Passport\RefreshToken as PassportRefreshToken;

/**
<<<<<<< HEAD
 * @property string                  $id
 * @property string                  $access_token_id
 * @property bool                    $revoked
=======
 * @property string $id
 * @property string $access_token_id
 * @property bool $revoked
>>>>>>> origin/dev
 * @property \DateTimeInterface|null $expires_at
 */
class OauthRefreshToken extends PassportRefreshToken
{
<<<<<<< HEAD
    /** @var string */
=======
>>>>>>> origin/dev
    protected $connection = 'user';
}
