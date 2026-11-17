---
title: "Use <x-page> Component in Route Files — DRY Pattern"
type: concept
sources: ["session-2026-05-21", "laravel/Themes/Sixteen/resources/views/components/page.blade.php"]
confidence: high
created: 2026-05-21
updated: 2026-05-21
tags: [x-page, component, DRY, route-files, volt, folio, blade, best-practice]
related:
  - concepts/clean-volt-route-files-pattern.md
  - rules/no-hardcoded-mappings-in-views.md
---

# Use `<x-page>` Component in Route Files — DRY Pattern

## Pattern Canonico

Nei file Volt/Folio route, usare `<x-page>` invece di `@foreach` manuale per renderizzare i blocchi.

## Esempio Corretto (variante canonica — delega fetch al componente CMS)

```blade
{{-- Route Folio: NO fetch in mount(), NO @foreach --}}
<x-page side="content" :slug="$pageSlug" :data="$data" />
```

Il componente risolve a `Modules\Cms\View\Components\Page`, che chiama già `Page::getBlocksBySlug($slug, $side)`.

`$pageSlug` deve essere lo slug CMS completo (`tests.segnalazione-crea`, `tests.segnalazione-02-dati`, ...). Il segmento Folio grezzo (`$slug`, es. `segnalazione-crea`) resta nel data bag per i blocchi (`$data = ['slug' => $slug]`), ma non va passato come prop `slug` a `<x-page>` perché `getBlocksBySlug()` cerca il record `pages.slug` esatto.

## Esempio intermedio (solo DRY loop — refactor a metà)

```blade
{{-- PRIMA (Anti-Pattern) --}}
@foreach($blocks as $block)
    @include($block->view, array_merge($data, ['data' => $block->data]))
@endforeach

{{-- Intermedio: loop DRY ma fetch ancora in mount() --}}
<x-page side="content" :blocks="$blocks" :data="$data" />
```

Preferire sempre `:slug` quando il route file non deve orchestrare i blocchi.

## Perche e' Meglio

| Criterio | `@foreach` manuale | `<x-page>` |
|----------|-------------------|------------|
| **DRY** | Logica duplicata in ogni file | Incapsulata nel componente |
| **Active check** | ❌ Assente | ✅ `data_get($block, 'active', true)` |
| **Consistenza** | Ogni file puo avere logica diversa | Pattern unico |
| **Manutenibilita** | Cambiamenti in N file | Cambiamento in 1 file |
| **Leggibilita** | 4 righe di loop + include | 1 riga dichiarativa |
| **Props strutturate** | Data passata manualmente | Props tipizzate |

## Componente `<x-page>` Esistente

```blade
@props(['blocks' => [], 'side' => 'content', 'slug' => '', 'page' => null, 'data' => []])

<div>
    @if (!empty($blocks))
        @foreach ($blocks as $block)
            @php $isActive = data_get($block, 'active', true); @endphp
            @if ($isActive)
                @include($block->view, array_merge($data, $block->data, ['data' => $block->data]))
            @endif
        @endforeach
    @endif
</div>
```

## Volt File Refactor Completo

**Prima**:
```php
new class extends Component {
    public string $slug = '';
    public array $blocks = [];

    public function mount(string $slug = ''): void
    {
        $this->slug = $slug;
        $this->blocks = Page::getBlocksBySlug('tests.'.$slug, 'content');
    }
};
?>
<x-layouts.app>
    @volt('tests.view')
    <div class="page-content content" data-slug="{{ $slug }}">
        @foreach($blocks as $block)
            @include($block->view, array_merge(['slug' => $slug], ['data' => $block->data]))
        @endforeach
    </div>
    @endvolt
</x-layouts.app>
```

**Dopo (Corretto — Self-Contained)**:
```php
new class extends Component {
    public string $slug = '';

    public function mount(string $slug = ''): void
    {
        $this->slug = $slug;
    }
};
?>
<x-layouts.app>
    @volt('tests.view')
    <x-page side="content" :slug="$slug" />
    @endvolt
</x-layouts.app>
```

**NOTA**: NON passare `:blocks="$blocks"` — il componente `<x-page>` deve essere self-contained e recuperare i blocchi internamente da `:slug`. Vedere [`component-self-containment-rule.md`](../rules/component-self-containment-rule.md).

**Dopo (canonico — delega a `Modules\Cms\View\Components\Page`)**:
```php
new class extends Component {
    public string $slug = '';
    public string $pageSlug = '';
    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(string $slug = ''): void
    {
        $this->slug = $slug;
        $this->pageSlug = $slug ? 'tests.'.$slug : 'tests';
        $this->data = ['slug' => $slug];
    }
};
?>
<x-layouts.app>
    @volt('tests.view')
    <div class="page-content content" data-slug="{{ $pageSlug }}" data-side="content">
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    </div>
    @endvolt
</x-layouts.app>
```

> **Nota parity**: il wrapper `page-content[data-slug][data-side]` resta obbligatorio per CSS Design Comuni finché non viene incapsulato nel componente CMS o in override tema. Vedi [#114](https://github.com/laraxot/base_fixcity_fila5/issues/114).

## Anti-pattern (VIETATO)

- ❌ `@foreach` manuale in route files
- ❌ `Page::getBlocksBySlug()` in `mount()` **e** `<x-page :blocks="..." />` — fetch duplicato (il componente CMS carica già i blocchi da `:slug`)
- ❌ Passare `:blocks` quando si passa già `:slug` — una sola fonte: il componente
- ❌ Passare lo slug Folio grezzo (`:slug="$slug"`) quando i JSON CMS usano `tests.{slug}`
- ❌ `@include` diretto senza active check
- ❌ Data merging duplicato in ogni file

## Best Practices

- ✅ Usare `<x-page>` per tutte le pagine con blocchi
- ✅ Passare props strutturate (`side`, `slug`, `data`), con `slug` = slug CMS completo
- ✅ Il componente gestisce active check e data merging
- ✅ Customizzazione via slot o props aggiuntive se necessario

---

*Concetto creato: 2026-05-21 — Analisi `<x-page>` vs `@foreach` manuale*
