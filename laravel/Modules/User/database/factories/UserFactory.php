<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Hash;
>>>>>>> dev
use Illuminate\Support\Str;
use Modules\User\Models\User;

/**
 * @extends Factory<User>
 */
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\User\Models\User;

>>>>>>> 4b6b99016 (first commit)
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
     * @var class-string<User>
     */
=======
     * @var class-string<Model>
     */
    /** @var class-string<User> */
>>>>>>> 4b6b99016 (first commit)
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
=======
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
>>>>>>> dev
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
<<<<<<< HEAD
=======
            'name' => fake()->name(),
>>>>>>> 4b6b99016 (first commit)
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
<<<<<<< HEAD
            'is_active' => true,
            'is_otp' => false,
            'lang' => 'it',
            'type' => 'customer_user',
            'state' => 'active',
=======
            'lang' => fake()->randomElement(['it', 'en', 'de']),
            'is_active' => true,
            'is_otp' => false,
            'password_expires_at' => fake()->optional()->dateTimeBetween('now', '+1 year'),
>>>>>>> 4b6b99016 (first commit)
        ];
    }

    /**
<<<<<<< HEAD
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes): array => [
=======
     * Indicate that the user should be active.
     */
    public function active(): static
    {
        return $this->state(fn (array $_attributes) => [
=======
            'id' => (string) Str::uuid(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'lang' => 'it',
            'type' => 'customer_user',
            'state' => 'active',
        ];
    }

    public function active(): static
    {
        return $this->state(fn (): array => [
>>>>>>> dev
            'is_active' => true,
        ]);
    }

<<<<<<< HEAD
    /**
     * Indicate that the user should be inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $_attributes) => [
=======
    public function inactive(): static
    {
        return $this->state(fn (): array => [
>>>>>>> dev
            'is_active' => false,
        ]);
    }

<<<<<<< HEAD
    /**
     * Indicate that the user's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $_attributes) => [
>>>>>>> 4b6b99016 (first commit)
=======
    public function verified(): static
    {
        return $this->state(fn (): array => [
            'email_verified_at' => now(),
        ]);
    }

    public function unverified(): static
    {
        return $this->state(fn (): array => [
>>>>>>> dev
            'email_verified_at' => null,
        ]);
    }
}
