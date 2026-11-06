<?php

declare(strict_types=1);

<<<<<<< .merge_file_4dMvwE
namespace Modules\Activity\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Activity\Models\Snapshot;
use Modules\Activity\Tests\TestCase;
use Modules\Xot\Models\Traits\HasXotFactory;
use PHPUnit\Framework\Assert;
use Spatie\EventSourcing\Snapshots\EloquentSnapshot as SpatieSnapshot;

use function Safe\class_uses;

uses(TestCase::class);

/**
 * Verifica il contratto pubblico del model Snapshot per event sourcing.
 */
final class SnapshotBusinessLogicTest extends TestCase
{
    public function test_uses_dedicated_activity_database_connection(): void
    {
        Assert::assertSame('activity', (new Snapshot)->getConnectionName());
    }

    public function test_exposes_expected_fillable_attributes_for_aggregate_state(): void
    {
        $expected = [
=======
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
>>>>>>> .merge_file_OQAHEu
            'id',
            'aggregate_uuid',
            'aggregate_version',
            'state',
            'created_at',
<<<<<<< HEAD
            'updated_at',
        ];

<<<<<<< .merge_file_4dMvwE
        Assert::assertSame($expected, (new Snapshot)->getFillable());
    }

    public function test_extends_spatie_eloquent_snapshot(): void
    {
        Assert::assertTrue((new \ReflectionClass(Snapshot::class))->isSubclassOf(SpatieSnapshot::class));
    }

    public function test_uses_xot_factory_trait_for_test_data(): void
    {
        Assert::assertArrayHasKey(HasXotFactory::class, class_uses(Snapshot::class));
    }

    public function test_can_query_snapshots_by_aggregate_uuid(): void
    {
        Assert::assertInstanceOf(Builder::class, Snapshot::uuid('00000000-0000-0000-0000-000000000001'));
    }

    public function test_can_query_snapshots_by_aggregate_version(): void
    {
        Assert::assertInstanceOf(Builder::class, Snapshot::whereAggregateVersion(1));
    }
}
=======
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
>>>>>>> .merge_file_OQAHEu
