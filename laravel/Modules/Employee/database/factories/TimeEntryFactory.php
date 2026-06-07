<?php

declare(strict_types=1);

namespace Modules\Employee\Database\Factories;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Employee\Models\TimeEntry;
=======
use Modules\Employee\Models\TimeEntry;
use Illuminate\Database\Eloquent\Factories\Factory;
>>>>>>> 4b6b99016 (first commit)
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Employee\Models\TimeEntry;
>>>>>>> dev

class TimeEntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = TimeEntry::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
