# AGENTS.md - Complete AI Agent Guidelines

> **Purpose**: Comprehensive guidelines for all AI agents working on this Laravel modular application

## 🚀 Build/Lint/Test Commands

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

## 🎨 Code Style Guidelines

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

## 🚫 Critical Architecture Rules

### 🔄 **GIT COMMIT/PUSH RULE** - CRITICAL RULE
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

### 🚫 **CONTROLLERS ARE BANNED** - CRITICAL RULE
**NEVER create or use traditional Laravel Controllers in this project!**

This project uses **Folio + Volt + Laraxot** architecture:
- **Folio**: File-based routing (`resources/views/pages/`)
- **Volt**: Reactive components for interactivity  
- **Actions**: For business logic (when needed)
- **NO Controllers**: Traditional `app/Http/Controllers/` are forbidden

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

### 🚫 **FORMS MUST USE FILAMENT WIDGETS** - CRITICAL RULE
**NEVER create HTML forms manually in Blade views!**

All forms (login, register, contact, etc.) must use Filament widgets via `@livewire`:

```php
// ❌ NEVER DO THIS - FORBIDDEN!
// resources/views/pages/auth/login.blade.php
<form method="POST" action="/login">
    @csrf
    <input type="email" name="email">
    <input type="password" name="password">
    <button type="submit">Accedi</button>
</form>

// ✅ CORRECT - Use Filament Widget
// resources/views/pages/auth/login.blade.php
@livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)
```

**Why:**
- Filament widgets handle validation, CSRF, security automatically
- Consistent UI across the application
- Better developer experience with form building

**How to add a Filament widget to a Blade page:**
```blade
@livewire(\Modules\YourModule\Filament\Widgets\YourWidget::class)
```

**See also:** [Filament Widgets Documentation](https://filamentphp.com/docs/3.x/widgets/adding-a-widget-to-a-blade-view)

### 1. NEVER Extend Filament Directly
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

### 2. NEVER Redeclare Inherited Traits
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

### 3. ServiceProvider Single Responsibility
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

### 4. NEVER Use property_exists() with Eloquent
```php
// ❌ GRAVEMENTE ERRATO
if (property_exists($user, 'full_name') && $user->full_name) { }

// ✅ CORRETTO
if (isset($user->full_name) && $user->full_name) { }
```

### 6. Widget Root Tag - CRITICAL RULE
**TUTTI i widget Filament DEVONO avere un root HTML tag nella loro view Blade.**

```blade
{{-- ❌ SBAGLIATO - Widget senza root tag --}}
@if ($condition)
    <div>Content</div>
@endif

{{-- ✅ CORRETTO - Sempre un root tag --}}
@if ($condition)
    <div>
        <div>Content</div>
    </div>
@else
    <div class="hidden"></div>
@endif
```

**Perché:** Livewire richiede un root HTML tag per il rendering. Senza, si ottiene l'errore "Missing root tag".

### 7. SVG Icons - NO Hardcoded in Blade
**Gli SVG non vanno hardcoded nelle Blade view. Usare `<x-filament::icon>` o `@svg()`.**

```blade
{{-- ❌ SBAGLIATO - SVG hardcoded --}}
<svg xmlns="http://www.w3.org/2000/svg">
    <path d="..."/>
</svg>

{{-- ✅ CORRETTO - Icona UI module --}}
<x-filament::icon icon="ui-google" class="w-5 h-5" />
<x-filament::icon icon="ui-brands.microsoft" class="w-5 h-5" />
<x-filament::icon icon="ui-brands.github" class="w-5 h-5" />
```

**Icone disponibili nel modulo UI:**
- `ui-google` → `Modules/UI/resources/svg/google.svg`
- `ui-brands.microsoft` → `Modules/UI/resources/svg/brands/microsoft.svg`
- `ui-brands.github` → `Modules/UI/resources/svg/brands/github.svg`
- `ui-login` → `Modules/UI/resources/svg/login.svg`
- `ui-logout` → `Modules/UI/resources/svg/logout.svg`
- Heroicons: `heroicon-o-*`, `heroicon-s-*` (già registrati da Filament)

**Documentazione:** [Modules/UI/docs/no-svg-hardcoded-in-blade.md](Modules/UI/docs/no-svg-hardcoded-in-blade.md)

### 8. Social Login Providers - Dynamic Configuration
**I widget di login social DEVONO mostrare solo i provider configurati.**

```php
public function getProviders(): array
{
    $providers = [];
    
    if (config('services.google.client_id')) {
        $providers[] = ['driver' => 'google', 'label' => __('user::auth.social.google')];
    }
    
    if (config('services.microsoft.client_id')) {
        $providers[] = ['driver' => 'microsoft', 'label' => __('user::auth.social.microsoft')];
    }
    
    return $providers;
}
```

### 9. Translation Namespace for Auth
**Le traduzioni per autenticazione usano il namespace `user::auth.*`**

```php
// ❌ SBAGLIATO
__('user::auth.login.google')

// ✅ CORRETTO
__('user::auth.social.google')  // per social login
__('user::auth.login.email')    // per login email
```

### 5. Composer Module Dependencies - CRITICAL RULE
**Le dipendenze specifiche di un modulo vanno in `Modules/{ModuleName}/composer.json`, MAI nel root `laravel/composer.json`.**

```php
// ❌ SBAGLIATO - Dependency in laravel/composer.json
"require": {
    "socialiteproviders/microsoft": "^4.8"
}

// ✅ CORRETTO - Dependency in Modules/User/composer.json
// (per OAuth/login, la dipendenza va nel modulo User)
```

**Esempi:**
- Microsoft OAuth → `Modules/User/composer.json`
- Google OAuth → `Modules/User/composer.json`
- Geo features → `Modules/Geo/composer.json`

## 🗄️ Database & Models

### 🚨 CRITICAL: Migration Rules

1. **ONE migration per table**: Only ONE migration creates each table. To modify, edit SAME file and UPDATE timestamp in filename. NEVER create separate `add_column_to_table.php` migrations.

2. **ALWAYS use XotBaseMigration**:
```php
use Modules\Xot\Database\Migrations\XotBaseMigration;
return new class extends XotBaseMigration { ... };
```

3. **main_module Rule**: Models strictly dependent on main_module (Profile, Tenant, Team): migration goes in main module (TechPlanner), NOT in User.

4. **UUID → Bigint**: Use `convertIdFromUuidToBigintIfNeeded()` for legacy UUID conversion (adds uuid column for external use).

### 🚫 **NO Module-Specific Database Connections** - CRITICAL RULE (with Activity exception)
**NEVER create dedicated database connections for modules (e.g. `cms`, `gdpr`) in config/database.php.**

- All modules use the default connection (mysql)
- Exception: **`activity` module** uses dedicated `'activity'` connection for event sourcing isolation
- See: [database-connections](.cursor/rules/database-connections.mdc)

### Standard
- Migrations auto-discovered from all modules
- Use descriptive timestamps in migration names
- Models extend base classes from Xot module
- Follow Laravel naming conventions for tables/columns

## 🎨 Frontend Development
- Tailwind CSS v4 via Vite with `@tailwindcss/vite`
- Filament handles most UI - avoid custom frontend unless necessary
- Build assets with `npm run build`

### 🚫 **NO CDN FOR THEME ASSETS** - CRITICAL RULE
**NEVER load JavaScript libraries from CDN in theme layouts!**

Theme assets (CSS/JS) must be built locally:
```bash
cd laravel/Themes/ThemeName
npm install
npm run build
npm run copy
```

**Alpine.js**: 
- **Locale (dev):** Already included in Livewire/Filament bundle. No CDN needed.
- **Produzione:** Use CDN: `<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>`

**Why:** In production, the local theme build may not be deployed, but Livewire/Filament always need Alpine.js. Loading from CDN avoids "multiple instances" errors when local bundle is missing.

Note: Build local theme assets with `npm run build && npm run copy` for full local delivery.

### 🎨 Theme View Namespaces - CRITICAL RULE

**SEMPRE usare `pub_theme::` come namespace per le view dei temi, MAI `themes.two::` o simili.**

```php
// ❌ SBAGLIATO
@include('themes.two::components.sections.header')

// ✅ CORRETTO
@include('pub_theme::components.sections.header')
```

**Perché:** Il tema attivo viene registrato dinamicamente come namespace `pub_theme` in CmsServiceProvider. Usare `pub_theme::` garantisce compatibilità tra temi diversi.

### 📸 Screenshots Location
**ALWAYS save screenshots in docs subfolders inside modules/themes, NEVER in /tmp**

- ✅ **CORRECT:** `Modules/ModuleName/docs/screenshots/page.png`
- ✅ **CORRECT:** `Themes/Two/docs/fix/screenshots/error.png`
- ❌ **WRONG:** `/tmp/screenshot.png`

## 🔍 PHPStan Compliance
- Runs at **level max** (most strict)
- **Zero tolerance**: ALL errors must be resolved
- Focus analysis on `./Modules/` directory
- Use `--memory-limit=-1` for large runs
- Configuration in `phpstan.neon` - never pass level parameter

## 🧪 Pest Testing Standards
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

## 📦 Module Development Workflow

1. **Determine module ownership** for new functionality
2. **Check `module.json`** for dependencies before adding cross-module code
3. **Create migrations** in appropriate module directory
4. **Write tests** following Pest syntax and no-RefreshDatabase rule
5. **Extend XotBase classes** for all Filament components
6. **Run PHPStan** and resolve ALL errors before considering work complete

## ✅ Quality Gates

Before completing any task, ensure:
- ✅ PHPStan passes with zero errors (`./vendor/bin/phpstan analyse`)
- ✅ Code formatted with Pint (`./vendor/bin/pint`)
- ✅ Tests pass using Pest syntax
- ✅ All classes extend appropriate XotBase/LangBase classes
- ✅ No case-sensitive file naming conflicts
- ✅ No trait redeclarations from parent classes

## 🔄 Common Patterns

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
```

## 🧠 Error Resolution Patterns

### Serializable Closure Errors
When encountering `Cannot access offset of type Laravel\SerializableClosure\Serializers\Native`:

1. **Check Folio middleware** for inline closures
2. **Remove problematic closures** from service providers
3. **Implement direct logic** in page templates instead
4. **Test multi-language routes** thoroughly
5. **Document the fix** in module docs

### PHPStan Level 10 Errors
Follow the [phpstan-level10](.claude/skills/phpstan-level10) skill for comprehensive resolution.

### Translation Violations
Never use hardcoded strings in Filament components:
```php
// ❌ WRONG
TextInput::make('email')->label('Email Address')

// ✅ CORRECT
TextInput::make('email')->label(__('user.email'))
```

## ♿ WCAG Accessibility Guidelines

### Regole Fondamentali

1. **MAI rimuovere il focus indicator** (`outline: none` senza sostituto)
2. **Contrasto minimo 4.5:1** per testo normale, 3:1 per testo grande
3. **Label per tutti i form inputs** - usare `<label for="id">`
4. **Link con testo descrittivo** - mai link vuoti o con sole icone
5. **Autocomplete** su tutti i form fields appropriati
6. **Reflow 320px** - layout deve funzionare a 320px width

### Tecniche WCAG Obbligatorie

| Codice | Descrizione | File Reference |
|--------|-------------|---------------|
| H44 | Label form elements | [W3C](https://www.w3.org/WAI/WCAG21/Techniques/html/H44) |
| G195 | Focus visible | [W3C](https://www.w3.org/WAI/WCAG21/Techniques/general/G195) |
| G18 | Contrast ratio 4.5:1 | [W3C](https://www.w3.org/WAI/WCAG21/Techniques/general/G18) |
| H30 | Link text | [W3C](https://www.w3.org/WAI/WCAG21/Techniques/html/H30) |
| H98 | Autocomplete | [W3C](https://www.w3.org/WAI/WCAG21/Techniques/html/H98) |
| C38 | Reflow 320px | [W3C](https://www.w3.org/WAI/WCAG21/Techniques/css/C38) |

### Validazione

- **MAUVE++**: https://mauve.isti.cnr.it/ (validatore italiano WCAG)
- **WAVE**: https://wave.webaim.org/
- **axe-core**: `npx @axe-core/cli https://sottana.net/it`

### Documentazione

Vedi piano completo: `Themes/Two/docs/wcag-compliance-plan.md`

### Pre-Commit Accessibility Check

- [ ] Tutti i form hanno label con `for` attribute
- [ ] Focus indicator visibile (outline 3px, contrasto 3:1)
- [ ] Contrasto 4.5:1 verificato
- [ ] Link con testo o aria-label
- [ ] Autocomplete su form fields
- [ ] Layout funziona a 320px

## 📚 Documentation Standards

### Module Documentation
- Each module must have `docs/00-index.md` or `docs/README.md`
- Use relative links for cross-module references
- Follow naming conventions: lowercase `.md` files (except `README.md`)
- Update roadmaps after significant changes

### API Documentation
- Document all public methods and classes
- Include parameter types and return types
- Provide usage examples
- Link to related modules and functionality

## 🎯 Agent Memory & Learning

### Error Pattern Recognition
- **Serializable Closure**: Folio middleware with inline closures
- **PHPStan L10**: Missing types, array shapes, property_exists() usage
- **Translation violations**: Hardcoded labels in Filament components
- **XotBase violations**: Direct Filament extensions

### Solution Templates
- **Bug fixes**: Use [laraxot-bugfix-workflow](.claude/skills/laraxot-bugfix-workflow)
- **Code quality**: Use [phpstan-level10](.claude/skills/phpstan-level10)
- **Documentation**: Use [laraxot-docs-workflow](.claude/skills/laraxot-docs-workflow)
- **Module audit**: Use [module-audit](.claude/skills/module-audit)

### Continuous Improvement
1. **Learn from errors** - Document patterns and solutions
2. **Update skills** - Enhance skill files with new patterns
3. **Share knowledge** - Update documentation for other agents
4. **Test thoroughly** - Verify fixes work in all contexts
5. **Communicate clearly** - Document decisions and trade-offs

## 🚀 Advanced Agent Capabilities

### Multi-Module Coordination
- Understand module dependencies and relationships
- Coordinate changes across related modules
- Maintain consistency in patterns and conventions

### Performance Optimization
- Identify bottlenecks in module interactions
- Optimize database queries and eager loading
- Balance code quality with performance requirements

### Security Considerations
- Follow Laravel security best practices
- Validate user inputs properly
- Implement proper authorization checks

### Testing Strategies
- Write comprehensive unit and feature tests
- Use proper test data and factories
- Test edge cases and error conditions

## 📋 Quick Reference Checklist

### Before Commit
- [ ] PHPStan Level 10 passes
- [ ] Code formatted with Pint
- [ ] Tests pass (Pest syntax)
- [ ] No XotBase violations
- [ ] No translation violations
- [ ] Documentation updated

### After Major Changes
- [ ] Update module roadmap
- [ ] Document new patterns
- [ ] Test multi-language functionality
- [ ] Verify performance impact
- [ ] Update related documentation

### Error Resolution
- [ ] Identify root cause
- [ ] Implement minimal fix
- [ ] Test thoroughly
- [ ] Document solution
- [ ] Update skills/patterns

---

## 🎖️ Agent Excellence Standards

### Technical Excellence
- **Zero tolerance** for PHPStan errors
- **Strict adherence** to architectural patterns
- **Comprehensive testing** of all functionality
- **Performance awareness** in all solutions

### Documentation Excellence
- **Complete coverage** of all changes
- **Clear explanations** of complex concepts
- **Consistent formatting** across all documentation
- **Relative linking** for maintainability

### Collaboration Excellence
- **Clear communication** of decisions and trade-offs
- **Knowledge sharing** through updated skills and docs
- **Pattern recognition** and solution templates
- **Continuous learning** from errors and successes

---

*This document serves as the complete guide for all AI agents working on this Laravel modular application. Update it regularly with new patterns, solutions, and lessons learned.*