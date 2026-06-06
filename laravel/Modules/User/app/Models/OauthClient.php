<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Laravel\Passport\Client as PassportClient;

/**
<<<<<<< HEAD
 * @property string      $id
=======
 * @property string $id
>>>>>>> origin/dev
 * @property string|null $name
 * @property string|null $secret
 * @property string|null $provider
 * @property string|null $redirect
<<<<<<< HEAD
 * @property bool        $personal_access_client
 * @property bool        $password_client
 * @property bool        $revoked
 * @property string|null $user_id
 * @property User|null   $user
 */
class OauthClient extends PassportClient
{
    /** @var string */
=======
 * @property bool $personal_access_client
 * @property bool $password_client
 * @property bool $revoked
 * @property string|null $user_id
 * @property User|null $user
 */
class OauthClient extends PassportClient
{
>>>>>>> origin/dev
    protected $connection = 'user';
}
