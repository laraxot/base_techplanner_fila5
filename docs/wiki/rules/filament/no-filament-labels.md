---
trigger: always_on
description: Divieto assoluto di usare i metodi ->label(), ->placeholder() e ->helperText() nei componenti Filament
globs: ["**/*Filament/**/*.php", "**/*.php"]
---

# DIVIETO ASSOLUTO: NON USARE ->label(), ->placeholder() o ->helperText()

## Errori Critici da Evitare

**In Laraxot PTVX è CATEGORICAMENTE VIETATO utilizzare i metodi `->label()`, `->placeholder()` e `->helperText()` nei componenti Filament.**

Questa regola si applica a:
- **TUTTI** i componenti Filament
- In **TUTTI** i moduli
- **SENZA ECCEZIONI**

## Esempi di Codice VIETATO

```php
// ❌ GRAVEMENTE ERRATO - MAI FARE QUESTO
TextInput::make('name')
    ->label('Nome')
    ->placeholder('Inserisci nome')
    ->helperText('Testo di aiuto');

// ❌ GRAVEMENTE ERRATO - MAI FARE QUESTO
TextColumn::make('name')
    ->label('Nome');

// ❌ GRAVEMENTE ERRATO - MAI FARE QUESTO
Action::make('edit')
    ->label('Modifica');
```

## Codice Corretto

```php
// ✅ CORRETTO
TextInput::make('name')
    ->required();

// ✅ CORRETTO
TextColumn::make('name')
    ->searchable();

// ✅ CORRETTO
Action::make('edit');
```

## Motivazione del Divieto

Le traduzioni vengono gestite automaticamente dal `LangServiceProvider` che usa i file di traduzione del modulo. Usare i metodi `->label()`, `->placeholder()` o `->helperText()` compromette:

1. La consistenza delle traduzioni
2. La manutenibilità del codice
3. La separazione tra logica e presentazione
4. L'integrità architettonica del sistema

## Documentazione Completa

Per informazioni dettagliate, consultare:
- [Divieto Assoluto di Usare label(), placeholder() e helperText()](/laravel/Modules/Xot/docs/filament/no_labels.md)
- [Regole per RelationManager](/docs/filament/relation_managers.md)
- [Esempio TeamsRelationManager](/laravel/Modules/User/docs/filament/teams_relation_manager.md)
