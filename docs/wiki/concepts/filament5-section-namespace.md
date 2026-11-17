# Filament 5.x — Section Namespace

**Regola**: `Section` viene SEMPRE da `Filament\Schemas\Components\Section`.

## Namespace corretti

| Componente | Namespace |
|---|---|
| `Section` | `Filament\Schemas\Components\Section` |
| `Grid` | `Filament\Schemas\Components\Grid` |
| `Text` | `Filament\Schemas\Components\Text` |
| `Get` | `Filament\Schemas\Components\Utilities\Get` |
| `TextEntry` | `Filament\Infolists\Components\TextEntry` |
| `ImageEntry` | `Filament\Infolists\Components\ImageEntry` |

## Anti-pattern linter

Pint/PHP-CS-Fixer aliasa più `Section` se ne trova da namespace diversi:
```php
// ❌ Prodotto dal linter — rompe Section::make()
use Filament\Forms\Components\Section as FormSection;
use Filament\Schemas\Components\Section as SchemaSection;
```
Fix: rimuovere tutti gli alias, tenere `use Filament\Schemas\Components\Section;`.

## Ref
- Docs: https://filamentphp.com/docs/5.x/schemas/sections
- Rule: `bashscripts/ai/.claude/rules/filament5-schemas-section.md`
