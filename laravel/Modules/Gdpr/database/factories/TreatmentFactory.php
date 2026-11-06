<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\Gdpr\Models\Treatment;

<<<<<<< .merge_file_7vaWJO
/**
 * @extends Factory<Treatment>
 */
class TreatmentFactory extends Factory
{
=======
=======
use Illuminate\Database\Eloquent\Model;
use Modules\Gdpr\Models\Treatment;

/**
 * @extends Factory<Treatment>
 */
>>>>>>> 6ed19256f (.)
class TreatmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
=======
     *
     * @var class-string<Treatment>
>>>>>>> 6ed19256f (.)
     */
>>>>>>> .merge_file_gP1rIO
    protected $model = Treatment::class;

    /**
     *
     * @return array<string, bool|int|string>
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
