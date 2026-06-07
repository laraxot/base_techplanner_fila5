<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Profile;

<<<<<<< HEAD
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
=======
/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
>>>>>>> dev
    protected $model = Profile::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
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
=======
            'bio' => $this->faker->text(200),
            'avatar' => '/avatars/'.$this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'date_of_birth' => $this->faker->date(),
            'location' => $this->faker->city(),
            'website' => $this->faker->url(),
            'twitter' => $this->faker->userName(),
            'facebook' => $this->faker->userName(),
            'linkedin' => $this->faker->userName(),
            'github' => $this->faker->userName(),
        ];
>>>>>>> dev
    }
}
