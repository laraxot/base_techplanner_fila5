<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\Gdpr\Models\Treatment;

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
    protected $model = Treatment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
