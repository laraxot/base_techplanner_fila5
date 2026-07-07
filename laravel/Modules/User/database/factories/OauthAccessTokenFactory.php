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
<<<<<<< HEAD
 */
class OauthAccessTokenFactory extends Factory
{
=======
 *
 * @extends Factory<OauthAccessToken>
 */
class OauthAccessTokenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<OauthAccessToken>
     */
>>>>>>> 6ed19256f (.)
    protected $model = OauthAccessToken::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'user_id' => User::factory(),
            'client_id' => OauthClient::factory(),
            'name' => $this->faker->optional()->words(2, true),
<<<<<<< HEAD
            'scopes' => $this->faker->randomElements(
                ['read', 'write', 'admin', 'user'],
                $this->faker->numberBetween(1, 3),
            ),
            'revoked' => $this->faker->boolean(10),
=======
            'scopes' => $this->faker->optional()->randomElements(
                [
                    'read',
                    'write',
                    'admin',
                    'user',
                ],
                $this->faker->numberBetween(1, 3),
            ),
            'revoked' => $this->faker->boolean(10), // 10% revoked
>>>>>>> 6ed19256f (.)
            'expires_at' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }

    /**
     * Create a revoked token.
     */
    public function revoked(): static
    {
<<<<<<< HEAD
        return $this->state(fn (): array => [
=======
        return $this->state(fn (array $_attributes): array => [
>>>>>>> 6ed19256f (.)
            'revoked' => true,
        ]);
    }

    /**
     * Create an active token.
     */
    public function active(): static
    {
<<<<<<< HEAD
        return $this->state(fn (): array => [
=======
        return $this->state(fn (array $_attributes): array => [
>>>>>>> 6ed19256f (.)
            'revoked' => false,
            'expires_at' => $this->faker->dateTimeBetween('+1 day', '+1 year'),
        ]);
    }

    /**
     * Create token for a specific user.
     */
    public function forUser(User $user): static
    {
<<<<<<< HEAD
        return $this->state(fn (): array => [
=======
        return $this->state(fn (array $_attributes): array => [
>>>>>>> 6ed19256f (.)
            'user_id' => $user->id,
        ]);
    }

    /**
     * Create token for a specific client.
     */
    public function forClient(OauthClient $client): static
    {
<<<<<<< HEAD
        return $this->state(fn (): array => [
=======
        return $this->state(fn (array $_attributes): array => [
>>>>>>> 6ed19256f (.)
            'client_id' => $client->id,
        ]);
    }

    /**
     * Create token with specific scopes.
     *
     * @param array<string> $scopes
     */
    public function withScopes(array $scopes): static
    {
<<<<<<< HEAD
        return $this->state(fn (): array => [
=======
        return $this->state(fn (array $_attributes): array => [
>>>>>>> 6ed19256f (.)
            'scopes' => $scopes,
        ]);
    }
}
