<<<<<<< HEAD
<<<<<<< HEAD
# Regole Architetturali

## Principi Fondamentali

1. **No Controller Manuali**
   - Non creare controller manualmente
   - Utilizzare Filament per la gestione del backend
   - Utilizzare Folio per la gestione delle pagine

2. **No Route Manuali**
   - Non modificare `web.php`
   - Non aggiungere route manualmente
   - Lasciare che Filament e Folio gestiscano le rotte

3. **No Middleware Personalizzati**
   - Utilizzare i middleware forniti da Filament e Folio
   - Non creare middleware personalizzati per la gestione delle rotte
   - Utilizzare i middleware di localizzazione forniti da Laravel Localization

4. **Risorse Statiche**
   - Le immagini pubbliche devono essere in `/public_html/images`
   - I file SVG dei componenti devono essere in `Modules/UI/resources/svg`
   - Non utilizzare percorsi hardcoded per le risorse statiche
   - Utilizzare sempre gli helper di Laravel per i percorsi delle risorse

5. **Service Provider**
   - I service provider devono essere in `Modules/[ModuleName]/app/Providers`
   - Ereditare da `XotBaseServiceProvider` per i moduli
   - Non duplicare la registrazione dei componenti già registrati
   - Utilizzare i trait e le interfacce fornite dai service provider base

6. **Componenti UI**
   - Utilizzare sempre i componenti Blade di Filament quando disponibili
   - Non creare componenti personalizzati se esiste già un equivalente Filament
   - Seguire le convenzioni di naming e stile di Filament
   - Utilizzare i componenti Filament per:
     - Avatar
     - Badge
     - Breadcrumbs
     - Button
     - Checkbox
     - Dropdown
     - Fieldset
     - Icon button
     - Input
     - Input wrapper
     - Link
     - Loading indicator
     - Modal
     - Pagination
     - Section
     - Select
     - Tabs

## Struttura del Progetto

### Filament
- Tutte le risorse devono essere in `app/Filament/Resources`
- Utilizzare i trait e le interfacce fornite da Filament
- Seguire le convenzioni di naming di Filament
- Utilizzare i componenti Blade di Filament per l'interfaccia utente

### Folio
- Tutte le pagine devono essere in `resources/views/pages`
- Utilizzare i middleware di Folio
- Seguire le convenzioni di routing di Folio

### Localizzazione
- Utilizzare Laravel Localization per la gestione delle traduzioni
- Non implementare soluzioni personalizzate per la localizzazione
- Seguire le best practices di Laravel Localization

### Risorse Statiche
- `/public_html/images` - Immagini pubbliche
- `Modules/UI/resources/svg` - SVG dei componenti
- `Modules/UI/resources/css` - Stili dei componenti
- `Modules/UI/resources/js` - Script dei componenti

### Service Provider
- `Modules/UI/app/Providers` - Service provider del modulo UI
- `Modules/Xot/app/Providers` - Service provider base
- `app/Providers` - Service provider dell'applicazione

## Best Practices

1. **Filament**
   - Utilizzare i form builder di Filament
   - Utilizzare i table builder di Filament
   - Utilizzare i widget di Filament
   - Localizzare le risorse usando Laravel Localization
   - Utilizzare i componenti Blade di Filament per l'interfaccia utente

2. **Folio**
   - Organizzare le pagine per lingua
   - Utilizzare i componenti Blade
   - Localizzare le pagine usando Laravel Localization

3. **Localizzazione**
   - Utilizzare i file di traduzione in `resources/lang`
   - Utilizzare le funzioni helper di Laravel (`__()`, `trans()`)
   - Non hardcodare testi nelle view

4. **Risorse Statiche**
   - Utilizzare `asset()` per le risorse pubbliche
   - Utilizzare `Vite::asset()` per le risorse compilate
   - Utilizzare i componenti SVG registrati per le icone
   - Non hardcodare percorsi delle risorse

5. **Service Provider**
   - Verificare sempre i service provider esistenti prima di crearne di nuovi
   - Utilizzare l'ereditarietà per estendere le funzionalità
   - Non duplicare la registrazione dei componenti
   - Seguire le convenzioni di naming dei moduli

6. **Componenti UI**
   - Preferire i componenti Filament ai componenti personalizzati
   - Seguire le convenzioni di stile di Filament
   - Utilizzare i componenti Filament per la consistenza dell'interfaccia
   - Documentare eventuali personalizzazioni dei componenti Filament

## Esempi

### ❌ Non Fare

```php
// Non creare controller manualmente
class ExampleController extends Controller
{
    public function index()
    {
        return view('example');
    }
}

// Non aggiungere route manualmente
Route::get('/example', [ExampleController::class, 'index']);

// Non creare middleware personalizzati
class CustomMiddleware
{
    public function handle($request, Closure $next)
    {
        // ...
    }
}

// Non hardcodare percorsi delle risorse
<img src="/var/www/html/saluteora/laravel/public/images/avatar.png">

// Non duplicare la registrazione dei componenti
Blade::component('ui::components.icon', 'ui.icon');

// Non creare componenti personalizzati se esiste un equivalente Filament
<x-ui.button>Click me</x-ui.button>
```

### ✅ Fare

```php
// Utilizzare Filament per le risorse
class ExampleResource extends Resource
{
    public static function getNavigationLabel(): string
    {
        return __('example.title');
    }
}

// Utilizzare Folio per le pagine
// resources/views/pages/example.blade.php
<x-layout>
    <h1>{{ __('example.title') }}</h1>
</x-layout>

// Utilizzare i middleware di Laravel Localization
Route::middleware(['localize'])->group(function () {
    // Le route verranno gestite da Filament e Folio
});

// Utilizzare gli helper per le risorse
<img src="{{ asset('images/avatar.png') }}">
<x-filament::avatar />

// Ereditare dal service provider base
class UIServiceProvider extends XotBaseServiceProvider
{
    public function boot()
    {
        parent::boot();
        // Aggiungere solo le funzionalità specifiche
    }
}

// Utilizzare i componenti Filament
<x-filament::button>Click me</x-filament::button>
<x-filament::input />
<x-filament::dropdown />
```

## Collegamenti Correlati
- [Documentazione Filament](https://filamentphp.com/docs)
- [Documentazione Folio](https://laravel.com/docs/folio)
- [Documentazione Laravel Localization](https://github.com/mcamara/laravel-localization)
- [Best Practices UI](./ui_best_practices.md)
- [Guida Componenti](./components_guide.md)
- [Componenti Blade Filament](https://filamentphp.com/docs/3.x/support/blade-components/overview)

## Gestione delle Rotte

### Frontoffice (Folio)
- Utilizzare Folio per tutte le rotte del frontoffice
- Le pagine devono essere posizionate in `Themes/One/resources/views/pages/`
- Non creare manualmente rotte in `web.php` o altri file di routing
- Utilizzare la struttura delle cartelle per definire le rotte
- Esempio:
  ```
  /pages/
    ├── auth/
    │   ├── login.blade.php
    │   └── register.blade.php
    ├── profile/
    │   └── show.blade.php
    └── index.blade.php
  ```

### Backoffice (Filament)
- Utilizzare Filament per tutte le rotte di amministrazione
- Non creare manualmente rotte per le funzionalità di amministrazione
- Utilizzare i Resource e le Page di Filament
- Le rotte vengono generate automaticamente da Filament

### Cosa NON Fare
❌ Non creare manualmente rotte in `web.php`
❌ Non definire rotte personalizzate per funzionalità già gestite da Filament
❌ Non utilizzare controller tradizionali per il frontoffice
❌ Non mescolare approcci diversi per la stessa funzionalità

### Cosa Fare
✅ Utilizzare Folio per il frontoffice
✅ Utilizzare Filament per il backoffice
✅ Seguire la struttura delle cartelle per definire le rotte
✅ Mantenere la separazione tra frontoffice e backoffice

## Layout e Struttura

### Layout Frontoffice
- Utilizzare `x-layouts.main` per le pagine del frontoffice
- Non utilizzare i layout di Filament (`filament::layouts.*`) nel frontoffice
- I layout devono essere in `Themes/One/resources/views/components/layouts/`
- Struttura standard:
  ```
  /layouts/
    ├── main.blade.php      # Layout principale
    ├── app.blade.php       # Layout applicazione
    └── guest.blade.php     # Layout per utenti non autenticati
  ```

### Layout Backoffice
- Utilizzare i layout di Filament per il backoffice
- Non mescolare layout frontoffice e backoffice
- Seguire le convenzioni di Filament per i layout

### Cosa NON Fare
❌ Non utilizzare `filament::layouts.*` nel frontoffice
❌ Non creare layout personalizzati se non necessario
❌ Non mescolare approcci diversi per lo stesso scopo

### Cosa Fare
✅ Utilizzare `x-layouts.main` per il frontoffice
✅ Utilizzare i layout Filament per il backoffice
✅ Mantenere la separazione tra frontoffice e backoffice

## Volt e Folio

### Volt
- Utilizzare la direttiva `@volt` per i componenti Volt in Folio
- Struttura standard per i componenti Volt:
  ```blade
  @volt('component.name')
  <?php
  use function Livewire\Volt\{state, mount};
  
  state([
      'property' => null,
  ]);
  
  $action = function () {
      // Logica dell'azione
  };
  ?>
  
  <div>
      <!-- Template del componente -->
  </div>
  @endvolt
  ```

### Folio
- Utilizzare Folio per le pagine del frontoffice
- Struttura standard per le pagine Folio:
  ```blade
  <?php
  use function Laravel\Folio\{middleware, name};
  use function Livewire\Volt\{state, mount};
  
  middleware(['auth']);
  name('page.name');
  
  state([
      'property' => null,
  ]);
  ?>
  
  <x-layouts.main>
      <!-- Contenuto della pagina -->
  </x-layouts.main>
  ```

### Best Practices
- Mantenere la separazione tra logica e presentazione
- Utilizzare state per la gestione dello stato
- Documentare le azioni e gli stati
- Testare i componenti in isolamento

### Cosa NON fare
- ❌ Omettere la direttiva `@volt` nei componenti Volt
- ❌ Mischiare logica di business con la presentazione
- ❌ Duplicare stati tra componenti
- ❌ Ignorare la gestione degli errori

### Cosa fare
- ✅ Utilizzare la direttiva `@volt` per i componenti Volt
- ✅ Seguire la struttura standard per i componenti
- ✅ Gestire correttamente gli stati e le azioni
- ✅ Implementare la gestione degli errori
- ✅ Testare i componenti

## Traduzioni

### Struttura
- Utilizzare il namespace `auth.` per le traduzioni relative all'autenticazione
- Organizzare le traduzioni per contesto:
  ```
  auth/
    ├── login/
    │   ├── title
    │   ├── email
    │   ├── password
    │   ├── remember_me
    │   ├── forgot_password
    │   ├── submit
    │   └── link
    ├── register/
    │   ├── title
    │   ├── email
    │   ├── password
    │   ├── confirm_password
    │   ├── submit
    │   └── link
    ├── logout/
    │   ├── title
    │   ├── confirm_message
    │   ├── success_title
    │   ├── success_message
    │   ├── error_title
    │   ├── error_message
    │   ├── confirm_button
    │   ├── cancel_button
    │   ├── back_to_home
    │   └── try_again
    └── user_dropdown/
        ├── manage_account
        ├── profile
        ├── settings
        └── logout
  ```

### Best Practices
- Utilizzare chiavi di traduzione semantiche
- Mantenere la coerenza nella struttura
- Documentare le traduzioni
- Testare in tutte le lingue supportate

### Cosa NON fare
- ❌ Hardcodare testi nelle view
- ❌ Duplicare chiavi di traduzione
- ❌ Utilizzare chiavi non semantiche
- ❌ Ignorare il supporto multilingua

### Cosa fare
- ✅ Utilizzare il namespace appropriato
- ✅ Seguire la struttura standard
- ✅ Documentare le traduzioni
- ✅ Testare in tutte le lingue

## Gestione dell'Autenticazione

### Componenti
- Utilizzare `x-blocks.navigation.user-dropdown` per utenti autenticati
- Utilizzare `x-blocks.navigation.login-buttons` per utenti non autenticati
- Struttura standard:
  ```blade
  @auth
      <x-blocks.navigation.user-dropdown :user="auth()->user()" />
  @else
      <x-blocks.navigation.login-buttons />
  @endauth
  ```

### Best Practices
- Mantenere la separazione tra stati autenticati e non
- Utilizzare i componenti appropriati
- Gestire correttamente le traduzioni
- Supportare il tema scuro

### Cosa NON fare
- ❌ Mischiare stati autenticati e non
- ❌ Duplicare logica di autenticazione
- ❌ Ignorare le traduzioni
- ❌ Ignorare il supporto per il tema scuro

### Cosa fare
- ✅ Utilizzare i componenti appropriati
- ✅ Seguire la struttura standard
- ✅ Gestire correttamente le traduzioni
- ✅ Testare in entrambi gli stati

## Regole di Navigazione

### Gestione degli Stati di Autenticazione

1. **Componenti di Navigazione**:
   - Utilizzare `@auth` e `@else` per gestire gli stati di autenticazione
   - Passare l'utente autenticato ai componenti che lo richiedono
   - Utilizzare le traduzioni per tutti i testi

2. **Struttura**:
   - Desktop: Menu principale e dropdown utente
   - Mobile: Menu responsive con opzioni di autenticazione
   - Mantenere la coerenza tra desktop e mobile

3. **Traduzioni**:
   - Utilizzare le chiavi di traduzione standard:
     - `auth.user_dropdown.*` per il dropdown utente
     - `auth.login.*` per il login
     - `auth.register.*` per la registrazione

4. **Cosa NON Fare**:
   - Non mescolare componenti Filament con componenti front office
   - Non hardcodare testi
   - Non duplicare la logica di autenticazione

5. **Cosa Fare**:
   - Utilizzare i componenti responsive appropriati
   - Mantenere la coerenza con il tema dark/light
   - Gestire correttamente il logout con CSRF
=======
# UI Module - Architecture Guide (2025)

> **Last Updated:** 2025-11-19
=======
# UI Module - Architecture Guide (2025)

> **
>>>>>>> dev
> **PHPStan Level:** 10
> **Status:** Shared UI Components & Filament Customizations

## Table of Contents

1. [Module Overview](#module-overview)
2. [Key Components](#key-components)
3. [Architecture](#architecture)
4. [Integration Guide](#integration-guide)
5. [Code Quality](#code-quality)

---

## Module Overview

### Primary Purpose

The UI module is a **Filament v4 customization and shared components library** that provides:
- ✨ Specialized form fields and table columns extending Filament's base components
- 🧩 Reusable Filament widgets for dashboards and layouts
- 🎨 Blade view components for frontend integration
- 🌓 Theme management and dark mode support
- 🧱 Block system for structured content management
- 📋 Table layout switching (list/grid views)
- 🎯 Icon management and selection tools

**Core Role:** Central UI abstraction layer serving all other modules' admin panel needs without reimplementing common patterns.

---

## Key Components

### 1. Filament Form Components

#### IconPicker
**File:** `Modules/UI/app/Filament/Forms/Components/IconPicker.php`

Interactive icon selector with pack organization:
- Reflection-based icon extraction
- Factory wrapping for BladeUI Icons
- Safe array handling
- Dynamic icon discovery via `GetAllIconsAction`

**Usage:**
```php
use Modules\UI\Filament\Forms\Components\IconPicker;

IconPicker::make('icon')
    ->label('Select Icon')
    ->required();
```

#### OpeningHoursField
**File:** `Modules/UI/app/Filament/Forms/Components/OpeningHoursField.php`

Complex time picker for business hours:
- Morning/afternoon slots per day
- Validation for time ranges
- Structured data output

**Usage:**
```php
use Modules\UI\Filament\Forms\Components\OpeningHoursField;

OpeningHoursField::make('hours')
    ->label('Business Hours');
```

#### Other Form Components

- **InlineDatePicker** - Calendar date selection
- **LocationSelector** - Geolocation field with map integration
- **RadioIcon/RadioImage/RadioBadge** - Rich selection variants
- **AddressField** - Structured address input with validation

### 2. Filament Table Columns

#### IconStateColumn
**File:** `Modules/UI/app/Filament/Tables/Columns/IconStateColumn.php`

Spatie ModelStates integration:
- State transition modal actions
- Visual state indicators
- Type-safe state management

**Usage:**
```php
use Modules\UI\Filament\Tables\Columns\IconStateColumn;

IconStateColumn::make('status')
    ->label('Status')
    ->sortable();
```

#### Other Table Columns

- **IconStateGroupColumn** - Grouped state columns
- **IconStateSplitColumn** - Split-view state management
- **SelectStateColumn** - Dropdown-based state transitions
- **GroupColumn** - Column grouping for complex data

### 3. Filament Widgets

#### StatsOverviewWidget / HeroWidget
**File:** `Modules/UI/app/Filament/Widgets/StatsOverviewWidget.php`

Dashboard stat displays:
- Customizable layouts
- Real-time data updates
- Responsive design

#### UserCalendarWidget
**File:** `Modules/UI/app/Filament/Widgets/UserCalendarWidget.php`

Event-driven calendar:
- Dynamic form schemas via Actions
- Event CRUD operations
- Integration with scheduling systems

#### DarkModeSwitcherWidget
**File:** `Modules/UI/app/Filament/Widgets/DarkModeSwitcherWidget.php`

Theme toggle:
- Livewire-powered switching
- User preference persistence
- System preference detection

#### Layout Widgets

- **RowWidget** - Row layout helper
- **GroupWidget** - Widget grouping

### 4. Blocks System (Content Management)

**Location:** `Modules/UI/app/Filament/Blocks/`

**14 Block Types:**
- Hero
- Heading
- Paragraph
- Image
- Video
- Slider
- Contact
- Category
- Navigation
- Post
- Gallery
- And more...

**Features:**
- Extends Filament's Builder Block
- Structured content composition
- Dynamic block discovery via `GetAllBlocksAction`
- Blade rendering per block type

**Usage:**
```php
use Filament\Forms\Components\Builder;
use Modules\UI\Filament\Blocks\HeroBlock;

Builder::make('content')
    ->blocks([
        HeroBlock::make(),
        // ... other blocks
    ]);
```

### 5. Table Layout System

**Files:**
- `Modules/UI/app/Enums/TableLayoutEnum.php`
- `Modules/UI/app/Contracts/HasTableLayout.php`
- `Modules/UI/app/Traits/TableLayoutTrait.php`

**Features:**
- LIST/GRID layout modes
- Responsive grid configurations
- Session-based persistence
- User-facing layout switchers

**Implementation:**
```php
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Traits\TableLayoutTrait;
use Modules\UI\Contracts\HasTableLayout;

class ListRecords extends BaseListRecords implements HasTableLayout
{
    use TableLayoutTrait;

    protected function getHeaderActions(): array
    {
        return [
            TableLayoutToggleHeaderAction::make(),
        ];
    }

    public function getTableLayout(): TableLayoutEnum
    {
        return $this->getLayout();
    }
}
```

---

## Architecture

### Integration Patterns

**Service Provider:**
```php
class UIServiceProvider extends XotBaseServiceProvider
{
    // Extends Xot base functionality
    // Registers UI components
    // Loads Blade components
}
```

**Panel Provider:**
```php
class UIPanelProvider extends XotBasePanelProvider
{
    // Filament panel customization
    // Widget registration
    // Theme configuration
}
```

### Dependency Structure

```
UI Module
├── Depends on: Xot (base classes, actions, traits)
├── Depends on: User (for user data actions)
├── Depends on: Tenant (multi-tenancy support)
└── Uses: Spatie packages (QueueableAction, ModelStates, LaravelData)
```

### Key Traits & Interfaces

**TableLayoutTrait**
- Manages session-based layout persistence
- Provides `getLayout()` and `setLayout()` methods
- Integrates with TableLayoutEnum

**TransTrait**
- Internationalization support
- Translation keys per enum value
- Automatic label resolution

**HasTableLayout** (Interface)
- Standard contract for layout-aware components
- Required methods: `getTableLayout()`, `setTableLayout()`

### Actions Pattern

**GetAllIconsAction**
- Reflection-based icon extraction
- Factory wrapping
- Safe error handling

**GetAllBlocksAction**
- Dynamic block discovery
- Namespace scanning
- Block registration automation

---

## Integration Guide

### Using Custom Form Components

```php
use Modules\UI\Filament\Forms\Components\IconPicker;
use Modules\UI\Filament\Forms\Components\OpeningHoursField;
use Modules\UI\Filament\Forms\Components\LocationSelector;

public static function form(Form $form): Form
{
    return $form
        ->schema([
            IconPicker::make('icon')
                ->label('Icon'),

            OpeningHoursField::make('business_hours')
                ->label('Business Hours'),

            LocationSelector::make('location')
                ->label('Location')
                ->required(),
        ]);
}
```

### Using Table Columns

```php
use Modules\UI\Filament\Tables\Columns\IconStateColumn;
use Modules\UI\Filament\Tables\Columns\GroupColumn;

public static function table(Table $table): Table
{
    return $table
        ->columns([
            IconStateColumn::make('status')
                ->label('Status'),

            GroupColumn::make('info')
                ->label('Information')
                ->columns([
                    TextColumn::make('name'),
                    TextColumn::make('email'),
                ]),
        ]);
}
```

### Implementing Table Layout Toggle

```php
use Modules\UI\Traits\TableLayoutTrait;
use Modules\UI\Contracts\HasTableLayout;
use Modules\UI\Enums\TableLayoutEnum;

class ListProducts extends BaseListRecords implements HasTableLayout
{
    use TableLayoutTrait;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            TableLayoutToggleHeaderAction::make(),
        ];
    }

    public function getTableLayout(): TableLayoutEnum
    {
        return $this->getLayout();
    }
}
```

### Creating Custom Blocks

```php
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;

class CustomBlock extends Block
{
    public static function make(): static
    {
        return Block::make('custom')
            ->schema([
                TextInput::make('title')
                    ->required(),

                RichEditor::make('content')
                    ->required(),
            ])
            ->label('Custom Block');
    }
}
```

---

## Code Quality

### Well-Structured Areas

1. **IconPicker Component**
   - Excellent separation of concerns
   - Reflection-based icon extraction
   - Factory wrapping for extensibility
   - Safe array handling

2. **TableLayoutEnum**
   - Comprehensive enum implementation
   - Multiple query methods
   - Type-safe toggle logic
   - Responsive grid configuration

3. **IconStateColumn**
   - Sophisticated state machine integration
   - Proper type narrowing for PHPStan Level 10
   - Conditional logic for state transitions

4. **Actions Pattern**
   - GetAllIconsAction: Proper reflection usage
   - Error handling
   - File iteration safety

5. **Testing**
   - 13 test files
   - Pest framework
   - Feature and unit test coverage
   - Mock implementations (MockCalendarWidget, MockEventModel)

### Areas for Improvement

1. **File Cleanup**
   - Remove `.bak` and `.to_geo` backup files
   - Clean up duplicate `Datas/` and `Data/` directories

2. **Component Complexity**
   - OpeningHoursField (>100 lines) - extract to smaller components
   - LocationSelector complexity - consider sub-components

3. **Documentation**
   - Limited inline PHPDoc for complex features
   - Block system needs architecture documentation
   - Widget customization patterns undocumented

4. **Error Handling**
   - Generic Exception catching without specific logging
   - Improve error reporting in actions

### PHPStan Level 10 Compliance

**Current Status:** ✅ Passing PHPStan Level 10

**Key Type Safety Features:**
- Proper generic type annotations
- Type narrowing in state columns
- Safe array access patterns
- Return type declarations throughout

---

## Testing Strategy

### Test Coverage

**Feature Tests:**
- Form component rendering
- Widget functionality
- Block system integration
- Layout switching behavior

**Unit Tests:**
- Enum methods
- Trait functionality
- Action execution
- Data transformation

**Example:**
```php
use Pest\Livewire;

it('can toggle table layout', function () {
    Livewire::test(ListProducts::class)
        ->assertSet('layout', TableLayoutEnum::LIST)
        ->call('toggleLayout')
        ->assertSet('layout', TableLayoutEnum::GRID);
});
```

---

## Documentation Topics

### Priority Topics

1. **Table Layout System**
   - Implementation guide
   - Session persistence
   - Responsive configuration

2. **Custom Form Components**
   - IconPicker customization
   - OpeningHoursField data structure
   - LocationSelector integration

3. **Widgets Reference**
   - UserCalendarWidget setup
   - StatsOverviewWidget configuration
   - Custom widget development

4. **Block System**
   - Block registration
   - Custom block creation
   - Blade rendering

5. **Spatie ModelStates Integration**
   - IconStateColumn patterns
   - State transition UI
   - Custom state methods

6. **Icon Management**
   - Icon discovery process
   - Multi-pack support
   - Custom icon sets

---

## Dependencies

### Core Dependencies

- **Xot Module** - Base classes, actions, traits
- **User Module** - User data actions
- **Tenant Module** - Multi-tenancy support
- **Filament v4** - Admin panel framework
- **Spatie Packages**:
  - QueueableAction
  - ModelStates
  - LaravelData
- **BladeUI Icons** - Icon management

---

## Best Practices

### Form Component Development

```php
// Good: Type-safe, documented, extensible
class MyFormComponent extends Field
{
    /**
     * @param  string  $name
     * @return static
     */
    public static function make(string $name): static
    {
        return parent::make($name)
            ->defaultValue(fn () => collect());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrated();
        $this->validateUsing([/* validation rules */]);
    }
}
<<<<<<< HEAD
=======

// Non aggiungere route manualmente
Route::get('/example', [ExampleController::class, 'index']);

// Non creare middleware personalizzati
class CustomMiddleware
{
    public function handle($request, Closure $next)
    {
        // ...
    }
}

// Non hardcodare percorsi delle risorse
<img src="/var/www/html/Quaeris/laravel/public/images/avatar.png">

// Non duplicare la registrazione dei componenti
Blade::component('ui::components.icon', 'ui.icon');

// Non creare componenti personalizzati se esiste un equivalente Filament
<x-ui.button>Click me</x-ui.button>
>>>>>>> dev
```

### Widget Development

```php
// Good: Clear data loading, cached results
class MyWidget extends Widget
{
    protected static string $view = 'ui::widgets.my-widget';

    protected function getViewData(): array
    {
        return cache()->remember('my-widget-data', 300, function () {
            return [
                'stats' => $this->calculateStats(),
            ];
        });
    }

    private function calculateStats(): array
    {
        // Calculation logic
        return [];
    }
}
```

---

## Recommendations

### Immediate Actions

1. **Documentation**
   - Complete inline PHPDoc for complex components
   - Create usage guides for each form component
   - Document block system architecture

2. **Code Cleanup**
   - Remove backup files (`.bak`, `.to_geo`)
   - Consolidate `Datas/` directories
   - Clean up unused imports

3. **Refactoring**
   - Extract complex components into smaller units
   - Improve error handling in actions
   - Add more specific exception types

### Long-term Improvements

1. **Testing**
   - Increase coverage to 90%+
   - Add E2E tests for complex workflows
   - Performance testing for large datasets

2. **Performance**
   - Optimize icon discovery
   - Cache block registry
   - Lazy load widget data

3. **Accessibility**
   - ARIA labels for custom components
   - Keyboard navigation improvements
   - Screen reader support

---

## File Paths Reference

### Key Files

- Icon Picker: `Modules/UI/app/Filament/Forms/Components/IconPicker.php`
- Table Layout Enum: `Modules/UI/app/Enums/TableLayoutEnum.php`
- Icon State Column: `Modules/UI/app/Filament/Tables/Columns/IconStateColumn.php`
- User Calendar Widget: `Modules/UI/app/Filament/Widgets/UserCalendarWidget.php`
- Get All Icons Action: `Modules/UI/app/Actions/GetAllIconsAction.php`
- Table Layout Trait: `Modules/UI/app/Traits/TableLayoutTrait.php`

### Configuration

- Module Config: `Modules/UI/module.json`
- Composer: `Modules/UI/composer.json`
- Service Provider: `Modules/UI/app/Providers/UIServiceProvider.php`

---

## Conclusion

The UI module is a **well-architected, feature-rich Filament customization layer** with strong extensibility. It provides essential UI components used across all modules, following solid design patterns and maintaining PHPStan Level 10 compliance.

**Key Strengths:**
- 🎨 Rich set of reusable components
- 🔧 Excellent Filament v4 integration
- 🧪 Good test coverage
- 📐 Solid architectural patterns
- ✅ PHPStan Level 10 compliant

**Primary Focus Areas:**
- 📚 Complete documentation for all components
- 🧹 Code cleanup and consolidation
- 🔨 Refactor complex components
- 📈 Expand test coverage

---

**Document Version:** 1.0
<<<<<<< HEAD
**Generated:** 2025-11-19
**Author:** Claude Code Analysis
>>>>>>> 4b6b99016 (first commit)
=======
**Author:** Claude Code Analysis
>>>>>>> dev
