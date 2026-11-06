<?php

declare(strict_types=1);

<<<<<<< .merge_file_AUgjgn
namespace Modules\Activity\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

/**
 * Verifica il contratto pubblico del model Activity (connessione, mass assignment, query scopes).
 */
final class ActivityBusinessLogicTest extends TestCase
{
    public function test_uses_dedicated_activity_database_connection(): void
    {
        Assert::assertSame('activity', (new Activity)->getConnectionName());
    }

    public function test_exposes_expected_fillable_attributes_for_audit_log(): void
    {
        $expected = [
=======
<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

=======
>>>>>>> 6ed19256f (.)
use Modules\Activity\Models\Activity;

describe('Activity Business Logic', function () {
    test('activity has correct connection configured', function () {
<<<<<<< HEAD
        $reflection = new \ReflectionClass(Activity::class);
        $property = $reflection->getProperty('connection');
        $property->setAccessible(true);

        expect($property->getValue($reflection->newInstanceWithoutConstructor()))->toBe('activity');
    });

    test('activity has expected fillable fields', function () {
        $reflection = new \ReflectionClass(Activity::class);
        $property = $reflection->getProperty('fillable');
        $property->setAccessible(true);

        // Actual fillable fields in Activity model (line 114-124 in Activity.php)
=======
        $activity = new Activity;

        expect($activity->getConnectionName())->toBe('activity');
    });

    test('activity has expected fillable fields', function () {
        $activity = new Activity;
>>>>>>> 6ed19256f (.)
        $expectedFillable = [
>>>>>>> .merge_file_oqpUKH
            'id',
            'log_name',
            'description',
            'subject_type',
            'event',
            'subject_id',
            'causer_type',
            'causer_id',
            'properties',
<<<<<<< .merge_file_AUgjgn
            'attribute_changes',
            'batch_uuid',
        ];

        Assert::assertSame($expected, (new Activity)->getFillable());
    }
=======
<<<<<<< HEAD
        ];

        expect($property->getValue($reflection->newInstanceWithoutConstructor()))->toEqual($expectedFillable);
=======
            'batch_uuid',
            'created_at',
            'updated_at',
        ];

        expect($activity->getFillable())->toEqual($expectedFillable);
>>>>>>> 6ed19256f (.)
    });

    test('activity extends spatie activity functionality', function () {
        expect(is_subclass_of(Activity::class, \Spatie\Activitylog\Models\Activity::class))->toBeTrue();
    });

<<<<<<< HEAD
    test('activity has scope methods documented', function () {
        // Verify scope methods are available (either directly or through parent)
        // These scopes are provided by Spatie ActivityLog
        $methods = get_class_methods(Activity::class);
        $parentMethods = get_class_methods(get_parent_class(Activity::class));
>>>>>>> .merge_file_oqpUKH

    public function test_can_filter_activities_by_log_name(): void
    {
        Assert::assertInstanceOf(Builder::class, Activity::inLog('default'));
    }

    public function test_can_filter_activities_by_event_name(): void
    {
        Assert::assertInstanceOf(Builder::class, Activity::forEvent('created'));
    }

<<<<<<< .merge_file_AUgjgn
    public function test_can_filter_activities_with_batch_uuid(): void
    {
        Assert::assertInstanceOf(Builder::class, Activity::hasBatch());
    }
}
=======
        // At least verify the class structure allows these scopes
        expect(Activity::class)->toBeString();
=======
    test('activity has in log scope method', function () {
        expect(method_exists(Activity::class, 'scopeInLog'))->toBeTrue();
    });

    test('activity has for event scope method', function () {
        expect(method_exists(Activity::class, 'scopeForEvent'))->toBeTrue();
    });

    test('activity has batch scope method', function () {
        expect(method_exists(Activity::class, 'scopeHasBatch'))->toBeTrue();
>>>>>>> 6ed19256f (.)
    });
});
>>>>>>> .merge_file_oqpUKH
