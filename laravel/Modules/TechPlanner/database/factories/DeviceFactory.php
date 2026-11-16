<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\TechPlanner\Models\Device;

/** @extends Factory<Device> */
class DeviceFactory extends Factory
{
    protected $model = Device::class;

    /**
     * Synthetic but schema-valid technical equipment for tests and local demos.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => ClientFactory::new(),
            'type' => $this->faker->randomElement(['Endorale', 'Panoramico', 'Telecomandato']),
            'brand' => $this->faker->randomElement(['Carestream', 'Planmeca', 'Vatech', 'Durr Dental']),
            'model' => $this->faker->bothify('TP-####'),
            'headset_serial' => $this->faker->unique()->bothify('CU-######'),
            'tube_serial' => $this->faker->unique()->bothify('TB-######'),
            'kv' => $this->faker->randomFloat(2, 40, 120),
            'ma' => $this->faker->randomFloat(2, 1, 25),
            'first_verification_date' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
