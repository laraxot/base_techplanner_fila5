<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD

=======
use Illuminate\Database\Eloquent\Model;
use Modules\Gdpr\Models\Event;

/**
 * @extends Factory<Event>
 */
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\Gdpr\Models\Event;

>>>>>>> dev
class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
     */
    protected $model = \Modules\Gdpr\Models\Event::class;
=======
     *
     * @var class-string<Event>
     */
    protected $model = Event::class;
>>>>>>> 4b6b99016 (first commit)
=======
     */
    protected $model = Event::class;
>>>>>>> dev

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
