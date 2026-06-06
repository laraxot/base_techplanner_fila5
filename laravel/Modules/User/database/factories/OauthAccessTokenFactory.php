<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthAccessToken;
use Modules\User\Models\OauthClient;
use Modules\User\Models\User;

/**
 * OauthAccessToken Factory.
 *
 * Factory for creating OauthAccessToken model instances for testing and seeding.
 */
class OauthAccessTokenFactory extends Factory
{
<<<<<<< HEAD
* @param  array<string>  $scopes
     */
=======
    /** @phpstan-ignore-next-line Passport access token is an Eloquent model at runtime, but PHPStan loses that type here. */     */
>>>>>>> 8215f950 (.)
    public function withScopes(array $scopes): static
    {
        return $this->state(fn (): array => [
            'scopes' => $scopes,
        ]);
    }
}
