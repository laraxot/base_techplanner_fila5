# Modulo Job — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **17**

---

## `Modules/Job/app/Actions/Console/AssertAllowedArtisanCommandAction.php`

Namespace: `Modules\Job\Actions\Console`

### `public function execute(...)` — class `AssertAllowedArtisanCommandAction` (linea 17)

```php
function execute(string $command, array $allowed)
```

**Parametri array:**
- `array $allowed`

---

## `Modules/Job/app/Contracts/TaskContract.php`

Namespace: `Modules\Job\Contracts`

### `public function store(...)` — interface `TaskContract` (linea 48)

```php
function store(array $input)
```

**Parametri array:**
- `array $input`

### `public function update(...)` — interface `TaskContract` (linea 55)

```php
function update(array $input, Task $task)
```

**Parametri array:**
- `array $input`

---

## `Modules/Job/app/Contracts/TaskInterface.php`

Namespace: `Modules\Job\Contracts`

### `public function store(...)` — interface `TaskInterface` (linea 48)

```php
function store(array $input)
```

**Parametri array:**
- `array $input`

### `public function update(...)` — interface `TaskInterface` (linea 55)

```php
function update(array $input, Task $task)
```

**Parametri array:**
- `array $input`

---

## `Modules/Job/app/Filament/Columns/ScheduleArguments.php`

Namespace: `Modules\Job\Filament\Columns`

### `protected function formatArrayTags(...)` — class `ScheduleArguments` (linea 58)

```php
function formatArrayTags(array $tags)
```

**Parametri array:**
- `array $tags`

### `protected function filterEmptyTags(...)` — class `ScheduleArguments` (linea 99)

```php
function filterEmptyTags(array $tags)
```

**Parametri array:**
- `array $tags`

---

## `Modules/Job/app/Filament/Tables/Columns/ScheduleArguments.php`

Namespace: `Modules\Job\Filament\Tables\Columns`

### `protected function formatArrayTags(...)` — class `ScheduleArguments` (linea 56)

```php
function formatArrayTags(array $tags)
```

**Parametri array:**
- `array $tags`

### `protected function filterEmptyTags(...)` — class `ScheduleArguments` (linea 91)

```php
function filterEmptyTags(array $tags)
```

**Parametri array:**
- `array $tags`

---

## `Modules/Job/app/Models/BaseModel.php`

Namespace: `Modules\Job\Models`

### `public function __construct(...)` — class `BaseModel` (linea 21)

```php
function __construct(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/Job/app/Models/Traits/FrontendSortable.php`

Namespace: `Modules\Job\Models\Traits`

### `public function scopeSortableBy(...)` — trait `FrontendSortable` (linea 17)

```php
function scopeSortableBy(Builder $query, array $sortableColumns, array $defaultSort = ['name' => 'asc'],)
```

**Parametri array:**
- `array $sortableColumns`
- `array $defaultSort = ['name' => 'asc']`

---

## `Modules/Job/tests/Pest.php`

### `function createJob(...)` — _(funzione globale / closure con nome)_ (linea 19)

```php
function createJob(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeJob(...)` — _(funzione globale / closure con nome)_ (linea 27)

```php
function makeJob(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createJobBatch(...)` — _(funzione globale / closure con nome)_ (linea 40)

```php
function createJobBatch(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeJobBatch(...)` — _(funzione globale / closure con nome)_ (linea 48)

```php
function makeJobBatch(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/Job/tests/TestCase.php`

Namespace: `Modules\Job\Tests`

### `public function assertDatabaseHasRow(...)` — class `TestCase` (linea 69)

```php
function assertDatabaseHasRow(string $table, array $data, ?string $connection = null)
```

**Parametri array:**
- `array $data`

### `public function assertDatabaseMissingRow(...)` — class `TestCase` (linea 77)

```php
function assertDatabaseMissingRow(string $table, array $data, ?string $connection = null)
```

**Parametri array:**
- `array $data`

