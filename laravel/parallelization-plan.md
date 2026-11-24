# 🐝 PHPStan Fix - BMAD SWARM PLAN

## ERRORS TO FIX (363 → 0)

### Agent TRAIT-1: buttons.php deduplication
**File:** `Modules/Xot/lang/it/buttons.php`
**Error:** Array has 2 duplicate keys with value 'navigation' and 'actions'
**Fix:** Remove duplicate keys

### Agent TRAIT-2: HasSchemalessAttributes.php
**File:** `Modules/Xot/app/Traits/HasSchemalessAttributes.php`
**Errors:** 
- Call to undefined method `extraAttributesWrapper()`
- Cannot call method get() on mixed
**Fix:** Add `extraAttributesWrapper()` method to trait

### Agent TRAIT-3: XotBaseState.php  
**File:** `Modules/Xot/app/States/XotBaseState.php`
**Error:** Call to undefined method `getModel()`
**Fix:** Add `getModel()` stub method (✅ ALREADY DONE)

### Agent TEST-1: ModuleBusinessLogicTest.php
**File:** `Modules/Xot/tests/Feature/ModuleBusinessLogicTest.php`
**Errors:** Access to undefined properties ($slug, $version, $enabled, etc.)
**Fix:** Add proper property declarations or mock data

### Agent TEST-2: TestCase.php
**File:** `Modules/Xot/tests/TestCase.php`
**Errors:** Class `Modules\Xot\Tests\XotData` not found
**Fix:** Create missing `XotData` class or fix reference

### Agent TEST-3: XotBaseModelTest.php
**File:** `Modules/Xot/tests/Unit/Models/XotBaseModelTest.php`
**Errors:** Call to static method on unknown class `Assert`
**Fix:** Add proper `use` statement for `PHPUnit\Framework\Assert`

### Agent TEST-4: Test fixtures
**Files:** 
- `XotExecuteCoverage50Test.php`
- `XotMigrationDeepBranchesTest.php`  
- `XotRelationManageStatesCoverageTest.php`
**Errors:** Undefined methods (hasForeignKey, belongsToManyX, morphToManyX)
**Fix:** Add missing methods to test fixtures

---

## EXECUTION ORDER

```
Phase 0: Core (DONE)
├── BaseModel.php          ✅ newFactory return type
├── HasXotFactory.php      ✅ generics fix
└── RelationX.php          ✅ no changes needed (was already correct)

Phase 1: TRAIT Layer
├── buttons.php            → Agent TRAIT-1
└── HasSchemalessAttributes.php → Agent TRAIT-2

Phase 2: TEST Layer  
├── ModuleBusinessLogicTest.php → Agent TEST-1
├── TestCase.php               → Agent TEST-2
├── XotBaseModelTest.php       → Agent TEST-3
└── Other test files           → Agent TEST-4

Phase 3: VALIDATION
└── ./vendor/bin/phpstan analyse Modules → 0 errors
```

---

## BMAD EXECUTION COMMANDS

```bash
# Agent TRAIT-1: Fix buttons.php
cd laravel && grep -n "navigation" Modules/Xot/lang/it/buttons.php

# Agent TRAIT-2: Fix HasSchemalessAttributes.php
cd laravel && grep -n "extraAttributesWrapper" Modules/Xot/app/Traits/HasSchemalessAttributes.php

# Agent TEST: Run phpstan on test modules
cd laravel && ./vendor/bin/phpstan analyse Modules/Xot/tests --no-progress
```
