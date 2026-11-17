# Regole Testing - Best Practices e Anti-Pattern

## Principi Fondamentali

### ✅ DO - Best Practice
- **Database Transactions**: Usare `DatabaseTransactions` trait per rollback automatico
- **Factory Pattern**: Creare dati isolati per ogni test con factory
- **Mocking**: Simulare dipendenze esterne quando appropriato
- **Test Isolation**: Ogni test gestisce i propri dati e stato
- **Performance**: Test veloci e scalabili

### ❌ DON'T - Anti-Pattern Critici
- **RefreshDatabase**: MAI usare - causa problemi di performance e isolamento
- **DatabaseMigrations**: Evitare - lento e non scalabile
- **Test Interdipendenti**: Test non devono dipendere l'uno dall'altro
- **Dati Condivisi**: Evitare stato condiviso tra test

## Regola Critica: NO RefreshDatabase

### Motivazioni Tecniche
1. **Performance**: Ricrea il database ad ogni test (estremamente lento)
2. **Memoria**: Consumo eccessivo di risorse di sistema
3. **Scalabilità**: Non scalabile con suite di test grandi
4. **Isolamento**: Test possono interferire tra loro
5. **CI/CD**: Problemi in ambienti di integrazione continua
6. **Ambiente**: Incompatibile con ambienti di produzione

### Alternative Corrette
```php
// ✅ CORRETTO - Database Transactions
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions; // Rollback automatico dopo ogni test

    public function test_user_creation()
    {
        $user = User::factory()->create();
        // Test logic...
        // Database viene automaticamente ripristinato
    }
}

// ✅ CORRETTO - Database Factories
class ProductTest extends TestCase
{
    public function test_product_validation()
    {
        $product = Product::factory()->make([
            'name' => 'Test Product',
            'price' => 100.00
        ]);

        $this->assertTrue($product->isValid());
    }
}

// ✅ CORRETTO - Mocking per dipendenze esterne
class PaymentServiceTest extends TestCase
{
    public function test_payment_processing()
    {
        $mockPaymentGateway = Mockery::mock(PaymentGateway::class);
        $mockPaymentGateway->shouldReceive('process')
            ->once()
            ->andReturn(['status' => 'success']);

        $service = new PaymentService($mockPaymentGateway);
        $result = $service->processPayment($paymentData);

        $this->assertEquals('success', $result['status']);
    }
}
```

### ❌ ERRATO - Anti-Pattern
```php
// ❌ MAI FARE QUESTO
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase; // PROBLEMA: Ricrea database ad ogni test

    public function test_user_creation()
    {
        // Questo test sarà estremamente lento
        // e può interferire con altri test
    }
}
```

## Configurazione Pest Corretta

### Pest.php Template
```php
<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;

uses(
    DatabaseTransactions::class, // ✅ CORRETTO
    WithFaker::class,
)->in('Feature', 'Unit');

// NO RefreshDatabase trait
```

## Test Case Base

### TestCase.php Template
```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use DatabaseTransactions; // ✅ CORRETTO
    use WithFaker;

    // NO RefreshDatabase trait
}
```

## Best Practice per Test Performance

### 1. Isolamento Dati
```php
public function test_user_can_update_profile()
{
    // Ogni test crea i propri dati
    $user = User::factory()->create();
    $profile = Profile::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)
        ->put("/profile/{$profile->id}", [
            'bio' => 'Updated bio'
        ]);

    $this->assertDatabaseHas('profiles', [
        'id' => $profile->id,
        'bio' => 'Updated bio'
    ]);
}
```

### 2. Mocking Dipendenze
```php
public function test_email_sending()
{
    Mail::fake(); // Mock del sistema email

    $user = User::factory()->create();

    event(new UserRegistered($user));

    Mail::assertSent(WelcomeEmail::class, function ($mail) use ($user) {
        return $mail->hasTo($user->email);
    });
}
```

### 3. Database Assertions
```php
public function test_user_deletion()
{
    $user = User::factory()->create();
    $userId = $user->id;

    $user->delete();

    $this->assertDatabaseMissing('users', ['id' => $userId]);
    $this->assertSoftDeleted('users', ['id' => $userId]); // Se soft delete
}
```

## Checklist Pre-Test

Prima di scrivere ogni test, verificare:

- [ ] **NO RefreshDatabase trait**
- [ ] **DatabaseTransactions per rollback automatico**
- [ ] **Factory per creazione dati isolati**
- [ ] **Mocking per dipendenze esterne**
- [ ] **Test completamente isolati**
- [ ] **Performance ottimizzata**
- [ ] **Scalabilità garantita**

## Errori Comuni da Evitare

1. **Copiare configurazioni**: Non copiare ciecamente da altri progetti
2. **Ignorare performance**: Test lenti indicano problemi di architettura
3. **Dipendenza tra test**: Test non devono dipendere l'uno dall'altro
4. **Stato condiviso**: Evitare variabili globali o stato condiviso

## Monitoraggio e Metriche

### Metriche da Tracciare
- **Tempo esecuzione test**: Target < 1 secondo per test unitario
- **Memoria utilizzata**: Target < 50MB per suite test
- **Isolamento**: 0 interferenze tra test
- **Coverage**: > 80% per business logic critica

## Riferimenti e Collegamenti

- [Testing Strategy](../../docs/testing/strategy.md)
- [Performance Testing Guidelines](../../docs/testing/performance.md)
- [Database Testing Best Practices](../../docs/testing/database.md)

---

**Ultimo aggiornamento**: Giugno 2025
**Responsabile**: Team Sviluppo
**Status**: ✅ ATTIVO - Regole critiche implementate
