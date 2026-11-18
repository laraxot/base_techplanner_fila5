<?php

declare(strict_types=1);

namespace Modules\Comment\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Comment\Models\Reaction;

/**
 * @extends Factory<Reaction>
 */
class ReactionFactory extends Factory
{
    /**
     * @var class-string<Reaction>
     */
    protected $model = Reaction::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
