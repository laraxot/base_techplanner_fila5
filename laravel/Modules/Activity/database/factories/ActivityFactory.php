<?php

declare(strict_types=1);

namespace Modules\Activity\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< .merge_file_Hmf6hX
=======
<<<<<<< HEAD
use Illuminate\Support\Str;
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_Ckttj4
use Modules\Activity\Models\Activity;

/**
 * @extends Factory<Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * @var class-string<Activity>
     */
    protected $model = Activity::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'log_name' => $this->faker->randomElement(['default', 'auth', 'system']),
            'description' => $this->faker->sentence(),
<<<<<<< HEAD
            'subject_type' => $this->faker->randomElement(['Modules\User\Models\User', 'App\Models\Appointment']),
            // User model uses UUID; subject_id/causer_id are string(36) in activity_log
            'subject_id' => $this->faker->uuid(),
            'causer_type' => 'Modules\User\Models\User',
<<<<<<< .merge_file_Hmf6hX
            'causer_id' => $this->faker->uuid(),
=======
            'causer_id' => Str::uuid()->toString(),
=======
            'subject_type' => $this->faker->randomElement(['Modules\\User\\Models\\User', 'App\\Models\\Appointment']),
            'subject_id' => $this->faker->randomNumber(),
            'causer_type' => 'Modules\\User\\Models\\User',
            'causer_id' => $this->faker->randomNumber(),
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_Ckttj4
            'properties' => ['key' => 'value'],
            'batch_uuid' => $this->faker->uuid(),
            'event' => $this->faker->randomElement(['created', 'updated', 'deleted']),
            'created_at' => $this->faker->dateTimeBetween('-1 year'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year'),
        ];
    }
}
