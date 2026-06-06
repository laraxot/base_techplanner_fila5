<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\ModelHasRole;
<<<<<<< HEAD
    protected $model = ModelHasRole::class;
=======

class ModelHasRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\User\Models\ModelHasRole::class;
>>>>>>> 8215f950 (.)

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
