---
trigger: always_on
description: Divieto assoluto di implementare il metodo table() in RelationManager che estendono XotBaseRelationManager
globs: ["**/Filament/Resources/**/*RelationManager*.php"]
---

# DIVIETO ASSOLUTO: NON IMPLEMENTARE table() in XotBaseRelationManager

## Errore Critico da Evitare

**Chi estende `XotBaseRelationManager` NON DEVE MAI implementare il metodo `table(Table $table): Table`.**

Questa regola si applica a:
- **TUTTI** i RelationManager che estendono `XotBaseRelationManager`
- In **TUTTI** i moduli
- **SENZA ECCEZIONI**

## Esempio di Codice VIETATO

```php
// ❌ GRAVEMENTE ERRATO - MAI IMPLEMENTARE QUESTO METODO
public function table(Table $table): Table
{
    return $table
        ->columns([...])
        ->filters([...])
        ->headerActions([...])
        ->actions([...])
        ->bulkActions([...]);
}
```

## Codice Corretto

```php
/**
 * @return array<string, \Filament\Tables\Columns\Column>
 */
public function getTableColumns(): array
{
    return [
        // Definizione delle colonne
    ];
}

/**
 * @return array<string, \Filament\Tables\Actions\Action>
 */
public function getTableHeaderActions(): array
{
    return [
        // Definizione delle azioni nell'header
    ];
}

/**
 * @return array<string, \Filament\Tables\Actions\Action>
 */
public function getTableActions(): array
{
    return [
        // Definizione delle azioni per riga
    ];
}

/**
 * @return array<string, \Filament\Tables\Actions\BulkAction>
 */
public function getTableBulkActions(): array
{
    return [
        // Definizione delle bulk actions
    ];
}
```

## Motivazione del Divieto

Il metodo `table()` è già implementato in `XotBaseRelationManager` e fa uso dei metodi `getTable*()`. Implementarlo in una classe derivata:

1. Sovrascrive le personalizzazioni standard di Laraxot PTVX
2. Compromette la gestione automatica delle traduzioni
3. Interferisce con il funzionamento del `LangServiceProvider`
4. Causa comportamenti imprevedibili e difficili da debuggare

## Documentazione Completa

Per informazioni dettagliate, consultare:
- [Divieto Assoluto di Implementare table()](/laravel/Modules/Xot/docs/filament/no_table_override.md)
- [Regole per RelationManager](/docs/filament/relation_managers.md)
- [Esempio TeamsRelationManager](/laravel/Modules/User/docs/filament/teams_relation_manager.md)
