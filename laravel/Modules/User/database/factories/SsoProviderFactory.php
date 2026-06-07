<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\User\Models\SsoProvider;
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\User\Models\SsoProvider;
>>>>>>> dev

class SsoProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    protected $model = \Modules\User\Models\SsoProvider::class;
=======
    protected $model = SsoProvider::class;
>>>>>>> 4b6b99016 (first commit)
=======
    protected $model = SsoProvider::class;
>>>>>>> dev

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
