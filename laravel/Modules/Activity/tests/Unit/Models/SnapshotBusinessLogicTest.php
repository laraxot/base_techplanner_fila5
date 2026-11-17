<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

=======
use function Safe\class_uses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> 6ed19256f (.)
use Modules\Activity\Models\Snapshot;
use Spatie\EventSourcing\Snapshots\EloquentSnapshot;

describe('Snapshot Business Logic', function () {
    test('snapshot has correct connection configured', function () {
<<<<<<< HEAD
        $reflection = new \ReflectionClass(Snapshot::class);
        $property = $reflection->getProperty('connection');
        $property->setAccessible(true);

        expect($property->getValue($reflection->newInstanceWithoutConstructor()))->toBe('activity');
    });

    test('snapshot has expected fillable fields for event sourcing', function () {
        $reflection = new \ReflectionClass(Snapshot::class);
        $property = $reflection->getProperty('fillable');
        $property->setAccessible(true);

=======
        $snapshot = new Snapshot;

        expect($snapshot->getConnectionName())->toBe('activity');
    });

    test('snapshot has expected fillable fields for event sourcing', function () {
        $snapshot = new Snapshot;
>>>>>>> 6ed19256f (.)
        $expectedFillable = [
            'id',
            'aggregate_uuid',
            'aggregate_version',
            'state',
            'created_at',
<<<<<<< HEAD
            'updated_at',
        ];

        expect($property->getValue($reflection->newInstanceWithoutConstructor()))->toEqual($expectedFillable);
=======
            'updated_at'
        ];

        expect($snapshot->getFillable())->toEqual($expectedFillable);
>>>>>>> 6ed19256f (.)
    });

    test('snapshot extends eloquent snapshot from spatie', function () {
        expect(is_subclass_of(Snapshot::class, EloquentSnapshot::class))->toBeTrue();
    });

<<<<<<< HEAD
    test('snapshot has query builder methods documented', function () {
        $reflection = new \ReflectionClass(Snapshot::class);
        $docComment = $reflection->getDocComment();

        // Verify @method annotations exist for query builder methods
        expect($docComment)->toContain('@method');
        expect($docComment)->toContain('uuid');
        expect($docComment)->toContain('whereAggregateVersion');
=======
    test('snapshot has factory trait for testing', function () {
        $traits = class_uses(Snapshot::class);

        expect($traits)->toHaveKey(HasFactory::class);
    });

    test('snapshot has uuid scope method', function () {
        expect(method_exists(Snapshot::class, 'scopeUuid'))->toBeTrue();
    });

    test('snapshot can query by aggregate version', function () {
        expect(method_exists(Snapshot::class, 'whereAggregateVersion'))->toBeTrue();
>>>>>>> 6ed19256f (.)
    });
});
