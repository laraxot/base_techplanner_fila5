<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Profile;

<<<<<<< HEAD
/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
=======
class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
>>>>>>> 6ed19256f (.)
    protected $model = Profile::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bio' => $this->faker->text(200),
            'avatar' => '/avatars/'.$this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'date_of_birth' => $this->faker->date(),
            'location' => $this->faker->city(),
            'website' => $this->faker->url(),
            'twitter' => $this->faker->userName(),
            'facebook' => $this->faker->userName(),
            'linkedin' => $this->faker->userName(),
            'github' => $this->faker->userName(),
        ];
=======
     */
    public function definition(): array
    {
        return [];
>>>>>>> 6ed19256f (.)
    }
}
