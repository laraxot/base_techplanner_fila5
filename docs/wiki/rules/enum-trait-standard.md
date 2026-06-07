# Rule: Enum Management via EnumTrait

## Intent
Enforce a unified, metadata-driven approach for all PHP Enums in the codebase. By using `Modules\Xot\Traits\EnumTrait`, Enums become more than just constants; they become self-describing architectural components.

## The Doctrine (Why EnumTrait?)
- **Single Source of Truth (DRY)**: Centralizes labels, colors, icons, and descriptions in language files (`lang/it/enum_name.php`).
- **Architectural Beauty**: Enums automatically implement Filament contracts (`HasLabel`, `HasColor`, `HasIcon`) without manual method replication.
- **Systemic Integration**: Provides helper methods for migrations (`columns()`), form schemas (`getFormSchema()`), and searchable lists.
- **The Zen of Flexibility**: Decouples the internal value (string) from its visual and linguistic representation (labels/icons).

## Mandatory Requirements
1. **Namespace**: All Enums must reside in `Modules\<Module>\Enums`.
2. **Trait Usage**: EVERY Enum must use `Modules\Xot\Traits\EnumTrait`.
3. **Interfaces**: Enums should ideally implement `HasLabel`, `HasColor`, and `HasIcon` from Filament.
4. **No Logic in Enums**: Do NOT hardcode labels or colors inside the Enum class. Use the trait to resolve them from translations.

## Example Structure
```php
namespace Modules\Fixcity\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Modules\Xot\Traits\EnumTrait;

enum TicketStatusEnum: string implements HasColor, HasIcon, HasLabel
{
    use EnumTrait;

    case OPEN = 'open';
    case CLOSED = 'closed';
}
```

## Translation Schema (lang/it/ticket_status_enum.php)
```php
return [
    'values' => [
        'open' => [
            'label' => 'Aperto',
            'color' => 'success',
            'icon' => 'heroicon-o-check-circle',
        ],
    ],
];
```
