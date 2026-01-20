<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD

=======
use Illuminate\Database\Eloquent\Model;
use Modules\Gdpr\Models\Treatment;

/**
 * @extends Factory<Treatment>
 */
>>>>>>> 4b6b99016 (first commit)
class TreatmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     */
    protected $model = \Modules\Gdpr\Models\Treatment::class;
=======
     *
     * @var class-string<Treatment>
     */
    protected $model = Treatment::class;
>>>>>>> 4b6b99016 (first commit)

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
