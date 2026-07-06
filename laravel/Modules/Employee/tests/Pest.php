<?php

declare(strict_types=1);

use Modules\Employee\Models\Employee;
use Modules\Employee\Models\WorkHour;

// Ogni file test dichiara uses(\Modules\Employee\Tests\TestCase::class, ...) singolarmente.
// Vietato uses()->in() qui (PHPStan method.internalClass / undefined $this in Pest extension).

function createEmployee(array $attributes = []): Employee
{
    return Employee::factory()->create($attributes);
}

function makeEmployee(array $attributes = []): Employee
{
    return Employee::factory()->make($attributes);
}

function createWorkHour(array $attributes = []): WorkHour
{
    return WorkHour::factory()->create($attributes);
}

function makeWorkHour(array $attributes = []): WorkHour
{
    return WorkHour::factory()->make($attributes);
}
