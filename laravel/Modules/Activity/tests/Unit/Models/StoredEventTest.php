<?php

declare(strict_types=1);

uses(\Modules\Activity\Tests\TestCase::class);

use Modules\Activity\Models\StoredEvent;

test('StoredEvent model can be instantiated', function () {
    $reflection = new \ReflectionClass(StoredEvent::class);
    $storedEvent = $reflection->newInstanceWithoutConstructor();

    expect($storedEvent)->toBeObject();
    // Verifichiamo che estenda il modello corretto da Spatie
    expect($storedEvent)->toBeInstanceOf(\Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent::class);
});

test('StoredEvent model has correct connection', function () {
    $storedEvent = new StoredEvent();

    expect($storedEvent->getConnectionName())->toBe('activity');
});
