<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Modules\User\Models\DeviceUser;
>>>>>>> origin/dev

class DeviceUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = \Modules\User\Models\DeviceUser::class;
=======
    protected $model = DeviceUser::class;
>>>>>>> origin/dev

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
