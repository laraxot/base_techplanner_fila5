# Modulo UI — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **24**

---

## `Modules/UI/app/Actions/Block/ResolveLocalizedBlockDataAction.php`

Namespace: `Modules\UI\Actions\Block`

### `public function execute(...)` — class `ResolveLocalizedBlockDataAction` (linea 21)

```php
function execute(array $viewParams)
```

**Parametri array:**
- `array $viewParams`

---

## `Modules/UI/app/Enums/TableLayoutEnum.php`

Namespace: `Modules\UI\Enums`

### `public function getTableColumns(...)` — enum `TableLayoutEnum` (linea 96)

```php
function getTableColumns(array $listColumns, array $gridColumns)
```

**Parametri array:**
- `array $listColumns`
- `array $gridColumns`

---

## `Modules/UI/app/Filament/Components/SpatieDocumentUpload.php`

Namespace: `Modules\UI\Filament\Components`

### `public static function custom(...)` — class `SpatieDocumentUpload` (linea 102)

```php
function custom(string $name, string $collection, array $mimeTypes = ['image/jpeg', 'image/png', 'application/pdf'], int $maxSize = 10240,)
```

**Parametri array:**
- `array $mimeTypes = ['image/jpeg', 'image/png', 'application/pdf']`

---

## `Modules/UI/app/Filament/Forms/Components/InlineDatePicker.php`

Namespace: `Modules\UI\Filament\Forms\Components`

### `public function enabledDates(...)` — class `InlineDatePicker` (linea 105)

```php
function enabledDates(array|\Closure $dates)
```

**Parametri array:**
- `array|\Closure $dates`

---

## `Modules/UI/app/Filament/Forms/Components/SelectState.php`

Namespace: `Modules\UI\Filament\Forms\Components`

### `private function combineStateOptions(...)` — class `SelectState` (linea 62)

```php
function combineStateOptions(array $states)
```

**Parametri array:**
- `array $states`

---

## `Modules/UI/app/Filament/Tables/Columns/GroupColumn.php`

Namespace: `Modules\UI\Filament\Tables\Columns`

### `public function schema(...)` — class `GroupColumn` (linea 43)

```php
function schema(array $form)
```

**Parametri array:**
- `array $form`

---

## `Modules/UI/app/Filament/Tables/Columns/IconStateSplitColumn.php`

Namespace: `Modules\UI\Filament\Tables\Columns`

### `private function getTransitionAction(...)` — class `IconStateSplitColumn` (linea 226)

```php
function getTransitionAction(string $stateKey, array $stateData)
```

**Parametri array:**
- `array $stateData`

---

## `Modules/UI/app/Filament/Tables/Columns/SelectStateColumn.php`

Namespace: `Modules\UI\Filament\Tables\Columns`

### `private function combineStateOptions(...)` — class `SelectStateColumn` (linea 107)

```php
function combineStateOptions(array $states)
```

**Parametri array:**
- `array $states`

---

## `Modules/UI/app/Filament/Widgets/UserCalendarWidget.php`

Namespace: `Modules\UI\Filament\Widgets`

### `public function fetchEvents(...)` — class `UserCalendarWidget` (linea 40)

```php
function fetchEvents(array $fetchInfo)
```

**Parametri array:**
- `array $fetchInfo`

### `public function onDateSelect(...)` — class `UserCalendarWidget` (linea 88)

```php
function onDateSelect(string $start, ?string $end, bool $allDay, ?array $view, ?array $resource)
```

**Parametri array:**
- `?array $view`
- `?array $resource`

---

## `Modules/UI/app/Forms/Components/RadioCardSelector.php`

Namespace: `Modules\UI\Forms\Components`

### `public function cards(...)` — class `RadioCardSelector` (linea 39)

```php
function cards(array|\Closure $cards)
```

**Parametri array:**
- `array|\Closure $cards`

### `private static function normalizeCardRow(...)` — class `RadioCardSelector` (linea 125)

```php
function normalizeCardRow(array $item)
```

**Parametri array:**
- `array $item`

---

## `Modules/UI/app/Rules/OpeningHoursRule.php`

Namespace: `Modules\UI\Rules`

### `private function validateDayLogic(...)` — class `OpeningHoursRule` (linea 67)

```php
function validateDayLogic(array $dayHours, string $dayLabel, \Closure $fail)
```

**Parametri array:**
- `array $dayHours`

### `private function validateSession(...)` — class `OpeningHoursRule` (linea 86)

```php
function validateSession(array $dayHours, string $session, string $dayLabel, \Closure $fail)
```

**Parametri array:**
- `array $dayHours`

---

## `Modules/UI/tests/Feature/CategoryTabsComponentTest.php`

Namespace: `Modules\UI\Tests\Feature`

### `function renderCategoryTabsHtml(...)` — class `renderCategoryTabsHtml` (linea 16)

```php
function renderCategoryTabsHtml(array $data = [])
```

**Parametri array:**
- `array $data = []`

### `function requireCategoryTabsHtml(...)` — _(funzione globale / closure con nome)_ (linea 32)

```php
function requireCategoryTabsHtml(array $data = [])
```

**Parametri array:**
- `array $data = []`

---

## `Modules/UI/tests/Feature/InlineDatePickerTest.php`

Namespace: `Modules\UI\Tests\Feature`

### `function invokeInlineDatePickerMethod(...)` — _(funzione globale / closure con nome)_ (linea 174)

```php
function invokeInlineDatePickerMethod(object $object, string $methodName, array $parameters = [])
```

**Parametri array:**
- `array $parameters = []`

---

## `Modules/UI/tests/Pest.php`

### `function createCategory(...)` — _(funzione globale / closure con nome)_ (linea 19)

```php
function createCategory(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeCategory(...)` — _(funzione globale / closure con nome)_ (linea 27)

```php
function makeCategory(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createCollection(...)` — _(funzione globale / closure con nome)_ (linea 35)

```php
function createCollection(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeCollection(...)` — _(funzione globale / closure con nome)_ (linea 43)

```php
function makeCollection(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/UI/tests/Unit/Widgets/Fixtures/BaseCalendarWidgetStub.php`

Namespace: `Modules\UI\Tests\Unit\Widgets\Fixtures`

### `abstract public function fetchEvents(...)` — class `BaseCalendarWidgetStub` (linea 20)

```php
function fetchEvents(array $fetchInfo)
```

**Parametri array:**
- `array $fetchInfo`

---

## `Modules/UI/tests/Unit/Widgets/Fixtures/MockCalendarWidget.php`

Namespace: `Modules\UI\Tests\Unit\Widgets\Fixtures`

### `public function fetchEvents(...)` — class `fetchEvents` (linea 20)

```php
function fetchEvents(array $fetchInfo)
```

**Parametri array:**
- `array $fetchInfo`

---

## `Modules/UI/tests/Unit/Widgets/MockCalendarWidget.php`

Namespace: `Modules\UI\Tests\Unit\Widgets`

### `public function fetchEvents(...)` — class `fetchEvents` (linea 24)

```php
function fetchEvents(array $fetchInfo)
```

**Parametri array:**
- `array $fetchInfo`

