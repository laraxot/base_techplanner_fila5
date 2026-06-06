<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Laravel\Passport\Token as PassportToken;

<<<<<<< HEAD
class OauthToken extends PassportToken
{
    /** @var string */
=======
/**
 * @property bool $revoked
 * @property int|string|null $user_id
 */
class OauthToken extends PassportToken
{
>>>>>>> origin/dev
    protected $connection = 'user';
}
