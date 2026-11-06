---
slug: xot-phpstan-l10
epic: 9
story: 10.1
title: PHPStan L10 → Zero Errors (Xot Module)
owner_module: Xot
status: READY_FOR_DEV
---

## Overview

Xot module currently has 3 PHPStan errors, all related to missing generic type specifications for the `HasXotFactory` trait. These are semantic type-coverage issues affecting base model classes.

## Errors (Total: 3)

### Category A: Missing Generic Types - HasXotFactory (3 errors)

**Files:**
- `Modules/Xot/app/Models/XotBaseModel.php:22`
- `Modules/Xot/app/Models/XotBasePivot.php:32`
- `Modules/Xot/app/Models/XotBaseMorphPivot.php:36`

**Error Type:** `missingType.generics`

**Root Cause:** Classes using the `HasXotFactory` generic trait must explicitly specify the type parameter `TFactory` (the factory class type). Without this specification, PHPStan cannot verify type safety for factory method calls.

**Fix Strategy:**
1. Add `@use` annotation or generic parameter specification to each base model class
2. Specify the appropriate factory class type (e.g., `Factory<static>`)
3. Ensure the annotation follows Laravel's factory pattern convention

**Example Fix Pattern:**
```php
/**
 * @use HasXotFactory<Factory<static>>
 */
class XotBaseModel extends Model
{
    use HasXotFactory;
    // ...
}
```

## Verification Commands

```bash
# Full module analysis
cd /var/www/_bases/base_techplanner_fila5/laravel
./vendor/bin/phpstan analyse Modules/Xot --no-progress --memory-limit=-1

# Check only the base model files
./vendor/bin/phpstan analyse Modules/Xot/app/Models/XotBase*.php --no-progress --memory-limit=-1

# Run Pest tests for Xot module
php artisan test Modules/Xot/tests --pest

# PHPMD analysis
./tools/phpmd.sh Modules/Xot text ./phpmd.xml
```

## File Inventory

```
Modules/Xot/app/Models/
├── XotBaseModel.php                  [Line 22] ← fix @use annotation
├── XotBasePivot.php                  [Line 32] ← fix @use annotation
└── XotBaseMorphPivot.php             [Line 36] ← fix @use annotation
```

## Git Workflow

```bash
cd /var/www/_bases/base_techplanner_fila5/laravel

# Create branch from dev
git checkout -b fix/xot-phpstan-generics

# Apply fixes to the three base model files
# (Edit XotBaseModel.php, XotBasePivot.php, XotBaseMorphPivot.php)

# Verify no errors
./vendor/bin/phpstan analyse Modules/Xot --no-progress --memory-limit=-1

# Commit with clear message
git add -A
git commit -m "fix: Add missing HasXotFactory generic types (Xot module)"

# Push to dev
git push origin fix/xot-phpstan-generics

# Create PR and merge to dev
```

## Dependencies

- None. This story is independent and can be executed immediately.

## Acceptance Criteria

1. All 3 generic type errors resolved
2. `phpstan analyse Modules/Xot --no-progress` returns `[OK] No errors`
3. All Pest tests in `Modules/Xot/tests` pass
4. Code changes committed and pushed to dev branch
5. No new PHPStan errors introduced in dependent modules

## Notes

- The fix involves updating documentation annotations only, no logic changes
- This resolves the remaining type-coverage debt for the Xot module
- Once complete, Xot module will have zero PHPStan errors at Level 10
