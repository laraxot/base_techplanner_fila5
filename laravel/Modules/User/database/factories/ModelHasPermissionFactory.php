<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\ModelHasPermission;
>>>>>>> 4b6b99016 (first commit)

class ModelHasPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     */
    protected $model = \Modules\User\Models\ModelHasPermission::class;

    /**
     * Define the model's default state.
=======
     *
     * @var class-string<Model>
     */
    protected $model = ModelHasPermission::class;

    /**
     * Define the model's default state.
     *
     * @psalm-return array<never, never>
>>>>>>> 4b6b99016 (first commit)
     */
    public function definition(): array
    {
        return [];
    }
}
