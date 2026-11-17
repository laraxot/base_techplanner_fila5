---
title: "Component Self-Containment — No Data Fetching in Route Files"
type: rule
sources: ["session-2026-05-21", "user-directive"]
confidence: high
created: 2026-05-21
updated: 2026-05-21
tags: [component, self-containment, single-responsibility, DRY, volt, folio, anti-pattern]
related:
  - concepts/use-x-page-component-in-route-files.md
  - concepts/clean-volt-route-files-pattern.md
  - rules/no-hardcoded-mappings-in-views.md
---

# Component Self-Containment — No Data Fetching in Route Files

**REGOLA**: Un componente Blade (`<x-page>`, `<x-layout>`, ecc.) deve essere **self-contained** — deve recuperare i propri dati internamente, NON riceverli come props dal route file.

## La Stronzata (Anti-Pattern)

```php
// ❌ SBAGLIATO — Volt component fa il lavoro del componente Blade
new class extends Component {
    public array $blocks = [];

    public function mount(string $slug = ''): void
    {
        $this->blocks = Page::getBlocksBySlug($this->pageSlug, 'content');
    }
};
?>
<x-page side="content" :slug="$slug" :data="$data" :blocks="$blocks" />
```

### Perche e' una Stronzata

1. **Responsabilita invertita**: Il Volt component fa fetching dati che dovrebbe fare `<x-page>`
2. **Duplicazione**: Ogni route file deve fare `Page::getBlocksBySlug()` → stessa logica ripetuta N volte
3. **Accoppiamento**: Il Volt component deve conoscere `Page::getBlocksBySlug()` e il side `'content'`
4. **Violazione Single Responsibility**: Il route file fa fetching + rendering invece di solo rendering
5. **DRY violation**: Se cambia la logica di fetching, modificare N route files invece di 1 componente
6. **Props inutili**: Passare `:blocks="$blocks"` quando `<x-page>` puo recuperarli da `:slug`

## Pattern Corretto

```php
// ✅ CORRETTO — Volt component minimale, solo props di routing
new class extends Component {
    public string $slug = '';

    public function mount(string $slug = ''): void
    {
        $this->slug = $slug;
    }
};
?>
<x-page side="content" :slug="$slug" />
```

```blade
{{-- ✅ CORRETTO — <x-page> self-contained, recupera i propri dati --}}
@props(['side' => 'content', 'slug' => '', 'data' => []])

@php
    $pageSlug = $slug ? 'tests.'.$slug : 'tests';
    $blocks = Page::getBlocksBySlug($pageSlug, $side);
@endphp

<div class="page-content {{ $side }}" data-slug="{{ $slug }}" data-side="{{ $side }}">
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

## Perche e' Meglio

| Criterio | Anti-Pattern (`:blocks="$blocks"`) | Corretto (self-contained) |
|----------|-----------------------------------|---------------------------|
| **Responsabilita** | Volt component fa fetching | `<x-page>` fa fetching |
| **DRY** | Logica duplicata in N route files | Logica in 1 componente |
| **Accoppiamento** | Route file conosce `Page::getBlocksBySlug` | Route file ignora implementation |
| **Manutenibilita** | Cambiamenti in N file | Cambiamento in 1 file |
| **Props** | 4 props (`slug`, `data`, `blocks`, `side`) | 2 props (`slug`, `side`) |
| **Volt mount** | Complesso (fetching + setup) | Minimale (solo setup) |
| **Testabilita** | Testare ogni route file | Testare solo il componente |

## Principio Canonico

> **Un componente Blade deve essere self-contained: riceve solo parametri di configurazione (slug, side, layout), recupera i propri dati internamente, e renderizza.**

## Anti-Pattern (VIETATO)

- ❌ Route file fa `Page::getBlocksBySlug()` e passa `:blocks`
- ❌ Route file conosce la logica di fetching dei blocchi
- ❌ Props che duplicano dati che il componente puo derivare
- ❌ Volt mount con fetching dati invece di solo setup props

## Best Practices

- ✅ Componente Blade recupera i propri dati internamente
- ✅ Route file passa solo parametri di configurazione (`slug`, `side`)
- ✅ Props minime necessarie
- ✅ Volt mount minimale: solo setup, nessun fetching
- ✅ DRY: logica di fetching in un solo posto (il componente)

---

*Regola creata: 2026-05-21 — User directive: "e' una stronzata passare :blocks quando <x-page> puo recuperarli da :slug"*
