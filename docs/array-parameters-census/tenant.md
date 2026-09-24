# Modulo Tenant — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **48**

---

## `Modules/Tenant/app/Actions/Config/FilterConfigStringKeysAction.php`

Namespace: `Modules\Tenant\Actions\Config`

### `public function execute(...)` — class `FilterConfigStringKeysAction` (linea 17)

```php
function execute(array $config)
```

**Parametri array:**
- `array $config`

---

## `Modules/Tenant/app/Actions/Config/MergeRecursiveStringKeyConfigAction.php`

Namespace: `Modules\Tenant\Actions\Config`

### `public function execute(...)` — class `MergeRecursiveStringKeyConfigAction` (linea 17)

```php
function execute(array ...$configs)
```

**Parametri array:**
- `array ...$configs`

---

## `Modules/Tenant/app/Actions/Config/ResolveTenantConfigValueAction.php`

Namespace: `Modules\Tenant\Actions\Config`

### `public function execute(...)` — class `ResolveTenantConfigValueAction` (linea 31)

```php
function execute(string $key, string|int|array|null $defaultValue = null)
```

**Parametri array:**
- `string|int|array|null $defaultValue = null`

---

## `Modules/Tenant/app/Actions/Config/SaveTenantConfigAction.php`

Namespace: `Modules\Tenant\Actions\Config`

### `public function execute(...)` — class `SaveTenantConfigAction` (linea 19)

```php
function execute(string $name, array $data)
```

**Parametri array:**
- `array $data`

### `private function arrayMergeRecursiveDistinct(...)` — class `SaveTenantConfigAction` (linea 52)

```php
function arrayMergeRecursiveDistinct(array $array1, array $array2)
```

**Parametri array:**
- `array $array1`
- `array $array2`

---

## `Modules/Tenant/app/Actions/Domains/GetDomainsArrayAction.php`

Namespace: `Modules\Tenant\Actions\Domains`

### `public function collapse(...)` — class `GetDomainsArrayAction` (linea 65)

```php
function collapse(array $data, string $keyPrefix = '')
```

**Parametri array:**
- `array $data`

---

## `Modules/Tenant/app/Actions/Models/ResolveTenantModelClassAction.php`

Namespace: `Modules\Tenant\Actions\Models`

### `private function filterValidModelClasses(...)` — class `ResolveTenantModelClassAction` (linea 88)

```php
function filterValidModelClasses(array $moduleModels)
```

**Parametri array:**
- `array $moduleModels`

---

## `Modules/Tenant/app/Actions/Modules/GetTenantModulesAction.php`

Namespace: `Modules\Tenant\Actions\Modules`

### `private function collectEnabledModules(...)` — class `GetTenantModulesAction` (linea 46)

```php
function collectEnabledModules(array $json)
```

**Parametri array:**
- `array $json`

---

## `Modules/Tenant/app/Contracts/SushiToJsonContract.php`

Namespace: `Modules\Tenant\Contracts`

### `public function saveToJson(...)` — interface `SushiToJsonContract` (linea 44)

```php
function saveToJson(array $data)
```

**Parametri array:**
- `array $data`

### `public function findRowIndexById(...)` — interface `SushiToJsonContract` (linea 51)

```php
function findRowIndexById(array $rows, int $id)
```

**Parametri array:**
- `array $rows`

---

## `Modules/Tenant/app/Models/Traits/SushiToCsv.php`

Namespace: `Modules\Tenant\Models\Traits`

### `private static function keyRowsById(...)` — trait `SushiToCsv` (linea 138)

```php
function keyRowsById(array $rows)
```

**Parametri array:**
- `array $rows`

### `private static function buildCsvItemFromData(...)` — trait `SushiToCsv` (linea 182)

```php
function buildCsvItemFromData(array $data, array $header)
```

**Parametri array:**
- `array $data`
- `array $header`

### `private static function writeCsvFromRows(...)` — trait `SushiToCsv` (linea 204)

```php
function writeCsvFromRows(self $model, array $rowsByKey, array $header)
```

**Parametri array:**
- `array $rowsByKey`
- `array $header`

### `private static function normalizeRowsForCsv(...)` — trait `SushiToCsv` (linea 215)

```php
function normalizeRowsForCsv(array $rowsByKey)
```

**Parametri array:**
- `array $rowsByKey`

---

## `Modules/Tenant/app/Models/Traits/SushiToJson.php`

Namespace: `Modules\Tenant\Models\Traits`

### `public function saveToJson(...)` — trait `SushiToJson` (linea 145)

```php
function saveToJson(array $data)
```

**Parametri array:**
- `array $data`

### `protected function findRowIndexById(...)` — trait `SushiToJson` (linea 217)

```php
function findRowIndexById(array $rows, int $id)
```

**Parametri array:**
- `array $rows`

### `private function normalizeJsonRecords(...)` — trait `SushiToJson` (linea 260)

```php
function normalizeJsonRecords(array $data)
```

**Parametri array:**
- `array $data`

### `private static function resolveNextRecordId(...)` — trait `SushiToJson` (linea 298)

```php
function resolveNextRecordId(array $existingData)
```

**Parametri array:**
- `array $existingData`

### `private static function maxIdFromRows(...)` — trait `SushiToJson` (linea 306)

```php
function maxIdFromRows(array $rows)
```

**Parametri array:**
- `array $rows`

### `protected function normalizeJsonItems(...)` — trait `SushiToJson` (linea 397)

```php
function normalizeJsonItems(array $data)
```

**Parametri array:**
- `array $data`

### `protected function normalizeSchemaFields(...)` — trait `SushiToJson` (linea 427)

```php
function normalizeSchemaFields(array $schema)
```

**Parametri array:**
- `array $schema`

### `protected function completeSchemaFields(...)` — trait `SushiToJson` (linea 437)

```php
function completeSchemaFields(array $normalizedData, array $form)
```

**Parametri array:**
- `array $normalizedData`
- `array $form`

---

## `Modules/Tenant/app/Models/Traits/SushiToJsons.php`

Namespace: `Modules\Tenant\Models\Traits`

### `private function buildRowFromSchema(...)` — trait `SushiToJsons` (linea 154)

```php
function buildRowFromSchema(array $schema, array $json)
```

**Parametri array:**
- `array $schema`
- `array $json`

---

## `Modules/Tenant/app/Providers/TenantServiceProvider.php`

Namespace: `Modules\Tenant\Providers`

### `private function mergeModuleConnections(...)` — class `TenantServiceProvider` (linea 138)

```php
function mergeModuleConnections(array $data, string $defaultConnection)
```

**Parametri array:**
- `array $data`

### `private function buildMorphMap(...)` — class `TenantServiceProvider` (linea 177)

```php
function buildMorphMap(array $map)
```

**Parametri array:**
- `array $map`

---

## `Modules/Tenant/app/Services/Config/ConfigStringKeyFilter.php`

Namespace: `Modules\Tenant\Services\Config`

### `public static function onlyStringKeys(...)` — class `ConfigStringKeyFilter` (linea 13)

```php
function onlyStringKeys(array $config)
```

**Parametri array:**
- `array $config`

### `public static function mergeRecursive(...)` — class `ConfigStringKeyFilter` (linea 31)

```php
function mergeRecursive(array ...$configs)
```

**Parametri array:**
- `array ...$configs`

---

## `Modules/Tenant/app/Services/Config/Contracts/ConfigResolverInterface.php`

Namespace: `Modules\Tenant\Services\Config\Contracts`

### `public function resolve(...)` — interface `ConfigResolverInterface` (linea 23)

```php
function resolve(string $key, string|int|array|null $default = null)
```

**Parametri array:**
- `string|int|array|null $default = null`

---

## `Modules/Tenant/app/Services/Config/Resolvers/DatabaseConfigResolver.php`

Namespace: `Modules\Tenant\Services\Config\Resolvers`

### `public function resolve(...)` — class `DatabaseConfigResolver` (linea 26)

```php
function resolve(string $key, string|int|array|null $extraConf = null)
```

**Parametri array:**
- `string|int|array|null $extraConf = null`

### `private function resolveDefaultConnection(...)` — class `DatabaseConfigResolver` (linea 54)

```php
function resolveDefaultConnection(array $extraConf, array $originalConf)
```

**Parametri array:**
- `array $extraConf`
- `array $originalConf`

### `private function addModuleConnections(...)` — class `DatabaseConfigResolver` (linea 73)

```php
function addModuleConnections(array $extraConf, ?string $default)
```

**Parametri array:**
- `array $extraConf`

---

## `Modules/Tenant/app/Services/Config/Resolvers/MorphMapConfigResolver.php`

Namespace: `Modules\Tenant\Services\Config\Resolvers`

### `public function resolve(...)` — class `MorphMapConfigResolver` (linea 38)

```php
function resolve(string $key, string|int|array|null $default = null)
```

**Parametri array:**
- `string|int|array|null $default = null`

---

## `Modules/Tenant/app/Services/Config/Resolvers/StandardConfigResolver.php`

Namespace: `Modules\Tenant\Services\Config\Resolvers`

### `public function resolve(...)` — class `StandardConfigResolver` (linea 29)

```php
function resolve(string $key, string|int|array|null $default = null)
```

**Parametri array:**
- `string|int|array|null $default = null`

### `private function handleMissingConfig(...)` — class `StandardConfigResolver` (linea 121)

```php
function handleMissingConfig(string $key, string $group, array $extraConf, string|int|array|null $default)
```

**Parametri array:**
- `array $extraConf`
- `string|int|array|null $default`

---

## `Modules/Tenant/app/Services/TenantService.php`

Namespace: `Modules\Tenant\Services`

### `public static function config(...)` — class `TenantService` (linea 66)

```php
function config(string $key, string|int|array|null $default = null)
```

**Parametri array:**
- `string|int|array|null $default = null`

### `public static function saveConfig(...)` — class `TenantService` (linea 99)

```php
function saveConfig(string $name, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Tenant/tests/Feature/TenantBusinessLogicTest.php`

Namespace: `Modules\Tenant\Tests\Feature`

### `function createTenantRecord(...)` — class `createTenantRecord` (linea 23)

```php
function createTenantRecord(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createTenantDomainRecord(...)` — _(funzione globale / closure con nome)_ (linea 32)

```php
function createTenantDomainRecord(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createTenantSettingRecord(...)` — _(funzione globale / closure con nome)_ (linea 41)

```php
function createTenantSettingRecord(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createTenantSubscriptionRecord(...)` — _(funzione globale / closure con nome)_ (linea 50)

```php
function createTenantSubscriptionRecord(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/Tenant/tests/Integration/SushiToJsonIntegrationTest.php`

Namespace: `Modules\Tenant\Tests\Integration`

### `function rowNameById(...)` — _(funzione globale / closure con nome)_ (linea 49)

```php
function rowNameById(array $rows, int $id)
```

**Parametri array:**
- `array $rows`

---

## `Modules/Tenant/tests/Integration/Traits/SushiToJsonIntegrationTest.php`

Namespace: `Modules\Tenant\Tests\Integration\Traits`

### `function writeTraitIntegrationJson(...)` — class `writeTraitIntegrationJson` (linea 20)

```php
function writeTraitIntegrationJson(string $path, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Tenant/tests/Pest.php`

### `function sushiRowById(...)` — _(funzione globale / closure con nome)_ (linea 26)

```php
function sushiRowById(array $rows, int|string $id)
```

**Parametri array:**
- `array $rows`

### `function createTenant(...)` — _(funzione globale / closure con nome)_ (linea 91)

```php
function createTenant(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeTenant(...)` — _(funzione globale / closure con nome)_ (linea 102)

```php
function makeTenant(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/Tenant/tests/TestCase.php`

Namespace: `Modules\Tenant\Tests`

### `public function sushiRowById(...)` — class `TestCase` (linea 127)

```php
function sushiRowById(array $rows, int|string $key)
```

**Parametri array:**
- `array $rows`

### `public function jsonRecordAt(...)` — class `TestCase` (linea 184)

```php
function jsonRecordAt(array $rows, int|string $key)
```

**Parametri array:**
- `array $rows`

---

## `Modules/Tenant/tests/Unit/Traits/SushiToJsonTest.php`

Namespace: `Modules\Tenant\Tests\Unit\Traits`

### `function writeSushiJsonFile(...)` — class `writeSushiJsonFile` (linea 23)

```php
function writeSushiJsonFile(string $path, array $data)
```

**Parametri array:**
- `array $data`

