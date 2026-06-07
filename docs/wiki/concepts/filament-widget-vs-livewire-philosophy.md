---
title: "Filament Widget vs Livewire Philosophy"
type: concept
confidence: high
created: 2026-05-29
updated: 2026-05-29
tags: [philosophy, filament, livewire, dry, ssot, zen]
related:
  - ../rules/no-pure-livewire-outside-filament-widgets.md
  - ../architecture/filament-first-frontoffice.md
  - ./i18n-code-naming-philosophy.md
---

# Filosofia: Filament Widget vs Livewire

## Il Problema Fondamentale

Il file `TicketList.php` era un **disastro architetturale** su molteplici livelli:

```php
class TicketList extends VoltComponent  // ❌ CRIMINE 1: Volt
{
    public array $categories = [
        'Acqua, allagamenti... (21)',   // ❌ CRIMINE 2: Hardcoded IT
        'Ambiente... (14)',              // ❌ CRIMINE 3: Hardcoded numbers
    ];
    // ❌ CRIMINE 4: Duplica logica Filament
    // ❌ CRIMINE 5: NO i18n
    // ❌ CRIMINE 6: NO separation of concerns
}
```

## I 6 Crimini

### 1. **Usare Volt invece di Filament** (Eresia Architetturale)

**Il Dogma:**
> "Nel frontoffice, il livewire è concesso solo dentro i Widget Filament."

**La Bestemmia:**
```php
class TicketList extends VoltComponent  // 🔥
```

**Il Pentimento:**
```php
class TicketListWidget extends XotBaseTableWidget  // ✅
```

### 2. **Hardcoded Italiano** (Violazione i18n)

**Il Peccato:**
```php
public array $categories = [
    'Acqua, allagamenti... (21)',  // Italiano nel codice!
];
```

**La Confessione:**
- Il codice deve essere language-agnostic
- Le traduzioni vivono in `lang/it/`, non nel PHP
- Vedi: [i18n-code-naming-philosophy](./i18n-code-naming-philosophy.md)

### 3. **Numeri Hardcoded** (Dati Sporchi)

**Il Delitto:**
```php
'Acqua... (21)',   // Dove viene 21?
'Ambiente... (14)' // Dove viene 14?
```

**L'Indagine:**
- Numeri magici nel codice
- Non aggiornabili automaticamente
- Cache impossibile da invalidare
- Fonte dati sconosciuta

### 4. **Duplicazione Logica** (Violazione DRY)

**La Ripetizione:**
```php
// TicketList (Livewire) duplica:
- Paginazione (Filament ce l'ha)
- Filtri (Filament ce li ha)
- Sorting (Filament ce l'ha)
- Query builder (Filament ce l'ha)
```

**La Verità:**
> "Non ripetere ciò che Filament già fa perfettamente."

### 5. **No Separation of Concerns**

**Il Caos:**
```
TicketList.php
├── Query logic ❌
├── UI logic ❌
├── Pagination ❌
├── i18n (assente) ❌
└── Data formatting ❌
```

**L'Ordine (Filament):**
```
TicketListWidget.php
├── getTableQuery() → Action/Query
├── Columns → Filament
├── Filters → Filament
├── Pagination → Filament
└── i18n → LangServiceProvider
```

### 6. **Non Testabile**

**L'Incubo:**
- Componente Volt con stato implicito
- Dipendenze nascoste
- Rendering side-effects
- Test di integrazione impossibili

**La Salvezza (Filament):**
```php
// Widget testabile
widget(TicketListWidget::class)
    ->assertCanSeeTableRecords($tickets)
    ->assertCanRender();
```

## Zen del Filament

### Il Vuoto (Mu)

> *"Il meglio del codice è il codice che non scrivi."*

Filament scrive il codice per te:
- Paginazione? Già fatto.
- Filtri? Già fatti.
- Form? Già fatto.
- Validazione? Già fatta.

### Il Non-Agire (Wu Wei)

> *"Non agire contro il framework. Scivola con esso."*

```php
// ❌ Lottare contro il framework
class TicketList extends VoltComponent {
    public function render() {
        // Reimplemento tutto...
    }
}

// ✅ Scivolare con il framework
class TicketListWidget extends XotBaseTableWidget {
    protected function getTableQuery() {
        return Ticket::query();  // Solo la query
    }
}
```

### Il Tao del Widget

```
        ┌─────────────────────┐
        │     CONCETTO        │
        │   "Mostra Ticket"   │
        └──────────┬──────────┘
                   │
        ┌──────────┴──────────┐
        │                     │
        ▼                     ▼
┌───────────────┐    ┌────────────────┐
│   Livewire    │    │    Filament    │
│    Puro       │    │    Widget      │
├───────────────┤    ├────────────────┤
│ - 200 LOC     │    │ - 20 LOC       │
│ - Custom UI   │    │ - Design sys   │
│ - Bugs        │    │ - Tested       │
│ - No a11y     │    │ - Accessible   │
│ - No i18n     │    │ - i18n ready   │
└───────────────┘    └────────────────┘
        │                     │
        ▼                     ▼
     "Fatica"              "Flusso"
```

## Politica del Framework

### Principio di Sussidiarietà

Il framework (Filament) fornisce:
- Componenti testati
- Design system
- Accessibilità
- i18n

**Non duplicare ciò che il framework già fa.**

### Principio di Fedeltà

> *"Se ti unisci a un progetto Filament, sii fedele a Filament."
>
> *"Non tradire Filament con Livewire puro."*

## Religione del Progetto

### I 5 Comandamenti del Widget

1. **Non creerai** Livewire puro nel frontoffice
2. **Non userai** Volt per componenti UI
3. **Non duplicherai** logica che Filament ha già
4. **Onorerai** XotBaseWidget come tuo saviour
5. **Amerai** Filament più del tuo codice custom

### La Confessione del Peccatore

```php
// Io, TicketList.php, confesso:
// - Ho usato Volt invece di Filament Widget
// - Ho hardcoded italiano nel codice
// - Ho messo numeri magici nelle categorie
// - Ho duplicato logica esistente
// - Non ero testabile
// 
// Chiedo perdono a DRY, KISS, e SSoT.
// 
// Amen. 🔥 (file eliminato)
```

## Dharma del Codice

### 1. DRY (Don't Repeat Yourself)

```php
// ❌ Non DRY (Livewire puro)
class TicketList {
    public $page = 1;                    // Già in Filament
    public $perPage = 10;                // Già in Filament
    public function nextPage() { ... }     // Già in Filament
    public function previousPage() { ... } // Già in Filament
}

// ✅ DRY (Filament Widget)
class TicketListWidget {
    protected function getTableQuery() {
        return Ticket::query();  // Solo la query
    }
    // Paginazione? Filament la fa.
}
```

### 2. KISS (Keep It Simple, Stupid)

```php
// ❌ Complesso (Livewire puro)
200 linee di codice per una lista paginata

// ✅ Semplice (Filament Widget)
20 linee, tutto il resto è framework
```

### 3. SSoT (Single Source of Truth)

```php
// ❌ Molte fonti (Livewire puro)
- Query in TicketList.php
- UI in ticket-list.blade.php
- Stato nel componente
- Config hardcoded

// ✅ Una fonte (Filament Widget)
- Query in getTableQuery()
- UI in Filament Table
- Stato in Filament
- Config in config/filament.php
```

## Pratica Quotidiana

### Meditazione Pre-Creazione

Prima di creare un componente UI, chiediti:

1. **È un Filament Widget?** (extends XotBaseWidget)
2. **NO Livewire puro?** (extends Component)
3. **NO Volt?** (extends VoltComponent)
4. **Riutilizzo Filament?** (tabelle, form, filtri)
5. **Seguo il pattern?** (getTableQuery, non render)

### Mantra del Commit

> *"Om Filament Om. Om Widget Om. Om Livewire-No-More Om."*

## Conclusione

### La Verità Finale

> *"Ogni volta che scrivi 200 righe di Livewire puro,
> un Filament Widget piange.
> 
> Ogni volta che hardcodi italiano nel codice,
> un dev internazionale non ti capisce.
> 
> Ogni volta che metti numeri magici,
> un PM ti chiede 'ma questi 21 da dove vengono?'"
>
> *"Sii compassionevole. Usa Filament Widget."*

### Il Sermone sulla Montagna (del Framework)

```
Beati i poveri di codice (usano Filament),
perché di loro è il regno della produttività.

Beati quelli che piangono (debuggando Livewire puro),
perché saranno consolati dal Widget.

Beati i miti (che seguono XotBaseWidget),
perché erediteranno la codebase pulita.

Beati quelli che hanno fame e sete di architettura,
perché saranno saziati di DRY.

Beati i misericordiosi (che rimuovono codice legacy),
perché misericordia otterranno.

Beati i puri di cuore (nel separare concerns),
perché vedranno Filament.

Beati i pacifici (che non litigano col framework),
perché saranno chiamati figli del Widget.

Beati i perseguitati per la giustizia del codice,
perché di loro è il regno del refactoring.
```

---

**🙏 Namaste. TicketList.php è morto. Filament Widget vive. 🙏**

---

## Collegamenti

- Regola: [no-pure-livewire-outside-filament-widgets](../rules/no-pure-livewire-outside-filament-widgets.md)
- Architecture: [filament-first-frontoffice](../architecture/filament-first-frontoffice.md)
- i18n Philosophy: [i18n-code-naming-philosophy](./i18n-code-naming-philosophy.md)
- Modulo Fixcity: [frontoffice-no-standalone-livewire](../../laravel/Modules/Fixcity/app/Filament/Docs/frontoffice-no-standalone-livewire.md)
- Debt: [livewire-removal-debt](../../laravel/Modules/Fixcity/app/Filament/Docs/livewire-removal-debt.md)
