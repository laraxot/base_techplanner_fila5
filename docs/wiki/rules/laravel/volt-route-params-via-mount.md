---
title: "Rule: Folio/Volt route params via mount()"
type: rule
tags: [volt, folio, livewire, mount, route-params, laravel, mandatory]
created: 2026-06-05
updated: 2026-06-05
qmd: "folio volt mount route params request route forbidden container0 slug0 x-page data bag"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/291"
  - "https://github.com/laraxot/base_fixcity_fila5/issues/258"
  - "https://github.com/laraxot/theme_sixteen_fila5/issues/50"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/259"
related:
  - ../../../memories/folio-route-params-mount-not-request-route.md
  - ../../../memories/volt-route-params-mount-contract.md
  - ../../../../laravel/Themes/Sixteen/docs/wiki/concepts/folio-route-params-mount.md
  - ../no-volt-in-blade-views.md
---

# Rule: Folio/Volt route params via `mount()`

## Regola

Nei file Folio con segmenti dinamici (`[container0]`, `[slug0]`, `[container1]`, ecc.) i parametri route DEVONO entrare da `mount()`.

Vietato inizializzare route context con `@php` + `request()->route()`.

## Sbagliato

```blade
@php
    $container0 = (string) request()->route('container0', '');
    $slug0 = (string) request()->route('slug0', '');
    $pageSlug = $container0 . '.view';
    $data = ['container0' => $container0, 'slug0' => $slug0];
@endphp
```

## Corretto

```php
<?php

declare(strict_types=1);

use function Laravel\Folio\{middleware, name};
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('container0.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $container0 = '';
    public string $slug0 = '';
    public string $pageSlug = '';

    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(string $container0, string $slug0 = ''): void
    {
        $this->container0 = $container0;
        $this->slug0 = $slug0;
        $this->pageSlug = $container0 . '.view';
        $this->data = ['container0' => $container0, 'slug0' => $slug0];
    }
};
?>

<x-layouts.app>
    <div class="page-content content" data-slug="{{ $pageSlug }}" data-side="content">
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    </div>
</x-layouts.app>
```

## Distinzione obbligatoria

- `new class extends Component` e' il componente class-based Volt del file Folio: ok quando serve ricevere parametri route in `mount()`.
- `@volt(...)` e' una directive/wrapper: non serve nella shell generica e non deve essere usata con nomi dinamici.
- Dentro `<x-page>` il contratto resta solo `side`, `slug`, `data`: mai `:container0` o `:slug0` come prop.

## Perche

Folio nomina i segmenti dal filename e li passa al lifecycle del componente. `request()->route()` e' una global HTTP lookup: duplica il contratto, indebolisce type-safety e fa ricomparire bug di scope quando la view diventa Volt o viene ricompilata.

## Verifica

```bash
rg -n -F "request()->route('container0'" laravel/Themes/*/resources/views laravel/Modules/*/resources/views
rg -n -F "@volt($" laravel/Themes/*/resources/views/pages laravel/Modules/*/resources/views/pages
```

Test locale Sixteen: `laravel/Themes/Sixteen/tests/Unit/FolioPageMountContractTest.php`.
