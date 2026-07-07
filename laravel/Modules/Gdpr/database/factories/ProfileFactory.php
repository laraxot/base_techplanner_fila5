<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\Gdpr\Models\Profile;

=======
use Illuminate\Database\Eloquent\Model;
use Modules\Gdpr\Models\Profile;

/**
 * @extends Factory<Profile>
 */
>>>>>>> 6ed19256f (.)
class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
=======
     *
     * @var class-string<Profile>
>>>>>>> 6ed19256f (.)
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     */
    public function definition(): array
    {
        return [];
=======
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
>>>>>>> 6ed19256f (.)
    }
}
