<?php

declare(strict_types=1);
<<<<<<< HEAD

<<<<<<< .merge_file_RNbOgL
namespace Modules\Activity\Tests\Unit\Models;

use Modules\Activity\Models\StoredEvent;
use Modules\Activity\Tests\TestCase;
use Modules\Xot\Models\Traits\HasXotFactory;
use PHPUnit\Framework\Assert;
use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEventQueryBuilder;

use function Safe\class_uses;

uses(TestCase::class);

/**
 * Verifica il contratto pubblico del model StoredEvent (persistenza eventi).
 */
final class StoredEventBusinessLogicTest extends TestCase
{
    public function test_uses_dedicated_activity_database_connection(): void
    {
        Assert::assertSame('activity', (new StoredEvent)->getConnectionName());
    }

    public function test_uses_stored_events_table(): void
    {
        Assert::assertSame('stored_events', (new StoredEvent)->getTable());
    }

    public function test_exposes_expected_fillable_attributes_for_event_payload(): void
    {
        $expected = [
=======
uses(\Modules\Activity\Tests\TestCase::class);
use Modules\Activity\Models\StoredEvent;
use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent;

describe('StoredEvent Business Logic', function (): void {
    test('stored event has correct connection configured', function (): void {
        $storedEvent = new StoredEvent;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Activity\Models\StoredEvent;
use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent;

use function Safe\class_uses;

describe('StoredEvent Business Logic', function (): void {
    test('stored event has correct connection configured', function (): void {
        $storedEvent = new StoredEvent();
>>>>>>> 6ed19256f (.)

        expect($storedEvent->getConnectionName())->toBe('activity');
    });

    test('stored event has correct table configured', function (): void {
<<<<<<< HEAD
        $storedEvent = new StoredEvent;
=======
        $storedEvent = new StoredEvent();
>>>>>>> 6ed19256f (.)

        expect($storedEvent->getTable())->toBe('stored_events');
    });

    test('stored event has expected fillable fields for event sourcing', function (): void {
<<<<<<< HEAD
        $storedEvent = new StoredEvent;
=======
        $storedEvent = new StoredEvent();
>>>>>>> 6ed19256f (.)
        $expectedFillable = [
>>>>>>> .merge_file_G6GVU3
            'id',
            'aggregate_uuid',
            'aggregate_version',
            'event_version',
            'event_class',
            'event_properties',
            'meta_data',
            'created_at',
            'updated_by',
            'created_by',
        ];

        Assert::assertSame($expected, (new StoredEvent)->getFillable());
    }

    public function test_extends_spatie_eloquent_stored_event(): void {}

    public function test_uses_xot_factory_trait_for_test_data(): void
    {
        Assert::assertArrayHasKey(HasXotFactory::class, class_uses(StoredEvent::class));
    }

    public function test_exposes_event_sourcing_query_builder_entry_point(): void
    {
        Assert::assertInstanceOf(EloquentStoredEventQueryBuilder::class, StoredEvent::query());
    }
}
