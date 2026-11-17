---
slug: phpstan-level10-zero-errors
epic: 8
story: 1
title: PHPStan L10 → Zero Errors (Global)
owner_module: Media, User
owner_theme: null
status: READY_FOR_DEV
priority: CRITICAL
created_at: 2026-09-06T00:00:00Z
---

# Story: PHPStan Level 10 → Zero Errors

## GitHub (tracciamento)

| Risorsa | URL | Stato |
|---------|-----|-------|
| Issue | TBD | [pending] |

## Context

**Current State**: 5 PHPStan L10 errors across 2 modules (Media, User).

**Objective**: Zero errors via root-cause fixes (no suppression, no @phpstan-ignore).

---

## Errors Inventory

### Error 1-2: generics.notGeneric (Media models)

**Files**:
- `Media/app/Models/Media.php` (line 100)
- `Media/app/Models/TemporaryUpload.php` (line 75)

**Issue**: PHPDoc `@use HasXotFactory<MediaFactory>` declares generic type, but trait is not generic.

**Root Cause**: HasXotFactory trait doesn't support generics in current signature.

**Fix**: Remove generic brackets from @use annotation.
```php
// BEFORE
/** @use HasXotFactory<MediaFactory> */

// AFTER
/** @use HasXotFactory */
```

**Why**: Trait accepts factory via constructor property promotion, not via generics. Annotation is incorrect syntax.

### Error 3-4: method.deprecated (Media tests)

**Files**:
- `Media/tests/Unit/Filament/MediaConvertSchemasTest.php` (line 79)
- `Media/tests/Unit/Filament/MediaTableTest.php` (line 69)

**Issue**: `getTableActions()` method deprecated. Override `table()` method instead.

**Root Cause**: Filament 5.x API change — table configuration moved from `getTableActions()` to `table()`.

**Fix**: Update test assertions to use `table()` configuration.
```php
// BEFORE
$table->getTableActions()

// AFTER
$table->table() // or update test to use new Filament 5 table API
```

**Why**: Filament 5 refactored resource table API for consistency with form API.

### Error 5: assign.propertyType (User)

**File**: `User/app/Console/Commands/SetCurrentTeamCommand.php` (line 81)

**Issue**: Property `UserContract::$current_team_id` expects `int|null`, assigned `string`.

**Root Cause**: Command argument parsed as string, not cast to int before assignment.

**Fix**: Cast to int.
```php
// BEFORE
$user->current_team_id = $teamId; // $teamId is string from argument

// AFTER
$user->current_team_id = (int) $teamId;
```

**Why**: Type safety — Eloquent property expects int, Artisan argument is string by default.

---

## Deliverables

### 1. Media/app/Models/Media.php
- Remove generic bracket from `@use HasXotFactory<...>` (line 100)
- Verify trait imports correctly
- Commit: "fix: remove generic type from HasXotFactory @use (phpstan)"

### 2. Media/app/Models/TemporaryUpload.php
- Remove generic bracket from `@use HasXotFactory<...>` (line 75)
- Commit: "fix: remove generic type from HasXotFactory @use (phpstan)"

### 3. Media/tests/Unit/Filament/MediaConvertSchemasTest.php
- Update `getTableActions()` call to use Filament 5 table API (line 79)
- Commit: "fix: update deprecated getTableActions() to table() (Filament 5)"

### 4. Media/tests/Unit/Filament/MediaTableTest.php
- Update `getTableActions()` call to use Filament 5 table API (line 69)
- Commit: "fix: update deprecated getTableActions() to table() (Filament 5)"

### 5. User/app/Console/Commands/SetCurrentTeamCommand.php
- Cast string $teamId to int before assignment (line 81)
- Commit: "fix: cast team_id string to int (phpstan)"

---

## Acceptance Criteria

- [ ] All 5 errors fixed (no suppression, no @phpstan-ignore)
- [ ] `cd laravel && ./vendor/bin/phpstan analyse Modules --no-progress --memory-limit=-1` returns: `[OK] No errors found`
- [ ] All commits pushed to correct remotes (Media: laraxot/module_media_fila5, User: laraxot/module_user_fila5, Root: laraxot/base_techplanner_fila5)
- [ ] Pest tests still pass (Media, User modules)
- [ ] coverage.md updated per module

## Execution Order

1. Fix Media models (generics) — no dependencies
2. Fix Media tests (deprecated API) — no dependencies
3. Fix User command (type cast) — no dependencies
4. Run PHPStan globally → verify 0 errors
5. Commit + push all

## Blockers

None — straightforward fixes, no architectural changes.

---

*Story created: 2026-09-06 via BMAD create-story workflow*
