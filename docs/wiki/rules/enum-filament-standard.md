# Enum Filament Standard - Global Rule

## 🚨 CRITICAL RULE

**FORBIDDEN:** Defining `label()`, `icon()`, `color()` methods in enums.

**REQUIRED:** Use only `getLabel()`, `getIcon()`, `getColor()` provided by `EnumTrait` or Filament interfaces.

---

## Why This Rule Exists

1. **Filament Compatibility**: Filament UI components expect `getLabel()`, `getIcon()`, `getColor()` via `HasLabel`, `HasIcon`, `HasColor` interfaces
2. **Consistency**: All enums use the same method names across the entire codebase
3. **DRY Principle**: `EnumTrait` already provides these methods - don't duplicate
4. **Maintainability**: Configuration via translations is easier than hardcoded match()

---

## ❌ Forbidden Pattern

```php
namespace Modules\Example\Enums;

use Modules\Xot\Traits\EnumTrait;

enum ExampleEnum: string
{
    use EnumTrait;
    
    case VALUE = 'value';
    
    // ❌ NEVER DO THIS:
    public function label(): string
    {
        return match ($this) {
            self::VALUE => 'Label',
        };
    }
    
    public function icon(): string  // ❌ FORBIDDEN
    public function color(): string   // ❌ FORBIDDEN
}
```

## ✅ Correct Pattern

```php
namespace Modules\Example\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Modules\Xot\Traits\EnumTrait;

enum ExampleEnum: string implements HasColor, HasIcon, HasLabel
{
    use EnumTrait;
    
    case VALUE = 'value';
    
    // Nothing else needed! EnumTrait provides:
    // - getLabel()  ← reads from translations
    // - getIcon()   ← reads from translations
    // - getColor()  ← reads from translations
    // - getDescription() ← reads from translations
}
```

---

## Translation Configuration

All enum values are configured via translation files:

```php
// Modules/Example/lang/it/enums.php
return [
    'example_enum' => [
        'values' => [
            'value' => [
                'label' => 'Etichetta',
                'icon' => 'heroicon-o-icon-name',
                'color' => 'primary',
                'description' => 'Descrizione opzionale',
            ],
        ],
    ],
];
```

Translation key format: `{namespace}::enums.{snake_case_enum}.values.{case_value}.{property}`

---

## Override Policy

If you need custom logic (not from translations), **override the `get*` methods**:

```php
public function getColor(): string
{
    return match ($this) {
        self::URGENT => 'danger',
        default => parent::getColor(), // or call trait method
    };
}
```

**Never** create `label()`, `icon()`, `color()` without the `get` prefix.

---

## Method Reference

| Method | Source | Usage |
|--------|--------|-------|
| `getLabel()` | EnumTrait | ✅ Use this |
| `getIcon()` | EnumTrait | ✅ Use this |
| `getColor()` | EnumTrait | ✅ Use this |
| `getDescription()` | EnumTrait | ✅ Use this |
| `label()` | ❌ Forbidden | Never implement |
| `icon()` | ❌ Forbidden | Never implement |
| `color()` | ❌ Forbidden | Never implement |

---

## Module Documentation

Each module documents its enums:

- **Notify**: `Modules/Notify/docs/wiki/concepts/enum-standards.md`
- **Geo**: `Modules/Geo/docs/wiki/concepts/enum-standards.md`
- **Blog**: `Modules/Blog/docs/wiki/concepts/enum-standards.md`
- **Fixcity**: `Modules/Fixcity/docs/wiki/concepts/enum-standards.md`

---

## Verification Commands

```bash
# Find forbidden methods in enums
grep -rn "public function label():" laravel/Modules/*/app/Enums/
grep -rn "public function icon():" laravel/Modules/*/app/Enums/
grep -rn "public function color():" laravel/Modules/*/app/Enums/

# Check PHPStan after changes
cd laravel && ./vendor/bin/phpstan analyse Modules/{Name}/app/Enums/ --memory-limit=2G

# Check with PHPMD
./tools/phpmd laravel/Modules/{Name}/app/Enums text unusedcode,design,codesize
```

---

## Related Rules

- **DRY Principle**: Don't duplicate EnumTrait methods
- **Filament Standards**: Follow Filament interface contracts
- **Translation-First**: Configure enums via lang files, not hardcoded values

---

**Severity: CRITICAL 🔴 - Zero Tolerance**

Last Updated: 2026-05-28
