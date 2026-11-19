---
title: "PHPStan Corrections - Gennaio 2025"
qmd: "ui phpstan corrections md"
type: note
tags: [documentation]
created: 2025
---

# PHPStan Corrections - Gennaio 2025

## Riepilogo

Correzioni sistematiche degli errori PHPStan livello 10 per migliorare la qualità del codice e la conformità architetturale.

## Correzioni Implementate

### 1. Componenti View - Proprietà Mancanti

#### Problema
I componenti View accedevano a proprietà non dichiarate nel costruttore, causando errori PHPStan `property.notFound`.

#### Soluzione
Aggiunte proprietà pubbliche nel costruttore per tutti i componenti View:

- **`Render/Blocks`**: Già corretto con proprietà `$view`, `$blocks`, `$model`
- **`Render/Block`**: Aggiunta proprietà `$block` nel costruttore
- **`Std`**: Aggiunta proprietà `$tpl` nel costruttore
- **`Page/WithSidebar`**: Aggiunta proprietà `$tpl` nel costruttore
- **`Svg`**: Aggiunta proprietà `$tpl` nel costruttore e corretto return type `View`
- **`Logo`**: Aggiunta proprietà `$tpl` nel costruttore e corretto return type `View`
- **`Sidebar`**: Implementato metodo `render()` mancante

### 2. Widget Filament - Proprietà e Return Types

#### Problema
Widget accedevano a proprietà non dichiarate o avevano return types non corretti.

#### Soluzione

- **`HeroWidget`**: Aggiunte proprietà pubbliche `$title` e `$icon`
- **`RedirectWidget`**: Corretto accesso da `$this->to` a `$this->url`
- **`TestChartWidget`**: Rimosso `?string` dal return type di `getDescription()` (non restituisce mai null)

### 3. Form Components - Type Annotations

#### Problema
Proprietà `$view` non riconosciute come `view-string` da PHPStan.

#### Soluzione
Aggiunto PHPDoc `@var view-string` per:

- **`PasswordStrengthField`**: Aggiunto `@var view-string` per `$view`
- **`TreeField`**: Aggiunto `@var view-string` per `$view`
- **`SingleRoleSelect`**: Aggiunto `@var view-string` per `$view`

### 4. Resources Pages - Estensioni XotBase

#### Problema
Pagine Resource estendevano direttamente classi Filament invece di XotBase.

#### Soluzione

- **`ViewLocation` (Geo)**: 
  - Cambiato da `ViewRecord` a `XotBaseViewRecord`
  - Implementato metodo `getInfolistSchema()` richiesto
- **`EditUser` (User)**: 
  - Cambiato da `EditRecord` a `XotBaseEditRecord`
  - Aggiunto import corretto
- **`CreateQuestionChart` (<nome progetto>)**: 
  - Cambiato da `CreateRecord` a `XotBaseCreateRecord`
- **`EditQuestionChart` (<nome progetto>)**:
- **`CreateQuestionChart` (Quaeris)**:
  - Cambiato da `CreateRecord` a `XotBaseCreateRecord`
- **`EditQuestionChart` (Quaeris)**:
  - Cambiato da `EditRecord` a `XotBaseEditRecord`
- **`ViewPageContent` (Cms)**: 
  - Cambiato da `ViewRecord` a `XotBaseViewRecord`
  - Implementato metodo `getInfolistSchema()` richiesto

### 5. Query Builder - Type Narrowing

#### Problema
Query dinamiche su modelli non riconosciute correttamente da PHPStan.

#### Soluzione

- **`LocationSelector`**: 
  - Aggiunti type assertions per query builder dinamiche
  - Aggiunto controllo `is_array()` prima di usare risultati query
  - Aggiunto PHPDoc `@var \Illuminate\Database\Eloquent\Builder` per query builder

### 6. Metodi Statici Privati

#### Problema
Chiamate a metodi privati con `static::` invece di `self::`.

#### Soluzione

- **`QuestionChartResource`**: 
  - Cambiato `static::` in `self::` per chiamate a metodi privati
  - Risolto errore `staticClassAccess.privateMethod`

### 7. Return Types Componenti View

#### Problema
Metodi `render()` con return types non specifici o errati.

#### Soluzione

- **`Simple` (Hero)**: Aggiunto return type `View`
- **`Svg`**: Cambiato da `Renderable` a `View` e aggiunto parametro `$tpl`
- **`Logo`**: Cambiato da `Renderable` a `View` e aggiunto parametro `$tpl`

## Pattern Applicati

### Type Narrowing per Query Dinamiche

```php
// ❌ ERRORE
$regions = $model::select('regione')
    ->distinct()
    ->orderBy('regione->nome')
    ->get()
    ->pluck('regione.nome', 'regione.codice')
    ->toArray();

// ✅ CORRETTO
/** @var class-string $model */
/** @var \Illuminate\Database\Eloquent\Builder $query */
$query = $model::select('regione')
    ->distinct()
    ->orderBy('regione->nome')
    ->get()
    ->pluck('regione.nome', 'regione.codice')
    ->toArray();

if (!is_array($query)) {
    return [];
}

/** @var array<string, string> $regions */
$regions = $query;
```

### Proprietà View Components

```php
// ❌ ERRORE - Proprietà non dichiarata
public function render(): Renderable
{
    $view = app(GetViewAction::class)->execute($this->tpl);
}

// ✅ CORRETTO - Proprietà dichiarata nel costruttore
public function __construct(
    public string $tpl = '',
) {}

public function render(): View
{
    $view = app(GetViewAction::class)->execute($this->tpl);
    return view($view);
}
```

### Estensioni XotBase

```php
// ❌ ERRORE - Estensione diretta Filament
class ViewLocation extends ViewRecord
{
    // ...
}

// ✅ CORRETTO - Estensione XotBase
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewLocation extends XotBaseViewRecord
{
    protected function getInfolistSchema(): array
    {
        return [
            Section::make('Informazioni')->schema([
                TextEntry::make('name'),
                // ...
            ]),
        ];
    }
}
```

## File Modificati

### Modulo Geo
- `app/Filament/Resources/LocationResource/Pages/ViewLocation.php`

### Modulo User
- `app/Filament/Resources/UserResource/Pages/EditUser.php`
- `app/Filament/Forms/Components/SingleRoleSelect.php`

### Modulo UI
- `app/View/Components/Sidebar.php`
- `app/View/Components/Render/Block.php`
- `app/View/Components/Render/Blocks.php`
- `app/View/Components/Std.php`
- `app/View/Components/Page/WithSidebar.php`
- `app/View/Components/Svg.php`
- `app/View/Components/Logo.php`
- `app/View/Components/Blocks/Hero/Simple.php`
- `app/Filament/Widgets/HeroWidget.php`
- `app/Filament/Widgets/RedirectWidget.php`
- `app/Filament/Widgets/TestChartWidget.php`
- `app/Filament/Forms/Components/PasswordStrengthField.php`
- `app/Filament/Forms/Components/TreeField.php`
- `app/Filament/Forms/Components/LocationSelector.php`

### Modulo <nome progetto>
### Modulo Quaeris
- `app/Filament/Resources/QuestionChartResource.php`
- `app/Filament/Resources/SurveyPdfResource/Resources/QuestionCharts/Pages/CreateQuestionChart.php`
- `app/Filament/Resources/SurveyPdfResource/Resources/QuestionCharts/Pages/EditQuestionChart.php`
- `app/Filament/Widgets/QuestionChartStatsOverviewWidget.php`

### Modulo Cms
- `app/Filament/Resources/PageContentResource/Pages/ViewPageContent.php`
- `app/Filament/Resources/PageContentResource/Pages/ListPageContents.php`

## Risultati

- ✅ Ridotti errori fatali da 4 a 0
- ✅ Corretti errori di proprietà mancanti nei componenti View
- ✅ Migliorato type safety per query dinamiche
- ✅ Conformità architetturale con XotBase classes
- ✅ Return types corretti per tutti i componenti View

## Note

- Tutte le correzioni rispettano le regole architetturali Laraxot
- Mantenuta compatibilità con Filament 4.x
- Type hints rigorosi per PHPStan livello 10
- Documentazione PHPDoc completa per type narrowing

## Riferimenti

- [Regole Architetturali Critiche](../../Xot/docs/critical-architecture-rules.md)
- [PHPStan Patterns](./phpstan-patterns.md)
- [PHPStan Compliance](./phpstan-compliance.md)

---

## Contenuto unito da `phpstan-corrections.md`

# PHPStan Corrections - Gennaio 2025

## Riepilogo

Correzioni sistematiche degli errori PHPStan livello 10 per migliorare la qualità del codice e la conformità architetturale.

## Correzioni Implementate

### 1. Componenti View - Proprietà Mancanti

#### Problema
I componenti View accedevano a proprietà non dichiarate nel costruttore, causando errori PHPStan `property.notFound`.

#### Soluzione
Aggiunte proprietà pubbliche nel costruttore per tutti i componenti View:

- **`Render/Blocks`**: Già corretto con proprietà `$view`, `$blocks`, `$model`
- **`Render/Block`**: Aggiunta proprietà `$block` nel costruttore
- **`Std`**: Aggiunta proprietà `$tpl` nel costruttore
- **`Page/WithSidebar`**: Aggiunta proprietà `$tpl` nel costruttore
- **`Svg`**: Aggiunta proprietà `$tpl` nel costruttore e corretto return type `View`
- **`Logo`**: Aggiunta proprietà `$tpl` nel costruttore e corretto return type `View`
- **`Sidebar`**: Implementato metodo `render()` mancante

### 2. Widget Filament - Proprietà e Return Types

#### Problema
Widget accedevano a proprietà non dichiarate o avevano return types non corretti.

#### Soluzione

- **`HeroWidget`**: Aggiunte proprietà pubbliche `$title` e `$icon`
- **`RedirectWidget`**: Corretto accesso da `$this->to` a `$this->url`
- **`TestChartWidget`**: Rimosso `?string` dal return type di `getDescription()` (non restituisce mai null)

### 3. Form Components - Type Annotations

#### Problema
Proprietà `$view` non riconosciute come `view-string` da PHPStan.

#### Soluzione
Aggiunto PHPDoc `@var view-string` per:

- **`PasswordStrengthField`**: Aggiunto `@var view-string` per `$view`
- **`TreeField`**: Aggiunto `@var view-string` per `$view`
- **`SingleRoleSelect`**: Aggiunto `@var view-string` per `$view`

### 4. Resources Pages - Estensioni XotBase

#### Problema
Pagine Resource estendevano direttamente classi Filament invece di XotBase.

#### Soluzione

- **`ViewLocation` (Geo)**:
  - Cambiato da `ViewRecord` a `XotBaseViewRecord`
  - Implementato metodo `getInfolistSchema()` richiesto
- **`EditUser` (User)**:
  - Cambiato da `EditRecord` a `XotBaseEditRecord`
  - Aggiunto import corretto
- **`CreateQuestionChart` (Quaeris)**:
  - Cambiato da `CreateRecord` a `XotBaseCreateRecord`
- **`EditQuestionChart` (Quaeris)**:
- **`CreateQuestionChart` (Quaeris)**:
  - Cambiato da `CreateRecord` a `XotBaseCreateRecord`
- **`EditQuestionChart` (Quaeris)**:
  - Cambiato da `EditRecord` a `XotBaseEditRecord`
- **`ViewPageContent` (Cms)**:
  - Cambiato da `ViewRecord` a `XotBaseViewRecord`
  - Implementato metodo `getInfolistSchema()` richiesto

### 5. Query Builder - Type Narrowing

#### Problema
Query dinamiche su modelli non riconosciute correttamente da PHPStan.

#### Soluzione

- **`LocationSelector`**:
  - Aggiunti type assertions per query builder dinamiche
  - Aggiunto controllo `is_array()` prima di usare risultati query
  - Aggiunto PHPDoc `@var \Illuminate\Database\Eloquent\Builder` per query builder

### 6. Metodi Statici Privati

#### Problema
Chiamate a metodi privati con `static::` invece di `self::`.

#### Soluzione

- **`QuestionChartResource`**:
  - Cambiato `static::` in `self::` per chiamate a metodi privati
  - Risolto errore `staticClassAccess.privateMethod`

### 7. Return Types Componenti View

#### Problema
Metodi `render()` con return types non specifici o errati.

#### Soluzione

- **`Simple` (Hero)**: Aggiunto return type `View`
- **`Svg`**: Cambiato da `Renderable` a `View` e aggiunto parametro `$tpl`
- **`Logo`**: Cambiato da `Renderable` a `View` e aggiunto parametro `$tpl`

## Pattern Applicati

### Type Narrowing per Query Dinamiche

```php
// ❌ ERRORE
$regions = $model::select('regione')
    ->distinct()
    ->orderBy('regione->nome')
    ->get()
    ->pluck('regione.nome', 'regione.codice')
    ->toArray();

// ✅ CORRETTO
/** @var class-string $model */
/** @var \Illuminate\Database\Eloquent\Builder $query */
$query = $model::select('regione')
    ->distinct()
    ->orderBy('regione->nome')
    ->get()
    ->pluck('regione.nome', 'regione.codice')
    ->toArray();

if (!is_array($query)) {
    return [];
}

/** @var array<string, string> $regions */
$regions = $query;
```

### Proprietà View Components

```php
// ❌ ERRORE - Proprietà non dichiarata
public function render(): Renderable
{
    $view = app(GetViewAction::class)->execute($this->tpl);
}

// ✅ CORRETTO - Proprietà dichiarata nel costruttore
public function __construct(
    public string $tpl = '',
) {}

public function render(): View
{
    $view = app(GetViewAction::class)->execute($this->tpl);
    return view($view);
}
```

### Estensioni XotBase

```php
// ❌ ERRORE - Estensione diretta Filament
class ViewLocation extends ViewRecord
{
    // ...
}

// ✅ CORRETTO - Estensione XotBase
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewLocation extends XotBaseViewRecord
{
    protected function getInfolistSchema(): array
    {
        return [
            Section::make('Informazioni')->schema([
                TextEntry::make('name'),
                // ...
            ]),
        ];
    }
}
```

## File Modificati

### Modulo Geo
- `app/Filament/Resources/LocationResource/Pages/ViewLocation.php`

### Modulo User
- `app/Filament/Resources/UserResource/Pages/EditUser.php`
- `app/Filament/Forms/Components/SingleRoleSelect.php`

### Modulo UI
- `app/View/Components/Sidebar.php`
- `app/View/Components/Render/Block.php`
- `app/View/Components/Render/Blocks.php`
- `app/View/Components/Std.php`
- `app/View/Components/Page/WithSidebar.php`
- `app/View/Components/Svg.php`
- `app/View/Components/Logo.php`
- `app/View/Components/Blocks/Hero/Simple.php`
- `app/Filament/Widgets/HeroWidget.php`
- `app/Filament/Widgets/RedirectWidget.php`
- `app/Filament/Widgets/TestChartWidget.php`
- `app/Filament/Forms/Components/PasswordStrengthField.php`
- `app/Filament/Forms/Components/TreeField.php`
- `app/Filament/Forms/Components/LocationSelector.php`

### Modulo Quaeris
### Modulo Quaeris
- `app/Filament/Resources/QuestionChartResource.php`
- `app/Filament/Resources/SurveyPdfResource/Resources/QuestionCharts/Pages/CreateQuestionChart.php`
- `app/Filament/Resources/SurveyPdfResource/Resources/QuestionCharts/Pages/EditQuestionChart.php`
- `app/Filament/Widgets/QuestionChartStatsOverviewWidget.php`

### Modulo Cms
- `app/Filament/Resources/PageContentResource/Pages/ViewPageContent.php`
- `app/Filament/Resources/PageContentResource/Pages/ListPageContents.php`

## Risultati

- ✅ Ridotti errori fatali da 4 a 0
- ✅ Corretti errori di proprietà mancanti nei componenti View
- ✅ Migliorato type safety per query dinamiche
- ✅ Conformità architetturale con XotBase classes
- ✅ Return types corretti per tutti i componenti View

## Note

- Tutte le correzioni rispettano le regole architetturali Laraxot
- Mantenuta compatibilità con Filament 4.x
- Type hints rigorosi per PHPStan livello 10
- Documentazione PHPDoc completa per type narrowing

## Riferimenti

- [Regole Architetturali Critiche](../../Xot/docs/critical-architecture-rules.md)
- [PHPStan Patterns](./phpstan-patterns.md)
- [PHPStan Compliance](./phpstan-compliance.md)

---

## Contenuto unito da `phpstan-corrections.md`

# PHPStan Corrections - Gennaio 2025

## Riepilogo

Correzioni sistematiche degli errori PHPStan livello 10 per migliorare la qualità del codice e la conformità architetturale.

## Correzioni Implementate

### 1. Componenti View - Proprietà Mancanti

#### Problema
I componenti View accedevano a proprietà non dichiarate nel costruttore, causando errori PHPStan `property.notFound`.

#### Soluzione
Aggiunte proprietà pubbliche nel costruttore per tutti i componenti View:

- **`Render/Blocks`**: Già corretto con proprietà `$view`, `$blocks`, `$model`
- **`Render/Block`**: Aggiunta proprietà `$block` nel costruttore
- **`Std`**: Aggiunta proprietà `$tpl` nel costruttore
- **`Page/WithSidebar`**: Aggiunta proprietà `$tpl` nel costruttore
- **`Svg`**: Aggiunta proprietà `$tpl` nel costruttore e corretto return type `View`
- **`Logo`**: Aggiunta proprietà `$tpl` nel costruttore e corretto return type `View`
- **`Sidebar`**: Implementato metodo `render()` mancante

### 2. Widget Filament - Proprietà e Return Types

#### Problema
Widget accedevano a proprietà non dichiarate o avevano return types non corretti.

#### Soluzione

- **`HeroWidget`**: Aggiunte proprietà pubbliche `$title` e `$icon`
- **`RedirectWidget`**: Corretto accesso da `$this->to` a `$this->url`
- **`TestChartWidget`**: Rimosso `?string` dal return type di `getDescription()` (non restituisce mai null)

### 3. Form Components - Type Annotations

#### Problema
Proprietà `$view` non riconosciute come `view-string` da PHPStan.

#### Soluzione
Aggiunto PHPDoc `@var view-string` per:

- **`PasswordStrengthField`**: Aggiunto `@var view-string` per `$view`
- **`TreeField`**: Aggiunto `@var view-string` per `$view`
- **`SingleRoleSelect`**: Aggiunto `@var view-string` per `$view`

### 4. Resources Pages - Estensioni XotBase

#### Problema
Pagine Resource estendevano direttamente classi Filament invece di XotBase.

#### Soluzione

- **`ViewLocation` (Geo)**: 
  - Cambiato da `ViewRecord` a `XotBaseViewRecord`
  - Implementato metodo `getInfolistSchema()` richiesto
- **`EditUser` (User)**: 
  - Cambiato da `EditRecord` a `XotBaseEditRecord`
  - Aggiunto import corretto
- **`CreateQuestionChart` (<nome progetto>)**: 
  - Cambiato da `CreateRecord` a `XotBaseCreateRecord`
- **`EditQuestionChart` (<nome progetto>)**: 
- **`CreateQuestionChart` (Quaeris)**: 
  - Cambiato da `CreateRecord` a `XotBaseCreateRecord`
- **`EditQuestionChart` (Quaeris)**: 
  - Cambiato da `EditRecord` a `XotBaseEditRecord`
- **`ViewPageContent` (Cms)**: 
  - Cambiato da `ViewRecord` a `XotBaseViewRecord`
  - Implementato metodo `getInfolistSchema()` richiesto

### 5. Query Builder - Type Narrowing

#### Problema
Query dinamiche su modelli non riconosciute correttamente da PHPStan.

#### Soluzione

- **`LocationSelector`**: 
  - Aggiunti type assertions per query builder dinamiche
  - Aggiunto controllo `is_array()` prima di usare risultati query
  - Aggiunto PHPDoc `@var \Illuminate\Database\Eloquent\Builder` per query builder

### 6. Metodi Statici Privati

#### Problema
Chiamate a metodi privati con `static::` invece di `self::`.

#### Soluzione

- **`QuestionChartResource`**: 
  - Cambiato `static::` in `self::` per chiamate a metodi privati
  - Risolto errore `staticClassAccess.privateMethod`

### 7. Return Types Componenti View

#### Problema
Metodi `render()` con return types non specifici o errati.

#### Soluzione

- **`Simple` (Hero)**: Aggiunto return type `View`
- **`Svg`**: Cambiato da `Renderable` a `View` e aggiunto parametro `$tpl`
- **`Logo`**: Cambiato da `Renderable` a `View` e aggiunto parametro `$tpl`

## Pattern Applicati

### Type Narrowing per Query Dinamiche

```php
// ❌ ERRORE
$regions = $model::select('regione')
    ->distinct()
    ->orderBy('regione->nome')
    ->get()
    ->pluck('regione.nome', 'regione.codice')
    ->toArray();

// ✅ CORRETTO
/** @var class-string $model */
/** @var \Illuminate\Database\Eloquent\Builder $query */
$query = $model::select('regione')
    ->distinct()
    ->orderBy('regione->nome')
    ->get()
    ->pluck('regione.nome', 'regione.codice')
    ->toArray();

if (!is_array($query)) {
    return [];
}

/** @var array<string, string> $regions */
$regions = $query;
```

### Proprietà View Components

```php
// ❌ ERRORE - Proprietà non dichiarata
public function render(): Renderable
{
    $view = app(GetViewAction::class)->execute($this->tpl);
}

// ✅ CORRETTO - Proprietà dichiarata nel costruttore
public function __construct(
    public string $tpl = '',
) {}

public function render(): View
{
    $view = app(GetViewAction::class)->execute($this->tpl);
    return view($view);
}
```

### Estensioni XotBase

```php
// ❌ ERRORE - Estensione diretta Filament
class ViewLocation extends ViewRecord
{
    // ...
}

// ✅ CORRETTO - Estensione XotBase
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewLocation extends XotBaseViewRecord
{
    protected function getInfolistSchema(): array
    {
        return [
            Section::make('Informazioni')->schema([
                TextEntry::make('name'),
                // ...
            ]),
        ];
    }
}
```

## File Modificati

### Modulo Geo
- `app/Filament/Resources/LocationResource/Pages/ViewLocation.php`

### Modulo User
- `app/Filament/Resources/UserResource/Pages/EditUser.php`
- `app/Filament/Forms/Components/SingleRoleSelect.php`

### Modulo UI
- `app/View/Components/Sidebar.php`
- `app/View/Components/Render/Block.php`
- `app/View/Components/Render/Blocks.php`
- `app/View/Components/Std.php`
- `app/View/Components/Page/WithSidebar.php`
- `app/View/Components/Svg.php`
- `app/View/Components/Logo.php`
- `app/View/Components/Blocks/Hero/Simple.php`
- `app/Filament/Widgets/HeroWidget.php`
- `app/Filament/Widgets/RedirectWidget.php`
- `app/Filament/Widgets/TestChartWidget.php`
- `app/Filament/Forms/Components/PasswordStrengthField.php`
- `app/Filament/Forms/Components/TreeField.php`
- `app/Filament/Forms/Components/LocationSelector.php`

### Modulo <nome progetto>
### Modulo Quaeris
- `app/Filament/Resources/QuestionChartResource.php`
- `app/Filament/Resources/SurveyPdfResource/Resources/QuestionCharts/Pages/CreateQuestionChart.php`
- `app/Filament/Resources/SurveyPdfResource/Resources/QuestionCharts/Pages/EditQuestionChart.php`
- `app/Filament/Widgets/QuestionChartStatsOverviewWidget.php`

### Modulo Cms
- `app/Filament/Resources/PageContentResource/Pages/ViewPageContent.php`
- `app/Filament/Resources/PageContentResource/Pages/ListPageContents.php`

## Risultati

- ✅ Ridotti errori fatali da 4 a 0
- ✅ Corretti errori di proprietà mancanti nei componenti View
- ✅ Migliorato type safety per query dinamiche
- ✅ Conformità architetturale con XotBase classes
- ✅ Return types corretti per tutti i componenti View

## Note

- Tutte le correzioni rispettano le regole architetturali Laraxot
- Mantenuta compatibilità con Filament 4.x
- Type hints rigorosi per PHPStan livello 10
- Documentazione PHPDoc completa per type narrowing

## Riferimenti

- [Regole Architetturali Critiche](../../Xot/docs/critical-architecture-rules.md)
- [PHPStan Patterns](./phpstan-patterns.md)
- [PHPStan Compliance](./phpstan-compliance.md)

---

## Contenuto unito da `phpstan-corrections.md`

# PHPStan Corrections - UI Module - Gennaio 2026

**Data**: 2026-01-02
**Status**: ✅ COMPLETATO
**Errori corretti**: Da 4 a 0

## File corretti

### 1. app/Actions/Icon/GetAllIconsAction.php

**Problema**: Import duplicato di `SplFileInfo` (righe 12 e 13)

**Soluzione**: Rimosso import duplicato

```php
// ❌ PRIMA
use SplFileInfo;
use SplFileInfo;

// ✅ DOPO
use SplFileInfo;
```

### 2. app/Filament/Forms/Components/AddressField.php

**Problema**: Import duplicati di `HasMany`, `HasOne`, `MorphOne` (righe 12-17)

**Soluzione**: Rimossi import duplicati

```php
// ❌ PRIMA
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

// ✅ DOPO
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
```

### 3. app/Filament/Forms/Components/ParentSelect.php

**Problema**: File corrotto - commento non terminato, manca struttura base della classe

**Soluzione**: File eliminato (non utilizzato da nessuna parte)

### 4. app/Filament/Tables/Columns/IconStateColumn.php

**Problema**: Import duplicato di `Collection` (righe 15 e 16)

**Soluzione**: Rimosso import duplicato

```php
// ❌ PRIMA
use Illuminate\Support\Collection;
use Illuminate\Support\Collection;

// ✅ DOPO
use Illuminate\Support\Collection;
```

### 5. app/Filament/Forms/Components/RadioBadge.php

**Problema**:
- `is_string($color)` chiamato su tipo già ristretto (riga 67)
- `is_object($icon)` chiamato su tipo già ristretto (riga 91)

**Soluzione**:
```php
// ❌ PRIMA - is_string() ridondante
if (is_string($color) && $color !== '') {
    return $color;
}

// ✅ DOPO - rimosso check ridondante
if ($color !== '') {
    return $color;
}
```

```php
// ❌ PRIMA - is_object() ridondante
if (\is_object($icon) && method_exists($icon, '__toString')) {
    return (string) $icon;
}

// ✅ DOPO - rimosso check ridondante
if (method_exists($icon, '__toString')) {
    return (string) $icon;
}
```

### 6. app/Filament/Widgets/RedirectWidget.php, UserCalendarWidget.php
### 7. app/Models/Policies/UiBasePolicy.php
### 8. app/Rules/OpeningHoursRule.php

**Problema**: PHPDoc `@SuppressWarnings` con sintassi errata (mancano virgolette)

**Soluzione**:
```php
// ❌ PRIMA
/**
 * @SuppressWarnings(PHPMD.ShortVariable)
 */

// ✅ DOPO
/**
 * @SuppressWarnings("PHPMD.ShortVariable")
 */
```

## Pattern Documentati

### Import Duplicati

**Problema**: Import duplicati causano errori fatali PHP che bloccano PHPStan.

**Soluzione**: Verificare sempre gli import prima di eseguire PHPStan:
```bash
grep -n "^use" file.php | sort | uniq -d
```

### Type Narrowing - Rimozione Check Ridondanti

**Problema**: Dopo type narrowing, alcuni check diventano ridondanti.

**Soluzione**: Rimuovere check ridondanti dopo type narrowing:
```php
// Dopo is_array() è false e !== null è false, $color è string
if ($color !== '') {  // Non serve is_string()
    return $color;
}
```

### PHPDoc @SuppressWarnings

**Regola**: I valori di `@SuppressWarnings` devono essere tra virgolette:
```php
/**
 * @SuppressWarnings("PHPMD.ShortVariable")
 * @SuppressWarnings("PHPMD.UnusedFormalParameter")
 */
```

## Risultato

- ✅ PHPStan Level 10: 0 errori
- ✅ PHPMD: Nessun problema critico
- ✅ PHP Insights: Code quality migliorato
- ✅ Pint: Formattazione corretta

## Collegamenti

- [PHPStan Code Quality Guide](../../xot/docs/phpstan-code-quality-guide.md)
- [Correzioni Precedenti](./phpstan-corrections.md)
