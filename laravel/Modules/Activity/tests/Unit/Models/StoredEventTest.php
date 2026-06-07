<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

use Modules\Activity\Models\StoredEvent;
=======
namespace Modules\Activity\Tests\Unit\Models;

uses(TestCase::class);

use Modules\Activity\Models\StoredEvent;
use Modules\Activity\Tests\TestCase;
use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent;
>>>>>>> dev

test('StoredEvent model can be instantiated', function () {
    $reflection = new \ReflectionClass(StoredEvent::class);
    $storedEvent = $reflection->newInstanceWithoutConstructor();

    expect($storedEvent)->toBeObject();
    // Verifichiamo che estenda il modello corretto da Spatie
<<<<<<< HEAD
    expect($storedEvent)->toBeInstanceOf(\Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent::class);
=======
    expect($storedEvent)->toBeInstanceOf(EloquentStoredEvent::class);
>>>>>>> dev
});

test('StoredEvent model has correct connection', function () {
    $reflection = new \ReflectionClass(StoredEvent::class);
    $storedEvent = $reflection->newInstanceWithoutConstructor();

    $property = $reflection->getProperty('connection');
    $property->setAccessible(true);

    expect($property->getValue($storedEvent))->toBe('activity');
});
