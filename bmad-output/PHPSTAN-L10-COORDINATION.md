# PHPStan L10 Cleanup Coordination

**Orchestration Strategy**: BMAD Multi-Agent Parallel Execution  
**Epic**: PHPStan L10 → Zero Errors (All Modules)  
**Date**: 2026-09-06  
**Status**: Stories Ready for Execution  

## Overview

5 high-impact modules targeted for PHPStan Level 10 compliance. Two modules have actionable errors; three are already clean.

- **Total Modules Audited**: 5
- **Modules with Errors**: 2 (Geo, Tenant)
- **Modules Clean**: 3 (Activity, Job, Lang)
- **Total Errors to Fix**: 6
  - Geo: 4 errors (2 files)
  - Tenant: 2 errors (2 files)

## Story Files (Ready for Parallel Execution)

### Clean Modules (Verification Only)

1. **`story-activity-phpstan-2026-09-06.story.md`**
   - Status: ✅ No errors
   - Action: Verification only
   - Effort: 2 minutes
   - Key Verification: `./vendor/bin/phpstan analyse Modules/Activity --no-progress --memory-limit=-1`

2. **`story-job-phpstan-2026-09-06.story.md`**
   - Status: ✅ No errors
   - Action: Verification only
   - Effort: 2 minutes
   - Key Verification: `./vendor/bin/phpstan analyse Modules/Job --no-progress --memory-limit=-1`

3. **`story-lang-phpstan-2026-09-06.story.md`**
   - Status: ✅ No errors
   - Action: Verification only
   - Effort: 2 minutes
   - Key Verification: `./vendor/bin/phpstan analyse Modules/Lang --no-progress --memory-limit=-1`

### Modules with Actionable Errors

4. **`story-geo-phpstan-2026-09-06.story.md`** ⚠️
   - Status: ❌ 4 errors across 2 files
   - Error Type: `generics.notSubtype` + `class.notFound` (HasXotFactory @use annotations)
   - Files to Fix:
     - `Modules/Geo/app/Models/Province.php` (line 41)
     - `Modules/Geo/app/Models/Region.php` (line 37)
   - Fix Strategy: Replace incorrect @use annotations with FQCN form
   - Effort: 5 minutes
   - Complexity: Low (mechanical change, 2 files)

5. **`story-tenant-phpstan-2026-09-06.story.md`** ⚠️
   - Status: ❌ 2 errors across 2 files
   - Error Type: `missingType.generics` (missing @use annotations)
   - Files to Fix:
     - `Modules/Tenant/app/Models/Tenant.php` (line 53)
     - `Modules/Tenant/app/Models/TestSushiModel.php` (line 46)
   - Fix Strategy: Add missing @use annotations with FQCN form
   - Effort: 5 minutes
   - Complexity: Low (mechanical change, 2 files)

## Parallel Execution Plan

### Wave 1: Clean Modules (Immediate, 3 agents in parallel)

Run verification on Activity, Job, and Lang modules simultaneously. Expected time: 2-5 minutes.

```bash
# Agent 1: Activity verification
cd laravel && ./vendor/bin/phpstan analyse Modules/Activity --no-progress --memory-limit=-1

# Agent 2: Job verification
cd laravel && ./vendor/bin/phpstan analyse Modules/Job --no-progress --memory-limit=-1

# Agent 3: Lang verification
cd laravel && ./vendor/bin/phpstan analyse Modules/Lang --no-progress --memory-limit=-1
```

All should return `[OK] No errors`.

### Wave 2: Error Fixers (Parallel, 2 agents simultaneously)

After Wave 1 passes, spawn 2 independent agents:

- **Agent 1**: Geo module fixer (Province + Region @use annotations)
- **Agent 2**: Tenant module fixer (Tenant + TestSushiModel @use annotations)

Both agents work simultaneously on separate module repos (no conflicts).

Expected time: 5-10 minutes total (includes PHPStan re-verification).

## Error Categories & Patterns

### Category 1: Invalid @use Generic Type (Geo Module)

**Error Pattern**:
```
PHPDoc tag @use has invalid type Modules\Geo\Models\ProvinceFactory.
🪪  class.notFound
Type Modules\Geo\Models\ProvinceFactory in generic type ... is not subtype of 
template type TFactory of Illuminate\Database\Eloquent\Factories\Factory<*>
```

**Root Cause**: 
- @use annotation references non-existent class `Modules\Geo\Models\ProvinceFactory`
- Actual factory is at `Modules\Geo\Database\Factories\ProvinceFactory` (not imported)
- Annotation should bind generic parameter to Factory class, not proxy class name

**Fix Pattern**:
```php
// WRONG (current)
/** @use HasXotFactory<ProvinceFactory> */

// CORRECT (FQCN form)
/** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */
```

### Category 2: Missing Generic Type Annotation (Tenant Module)

**Error Pattern**:
```
Class Modules\Tenant\Models\Tenant uses generic trait 
Modules\Xot\Models\Traits\HasXotFactory but does not specify its types: TFactory
🪪  missingType.generics
```

**Root Cause**:
- Trait use statement has no @use annotation
- PHPStan cannot infer the generic type parameter `TFactory`

**Fix Pattern**:
```php
// WRONG (current)
use HasXotFactory;

// CORRECT
/** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */
use HasXotFactory;
```

## Constraints & Rules

**Critical**:
- ❌ Never edit `phpstan.neon` (user-only configuration)
- ❌ Never add `@phpstan-ignore` or `@phpstan-ignore-next-line` comments
- ❌ Never add entries to ignoreErrors array
- ✅ Fix root cause always (annotations are the root cause here)

**FQCN Decision**:
- Use FQCN form `\Illuminate\Database\Eloquent\Factories\Factory<static>` when Factory is not explicitly imported
- Rationale: More reliable for PHPStan resolution (documented edge case in Xot guidelines)
- Applies to: Geo (Province, Region) and Tenant (Tenant, TestSushiModel)

## Verification Checklist

### For Each Module

- [ ] PHPStan L10 passes with zero errors
- [ ] No new warnings or deprecations introduced
- [ ] Code formatting maintained (pint --dirty)
- [ ] Test coverage maintained or improved
- [ ] Git commits are focused (one commit per module)

### Post-Execution

- [ ] All 5 story files completed
- [ ] All 6 individual errors resolved
- [ ] `coverage.md` updated if applicable
- [ ] Git push synchronized (if configured per module)

## Git Workflow (Per Module)

Standard pattern for each agent:

```bash
cd laravel

# 1. Fetch latest (if remote exists)
git fetch <MODULE>-remote 2>/dev/null || true

# 2. Make changes (per story instructions)

# 3. Verify PHPStan
./vendor/bin/phpstan analyse Modules/<MODULE> --no-progress --memory-limit=-1

# 4. Format code
vendor/bin/pint --dirty

# 5. Run tests
composer test -- Modules/<MODULE>

# 6. Commit with descriptive message
git add Modules/<MODULE>/...
git commit -m "Fix PHPStan Level 10 errors in <MODULE> module

- <Specific change 1>
- <Specific change 2>
- PHPStan Level 10 compliant"

# 7. Sync (push if configured)
git push <MODULE>-remote main 2>/dev/null || true
```

## Timeline

| Phase | Task | Agents | Time | Status |
|-------|------|--------|------|--------|
| 1 | Verify clean modules | 3 parallel | 2-5 min | Ready |
| 2 | Fix error modules | 2 parallel | 5-10 min | Ready |
| 3 | Final verification | Sequential | 3 min | Ready |
| **Total** | | | **10-18 min** | **Ready** |

## References

- **HasXotFactory Documentation**: `Modules/Xot/docs/traits/hasxotfactory.md`
- **PHPStan Edge Case Feedback**: `feedback_hasxotfactory-use-annotation.md`
- **Pattern Source**: Xot module base classes (XotBaseModel, XotBasePivot)
- **Related Stories**: Previous Media/User module PHPStan fixes

## Notes

- All stories are self-contained and ready for independent agent execution
- No dependencies between stories (except Wave 1 completion → Wave 2 start)
- Geo and Tenant modules use the same FQCN pattern for consistency
- Clean modules serve as verification control (expected: always pass)
- All error fixes are surgical: no behavioral changes, only annotations

---

**Coordinator**: BMAD Orchestration  
**Date Created**: 2026-09-06  
**Ready for Execution**: Yes ✅
