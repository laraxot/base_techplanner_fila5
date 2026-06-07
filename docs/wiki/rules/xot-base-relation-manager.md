---
trigger: always_on
description:
globs:
---
# Regola Cursor – XotBaseRelationManager

## Ambito
- Tutti i RelationManager custom nei moduli Laraxot

## Motivazione
- Centralizzare logica, permessi, traduzioni e comportamenti comuni
- Evitare duplicazione di codice e garantire coerenza tra moduli
- **MAI usare ->label(), ->placeholder(), ->helperText() nei componenti Filament: la traduzione è automatica tramite la struttura espansa dei file di traduzione.**

## Regola chiave
- Estendere SEMPRE `Modules\\Xot\\Filament\\Resources\\RelationManagers\\XotBaseRelationManager`
- Implementare solo i metodi consentiti (getFormSchema, getTableColumns, getTableHeaderActions, getTableActions, getTableBulkActions)
- Tutti i metodi custom devono essere public
- **VIETATO** override di metodi finali/protetti della base
- **VIETATO** uso di ->label(), ->placeholder(), ->helperText() nei componenti

## Esempio corretto

```php
TextInput::make('role'), // NESSUN ->label(), ->placeholder(), ->helperText()
```

## Anti-pattern (da evitare)

```php
// ❌ ERRATO
TextInput::make('role')->label('Ruolo')->helperText('Testo di aiuto');
TextColumn::make('name')->label('Nome');
```

## WARNING

> Qualsiasi uso di ->label(), ->placeholder(), ->helperText() nei componenti Filament è VIETATO. La traduzione è automatica tramite la struttura espansa dei file di traduzione. Se trovi override, correggi immediatamente e aggiorna la doc.

## Checklist
- [x] Nessun uso di ->label(), ->placeholder(), ->helperText() nei componenti
- [x] Traduzioni solo tramite file di traduzione espansa
- [x] Documentazione aggiornata
- [x] Esempi di anti-pattern

## Collegamenti
- [../../laravel/Modules/User/docs/filament/teams_relation_manager.md](mdc:../../laravel/Modules/User/docs/filament/teams_relation_manager.md)
- [../../.windsurf/rules/xotbaserelationmanager.mdc](mdc:../../.windsurf/rules/xotbaserelationmanager.mdc)

---
**Data ultimo aggiornamento:** giugno 2025
