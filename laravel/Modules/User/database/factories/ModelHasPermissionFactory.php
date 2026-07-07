<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> 6ed19256f (.)
use Modules\User\Models\ModelHasPermission;

class ModelHasPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
=======
     *
     * @var class-string<Model>
>>>>>>> 6ed19256f (.)
     */
    protected $model = ModelHasPermission::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
=======
     *
     * @psalm-return array<never, never>
>>>>>>> 6ed19256f (.)
     */
    public function definition(): array
    {
        return [];
    }
}
