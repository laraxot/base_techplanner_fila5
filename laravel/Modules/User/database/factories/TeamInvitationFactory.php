<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\TeamInvitation;
>>>>>>> 4b6b99016 (first commit)

class TeamInvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     */
    protected $model = \Modules\User\Models\TeamInvitation::class;
=======
     *
     * @var class-string<Model>
     */
    protected $model = TeamInvitation::class;
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
            'email' => $this->faker->email,
            'role' => $this->faker->word,
        ];
>>>>>>> 4b6b99016 (first commit)
    }
}
