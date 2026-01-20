<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;
=======
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\PasswordReset;
>>>>>>> 4b6b99016 (first commit)

class PasswordResetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     */
    protected $model = \Modules\User\Models\PasswordReset::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
=======
     *
     * @var class-string<Model>
     */
    protected $model = PasswordReset::class;

    /**
     * Define the model's default state.
     *
     * @return array<(\DateTime|string)>
     *
     * @psalm-return array{email: string, token: string, created_at: DateTime}
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->email,
            'token' => $this->faker->word,
            'created_at' => $this->faker->dateTime,
        ];
>>>>>>> 4b6b99016 (first commit)
    }
}
