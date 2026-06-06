<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Laravel\Passport\RefreshToken as PassportRefreshToken;

/**
<<<<<<< HEAD
* @property string $id
 * @property string $access_token_id
 * @property bool $revoked
=======
 * @property string                  $id
 * @property string                  $access_token_id
 * @property bool                    $revoked
>>>>>>> 8215f950 (.)
 * @property \DateTimeInterface|null $expires_at
 */
class OauthRefreshToken extends PassportRefreshToken
{
<<<<<<< HEAD
/** @var string */
=======
    /** @var string */
>>>>>>> 8215f950 (.)
    protected $connection = 'user';
}
