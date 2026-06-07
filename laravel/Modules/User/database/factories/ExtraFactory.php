<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Extra;
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\User\Models\Extra;
>>>>>>> dev

class ExtraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
     */
    protected $model = \Modules\User\Models\Extra::class;
=======
     *
     * @var class-string<Model>
     */
    protected $model = Extra::class;
>>>>>>> 4b6b99016 (first commit)
=======
     */
    protected $model = Extra::class;
>>>>>>> dev

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return [];
=======
        return [
            // 'user_id' => $this->faker->randomNumber(5),
            'name' => $this->faker->name,
            'personal_team' => $this->faker->boolean,
        ];
>>>>>>> 4b6b99016 (first commit)
=======
        return [];
>>>>>>> dev
    }
}
