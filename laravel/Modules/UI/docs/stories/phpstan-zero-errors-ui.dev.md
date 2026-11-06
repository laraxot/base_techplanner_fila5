---
title: "[DEV] PHPStan zero errori — modulo UI"
type: dev
module: UI
story: "./phpstan-zero-errors-ui.story.md"
status: done
created: 2026-10-28
updated: 2026-10-28
tags: [phpstan, ui, bmad, swarm]
---

# [DEV] PHPStan zero errori — modulo UI

## Files to Modify

- `tests/Feature/EventColumnTest.php`, `tests/Feature/OrganizationColumnTest.php` — `use Filament\Tables\Columns\Column;` e `static fn (Column $column): string`
- `docs/phpstan-patterns.md` (write-back)

## Implementation Steps

- [x] Tipo letto da `GroupColumn::getFields()` (`@return array<Column>`)
- [x] `php -l` + `phpstan analyse` modulo e full-tree

## Testing

Pest non eseguito (MySQL in `.env.testing`).

## Verification

```bash
cd laravel && ./vendor/bin/phpstan analyse --memory-limit=-1 --no-progress   # full-tree: typeCoverage si vede solo cosi'
```
