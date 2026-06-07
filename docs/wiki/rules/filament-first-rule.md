# Rule 019: Filament-First — Prefer Filament Components Over Custom Solutions

**Status**: CRITICAL  
**Created**: 2026-05-29  
**Updated**: 2026-05-28  
**Priority**: MANDATORY  
**Related**: [#82](https://github.com/laraxot/base_fixcity_fila5/issues/82) · [#141](https://github.com/laraxot/base_fixcity_fila5/issues/141) · [Discussion #142](https://github.com/laraxot/base_fixcity_fila5/discussions/142) · [STORY-065](../stories/STORY-065-it-segnalazioni-filament-tabs.md)

---

## The Rule

> **When a Filament component exists for a UI pattern, ALWAYS use the Filament component.  
> NEVER build a custom HTML/CSS/Blade solution when Filament provides a built-in component.**

---

## Why (business logic)

| Situation | Filament Component | Custom Solution |
|-----------|-------------------|-----------------|
| Tabs (FO o admin) | `<x-filament::tabs>` + `<x-filament::tabs.item>` ([docs 5.x](https://filamentphp.com/docs/5.x/components/tabs)) | `nav-tabs` Bootstrap + shim `data-bs-toggle="tab"` |
| Badge / status indicator | `x-filament::badge` with `icon`, `color` | Custom span with Tailwind classes |
| Buttons / actions | `x-filament::button` or `Filament\Actions\Action` | Custom `<button>` with manual styling |
| Modals | `x-filament::modal` or `Filament\Actions\Action->modal()` | Custom Alpine.js modal |
| Dropdowns | `x-filament::dropdown` | Custom Alpine dropdown |

Using Filament components:

1. **Consistency**: Same look & feel across all pages
2. **Maintainability**: Updates in Filament core propagate automatically
3. **Integration**: Actions, Livewire events, wire:click work out of the box
4. **Theme override**: Theme Sixteen can override Filament classes centrally
5. **Accessibility**: Filament components follow WCAG standards

---

## Available Filament Blade Components

Questi componenti sono disponibili in qualsiasi vista Blade (FO o admin):

| Component | Tag Filament | Attributi chiave |
|-----------|-------------|------------------|
| Avatar | `x-filament::avatar` | `src`, `alt`, `size` |
| Badge | `x-filament::badge` | `color` (primary/danger/gray/info/success/warning), `icon`, `icon-position`, `size` (xs/sm) |
| Button | `x-filament::button` | `color`, `size` (xs/sm/lg/xl), `icon`, `icon-position`, `outlined`, `tag` (a/button), `tooltip`, `badge` slot |
| Breadcrumbs | `x-filament::breadcrumbs` | Array `breadcrumbs` |
| Callout | `x-filament::callout` | Icona + titolo + descrizione |
| Checkbox | `x-filament::checkbox` | `checked`, `disabled` |
| Dropdown | `x-filament::dropdown` | `trigger` slot, `dropdown.list`, `dropdown.list.item` |
| Empty state | `x-filament::empty-state` | `heading`, `description`, `icon` |
| Fieldset | `x-filament::fieldset` | `label`, `required` |
| Icon button | `x-filament::icon-button` | `icon`, `color`, `size`, `tooltip` |
| Input | `x-filament::input` | `type`, `placeholder`, `disabled` |
| Input wrapper | `x-filament::input-wrapper` | Wrapper per validazione + label |
| Link | `x-filament::link` | `href`, `color`, `icon`, `tag` |
| Loading indicator | `x-filament::loading-indicator` | `size` |
| Modal | `x-filament::modal` | `trigger` slot, `heading`, `description`, `icon`, `width`, `slide-over`, `alignment`, `footer`, `footerActions`, `sticky-header`, `sticky-footer`, `close-by-clicking-away`, `close-by-escaping` |
| Pagination | `x-filament::pagination` | `paginator` |
| Section | `x-filament::section` | `heading`, `description`, `collapsible`, `collapsed` |
| Select | `x-filament::select` | `options`, `placeholder`, `disabled` |
| Tabs | `x-filament::tabs` + `x-filament::tabs.item` | `active`, `alpine-active`, `icon`, `badge`, `badge-color`, `vertical`, `label`, `wire:click`, `x-on:click` |

## Package Components (for panels/forms)

| Package | Entry Point |
|---------|-------------|
| Form | `Filament\Forms` |
| Table | `Filament\Tables` |
| Infolist | `Filament\Infolists` |
| Notifications | `Filament\Notifications` |
| Actions | `Filament\Actions` |
| Widgets | `Filament\Widgets` |

---

## Frontoffice (`/it`, tema Sixteen)

- Layout pub include già `@filamentStyles` / `@filamentScripts` (`layouts/main.blade.php`) → i componenti Blade Filament sono **ammessi** senza pannello admin.
- **Non** confondere con Livewire standalone: FO = CMS Blade + Filament Blade + Alpine + Lit; Livewire solo nei **widget Filament** ([no-pure-livewire-outside-filament-widgets.md](../concepts/no-pure-livewire-outside-filament-widgets.md)).
- Caso `/it` segnalazioni-elenco: [STORY-065](../stories/STORY-065-it-segnalazioni-filament-tabs.md) — tab Mappa/Elenco con `x-filament::tabs`, pannelli `map-lit` / lista invariati.

### ✅ Tab FO (Alpine, senza Livewire dedicato)

```blade
<div x-data="segnalazioniLayout" x-init="activeTab = 'map'">
    <x-filament::tabs class="segnalazioni-fi-tabs w-100">
        <x-filament::tabs.item
            alpine-active="activeTab === 'map'"
            x-on:click="activeTab = 'map'"
        >
            {{ __('fixcity::segnalazione.tabs.map.label') }}
        </x-filament::tabs.item>
        <x-filament::tabs.item
            alpine-active="activeTab === 'list'"
            x-on:click="activeTab = 'list'"
        >
            {{ __('fixcity::segnalazione.tabs.list.label') }}
        </x-filament::tabs.item>
    </x-filament::tabs>
    {{-- pannelli: x-show + map-lit / lista --}}
</div>
```

Pattern ufficiale: [Filament 5 — Tabs](https://filamentphp.com/docs/5.x/components/tabs) (`alpine-active`, `x-on:click`).

### ❌ Da evitare su nuove pagine FO

- `ul.nav.nav-tabs` + `data-bs-toggle="tab"` + shim JS in `app.js` **se** esiste equivalente Filament.
- Doppio `x-data` su tab e pannelli (scope Alpine separato → tab “morti”).

### Admin (Livewire / pannello)

```blade
<x-filament::tabs>
    <x-filament::tabs.item
        :active="$activeTab === 'info'"
        wire:click="$set('activeTab', 'info')"
    >
        Info
    </x-filament::tabs.item>
</x-filament::tabs>
```

---

## Eccezione (parity Design Comuni)

Quando serve match HTML/visivo [Design Comuni](https://italia.github.io/design-comuni-pagine-statiche/):

1. **Usare comunque** il componente Filament (comportamento + ARIA).
2. Applicare **skin CSS** sul wrapper (es. `.segnalazioni-elenco .fi-tabs`) — non reinventare logica tab in Blade/Alpine custom.
3. Documentare override in wiki tema Sixteen.

---

## Documentazione progetto

| Layer | Path |
|-------|------|
| Regola (questo file) | `docs/wiki/rules/filament-first-rule.md` |
| Memoria agenti | `docs/wiki/memories/filament-first-mandatory-agents.md` |
| **Blade components 5.x — API completa** | `laravel/Themes/Sixteen/docs/wiki/concepts/filament-5x-blade-components-reference.md` |
| **Blade components 5.x — Fixcity** | `laravel/Modules/Fixcity/docs/llm-wiki/concepts/filament-5x-blade-components-fixcity.md` |
| Modulo UI — blade | `laravel/Modules/UI/docs/blade/filament-components.md` |
| Modulo UI — wiki concept | `laravel/Modules/UI/docs/wiki/concepts/filament-first-blade-canonical.md` |
| Temi — shared components | `laravel/Themes/docs/shared-components/filament-blade-components.md` |
| Tema Sixteen FO | `laravel/Themes/Sixteen/docs/wiki/concepts/filament-first-frontoffice.md` |
| Tema Sixteen — tabs | `laravel/Themes/Sixteen/docs/wiki/concepts/segnalazioni-elenco-filament-tabs.md` |
| Modulo Fixcity — boundary | `laravel/Modules/Fixcity/docs/wiki/concepts/filament-first-ui-boundary.md` |

---

## References

- [Filament Components Overview](https://filamentphp.com/docs/5.x/components/overview)
- [Filament Tabs Component](https://filamentphp.com/docs/5.x/components/tabs)
- [Rule 005: Filament Table for Lists](./005-filament-table-for-lists.md)
- [Filament Best Practices](./filament-best-practices.md)
- Issue [#82](https://github.com/laraxot/base_fixcity_fila5/issues/82)
- Issue [#141](https://github.com/laraxot/base_fixcity_fila5/issues/141) — rule docs created
- Issue [#153](https://github.com/laraxot/base_fixcity_fila5/issues/153) — catalogo Blade components 5.x (2026-05-29)
- [Discussion #142](https://github.com/laraxot/base_fixcity_fila5/discussions/142) — thread canonico Filament-first
- [Discussion #154](https://github.com/laraxot/base_fixcity_fila5/discussions/154) — catalogo 5.x e backlog conversioni
