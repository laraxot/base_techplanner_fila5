<<<<<<< HEAD
# CLAUDE.md — On-Demand Stub

Guida operativa completa: [docs/wiki/](docs/wiki/) · bootstrap: [agent-bootstrap-compact.md](docs/wiki/concepts/agent-bootstrap-compact.md)

## Session start

1. `docs/wiki/concepts/agent-bootstrap-compact.md`
2. `docs/wiki/rules/00-TRIGGER_MAP.md` → riga task
3. `bashscripts/docs/llm-wiki-qmd.sh search "<topic>" -n 5`

## Stack

Laravel modulare · Filament v5 · Folio/Volt · Pest · PHPStan max · `laravel/` codebase

## Commands

```bash
cd laravel && composer dev    # dev stack
cd laravel && composer test   # Pest
./vendor/bin/phpstan analyse Modules --memory-limit=-1
```

Dettaglio architettura, XotBase, migrazioni, test: **wiki on-demand**, non preloadare questo file oltre lo stub.

*Stub ≤50 righe — aggiornato 2026-06-06*
=======
# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Architecture

This is a Laravel application built with a **modular architecture** using the `nwidart/laravel-modules` package and **Filament v4** as the admin panel framework. The codebase follows a domain-driven design approach where each module represents a specific business domain.

### Dual-Root Structure
The project has a unique dual-root structure:
- **Root directory** (`/var/www/_bases/base_techplanner_fila4_mono/`): Contains bash scripts, documentation, AI configurations, and public web root
- **Laravel application** (`laravel/`): Main Laravel codebase with modules, themes, and vendor dependencies

### Core Technologies
- **Laravel Framework**: Base web application framework
- **Filament v4**: Admin panel framework for all UI components
- **Laravel Modules**: Modular architecture implementation with `wikimedia/composer-merge-plugin`
- **Pest**: Testing framework (with strict .env.testing configuration)
- **Vite**: Frontend build tool with Tailwind CSS v4

### Module Structure
The application is organized into 16 modules located in the `Modules/` directory:

**Core Infrastructure Modules:**
- `Xot`: Base functionality and shared utilities (dependency for most modules)
- `UI`: Shared UI components and Filament customizations
- `User`: User management and authentication
- `Tenant`: Multi-tenancy support
- `Lang`: Internationalization and localization

**Business Domain Modules:**
- `TechPlanner`: Technical planning and device management (main application domain)
- `Employee`: HR and employee management
- `Cms`: Content management system
- `Geo`: Geographic data and location services
- `Notify`: Notification and communication systems
- `Activity`: User activity tracking and logging
- `Media`: File and media management
- `Job`: Background job processing
- `Gdpr`: Data privacy and GDPR compliance

**Additional Modules:**
- `Chart`: Data visualization and reporting

Each module follows a consistent structure:
```
Modules/ModuleName/
├── app/
│   ├── Filament/           # Filament resources, pages, widgets
│   ├── Models/             # Eloquent models
│   ├── Http/Controllers/   # HTTP controllers
│   ├── Providers/          # Service providers
│   └── ...
├── database/
│   ├── migrations/
│   └── seeders/
├── tests/
├── composer.json           # Module-specific dependencies
└── module.json            # Module configuration
```

### Filament Integration
All admin interfaces are built using Filament v4:
- Resources are located in `Modules/*/app/Filament/Resources/`
- Custom pages in `Modules/*/app/Filament/Pages/`
- Widgets in `Modules/*/app/Filament/Widgets/`
- Each module can have its own Filament panel provider

## Development Commands

### Main Application Commands
```bash
# Start development environment (includes server, queue, logs, and Vite)
composer dev

# Full application setup and optimization
composer go

# Run tests
composer test
# OR
php artisan test

# Build frontend assets
npm run build

# Development with hot reload
npm run dev
```

### Module-Level Commands
Most modules support these commands (run from module directory or use composer scripts):
```bash
# Linting and code analysis
composer lint                    # Runs Pint + PHPStan
./vendor/bin/pint               # Code formatting
./vendor/bin/phpstan analyse    # Static analysis

# Testing
./vendor/bin/pest               # Run tests
./vendor/bin/pest --coverage-html coverage  # With coverage
```

### Laravel Artisan Commands
```bash
# Module management
php artisan module:list         # List all modules
php artisan module:enable ModuleName
php artisan module:disable ModuleName
php artisan module:make-command CommandName ModuleName  # Create new module command

# Filament commands
php artisan filament:upgrade    # Upgrade Filament
php artisan filament:optimize   # Optimize Filament

# Database
php artisan migrate            # Run migrations
php artisan migrate:fresh      # Fresh migration (development only)
php artisan db:seed           # Seed database

# Application
php artisan key:generate      # Generate application key
php artisan serve            # Start development server
php artisan config:clear     # Clear configuration cache (before tests)
```

### Quality Analysis Commands
```bash
# PHPStan static analysis (strict level max)
./vendor/bin/phpstan analyse Modules --memory-limit=-1
./vendor/bin/phpstan analyse --memory-limit=-1  # Full application analysis

# Code formatting with Pint
./vendor/bin/pint
composer lint  # Runs Pint + PHPStan (module-level)

# Additional quality tools
./vendor/bin/phpmd              # Mess detector
./vendor/bin/phpinsights        # Code insights
./vendor/bin/rector             # Automated refactoring

# Testing
composer test                   # Run all tests
./vendor/bin/pest               # Run Pest tests
./vendor/bin/pest --coverage-html coverage  # With coverage
```

## Critical Development Rules

### 1. Testing Configuration
**NEVER use `RefreshDatabase` in tests.** This project uses a special testing configuration:
- Tests must use `.env.testing` with SQLite in-memory database
- Use `DatabaseTransactions` instead of `RefreshDatabase` when needed
- This ensures tests run in seconds instead of minutes
- **Mandatory Pest testing**: Use Pest functional syntax (`it()`, `test()`) instead of PHPUnit class-based tests
- **CRITICAL**: If a test fails, the test is wrong (the site works correctly)

### 2. Case-Sensitive Naming
**NEVER create files with names that differ only by case sensitivity:**
- Always use consistent PascalCase for files and classes
- Avoid conflicts like `TimeclockWidget.php` vs `TimeClockWidget.php`
- This prevents fatal autoloading errors across different filesystems

### 3. Module Dependencies
When working with modules, be aware of dependencies:
- Most modules depend on `Xot` module for base functionality
- Check `module.json` for specific module requirements
- Modules can have their own `composer.json` with dependencies
- Uses `wikimedia/composer-merge-plugin` to merge module composer.json files

### 4. PHPStan Zero Tolerance
- PHPStan runs at level `max` (most strict)
- All PHPStan errors must be resolved
- Focus analysis on `./Modules/` directory
- Use `--memory-limit=-1` for large analysis runs
- **NEVER pass level as parameter**: Configuration is in `phpstan.neon`

### 5. Filament Memory Optimization
- Use `FILAMENT_OPTIMIZE_MEMORY=true` in production for 60-80% memory reduction
- Custom `.env.filament_optimized` configuration available
- Performance improvements: 3x faster for large datasets

### 6. XotBase/LangBase Extension Rule (MANDATORY)
**NEVER extend Filament classes directly. ALWAYS extend XotBase OR LangBase abstract classes.**

⚠️ **CRITICAL**: Check if module is multilingual FIRST!

```php
// ❌ WRONG
use Filament\Resources\Pages\ListRecords;
class MyPage extends ListRecords { }

// ✅ FOR NON-MULTILINGUAL MODULES
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
class MyPage extends XotBaseListRecords { }

// ✅ FOR MULTILINGUAL MODULES (Cms, Blog, News)
use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;
class MyPage extends LangBaseListRecords { }
```

### 7. property_exists() Prohibition with Eloquent Models
**MAI utilizzare `property_exists()` con modelli Eloquent o oggetti che implementano `__get()`/`__set()`.**

```php
// ❌ GRAVEMENTE ERRATO - MAI FARE QUESTO
if (property_exists($user, 'full_name') && $user->full_name) {
    return $user->full_name;
}

// ✅ CORRETTO - Usare isset per proprietà magiche
if (isset($user->full_name) && $user->full_name) {
    return $user->full_name;
}
```

### 8. NEVER Redeclare Inherited Traits (DRY Principle)
**NEVER use a trait explicitly if the parent class already includes it.**

This is a critical architectural rule to prevent redundancy and maintain the DRY (Don't Repeat Yourself) principle.

```php
// ❌ WRONG - XotBaseRelationManager already uses HasXotTable
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Traits\HasXotTable;  // ❌ REDUNDANT

class UsersRelationManager extends XotBaseRelationManager
{
    use HasXotTable;  // ❌ ALREADY INHERITED from parent

    #[\Override]
    public function getTableColumns(): array
    {
        return [/* ... */];
    }
}

// ✅ CORRECT - Trust the inheritance
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class UsersRelationManager extends XotBaseRelationManager
{
    // ✅ HasXotTable is ALREADY available via inheritance

    #[\Override]
    public function getTableColumns(): array
    {
        return [/* ... */];
    }
}
```

**Why this matters:**
- XotBaseRelationManager already includes HasXotTable trait (line 32)
- 88% of RelationManager in the codebase follow this pattern
- Redeclaring creates confusion and violates DRY principle
- No additional functionality is gained by redeclaring

**Documentation:** See `/laravel/Modules/Xot/docs/philosophy/xotbase-trait-inheritance-zen.md`

### 9. Single Responsibility Principle for ServiceProviders
**Each ServiceProvider MUST have ONE responsibility. NEVER mix concerns using traits.**

If a dedicated ServiceProvider exists for a specific concern (e.g., Passport, Socialite), do NOT include that logic in other ServiceProviders.

```php
// ❌ WRONG - UserServiceProvider with Passport concerns
use Modules\User\Providers\Traits\HasPassportConfiguration;

class UserServiceProvider extends XotBaseServiceProvider
{
    use HasPassportConfiguration;  // ❌ VIOLATES SRP

    public function boot(): void
    {
        $this->configurePassport();      // ❌ Passport concern
        $this->registerPasswordRules();  // ✅ User concern
        $this->registerPulse();          // ✅ User concern
    }
}

// ✅ CORRECT - Separation of Concerns
class UserServiceProvider extends XotBaseServiceProvider
{
    // ✅ ONLY User-related concerns

    public function boot(): void
    {
        $this->registerPasswordRules();      // ✅ User
        $this->registerPulse();              // ✅ User
        $this->registerMailsNotification();  // ✅ User
        $this->registerPolicies();           // ✅ User
    }
}

// ✅ Passport has its own dedicated ServiceProvider
class PassportServiceProvider extends ServiceProvider
{
    // ✅ ONLY Passport/OAuth concerns

    public function boot(): void
    {
        $this->configureRoutes();
        $this->configureTokenExpiration();
        $this->configureModels();
    }
}
```

**Key principles:**
- One ServiceProvider = One domain/concern
- All ServiceProviders MUST be registered in `module.json` providers array
- Traits are NOT ServiceProviders - don't use them to separate concerns
- Laravel auto-loads providers from `module.json` - leverage this system

**Registration in module.json:**
```json
{
    "providers": [
        "Modules\\User\\Providers\\UserServiceProvider",
        "Modules\\User\\Providers\\PassportServiceProvider",
        "Modules\\User\\Providers\\SocialiteServiceProvider"
    ]
}
```

**Documentation:** See `/laravel/Modules/User/docs/philosophy/service-provider-separation-zen.md`

## Code Standards

### File Organization
- Follow the established module structure
- Place Filament resources in appropriate module directories
- Use consistent naming conventions (PascalCase for classes/files)
- Models should extend base classes from Xot module when available

### Database Conventions
- Migrations are auto-discovered from all modules
- Use descriptive migration names with timestamps
- Follow Laravel naming conventions for tables and columns

### Frontend Development
- Tailwind CSS v4 is configured via Vite with `@tailwindcss/vite`
- Frontend assets are built using `npm run build` or `npm run dev`
- Vite configuration in `vite.config.js` with Laravel plugin
- Filament handles most UI components - avoid custom frontend unless necessary
- Themes system supports theme-specific Vite configurations

## Testing Strategy

### Environment Setup
- Tests use `.env.testing` with SQLite in-memory database
- Array cache and session drivers for speed
- Synchronous queue connection for immediate testing

### Test Organization
- Feature tests in `Modules/*/tests/Feature/`
- Unit tests in `Modules/*/tests/Unit/`
- Each module can have its own test suite
- Use Pest testing framework with functional syntax

### Running Tests
```bash
# Full test suite
composer test
php artisan test

# Module-specific tests
cd Modules/ModuleName && ./vendor/bin/pest
php artisan test --filter="ModuleName"

# With coverage
./vendor/bin/pest --coverage-html coverage
php artisan test --coverage

# Test organization
- Feature tests in `Modules/*/tests/Feature/`
- Unit tests in `Modules/*/tests/Unit/`
- Each module can have its own test suite
- Use Pest testing framework with functional syntax
```

## Working with Filament

### Critical XotBase Extension Rule
**NEVER extend Filament classes directly. ALWAYS extend the corresponding XotBase abstract class.** This is the most important architectural rule in Laraxot/PTVX.

### XotBase Class Mapping
| Filament Original Class | XotBase Class to Extend |
|-------------------------|-------------------------|
| `Filament\Resources\Resource` | `Modules\Xot\Filament\Resources\XotBaseResource` |
| `Filament\Resources\Pages\Page` | `Modules\Xot\Filament\Resources\Pages\XotBasePage` |
| `Filament\Resources\Pages\ListRecords` | `Modules\Xot\Filament\Resources\Pages\XotBaseListRecords` |
| `Filament\Resources\Pages\CreateRecord` | `Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord` |
| `Filament\Resources\Pages\EditRecord` | `Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord` |
| `Filament\Resources\Pages\ViewRecord` | `Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord` |
| `Filament\Widgets\Widget` | `Modules\Xot\Filament\Widgets\XotBaseWidget` |
| `Filament\Resources\RelationManagers\RelationManager` | `Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager` |
| `Filament\Pages\Dashboard` | `Modules\Xot\Filament\Pages\XotBaseDashboard` |
| `Filament\Pages\Page` | `Modules\Xot\Filament\Pages\XotBasePage` |
| `Illuminate\Support\ServiceProvider` | `Modules\Xot\Providers\XotBaseServiceProvider` |

### Resource Development
- Always extend `XotBaseResource` instead of `Filament\Resources\Resource`
- Do NOT implement `getTableColumns()` method in resources extending `XotBaseResource` (handled automatically)
- Do NOT implement standard methods like `getPages()`, `getRelations()`, `getTableActions()` if they return only standard values

### Page Development
- Always extend `XotBasePage` instead of `Filament\Pages\Page`
- Do NOT define `$navigationIcon`, `$title`, `$navigationLabel` properties in pages extending `XotBasePage` (handled automatically)

### Service Providers
- Always extend `XotBaseServiceProvider` instead of `Illuminate\Support\ServiceProvider`

### Deprecations and Best Practices
- **BadgeColumn deprecated**: Use `TextColumn::make('status')->badge()` instead of `BadgeColumn::make('status')`
- **Laravel 11+ casts**: Use `protected function casts(): array` instead of `protected $casts` property
- **Translation management**: Use translation files instead of direct `->label()` calls
- **Actions over Services**: Use Spatie Queueable Actions instead of traditional services
- **Method signatures**: Always match parent/trait method signatures exactly - static vs non-static matters
- **Abstract methods**: ALL abstract methods from parent classes and traits MUST be implemented

### Panel Management
- Each module can register its own panel provider
- Check existing panel configurations before creating new ones
- Use consistent navigation and authorization patterns

## Module Development Workflow

1. **Creating new functionality**: Determine which module it belongs to
2. **Cross-module dependencies**: Update `module.json` requirements
3. **Database changes**: Create migrations in the appropriate module
4. **Testing**: Ensure tests follow the no-RefreshDatabase rule and use Pest syntax
5. **Filament integration**: Use existing patterns from other modules

## Development Tools & Scripts

### Bash Scripts (`bashscripts/`)
- 189+ utility scripts for development, git conflict resolution, and automation
- Documentation cleanup and analysis scripts
- Syntax error detection
- Dual repository pushing
- Organized into subfolders: `docs/`, `db/`, `cache/`, etc.
- All scripts must live inside dedicated subfolders, not at root
- **Script placement**: Scripts go in `bashscripts/`, never in Laravel root

## Decision Making and Prioritization

### Autonomy in Task Management
**CRITICAL RULE: L'ordine e le priorità le scelgo sempre io.** As Claude Code, I have full autonomy to determine the order and priorities of tasks based on:
- Technical dependencies and prerequisites
- Risk assessment and potential impact
- Efficiency and logical workflow
- Codebase architecture and best practices
- User requirements and business value

This rule must be remembered and applied in all development activities, ensuring that I make informed decisions about task sequencing without requiring explicit user direction for every step.

### Themes System
- `laravel/Themes/Sixteen/` - Complete theme with its own Vite configuration
- Supports theme-specific build configurations
- Theme system integrated with modular architecture

### Docker Support
- Multi-PHP version configurations (8.0-8.5)
- Database variants (MySQL, MariaDB, PostgreSQL)
- Docker configurations in `docker/` directory

### AI Configuration
- `.cursor/rules/` - Extensive Cursor rule files (32,768+)
- `.claude/instructions.md` - Detailed Claude guidelines
- `.ai/guidelines/` - Additional AI instructions (40+ files)
- `.windsurf/` configuration for development tools

## Environment Requirements
- **PHP**: ^8.2 (Docker supports 8.0-8.5)
- **Database**: SQLite (default), MySQL/PostgreSQL supported
- **Cache**: Database/Array
- **Queue**: Database/Sync
- **Frontend**: Vite + TailwindCSS v4
>>>>>>> 6ed19256f (.)
