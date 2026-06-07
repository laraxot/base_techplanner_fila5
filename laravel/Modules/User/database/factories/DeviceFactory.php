<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
use Modules\User\Models\Device;

/**
 * @extends Factory<Device>
 */
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Device;

>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
class DeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @var class-string<Device>
=======
     * @var class-string<Model>
>>>>>>> 4b6b99016 (first commit)
=======
     * @var class-string<Device>
>>>>>>> dev
     */
    protected $model = Device::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return array<string, mixed>
=======
>>>>>>> 4b6b99016 (first commit)
=======
     *
     * @return array<string, mixed>
>>>>>>> dev
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'name' => fake()->word(),
            'type' => 'mobile',
            'token' => fake()->uuid(),
            'is_active' => true,
=======
            // 'id' => $this->faker->randomNumber(5),
            // 'mobile_id' => $this->faker->randomNumber(5),
            'device' => $this->faker->word,
            'platform' => $this->faker->word,
            'browser' => $this->faker->word,
            'version' => $this->faker->word,
            'is_robot' => $this->faker->boolean,
            'robot' => $this->faker->word,
            'is_desktop' => $this->faker->boolean,
            'is_mobile' => $this->faker->boolean,
            'is_tablet' => $this->faker->boolean,
            'is_phone' => $this->faker->boolean,
>>>>>>> 4b6b99016 (first commit)
=======
            'uuid' => fake()->uuid(),
            'mobile_id' => fake()->uuid(),
            'languages' => [fake()->languageCode(), fake()->languageCode()],
            'device' => fake()->randomElement(['iPhone', 'Android', 'Desktop']),
            'platform' => fake()->randomElement(['iOS', 'Android', 'Windows', 'macOS', 'Linux']),
            'browser' => fake()->randomElement(['Safari', 'Chrome', 'Firefox', 'Edge']),
            'version' => fake()->numerify('#.#.#'),
            'is_robot' => false,
            'robot' => null,
            'is_desktop' => false,
            'is_mobile' => true,
            'is_tablet' => false,
            'is_phone' => true,
>>>>>>> dev
        ];
    }
}
