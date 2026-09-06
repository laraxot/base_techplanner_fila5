# Story: Tenant Module PHPStan L10 Cleanup

**Epic**: PHPStan L10 → Zero Errors (All Modules)  
**Module**: Tenant  
**Status**: Ready for Dev  
**Date**: 2026-09-06  

## Goal

Fix 2 PHPStan L10 errors in Tenant module (Tenant and TestSushiModel models) related to missing HasXotFactory generic type annotations.

## Current State

- **PHPStan Result**: [ERROR] Found 2 errors
- **Error Files**: 2 models (Tenant, TestSushiModel)
- **Error Category**: missingType.generics (missing @use annotations on HasXotFactory trait)
- **Root Cause**: HasXotFactory trait uses not annotated with generic type parameter

## Error Inventory

### Category: HasXotFactory Missing Generic Type Annotations (2 errors across 2 files)

**File 1: `Modules/Tenant/app/Models/Tenant.php` (1 error)**

- **Line 53**: Missing generic type specification on trait use
  - Error ID: `missingType.generics`
  - Current: `use HasXotFactory;` (no @use annotation)
  - Problem: Trait `HasXotFactory` is generic with template parameter `TFactory`, but model doesn't bind it
  - PHPStan Message: "Class uses generic trait but does not specify its types: TFactory"

**File 2: `Modules/Tenant/app/Models/TestSushiModel.php` (1 error)**

- **Line 46**: Same error as Tenant
  - Current: `use HasXotFactory;` (no @use annotation)
  - Problem: Missing generic type binding on trait use

## Fix Strategy

### Pattern (from Xot module convention)

The `HasXotFactory` trait is declared as `@template TFactory of Factory`. When a model uses this trait, it must annotate it with a PHPDoc @use comment immediately before the trait use:

```php
/** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */
use HasXotFactory;
```

This binds the template parameter `TFactory` to `Factory<static>` (a factory that produces instances of the current model class).

### Why FQCN Form?

The fully qualified name form `\Illuminate\Database\Eloquent\Factories\Factory<static>` is used because:
1. These models don't explicitly import Factory in their use statements
2. PHPStan's resolution is more reliable with FQCN
3. Aligns with edge cases documented in Xot module guidelines
4. Consistent with diagnostic patterns when short form fails

### Fix Steps

1. **Tenant.php (Line 53)**
   - Find: `use HasXotFactory;`
   - Insert above it: `/** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */`
   - Result:
     ```php
     /** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */
     use HasXotFactory;
     ```

2. **TestSushiModel.php (Line 46)**
   - Find: `use HasXotFactory;`
   - Insert above it: `/** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */`
   - Result:
     ```php
     /** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */
     use HasXotFactory;
     ```

### Verification After Fix

Run PHPStan analysis:
```bash
cd laravel && ./vendor/bin/phpstan analyse Modules/Tenant --no-progress --memory-limit=-1
```

Expected output:
```
[OK] No errors
```

## Testing & Coverage

1. **PHPStan Verification**:
   ```bash
   cd laravel && ./vendor/bin/phpstan analyse Modules/Tenant --no-progress --memory-limit=-1
   ```

2. **Code Quality Check** (PHPMD):
   ```bash
   cd laravel && vendor/bin/phpmd Modules/Tenant text rulesets/laraxot.xml || true
   ```

3. **Test Coverage**:
   ```bash
   cd laravel && composer test -- Modules/Tenant
   ```

4. **Coverage.md Update**:
   - Verify coverage percentage maintained or improved
   - Update coverage tracking document if applicable

## Git Operations

```bash
cd laravel

# Fetch latest from Tenant module remote (if applicable)
git fetch Tenant-remote 2>/dev/null || true

# Make changes (steps in Fix Strategy above)

# Verify fixes
./vendor/bin/phpstan analyse Modules/Tenant --no-progress --memory-limit=-1

# Commit
git add Modules/Tenant/app/Models/Tenant.php Modules/Tenant/app/Models/TestSushiModel.php
git commit -m "Add HasXotFactory generic type annotations in Tenant models

- Tenant.php: Add @use HasXotFactory<Factory<static>> annotation
- TestSushiModel.php: Add @use HasXotFactory<Factory<static>> annotation
- Resolves missingType.generics errors
- PHPStan Level 10 compliant"

# Sync (push if configured)
git push Tenant-remote main 2>/dev/null || true
```

## Related Knowledge

- **Reference**: Xot module `HasXotFactory` trait documentation
- **Pattern**: Existing Xot module base classes (XotBaseModel)
- **Constraint**: Never edit phpstan.neon
- **Constraint**: Fix root cause, never use @phpstan-ignore
- **Edge Case**: Use FQCN form for Factory when short form doesn't resolve

## Notes

- Both errors follow the same pattern (missing @use annotation)
- Fix is mechanical: add PHPDoc comment above each trait use
- No code logic changes required
- No new imports needed (FQCN includes fully qualified path)
- Comments are purely for PHPStan type resolution, no runtime impact

## Sign-Off

Ready for execution: 2026-09-06  
Severity: Low (code quality, no runtime impact)  
Effort: 5 minutes  
