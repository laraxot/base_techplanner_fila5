---
title: "No Standalone Livewire Classes — Use Volt or Filament Widgets"
type: concept
confidence: high
created: 2026-05-28
updated: 2026-05-28
tags: [livewire, volt, filament, widget, architecture, critical]
related:
  - livewire-v4-governance.mdc
  - livewire-volt-folio-rules.mdc
  - ../concepts/filament-admin-style-ownership-boundary.md
---

# No Standalone Livewire Classes — Use Volt or Filament Widgets

## 🔴 CRITICAL RULE — ZERO TOLERANCE

**Livewire puro (classi standalone) è VIETATO nel frontend pubblico di questo progetto.**

> "Non utilizziamo livewire puro. Lo utilizziamo solo dentro widget di Filament." — Utente, 2026-05-28

---

## Regola

| Contesto | Pattern CORRETTO | Pattern VIETATO |
|----------|-----------------|-----------------|
| Frontend pubblico (Folio pages) | `@volt` con `new class extends Component` **inline** nel blade | `class FooList extends VoltComponent` come file PHP standalone |
| Liste/tabelle interattive frontend | `@livewire(SomeFilamentWidget::class)` | `class FooList extends Component` standalone |
| Backoffice (Filament) | `class FooWidget extends XotBaseWidget` | — |
| Wizard backoffice | `class FooWizardWidget extends XotBaseWizardWidget` | — |

---

## ❌ PATTERN VIETATO — Livewire Standalone

```php
// ❌ WRONG: File standalone Livewire fuori da Filament
// Modules/Fixcity/app/Livewire/TicketList.php

class TicketList extends VoltComponent
{
    use WithPagination;
    
    public LengthAwarePaginator $tickets; // ← anche PHP 8.4 TypeError!

    public function render(): View
    {
        return view('fixcity::components.blocks.ticket_list.agid', [
            'tickets' => $this->tickets, // ← accesso prima di init
        ]);
    }
}
```

**Perché è sbagliato:**
1. Viola la regola architetturale: Livewire standalone solo dentro Filament widgets
2. PHP 8.4: typed property senza inizializzazione → `TypeError` prima di accesso
3. Non riutilizzabile via JSON content blocks
4. Crea accoppiamento diretto tra template e logica Livewire standalone
5. Non rispetta il pattern Folio + Volt class-based

---

## ✅ PATTERN CORRETTO — Volt class-based inline

Per liste/contenuti interattivi nel frontend pubblico, usare **Volt class-based** direttamente nelle Folio pages o nei Blade blocks:

```blade
{{-- Themes/Sixteen/resources/views/pages/[container0]/index.blade.php --}}
@volt('ticket-list')
<?php
new class extends \Livewire\Volt\Component {
    use \Livewire\WithPagination;
    
    public string $search = '';
    public string $selectedStatus = '';
    
    public function with(): array
    {
        return [
            'tickets' => \Modules\Fixcity\Models\Ticket::query()
                ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
                ->latest()
                ->paginate(10),
        ];
    }
}
?>

<div>
    {{-- template --}}
</div>
@endvolt
```

---

## ✅ PATTERN CORRETTO — Filament Widget (per tabelle avanzate)

Per liste con sorting, filtering avanzato, export, usare **Filament Widget**:

```php
// Modules/Fixcity/app/Filament/Widgets/TicketListWidget.php
class TicketListWidget extends XotBaseWidget
{
    // ... Filament table definition
}
```

```blade
{{-- Nel Blade / Folio page --}}
@livewire(\Modules\Fixcity\Filament\Widgets\TicketListWidget::class)
```

---

## Bug correlato — PHP 8.4 TypeError

Il file `Modules/Fixcity/app/Livewire/TicketList.php` causava:

```
TypeError: Typed property TicketList::$tickets must not be accessed before initialization
```

**Root cause doppio:**
1. Architetturale: classe Livewire standalone vietata
2. PHP 8.4: `public LengthAwarePaginator $tickets;` senza default → TypeError se letta prima di init

**Fix applicato (2026-05-28):** rimossa property non inizializzata, chiamata diretta a `getTicketsProperty()`. Ma il fix a lungo termine è **migrare a Volt inline o Filament Widget**.

---

## Decisione Architetturale

**Rationale:**
- Il frontend usa Folio (file-based routing) + Volt (reactive inline) — DRY, zero scaffolding
- Filament gestisce backoffice — SSOT per tabelle avanzate
- Livewire standalone crea un terzo layer non necessario, difficile da mantenere
- JSON content blocks non possono istanziare Livewire standalone facilmente

**Data decisione:** 2026-05-28 (confermata dall'utente)

---

## Files da Rimuovere/Migrare

| File | Azione |
|------|--------|
| `Modules/Fixcity/app/Livewire/TicketList.php` | Migrare a Volt inline o Filament Widget, poi eliminare |
| Qualsiasi `Modules/*/app/Livewire/*.php` NON usato da Filament | Audit + migrazione |

---

## Verification

```bash
# Trova classi Livewire standalone (non-Filament)
grep -rn "extends VoltComponent\|extends Component" \
  laravel/Modules/*/app/Livewire/ \
  --include="*.php" \
  | grep -v "Filament\|Widget"

# Devono essere ZERO risultati (o solo legacy in attesa di migrazione)
```

---

## Related

- [[livewire-v4-governance.mdc]] — Governance Livewire v4
- [[livewire-volt-folio-rules.mdc]] — Volt class-based rules
- `docs/wiki/rules/016-wizard-widgets-use-xotbasewizardwidget.md` — Wizard pattern
- `Modules/Fixcity/docs/PROJECT-STRUCTURE.md` — Struttura modulo
