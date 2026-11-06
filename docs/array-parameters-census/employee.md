# Modulo Employee — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **23**

---

## `Modules/Employee/app/Actions/BuildTimelineVisualizationAction.php`

Namespace: `Modules\Employee\Actions`

### `private function finalizeSessionBlock(...)` — class `BuildTimelineVisualizationAction` (linea 179)

```php
function finalizeSessionBlock(array $session)
```

**Parametri array:**
- `array $session`

### `private function determineSessionColor(...)` — class `BuildTimelineVisualizationAction` (linea 215)

```php
function determineSessionColor(array $session)
```

**Parametri array:**
- `array $session`

### `private function buildDayStatus(...)` — class `BuildTimelineVisualizationAction` (linea 244)

```php
function buildDayStatus(array $sessionBlocks, Carbon $weekStart, Carbon $weekEnd)
```

**Parametri array:**
- `array $sessionBlocks`

### `private function determineDayStatus(...)` — class `BuildTimelineVisualizationAction` (linea 276)

```php
function determineDayStatus(array $blocks, Carbon $date)
```

**Parametri array:**
- `array $blocks`

### `private function detectProblems(...)` — class `BuildTimelineVisualizationAction` (linea 335)

```php
function detectProblems(array $blocks, Carbon $date)
```

**Parametri array:**
- `array $blocks`

---

## `Modules/Employee/app/Actions/BuildWeeklyTimeTableAction.php`

Namespace: `Modules\Employee\Actions`

### `private function calculateDayHours(...)` — class `BuildWeeklyTimeTableAction` (linea 197)

```php
function calculateDayHours(array $sessions)
```

**Parametri array:**
- `array $sessions`

### `private function determineDayStatus(...)` — class `BuildWeeklyTimeTableAction` (linea 224)

```php
function determineDayStatus(array $sessions, float $workedHours, float $contractHours)
```

**Parametri array:**
- `array $sessions`

---

## `Modules/Employee/app/Actions/ExportTimeDataAction.php`

Namespace: `Modules\Employee\Actions`

### `private function exportToExcel(...)` — class `ExportTimeDataAction` (linea 95)

```php
function exportToExcel(array $data, int $userId, Carbon $startDate, Carbon $endDate)
```

**Parametri array:**
- `array $data`

### `private function exportToCsv(...)` — class `ExportTimeDataAction` (linea 113)

```php
function exportToCsv(array $data, int $userId, Carbon $startDate, Carbon $endDate)
```

**Parametri array:**
- `array $data`

### `private function exportToPdf(...)` — class `ExportTimeDataAction` (linea 128)

```php
function exportToPdf(array $data, int $userId, Carbon $startDate, Carbon $endDate)
```

**Parametri array:**
- `array $data`

### `private function buildCsvData(...)` — class `ExportTimeDataAction` (linea 145)

```php
function buildCsvData(array $data)
```

**Parametri array:**
- `array $data`

### `private function buildPdfContent(...)` — class `ExportTimeDataAction` (linea 206)

```php
function buildPdfContent(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Employee/app/Filament/Resources/WorkHourResource/Pages/CreateWorkHour.php`

Namespace: `Modules\Employee\Filament\Resources\WorkHourResource\Pages`

### `protected function mutateFormDataBeforeCreate(...)` — class `CreateWorkHour` (linea 24)

```php
function mutateFormDataBeforeCreate(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Employee/app/Filament/Widgets/TeamPresenceWidget.php`

Namespace: `Modules\Employee\Filament\Widgets`

### `private function renderStatsDisplay(...)` — class `TeamPresenceWidget` (linea 154)

```php
function renderStatsDisplay(array $presenceData)
```

**Parametri array:**
- `array $presenceData`

### `private function renderPresenceList(...)` — class `TeamPresenceWidget` (linea 178)

```php
function renderPresenceList(array $presenceData)
```

**Parametri array:**
- `array $presenceData`

---

## `Modules/Employee/app/Filament/Widgets/WorkHoursBoardWidget.php`

Namespace: `Modules\Employee\Filament\Widgets`

### `private function buildWeekTableData(...)` — class `WorkHoursBoardWidget` (linea 121)

```php
function buildWeekTableData(array $baseData, array $timelineData)
```

**Parametri array:**
- `array $baseData`
- `array $timelineData`

### `private function buildSummaryData(...)` — class `WorkHoursBoardWidget` (linea 177)

```php
function buildSummaryData(array $baseData)
```

**Parametri array:**
- `array $baseData`

---

## `Modules/Employee/database/factories/EmployeeFactory.php`

Namespace: `Modules\Employee\Database\Factories`

### `public function withPersonalData(...)` — class `EmployeeFactory` (linea 111)

```php
function withPersonalData(array $personalData)
```

**Parametri array:**
- `array $personalData`

### `public function withContactData(...)` — class `EmployeeFactory` (linea 126)

```php
function withContactData(array $contactData)
```

**Parametri array:**
- `array $contactData`

---

## `Modules/Employee/tests/Pest.php`

### `function createEmployee(...)` — _(funzione globale / closure con nome)_ (linea 16)

```php
function createEmployee(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeEmployee(...)` — _(funzione globale / closure con nome)_ (linea 24)

```php
function makeEmployee(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createWorkHour(...)` — _(funzione globale / closure con nome)_ (linea 32)

```php
function createWorkHour(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeWorkHour(...)` — _(funzione globale / closure con nome)_ (linea 40)

```php
function makeWorkHour(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

