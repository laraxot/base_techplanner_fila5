<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Modules\User\Models\AuthenticationLog;
>>>>>>> origin/dev

class AuthenticationLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = \Modules\User\Models\AuthenticationLog::class;
=======
    protected $model = AuthenticationLog::class;
>>>>>>> origin/dev

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
