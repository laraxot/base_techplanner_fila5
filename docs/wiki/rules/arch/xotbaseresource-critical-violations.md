# Regola Windsurf – Violazioni Critiche XotBaseResource

## Ambito
- Globale (tutti i moduli, tutte le Filament Resources)

## Motivazione
- Garantire conformità assoluta all'architettura XotBaseResource di Laraxot
- Prevenire rottura della standardizzazione e del sistema di traduzioni automatico
- Mantenere centralizzazione e controllo architetturale

## Regola
- **DIVIETO ASSOLUTO**: MAI usare ->label(), ->placeholder(), ->helperText() in QUALSIASI componente Filament
- **DIVIETO ASSOLUTO**: MAI implementare getTableColumns(), getTableFilters(), getTableActions(), getTableBulkActions() nella Resource principale
- **DIVIETO ASSOLUTO**: MAI implementare getPages() se contiene solo route standard (index, create, edit, view)
- **OBBLIGO ASSOLUTO**: Resource principale deve contenere SOLO getFormSchema() e configurazione modello
- **OBBLIGO ASSOLUTO**: Metodi tabellari vanno SOLO nelle Pages specifiche (es. ListRecords)
- **OBBLIGO ASSOLUTO**: Traduzioni automatiche tramite file lang del modulo

## Esempio pratico

### ❌ GRAVEMENTE ERRATO
```php
class MyResource extends XotBaseResource
{
    // ❌ Metodi tabellari nella Resource principale - VIETATO!
    public static function getTableColumns(): array { ... }
    public static function getTableFilters(): array { ... }
    public static function getTableActions(): array { ... }
    public static function getTableBulkActions(): array { ... }

    // ❌ getPages() standard - VIETATO se standard!
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecords::route('/'),
            'create' => Pages\CreateRecord::route('/create'),
            'edit' => Pages\EditRecord::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema(): array
    {
        return [
            TextInput::make('field')
                ->label('Label')          // ❌ VIETATO!
                ->placeholder('Placeholder')  // ❌ VIETATO!
                ->helperText('Help'),     // ❌ VIETATO!
        ];
    }
}
```

### ✅ CORRETTO
```php
// Resource principale - SOLO getFormSchema()
class MyResource extends XotBaseResource
{
    protected static ?string $model = MyModel::class;

    public static function getFormSchema(): array
    {
        return [
            Section::make()  // NO ->label() - automatico da traduzioni
                ->schema([
                    TextInput::make('field')  // NO ->label() - automatico
                        ->required(),
                ]),
        ];
    }

    // NESSUN altro metodo se standard
}

// Page specifica - QUI vanno i metodi tabellari
class ListMyRecords extends XotBaseListRecords
{
    protected static string $resource = MyResource::class;

    public function getTableColumns(): array
    {
        return [
            'field' => TextColumn::make('field')  // NO ->label() - automatico
                ->searchable(),
        ];
    }

    // Altri metodi tabellari...
}
```

## Pattern e Anti-pattern identificati

### Pattern
- Resource principale con SOLO getFormSchema()
- Metodi tabellari nelle Pages specifiche
- Zero stringhe hardcoded (->label(), ->placeholder(), ->helperText())
- Traduzioni automatiche tramite file lang
- XotBaseResource gestisce tutto automaticamente

### Anti-pattern
- ->label(), ->placeholder(), ->helperText() ovunque
- Metodi tabellari nella Resource principale
- getPages() con route standard
- Duplicazione logica di XotBaseResource
- Stringhe hardcoded invece di traduzioni automatiche

## Errori comuni e soluzioni

### Errore: ->label() in componenti
**Causa**: Non comprensione del sistema di traduzioni automatico
**Soluzione**: Rimuovere ->label() e affidarsi ai file lang del modulo

### Errore: Metodi tabellari nella Resource
**Causa**: Non comprensione della separazione delle responsabilità
**Soluzione**: Spostare tutti i metodi tabellari nelle Pages specifiche

### Errore: getPages() standard
**Causa**: Non comprensione che XotBaseResource gestisce automaticamente
**Soluzione**: Rimuovere getPages() se contiene solo route standard

## Contesto bugfix
- **Versione**: Laraxot PTVX con XotBaseResource
- **Ambiente**: Tutti (sviluppo, staging, produzione)
- **Condizioni di trigger**: Creazione/modifica Filament Resources
- **Dipendenze**: XotBaseResource, LangServiceProvider, sistema traduzioni

## Checklist operativa
- [ ] Audit Resource per ->label(), ->placeholder(), ->helperText()
- [ ] Rimuovere TUTTI i metodi ->label() e simili
- [ ] Identificare metodi tabellari nella Resource principale
- [ ] Spostare metodi tabellari nelle Pages specifiche
- [ ] Rimuovere getPages() se standard
- [ ] Verificare file traduzioni completi
- [ ] Testare traduzioni automatiche
- [ ] Eseguire PHPStan per validazione
- [ ] Aggiornare documentazione modulo e root
- [ ] Creare/aggiornare memories permanenti

## Best Practice
- Studiare sempre XotBaseResource prima di creare Resources
- Comprendere il sistema di traduzioni automatico
- Rispettare la separazione delle responsabilità
- Documentare ogni personalizzazione non standard
- Testare sempre le traduzioni automatiche

## Collegamenti
- [docs/xotbaseresource-critical-violations.md](mdc:../../docs/xotbaseresource-critical-violations.md)
- [Modules/Progressioni/docs/xotbaseresource-violations-critical.md](mdc:../../laravel/Modules/Progressioni/docs/xotbaseresource-violations-critical.md)
- [Modules/Xot/docs/filament/resources/xot-base-resource.md](mdc:../../laravel/Modules/Xot/docs/filament/resources/xot-base-resource.md)

## Ultimo aggiornamento
2025-08-05
