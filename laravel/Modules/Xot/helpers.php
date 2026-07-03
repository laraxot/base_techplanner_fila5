<?php

declare(strict_types=1);
use Illuminate\Database\Seeder;

/**
 * Xot Module Helper Functions
 *
 * This file aggregates all helper functions for the Xot module.
 */

declare(strict_types=1);

/**
 * Seed a model once per application lifetime using Laravel's built-in seeder system.
 *
 * @param  string  $model  Fully qualified model class name (e.g., 'Modules\\Gd\\Entities\\Website')
 */
function xot_seed_once(string $model): void
{
    // Import the model class
    $modelInstance = app($model);

    // Check if model exists and has entries
    if ($modelInstance::count() > 0) {
        return;
    }

    // Build seeder class name pattern
    $seederClass = class_basename($model).'Seeder';
    $seederClass = '\\'.ltrim($seederClass, '\\');

    // Check if seeder class exists
    if (class_exists($seederClass)) {
        // Instantiate and run the seeder
        $seeder = new $seederClass();
        if ($seeder instanceof Seeder) {
            $seeder->run();
        }
    }
}
