# CRITICAL RULE: Never Use RefreshDatabase in Tests

## 🚨 ABSOLUTE PROHIBITION

**NEVER use `RefreshDatabase` trait in ANY test file.**

```php
// ❌ ABSOLUTELY FORBIDDEN
use Illuminate\Foundation\Testing\RefreshDatabase;

class SomeTest extends TestCase
{
    use RefreshDatabase; // ❌ NEVER DO THIS
}

// ❌ ALSO FORBIDDEN IN PEST
uses(RefreshDatabase::class); // ❌ NEVER DO THIS
```

## 🎯 Why This Rule Exists

### The Fundamental Truth
**The site is WORKING. The database has REAL DATA. Tests must adapt to reality, not destroy it.**

### The Problems with RefreshDatabase

1. **Data Loss**: Wipes out real production/staging data
2. **False Reality**: Creates empty database that doesn't match production
3. **Broken Tests**: Tests pass on empty DB but fail on real data
4. **Slow Performance**: Migrations run before every test
5. **Race Conditions**: Multiple test runs conflict
6. **Lost Context**: Real relationships and constraints ignored

## 📖 Laraxot Philosophy on Testing

### Logic (逻辑)
Tests must verify **existing reality**, not create artificial scenarios.

### Philosophy (哲学/DRY)
Don't Repeat Reality - the database already exists.

### Politics (政治)
Centralized governance of shared resources - database is shared.

### Religion (宗教)
The database is sacred - do not desecrate it.

### Zen (禅)
Tests observe without disturbing, like water flowing around rocks.

## ✅ Correct Testing Patterns

### Pattern 1: Read-Only Verification
```php
test('user exists in database', function () {
    $user = User::first();
    
    expect($user)->not->toBeNull()
        ->and($user->email)->toBeString();
});
```

### Pattern 2: Isolated Transactions (If Needed)
```php
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class); // ✅ OK - rolls back only this test's changes

test('can create temporary record', function () {
    $user = User::create(['name' => 'Test', 'email' => 'test@test.com']);
    
    expect($user->id)->not->toBeNull();
    // Automatically rolled back after test
});
```

### Pattern 3: Use Existing Data
```php
test('first user has valid email', function () {
    $user = User::first();
    
    if (!$user) {
        $this->markTestSkipped('No users in database');
    }
    
    expect($user->email)->toMatch('/^[^@]+@[^@]+\.[^@]+$/');
});
```

## 🔍 Detecting RefreshDatabase Usage

```bash
# Find all uses of RefreshDatabase
grep -r "RefreshDatabase" Modules/*/tests --include="*.php"
```

## 🛠️ Migration Strategy

**Before (WRONG):**
```php
use RefreshDatabase; // ❌ REMOVE THIS
```

**After (CORRECT):**
```php
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class); // ✅ Use this instead
```

## 🚫 Zero Tolerance

**There is NO exception to this rule.**

**If you find RefreshDatabase, remove it immediately.**

---

**Last Updated**: December 15, 2025  
**Status**: ABSOLUTE - NO EXCEPTIONS EVER  
**Severity**: CRITICAL

**Mantra**: "The database exists. The site works. Tests observe. Never destroy."
