<?php

declare(strict_types=1);

namespace Modules\Activity\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> dev
use Modules\Activity\Models\Activity;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition(): array
    {
        return [
            'log_name' => $this->faker->randomElement(['default', 'auth', 'system']),
            'description' => $this->faker->sentence(),
<<<<<<< HEAD
            'subject_type' => $this->faker->randomElement(['Modules\\User\\Models\\User', 'App\\Models\\Appointment']),
            'subject_id' => $this->faker->randomNumber(),
            'causer_type' => 'Modules\\User\\Models\\User',
            'causer_id' => $this->faker->randomNumber(),
=======
            'subject_type' => $this->faker->randomElement(['Modules\User\Models\User', 'App\Models\Appointment']),
            'subject_id' => Str::uuid()->toString(),
            'causer_type' => 'Modules\User\Models\User',
            'causer_id' => Str::uuid()->toString(),
>>>>>>> dev
            'properties' => ['key' => 'value'],
            'batch_uuid' => $this->faker->uuid(),
            'event' => $this->faker->randomElement(['created', 'updated', 'deleted']),
            'created_at' => $this->faker->dateTimeBetween('-1 year'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year'),
        ];
    }
}
