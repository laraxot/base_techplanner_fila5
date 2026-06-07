<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Xot\Models\Module;

/**
<<<<<<< HEAD
 * Module Factory
=======
 * Module Factory.
>>>>>>> dev
 *
 * @extends Factory<Module>
 */
class ModuleFactory extends Factory
{
    protected $model = Module::class;

    public function definition(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'name' => fake()->word(),
            'slug' => fake()->slug(),
            'version' => fake()->semver(),
            'description' => fake()->sentence(),
            'is_active' => fake()->boolean(80),
            'priority' => fake()->numberBetween(1, 100),
<<<<<<< HEAD
=======
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'version' => $this->faker->semver(),
            'description' => $this->faker->sentence(),
            'is_active' => $this->faker->boolean(80),
            'priority' => $this->faker->numberBetween(1, 100),
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ];
    }

    public function active(): static
    {
        return $this->state(fn (array $_attributes): array => [
            'is_active' => true,
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $_attributes): array => [
            'is_active' => false,
        ]);
    }

    public function highPriority(): static
    {
        return $this->state(fn (array $_attributes): array => [
            'priority' => $this->faker->numberBetween(80, 100),
        ]);
    }
}
