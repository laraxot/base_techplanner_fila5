<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD

=======
use Illuminate\Database\Eloquent\Model;
use Modules\Gdpr\Models\Profile;

/**
 * @extends Factory<Profile>
 */
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\Gdpr\Models\Profile;

>>>>>>> dev
class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
     */
    protected $model = \Modules\Gdpr\Models\Profile::class;
=======
     */
    protected $model = Profile::class;
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
     * @var class-string<Profile>
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => fake()->word,
            'user_id' => fake()->unique()->randomNumber(),
            'phone' => fake()->phoneNumber,
            'email' => fake()->email,
            'bio' => fake()->text,
        ];
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
    }
}
