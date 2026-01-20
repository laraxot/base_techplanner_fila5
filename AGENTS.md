# AGENTS.md

<<<<<<< HEAD
This file provides essential guidance for agentic coding agents working in this Laravel modular application with Filament v5.

## 🚨 CRITICAL NEW Rules

### Volt + Folio + Laraxot: niente rotte né controller in web.php

**Frontend e pagine auth sono gestiti solo da Volt + Folio + Laraxot.** Non creare rotte in `web.php` (né GET né POST) per frontend/auth; non creare controller per le pagine. Eccezioni: solo casi documentati (es. logout). Non aggiungere rotte POST “di fallback” (es. per auth/login): il submit è solo via Livewire/Filament widget. Regola: [.cursor/rules/no_web_php_front_backoffice.mdc](.cursor/rules/no_web_php_front_backoffice.mdc).

### Auth Forms - Solo Filament Widget

**I form di autenticazione (login, register, reset password) si gestiscono SEMPRE con Filament widget (LoginWidget, RegisterWidget, ecc.), MAI con form HTML tradizionali.** Vietato `<form method="POST" action="{{ route('login') }}">` con @csrf e input raw nelle pagine tema. Usare `@livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)` (e widget analoghi). Regola: [.cursor/rules/filament-login-widget.mdc](.cursor/rules/filament-login-widget.mdc).

### Filament - VIETATO ->label(), ->placeholder(), ->helperText()

**Le traduzioni sono gestite da LangServiceProvider tramite i file in `Modules/<Modulo>/lang/`.** Mai usare `->label()`, `->placeholder()` o `->helperText()` nei componenti Filament. Per nascondere una label usare `->hiddenLabel()`, non `->label('')`. Regola: [.cursor/rules/no-filament-labels.mdc](.cursor/rules/no-filament-labels.mdc).

### Frontend Development - NO Controllers

**MAI, MAI, MAI usare Controllers tradizionali per il frontend. SEMPRE usare Folio + Volt.**

```php
// ❌ SBAGLIATO - MAI FARE QUESTO
// app/Http/Controllers/PagesController.php
class PagesController extends Controller {
    public function about() {
        return view('pages.about');
    }
}

// ✅ CORRETTO - Folio Pages
// resources/views/pages/chi-si-siamo.blade.php
<x-page side="content" slug="about">
    <h1>Chi Siamo</h1>
</x-page>
```

**DOCUMENTAZIONE COMPLETA**: [docs/critical-frontend-rules.md](docs/critical-frontend-rules.md)

### Component Validation Before Creating Pages

**SEMPRE verificare l'esistenza dei componenti prima di definire i blocchi JSON.**

```bash
# Verification script
for view in "pub_theme::components.blocks.hero.about" "pub_theme::components.content.split"; do
    view_path=$(echo $view | sed 's/pub_theme::/laravel\/Themes\/Two\/resources\/views\//g')
    if [ ! -f "$view_path" ]; then
        echo "❌ Missing: $view_path"
    fi
done
```

### WCAG Contrast Requirements

**SEMPRE calcolare il rapporto di contrasto prima di scegliere i colori.**

```php
// WCAG AA requires 4.5:1 for normal text
// WCAG AAA requires 7:1 for normal text

// ❌ SBAGLIATO - Contrasto 4.2:1 (sotto AA)
text-gray-400 (#9CA3AF) su #0F3460

// ✅ CORRETTO - Contrasto 6:1 (AA)
text-gray-200 (#E5E7EB) su #0F3460

// ✅ CORRETTO - Contrasto 7:1 (AAA)
text-gray-100 (#F3F4F6) su #0F3460
```

### Map Integration - FREE Only

**SEMPRE usare servizi gratuiti per le mappe. MAI usare Google Maps API a pagamento.**

```bash
# ✅ CORRETTO - Servizi Free
- OpenStreetMap (OSM) iframe embed
- OpenStreetMap Static Maps
- Nominatim per geocoding
- Screenshot manuale da OSM

# ❌ SBAGLIATO - Google Maps API
- Google Maps Static API (richiede billing)
- Google Maps Embed API (richiede API key con billing)
```

**Link a Google Maps ammesso solo per navigazione (direzioni), non per visualizzazione.**

### Theme Assets - NO CDN per Alpine/JS

**I temi (es. Two) hanno build proprio: `cd laravel/Themes/Two && npm install && npm run build && npm run copy`.** CSS e JS sono dentro il tema, serviti da `@vite(..., 'themes/Two')`. **NON caricare Alpine.js da CDN** nei layout: Livewire/Filament lo fornisce già. Caricare da CDN causa "Detected multiple instances of Alpine running". Regola: [.cursor/rules/theme-two-assets.mdc](.cursor/rules/theme-two-assets.mdc), [laravel/Themes/Two/docs/fix/layout.txt](laravel/Themes/Two/docs/fix/layout.txt).

### Git Workflow - Commit Frequentemente

**SEMPRE fare git commit e push quando il codice è stabile.**

```bash
# ✅ CORRETTO - Workflow standard
1. Implementazione feature
2. Test verifica
3. Se tutto OK → git add .
4. git commit -m "feat: descrizione"
5. git push
```

**MAI aspettare perfezione assoluta prima di commit.**

### Deployment e validazione produzione

- **Sito in produzione**: https://sottana.net
- **Deploy**: push sul branch `master` attiva l'auto-deploy
- Dopo modifiche a frontend, contatti o mappa: verificare su produzione (es. https://sottana.net/it/contatti)
- Doc: [docs/deployment-and-validation.md](docs/deployment-and-validation.md)

### Accessibilità - WCAG 2.1

**Validatore**: [MAUVE++](https://mauve.isti.cnr.it/) (CNR - ISTI)
- Account richiesto per validazione completa
- Documentazione: [laravel/Themes/Two/docs/wcag-compliance-plan.md](laravel/Themes/Two/docs/wcag-compliance-plan.md)

**Problematiche WCAG Risolte**:
- H44: Label form controls
- G195: Focus indicator visibile
- G18: Contrasto minimo 4.5:1
- H98: Autocomplete form
- C38: Reflow 320px
- H30: Link descrittivi

**Validazione CLI**:
```bash
lighthouse https://sottana.net/it --view
npx @axe-core/cli https://sottana.net/it
```

### Continuous Improvement

**Documentare sempre errori e lezioni apprese.**

Vedi: [docs/continuous-improvement-lessons.md](docs/continuous-improvement-lessons.md)

### Documentation Rules

- Git tiene traccia automaticamente delle modifiche
- Le date appesantiscono la manutenzione e creano merge conflict
=======
This file provides essential guidance for agentic coding agents working in this Laravel modular application with Filament v4.
>>>>>>> 4b6b99016 (first commit)

## Build/Lint/Test Commands

### Primary Commands
```bash
# Development environment (server + queue + logs + vite)
composer dev

# Full setup and optimization
composer go

# Run all tests
composer test
php artisan test

# Code formatting and static analysis
./vendor/bin/pint                    # Format code
./vendor/bin/phpstan analyse         # Static analysis (level max)
composer lint                        # Runs both pint + phpstan

# Build frontend assets
npm run build
npm run dev                          # Development with hot reload
```

### Module-Specific Commands
```bash
# Run from module directory OR use composer scripts
cd Modules/ModuleName && ./vendor/bin/pest

# Single test execution
./vendor/bin/pest --filter="TestName"
php artisan test --filter="TestName"

# Module-specific analysis
./vendor/bin/phpstan analyse Modules/ModuleName --memory-limit=-1
```

### Critical Testing Rules
- **NEVER use `RefreshDatabase`** - tests use SQLite in-memory via `.env.testing`
- Use `DatabaseTransactions` instead when needed
- **Mandatory Pest syntax**: Use `it()`, `test()`, `describe()` - NO PHPUnit class-based tests
- If test fails: **the test is wrong, not the working code**

## Code Style Guidelines

### File Structure & Naming
- **PascalCase for ALL classes and files** (no case-sensitive conflicts)
- Follow established module structure in `Modules/ModuleName/`
- Models extend Xot base classes when available
- Filament resources in `Modules/*/app/Filament/Resources/`

### Import Organization
```php
// Order: external libraries, Laravel, Filament, application modules
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Modules\User\Models\User;
use Modules\Xot\Filament\Resources\XotBaseResource;
```

### Type Declarations
- **ALWAYS use `declare(strict_types=1);`** at file top
- Use modern PHP 8.2+ features: `protected function casts(): array` instead of `$casts`
- Specify return types and parameter types consistently
- Use `#[\Override]` attribute for overridden methods

### Critical Architecture Rules

<<<<<<< HEAD
#### 🔄 **GIT COMMIT/PUSH RULE** - CRITICAL RULE
**SEMPRE fare git commit e git push quando il codice è stabile e funzionante!**

Questa regola è FONDAMENTALE per tutti gli agenti AI:

1. **Quando fare commit/push**:
   - ✅ Dopo aver completato una feature funzionante
   - ✅ Quando i test passano senza errori
   - ✅ Quando PHPStan non riporta errori critici
   - ✅ Quando il sito è in uno stato "stabile" e visitabile

2. **Processo obbligatorio**:
   ```bash
   # 1. Testare che tutto funzioni
   php artisan test --compact
   
   # 2. Verificare code quality
   ./vendor/bin/phpstan analyse
   ./vendor/bin/pint
   
   # 3. Commit con messaggio descrittivo
   git add .
   git commit -m "feat: implement header nav with scroll effect and footer enhancements"
   
   # 4. Push immediato
   git push
   ```

3. **Messaggi di commit standard**:
   - `feat:` nuove funzionalità
   - `fix:` bug corretti  
   - `refactor:` codice migliorato
   - `docs:` documentazione aggiornata
   - `style:` formatting code (auto-generated)

4. **MAI fare commit di codice rotto!**
   - ❌ Codice con errori PHP fatali
   - ❌ Test che falliscono
   - ❌ PHPStan errors non risolti
   - ❌ Funzionalità incomplete o non testate

#### 🚫 **CONTROLLERS ARE BANNED** - CRITICAL RULE
**NEVER create or use traditional Laravel Controllers in this project!**

This project uses **Folio + Volt + Laraxot** architecture:
- **Folio**: File-based routing (`resources/views/pages/`)
- **Volt**: Reactive components for interactivity  
- **Actions**: For business logic (when needed)
- **NO Controllers**: Traditional `app/Http/Controllers/` are forbidden

#### 🎨 **BLADE TYPE SAFETY** - CRITICAL RULE

**SEMPRE gestire correttamente i tipi di dati in Blade.**

```blade
<!-- ❌ SBAGLIATO - Passa array a {{ }} che chiama htmlspecialchars() -->
{{ $item['label'] }}  // Errore se $item['label'] è array

<!-- ✅ CORRETTO - Usa null coalescing e verifica tipo -->
{{ $item['label'] ?? '' }}  // OK sempre

<!-- ❌ SBAGLIATO - is_array() check inconsistente -->
@if(is_array($item))
    {{ $item['label'] }}
@else
    {{ $item }}
@endif

<!-- ✅ CORRETTO - Struttura dati consistente -->
@foreach($items ?? [] as $item)
    <h4>{{ $item['label'] ?? '' }}</h4>
    <p>{{ $item['description'] ?? '' }}</p>
@endforeach
```

**LEZIONE APPRESA**: Il controllo `is_array()` in Blade è pattern error-prone. Meglio usare struttura dati consistente con null coalescing.

```php
// ❌ NEVER DO THIS - BANNED!
// app/Http/Controllers/PagesController.php
class PagesController extends Controller {
    public function services() { ... }
    public function blog() { ... }
}

// ❌ NEVER DO THIS - BANNED!
// routes/web.php
Route::get('/services', [PagesController::class, 'services']);

// ✅ CORRECT - Use Folio pages
// resources/views/pages/services.blade.php
<?php
use function Laravel\Folio\{name};
name('pages.services');
?>
<!-- Your HTML/Blade content -->
```

=======
>>>>>>> 4b6b99016 (first commit)
#### 1. NEVER Extend Filament Directly
```php
// ❌ WRONG
use Filament\Resources\Resource;
class MyResource extends Resource {}

// ✅ CORRECT
use Modules\Xot\Filament\Resources\XotBaseResource;
class MyResource extends XotBaseResource {}

// ✅ MULTILINGUAL MODULES (Cms, Lang, Blog, News)
use Modules\Lang\Filament\Resources\LangBaseResource;
```

#### 2. NEVER Redeclare Inherited Traits
```php
// ❌ WRONG - Redundant trait declaration
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Traits\HasXotTable;  // Already inherited!

class MyRelationManager extends XotBaseRelationManager {
    use HasXotTable;  // ❌ Duplicated from parent
}

// ✅ CORRECT - Trust inheritance
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class MyRelationManager extends XotBaseRelationManager {
    // HasXotTable available via inheritance
}
```

#### 3. ServiceProvider Single Responsibility
```php
// ❌ WRONG - Mixed concerns
class UserServiceProvider extends XotBaseServiceProvider {
    use HasPassportConfiguration;  // Passport has own provider
}

// ✅ CORRECT - One provider = one concern
class UserServiceProvider extends XotBaseServiceProvider {
    // Only User-related logic
}
```

#### 4. NEVER Use property_exists() with Eloquent
```php
// ❌ GRAVEMENTE ERRATO
if (property_exists($user, 'full_name') && $user->full_name) { }

// ✅ CORRETTO
if (isset($user->full_name) && $user->full_name) { }
```

### Database & Models
- Migrations auto-discovered from all modules
- Use descriptive timestamps in migration names
- Models extend base classes from Xot module
- Follow Laravel naming conventions for tables/columns

### Frontend Development
- Tailwind CSS v4 via Vite with `@tailwindcss/vite`
- Filament handles most UI - avoid custom frontend unless necessary
- Build assets with `npm run build`

### PHPStan Compliance
- Runs at **level max** (most strict)
- **Zero tolerance**: ALL errors must be resolved
- Focus analysis on `./Modules/` directory
- Use `--memory-limit=-1` for large runs
- Configuration in `phpstan.neon` - never pass level parameter

### Pest Testing Standards
```php
<?php

declare(strict_types=1);

use Modules\User\Models\User;

uses(\Modules\User\Tests\TestCase::class);

describe('User Management', function () {
    it('can create user with valid data', function () {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        expect($user->name)->toBe('Test User');
        expect($user->email)->toBe('test@example.com');
    });
});
```

## Module Development Workflow

1. **Determine module ownership** for new functionality
2. **Check `module.json`** for dependencies before adding cross-module code
3. **Create migrations** in appropriate module directory
4. **Write tests** following Pest syntax and no-RefreshDatabase rule
5. **Extend XotBase classes** for all Filament components
6. **Run PHPStan** and resolve ALL errors before considering work complete

## Quality Gates

Before completing any task, ensure:
- ✅ PHPStan passes with zero errors (`./vendor/bin/phpstan analyse`)
- ✅ Code formatted with Pint (`./vendor/bin/pint`)
- ✅ Tests pass using Pest syntax
- ✅ All classes extend appropriate XotBase/LangBase classes
- ✅ No case-sensitive file naming conflicts
- ✅ No trait redeclarations from parent classes

## Common Patterns

### Resource Extension
```php
class MyResource extends XotBaseResource
{
    // NO getTableColumns() - handled automatically
    // NO navigation properties - handled automatically
    
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            // Your form fields
        ];
    }
}
```

### Model Best Practices
```php
class MyModel extends BaseModel
{
    #[\Override]
    protected function casts(): array  // PHP 8.2+ syntax
    {
        return [
            'is_active' => 'boolean',
            'config' => 'array',
        ];
    }
    
    // Use isset(), not property_exists()
    public function getDisplayNameAttribute(): string
    {
        return isset($this->name) ? $this->name : 'Unknown';
    }
}