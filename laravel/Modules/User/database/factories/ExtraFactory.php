<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Extra;
>>>>>>> 4b6b99016 (first commit)

class ExtraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     */
    protected $model = \Modules\User\Models\Extra::class;
=======
     *
     * @var class-string<Model>
     */
    protected $model = Extra::class;
>>>>>>> 4b6b99016 (first commit)

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
<<<<<<< HEAD
        return [];
=======
        return [
            // 'user_id' => $this->faker->randomNumber(5),
            'name' => $this->faker->name,
            'personal_team' => $this->faker->boolean,
        ];
>>>>>>> 4b6b99016 (first commit)
    }
}
