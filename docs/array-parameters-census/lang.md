# Modulo Lang — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **32**

---

## `Modules/Lang/app/Actions/MergeTranslationsAction.php`

Namespace: `Modules\Lang\Actions`

### `public function execute(...)` — class `MergeTranslationsAction` (linea 25)

```php
function execute(array $translationFiles)
```

**Parametri array:**
- `array $translationFiles`

---

## `Modules/Lang/app/Actions/ReadTranslationFileAction.php`

Namespace: `Modules\Lang\Actions`

### `public function toPhp(...)` — class `ReadTranslationFileAction` (linea 60)

```php
function toPhp(array $translations)
```

**Parametri array:**
- `array $translations`

### `private function arrayToPhp(...)` — class `ReadTranslationFileAction` (linea 77)

```php
function arrayToPhp(array $array, int $indent = 0)
```

**Parametri array:**
- `array $array`

---

## `Modules/Lang/app/Actions/SaveTransAction.php`

Namespace: `Modules\Lang\Actions`

### `public function execute(...)` — class `SaveTransAction` (linea 20)

```php
function execute(string $key, int|string|array|Htmlable|null $data)
```

**Parametri array:**
- `int|string|array|Htmlable|null $data`

---

## `Modules/Lang/app/Actions/SyncTranslationsAction.php`

Namespace: `Modules\Lang\Actions`

### `public function execute(...)` — class `SyncTranslationsAction` (linea 24)

```php
function execute(string $sourceLang = 'it', array $targetLangs = ['en', 'de'], ?string $specificModule = null,)
```

**Parametri array:**
- `array $targetLangs = ['en', 'de']`

### `private function syncModule(...)` — class `SyncTranslationsAction` (linea 63)

```php
function syncModule(string $module, string $sourceLang, array $targetLangs)
```

**Parametri array:**
- `array $targetLangs`

### `private function filterStringKeyArray(...)` — class `SyncTranslationsAction` (linea 197)

```php
function filterStringKeyArray(array $arr)
```

**Parametri array:**
- `array $arr`

### `private function mergeTranslations(...)` — class `SyncTranslationsAction` (linea 217)

```php
function mergeTranslations(array $source, array $target)
```

**Parametri array:**
- `array $source`
- `array $target`

### `private function saveTranslations(...)` — class `SyncTranslationsAction` (linea 244)

```php
function saveTranslations(string $filePath, array $translations)
```

**Parametri array:**
- `array $translations`

### `private function arrayToPhp(...)` — class `SyncTranslationsAction` (linea 261)

```php
function arrayToPhp(array $array, int $indent = 0)
```

**Parametri array:**
- `array $array`

---

## `Modules/Lang/app/Actions/TransArrayAction.php`

Namespace: `Modules\Lang\Actions`

### `public function execute(...)` — class `TransArrayAction` (linea 27)

```php
function execute(array $array, ?string $transKey)
```

**Parametri array:**
- `array $array`

---

## `Modules/Lang/app/Actions/TranslatorAction.php`

Namespace: `Modules\Lang\Actions`

### `public function get(...)` — class `TranslatorAction` (linea 30)

```php
function get(mixed $key, array $replace = [], mixed $locale = null, mixed $fallback = true)
```

**Parametri array:**
- `array $replace = []`

---

## `Modules/Lang/app/Actions/WriteTranslationFileAction.php`

Namespace: `Modules\Lang\Actions`

### `public function execute(...)` — class `WriteTranslationFileAction` (linea 28)

```php
function execute(string $filePath, array $translations)
```

**Parametri array:**
- `array $translations`

---

## `Modules/Lang/app/Adapters/TranslatorAdapter.php`

Namespace: `Modules\Lang\Adapters`

### `public function get(...)` — class `TranslatorAdapter` (linea 34)

```php
function get(mixed $key, array $replace = [], mixed $locale = null, mixed $fallback = true)
```

**Parametri array:**
- `array $replace = []`

---

## `Modules/Lang/app/Casts/LangField.php`

Namespace: `Modules\Lang\Casts`

### `public function get(...)` — class `LangField` (linea 22)

```php
function get(Model $model, string $key, mixed $value, array $attributes)
```

**Parametri array:**
- `array $attributes`

### `public function set(...)` — class `LangField` (linea 37)

```php
function set(Model $model, string $key, mixed $value, array $attributes)
```

**Parametri array:**
- `array $attributes`

---

## `Modules/Lang/app/Datas/LangData.php`

Namespace: `Modules\Lang\Datas`

### `public static function collection(...)` — class `LangData` (linea 44)

```php
function collection(EloquentCollection|Collection|array $data)
```

**Parametri array:**
- `EloquentCollection|Collection|array $data`

---

## `Modules/Lang/app/Filament/Resources/TranslationFileResource/Pages/EditTranslationFile.php`

Namespace: `Modules\Lang\Filament\Resources\TranslationFileResource\Pages`

### `public function makeFromArray(...)` — class `EditTranslationFile` (linea 50)

```php
function makeFromArray(array $array, string $prefix = '')
```

**Parametri array:**
- `array $array`

### `protected function mutateFormDataBeforeSave(...)` — class `EditTranslationFile` (linea 86)

```php
function mutateFormDataBeforeSave(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Lang/app/Models/Contracts/HasTranslationsContract.php`

Namespace: `Modules\Lang\Models\Contracts`

### `public function setTranslation(...)` — interface `HasTranslationsContract` (linea 27)

```php
function setTranslation(string $key, string $locale, int|array|string|null $value)
```

**Parametri array:**
- `int|array|string|null $value`

---

## `Modules/Lang/app/Models/Traits/HasStrictTranslations.php`

Namespace: `Modules\Lang\Models\Traits`

### `private static function normalizeTranslationArray(...)` — trait `HasStrictTranslations` (linea 59)

```php
function normalizeTranslationArray(array $value)
```

**Parametri array:**
- `array $value`

---

## `Modules/Lang/app/Services/TranslatorService.php`

Namespace: `Modules\Lang\Services`

### `public function get(...)` — class `TranslatorService` (linea 30)

```php
function get(mixed $key, array $replace = [], mixed $locale = null, mixed $fallback = true)
```

**Parametri array:**
- `array $replace = []`

---

## `Modules/Lang/docs/helper-text-audit-script.php`

### `function findHelperTextIssues(...)` — _(funzione globale / closure con nome)_ (linea 39)

```php
function findHelperTextIssues(array $data, string $file, string $parentKey = '')
```

**Parametri array:**
- `array $data`

### `function generateReport(...)` — _(funzione globale / closure con nome)_ (linea 70)

```php
function generateReport(array $issues)
```

**Parametri array:**
- `array $issues`

---

## `Modules/Lang/docs/italian-text-audit-script.php`

### `function generateItalianTextReport(...)` — _(funzione globale / closure con nome)_ (linea 168)

```php
function generateItalianTextReport(array $issues)
```

**Parametri array:**
- `array $issues`

---

## `Modules/Lang/docs/italian-text-validation-refined.php`

### `function generateRefinedReport(...)` — _(funzione globale / closure con nome)_ (linea 273)

```php
function generateRefinedReport(array $issues)
```

**Parametri array:**
- `array $issues`

---

## `Modules/Lang/docs/obbligatorio-audit-script.php`

### `function generateObbligatorioReport(...)` — _(funzione globale / closure con nome)_ (linea 167)

```php
function generateObbligatorioReport(array $issues)
```

**Parametri array:**
- `array $issues`

---

## `Modules/Lang/tests/Pest.php`

### `function createTranslation(...)` — _(funzione globale / closure con nome)_ (linea 22)

```php
function createTranslation(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeTranslation(...)` — _(funzione globale / closure con nome)_ (linea 30)

```php
function makeTranslation(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createTranslationFile(...)` — _(funzione globale / closure con nome)_ (linea 43)

```php
function createTranslationFile(string $filePath, array $translations)
```

**Parametri array:**
- `array $translations`

### `function langAssertDatabaseHasRow(...)` — _(funzione globale / closure con nome)_ (linea 59)

```php
function langAssertDatabaseHasRow(string $table, array $data, ?string $connection = 'lang')
```

**Parametri array:**
- `array $data`

---

## `Modules/Lang/tests/TestCase.php`

Namespace: `Modules\Lang\Tests`

### `public function assertDatabaseHasRow(...)` — class `TestCase` (linea 66)

```php
function assertDatabaseHasRow(string $table, array $data, ?string $connection = null)
```

**Parametri array:**
- `array $data`

