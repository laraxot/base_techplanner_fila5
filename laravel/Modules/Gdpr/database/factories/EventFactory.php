<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\Gdpr\Models\Event;

<<<<<<< .merge_file_i7mKAb
/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
=======
=======
use Illuminate\Database\Eloquent\Model;
use Modules\Gdpr\Models\Event;

/**
 * @extends Factory<Event>
 */
>>>>>>> 6ed19256f (.)
class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
=======
     *
     * @var class-string<Event>
>>>>>>> 6ed19256f (.)
     */
>>>>>>> .merge_file_mNzB1r
    protected $model = Event::class;

    /**
     *
     * @return array<string, string>
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_id' => fake()->uuid(),
            'ip' => '127.0.0.1',
            'action' => 'consent_given',
            'payload' => '{}',
        ];
    }
}
