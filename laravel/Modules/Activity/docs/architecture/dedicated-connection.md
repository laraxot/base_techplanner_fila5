# Activity Module — Database Connection: Pattern Corretto

> **Nota**: Questo documento è parzialmente obsoleto. La regola attuale è in [fix01](../prompts/fix01.txt): i modelli Activity DEVONO avere `protected $connection = 'activity'`. TenantServiceProvider crea la connessione a runtime. NON usare `$connection = null`.

## Regola attuale (fix01)

**I modelli DEVONO avere `protected $connection = 'activity'`.** Vedi [basemodel-connection-why-activity-not-null](../basemodel-connection-why-activity-not-null.md).

---

## Sezione storica (approccio Spatie config)

Spatie fornisce meccanismi per configurare la connessione tramite config. Nel progetto Laraxot usiamo invece TenantServiceProvider + $connection nei modelli.

---

## Perché NON hardcodare `$connection` nel modello

### 1. Spatie ha già il meccanismo
`config/activitylog.php`:
```php
'database_connection' => env('ACTIVITY_LOGGER_DB_CONNECTION'),
```
La connessione si configura via `.env` → config → Spatie la applica internamente.
Se metti `$connection` nel modello, **bypaschi questo sistema** e rompi il flusso di configurazione.

### 2. I modelli Spatie non sono registrati nel config
`config/event-sourcing.php` usa ancora i modelli di default Spatie:
```php
'stored_event_model' => Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent::class,
'snapshot_model' => Spatie\EventSourcing\Snapshots\EloquentSnapshot::class,
```
I nostri `StoredEvent` e `Snapshot` NON sono registrati — quindi `$connection` hardcoded verrebbe ignorato o causerebbe errori.

### 3. Aggiunge infrastruttura inesistente
Una connessione `activity` in `database.php` richiederebbe:
- Un database `laravel_activity` che non esiste
- Credenziali separate
- Migrazioni con `Schema::connection('activity')`
- Tutto questo per **zero benefici concreti** nella fase attuale

### 4. Viola il principio DRY/Separation of Concerns
Il config di Spatie esiste esattamente per questo. Aggiungere `$connection` al modello duplica la responsabilità.

---

## Pattern corretto se si vuole una connessione dedicata in futuro

### Step 1: env / config (NON il modello)
```bash
# .env
ACTIVITY_LOGGER_DB_CONNECTION=activity
```

### Step 2: Registrare i modelli custom in Spatie config
```php
// config/event-sourcing.php
'stored_event_model' => Modules\Activity\Models\StoredEvent::class,
'snapshot_model' => Modules\Activity\Models\Snapshot::class,

// config/activitylog.php
'activity_model' => Modules\Activity\Models\Activity::class,
'database_connection' => env('ACTIVITY_LOGGER_DB_CONNECTION'),
```

### Step 3: Solo ALLORA aggiungere la connessione a database.php
```php
'activity' => [
    'driver' => 'mysql',
    'database' => env('DB_DATABASE_ACTIVITY', 'laravel_activity'),
    // ...
],
```

---

## Anti-Pattern da evitare

```php
// ❌ SBAGLIATO — bypassa il config Spatie
class Activity extends SpatieActivity
{
    protected $connection = 'activity'; // NON FARE QUESTO
}

// ❌ SBAGLIATO — connessione in database.php senza modelli registrati
'activity' => [
    'database' => env('DB_DATABASE_ACTIVITY', 'laravel_activity'),
    // Inutile se i modelli usano ancora il default Spatie
],
```

---

## Caso speciale: BaseModel e l'override di XotBaseModel

`BaseModel` del modulo Activity estende `XotBaseModel`, che dichiara:
```php
/** @var string */
protected $connection = 'xot';
```

Poiché `BaseModel` non appartiene al modulo Xot, deve dichiarare la propria connessione con tipo corretto:

```php
// ✅ CORRETTO — connessione 'activity' con tipo string|null per compatibilità PHPStan
abstract class BaseModel extends XotBaseModel
{
    /** @var string|null */
    protected $connection = 'activity';
}
```

### Perché `/** @var string|null */` e NON `/** @var string */`?

Catena di ereditarietà:
```
Eloquent\Model::$connection      → protected $connection;              (implicitly nullable = string|null)
XotBaseModel::$connection        → /** @var string */ = 'xot'          (RESTRINGE a string — troppo forte)
BaseModel::$connection           → /** @var string|null */ = 'activity' (RIPRISTINA compatibilità Eloquent)
```

- `XotBaseModel` fa un'assunzione troppo restrittiva dichiarando `@var string`
- `BaseModel` deve usare `@var string|null` per essere compatibile con `Illuminate\Database\Eloquent\Model`
- Il valore `'activity'` è una stringa valida nel tipo `string|null`
- PHPStan Level 10 flaggherebbe `@var string` come incompatibile con la definizione originale Eloquent

### NON confondere con `$connection = null`

```php
// ❌ SBAGLIATO — annulla la connessione, usa il default (mysql), NON è la connessione Activity
protected $connection = null;

// ✅ CORRETTO — connessione Activity esplicita
/** @var string|null */
protected $connection = 'activity';
```

---

## Lezione appresa

Il pattern `user` (connessione dedicata) esiste per ragioni specifiche legate a Passport/OAuth.
**Non copiare meccanicamente i pattern senza capire il contesto.**
Ogni modulo con connessione dedicata deve avere:
1. Il config del package che supporta la configurazione della connessione
2. I modelli custom registrati nel config del package
3. La connessione in `database.php`
4. Il database fisicamente esistente

Se uno di questi manca, la connessione dedicata è **inutile o dannosa**.
