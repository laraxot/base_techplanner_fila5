# Activity Module - Testing Coverage Policy

## Obiettivo

Raggiungere e mantenere **100% coverage** con Pest sul modulo Activity.

## Regole Critiche

### 1. NO RefreshDatabase - MAI

- **MAI** usare `RefreshDatabase` o `RefreshDatabase` trait
- **MAI** usare `migrate:fresh` nei test
- I dati non devono mai essere persi tra esecuzioni

### 2. .env.testing

- `.env.testing` è uguale a `.env` tranne per i nomi database
- I database di test hanno suffisso `_test` (es. `techplanner_data_test`)
- Le variabili `DB_CONNECTION`, `DB_DATABASE` **NON** devono essere sovrascritte in phpunit.xml
- Laravel carica `.env.testing` quando `APP_ENV=testing`

### 3. DatabaseTransactions

- Il TestCase usa `DatabaseTransactions` per rollback automatico tra test
- `$connectionsToTransact = ['mysql', 'activity', 'user']` per coprire tutte le connessioni
- Nessuna migrazione nel setUp: le migrazioni vanno eseguite una volta: `php artisan migrate --env=testing`

### 4. Connessioni Database

- **mysql**: connessione default
- **activity**: modelli Activity, Snapshot, StoredEvent (mappata da TenantServiceProvider)
- **user**: modelli User (mappata da TenantServiceProvider)

**Setup minimo .env.testing per Activity:**
```env
DB_DATABASE=techplanner_data_test
DB_DATABASE_USER=techplanner_data_test
DB_DATABASE_ACTIVITY=techplanner_activity_test
```

Per evitare conflitti di schema, `DB_DATABASE_USER` può puntare allo stesso database di `DB_DATABASE` in ambiente test.

**Migrazioni pre-test:**
```bash
php artisan migrate --env=testing --force
php artisan migrate --database=activity --env=testing --force
php artisan config:clear
```

## Workflow Coverage

### Comandi

```bash
# Test modulo Activity
cd laravel && php artisan test Modules/Activity/tests --compact

# Coverage
cd laravel && php artisan test Modules/Activity/tests --coverage --min=100

# Singolo file
php artisan test Modules/Activity/tests/Unit/Actions/LogActivityActionTest.php --compact
```

### Struttura Test

```
tests/
├── Feature/          # Test integrazione, Filament, business logic
├── Unit/              # Test unitari Actions, Models, Listeners
├── Pest.php           # Estensioni, helper, expectations
└── TestCase.php       # Base con DatabaseTransactions
```

## Checklist Pre-Commit

- [ ] Nessun RefreshDatabase
- [ ] Nessun migrate nel setUp
- [ ] .env.testing con DB _test
- [ ] DatabaseTransactions attivo
- [ ] Coverage 100% su app/
- [ ] PHPStan livello 10 passa

## Fix StoredEvent meta_data Cast

Per compatibilità con Laravel 12 e `spatie/laravel-schemaless-attributes`, il cast `meta_data` in `StoredEvent` deve usare `Spatie\SchemalessAttributes\Casts\SchemalessAttributes` (custom cast), NON `Spatie\SchemalessAttributes\SchemalessAttributes` (value object). Vedi [Modules/Xot/docs/spatie-schemaless-attributes.md](../../Xot/docs/spatie-schemaless-attributes.md).

## Collegamenti

- [testing-rules](testing-rules.md)
- [testing-strategy-implementation](testing-strategy-implementation.md)
- [testing-testcase-database-connection-fix](testing-testcase-database-connection-fix.md)
