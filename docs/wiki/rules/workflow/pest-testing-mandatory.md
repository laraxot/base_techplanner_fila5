# PEST PHP Testing - Mandatory Rule

## 🚨 CRITICAL RULE - ALL TESTS MUST USE PEST

**EVERY** test in this project **MUST** be written using Pest PHP syntax.

### ✅ What You MUST Do

1. **Write all new tests in Pest syntax**
2. **Convert existing PHPUnit tests to Pest**
3. **Use Pest's expressive syntax**: `test()`, `it()`, `describe()`, `expect()`
4. **Follow Pest best practices**: Higher-order tests, datasets, custom expectations

### ❌ What You MUST NOT Do

- ❌ Write tests using PHPUnit class-based syntax
- ❌ Use `class SomeTest extends TestCase`
- ❌ Use `public function testSomething()`
- ❌ Use `@test` annotations
- ❌ Leave PHPUnit-style tests unconverted

## 📖 Pest Syntax Reference

### Basic Test Structure

#### ❌ PHPUnit (WRONG)
```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function it_can_create_user()
    {
        $user = User::factory()->create();
        
        $this->assertNotNull($user->id);
        $this->assertEquals('test@example.com', $user->email);
    }
    
    public function testUserHasName()
    {
        $user = User::factory()->create(['name' => 'John']);
        
        $this->assertEquals('John', $user->name);
    }
}
```

#### ✅ Pest (CORRECT)
```php
<?php

use Modules\User\Models\User;

test('it can create user', function () {
    $user = User::factory()->create();
    
    expect($user->id)->not->toBeNull();
    expect($user->email)->toBe('test@example.com');
});

it('has name', function () {
    $user = User::factory()->create(['name' => 'John']);
    
    expect($user->name)->toBe('John');
});
```

### Setup and Teardown

#### ❌ PHPUnit (WRONG)
```php
class UserTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }
    
    protected function tearDown(): void
    {
        $this->user->delete();
        parent::tearDown();
    }
}
```

#### ✅ Pest (CORRECT)
```php
beforeEach(function () {
    $this->user = User::factory()->create();
});

afterEach(function () {
    $this->user->delete();
});
```

### Grouped Tests

#### ❌ PHPUnit (WRONG)
```php
class UserAuthenticationTest extends TestCase
{
    public function testUserCanLogin() { }
    public function testUserCanLogout() { }
    public function testUserCanRegister() { }
}
```

#### ✅ Pest (CORRECT)
```php
describe('User Authentication', function () {
    it('can login', function () {
        // test logic
    });
    
    it('can logout', function () {
        // test logic
    });
    
    it('can register', function () {
        // test logic
    });
});
```

### Expectations

#### ❌ PHPUnit Assertions (WRONG)
```php
$this->assertTrue($condition);
$this->assertFalse($condition);
$this->assertEquals($expected, $actual);
$this->assertNotNull($value);
$this->assertInstanceOf(User::class, $user);
$this->assertCount(3, $array);
$this->assertArrayHasKey('name', $data);
```

#### ✅ Pest Expectations (CORRECT)
```php
expect($condition)->toBeTrue();
expect($condition)->toBeFalse();
expect($actual)->toBe($expected);
expect($value)->not->toBeNull();
expect($user)->toBeInstanceOf(User::class);
expect($array)->toHaveCount(3);
expect($data)->toHaveKey('name');
```

### Datasets (Pest Feature)

```php
it('validates email format', function (string $email, bool $valid) {
    $result = validateEmail($email);
    expect($result)->toBe($valid);
})->with([
    ['test@example.com', true],
    ['invalid-email', false],
    ['another@test.org', true],
]);
```

### Higher-Order Tests (Pest Feature)

```php
it('has name attribute')
    ->expect(fn() => new User(['name' => 'John']))
    ->name->toBe('John');
```

## 🔄 Conversion Workflow

When you find a PHPUnit test:

1. **Identify the test file**
2. **Create lock file**: `TestFile.php.lock`
3. **Convert to Pest syntax**:
   - Remove class declaration
   - Convert methods to `test()` or `it()` functions
   - Replace assertions with expectations
   - Convert setUp/tearDown to beforeEach/afterEach
4. **Verify conversion**:
   - Run the test: `php artisan test --filter=TestName`
   - PHPStan Level 10
   - PHPMD
   - PHPInsights
5. **Delete lock file**
6. **Update module docs**
7. **Git commit**

## 📋 Conversion Checklist

- [ ] Remove `class XTest extends TestCase`
- [ ] Remove `public function test*()` methods
- [ ] Remove `@test` annotations
- [ ] Convert to `test()` or `it()` functions
- [ ] Replace `$this->assert*()` with `expect()`
- [ ] Convert `setUp()` to `beforeEach()`
- [ ] Convert `tearDown()` to `afterEach()`
- [ ] Use `describe()` for logical grouping
- [ ] Add datasets where applicable
- [ ] Run and verify tests pass
- [ ] PHPStan Level 10 compliance
- [ ] Update documentation

## 🎯 Why Pest?

1. **Readability**: More expressive and readable syntax
2. **Less Boilerplate**: No classes, less code
3. **Modern Features**: Datasets, higher-order tests, custom expectations
4. **Better DX**: Clearer test output, better error messages
5. **Laravel Integration**: Built specifically for Laravel/PHP projects
6. **Community**: Growing ecosystem and plugin support

## 📚 Resources

- [Pest Official Docs](https://pestphp.com/docs)
- [Pest Expectations](https://pestphp.com/docs/expectations)
- [Pest Datasets](https://pestphp.com/docs/datasets)
- [Pest Higher Order Tests](https://pestphp.com/docs/higher-order-tests)

## 🚫 Zero Tolerance

**NO PHPUnit-style tests are allowed in this codebase.**

If you find any:
1. Convert them immediately
2. Document the conversion in module docs
3. Commit with clear message about Pest conversion

---

**Last Updated**: December 15, 2025
**Status**: MANDATORY - NO EXCEPTIONS
**Framework**: Pest PHP v2+
