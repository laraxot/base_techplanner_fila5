<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

use Modules\Activity\Models\Snapshot;
=======
namespace Modules\Activity\Tests\Unit\Models;

uses(TestCase::class);

use Modules\Activity\Models\Snapshot;
use Modules\Activity\Tests\TestCase;
use Spatie\EventSourcing\Snapshots\EloquentSnapshot;
>>>>>>> dev

test('Snapshot model can be instantiated', function () {
    $reflection = new \ReflectionClass(Snapshot::class);
    $snapshot = $reflection->newInstanceWithoutConstructor();

    expect($snapshot)->toBeObject();
    // Verifichiamo che estenda il modello corretto da Spatie
<<<<<<< HEAD
    expect($snapshot)->toBeInstanceOf(\Spatie\EventSourcing\Snapshots\EloquentSnapshot::class);
=======
    expect($snapshot)->toBeInstanceOf(EloquentSnapshot::class);
>>>>>>> dev
});

test('Snapshot model has correct connection', function () {
    $reflection = new \ReflectionClass(Snapshot::class);
    $snapshot = $reflection->newInstanceWithoutConstructor();

    $property = $reflection->getProperty('connection');
    $property->setAccessible(true);

    expect($property->getValue($snapshot))->toBe('activity');
});
