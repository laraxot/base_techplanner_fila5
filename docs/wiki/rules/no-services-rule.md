---
title: "No Services Rule - QueueableAction Required"
type: rule
sources: ["laravel/Modules/docs/QUEUEABLE-ACTION-RULE.md", "docs/project/AGENTS.md"]
confidence: high
created: 2026-06-01
updated: 2026-06-02
tags: [architecture, rule, queueable-action, forbidden, spatie]
related:
  - concepts/queueable-action-architecture.md
  - entities/spatie-laravel-queueable-action.md
---

# No Services Rule — QueueableAction Required

> **Status**: RELIGION (Non-negotiable)  
> **Severity**: 🔴 CRITICAL  
> **Package**: [spatie/laravel-queueable-action](https://github.com/spatie/laravel-queueable-action)  
> **Created**: 2026-06-01

---

## The Rule

### ❌ FORBIDDEN

```php
// NEVER — fuori da nwidart (doppia violazione)
namespace App\Services;

class TicketCategoryService { ... }  // ❌ laravel/app/Services — BANNED
```

```php
// NEVER create Service classes
namespace Modules\Fixcity\Services;

class TicketService { ... }           // ❌ BANNED
class TicketCategoryService { ... }    // ❌ BANNED  
class UserService { ... }             // ❌ BANNED
class AnyService { ... }              // ❌ BANNED
```

### ✅ REQUIRED

```php
// ALWAYS use QueueableAction
namespace Modules\Fixcity\Actions;

use Spatie\QueueableAction\QueueableAction;

class CreateTicketAction {
    use QueueableAction;
    public function handle(): Ticket { ... }
}

class BuildTicketCategoriesFromGeoJsonAction {
    use QueueableAction;
    public function handle(): array { ... }
}
```

---

## Why This Rule Exists

### The Service Anti-Pattern

Services inevitably become **god classes**:

```php
class TicketService {
    public function create() { ... }
    public function update() { ... }
    public function delete() { ... }
    public function notify() { ... }
    public function export() { ... }
    public function import() { ... }
    public function validate() { ... }
    public function transform() { ... }
    // ... grows to 1000+ lines
}
```

**Problems:**
- ❌ Violates Single Responsibility Principle
- ❌ Cannot be queued
- ❌ Hard to test (too many dependencies)
- ❌ Unmaintainable over time
- ❌ No clear boundaries

### The QueueableAction Solution

QueueableAction enforces **single responsibility**:

```php
class CreateTicketAction {
    use QueueableAction;
    public function handle(): Ticket { ... }  // Only creates tickets
}

class UpdateTicketAction {
    use QueueableAction;
    public function handle(): Ticket { ... }  // Only updates tickets
}

class DeleteTicketAction {
    use QueueableAction;
    public function handle(): void { ... }     // Only deletes tickets
}
```

**Benefits:**
- ✅ SRP enforced by pattern
- ✅ Can run sync (`->execute()`)
- ✅ Can run async (`->onQueue()->execute()`)
- ✅ Easy to test (isolated)
- ✅ Never becomes god class
- ✅ Clear boundaries

---

## Verification

### Before Creating Any Class

Check if you're about to create a Service:

```bash
# App shell — must be empty
find laravel/app/Services -name '*.php' 2>/dev/null | head
grep -r 'namespace App\\Services' laravel/app --include='*.php'

# Modules — no new business Services
ls laravel/Modules/*/app/Services/*.php 2>/dev/null | head

# Check namespace in new file
# If namespace ends with "\\Services" → STOP
```

### Correct Path Structure

```
Modules/Fixcity/
├── app/
│   ├── Actions/              # ✅ QueueableActions here
│   │   ├── CreateTicketAction.php
│   │   ├── UpdateTicketAction.php
│   │   └── BuildCategoriesAction.php
│   ├── ViewModels/           # ✅ Use Actions here
│   └── Models/               # ✅ Eloquent models
```

---

## Enforcement

### PR Review Checklist

- [ ] No `class *Service` in codebase
- [ ] No `namespace *\Services` in new files
- [ ] All business logic in QueueableAction classes
- [ ] Actions use `Spatie\QueueableAction\QueueableAction` trait
- [ ] Actions have `handle()` method with return type

### Automated Checks

```bash
# Find Services (should return nothing)
grep -r "class.*Service" laravel/Modules/*/app/ --include="*.php"

# Find Service namespaces (should return nothing)
grep -r "namespace.*\\Services" laravel/Modules/*/ --include="*.php"

# Find QueueableActions (should return many)
grep -r "use QueueableAction" laravel/Modules/*/app/ --include="*.php"
```

---

## Exceptions

**NO EXCEPTIONS.**

If you think you need a Service, you actually need:
1. A QueueableAction for the operation
2. Or multiple QueueableActions composed together
3. Or a ViewModel that orchestrates Actions

---

## Consequences of Violation

### For Codebase
- Technical debt accumulation
- Unmaintainable god classes
- Impossible to queue operations
- Testing becomes nightmare

### For PRs
- **Automatic rejection**
- Must refactor to QueueableAction
- No exceptions

### For Developers
- Education required
- Pair programming on next task
- Review of architecture understanding

---

## References

- **Philosophy**: [QueueableAction Architecture](../concepts/queueable-action-architecture.md)
- **Technical Docs**: `laravel/Modules/docs/QUEUEABLE-ACTION-RULE.md`
- **Theme Guide**: `laravel/Themes/Sixteen/docs/ARCHITECTURE-QUEUEABLE-ACTION.md`
- **Package**: https://github.com/spatie/laravel-queueable-action
- **SRP**: https://en.wikipedia.org/wiki/Single-responsibility_principle

---

*Last Updated: 2026-06-01*  
*Rule Established: Permanent*  
*Violation Consequences: PR Rejection, Refactoring Required*
