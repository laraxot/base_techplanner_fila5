---
title: "Queueable Actions Over Services — Laraxot Architecture"
type: rule
confidence: high
created: 2026-06-01
updated: 2026-06-01
tags: [architecture, actions, services, spatie, queue, bmad]
related:
  - rules/cms-block-naming-tailwind-flowbite.md
  - concepts/00-INDEX.md
---

# Queueable Actions Over Services

## Regola

**I moduli e temi Laraxot devono usare Actions di Spatie (`spatie/laravel-queueable-action`) invece di Services.**

## Perché

- Actions sono testable (single responsibility)
- Queueable out-of-the-box
- Struttura coerente (tutti i moduli)
- PSR-12 compliant

## Pattern

```php
// ✅ CORRETTO
namespace Modules\Fixcity\Actions;

use Spatie\QueueableAction\QueueableAction;

final class TicketCategoryAction
{
    use QueueableAction;
    
    public function execute(string $category): CategoryDto
    {
        // logic here
    }
}
```

## Anti-pattern

```php
// ❌ SBAGLIATO
namespace Modules\Fixcity\Services;

class TicketCategoryService
{
    public function getCategory(string $category): array
    {
        // ...
    }
}
```

## Quando Usare

- Logic di business complessa → Action
- API service class wrapper → Action
- Repository pattern → Action

## Package

- `spatie/laravel-queueable-action`
- Install: `composer require spatie/laravel-queueable-action`

## Related

- Module wiki: [[../../Modules/Fixcity/docs/wiki/rules/cms-block-naming-tailwind-flowbite.md]]
- Actions in codebase: `find Modules -name "*Action.php" -type f | head -20`