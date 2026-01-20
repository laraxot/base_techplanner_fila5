<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Modules\User\Models\SsoProvider;
>>>>>>> 4b6b99016 (first commit)

class SsoProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = \Modules\User\Models\SsoProvider::class;
=======
    protected $model = SsoProvider::class;
>>>>>>> 4b6b99016 (first commit)

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
