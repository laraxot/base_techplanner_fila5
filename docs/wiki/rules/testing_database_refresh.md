# PROHIBIT RefreshDatabase in Tests

## Scope
- Global (all Laraxot PTVX modules)
- Critical priority

## Rule
**NEVER** use `RefreshDatabase` trait in any tests within the Laraxot PTVX codebase.

```php
// ❌ PROHIBITED - Never do this
use Illuminate\Foundation\Testing\RefreshDatabase;

class SomeTest extends TestCase
{
    use RefreshDatabase; // FORBIDDEN

    // test methods...
}
```

## Correct Implementation
```php
// ✅ CORRECT - Use DatabaseTransactions instead
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SomeTest extends TestCase
{
    use DatabaseTransactions;

    // test methods...
}
```

Or create/cleanup specific test data:

```php
// ✅ CORRECT - Manually handle test data
public function testSomething()
{
    // Create identifiable test data
    $unique = 'test_' . time();
    $testModel = Model::create(['name' => $unique]);

    // Run test...

    // Clean up
    $testModel->delete();
}
```

## Motivation
1. **Performance**: RefreshDatabase is extremely slow with Laraxot's 100+ tables
2. **Module Dependencies**: Breaks complex cross-module relationships
3. **Tenant Isolation**: Disrupts multi-tenant data boundaries
4. **Reference Data**: Destroys required pre-seeded data
5. **Migration Complexity**: Breaks complex migration dependency chains
6. **Transactions**: Conflicts with Laraxot's transaction handling
7. **Authentication**: Corrupts authentication state needed for tests

## Documentation
- [Database Testing Rules](/var/www/html/ptvx/laravel/Modules/Xot/docs/testing/database_testing_rules.md)
- [Global Testing Guide](/var/www/html/ptvx/docs/testing/database_testing.md)

## Exceptions
There are NO exceptions to this rule.

