# Story: Geo Module PHPStan L10 Cleanup

**Epic**: PHPStan L10 → Zero Errors (All Modules)  
**Module**: Geo  
**Status**: Ready for Dev  
**Date**: 2026-09-06  

## Goal

Fix 4 PHPStan L10 errors in Geo module (Province and Region models) related to HasXotFactory generics.

## Current State

- **PHPStan Result**: [ERROR] Found 4 errors
- **Error Files**: 2 models (Province, Region)
- **Error Category**: generics.notSubtype (HasXotFactory @use annotations)
- **Root Cause**: Incorrect generic type specification in @use annotations

## Error Inventory

### Category: HasXotFactory Generic Type Errors (4 errors across 2 files)

**File 1: `Modules/Geo/app/Models/Province.php` (2 errors)**

- **Line 41**: PHPDoc tag @use has invalid type
  - Error ID: `class.notFound`
  - Current: `/** @use HasXotFactory<ProvinceFactory> */`
  - Problem: `ProvinceFactory` referenced without namespace; PHPStan interprets as `Modules\Geo\Models\ProvinceFactory` (does not exist)
  - Actual Location: `Modules\Geo\Database\Factories\ProvinceFactory`

- **Line 41**: Generic type constraint violation
  - Error ID: `generics.notSubtype`
  - Current: `HasXotFactory<Modules\Geo\Models\ProvinceFactory>`
  - Problem: `ProvinceFactory` is not a subtype of `Illuminate\Database\Eloquent\Factories\Factory<*>`
  - Expected: The @use tag must bind `HasXotFactory`'s template parameter `TFactory` to a Factory class

**File 2: `Modules/Geo/app/Models/Region.php` (2 errors)**

- **Line 37**: Same errors as Province
  - Current: `/** @use HasXotFactory<RegionFactory> */`
  - Fix: Change to `/** @use HasXotFactory<Factory<static>> */`

## Fix Strategy

### Pattern (from Xot module convention)

The `HasXotFactory` trait is declared as `@template TFactory of Factory`. When a model uses this trait, it must annotate it with:

```php
/** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */
use HasXotFactory;
```

This binds the template parameter to `Factory<static>` (a factory that produces instances of the current model class).

**Note on FQCN Form**: The fully qualified namespace is used here because Province.php and Region.php don't explicitly import `Illuminate\Database\Eloquent\Factories\Factory`. The FQCN form is more reliable for PHPStan resolution in such cases.

### Fix Steps

1. **Province.php (Line 41)**
   - Find: `/** @use HasXotFactory<ProvinceFactory> */`
   - Replace with: `/** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */`
   - Note: Uses FQCN form for reliable PHPStan resolution (file doesn't explicitly import Factory)

2. **Region.php (Line 37)**
   - Find: `/** @use HasXotFactory<RegionFactory> */`
   - Replace with: `/** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */`
   - Note: Uses FQCN form because file doesn't explicitly import Factory

### Verification After Fix

Run PHPStan analysis:
```bash
cd laravel && ./vendor/bin/phpstan analyse Modules/Geo --no-progress --memory-limit=-1
```

Expected output:
```
[OK] No errors
```

## Testing & Coverage

1. **PHPStan Verification**:
   ```bash
   cd laravel && ./vendor/bin/phpstan analyse Modules/Geo --no-progress --memory-limit=-1
   ```

2. **Code Quality Check** (PHPMD):
   ```bash
   cd laravel && vendor/bin/phpmd Modules/Geo text rulesets/laraxot.xml || true
   ```

3. **Test Coverage**:
   ```bash
   cd laravel && composer test -- Modules/Geo
   ```

4. **Coverage.md Update**:
   - Verify coverage percentage maintained or improved
   - Update coverage tracking document if applicable

## Git Operations

```bash
cd laravel

# Fetch latest from Geo module remote (if applicable)
git fetch Geo-remote 2>/dev/null || true

# Make changes (steps in Fix Strategy above)

# Verify fixes
./vendor/bin/phpstan analyse Modules/Geo --no-progress --memory-limit=-1

# Commit
git add Modules/Geo/app/Models/Province.php Modules/Geo/app/Models/Region.php
git commit -m "Fix HasXotFactory generic type annotations in Geo models

- Province.php: Update @use annotation to HasXotFactory<Factory<static>>
- Region.php: Update @use annotation to HasXotFactory<Factory<static>>
- PHPStan Level 10 compliant"

# Sync (push if configured)
git push Geo-remote main 2>/dev/null || true
```

## Related Knowledge

- **Reference**: Xot module `HasXotFactory` trait documentation
- **Pattern**: Existing User module model implementations (BaseUser, etc.)
- **Constraint**: Never edit phpstan.neon
- **Constraint**: Fix root cause, never use @phpstan-ignore

## Notes

- Both errors follow the same pattern (generics binding)
- Fix is mechanical: replace @use annotation across 2 files
- No code logic changes required
- No new imports needed (Factory already imported in both files)

## Sign-Off

Ready for execution: 2026-09-06  
Severity: Low (code quality, no runtime impact)  
Effort: 5 minutes  
