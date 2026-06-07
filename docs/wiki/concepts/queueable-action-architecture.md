---
title: "QueueableAction Architecture Philosophy"
type: concept
sources: ["laravel/Modules/docs/QUEUEABLE-ACTION-RULE.md", "docs/project/AGENTS.md"]
confidence: high
created: 2026-06-01
updated: 2026-06-01
tags: [architecture, queueable-action, pattern, spatie, philosophy, religion]
related:
  - concepts/single-responsibility-principle.md
  - entities/spatie-laravel-queueable-action.md
  - rules/no-services-rule.md
---

# QueueableAction Architecture Philosophy

> **Religion**: NEVER use Services, ALWAYS use QueueableActions.  
> **Package**: [spatie/laravel-queueable-action](https://github.com/spatie/laravel-queueable-action)  
> **Source**: `laravel/Modules/docs/QUEUEABLE-ACTION-RULE.md`

---

## The Zen of QueueableAction

### Why Not Services?

Services violate the **Single Responsibility Principle** by design. They grow into "god classes" that accumulate unrelated methods:

```php
// ❌ The Service Anti-Pattern
class TicketService {
    public function create() { ... }      // Creation logic
    public function update() { ... }      // Update logic  
    public function delete() { ... }      // Deletion logic
    public function notify() { ... }      // Notification logic
    public function export() { ... }      // Export logic
    public function import() { ... }      // Import logic
    // ... grows indefinitely
}
```

**Problems:**
- ❌ Violates SRP (Single Responsibility Principle)
- ❌ Cannot be queued
- ❌ Hard to test (requires mocking entire service)
- ❌ Becomes "god class" over time
- ❌ No clear boundary of responsibility

### Why QueueableAction?

QueueableAction enforces **single responsibility** by pattern design:

```php
// ✅ The QueueableAction Pattern
class CreateTicketAction {
    use QueueableAction;
    public function handle(): Ticket { ... }
}

class UpdateTicketAction {
    use QueueableAction;
    public function handle(): Ticket { ... }
}

class DeleteTicketAction {
    use QueueableAction;
    public function handle(): void { ... }
}

class NotifyTicketCreatedAction {
    use QueueableAction;
    public function handle(): void { ... }
}
```

**Benefits:**
- ✅ Single Responsibility enforced
- ✅ Can run sync (`->execute()`)
- ✅ Can run async (`->onQueue()->execute()`)
- ✅ Easy to test (isolated unit)
- ✅ Never grows into god class
- ✅ Clear responsibility boundary

---

## The Philosophy (Zen)

### 1. One Action = One Responsibility

```
Zen principle: "Do one thing and do it well"

QueueableAction: "Parse GeoJSON and return categories"
NOT: "Parse GeoJSON, validate data, send notifications, update cache, log metrics"
```

### 2. Queue as First-Class Citizen

```
Zen principle: "Everything that can be deferred, should be deferred"

QueueableAction can always be queued:
- Heavy operations → queue
- Fast operations → run sync
- Decision at call site, not implementation
```

### 3. Constructor Injection as Contract

```
Zen principle: "Dependencies are explicit, not hidden"

class BuildCategoriesAction {
    public function __construct(
        protected string $geoJsonPath,  // Explicit dependency
        protected array $typeConfig,      // Explicit dependency
    ) {}
}
```

### 4. No State, No Side Effects (ideally)

```
Zen principle: "Pure functions are predictable"

handle() should:
- Take input from constructor
- Return output
- Not modify external state
- Not have side effects (or document them clearly)
```

---

## The Vision

### Architecture Layers

```
┌─────────────────────────────────────────────┐
│  Presentation Layer                          │
│  - Blade components                          │
│  - ViewModels (call Actions)                │
│  - Volt/Folio pages                          │
└──────────────────────┬──────────────────────┘
                       │ "Orchestrate"
                       ▼
┌─────────────────────────────────────────────┐
│  Business Logic Layer                        │
│  - QueueableAction (atomic operations)     │
│  - Each Action = single responsibility       │
│  - Can be queued or sync                     │
└──────────────────────┬──────────────────────┘
                       │ "Delegate"
                       ▼
┌─────────────────────────────────────────────┐
│  Data Access Layer                           │
│  - Models (Eloquent)                         │
│  - Repositories (when needed)                │
│  - External APIs                             │
└─────────────────────────────────────────────┘
```

### No Middle Layer

```
Traditional: Controller → Service → Repository → Model

FixCity:     Controller/ViewModel → Action → Model
                              (QueueableAction)

Simpler, more direct, more testable.
```

---

## The Practice (How To)

### Creating an Action

```php
<?php

declare(strict_types=1);

namespace Modules\Fixcity\Actions;

use Spatie\QueueableAction\QueueableAction;

/**
 * Single-sentence description of what this action does.
 * 
 * @see https://github.com/spatie/laravel-queueable-action
 */
class BuildTicketCategoriesFromGeoJsonAction
{
    use QueueableAction;

    public function __construct(
        protected string $geoJsonPath,
        protected array $typeConfig,
    ) {
        // Validate in constructor
        if (! file_exists($geoJsonPath)) {
            throw new \InvalidArgumentException("File not found: {$geoJsonPath}");
        }
    }

    /**
     * Execute the action.
     * 
     * @return array<string, mixed>
     */
    public function handle(): array
    {
        // Single responsibility: parse GeoJSON and build categories
        $geoJson = $this->parseGeoJson();
        $counts = $this->countByType($geoJson);
        
        return $this->enrichWithConfig($counts);
    }

    private function parseGeoJson(): array { ... }
    private function countByType(array $features): array { ... }
    private function enrichWithConfig(array $counts): array { ... }
}
```

### Using in ViewModel

```php
namespace Modules\Fixcity\ViewModels;

use Illuminate\Support\Facades\Cache;
use Modules\Fixcity\Actions\BuildTicketCategoriesFromGeoJsonAction;

class TicketLayoutViewModel
{
    public function dynamicFilters(): array
    {
        return Cache::remember('ticket_filters', 300, function () {
            $action = new BuildTicketCategoriesFromGeoJsonAction(
                geoJsonPath: public_path('/data/tickets.json'),
                typeConfig: config('fixcity.types'),
            );
            
            // Run synchronously (fast operation)
            return $action->execute();
            
            // Or queue for heavy operations:
            // return $action->onQueue('filters')->execute();
        });
    }
}
```

### Testing

```php
namespace Modules\Fixcity\Tests\Unit\Actions;

use Modules\Fixcity\Actions\BuildTicketCategoriesFromGeoJsonAction;

class BuildTicketCategoriesFromGeoJsonActionTest extends TestCase
{
    public function test_it_parses_geojson(): void
    {
        $action = new BuildTicketCategoriesFromGeoJsonAction(
            geoJsonPath: base_path('tests/fixtures/tickets.json'),
            typeConfig: ['parks' => ['label' => 'Parks', 'icon' => 'tree']],
        );
        
        $result = $action->execute();
        
        $this->assertIsArray($result);
        $this->assertArrayHasKey('count', $result[0]);
    }
}
```

---

## The Religion (Non-Negotiable)

### Rules (The "Shalt Nots")

1. **Thou shalt NOT create Services** - They are banned
2. **Thou shalt NOT put business logic in ViewModels** - Delegate to Actions
3. **Thou shalt NOT put business logic in Controllers** - Controllers are banned anyway
4. **Thou shalt NOT create Actions with multiple responsibilities** - One Action = one task
5. **Thou shalt NOT use `mixed` return types** - Be specific

### Commandments (The "Shalts")

1. **Thou shalt use QueueableAction for all business logic**
2. **Thou shalt inject dependencies via constructor**
3. **Thou shalt specify return types**
4. **Thou shalt write unit tests for each Action**
5. **Thou shalt name Actions descriptively** (`VerbNounAction`)

---

## The Politics (Trade-offs)

### When to Use QueueableAction

| Scenario | Decision |
|----------|----------|
| Business logic operation | ✅ QueueableAction |
| Data transformation | ✅ QueueableAction |
| External API call | ✅ QueueableAction (can queue) |
| Complex calculation | ✅ QueueableAction |
| Simple getter/setter | ❌ Just use Model |
| HTTP request handling | ❌ Use Volt/Folio/Filament |
| Presentation logic | ❌ Use Blade/ViewModel |

### File Organization

```
Modules/Fixcity/
├── app/
│   ├── Actions/              # ← QueueableActions here
│   │   ├── BuildTicketCategoriesFromGeoJsonAction.php
│   │   ├── CreateTicketAction.php
│   │   ├── UpdateTicketStatusAction.php
│   │   └── SendTicketNotificationAction.php
│   ├── ViewModels/           # ← Use Actions here
│   │   └── TicketViewModel.php
│   └── ...
```

---

## The History (Why This Rule Exists)

### The Problem

Early versions of the project used Services heavily. They became:
- Unmaintainable (1000+ line classes)
- Untestable (too many dependencies)
- Unreliable (side effects everywhere)
- Unscalable (cannot queue)

### The Solution

Adopted [spatie/laravel-queueable-action](https://github.com/spatie/laravel-queueable-action) pattern:
- Used by Spatie (respected Laravel ecosystem contributor)
- Battle-tested in production
- Simple, elegant, powerful
- Aligns with Laravel's queue system

### The Result

- ✅ 80%+ test coverage achievable
- ✅ Easy to reason about (small, focused classes)
- ✅ Easy to queue (built-in)
- ✅ Easy to maintain (SRP enforced)

---

## References

- **Canonical Rule**: `laravel/Modules/docs/QUEUEABLE-ACTION-RULE.md`
- **Theme Guide**: `laravel/Themes/Sixteen/docs/ARCHITECTURE-QUEUEABLE-ACTION.md`
- **Package**: https://github.com/spatie/laravel-queueable-action
- **SRP**: https://en.wikipedia.org/wiki/Single-responsibility_principle
- **Karpathy LLM Wiki**: https://gist.github.com/karpathy/442a6bf555914893e9891c11519de94f

---

*Last Updated: 2026-06-01*  
*Rule Established: Permanent*  
*Violation Consequences: PR Rejection*
