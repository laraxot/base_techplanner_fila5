<?php

declare(strict_types=1);

namespace Modules\User\Models\Passport;

<<<<<<< HEAD
use Laravel\Passport\Client as PassportClient;
=======
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User;
use Laravel\Passport\Client as PassportClient;
use Modules\User\Models\OauthAuthCode;
use Modules\User\Models\OauthToken;
>>>>>>> origin/dev

/**
 * Custom Passport Client model to fix compatibility issues with Laravel 12.
 *
<<<<<<< HEAD
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\OauthAuthCode> $authCodes
 * @property int|null                                                                          $auth_codes_count
 * @property array                                                                             $grant_types
 * @property \Illuminate\Foundation\Auth\User                                                  $owner
 * @property string|null                                                                       $plain_secret
 * @property array                                                                             $redirect_uris
 * @property string|null                                                                       $secret
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\OauthToken>    $tokens
 * @property int|null                                                                          $tokens_count
 * @property \Modules\User\Models\User|null                                                    $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client existsIn(array $haystack)
 * @method static \Laravel\Passport\Database\Factories\ClientFactory   factory($count = null, $state = [])
=======
 * @property Collection<int, OauthAuthCode> $authCodes
 * @property int|null $auth_codes_count
 * @property array $grant_types
 * @property User $owner
 * @property string|null $plain_secret
 * @property array $redirect_uris
 * @property string|null $secret
 * @property Collection<int, OauthToken> $tokens
 * @property int|null $tokens_count
 * @property \Modules\User\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client existsIn(array $haystack)
 * @method static \Laravel\Passport\Database\Factories\ClientFactory factory($count = null, $state = [])
>>>>>>> origin/dev
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client query()
 *
 * @mixin \Eloquent
 */
class Client extends PassportClient
{
    /**
     * Initialize the trait.
     * Overriding to match Laravel 12 HasUuids trait signature (removing : void).
     */
    public function initializeHasUniqueStringIds(): void
    {
<<<<<<< HEAD
        // @phpstan-ignore-next-line method_exists check per compatibilità versioni Laravel
=======
        // @phpstan-ignore-next-line
>>>>>>> origin/dev
        if (method_exists(parent::class, 'initializeHasUniqueStringIds')) {
            parent::initializeHasUniqueStringIds();
        }
    }
}
