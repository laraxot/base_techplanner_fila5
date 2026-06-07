<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\User\Models\PermissionUser;
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\User\Models\PermissionUser;
>>>>>>> dev

class PermissionUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    protected $model = \Modules\User\Models\PermissionUser::class;
=======
    protected $model = PermissionUser::class;
>>>>>>> 4b6b99016 (first commit)
=======
    protected $model = PermissionUser::class;
>>>>>>> dev

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
