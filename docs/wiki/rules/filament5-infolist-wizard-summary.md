---
paths:
  - "laravel/Modules/**/*.php"
  - "laravel/Themes/**/*.blade.php"
---

# Filament 5.x — Infolist nel Wizard Summary Step

## REGOLA PERMANENTE: getSummarySchema usa componenti Infolist, NON SchemaView

### Vincolo assoluto

```
OBBLIGATORIO: usare TextEntry / ImageEntry / Section / Grid da Filament Infolists + Schemas
VIETATO: SchemaView::make() — non è il pattern corretto per il summary
VIETATO: Infolist::make() — non è un componente Schema, non esiste in questo contesto
VIETATO: TextEntry senza ->state() quando non c'è un record Eloquent
```

### Perché

Il summary step di un wizard non ha un record Eloquent — ha lo stato del form.
`TextEntry` in Filament 5.x supporta `->state(fn(Get $get) => ...)` per leggere lo stato
del form via la utility `Get`. Questo è il pattern ufficiale Filament 5.x.

Ref: https://filamentphp.com/docs/5.x/infolists/overview

### Pattern corretto (Form Schema)

```php
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Utilities\Get;

public function getFormSchema(): array
{
    return [
        Section::make('Titolo sezione')
            ->description('Descrizione opzionale')
            ->icon('heroicon-o-information-circle')
            ->collapsible()
            ->schema([
                Grid::make(2)->schema([
                    // campi form
                    Text::make('field1'),
                    Text::make('field2'),
                ]),
            ]),
    ];
}
```

### Pattern corretto (Summary Schema)

```php
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;

public function getSummarySchema(): array
{
    return [
        Section::make()->schema([
            Grid::make(2)->schema([
                TextEntry::make('review_type')
                    ->state(fn (Get $get): string => (string) ($get('type_id') ?? '—')),
                TextEntry::make('review_name')
                    ->state(fn (Get $get): string => (string) ($get('name') ?? '—')),
                TextEntry::make('review_content')
                    ->state(fn (Get $get): string => (string) ($get('content') ?? '—')),
                TextEntry::make('review_email')
                    ->state(fn (Get $get): string => (string) ($get('email') ?? '—')),
            ]),
            TextEntry::make('review_location')
                ->columnSpanFull()
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

### Namespace corretti Filament 5.x

| Componente | Namespace |
|---|---|
| `TextEntry` | `Filament\Infolists\Components\TextEntry` |
| `ImageEntry` | `Filament\Infolists\Components\ImageEntry` |
| `Section` | `Filament\Schemas\Components\Section` |
| `Grid` | `Filament\Schemas\Components\Grid` |
| `Get` (utility) | `Filament\Schemas\Components\Utilities\Get` |
| `Text` (wizard forms) | `Filament\Schemas\Components\Text` |

### Errori comuni da NON ripetere

- `SchemaView::make(...)` — non è infolist, è un componente view generico
- `Infolist::make('name')` — `Infolist` non è un componente schema
- `use Livewire\Forms\Form` — NON importare, gestito da `InteractsWithForms` nella base
- `use Filament\Infolists\Components\Infolist` — non esiste come componente

### Documentazione

- Root wiki: `docs/wiki/concepts/filament-summary-infolist-rule.md`
- Fixcity wiki: `laravel/Modules/Fixcity/docs/wiki/concepts/filament5-schema-namespaces-and-wizard-summary.md`
- Xot reference: `laravel/Modules/Xot/app/Filament/Resources/LogResource/Pages/ViewLog.php`
