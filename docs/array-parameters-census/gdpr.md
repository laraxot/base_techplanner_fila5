# Modulo Gdpr — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **15**

---

## `Modules/Gdpr/app/Actions/SaveGdprConsentsAction.php`

Namespace: `Modules\Gdpr\Actions`

### `public function execute(...)` — class `SaveGdprConsentsAction` (linea 23)

```php
function execute(User $user, array $consents, ?string $ipAddress = null, ?string $userAgent = null)
```

**Parametri array:**
- `array $consents`

---

## `Modules/Gdpr/app/Actions/UpdateGdprConsentsAction.php`

Namespace: `Modules\Gdpr\Actions`

### `public function execute(...)` — class `UpdateGdprConsentsAction` (linea 24)

```php
function execute(User $user, array $consents, ?string $ipAddress = null, ?string $userAgent = null)
```

**Parametri array:**
- `array $consents`

---

## `Modules/Gdpr/app/Actions/Validation/ValidateUserDataAction.php`

Namespace: `Modules\Gdpr\Actions\Validation`

### `public function execute(...)` — class `ValidateUserDataAction` (linea 24)

```php
function execute(array $formData)
```

**Parametri array:**
- `array $formData`

---

## `Modules/Gdpr/app/Filament/Widgets/Auth/GdprConsentForm.php`

Namespace: `Modules\Gdpr\Filament\Widgets\Auth`

### `protected function logRegistrationAttempt(...)` — class `GdprConsentForm` (linea 111)

```php
function logRegistrationAttempt(array $formData)
```

**Parametri array:**
- `array $formData`

---

## `Modules/Gdpr/app/Filament/Widgets/Auth/RegisterWidget.php`

Namespace: `Modules\Gdpr\Filament\Widgets\Auth`

### `protected function logRegistrationAttempt(...)` — class `RegisterWidget` (linea 111)

```php
function logRegistrationAttempt(array $formData)
```

**Parametri array:**
- `array $formData`

---

## `Modules/Gdpr/app/Models/Traits/HasGdpr.php`

Namespace: `Modules\Gdpr\Models\Traits`

### `public function giveConsent(...)` — trait `HasGdpr` (linea 96)

```php
function giveConsent(ConsentType|string $type, array $metadata = [])
```

**Parametri array:**
- `array $metadata = []`

---

## `Modules/Gdpr/tests/PestHelpers.php`

### `function gdprGet(...)` — _(funzione globale / closure con nome)_ (linea 40)

```php
function gdprGet(string $uri, array $headers = [])
```

**Parametri array:**
- `array $headers = []`

### `function gdprPost(...)` — _(funzione globale / closure con nome)_ (linea 51)

```php
function gdprPost(string $uri, array $data = [], array $headers = [])
```

**Parametri array:**
- `array $data = []`
- `array $headers = []`

### `function gdprArtisan(...)` — _(funzione globale / closure con nome)_ (linea 64)

```php
function gdprArtisan(string $command, array $parameters = [])
```

**Parametri array:**
- `array $parameters = []`

### `function assertGdprTableHas(...)` — _(funzione globale / closure con nome)_ (linea 77)

```php
function assertGdprTableHas(string $table, array $where, ?string $connection = 'gdpr')
```

**Parametri array:**
- `array $where`

### `function assertGdprTableMissing(...)` — _(funzione globale / closure con nome)_ (linea 91)

```php
function assertGdprTableMissing(string $table, array $where, ?string $connection = 'gdpr')
```

**Parametri array:**
- `array $where`

### `function createGdprConsent(...)` — _(funzione globale / closure con nome)_ (linea 105)

```php
function createGdprConsent(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function assertFillableContains(...)` — _(funzione globale / closure con nome)_ (linea 152)

```php
function assertFillableContains(array $fields, array $fillable)
```

**Parametri array:**
- `array $fields`
- `array $fillable`

---

## `Modules/Gdpr/tests/TestCase.php`

Namespace: `Modules\Gdpr\Tests`

### `public function assertDatabaseHasRow(...)` — class `TestCase` (linea 53)

```php
function assertDatabaseHasRow(string $table, array $data, ?string $connection = null)
```

**Parametri array:**
- `array $data`

### `public function assertDatabaseMissingRow(...)` — class `TestCase` (linea 61)

```php
function assertDatabaseMissingRow(string $table, array $data, ?string $connection = null)
```

**Parametri array:**
- `array $data`

