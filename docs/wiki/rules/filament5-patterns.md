# Filament 5.x — Schema, Section, Wizard Summary Patterns

Consolida le rule per Filament 5.x: namespace Section, Infolist nel Wizard Summary step.

## Section / Layout namespace

OBBLIGATORIO: `use Filament\Schemas\Components\Section;` — il package `filament/schemas` è il layer unificato.
VIETATO: `Filament\Forms\Components\Section` o `Filament\Infolists\Components\Section`.

| Componente | Namespace |
|---|---|
| Section, Grid, Fieldset, Tabs, Wizard, Text | `Filament\Schemas\Components\<X>` |
| Get, Set utilities | `Filament\Schemas\Components\Utilities\<X>` |
| TextEntry, ImageEntry | `Filament\Infolists\Components\<X>` |
| TextInput, Select | `Filament\Forms\Components\<X>` |

API: `Section::make('label')->description()->icon()->aside()->collapsible()->collapsed()->compact()->secondary()->schema([...])`.

Bug linter ricorrente: Pint/PHP-CS-Fixer aliasa tre `Section` come `FormSection/InfolistSection/SchemaSection` rompendo `Section::make()`. Fix: tenere solo `use Filament\Schemas\Components\Section;`.

## Wizard Summary step — Infolist, non SchemaView

Il summary step legge lo **stato del form**, non un record Eloquent. Pattern ufficiale: `TextEntry/ImageEntry` con `->state(fn(Get $get) => ...)`.

```php
use Filament\Infolists\Components\{TextEntry, ImageEntry};
use Filament\Schemas\Components\{Grid, Section, Utilities\Get};

public function getSummarySchema(): array
{
    return [
        Section::make()->schema([
            Grid::make(2)->schema([
                TextEntry::make('review_type')
                    ->state(fn (Get $get): string => (string) ($get('type_id') ?? '—')),
                TextEntry::make('review_name')
                    ->state(fn (Get $get): string => (string) ($get('name') ?? '—')),
            ]),
            TextEntry::make('review_location')->columnSpanFull()
                ->state(fn (Get $get): string => is_array($get('location'))
                    ? sprintf('%s, %s', $get('location')['latitude'] ?? '', $get('location')['longitude'] ?? '')
                    : '—'),
        ]),
        Section::make()->schema([
            ImageEntry::make('review_images')
                ->state(fn (Get $get): array => (array) ($get('images') ?? [])),
        ]),
    ];
}
```

## Anti-pattern

- `SchemaView::make(...)` per summary — non è Infolist
- `Infolist::make('name')` — non esiste come componente schema
- `TextEntry` senza `->state()` quando non c'è record
- `use Livewire\Forms\Form` (la base ha già `InteractsWithForms`)
- `use Filament\Infolists\Components\Infolist`

Ref: <https://filamentphp.com/docs/5.x/schemas/sections> · <https://filamentphp.com/docs/5.x/infolists/overview> · `docs/wiki/concepts/filament5-section-namespace.md` · `laravel/Modules/Fixcity/docs/wiki/concepts/filament5-schema-namespaces-and-wizard-summary.md`
