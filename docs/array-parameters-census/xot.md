# Modulo Xot — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **204**

> Nota 2026-07-24: `ChatOllamaAction` / `GenerateOllamaAction` spostate in
> [`ai.md`](ai.md) (`Modules/AI/app/Actions/Ollama/`) — rule
> `domain-actions-belong-to-domain-module`.

---

## `Modules/Xot/app/Actions/Arr/ArrayToRawJsAction.php`

Namespace: `Modules\Xot\Actions\Arr`

### `public function execute(...)` — class `ArrayToRawJsAction` (linea 30)

```php
function execute(array $array)
```

**Parametri array:**
- `array $array`

---

## `Modules/Xot/app/Actions/Arr/DiffAssocRecursiveAction.php`

Namespace: `Modules\Xot\Actions\Arr`

### `public static function fixType(...)` — class `DiffAssocRecursiveAction` (linea 21)

```php
function fixType(array $data)
```

**Parametri array:**
- `array $data`

### `public function execute(...)` — class `DiffAssocRecursiveAction` (linea 46)

```php
function execute(array $arr_1, array $arr_2)
```

**Parametri array:**
- `array $arr_1`
- `array $arr_2`

---

## `Modules/Xot/app/Actions/Arr/SaveArrayAction.php`

Namespace: `Modules\Xot\Actions\Arr`

### `public function execute(...)` — class `SaveArrayAction` (linea 16)

```php
function execute(array $data, string $filename, string $format = 'php')
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Actions/Arr/SaveJsonArrayAction.php`

Namespace: `Modules\Xot\Actions\Arr`

### `public function execute(...)` — class `SaveJsonArrayAction` (linea 19)

```php
function execute(array $data, string $filename)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Actions/Arr/SavePhpArrayAction.php`

Namespace: `Modules\Xot\Actions\Arr`

### `public function execute(...)` — class `SavePhpArrayAction` (linea 19)

```php
function execute(array $data, string $filename)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Actions/Array/ArrayToRawJsAction.php`

Namespace: `Modules\Xot\Actions\Array`

### `public function execute(...)` — class `ArrayToRawJsAction` (linea 30)

```php
function execute(array $array)
```

**Parametri array:**
- `array $array`

---

## `Modules/Xot/app/Actions/Array/DiffAssocRecursiveAction.php`

Namespace: `Modules\Xot\Actions\Array`

### `public static function fixType(...)` — class `DiffAssocRecursiveAction` (linea 21)

```php
function fixType(array $data)
```

**Parametri array:**
- `array $data`

### `public function execute(...)` — class `DiffAssocRecursiveAction` (linea 46)

```php
function execute(array $arr_1, array $arr_2)
```

**Parametri array:**
- `array $arr_1`
- `array $arr_2`

---

## `Modules/Xot/app/Actions/Array/SaveArrayAction.php`

Namespace: `Modules\Xot\Actions\Array`

### `public function execute(...)` — class `SaveArrayAction` (linea 16)

```php
function execute(array $data, string $filename, string $format = 'php')
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Actions/Array/SaveJsonArrayAction.php`

Namespace: `Modules\Xot\Actions\Array`

### `public function execute(...)` — class `SaveJsonArrayAction` (linea 19)

```php
function execute(array $data, string $filename)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Actions/Array/SavePhpArrayAction.php`

Namespace: `Modules\Xot\Actions\Array`

### `public function execute(...)` — class `SavePhpArrayAction` (linea 18)

```php
function execute(array $data, string $filename)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Actions/ArrayAction.php`

Namespace: `Modules\Xot\Actions`

### `public static function diff_assoc_recursive(...)` — class `ArrayAction` (linea 34)

```php
function diff_assoc_recursive(array $array1, array $array2)
```

**Parametri array:**
- `array $array1`
- `array $array2`

---

## `Modules/Xot/app/Actions/ArtisanAction.php`

Namespace: `Modules\Xot\Actions`

### `public static function exe(...)` — class `ArtisanAction` (linea 217)

```php
function exe(string $command, array $arguments = [])
```

**Parametri array:**
- `array $arguments = []`

---

## `Modules/Xot/app/Actions/Cast/SafeArrayCastAction.php`

Namespace: `Modules\Xot\Actions\Cast`

### `public function execute(...)` — class `SafeArrayCastAction` (linea 48)

```php
function execute(mixed $value, ?array $default = [])
```

**Parametri array:**
- `?array $default = []`

### `private function normalizeArray(...)` — class `SafeArrayCastAction` (linea 98)

```php
function normalizeArray(array $array)
```

**Parametri array:**
- `array $array`

### `public function executeWithKeys(...)` — class `SafeArrayCastAction` (linea 118)

```php
function executeWithKeys(mixed $value, array $requiredKeys, ?array $default = [])
```

**Parametri array:**
- `array $requiredKeys`
- `?array $default = []`

### `public function executeWithFilter(...)` — class `SafeArrayCastAction` (linea 141)

```php
function executeWithFilter(mixed $value, array $allowedKeys, ?array $default = [])
```

**Parametri array:**
- `array $allowedKeys`
- `?array $default = []`

### `public function executeWithValueType(...)` — class `SafeArrayCastAction` (linea 160)

```php
function executeWithValueType(mixed $value, string $valueType, ?array $default = [])
```

**Parametri array:**
- `?array $default = []`

### `public static function cast(...)` — class `SafeArrayCastAction` (linea 199)

```php
function cast(mixed $value, ?array $default = [])
```

**Parametri array:**
- `?array $default = []`

### `public static function castWithKeys(...)` — class `SafeArrayCastAction` (linea 213)

```php
function castWithKeys(mixed $value, array $requiredKeys, ?array $default = [])
```

**Parametri array:**
- `array $requiredKeys`
- `?array $default = []`

### `public static function castWithFilter(...)` — class `SafeArrayCastAction` (linea 227)

```php
function castWithFilter(mixed $value, array $allowedKeys, ?array $default = [])
```

**Parametri array:**
- `array $allowedKeys`
- `?array $default = []`

### `public static function castWithValueType(...)` — class `SafeArrayCastAction` (linea 241)

```php
function castWithValueType(mixed $value, string $valueType, ?array $default = [])
```

**Parametri array:**
- `?array $default = []`

---

## `Modules/Xot/app/Actions/Cast/SafeAttributeCastAction.php`

Namespace: `Modules\Xot\Actions\Cast`

### `public function getArrayAttribute(...)` — class `SafeAttributeCastAction` (linea 159)

```php
function getArrayAttribute(Model $model, string $attribute, ?array $default = [])
```

**Parametri array:**
- `?array $default = []`

---

## `Modules/Xot/app/Actions/Cast/SafeBooleanCastAction.php`

Namespace: `Modules\Xot\Actions\Cast`

### `public function executeWithCustomValues(...)` — class `SafeBooleanCastAction` (linea 99)

```php
function executeWithCustomValues(mixed $value, array $trueValues, array $falseValues, ?bool $default = false,)
```

**Parametri array:**
- `array $trueValues`
- `array $falseValues`

### `public static function castWithCustomValues(...)` — class `SafeBooleanCastAction` (linea 198)

```php
function castWithCustomValues(mixed $value, array $trueValues, array $falseValues, ?bool $default = false,)
```

**Parametri array:**
- `array $trueValues`
- `array $falseValues`

---

## `Modules/Xot/app/Actions/Cast/SafeEloquentCastAction.php`

Namespace: `Modules\Xot\Actions\Cast`

### `public function getArrayAttribute(...)` — class `SafeEloquentCastAction` (linea 159)

```php
function getArrayAttribute(Model $model, string $attribute, ?array $default = [])
```

**Parametri array:**
- `?array $default = []`

---

## `Modules/Xot/app/Actions/Cast/SafeObjectCastAction.php`

Namespace: `Modules\Xot\Actions\Cast`

### `public function getArrayProperty(...)` — class `SafeObjectCastAction` (linea 185)

```php
function getArrayProperty(object $object, string $property, ?array $default = [])
```

**Parametri array:**
- `?array $default = []`

### `public function callMethodSafely(...)` — class `SafeObjectCastAction` (linea 304)

```php
function callMethodSafely(object $object, string $method, array $parameters = [], mixed $default = null,)
```

**Parametri array:**
- `array $parameters = []`

---

## `Modules/Xot/app/Actions/Export/ExportXlsByCollection.php`

Namespace: `Modules\Xot\Actions\Export`

### `public function execute(...)` — class `ExportXlsByCollection` (linea 34)

```php
function execute(Collection|EloquentCollection $collection, string $filename = 'test.xlsx', ?string $transKey = null, array $fields = [],)
```

**Parametri array:**
- `array $fields = []`

### `public function executeWithSpreadsheet(...)` — class `ExportXlsByCollection` (linea 66)

```php
function executeWithSpreadsheet(Collection|EloquentCollection $rows, array $fields, string $filename)
```

**Parametri array:**
- `array $fields`

### `protected function writeHeader(...)` — class `ExportXlsByCollection` (linea 91)

```php
function writeHeader(Worksheet $sheet, array $fields)
```

**Parametri array:**
- `array $fields`

### `protected function writeRows(...)` — class `ExportXlsByCollection` (linea 105)

```php
function writeRows(Worksheet $sheet, Collection $rows, array $fields)
```

**Parametri array:**
- `array $fields`

---

## `Modules/Xot/app/Actions/Export/ExportXlsByLazyCollection.php`

Namespace: `Modules\Xot\Actions\Export`

### `public function execute(...)` — class `ExportXlsByLazyCollection` (linea 24)

```php
function execute(LazyCollection $collection, string $filename = 'test.xlsx', array $fields = [],)
```

**Parametri array:**
- `array $fields = []`

---

## `Modules/Xot/app/Actions/Export/ExportXlsByQuery.php`

Namespace: `Modules\Xot\Actions\Export`

### `public function execute(...)` — class `ExportXlsByQuery` (linea 27)

```php
function execute(Builder $query, string $filename = 'test.xlsx', array $fields = [], ?int $limit = null,)
```

**Parametri array:**
- `array $fields = []`

---

## `Modules/Xot/app/Actions/Export/ExportXlsByView.php`

Namespace: `Modules\Xot\Actions\Export`

### `public function execute(...)` — class `ExportXlsByView` (linea 28)

```php
function execute(View $view, array $fields, string $filename = 'test.xlsx', ?string $transKey = null,)
```

**Parametri array:**
- `array $fields`

---

## `Modules/Xot/app/Actions/Export/ExportXlsStreamByLazyCollection.php`

Namespace: `Modules\Xot\Actions\Export`

### `public function execute(...)` — class `ExportXlsStreamByLazyCollection` (linea 31)

```php
function execute(LazyCollection $data, string $filename = 'test.csv', ?string $transKey = null, ?array $_fields = null,)
```

**Parametri array:**
- `?array $_fields = null`

---

## `Modules/Xot/app/Actions/Export/XlsByModelClassAction.php`

Namespace: `Modules\Xot\Actions\Export`

### `public function execute(...)` — class `XlsByModelClassAction` (linea 31)

```php
function execute(string $modelClass, array $where = [], array $includes = [], array $excludes = [], ?callable $callback = null,)
```

**Parametri array:**
- `array $where = []`
- `array $includes = []`
- `array $excludes = []`

### `private function getWithByIncludes(...)` — class `XlsByModelClassAction` (linea 102)

```php
function getWithByIncludes(array $includes)
```

**Parametri array:**
- `array $includes`

---

## `Modules/Xot/app/Actions/Filament/Actions/CopyFromLastYearAction.php`

Namespace: `Modules\Xot\Actions\Filament\Actions`

### `private static function normalizeStringKeyArray(...)` — class `CopyFromLastYearAction` (linea 44)

```php
function normalizeStringKeyArray(array $input)
```

**Parametri array:**
- `array $input`

### `public function execute(...)` — class `CopyFromLastYearAction` (linea 64)

```php
function execute(array $arguments, array $data)
```

**Parametri array:**
- `array $arguments`
- `array $data`

---

## `Modules/Xot/app/Actions/Filament/Actions/ViewCopyAction.php`

Namespace: `Modules\Xot\Actions\Filament\Actions`

### `public function execute(...)` — class `ViewCopyAction` (linea 45)

```php
function execute(array $arguments, array $data)
```

**Parametri array:**
- `array $arguments`
- `array $data`

---

## `Modules/Xot/app/Actions/File/DownloadZipByPathsDiskAction.php`

Namespace: `Modules\Xot\Actions\File`

### `public function execute(...)` — class `DownloadZipByPathsDiskAction` (linea 23)

```php
function execute(array $attachments, string $disk)
```

**Parametri array:**
- `array $attachments`

---

## `Modules/Xot/app/Actions/File/FileAction.php`

Namespace: `Modules\Xot\Actions\File`

### `public static function viewNamespaceToUrl(...)` — class `FileAction` (linea 604)

```php
function viewNamespaceToUrl(array $files)
```

**Parametri array:**
- `array $files`

### `public static function allDirectories(...)` — class `FileAction` (linea 733)

```php
function allDirectories(string $path, array $except = [], string $dir = '')
```

**Parametri array:**
- `array $except = []`

---

## `Modules/Xot/app/Actions/Generate/GenerateModelByModelClass.php`

Namespace: `Modules\Xot\Actions\Generate`

### `public function setCustomReplaces(...)` — class `GenerateModelByModelClass` (linea 105)

```php
function setCustomReplaces(array $replaces)
```

**Parametri array:**
- `array $replaces`

---

## `Modules/Xot/app/Actions/GetViewByClassAction.php`

Namespace: `Modules\Xot\Actions`

### `public function execute(...)` — class `GetViewByClassAction` (linea 26)

```php
function execute(string $class, array $params = [], ?string $viewName = null)
```

**Parametri array:**
- `array $params = []`

---

## `Modules/Xot/app/Actions/Import/ImportCsvAction.php`

Namespace: `Modules\Xot\Actions\Import`

### `private function prepareFields(...)` — class `ImportCsvAction` (linea 103)

```php
function prepareFields(array $columns)
```

**Parametri array:**
- `array $columns`

### `private function buildSql(...)` — class `ImportCsvAction` (linea 116)

```php
function buildSql(string $path, string $db, string $tbl, string $fieldsUpList, array $columns)
```

**Parametri array:**
- `array $columns`

---

## `Modules/Xot/app/Actions/Model/CreateMorphToOneRelatedModelAction.php`

Namespace: `Modules\Xot\Actions\Model`

### `public function execute(...)` — class `CreateMorphToOneRelatedModelAction` (linea 19)

```php
function execute(object $relation, array $attributes)
```

**Parametri array:**
- `array $attributes`

---

## `Modules/Xot/app/Actions/Model/DestroyAction.php`

Namespace: `Modules\Xot\Actions\Model`

### `public function execute(...)` — class `DestroyAction` (linea 23)

```php
function execute(Model $model, array $_data, array $_rules)
```

**Parametri array:**
- `array $_data`
- `array $_rules`

---

## `Modules/Xot/app/Actions/Model/FilterRelationsAction.php`

Namespace: `Modules\Xot\Actions\Model`

### `public function execute(...)` — class `FilterRelationsAction` (linea 18)

```php
function execute(Model $_model, array $relations)
```

**Parametri array:**
- `array $relations`

---

## `Modules/Xot/app/Actions/Model/StoreAction.php`

Namespace: `Modules\Xot\Actions\Model`

### `public function execute(...)` — class `StoreAction` (linea 20)

```php
function execute(Model $model, array $data, array $rules)
```

**Parametri array:**
- `array $data`
- `array $rules`

---

## `Modules/Xot/app/Actions/Model/Update/HasManyAction.php`

Namespace: `Modules\Xot\Actions\Model\Update`

### `private function isDirectUpdate(...)` — class `HasManyAction` (linea 45)

```php
function isDirectUpdate(array $data)
```

**Parametri array:**
- `array $data`

### `private function cleanupOrphanedRecords(...)` — class `HasManyAction` (linea 99)

```php
function cleanupOrphanedRecords(RelationData $relationDTO, HasManyUpdateData $updateData, array $updatedIds,)
```

**Parametri array:**
- `array $updatedIds`

---

## `Modules/Xot/app/Actions/Model/Update/MorphOneAction.php`

Namespace: `Modules\Xot\Actions\Model\Update`

### `private function validateAndPrepareData(...)` — class `MorphOneAction` (linea 56)

```php
function validateAndPrepareData(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Actions/Model/Update/MorphToOneAction.php`

Namespace: `Modules\Xot\Actions\Model\Update`

### `private function prepareData(...)` — class `MorphToOneAction` (linea 51)

```php
function prepareData(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Actions/Model/Update/RelationAction.php`

Namespace: `Modules\Xot\Actions\Model\Update`

### `public function execute(...)` — class `RelationAction` (linea 21)

```php
function execute(Model $model, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Actions/Model/UpdateAction.php`

Namespace: `Modules\Xot\Actions\Model`

### `public function execute(...)` — class `UpdateAction` (linea 24)

```php
function execute(Model $model, array $data, array $rules)
```

**Parametri array:**
- `array $data`
- `array $rules`

---

## `Modules/Xot/app/Actions/Pdf/ContentPdfAction.php`

Namespace: `Modules\Xot\Actions\Pdf`

### `public function execute(...)` — class `ContentPdfAction` (linea 35)

```php
function execute(?string $html = null, ?string $view = null, ?array $data = null, string $_filename = 'my_doc.pdf',)
```

**Parametri array:**
- `?array $data = null`

### `public function fromView(...)` — class `ContentPdfAction` (linea 86)

```php
function fromView(string $view, array $data = [], string $filename = 'document.pdf')
```

**Parametri array:**
- `array $data = []`

---

## `Modules/Xot/app/Actions/Pdf/DownloadPdfByViewAction.php`

Namespace: `Modules\Xot\Actions\Pdf`

### `public function execute(...)` — class `DownloadPdfByViewAction` (linea 28)

```php
function execute(string $view, array $viewParams = [], ?string $filename = null,)
```

**Parametri array:**
- `array $viewParams = []`

---

## `Modules/Xot/app/Actions/Pdf/MakePdfSpatieTestAction.php`

Namespace: `Modules\Xot\Actions\Pdf`

### `public function execute(...)` — class `MakePdfSpatieTestAction` (linea 24)

```php
function execute(array $data = [], string $filename = 'spatie-pdf-test.pdf', string $view = 'xot::pdf.spatie-test',)
```

**Parametri array:**
- `array $data = []`

### `private function makePdfBuilder(...)` — class `MakePdfSpatieTestAction` (linea 46)

```php
function makePdfBuilder(string $view, array $data, string $filename)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Actions/Pdf/StreamDownloadPdfAction.php`

Namespace: `Modules\Xot\Actions\Pdf`

### `public function execute(...)` — class `StreamDownloadPdfAction` (linea 26)

```php
function execute(?string $html = null, ?string $view = null, ?array $data = null, string $filename = 'my_doc.pdf',)
```

**Parametri array:**
- `?array $data = null`

---

## `Modules/Xot/app/Actions/Query/CreateTableIndexByModelClassColumnsAction.php`

Namespace: `Modules\Xot\Actions\Query`

### `public function execute(...)` — class `CreateTableIndexByModelClassColumnsAction` (linea 30)

```php
function execute(string $modelClass, array $columns)
```

**Parametri array:**
- `array $columns`

### `private function validateColumnsExist(...)` — class `CreateTableIndexByModelClassColumnsAction` (linea 76)

```php
function validateColumnsExist(string $connectionName, string $tableName, array $columns)
```

**Parametri array:**
- `array $columns`

### `private function generateIndexName(...)` — class `CreateTableIndexByModelClassColumnsAction` (linea 131)

```php
function generateIndexName(string $tableName, array $columns)
```

**Parametri array:**
- `array $columns`

---

## `Modules/Xot/app/Actions/Route/BuildActionUrlAction.php`

Namespace: `Modules\Xot\Actions\Route`

### `public function execute(...)` — class `BuildActionUrlAction` (linea 17)

```php
function execute(array $params)
```

**Parametri array:**
- `array $params`

---

## `Modules/Xot/app/Actions/Route/BuildNestedRouteNameAction.php`

Namespace: `Modules\Xot\Actions\Route`

### `public function execute(...)` — class `BuildNestedRouteNameAction` (linea 14)

```php
function execute(array $params)
```

**Parametri array:**
- `array $params`

---

## `Modules/Xot/app/Actions/Route/IsAdminRouteAction.php`

Namespace: `Modules\Xot\Actions\Route`

### `public function execute(...)` — class `IsAdminRouteAction` (linea 14)

```php
function execute(array $params = [])
```

**Parametri array:**
- `array $params = []`

---

## `Modules/Xot/app/Actions/RouteDynAction.php`

Namespace: `Modules\Xot\Actions`

### `private static function requireStringValue(...)` — class `RouteDynAction` (linea 28)

```php
function requireStringValue(array $v, string $key)
```

**Parametri array:**
- `array $v`

### `public static function getGroupOpts(...)` — class `RouteDynAction` (linea 41)

```php
function getGroupOpts(array $v, ?string $namespace)
```

**Parametri array:**
- `array $v`

### `public static function getPrefix(...)` — class `RouteDynAction` (linea 53)

```php
function getPrefix(array $v, ?string $namespace)
```

**Parametri array:**
- `array $v`

### `public static function getAs(...)` — class `RouteDynAction` (linea 72)

```php
function getAs(array $v, ?string $_namespace)
```

**Parametri array:**
- `array $v`

### `public static function getNamespace(...)` — class `RouteDynAction` (linea 96)

```php
function getNamespace(array $v, ?string $namespace)
```

**Parametri array:**
- `array $v`

### `public static function getAct(...)` — class `RouteDynAction` (linea 114)

```php
function getAct(array $v, ?string $_namespace)
```

**Parametri array:**
- `array $v`

### `public static function getParamName(...)` — class `RouteDynAction` (linea 140)

```php
function getParamName(array $v, ?string $_namespace)
```

**Parametri array:**
- `array $v`

### `public static function getParamsName(...)` — class `RouteDynAction` (linea 158)

```php
function getParamsName(array $v, ?string $namespace)
```

**Parametri array:**
- `array $v`

### `public static function getResourceOpts(...)` — class `RouteDynAction` (linea 170)

```php
function getResourceOpts(array $v, ?string $namespace)
```

**Parametri array:**
- `array $v`

### `public static function getController(...)` — class `RouteDynAction` (linea 197)

```php
function getController(array $v, ?string $_namespace)
```

**Parametri array:**
- `array $v`

### `public static function getUri(...)` — class `RouteDynAction` (linea 214)

```php
function getUri(array $v, ?string $_namespace)
```

**Parametri array:**
- `array $v`

### `public static function getMethod(...)` — class `RouteDynAction` (linea 226)

```php
function getMethod(array $v, ?string $_namespace)
```

**Parametri array:**
- `array $v`

### `public static function getUses(...)` — class `RouteDynAction` (linea 244)

```php
function getUses(array $v, ?string $namespace)
```

**Parametri array:**
- `array $v`

### `public static function getCallback(...)` — class `RouteDynAction` (linea 257)

```php
function getCallback(array $v, ?string $namespace, ?string $curr)
```

**Parametri array:**
- `array $v`

### `public static function dynamic_route(...)` — class `RouteDynAction` (linea 274)

```php
function dynamic_route(array $array, ?string $namespace = null, ?string $namespace_start = null, ?string $curr = null,)
```

**Parametri array:**
- `array $array`

### `public static function createRouteResource(...)` — class `RouteDynAction` (linea 303)

```php
function createRouteResource(array $v, ?string $namespace)
```

**Parametri array:**
- `array $v`

### `public static function createRouteSubs(...)` — class `RouteDynAction` (linea 318)

```php
function createRouteSubs(array $v, ?string $namespace, ?string $curr)
```

**Parametri array:**
- `array $v`

### `public static function createRouteActs(...)` — class `RouteDynAction` (linea 335)

```php
function createRouteActs(array $v, ?string $namespace, ?string $curr)
```

**Parametri array:**
- `array $v`

---

## `Modules/Xot/app/Actions/Utilities/DiffAssocRecursiveAction.php`

Namespace: `Modules\Xot\Actions\Utilities`

### `public function execute(...)` — class `DiffAssocRecursiveAction` (linea 21)

```php
function execute(array $array1, array $array2)
```

**Parametri array:**
- `array $array1`
- `array $array2`

---

## `Modules/Xot/app/Adapters/PdfBuilderAdapter.php`

Namespace: `Modules\Xot\Adapters`

### `private function callBuilderMethod(...)` — class `PdfBuilderAdapter` (linea 56)

```php
function callBuilderMethod(string $method, array $arguments = [])
```

**Parametri array:**
- `array $arguments = []`

---

## `Modules/Xot/app/Casts/PhoneCast.php`

Namespace: `Modules\Xot\Casts`

### `public function get(...)` — class `PhoneCast` (linea 23)

```php
function get(mixed $_model, string $_key, mixed $value, array $_attributes)
```

**Parametri array:**
- `array $_attributes`

### `public function set(...)` — class `PhoneCast` (linea 40)

```php
function set(mixed $_model, string $_key, mixed $value, array $_attributes)
```

**Parametri array:**
- `array $_attributes`

---

## `Modules/Xot/app/Console/Commands/ImportMdbToMySQL.php`

Namespace: `Modules\Xot\Console\Commands`

### `private function importTablesIntoMySQL(...)` — class `ImportMdbToMySQL` (linea 94)

```php
function importTablesIntoMySQL(array $tables, string $mysqlDb)
```

**Parametri array:**
- `array $tables`

---

## `Modules/Xot/app/Console/Commands/OptimizeFilamentMemoryCommand.php`

Namespace: `Modules\Xot\Console\Commands`

### `private function displayAnalysisResults(...)` — class `OptimizeFilamentMemoryCommand` (linea 261)

```php
function displayAnalysisResults(array $issues)
```

**Parametri array:**
- `array $issues`

### `private function displayDetailedIssues(...)` — class `OptimizeFilamentMemoryCommand` (linea 303)

```php
function displayDetailedIssues(array $issues)
```

**Parametri array:**
- `array $issues`

### `private function applyOptimizations(...)` — class `OptimizeFilamentMemoryCommand` (linea 322)

```php
function applyOptimizations(array $issues, bool $verbose = false)
```

**Parametri array:**
- `array $issues`

---

## `Modules/Xot/app/Contracts/HasRecursiveRelationshipsContract.php`

Namespace: `Modules\Xot\Contracts`

### `public function newCollection(...)` — interface `HasRecursiveRelationshipsContract` (linea 189)

```php
function newCollection(array $models = [])
```

**Parametri array:**
- `array $models = []`

---

## `Modules/Xot/app/Contracts/ModelContactContract.php`

Namespace: `Modules\Xot\Contracts`

### `public function increase(...)` — interface `ModelContactContract` (linea 66)

```php
function increase(string $what, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Contracts/ModelProfileContract.php`

Namespace: `Modules\Xot\Contracts`

### `public function givePermissionTo(...)` — interface `ModelProfileContract` (linea 30)

```php
function givePermissionTo(string|int|array|Permission|Collection $permissions = [])
```

**Parametri array:**
- `string|int|array|Permission|Collection $permissions = []`

### `public function assignRole(...)` — interface `ModelProfileContract` (linea 39)

```php
function assignRole(array|string|int|Role|Collection $roles = [ ])
```

**Parametri array:**
- `array|string|int|Role|Collection $roles = [ ]`

### `public function hasRole(...)` — interface `ModelProfileContract` (linea 47)

```php
function hasRole(string|int|array|Role|Collection $roles, ?string $guard = null,)
```

**Parametri array:**
- `string|int|array|Role|Collection $roles`

### `public function hasAnyRole(...)` — interface `ModelProfileContract` (linea 59)

```php
function hasAnyRole(string|int|array|Role|Collection $roles = [ ])
```

**Parametri array:**
- `string|int|array|Role|Collection $roles = [ ]`

---

## `Modules/Xot/app/Contracts/MorphToOneRelationContract.php`

Namespace: `Modules\Xot\Contracts`

### `public function create(...)` — interface `MorphToOneRelationContract` (linea 19)

```php
function create(array $attributes)
```

**Parametri array:**
- `array $attributes`

---

## `Modules/Xot/app/Contracts/PassportHasApiTokensContract.php`

Namespace: `Modules\Xot\Contracts`

### `public function createToken(...)` — interface `PassportHasApiTokensContract` (linea 55)

```php
function createToken(string $name, array $scopes = [])
```

**Parametri array:**
- `array $scopes = []`

---

## `Modules/Xot/app/Contracts/ProfileContract.php`

Namespace: `Modules\Xot\Contracts`

### `public function givePermissionTo(...)` — interface `ProfileContract` (linea 42)

```php
function givePermissionTo(string|int|array|Permission|SupportCollection $permissions = [])
```

**Parametri array:**
- `string|int|array|Permission|SupportCollection $permissions = []`

### `public function assignRole(...)` — interface `ProfileContract` (linea 51)

```php
function assignRole(array|string|int|RoleContract|SupportCollection $roles = [])
```

**Parametri array:**
- `array|string|int|RoleContract|SupportCollection $roles = []`

### `public function hasRole(...)` — interface `ProfileContract` (linea 58)

```php
function hasRole(string|int|array|RoleContract|SupportCollection $roles, ?string $guard = null,)
```

**Parametri array:**
- `string|int|array|RoleContract|SupportCollection $roles`

### `public function hasAnyRole(...)` — interface `ProfileContract` (linea 70)

```php
function hasAnyRole(string|int|array|RoleContract|SupportCollection $roles = [])
```

**Parametri array:**
- `string|int|array|RoleContract|SupportCollection $roles = []`

---

## `Modules/Xot/app/Contracts/StateContract.php`

Namespace: `Modules\Xot\Contracts`

### `public function modalActionByRecord(...)` — interface `StateContract` (linea 48)

```php
function modalActionByRecord(Model $record, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Contracts/UserContract.php`

Namespace: `Modules\Xot\Contracts`

### `public function createToken(...)` — interface `UserContract` (linea 82)

```php
function createToken(string $name, array $scopes = [])
```

**Parametri array:**
- `array $scopes = []`

### `public function hasRole(...)` — interface `UserContract` (linea 93)

```php
function hasRole(string|int|array|UserRole|Collection $roles, ?string $guard = null,)
```

**Parametri array:**
- `string|int|array|UserRole|Collection $roles`

### `public function assignRole(...)` — interface `UserContract` (linea 105)

```php
function assignRole(array|string|int|UserRole|Collection $roles = [])
```

**Parametri array:**
- `array|string|int|UserRole|Collection $roles = []`

### `public function syncRoles(...)` — interface `UserContract` (linea 114)

```php
function syncRoles(array|string|int|UserRole|Collection $roles = [])
```

**Parametri array:**
- `array|string|int|UserRole|Collection $roles = []`

---

## `Modules/Xot/app/Database/Migrations/XotBaseMigration.php`

Namespace: `Modules\Xot\Database\Migrations`

### `protected function convertIdFromUuidToBigintIfNeeded(...)` — class `XotBaseMigration` (linea 441)

```php
function convertIdFromUuidToBigintIfNeeded(\Closure $createNewTableSchema, array $dataColumns, array $options = [],)
```

**Parametri array:**
- `array $dataColumns`
- `array $options = []`

### `protected function performUuidToBigintConversion(...)` — class `XotBaseMigration` (linea 495)

```php
function performUuidToBigintConversion(string $table, \Closure $createNewTableSchema, array $dataColumns, array $options,)
```

**Parametri array:**
- `array $dataColumns`
- `array $options`

### `protected function copyDataWithUuidToBigintMapping(...)` — class `XotBaseMigration` (linea 534)

```php
function copyDataWithUuidToBigintMapping(string $oldTable, string $newTable, array $dataColumns)
```

**Parametri array:**
- `array $dataColumns`

---

## `Modules/Xot/app/Datas/ComponentFileData.php`

Namespace: `Modules\Xot\Datas`

### `public static function collection(...)` — class `ComponentFileData` (linea 32)

```php
function collection(EloquentCollection|Collection|array $data)
```

**Parametri array:**
- `EloquentCollection|Collection|array $data`

---

## `Modules/Xot/app/Datas/EnvData.php`

Namespace: `Modules\Xot\Datas`

### `public function update(...)` — class `EnvData` (linea 54)

```php
function update(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Datas/PdfData.php`

Namespace: `Modules\Xot\Datas`

### `public function view(...)` — class `PdfData` (linea 154)

```php
function view(string $view, array $params = [])
```

**Parametri array:**
- `array $params = []`

---

## `Modules/Xot/app/Datas/XotData.php`

Namespace: `Modules\Xot\Datas`

### `public function update(...)` — class `XotData` (linea 334)

```php
function update(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Exceptions/Handlers/HandlerDecorator.php`

Namespace: `Modules\Xot\Exceptions\Handlers`

### `public function __call(...)` — class `HandlerDecorator` (linea 41)

```php
function __call(string $name, array $parameters)
```

**Parametri array:**
- `array $parameters`

---

## `Modules/Xot/app/Exports/CollectionExport.php`

Namespace: `Modules\Xot\Exports`

### `public function __construct(...)` — class `CollectionExport` (linea 43)

```php
function __construct(SupportCollection|EloquentCollection $collection, ?string $transKey = null, array $fields = [])
```

**Parametri array:**
- `array $fields = []`

---

## `Modules/Xot/app/Exports/LazyCollectionExport.php`

Namespace: `Modules\Xot\Exports`

### `public function __construct(...)` — class `LazyCollectionExport` (linea 36)

```php
function __construct(public LazyCollection $collection, ?string $transKey = null, array $fields = [],)
```

**Parametri array:**
- `array $fields = []`

---

## `Modules/Xot/app/Exports/QueryExport.php`

Namespace: `Modules\Xot\Exports`

### `public function __construct(...)` — class `QueryExport` (linea 44)

```php
function __construct(QueryBuilder|EloquentBuilder $query, ?string $transKey = null, array $fields = [])
```

**Parametri array:**
- `array $fields = []`

---

## `Modules/Xot/app/Exports/ViewExport.php`

Namespace: `Modules\Xot\Exports`

### `public function __construct(...)` — class `ViewExport` (linea 31)

```php
function __construct(View $view, ?string $transKey = null, ?array $fields = null)
```

**Parametri array:**
- `?array $fields = null`

---

## `Modules/Xot/app/Filament/Actions/Header/SanitizeFieldsHeaderAction.php`

Namespace: `Modules\Xot\Filament\Actions\Header`

### `public function setFields(...)` — class `SanitizeFieldsHeaderAction` (linea 69)

```php
function setFields(array $fields)
```

**Parametri array:**
- `array $fields`

---

## `Modules/Xot/app/Filament/Builders/ColumnBuilder.php`

Namespace: `Modules\Xot\Filament\Builders`

### `public static function statusBadge(...)` — class `ColumnBuilder` (linea 100)

```php
function statusBadge(array $customColors = [])
```

**Parametri array:**
- `array $customColors = []`

### `public static function priorityBadge(...)` — class `ColumnBuilder` (linea 119)

```php
function priorityBadge(array $customColors = [])
```

**Parametri array:**
- `array $customColors = []`

---

## `Modules/Xot/app/Filament/Builders/FilterBuilder.php`

Namespace: `Modules\Xot\Filament\Builders`

### `public static function statusSelect(...)` — class `FilterBuilder` (linea 192)

```php
function statusSelect(array $customStatuses = [])
```

**Parametri array:**
- `array $customStatuses = []`

### `public static function prioritySelect(...)` — class `FilterBuilder` (linea 210)

```php
function prioritySelect(array $customPriorities = [])
```

**Parametri array:**
- `array $customPriorities = []`

### `public static function typeSelect(...)` — class `FilterBuilder` (linea 228)

```php
function typeSelect(array $types)
```

**Parametri array:**
- `array $types`

---

## `Modules/Xot/app/Filament/Resources/ModuleResource/Pages/EditModule.php`

Namespace: `Modules\Xot\Filament\Resources\ModuleResource\Pages`

### `protected function mutateFormDataBeforeSave(...)` — class `EditModule` (linea 28)

```php
function mutateFormDataBeforeSave(array $data)
```

**Parametri array:**
- `array $data`

### `private function normalizeConfigArray(...)` — class `EditModule` (linea 81)

```php
function normalizeConfigArray(array $config)
```

**Parametri array:**
- `array $config`

---

## `Modules/Xot/app/Filament/Resources/Pages/XotBaseListRecords.php`

Namespace: `Modules\Xot\Filament\Resources\Pages`

### `public static function trans(...)` — class `XotBaseListRecords` (linea 36)

```php
function trans(string $key, array $params = [])
```

**Parametri array:**
- `array $params = []`

---

## `Modules/Xot/app/Filament/Resources/RelationManagers/XotBaseRelationManager.php`

Namespace: `Modules\Xot\Filament\Resources\RelationManagers`

### `public static function trans(...)` — class `XotBaseRelationManager` (linea 43)

```php
function trans(string $key, bool $exceptionIfNotExist = false, array $params = [])
```

**Parametri array:**
- `array $params = []`

---

## `Modules/Xot/app/Filament/Resources/XotBaseResource.php`

Namespace: `Modules\Xot\Filament\Resources`

### `public static function trans(...)` — class `XotBaseResource` (linea 46)

```php
function trans(string $key, bool $exceptionIfNotExist = false, array $params = [])
```

**Parametri array:**
- `array $params = []`

---

## `Modules/Xot/app/Filament/Traits/HasXotFormAction.php`

Namespace: `Modules\Xot\Filament\Traits`

### `public function getResourceUrl(...)` — trait `HasXotFormAction` (linea 42)

```php
function getResourceUrl(?string $name = null, array $parameters = [], bool $isAbsolute = true, ?string $panel = null, ?Model $tenant = null, bool $shouldGuessMissingParameters = true)
```

**Parametri array:**
- `array $parameters = []`

---

## `Modules/Xot/app/Filament/Traits/TransFuncTrait.php`

Namespace: `Modules\Xot\Filament\Traits`

### `protected static function formatTransFuncResult(...)` — trait `TransFuncTrait` (linea 90)

```php
function formatTransFuncResult(string $key, string|array|Translator|null $trans)
```

**Parametri array:**
- `string|array|Translator|null $trans`

---

## `Modules/Xot/app/Filament/Traits/TransTrait.php`

Namespace: `Modules\Xot\Filament\Traits`

### `public static function trans(...)` — trait `TransTrait` (linea 26)

```php
function trans(string $key, bool $exceptionIfNotExist = false, array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public static function getTranslatedString(...)` — trait `TransTrait` (linea 111)

```php
function getTranslatedString(string $key, array $replace = [], ?string $locale = null, bool $useFallback = true,)
```

**Parametri array:**
- `array $replace = []`

### `public static function transOLD(...)` — trait `TransTrait` (linea 151)

```php
function transOLD(string $key, array $replace = [], ?string $locale = null, bool $useFallback = true,)
```

**Parametri array:**
- `array $replace = []`

### `protected function transChoice(...)` — trait `TransTrait` (linea 183)

```php
function transChoice(string $key, int $number, array $replace = [])
```

**Parametri array:**
- `array $replace = []`

---

## `Modules/Xot/app/Filament/Widgets/XotBaseTableWidget.php`

Namespace: `Modules\Xot\Filament\Widgets`

### `public function updateFilters(...)` — class `XotBaseTableWidget` (linea 30)

```php
function updateFilters(array $filters)
```

**Parametri array:**
- `array $filters`

### `public function getTableRecordKey(...)` — class `XotBaseTableWidget` (linea 62)

```php
function getTableRecordKey(Model|array $record)
```

**Parametri array:**
- `Model|array $record`

---

## `Modules/Xot/app/Filament/Widgets/XotBaseWidget.php`

Namespace: `Modules\Xot\Filament\Widgets`

### `protected static function normalizeFormFill(...)` — class `XotBaseWidget` (linea 253)

```php
function normalizeFormFill(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Http/Controllers/XotBaseController.php`

Namespace: `Modules\Xot\Http\Controllers`

### `public function sendResponse(...)` — class `XotBaseController` (linea 28)

```php
function sendResponse(string $message, array $result)
```

**Parametri array:**
- `array $result`

### `public function sendError(...)` — class `XotBaseController` (linea 44)

```php
function sendError(string $error, array $errorMessages = [], int $code = 404)
```

**Parametri array:**
- `array $errorMessages = []`

---

## `Modules/Xot/app/Http/Middleware/FilamentMemoryMonitorMiddleware.php`

Namespace: `Modules\Xot\Http\Middleware`

### `private function logMemoryUsage(...)` — class `FilamentMemoryMonitorMiddleware` (linea 118)

```php
function logMemoryUsage(Request $request, array $metrics)
```

**Parametri array:**
- `array $metrics`

### `private function determineLogLevel(...)` — class `FilamentMemoryMonitorMiddleware` (linea 152)

```php
function determineLogLevel(array $metrics)
```

**Parametri array:**
- `array $metrics`

---

## `Modules/Xot/app/Http/Middleware/SecurityMiddleware.php`

Namespace: `Modules\Xot\Http\Middleware`

### `private function validateArrayInput(...)` — class `SecurityMiddleware` (linea 393)

```php
function validateArrayInput(string $key, array $value)
```

**Parametri array:**
- `array $value`

### `private function getArrayDepth(...)` — class `SecurityMiddleware` (linea 419)

```php
function getArrayDepth(array $array)
```

**Parametri array:**
- `array $array`

---

## `Modules/Xot/app/Mail/RecordMail.php`

Namespace: `Modules\Xot\Mail`

### `public function __construct(...)` — class `RecordMail` (linea 31)

```php
function __construct(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/Models/Traits/HasExtraTrait.php`

Namespace: `Modules\Xot\Models\Traits`

### `public function setExtra(...)` — trait `HasExtraTrait` (linea 91)

```php
function setExtra(string $name, int|float|string|array|bool|null $value)
```

**Parametri array:**
- `int|float|string|array|bool|null $value`

---

## `Modules/Xot/app/QueryBuilders/BaseQueryBuilder.php`

Namespace: `Modules\Xot\QueryBuilders`

### `public function whereIn(...)` — class `BaseQueryBuilder` (linea 103)

```php
function whereIn(string $column, array $values)
```

**Parametri array:**
- `array $values`

### `public function whereNotIn(...)` — class `BaseQueryBuilder` (linea 115)

```php
function whereNotIn(string $column, array $values)
```

**Parametri array:**
- `array $values`

### `public function whereBetween(...)` — class `BaseQueryBuilder` (linea 147)

```php
function whereBetween(string $column, array $values)
```

**Parametri array:**
- `array $values`

### `public function with(...)` — class `BaseQueryBuilder` (linea 201)

```php
function with(array $relations)
```

**Parametri array:**
- `array $relations`

---

## `Modules/Xot/app/Relations/CustomRelation.php`

Namespace: `Modules\Xot\Relations`

### `public function addEagerConstraints(...)` — class `CustomRelation` (linea 69)

```php
function addEagerConstraints(array $models)
```

**Parametri array:**
- `array $models`

### `public function initRelation(...)` — class `CustomRelation` (linea 87)

```php
function initRelation(array $models, mixed $relation)
```

**Parametri array:**
- `array $models`

---

## `Modules/Xot/app/Services/RouteService.php`

Namespace: `Modules\Xot\Services`

### `public static function inAdmin(...)` — class `RouteService` (linea 29)

```php
function inAdmin(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `public static function urlAct(...)` — class `RouteService` (linea 54)

```php
function urlAct(array $params)
```

**Parametri array:**
- `array $params`

### `public static function getRoutenameN(...)` — class `RouteService` (linea 107)

```php
function getRoutenameN(array $params)
```

**Parametri array:**
- `array $params`

### `public static function urlLang(...)` — class `RouteService` (linea 209)

```php
function urlLang(array $params = [])
```

**Parametri array:**
- `array $params = []`

---

## `Modules/Xot/app/States/Transitions/XotBaseTransition.php`

Namespace: `Modules\Xot\States\Transitions`

### `public function sendRecipientNotification(...)` — class `XotBaseTransition` (linea 93)

```php
function sendRecipientNotification(RecordNotificationData $recipient, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/States/XotBaseState.php`

Namespace: `Modules\Xot\States`

### `public function modalFillForm(...)` — class `XotBaseState` (linea 96)

```php
function modalFillForm(array $arguments, array $data)
```

**Parametri array:**
- `array $arguments`
- `array $data`

### `public function modalAction(...)` — class `XotBaseState` (linea 117)

```php
function modalAction(array $arguments, array $data)
```

**Parametri array:**
- `array $arguments`
- `array $data`

### `public function processStateAction(...)` — class `XotBaseState` (linea 128)

```php
function processStateAction(array $arguments, array $data)
```

**Parametri array:**
- `array $arguments`
- `array $data`

### `public function modalActionByRecord(...)` — class `XotBaseState` (linea 148)

```php
function modalActionByRecord(Model $record, array $data)
```

**Parametri array:**
- `array $data`

### `public function processStateActionByRecord(...)` — class `XotBaseState` (linea 158)

```php
function processStateActionByRecord(Model $record, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/app/View/Composers/XotComposer.php`

Namespace: `Modules\Xot\View\Composers`

### `public function __call(...)` — class `XotComposer` (linea 31)

```php
function __call(string $name, array $arguments)
```

**Parametri array:**
- `array $arguments`

---

## `Modules/Xot/docs/root-uppercase-folders/services/array-service.php`

Namespace: `Modules\Xot\Actions`

### `public static function diff_assoc_recursive(...)` — class `ArrayAction` (linea 34)

```php
function diff_assoc_recursive(array $array1, array $array2)
```

**Parametri array:**
- `array $array1`
- `array $array2`

---

## `Modules/Xot/helpers/Helper.php`

### `function in_admin(...)` — _(funzione globale / closure con nome)_ (linea 60)

```php
function in_admin(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `function inAdmin(...)` — _(funzione globale / closure con nome)_ (linea 68)

```php
function inAdmin(array $params = [])
```

**Parametri array:**
- `array $params = []`

### `function params2ContainerItem(...)` — _(funzione globale / closure con nome)_ (linea 90)

```php
function params2ContainerItem(?array $params = null)
```

**Parametri array:**
- `?array $params = null`

### `function trans_string(...)` — _(funzione globale / closure con nome)_ (linea 145)

```php
function trans_string(string $key, array $replace = [], ?string $locale = null)
```

**Parametri array:**
- `array $replace = []`

### `function get(...)` — _(funzione globale / closure con nome)_ (linea 195)

```php
function get(string $uri = '', array $options = [])
```

**Parametri array:**
- `array $options = []`

### `function post(...)` — _(funzione globale / closure con nome)_ (linea 207)

```php
function post(string $uri, mixed $data = [], array $options = [])
```

**Parametri array:**
- `array $options = []`

---

## `Modules/Xot/tests/Feature/Filament/XotBaseResourceCoverageTest.php`

### `public function execute(...)` — class `anonymous` (linea 174)

```php
function execute(array $attachments, string $disk)
```

**Parametri array:**
- `array $attachments`

---

## `Modules/Xot/tests/Fixtures/Models/SchemalessTestModel.php`

Namespace: `Modules\Xot\Tests\Fixtures\Models`

### `public function save(...)` — class `SchemalessTestModel` (linea 18)

```php
function save(array $options = [])
```

**Parametri array:**
- `array $options = []`

---

## `Modules/Xot/tests/PestStubs.php`

Namespace: `Pest\Laravel`

### `function get(...)` — _(funzione globale / closure con nome)_ (linea 40)

```php
function get(string|array $uri = '', array $options = [])
```

**Parametri array:**
- `string|array $uri = ''`
- `array $options = []`

### `function post(...)` — _(funzione globale / closure con nome)_ (linea 54)

```php
function post(string|array $uri, array $data = [], array $options = [])
```

**Parametri array:**
- `string|array $uri`
- `array $data = []`
- `array $options = []`

### `function put(...)` — _(funzione globale / closure con nome)_ (linea 67)

```php
function put(string|array $uri, array $data = [])
```

**Parametri array:**
- `string|array $uri`
- `array $data = []`

### `function patch(...)` — _(funzione globale / closure con nome)_ (linea 80)

```php
function patch(string|array $uri, array $data = [])
```

**Parametri array:**
- `string|array $uri`
- `array $data = []`

### `function delete(...)` — _(funzione globale / closure con nome)_ (linea 92)

```php
function delete(string|array $uri)
```

**Parametri array:**
- `string|array $uri`

### `function head(...)` — _(funzione globale / closure con nome)_ (linea 104)

```php
function head(string|array $uri)
```

**Parametri array:**
- `string|array $uri`

### `function options(...)` — _(funzione globale / closure con nome)_ (linea 116)

```php
function options(string|array $uri)
```

**Parametri array:**
- `string|array $uri`

### `function getJson(...)` — _(funzione globale / closure con nome)_ (linea 129)

```php
function getJson(string|array $uri, array $headers = [])
```

**Parametri array:**
- `string|array $uri`
- `array $headers = []`

### `function postJson(...)` — _(funzione globale / closure con nome)_ (linea 143)

```php
function postJson(string|array $uri, array $data = [], array $headers = [])
```

**Parametri array:**
- `string|array $uri`
- `array $data = []`
- `array $headers = []`

### `function putJson(...)` — _(funzione globale / closure con nome)_ (linea 157)

```php
function putJson(string|array $uri, array $data = [], array $headers = [])
```

**Parametri array:**
- `string|array $uri`
- `array $data = []`
- `array $headers = []`

### `function patchJson(...)` — _(funzione globale / closure con nome)_ (linea 171)

```php
function patchJson(string|array $uri, array $data = [], array $headers = [])
```

**Parametri array:**
- `string|array $uri`
- `array $data = []`
- `array $headers = []`

### `function deleteJson(...)` — _(funzione globale / closure con nome)_ (linea 185)

```php
function deleteJson(string|array $uri, array $data = [], array $headers = [])
```

**Parametri array:**
- `string|array $uri`
- `array $data = []`
- `array $headers = []`

---

## `Modules/Xot/tests/Support/PestAssert.php`

Namespace: `Modules\Xot\Tests\Support`

### `private static function assertThrownExceptionMatches(...)` — class `PestAssert` (linea 329)

```php
function assertThrownExceptionMatches(\Throwable $exception, array $constraints)
```

**Parametri array:**
- `array $constraints`

---

## `Modules/Xot/tests/Support/PestExpectation.php`

Namespace: `Modules\Xot\Tests\Support`

### `public function toMatchArray(...)` — class `PestExpectation` (linea 252)

```php
function toMatchArray(array $expectedSubset)
```

**Parametri array:**
- `array $expectedSubset`

---

## `Modules/Xot/tests/Support/PestTestCall.php`

Namespace: `Modules\Xot\Tests\Support`

### `private function forward(...)` — class `PestTestCall` (linea 70)

```php
function forward(string $method, array $arguments)
```

**Parametri array:**
- `array $arguments`

---

## `Modules/Xot/tests/Unit/HasExtraTraitTest.php`

Namespace: `Modules\Xot\Tests\Unit`

### `function makeExtraWithValues(...)` — class `makeExtraWithValues` (linea 24)

```php
function makeExtraWithValues(array $values)
```

**Parametri array:**
- `array $values`

---

## `Modules/Xot/tests/Unit/SendMailByRecordActionTest.php`

Namespace: `Modules\Xot\Tests\Unit`

### `public function create(...)` — class `anonymous` (linea 24)

```php
function create(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/tests/Unit/XotBaseTransitionTest.php`

### `public function sendRecipientNotification(...)` — class `anonymous` (linea 50)

```php
function sendRecipientNotification(RecordNotificationData $recipient, array $data)
```

**Parametri array:**
- `array $data`

### `public function sendRecipientNotification(...)` — class `anonymous` (linea 99)

```php
function sendRecipientNotification(RecordNotificationData $recipient, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Xot/tests/XotBaseTestCase.php`

Namespace: `Modules\Xot\Tests`

### `public function assertDatabaseHasRow(...)` — class `XotBaseTestCase` (linea 86)

```php
function assertDatabaseHasRow(string $table, array $data, ?string $connection = null)
```

**Parametri array:**
- `array $data`

### `public function assertDatabaseMissingRow(...)` — class `XotBaseTestCase` (linea 94)

```php
function assertDatabaseMissingRow(string $table, array $data, ?string $connection = null)
```

**Parametri array:**
- `array $data`

### `protected static function createTestUser(...)` — class `XotBaseTestCase` (linea 211)

```php
function createTestUser(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `protected static function createTestTenant(...)` — class `XotBaseTestCase` (linea 224)

```php
function createTestTenant(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `protected static function createTestModule(...)` — class `XotBaseTestCase` (linea 235)

```php
function createTestModule(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

