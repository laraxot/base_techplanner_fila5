---
paths:
  - "laravel/Modules/**/*.php"
  - "laravel/Themes/**/*.blade.php"
---

# Filament 5.x — Section Namespace Rule

## REGOLA PERMANENTE: Section viene SEMPRE da Filament\Schemas\Components\Section

### Vincolo assoluto

```
OBBLIGATORIO: use Filament\Schemas\Components\Section;
VIETATO: use Filament\Forms\Components\Section;
VIETATO: use Filament\Infolists\Components\Section;
```

### Perché

In Filament 5.x il package `filament/schemas` è il layer unificato per tutti i componenti
di layout (Section, Grid, Fieldset, Tabs, Wizard, ecc.). Le classi `Section` presenti in
`filament/forms` e `filament/infolists` NON esistono più o non sono intercambiabili.

Ref ufficiale: https://filamentphp.com/docs/5.x/schemas/sections

### Namespace completi Filament 5.x

| Componente | Namespace corretto |
|---|---|
| `Section` | `Filament\Schemas\Components\Section` |
| `Grid` | `Filament\Schemas\Components\Grid` |
| `Fieldset` | `Filament\Schemas\Components\Fieldset` |
| `Tabs` | `Filament\Schemas\Components\Tabs` |
| `Wizard` | `Filament\Schemas\Components\Wizard` |
| `Text` | `Filament\Schemas\Components\Text` |
| `Get` (utility) | `Filament\Schemas\Components\Utilities\Get` |
| `Set` (utility) | `Filament\Schemas\Components\Utilities\Set` |
| `TextEntry` | `Filament\Infolists\Components\TextEntry` |
| `ImageEntry` | `Filament\Infolists\Components\ImageEntry` |
| `TextInput` | `Filament\Forms\Components\TextInput` |
| `Select` | `Filament\Forms\Components\Select` |

### Pattern corretto

```php
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;

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
                ]),
            ]),
    ];
}
```

### API Section (Filament 5.x docs)

```php
Section::make('label')        // titolo
    ->description('...')      // sotto-titolo
    ->icon('heroicon-o-...')  // icona
    ->aside()                 // layout aside (form a destra)
    ->collapsible()           // collassabile
    ->collapsed()             // collassato di default
    ->compact()               // padding ridotto
    ->secondary()             // stile secondario
    ->schema([...])           // contenuto
```

### Errori comuni provocati dal linter (Pint/PHP-CS-Fixer)

Se il linter trova più import `Section` (Forms + Schemas + Infolists), li aliasa tutti e tre:
```php
// ❌ COSA PRODUCE IL LINTER (SBAGLIATO)
use Filament\Forms\Components\Section as FormSection;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Schemas\Components\Section as SchemaSection;
// poi `Section::make()` non risolve più!
```

**Fix**: rimuovere i due import errati, tenere SOLO:
```php
use Filament\Schemas\Components\Section;
```

### Documentazione

- Regola infolist+wizard: `bashscripts/ai/.claude/rules/filament5-infolist-wizard-summary.md`
- Root wiki: `docs/wiki/concepts/filament5-section-namespace.md`
- Fixcity wiki: `laravel/Modules/Fixcity/docs/wiki/concepts/filament5-schema-namespaces-and-wizard-summary.md`
