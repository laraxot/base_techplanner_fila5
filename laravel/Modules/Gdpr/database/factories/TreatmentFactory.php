<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Gdpr\Models\Treatment;

/**
 * @extends Factory<Treatment>
 */
class TreatmentFactory extends Factory
{
    protected $model = Treatment::class;

    /**
     * <<<<<<< HEAD.
     *
     * @return array<string, bool|int|string>
     *                                        =======
     * @return array<string, mixed>
     *                                        >>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
     */
    public function definition(): array
    {
        return [
            'name' => 'treatment-'.fake()->unique()->uuid(),
            'description' => fake()->sentence(),
            'weight' => fake()->numberBetween(1, 10),
            'active' => true,
            'required' => false,
        ];
    }
}
