---
trigger: manual
description:
globs:
---
# Regola Cursor – XotBaseRelationManager

## Ambito
- Tutti i RelationManager custom nei moduli Laraxot

## Motivazione
- Centralizzare logica, permessi, traduzioni e comportamenti comuni
- Evitare duplicazione di codice e garantire coerenza tra moduli

## Regola chiave
- Estendere SEMPRE `Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager` e MAI `Filament\Resources\RelationManagers\RelationManager`

## Pattern corretto
- Implementare i metodi richiesti (`getFormSchema`, `getTableColumns`, ecc.) come `public`
- Usare i file di traduzione del modulo per label, placeholder, help
- Gestire header actions custom (es. attach con campo role) in `getTableHeaderActions()`

## Anti-pattern
- Estendere direttamente RelationManager Filament
- Usare metodi protected invece di public
- Usare label hardcoded
- Duplicare logica già gestita da XotBaseRelationManager

## Esempio pratico
```php
public function getTableHeaderActions(): array {
    return [
        'attach' => AttachAction::make()
            ->form(fn (AttachAction $action): array => [
                $action->getRecordSelect(),
                TextInput::make('role'),
            ]),
    ];
}
```

## Note
- I metodi custom devono essere sempre `public`.
- La logica di attach/role va gestita in `getTableHeaderActions` secondo le nuove best practice.
- Evitare override di metodi standard se non necessario.

## Checklist operativa
- [ ] Analizza la doc Xot e aggiorna se necessario
- [ ] Aggiorna la doc del modulo che usa RelationManager custom
- [ ] Crea collegamenti bidirezionali
- [ ] Scrivi test di regressione dopo ogni bugfix

## Collegamenti
- [XotBaseRelationManager – Linee guida](../../laravel/Modules/Xot/docs/filament/relation_manager_guidelines.md)
- [FILAMENT-BEST-PRACTICES.md](../../laravel/Modules/Xot/docs/filament/FILAMENT_BEST_PRACTICES.md)

---
**Data ultimo aggiornamento:** giugno 2025
