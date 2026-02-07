# AGENTS.md

This file provides essential guidance for agentic coding agents working in this Laravel modular application with Filament v4.

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

#### 🚫 **CONTROLLERS ARE BANNED** - CRITICAL RULE
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