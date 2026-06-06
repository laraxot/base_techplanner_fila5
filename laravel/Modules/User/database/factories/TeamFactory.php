<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
>>>>>>> origin/dev

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = \Modules\User\Models\Team::class;
=======
    protected $model = Team::class;
>>>>>>> origin/dev

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
