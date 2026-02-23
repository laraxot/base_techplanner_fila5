<?php

declare(strict_types=1);

uses(\Modules\Activity\Tests\TestCase::class);

use Modules\Activity\Models\Snapshot;

test('Snapshot model can be instantiated', function () {
    $reflection = new \ReflectionClass(Snapshot::class);
    $snapshot = $reflection->newInstanceWithoutConstructor();

    expect($snapshot)->toBeObject();
    // Verifichiamo che estenda il modello corretto da Spatie
    expect($snapshot)->toBeInstanceOf(\Spatie\EventSourcing\Snapshots\EloquentSnapshot::class);
});

test('Snapshot model has correct connection', function () {
    $snapshot = new Snapshot();

    expect($snapshot->getConnectionName())->toBe('activity');
});
