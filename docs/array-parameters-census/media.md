# Modulo Media — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **25**

---

## `Modules/Media/app/Actions/Diagnostic/S3/FormatDebugOutputAction.php`

Namespace: `Modules\Media\Actions\Diagnostic\S3`

### `public function execute(...)` — class `FormatDebugOutputAction` (linea 18)

```php
function execute(array $debugResults, string $emptyMessage)
```

**Parametri array:**
- `array $debugResults`

### `private function formatDataLines(...)` — class `FormatDebugOutputAction` (linea 65)

```php
function formatDataLines(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Media/app/Actions/Diagnostic/S3/TestFileUploadDownloadAction.php`

Namespace: `Modules\Media\Actions\Diagnostic\S3`

### `private function errorResult(...)` — class `TestFileUploadDownloadAction` (linea 75)

```php
function errorResult(string $message, array $details)
```

**Parametri array:**
- `array $details`

---

## `Modules/Media/app/Actions/GetAttachmentsSchemaAction.php`

Namespace: `Modules\Media\Actions`

### `public function execute(...)` — class `GetAttachmentsSchemaAction` (linea 19)

```php
function execute(array $attachments, string $disk = 'attachments')
```

**Parametri array:**
- `array $attachments`

---

## `Modules/Media/app/Actions/Image/Merge.php`

Namespace: `Modules\Media\Actions\Image`

### `public function execute(...)` — class `Merge` (linea 55)

```php
function execute(array $filenames, string $outputFilename)
```

**Parametri array:**
- `array $filenames`

---

## `Modules/Media/app/Actions/S3/UploadFileAction.php`

Namespace: `Modules\Media\Actions\S3`

### `public function execute(...)` — class `UploadFileAction` (linea 23)

```php
function execute(string $localFilePath, string $destinationFilePath, array $options = [])
```

**Parametri array:**
- `array $options = []`

---

## `Modules/Media/app/Actions/SaveAttachmentsAction.php`

Namespace: `Modules\Media\Actions`

### `public function execute(...)` — class `SaveAttachmentsAction` (linea 24)

```php
function execute(HasMedia $record, array $attachments, array $data, string $disk = 'attachments')
```

**Parametri array:**
- `array $attachments`
- `array $data`

---

## `Modules/Media/app/Datas/SaveAttachmentsData.php`

Namespace: `Modules\Media\Datas`

### `public static function fromNamesAndPaths(...)` — class `SaveAttachmentsData` (linea 29)

```php
function fromNamesAndPaths(array $names, array $paths, string $disk = 'attachments')
```

**Parametri array:**
- `array $names`
- `array $paths`

---

## `Modules/Media/app/Filament/Actions/AddAttachmentAction.php`

Namespace: `Modules\Media\Filament\Actions`

### `public static function formHandlerCallback(...)` — class `AddAttachmentAction` (linea 70)

```php
function formHandlerCallback(RelationManager $livewire, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Media/app/Filament/Infolists/VideoEntry.php`

Namespace: `Modules\Media\Filament\Infolists`

### `public function extraImgAttributes(...)` — class `VideoEntry` (linea 262)

```php
function extraImgAttributes(array|Closure $attributes)
```

**Parametri array:**
- `array|Closure $attributes`

---

## `Modules/Media/app/Filament/Resources/HasMediaResource/Actions/AddAttachmentAction.php`

Namespace: `Modules\Media\Filament\Resources\HasMediaResource\Actions`

### `public static function formHandlerCallback(...)` — class `AddAttachmentAction` (linea 88)

```php
function formHandlerCallback(RelationManager $livewire, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Media/app/Http/Livewire/Card/Video/Clip.php`

Namespace: `Modules\Media\Http\Livewire\Card\Video`

### `public function updateDataFromModal(...)` — class `Clip` (linea 67)

```php
function updateDataFromModal(string $id, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Media/app/Models/Media.php`

Namespace: `Modules\Media\Models`

### `public static function findWithTemporaryUploadInCurrentSession(...)` — class `Media` (linea 136)

```php
function findWithTemporaryUploadInCurrentSession(array $uuids)
```

**Parametri array:**
- `array $uuids`

---

## `Modules/Media/app/Rules/FileExtensionRule.php`

Namespace: `Modules\Media\Rules`

### `function in_array(...)` — _(funzione globale / closure con nome)_ (linea 10)

```php
function in_array(array $validExtensions = [])
```

**Parametri array:**
- `array $validExtensions = []`

### `public function __construct(...)` — class `FileExtensionRule` (linea 20)

```php
function __construct(array $validExtensions = [])
```

**Parametri array:**
- `array $validExtensions = []`

---

## `Modules/Media/tests/Pest.php`

### `function assertMediaTableHas(...)` — _(funzione globale / closure con nome)_ (linea 21)

```php
function assertMediaTableHas(string $table, array $where, string $connection = 'media')
```

**Parametri array:**
- `array $where`

### `function assertMediaTableMissing(...)` — _(funzione globale / closure con nome)_ (linea 35)

```php
function assertMediaTableMissing(string $table, array $where, string $connection = 'media')
```

**Parametri array:**
- `array $where`

### `function assertMediaListContains(...)` — _(funzione globale / closure con nome)_ (linea 72)

```php
function assertMediaListContains(string $needle, array $haystack)
```

**Parametri array:**
- `array $haystack`

### `function createMedia(...)` — _(funzione globale / closure con nome)_ (linea 80)

```php
function createMedia(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeMedia(...)` — _(funzione globale / closure con nome)_ (linea 88)

```php
function makeMedia(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function mediaPayloadSet(...)` — _(funzione globale / closure con nome)_ (linea 113)

```php
function mediaPayloadSet(array $payload, array $columns, string $column, mixed $value)
```

**Parametri array:**
- `array $payload`
- `array $columns`

---

## `Modules/Media/tests/Support/HasMediaTestStub.php`

Namespace: `Modules\Media\Tests\Support`

### `public function update(...)` — class `HasMediaTestStub` (linea 25)

```php
function update(array $attributes = [], array $options = [])
```

**Parametri array:**
- `array $attributes = []`
- `array $options = []`

### `public function getMedia(...)` — class `HasMediaTestStub` (linea 57)

```php
function getMedia(string $collectionName = 'default', callable|array $filters = [])
```

**Parametri array:**
- `callable|array $filters = []`

### `public function clearMediaCollectionExcept(...)` — class `HasMediaTestStub` (linea 70)

```php
function clearMediaCollectionExcept(string $collectionName = 'default', Collection|array $excludedMedia = [])
```

**Parametri array:**
- `Collection|array $excludedMedia = []`

---

## `Modules/Media/tests/TestCase.php`

Namespace: `Modules\Media\Tests`

### `public function assertMediaTableHas(...)` — class `TestCase` (linea 30)

```php
function assertMediaTableHas(string $table, array $where, string $connection = 'media')
```

**Parametri array:**
- `array $where`

