<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Modules\User\Models\PersonalAccessToken;
>>>>>>> dev

class PersonalAccessTokenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = \Modules\User\Models\PersonalAccessToken::class;
=======
    protected $model = PersonalAccessToken::class;
>>>>>>> dev

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
