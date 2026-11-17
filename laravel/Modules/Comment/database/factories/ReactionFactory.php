<?php

namespace Modules\Comment\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Comment\Models\Reaction;

class ReactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Reaction::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
