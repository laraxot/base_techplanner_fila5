# 🏛️ Container Blade Agnostic Rule

**Priorità**: 🔴 CRITICAL  
**Data**: 2026-03-26  
**Version**: 1.0

---

## Principio Fondamentale

> **La blade container `[container0]/[slug0]/index.blade.php` DEVE essere AGNOSTICA**
>
> Non può sapere quale tipo di contenuto gestisce.
> Non può importare modelli specifici.
> Non può fare check su `$container0 === 'predicts'`.

---

## ❌ Errori Gravi (MAI FARE)

### 1. Import Modelli Specifici

```php
// ❌ SBAGLIATO - Importa Predict
use Modules\Predict\Models\Predict;

// ❌ SBAGLIATO - Importa Article
use Modules\Blog\Models\Article;

// ✅ CORRETTO - Nessun import specifico
// Usa ResolvePageAction (agnostico)
```

### 2. Check su Container Type

```php
// ❌ SBAGLIATO
if ($container0 === 'predicts') {
    $predict = Predict::where('slug', $slug0)->first();
} elseif ($container0 === 'articles') {
    $article = Article::where('slug', $slug0)->first();
}

// ✅ CORRETTO
$pageData = ResolvePageAction::make()->execute($container0, $slug0);
// ResolvePageAction decide quale modello usare
```

### 3. Widget Specifici Hardcoded

```blade
{{-- ❌ SBAGLIATO - Widget Predict --}}
@livewire(\Modules\Predict\Filament\Widgets\ViewPredictWidget::class)

{{-- ❌ SBAGLIATO - Widget Article --}}
@livewire(\Modules\Blog\Filament\Widgets\ArticleWidget::class)

{{-- ✅ CORRETTO - CMS blocks dinamici --}}
@foreach($cmsBlocks as $block)
    @include('cms::blocks.render', ['block' => $block])
@endforeach
```

### 4. Traduzioni Specifiche

```blade
{{-- ❌ SBAGLIATO --}}
@lang('predict::messages.predict_not_found')

{{-- ✅ CORRETTO --}}
@lang('common::messages.content_not_found')
```

---

## ✅ Blade Container Corretta

```php
<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('container0.detail');
middleware(PageSlugMiddleware::class);
?>
@php
    $container0 = request()->route('container0');
    $slug0 = request()->route('slug0');

    /**
     * Resolve page data using agnostic CMS action.
     * Returns array with: item, type, title, description, blocks
     */
    $pageData = app()->call(\Modules\Cms\Actions\ResolvePageAction::class, [
        'container0' => $container0,
        'slug0' => $slug0,
    ]);

    $pageTitle = $pageData['title'] ?? 'Contenuto non trovato';
    $pageMetaDescription = $pageData['description'] ?? '';
    $cmsBlocks = $pageData['blocks'] ?? [];
@endphp
<x-layouts.app :title="$pageTitle" :meta-description="$pageMetaDescription">
    <div>
        @if($pageData['item'] ?? null)
            {{-- Render CMS blocks (JSON-defined) --}}
            @foreach($cmsBlocks as $blockConfig)
                @include('cms::blocks.render', ['block' => $blockConfig])
            @endforeach
        @else
            <section aria-labelledby="content-not-found-title">
                <h1 id="content-not-found-title">
                    @lang('common::messages.content_not_found', 'Contenuto non trovato')
                </h1>
                <p>
                    @lang('common::messages.content_not_found_description', 'Il contenuto che stai cercando non esiste o non è disponibile.')
                </p>
                <p>
                    <a href="{{ url('/' . app()->getLocale() . '/' . $container0) }}">
                        @lang('common::common.back_to_list', 'Torna alla lista')
                    </a>
                </p>
            </section>
        @endif
    </div>
</x-layouts.app>
```

---

## 🏗️ Come Funziona

### 1. ResolvePageAction (Agnostico)

```php
// Modules/Cms/Actions/ResolvePageAction.php
class ResolvePageAction
{
    public function execute(string $container0, string $slug0): array
    {
        // Dispatcher agnostico
        return match ($container0) {
            'predicts' => $this->resolvePredict($slug0),
            'articles' => $this->resolveArticle($slug0),
            'events' => $this->resolveEvent($slug0),
            default => $this->resolveGeneric($container0, $slug0),
        };
    }
    
    private function resolvePredict(string $slug): array
    {
        $predict = Predict::where('slug', $slug)->first();
        
        return [
            'item' => $predict,
            'type' => 'predict',
            'title' => $predict->title,
            'description' => $predict->description,
            'blocks' => $predict->cms_blocks, // JSON-defined
        ];
    }
}
```

### 2. CMS Blocks (JSON)

```json
// predict.cms.json
{
  "blocks": [
    {
      "type": "hero",
      "component": "predict::components.hero",
      "data": {
        "title": "Chi vincerà F1 2026?",
        "image": "/images/f1-2026.jpg"
      }
    },
    {
      "type": "outcomes-grid",
      "component": "predict::components.outcomes-grid",
      "data": {}
    },
    {
      "type": "order-book",
      "component": "predict::components.order-book",
      "data": {}
    }
  ]
}
```

### 3. Rendering Dinamico

```blade
{{-- cms::blocks.render.blade.php --}}
@php
    $component = $block['component'] ?? null;
    $data = $block['data'] ?? [];
@endphp

@if($component)
    @include($component, $data)
@endif
```

---

## 📋 Checklist Compliance

### Code Review

- [ ] ❌ NO `use Modules\*\Models\*` nella blade
- [ ] ❌ NO `if ($container0 === '...')`
- [ ] ❌ NO `@livewire(\Modules\*\Widgets\*)` hardcoded
- [ ] ✅ USA `ResolvePageAction` (agnostico)
- [ ] ✅ USA `cms_blocks` (JSON-configurati)
- [ ] ✅ USA traduzioni `common::` (agnostiche)

### Architecture

- [ ] Blade è **wrapper vuoto**
- [ ] Logica di dominio è in **Actions**
- [ ] UI è definita in **CMS blocks** (JSON)
- [ ] Funziona per **ANY** container type

---

## 🎯 Vantaggi

| Prima (SBAGLIATO) | Dopo (CORRETTO) |
|-------------------|-----------------|
| Blade importava modelli specifici | ✅ Blade agnostica |
| If/else per ogni container type | ✅ ResolvePageAction dispatcher |
| Widget hardcoded | ✅ CMS blocks (JSON) |
| Traduzioni `predict::` | ✅ Traduzioni `common::` |
| Difficile aggiungere nuovi tipi | ✅ Nuovo tipo = registra resolver |

---

## 📚 Riferimenti

- [Multi-Outcome Rule](../multi-outcome/core-principle.md)
- [ResolvePageAction](../../../Modules/Cms/Actions/ResolvePageAction.php)
- [Container Blade NO Styling](../../../.agents/skills/container-blade-no-styling.md)

---

**Ultimo aggiornamento**: 2026-03-26  
**Review**: ✅ Applied to `Themes/TwentyOne/resources/views/pages/[container0]/[slug0]/index.blade.php`  
**Status**: ✅ Active
