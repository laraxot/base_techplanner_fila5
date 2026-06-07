<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\ModelHasRole;
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\User\Models\ModelHasRole;
>>>>>>> dev

class ModelHasRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
     */
    protected $model = \Modules\User\Models\ModelHasRole::class;
=======
     */
    protected $model = ModelHasRole::class;
>>>>>>> dev

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
<<<<<<< HEAD
=======
     *
     * @var class-string<Model>
     */
    protected $model = ModelHasRole::class;

    /**
     * Define the model's default state.
     *
     * @return array<int|string>
     *
     * @psalm-return array{role_id: int, model_type: string, model_id: int}
     */
    public function definition(): array
    {
        return [
            'role_id' => $this->faker->randomNumber(5, false),
            'model_type' => $this->faker->word,
            'model_id' => $this->faker->randomNumber(5, false),
        ];
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
    }
}
