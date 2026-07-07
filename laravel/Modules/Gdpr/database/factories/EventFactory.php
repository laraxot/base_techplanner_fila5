<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\Gdpr\Models\Event;

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
    protected $model = Event::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
