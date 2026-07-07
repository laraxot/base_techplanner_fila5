<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> 6ed19256f (.)
use Modules\User\Models\TeamInvitation;

class TeamInvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
=======
     *
     * @var class-string<Model>
>>>>>>> 6ed19256f (.)
     */
    protected $model = TeamInvitation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
<<<<<<< HEAD
        return [];
=======
        return [
            'email' => $this->faker->email,
            'role' => $this->faker->word,
        ];
>>>>>>> 6ed19256f (.)
    }
}
