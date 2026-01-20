<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Profile;

<<<<<<< HEAD
/**
 * @extends Factory<Profile>
 */
=======
>>>>>>> 4b6b99016 (first commit)
class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     *
     * @var class-string<Profile>
=======
>>>>>>> 4b6b99016 (first commit)
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'bio' => fake()->sentence(),
            'status' => 'active',
            'locale' => 'it',
            'timezone' => 'Europe/Rome',
            'preferences' => [],
            'extra' => [],
        ];
=======
     */
    public function definition(): array
    {
        return [];
>>>>>>> 4b6b99016 (first commit)
    }
}
