# Pest Testing Patterns & Strategies - 100% Coverage Initiative

**Goal:** Document testing patterns for 100% Pest coverage across all 14 modules.

**Last Updated:** 2026-03-05

---

## 1. Testing Pattern: Spatie QueueableAction

All business logic goes into Actions. Testing pattern:

```php
<?php

declare(strict_types=1);

namespace Modules\Meetup\Tests\Unit\Actions\Event;

use Modules\Meetup\Actions\Event\CreateEventAction;
use Modules\Meetup\Datas\EventData;
use Modules\Meetup\Models\Event;
use Modules\Meetup\Models\Venue;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CreateEventActionTest extends TestCase
{
    use DatabaseTransactions; // ❌ REDUNDANT (Already in XotBaseTestCase)

    #[Test]
    public function create_event_action_creates_event_with_valid_data(): void
    {
        $venue = Venue::factory()->create();
        
        $data = EventData::from([
            'title' => 'Laravel Meetup',
            'description' => 'Learn Laravel 12',
            'start_datetime' => now()->addDay(),
            'end_datetime' => now()->addDay()->addHours(2),
            'venue_id' => $venue->id,
        ]);

        $event = app(CreateEventAction::class)->execute($data);

        $this->assertDatabaseHas('meetup_events', [
            'id' => $event->id,
            'title' => 'Laravel Meetup',
            'venue_id' => $venue->id,
        ]);
        $this->assertInstanceOf(Event::class, $event);
    }

    #[Test]
    public function create_event_action_validates_dates(): void
    {
        $venue = Venue::factory()->create();
        
        $data = EventData::from([
            'title' => 'Laravel Meetup',
            'start_datetime' => now()->subDay(),  // Past date
            'end_datetime' => now(),
            'venue_id' => $venue->id,
        ]);

        $this->expectException(ValidationException::class);
        app(CreateEventAction::class)->execute($data);
    }

    #[Test]
    public function create_event_action_logs_activity(): void
    {
        $venue = Venue::factory()->create();
        $data = EventData::from([...]);

        $event = app(CreateEventAction::class)->execute($data);

        // Activity module logs all model changes
        $this->assertTrue(
            Activity::query()
                ->where('subject_type', Event::class)
                ->where('subject_id', $event->id)
                ->exists()
        );
    }
}
```

**Pattern Rules:**
- Use `app(ActionClass::class)->execute($data)` - never custom method names
- Test happy path (success scenario)
- Test validation errors
- Test side effects (activity, events, jobs)
- Use factories for related models
- No DI in constructor - resolve inline with `app()`

---

## 2. Testing Pattern: Eloquent Models

Test all aspects of models:

```php
<?php

declare(strict_types=1);

namespace Modules\Meetup\Tests\Unit\Models;

use Modules\Meetup\Enums\EventStatus;
use Modules\Meetup\Models\Event;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class EventTest extends TestCase
{
    use DatabaseTransactions;

    // Instantiation & Factory
    #[Test]
    public function event_model_can_be_instantiated(): void
    {
        $event = Event::factory()->create();
        $this->assertInstanceOf(Event::class, $event);
    }

    // Fillable Fields
    #[Test]
    public function event_has_expected_fillable_fields(): void
    {
        $expected = ['title', 'description', 'start_datetime', 'end_datetime', 'venue_id'];
        foreach ($expected as $field) {
            $this->assertContains($field, Event::factory()->make()->getFillable());
        }
    }

    // Relations (including belongsToManyX!)
    #[Test]
    public function event_has_many_participants(): void
    {
        $event = Event::factory()->create();
        $participants = Participant::factory(3)->for($event)->create();

        $this->assertCount(3, $event->participants);
    }

    #[Test]
    public function event_participants_are_belongsToManyX(): void
    {
        $event = Event::factory()->create();
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        // belongsToManyX creates pivot automatically
        $event->participants()->attach([$user1->id, $user2->id]);

        $this->assertCount(2, $event->participants);
        $this->assertTrue($event->participants->contains($user1));
        $this->assertTrue($event->participants->contains($user2));
    }

    // Scopes
    #[Test]
    public function upcoming_scope_returns_future_events(): void
    {
        Event::factory()->create(['start_datetime' => now()->addDay()]);
        Event::factory()->create(['start_datetime' => now()->subDay()]);

        $upcoming = Event::upcoming()->get();

        $this->assertCount(1, $upcoming);
    }

    // Mutators/Accessors
    #[Test]
    public function event_slug_generated_from_title(): void
    {
        $event = Event::factory()->create(['title' => 'Laravel Meetup 2024']);
        
        $this->assertEquals('laravel-meetup-2024', $event->slug);
    }

    // Casts
    #[Test]
    public function event_casts_start_datetime_to_carbon(): void
    {
        $event = Event::factory()->create();
        
        $this->assertInstanceOf(Carbon::class, $event->start_datetime);
    }

    // Static Methods
    #[Test]
    public function get_by_slug_returns_event(): void
    {
        $event = Event::factory()->create(['slug' => 'laravel-2024']);

        $found = Event::getBySlug('laravel-2024');

        $this->assertEquals($event->id, $found->id);
    }
}
```

**Pattern Rules:**
- Test factory instantiation
- Test fillable/guarded
- Test **all relations** (especially belongsToManyX)
- Test **all scopes**
- Test mutators/accessors
- Test casts
- Test static methods
- Test edge cases (null, empty, etc.)

---

## 3. Testing Pattern: Services

Services contain utility logic:

```php
<?php

declare(strict_types=1);

namespace Modules\Meetup\Tests\Unit\Services;

use Modules\Meetup\Models\Event;
use Modules\Meetup\Services\EventService;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class EventServiceTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function service_publishes_event(): void
    {
        $event = Event::factory()->create(['status' => EventStatus::DRAFT]);
        
        app(EventService::class)->publish($event);

        $this->assertEquals(EventStatus::PUBLISHED, $event->refresh()->status);
    }

    #[Test]
    public function service_counts_participants(): void
    {
        $event = Event::factory()->create();
        Participant::factory(5)->for($event)->create();

        $count = app(EventService::class)->getParticipantCount($event);

        $this->assertEquals(5, $count);
    }

    #[Test]
    public function service_handles_event_cancellation(): void
    {
        $event = Event::factory()->create(['status' => EventStatus::PUBLISHED]);

        app(EventService::class)->cancel($event, 'Venue unavailable');

        $this->assertEquals(EventStatus::CANCELLED, $event->refresh()->status);
    }
}
```

**Pattern Rules:**
- One test per public method
- Test return values
- Test side effects (DB changes, events dispatched)
- Test error scenarios

---

## 4. Testing Pattern: Filament Resources

Test forms, tables, authorization:

```php
<?php

declare(strict_types=1);

namespace Modules\Meetup\Tests\Unit\Filament\Resources;

use Modules\Meetup\Filament\Resources\EventResource;
use Modules\Meetup\Models\Event;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class EventResourceTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function event_resource_can_create(): void
    {
        $user = User::factory()->admin()->create();

        $canCreate = (new EventResource())
            ->canCreate($user);

        $this->assertTrue($canCreate);
    }

    #[Test]
    public function event_resource_form_has_title_field(): void
    {
        $resource = new EventResource();
        $form = $resource->form(Form::make());

        $fields = $form->getComponents();
        $this->assertTrue($fields->contains(fn ($field) => $field->getName() === 'title'));
    }

    #[Test]
    public function event_resource_table_has_columns(): void
    {
        $resource = new EventResource();
        $table = $resource->table(Table::make());

        $columns = $table->getColumns();
        $this->assertCount(5, $columns);
    }
}
```

---

## 5. Testing Pattern: DTOs (Spatie Data)

DTOs validate structure:

```php
<?php

declare(strict_types=1);

namespace Modules\Meetup\Tests\Unit\Datas;

use Modules\Meetup\Datas\EventData;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class EventDataTest extends TestCase
{
    #[Test]
    public function event_data_can_be_instantiated(): void
    {
        $data = EventData::from([
            'title' => 'Laravel Meetup',
            'description' => 'Learn Laravel',
            'start_datetime' => now()->addDay(),
            'end_datetime' => now()->addDay()->addHours(2),
            'venue_id' => 1,
        ]);

        $this->assertEquals('Laravel Meetup', $data->title);
    }

    #[Test]
    public function event_data_validates_required_fields(): void
    {
        $this->expectException(ValidationException::class);

        EventData::from([
            'title' => '', // Required, empty
        ]);
    }
}
```

---

## 6. Testing Pattern: Enums

Test all enum cases:

```php
<?php

declare(strict_types=1);

namespace Modules\Meetup\Tests\Unit\Enums;

use Modules\Meetup\Enums\EventStatus;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class EventStatusTest extends TestCase
{
    #[Test]
    public function event_status_has_all_expected_cases(): void
    {
        $cases = EventStatus::cases();
        
        $this->assertContains(EventStatus::DRAFT, $cases);
        $this->assertContains(EventStatus::PUBLISHED, $cases);
        $this->assertContains(EventStatus::CANCELLED, $cases);
        $this->assertCount(3, $cases);
    }

    #[Test]
    public function event_status_draft_value(): void
    {
        $this->assertEquals('draft', EventStatus::DRAFT->value);
    }
}
```

---

## 7. Testing belongsToManyX Relations (CRITICAL)

This is NOT standard belongsToMany:

```php
<?php

declare(strict_types=1);

namespace Modules\Meetup\Tests\Unit\Relations;

use Modules\Meetup\Models\Event;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class BelongsToManyXTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function event_has_many_to_many_x_participants(): void
    {
        $event = Event::factory()->create();
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        // belongsToManyX creates EventUser pivot automatically
        $event->participants()->attach([$user1->id, $user2->id]);

        $this->assertCount(2, $event->participants);
        $this->assertTrue($event->participants->contains($user1));
    }

    #[Test]
    public function belongsToManyX_has_pivot_timestamps(): void
    {
        $event = Event::factory()->create();
        $user = User::factory()->create();

        $event->participants()->attach($user->id);

        // belongsToManyX includes pivot timestamps
        $pivot = $event->participants()
            ->where('user_id', $user->id)
            ->first()
            ->pivot;

        $this->assertNotNull($pivot->created_at);
        $this->assertNotNull($pivot->updated_at);
    }

    #[Test]
    public function belongsToManyX_handles_pivot_data(): void
    {
        $event = Event::factory()->create();
        $user = User::factory()->create();

        $event->participants()->attach($user->id, [
            'role' => 'speaker',
            'status' => 'confirmed',
        ]);

        $pivot = $event->participants()
            ->where('user_id', $user->id)
            ->first()
            ->pivot;

        $this->assertEquals('speaker', $pivot->role);
        $this->assertEquals('confirmed', $pivot->status);
    }
}
```

**Key differences from belongsToMany:**
- Auto-creates pivot table with timestamps
- Uses pivot class (EventUser, EventPerformer, etc.)
- Supports cross-database relations
- withPivot() behavior included

---

## 8. Test Structure Best Practices

### File Organization
```
Modules/{Module}/tests/
├── Unit/
│   ├── Models/
│   │   ├── EventTest.php
│   │   ├── ParticipantTest.php
│   │   └── VenueTest.php
│   ├── Actions/
│   │   └── Event/
│   │       ├── CreateEventActionTest.php
│   │       ├── UpdateEventActionTest.php
│   │       └── DeleteEventActionTest.php
│   ├── Services/
│   │   └── EventServiceTest.php
│   ├── Filament/
│   │   └── Resources/
│   │       └── EventResourceTest.php
│   └── Enums/
│       └── EventStatusTest.php
└── Feature/
    └── EventIntegrationTest.php
```

### Test Naming Convention
```php
// ✅ GOOD
#[Test]
public function event_can_be_created_with_valid_data(): void

// ✅ GOOD
#[Test]
public function create_event_action_validates_start_date(): void

// ❌ AVOID
public function testCreateEvent(): void

// ❌ AVOID
public function test(): void
```

---

## 9. Common Testing Utilities

### DatabaseTransactions Trait
```php
// use DatabaseTransactions;  // ❌ REDUNDANT (Already in XotBaseTestCase)
```
DatabaseTransactions is already included in `XotBaseTestCase`. Do NOT add it again in your test cases or unit tests to avoid redundancy.

### Factory Usage
```php
// Create single model
$event = Event::factory()->create();

// Create multiple
$events = Event::factory(5)->create();

// Create with attributes
$event = Event::factory()->create([
    'title' => 'My Event',
    'status' => EventStatus::PUBLISHED,
]);

// Use factory states
$event = Event::factory()->online()->create();
```

### Assertions
```php
// Model assertions
$this->assertInstanceOf(Event::class, $event);
$this->assertTrue($event->is_published);

// Database assertions
$this->assertDatabaseHas('meetup_events', [
    'id' => $event->id,
    'title' => 'Laravel Meetup',
]);

// Collection assertions
$this->assertCount(5, $events);
$this->assertTrue($events->contains($event));

// Exception assertions
$this->expectException(ValidationException::class);
```

---

## 10. Coverage Goals by Module

### What Counts as 100%?

| Category | Coverage Goal | Notes |
|----------|---------------|-------|
| **Actions** | 100% | Every execute() method tested |
| **Models** | 100% | Attributes, relations, scopes, mutators |
| **Services** | 100% | Every public method tested |
| **Filament Resources** | 100% | Forms, tables, authorization |
| **DTOs** | 100% | Validation, instantiation |
| **Enums** | 100% | All cases, values |
| **Traits** | 100% | Methods provided by trait |
| **Policies** | 100% | All authorization checks |
| **Middleware** | 100% | All paths through middleware |
| **Providers** | 80% | Boot, register (side effects) |

---

## 11. Performance Tips

- Use in-memory SQLite for tests if possible
- Parallel testing: `php artisan test --parallel`
- Skip slow tests during dev: mark with `#[Skip]`
- Use factories efficiently (batch create with multiple)
- Avoid large datasets in tests

---

## 12. Documentation After Coverage

After reaching 100% coverage for a module, create:

1. **Modules/{Module}/docs/coverage.md**
   - Coverage metrics
   - Test count by category
   - Execution time

2. **Modules/{Module}/docs/test-patterns.md**
   - Module-specific patterns
   - Custom assertions
   - Test helpers

3. **Modules/{Module}/docs/learnings.md**
   - Gotchas discovered
   - Edge cases found
   - Improvements made

---

## Progress Tracker

| Module | Models | Actions | Services | Filament | DTOs | Total |
|--------|--------|---------|----------|----------|------|-------|
| Meetup | ✅ 56 | ⏳ 0 | ⏳ 0 | ⏳ 0 | ⏳ 0 | 56/250+ |
| Xot | ⏳ 0 | ⏳ 0 | ⏳ 0 | ⏳ 0 | ⏳ 0 | 0/280+ |
| Tenant | ⏳ 0 | ⏳ 0 | ⏳ 0 | ⏳ 0 | ⏳ 0 | 0/105 |
| Lang | ⏳ 0 | ⏳ 0 | ⏳ 0 | ⏳ 0 | ⏳ 0 | 0/110 |

---

**Generated:** 2026-03-05  
**Last Updated:** In-progress  
**Related Issue:** #191 (Epic: 100% Pest Coverage)

