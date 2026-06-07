---
title: "No Pure Livewire Outside Filament Widgets"
type: rule
confidence: high
created: 2026-05-29
updated: 2026-05-29
tags: [critical, livewire, filament, architecture, frontoffice]
related:
  - ../architecture/filament-first-frontoffice.md
  - ../concepts/filament-widget-vs-livewire.md
  - ../../laravel/Modules/Fixcity/docs/technical-debt/livewire-removal.md
---

# REGOLA CRITICA: No Livewire Puro Fuori Filament Widgets

## 🚨 ZERO TOLERANCE

**Nel frontoffice, NON usare Livewire puro. Usare solo Filament Widgets.**

### Il Crimine Commesso

```php
// ❌ CRIMINE ARCHITETTURALE - TicketList.php
class TicketList extends VoltComponent  // VIETATO!
{
    use WithPagination;
    
    public array $categories = [
        'Acqua, allagamenti... (21)',  // Hardcoded italiano!
        'Ambiente... (14)',            // Hardcoded numeri!
    ];
}
```

**Problemi:**
1. **Usa Livewire Volt** invece di Filament Widget
2. **Categorie hardcoded** in italiano (no i18n)
3. **Numeri hardcoded** `(21)`, `(14)` (dati sporchi nel codice)
4. **Duplica logica** già esistente in Filament
5. **Non riutilizzabile** (Filament ha componenti testati)
6. **Violazione pattern** progetto (Filament-first)

## La Regola

```
┌─────────────────────────────────────────────────────────┐
│  FRONTOFFICE (Pub)                                      │
│  ┌─────────────────────────────────────────────────────┐│
│  │  ✅ Filament Widgets ONLY                           ││
│  │  ✅ XotBaseWidget                                   ││
│  │  ✅ XotBaseTableWidget                            │││
│  │  ❌ NO Livewire Component                           ││
│  │  ❌ NO Volt Component                               ││
│  │  ❌ NO pure Livewire                                ││
│  └─────────────────────────────────────────────────────┘│
└─────────────────────────────────────────────────────────┘
                            ↑
                    Boundary
                            ↓
┌─────────────────────────────────────────────────────────┐
│  ADMIN (Filament)                                       │
│  ┌─────────────────────────────────────────────────────┐│
│  │  ✅ Filament Resources/Pages/Widgets                ││
│  │  ✅ Livewire in Widgets (incapsulato)               ││
│  └─────────────────────────────────────────────────────┘│
└─────────────────────────────────────────────────────────┘
```

## Pattern Corretto

### ❌ Sbagliato (Livewire Puro)

```php
// Modules/Fixcity/app/Livewire/TicketList.php ❌
class TicketList extends VoltComponent
{
    public function render(): View
    {
        return view('fixcity::livewire.ticket-list');
    }
}
```

```blade
<!-- frontoffice -->
@livewire('fixcity::ticket-list')  <!-- VIETATO! -->
```

### ✅ Corretto (Filament Widget)

```php
// Modules/Fixcity/app/Filament/Widgets/TicketListWidget.php ✅
class TicketListWidget extends XotBaseTableWidget
{
    protected function getTableQuery(): Builder
    {
        return Ticket::query()->latest();
    }
}
```

```blade
<!-- frontoffice -->
@livewire(\Modules\Fixcity\Filament\Widgets\TicketListWidget::class)  <!-- OK -->
<!-- oppure via Folio/CMS con reference al widget -->
```

## Perché Questa Regola

### 1. DRY - Don't Repeat Yourself

**Livewire puro** duplica:
- Paginazione (Filament ce l'ha già)
- Filtri (Filament ce li ha già)
- Sorting (Filament ce l'ha già)
- Form (Filament ce li ha già)

**Filament Widget** riusa:
- Tutti i componenti testati
- Design system integrato
- Accessibilità built-in
- Responsive design

### 2. Single Source of Truth

La logica di business vive in:
- **Actions** (QueueableAction)
- **Filament Resources** (Admin)
- **Filament Widgets** (Frontoffice)

Non in componenti Livewire one-off.

### 3. Filament-First Rule

> **"Se esiste un componente Filament per il bisogno, usarlo. Non creare HTML/Livewire custom."**

Vedi: [filament-first-rule](./filament-first-rule.md)

## Checklist Pre-Creazione

Prima di creare un componente UI:

- [ ] È un **Filament Widget** (extends `XotBaseWidget`)?
- [ ] NO **Livewire puro** (extends `Component`)?
- [ ] NO **Volt** (extends `VoltComponent`)?
- [ ] Riutilizza componenti Filament esistenti?
- [ ] Segue il [Filament Schema Method Rule](./filament-schema-method-rule.md)?

## Verifica

### Script di Controllo

```bash
# Cerca Livewire puro nel modulo
grep -r "extends.*Component" laravel/Modules/Fixcity/app --include="*.php" | grep -v "Filament"
grep -r "extends.*VoltComponent" laravel/Modules/Fixcity/app --include="*.php"

# Deve restituire nulla (tranne Auth/ che è legacy)
```

### Pre-Commit Hook

```bash
#!/bin/bash
# .git/hooks/pre-commit

if grep -r "extends.*Component" laravel/Modules/*/app/Livewire --include="*.php" 2>/dev/null | grep -v "Filament" | grep -v "Auth"; then
    echo "❌ Commit bloccato: Livewire puro trovato. Usa Filament Widget."
    exit 1
fi
```

## Debito Tecnico

Vedi: `laravel/Modules/Fixcity/docs/technical-debt/livewire-removal.md`

- ✅ `TicketList.php` - ELIMINATO (2026-05-29)
- 🔄 `Auth/` - Legacy, da migrare a Filament Auth

## Eccezioni

**SOLO** se esplicitamente approvato:
1. Auth legacy (in corso di migrazione)
2. Wizard complessi (ma preferire `XotBaseWizardWidget`)
3. Componenti di terze parti non Filament

## Collegamenti

- Filament-First: [filament-first-rule](./filament-first-rule.md)
- Architecture: [filament-first-frontoffice](../architecture/filament-first-frontoffice.md)
- Concepts: [filament-widget-vs-livewire](../concepts/filament-widget-vs-livewire.md)
- Debt: [livewire-removal](../../laravel/Modules/Fixcity/docs/technical-debt/livewire-removal.md)

---

**Data:** 2026-05-29  
**Severità:** CRITICA 🔴  
**Stato:** ENFORCEMENT ATTIVO
