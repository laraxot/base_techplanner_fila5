---
title: "No @volt in Blade Views"
type: rule
confidence: high
created: 2026-05-29
updated: 2026-06-05
qmd: "no volt in blade views frontoffice folio extractfragments undefined container0 blade pure filament widgets"
tags: [critical, volt, livewire, blade, frontoffice]
issues:
  - https://github.com/laraxot/theme_sixteen_fila5/issues/50
  - https://github.com/laraxot/theme_sixteen_fila5/issues/52
discussions:
  - https://github.com/laraxot/theme_sixteen_fila5/discussions/51
related:
  - no-pure-livewire-outside-filament-widgets.md
  - filament-widget-vs-livewire-philosophy.md
---

# REGOLA CRITICA: No @volt nei File Blade

## 🚨 ZERO TOLERANCE

**Nei file Blade del frontoffice, NON usare `@volt()` — eccetto pagine Folio con `new class extends Component` (stringa statica = `name()`). Altrimenti Blade puro o Filament Widget.**

### Il Crimine

```blade
<!-- ❌ CRIMINE ARCHITETTURALE -->
@volt('home')
<main data-page="ticket-list">
    <x-page side="content" slug="home" />
</main>
@endvolt
```

**Problemi:**
1. `@volt` = Livewire Volt (vietato nel frontoffice)
2. Aggiunge overhead JavaScript non necessario
3. Rompe il principio "Blade per presentazione, Filament per logica"
4. Inconsistenza con il resto del tema (Blade + Filament)

## La Regola

```
┌─────────────────────────────────────────────────────────┐
│  FRONTOFFICE (Pub Theme)                                  │
│  ┌─────────────────────────────────────────────────────┐│
│  │  ✅ Blade puro (senza @volt/@livewire)              ││
│  │  ✅ Filament Widgets (per logica interattiva)       ││
│  │  ❌ NO @volt() (salvo Folio+Component, statico)     ││
│  │  ❌ NO @livewire() diretto                          ││
│  │  ❌ NO Volt Component                                ││
│  └─────────────────────────────────────────────────────┘│
└─────────────────────────────────────────────────────────┘
```

## Pattern Corretto

### ❌ Sbagliato (@volt)

```blade
@php
    $homePage = CmsPage::query()->where('slug', 'home')->first();
@endphp

<x-layouts.app :title="$homeTitle">
    @volt('home')  <!-- ❌ VIETATO -->
    <main data-page="ticket-list">
        <x-page side="content" slug="home" />
    </main>
    @endvolt
</x-layouts.app>
```

### ✅ Corretto (Blade Puro)

```blade
@php
    $homePage = CmsPage::query()->where('slug', 'home')->first();
@endphp

<x-layouts.app :title="$homeTitle">
    <main data-page="ticket-list">  <!-- ✅ Blade puro -->
        <x-page side="content" slug="home" />
    </main>
</x-layouts.app>
```

### ✅ Corretto (Con Filament Widget)

```blade
<x-layouts.app :title="$homeTitle">
    <main data-page="ticket-list">
        <!-- Widget per logica interattiva -->
        @livewire(\Modules\Fixcity\Filament\Widgets\TicketMapWidget::class)
        
        <x-page side="content" slug="home" />
    </main>
</x-layouts.app>
```

## Perché Questa Regola

### 1. Separazione dei Concerni

| Layer | Responsabilità | Tecnologia |
|-------|---------------|------------|
| Presentazione | Layout, markup | Blade |
| Logica Interattiva | Form, tabelle | Filament Widget |
| Stato Reattivo | NO nel frontoffice | N/A |

### 2. Performance

- `@volt` carica JavaScript Livewire
- Blade puro è HTML statico (più veloce)
- Filament Widget è ottimizzato per specifici use case

### 3. Consistenza

Tutto il tema Sixteen usa:
- Blade per layout
- Filament Widget per componenti interattivi
- NO Livewire puro

## Incident 2026-06-05: Folio `container0.view`

`@volt('folio.' . $container0 . '.view')` ha causato 500 su `/it/tickets/{id}` con `Undefined variable $container0` in `Livewire\Volt\Precompilers\ExtractFragments`.
Il precompiler Volt valuta gli argomenti della directive prima del rendering, quindi i parametri route Folio non sono disponibili.

**Vietato anche** `@php` + `request()->route('container0')` — i segmenti Folio vanno in `mount()`:

```php
new class extends Component {
    public function mount(string $container0, string $slug0 = ''): void
    {
        $this->pageSlug = $container0.'.view';
        $this->data = ['container0' => $container0, 'slug0' => $slug0];
    }
};
```

Canon: [folio-route-params-mount.md](../../laravel/Themes/Sixteen/docs/wiki/concepts/folio-route-params-mount.md)

**Eccezione Folio (2026-06-05):** con `new class extends Component` nel preamble, `@volt('…')` **obbligatorio** — stringa statica identica a `name()`. Senza `@volt` → `VoltDirectiveMissingException`. Shell statiche (home, about) restano Blade puro senza `@volt`.

## Checklist Pre-Creazione

Prima di creare/modificare un file Blade:

- [ ] NO `@volt()` nel file?
- [ ] NO `@livewire()` diretto (solo Filament Widget)?
- [ ] Uso Blade puro per layout?
- [ ] Uso `x-filament::*` componenti dove possibile?

## Verifica

### Script di Controllo

```bash
# @volt dinamico o su pagine non-Folio = errore
grep -rE "@volt\(\s*\\\$|@volt\('folio\." laravel/Themes/Sixteen/resources/views --include="*.blade.php"
# @volt statico su Folio container0/container1 = OK (es. @volt('container0.view'))
```

### Pre-Commit Hook

```bash
#!/bin/bash
if grep -r "@volt" laravel/Themes/*/resources/views --include="*.blade.php" 2>/dev/null; then
    echo "❌ Commit bloccato: @volt trovato. Usa Blade puro o Filament Widget."
    exit 1
fi
```

## Correzione Esempio

**File:** `laravel/Themes/Sixteen/resources/views/pages/index.blade.php`

**Prima (❌):**
```blade
@volt('home')
<main data-page="segnalazioni-elenco">
    <x-page side="content" slug="home" />
</main>
@endvolt
```

**Dopo (✅):**
```blade
<main data-page="ticket-list">
    <x-page side="content" slug="home" />
</main>
```

## Collegamenti

- Livewire Rule: [no-pure-livewire-outside-filament-widgets](./no-pure-livewire-outside-filament-widgets.md)
- Philosophy: [filament-widget-vs-livewire-philosophy](../concepts/filament-widget-vs-livewire-philosophy.md)

---

**Data:** 2026-05-29  
**Severità:** CRITICA 🔴  
**Correzione:** `index.blade.php` - rimosso `@volt`
