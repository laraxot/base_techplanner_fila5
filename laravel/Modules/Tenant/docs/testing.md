<<<<<<< HEAD
# Testing Documentation

## Overview

This document provides testing guidelines and examples for the Tenant module in Laraxot.

## Test Structure

### Directory Structure

```
Modules/Tenant/tests/
├── Feature/
│   ├── (feature tests)
├── Unit/
│   └── (unit tests)
├── TestCase.php
└── Pest.php
```

### Test Files

- **TestCase.php** - Base test case with database configuration
- **Pest.php** - Pest configuration and extensions
- **Feature/** - Feature tests for Tenant functionality
- **Unit/** - Unit tests for Tenant components

## Testing Configuration

### TestCase Configuration

The Tenant TestCase extends the base testing configuration and provides:
- Database connection setup
- Module-specific configuration
- Test environment setup
- Database cleanup

### Database Configuration

Tenant module uses the following database connections:
- `tenant` - Main Tenant module connection
- `mysql` - Default connection
- All connections configured to use test database

## Testing Best Practices

### 1. Database Transactions

Use database transactions for test isolation:

```php
use Illuminate\Foundation\Testing\DatabaseTransactions;
```

### 2. Test Isolation

Each test should be independent:

```php
protected function tearDown(): void
{
    parent::tearDown();
    // Clean up test data
}
```

### 3. Module Configuration

Configure Tenant-specific settings:

```php
protected function setUp(): void
{
    parent::setUp();
    
    // Configure Tenant module
    config(['tenant.default_tenant_id' => 1]);
    config(['tenant.cache_enabled' => false]);
}
```

## Test Examples

### Basic Tenant Test

```php
test('tenant can be created', function () {
    $tenant = \Modules\Tenant\Models\Tenant::create([
        'name' => 'Test Tenant',
        'domain' => 'test.example.com',
        'status' => 'active',
        'settings' => ['key' => 'value'],
    ]);
    
    expect($tenant)->toBeInstanceOf(\Modules\Tenant\Models\Tenant::class));
    expect($tenant->name)->toBe('Test Tenant');
});
```

### Configuration Test

```php
test('tenant configuration is loaded', function () {
    $tenantConfig = config('tenant');
    
    expect($tenantConfig['default_tenant_id'])->toBe(1);
    expect($tenantConfig['cache_enabled'])->toBe(false);
});
```

### Service Provider Test

```php
test('tenant service provider is registered', function () {
    $app = app();
    
    expect($app->bound(\Modules\Tenant\Providers\TenantServiceProvider::class))->toBeTrue());
});
```

## Testing Commands

### Running Tests

```bash
# Run all Tenant module tests
./vendor/bin/pest Modules/Tenant/tests

# Run tests with coverage
./vendor/bin/pest Modules/Tenant/tests --coverage

# Run tests with verbose output
./vendor/bin/pest Modules/Tenant/tests --verbose
```

### Quality Checks

```bash
# Run PHPStan on Tenant module
./vendor/bin/phpstan analyze Modules/Tenant

# Run PHPMD on Tenant module
./vendor/bin/phpmd Modules/Tenant/src

# Run PHPInsights on Tenant module
./vendor/bin/phpinsights analyse Modules/Tenant
```

## Testing Issues and Solutions

### 1. Configuration Issues

**Problem**: Tenant configuration not loaded

**Solution**: Ensure proper configuration in TestCase:

```php
protected function setUp(): void
{
    parent::setUp();
    
    config(['tenant.default_tenant_id' => 1]);
    config(['tenant.cache_enabled' => false]);
}
```

### 2. Database Issues

**Problem**: Database connection issues

**Solution**: Configure database connections properly:

```php
protected function createApplication()
{
    $app = parent::createApplication();
    
    $app['config']->set([
        'database.connections.tenant.database' => '<nome progetto>_data_test',
    ]);
    
    return $app;
}
```

## Testing Goals

### Coverage Requirements

- Aim for 100% code coverage
- Test all public methods
- Test all edge cases
- Test all error scenarios

### Performance Requirements

- Tests should run in <200ms each
- Use database transactions for isolation
- Optimize database queries
- Minimize test data

### Quality Requirements

- All tests must pass PHPStan level 9+
- All tests must follow DRY, KISS, SOLID principles
- All tests must be maintainable
- All tests must be robust

## Testing Workflow

### 1. Setup Phase

1. Configure testing environment
2. Set up database connections
3. Install testing dependencies
4. Verify configuration

### 2. Development Phase

1. Write tests for new features
2. Update existing tests
3. Add regression tests
4. Maintain test coverage

### 3. Quality Assurance

1. Run tests
2. Run quality checks
3. Fix any issues
4. Update documentation

### 4. Deployment Phase

1. Ensure all tests pass
2. Verify coverage requirements
3. Update documentation
4. Commit changes

## Testing Documentation

### Module Documentation

- Update this file when adding new tests
- Document any special testing requirements
- Add examples for new test types
- Keep documentation current

### Root Documentation

- Update root documentation when module testing changes
- Add backlinks to this file
- Keep documentation consistent
- Update troubleshooting guides

## Testing Resources

### External Resources

- [Laravel 12.x Testing Documentation](https://laravel.com/docs/12.x/testing)
- [Pest Installation Guide](https://pestphp.com/docs/installation)
- [PHPStan Documentation](https://phpstan.org/user-guide/getting-started)

### Internal Resources

- [Testing Setup Guide](../../../docs/testing-setup.md)
- [Testing Best Practices](../../../docs/testing-best-practices.md)
- [Troubleshooting Guide](../../../docs/troubleshooting.md)

## Testing Examples

### Model Tests

```php
test('tenant can be created', function () {
    $tenant = \Modules\Tenant\Models\Tenant::create([
        'name' => 'Test Tenant',
        'domain' => 'test.example.com',
        'status' => 'active',
        'settings' => ['key' => 'value'],
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    
    expect($tenant)->toBeInstanceOf(\Modules\Tenant\Models\Tenant::class));
    expect($tenant->name)->toBe('Test Tenant'));
    expect($tenant->domain)->toBe('test.example.com');
    expect($tenant->status)->toBe('active');
    expect($tenant->settings)->toBe(['key' => 'value']);
});
});
```

### Service Tests

```php
test('tenant service can create tenant', function () {
    $service = new \Modules\Tenant\Services\TenantService();
    
    $tenant = $service->createTenant([
        'name' => 'Test Tenant',
        'domain' => 'test.example.com',
        'status' => 'active',
        'settings' => ['key' => 'value'],
    ]);
    
    expect($tenant)->toBeInstanceOf(\Modules\Tenant\Models\Tenant::class));
    expect($tenant->name)->toBe('Test Tenant'));
});
```

### API Tests

```php
test('tenant api can create tenant', function () {
    $tenantData = [
        'name' => 'Test Tenant',
        'domain' => 'test.example.com',
        'status' => 'active',
        'settings' => ['key' => 'value'],
    ];
    
    $response = $this->post('/api/tenants', $tenantData);
    $response->assertStatus(201);
    $response->assertJson([
        'name' => 'Test Tenant',
        'domain' => 'test.example.com',
        'status' => 'active',
        'settings' => ['key' => 'value'],
    ]);
});
```

## Testing Checklist

### Before Writing Tests

- [ ] Understand the feature to test
- [ ] Review existing tests
- [ ] Plan test scenarios
- [ ] Prepare test data

### While Writing Tests

- [ ] Use descriptive test names
- [ ] Use proper assertions
- [ ] Clean up test data
- [ ] Document tests

### After Writing Tests

- [ ] Run tests
- [ ] Check coverage
- [ ] Run quality checks
- [ ] Update documentation

### Before Committing

- [ ] All tests pass
- [ ] Coverage requirements met
- [ ] Quality checks pass
- [ ] Documentation updated

## Testing Conclusion

Following these guidelines will ensure your Tenant module tests are:
- Fast and reliable
- Maintainable and scalable
- Comprehensive and thorough
- Consistent and robust

Remember: Good tests are the foundation of reliable software development.

---

*Last updated: January 2025*
*
=======
# Testing nel Modulo Tenant

## Introduzione

Il testing è una parte fondamentale dello sviluppo del modulo Tenant. Questo documento descrive le best practices e le strategie di testing da seguire per garantire la qualità e l'affidabilità del codice.

## Tipi di Test

### 1. Test Unitari

I test unitari verificano il comportamento di singole unità di codice in isolamento.

```php
namespace Modules\Tenant\Tests\Unit;

use Tests\TestCase;
use Modules\Tenant\Models\Tenant;
use Modules\Tenant\Services\TenantService;

class TenantServiceTest extends TestCase
{
    private TenantService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = app(TenantService::class);
    }

    public function test_can_create_tenant()
    {
        $data = [
            'name' => 'Test Tenant',
            'domain' => 'test.example.com'
        ];

        $tenant = $this->service->create($data);

        $this->assertInstanceOf(Tenant::class, $tenant);
        $this->assertEquals($data['name'], $tenant->name);
        $this->assertEquals($data['domain'], $tenant->domain);
    }
}
```

### 2. Test di Integrazione

I test di integrazione verificano l'interazione tra diversi componenti del modulo.

```php
namespace Modules\Tenant\Tests\Integration;

use Tests\TestCase;
use Modules\Tenant\Models\Tenant;
use Modules\Tenant\Events\TenantCreated;
use Illuminate\Support\Facades\Event;

class TenantIntegrationTest extends TestCase
{
    public function test_tenant_creation_workflow()
    {
        Event::fake();

        $tenant = Tenant::factory()->create([
            'name' => 'Integration Test Tenant'
        ]);

        Event::assertDispatched(TenantCreated::class, function ($event) use ($tenant) {
            return $event->tenant->id === $tenant->id;
        });

        $this->assertDatabaseHas('tenants', [
            'id' => $tenant->id,
            'name' => 'Integration Test Tenant'
        ]);
    }
}
```

### 3. Test Funzionali

I test funzionali verificano il comportamento del modulo dal punto di vista dell'utente finale.
**Nota**: Seguendo le regole Laraxot, evitare l'uso di `RefreshDatabase` nei test.

```php
namespace Modules\Tenant\Tests\Feature;

use Tests\TestCase;
use Modules\Tenant\Models\Tenant;

class TenantControllerTest extends TestCase
{
    public function test_can_view_tenant_list()
    {
        // Usa dati di test temporanei senza RefreshDatabase
        $tempDir = storage_path('testing/tenant_' . uniqid());
        config(['tenant.storage_path' => $tempDir]);

        // Crea dati di test nel filesystem temporaneo
        $this->createTestTenantData($tempDir);

        $response = $this->get(route('tenants.index'));

        $response->assertStatus(200)
                ->assertViewIs('tenant::index')
                ->assertViewHas('tenants');

        // Cleanup
        $this->cleanupTestData($tempDir);
    }

    private function createTestTenantData(string $path): void
    {
        File::makeDirectory($path, 0755, true);
        // Crea dati di test specifici
    }

    private function cleanupTestData(string $path): void
    {
        if (File::exists($path)) {
            File::deleteDirectory($path);
        }
    }
}
```

## Best Practices

### 1. Organizzazione dei Test

- Mantenere una struttura speculare alla struttura del codice
- Utilizzare namespace appropriati
- Seguire le convenzioni di naming di Laravel

```
Tests/
├── Unit/
│   ├── Models/
│   ├── Services/
│   └── Actions/
├── Integration/
│   ├── Events/
│   └── Listeners/
└── Feature/
    └── Http/
```

### 2. Database Testing

**Nota**: Seguendo le regole Laraxot, evitare l'uso di `RefreshDatabase`. Utilizzare invece dati temporanei e cleanup manuale.

```php
class TenantDatabaseTest extends TestCase
{
    public function test_tenant_soft_deletes()
    {
        // Setup dati temporanei per il test
        $tempDir = storage_path('testing/tenant_' . uniqid());
        $this->setupTempTenantStorage($tempDir);

        // Crea tenant utilizzando SushiToJson trait
        $tenant = new TestTenantModel([
            'name' => 'Test Tenant',
            'status' => 'active'
        ]);
        $tenant->save();

        // Test soft delete
        $tenant->delete();

        // Verifica che il record sia marcato come eliminato
        $this->assertNotNull($tenant->deleted_at);

        // Cleanup
        $this->cleanupTempStorage($tempDir);
    }

    private function setupTempTenantStorage(string $path): void
    {
        File::makeDirectory($path, 0755, true);
        config(['tenant.storage_path' => $path]);
    }

    private function cleanupTempStorage(string $path): void
    {
        if (File::exists($path)) {
            File::deleteDirectory($path);
        }
    }
}
```

### 3. Mocking e Stubbing

```php
use Mockery;

class TenantServiceTest extends TestCase
{
    public function test_tenant_creation_with_mocked_repository()
    {
        $repository = Mockery::mock(TenantRepositoryInterface::class);
        $repository->shouldReceive('create')
                  ->once()
                  ->andReturn(new Tenant());

        $service = new TenantService($repository);
        $result = $service->create(['name' => 'Test']);

        $this->assertInstanceOf(Tenant::class, $result);
    }
}
```

### 4. Test delle Eccezioni

```php
class TenantExceptionTest extends TestCase
{
    public function test_throws_exception_on_invalid_domain()
    {
        $this->expectException(InvalidDomainException::class);

        Tenant::factory()->create([
            'domain' => 'invalid domain'
        ]);
    }
}
```

## Test di Performance

### 1. Benchmarking

```php
class TenantPerformanceTest extends TestCase
{
    public function test_tenant_creation_performance()
    {
        $start = microtime(true);

        Tenant::factory()->count(100)->create();

        $duration = microtime(true) - $start;
        $this->assertLessThan(5.0, $duration);
    }
}
```

### 2. Memory Testing

```php
class TenantMemoryTest extends TestCase
{
    public function test_memory_usage()
    {
        $initialMemory = memory_get_usage();

        $tenants = Tenant::factory()->count(1000)->create();

        $finalMemory = memory_get_usage();
        $memoryUsed = $finalMemory - $initialMemory;

        $this->assertLessThan(50 * 1024 * 1024, $memoryUsed); // 50MB
    }
}
```

## Continuous Integration

### 1. GitHub Actions

```yaml
name: Tests

on: [push, pull_request]

jobs:
  test:
    runs-on: ubuntu-latest

    steps:
    - uses: actions/checkout@v2

    - name: Setup PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '8.1'

    - name: Install Dependencies
      run: composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist

    - name: Execute tests
      run: vendor/bin/phpunit
```

### 2. Code Coverage

```bash

# phpunit.xml
<coverage>
    <include>
        <directory suffix=".php">./app</directory>
    </include>
    <exclude>
        <directory>./vendor</directory>
    </exclude>
</coverage>
```

## Manutenzione dei Test

### 1. Refactoring

- Mantenere i test aggiornati con le modifiche al codice
- Rimuovere i test obsoleti
- Aggiornare le asserzioni quando necessario

### 2. Documentazione

- Documentare i casi di test complessi
- Mantenere aggiornata la documentazione dei test
- Includere esempi di utilizzo

## Collegamenti Correlati

- [Struttura del Modulo](structure.md)
- [Best Practices](README.md#best-practices)
- [Documentazione PHPUnit](https://phpunit.de/documentation.html)
>>>>>>> 6ed19256f (.)
