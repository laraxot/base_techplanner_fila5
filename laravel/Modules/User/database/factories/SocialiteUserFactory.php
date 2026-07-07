<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\SocialiteUser;
<<<<<<< HEAD

class SocialiteUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = SocialiteUser::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
=======
use Modules\User\Models\User;

/**
 * SocialiteUser Factory.
 *
 * @extends Factory<SocialiteUser>
 */
class SocialiteUserFactory extends Factory
{
    protected $model = SocialiteUser::class;

    public function definition(): array
    {
        $provider = $this->faker->randomElement(['google', 'facebook', 'github', 'twitter']);

        return [
            'user_id' => User::factory(),
            'provider' => $provider,
            'provider_id' => $this->faker->numerify('############'),
            'avatar' => $this->faker->optional()->imageUrl(200, 200, 'people'),
            'email' => $this->faker->email(),
            'name' => $this->faker->name(),
        ];
    }

    public function google(): static
    {
        return $this->state(['provider' => 'google']);
    }

    public function facebook(): static
    {
        return $this->state(['provider' => 'facebook']);
    }

    public function github(): static
    {
        return $this->state(['provider' => 'github']);
    }

    public function forUser(User $user): static
    {
        return $this->state(['user_id' => $user->id]);
>>>>>>> 6ed19256f (.)
    }
}
