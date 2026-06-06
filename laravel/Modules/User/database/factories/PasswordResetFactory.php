<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Modules\User\Models\PasswordReset;
>>>>>>> origin/dev

class PasswordResetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = \Modules\User\Models\PasswordReset::class;
=======
    protected $model = PasswordReset::class;
>>>>>>> origin/dev

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
