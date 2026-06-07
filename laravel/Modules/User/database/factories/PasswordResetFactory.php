<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;
=======
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\PasswordReset;
>>>>>>> 4b6b99016 (first commit)
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\PasswordReset;
>>>>>>> dev

class PasswordResetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
     */
    protected $model = \Modules\User\Models\PasswordReset::class;
=======
     */
    protected $model = PasswordReset::class;
>>>>>>> dev

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
<<<<<<< HEAD
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
=======
>>>>>>> dev
    }
}
