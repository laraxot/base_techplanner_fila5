<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\DeviceProfile;

class DeviceProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
=======
use Modules\User\Models\DeviceProfile;

/**
 * DeviceProfile Factory.
 *
 * Factory for creating DeviceProfile model instances for testing and seeding.
 * Extends DeviceUserFactory since DeviceProfile extends DeviceUser.
 */
class DeviceProfileFactory extends DeviceUserFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<DeviceProfile>
>>>>>>> 6ed19256f (.)
     */
    protected $model = DeviceProfile::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     */
    public function definition(): array
    {
        return [];
=======
     * Inherits from DeviceUserFactory and adds profile-specific attributes.
     *
     * @return array<string, mixed>
     */
    #[\Override]
    public function definition(): array
    {
        return array_merge(
            parent::definition(),
            [
                // DeviceProfile-specific attributes can be added here if needed
            ],
        );
>>>>>>> 6ed19256f (.)
    }
}
