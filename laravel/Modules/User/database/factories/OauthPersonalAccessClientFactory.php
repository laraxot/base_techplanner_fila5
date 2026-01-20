<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD

class OauthPersonalAccessClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\User\Models\OauthPersonalAccessClient::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
=======
use Modules\User\Models\OauthPersonalAccessClient;

/**
 * OauthPersonalAccessClient Factory.
 *
 * @extends Factory<OauthPersonalAccessClient>
 */
class OauthPersonalAccessClientFactory extends Factory
{
    protected $model = OauthPersonalAccessClient::class;

    public function definition(): array
    {
        return [
            'uuid' => (string) $this->faker->uuid(),
            'client_id' => (string) $this->faker->uuid(),
        ];
>>>>>>> 4b6b99016 (first commit)
    }
}
