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
---
module: theme
topic: phpstan-corrections-gennaio
canonical: ../../../Themes/docs/shared-components/phpstan-corrections-.md
---

See canonical documentation: ../../../Themes/docs/shared-components/phpstan-corrections-.md
