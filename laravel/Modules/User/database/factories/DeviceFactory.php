<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\Device;

/**
 * @extends Factory<Device>
 */
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Device;

>>>>>>> 4b6b99016 (first commit)
class DeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
     * @var class-string<Device>
=======
     * @var class-string<Model>
>>>>>>> 4b6b99016 (first commit)
     */
    protected $model = Device::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     *
     * @return array<string, mixed>
=======
>>>>>>> 4b6b99016 (first commit)
     */
    public function definition(): array
    {
        return [
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
        ];
    }
}
