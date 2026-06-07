---
title: "Clean Volt Route Files — Single Responsibility Pattern"
type: concept
sources: ["session-2026-05-21", "laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php"]
confidence: high
created: 2026-05-21
updated: 2026-05-21
tags: [volt, folio, clean-code, single-responsibility, route-files, best-practice]
related:
  - rules/no-hardcoded-mappings-in-views.md
  - rules/quality-gate-after-edit.md
---

# Clean Volt Route Files — Single Responsibility Pattern

## Pattern Canonico

Un file Volt/Folio route (`[slug].blade.php`) deve fare **SOLO**:

1. Dichiarare route name e middleware
2. Definire componente con props e mount minimale
3. Renderizzare il layout delegando il fetch/rendering blocchi a `<x-page>`

## Esempio Corretto (CANONICO)

```php
<?php
declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;
name('tests.view');
middleware(PageSlugMiddleware::class);

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
    <x-page side="content" :slug="$pageSlug" :data="$data" />
    @endvolt
</x-layouts.app>
```

## Perche e' Meglio

| Aspetto | Anti-Pattern (`LEGACY_WIZARD_STEP_SLUGS`) | Canonico (pulito) |
|---|---|---|
| **Righe di codice** | 63 (con logica e redirect) | **25** (solo render) |
| **Costanti business** | `LEGACY_WIZARD_STEP_SLUGS = [3 slug → step]` | nessuna |
| **Logica in `mount()`** | `if (isset(...)) { $this->redirect(...) }` con side effect | nessuna — solo assegnamenti |
| **Import extra** | `Mcamara\LaravelLocalization\Facades\LaravelLocalization` | solo Folio + Volt + middleware |
| **Responsabilita** | routing + decisione redirect + rendering | solo rendering |
| **Conoscenza di dominio** | conosce wizard, step, slug "segnalazione-*" | zero — agnostico |
| **Estensibilita** | nuovo step legacy → modifica file PHP | nuovo slug → solo nuovo record `pages` (zero codice) |
| **Variabilita per pagina** | via PHP nel router (hardcoded) | via dati JSON (`blocks` content) |
| **Path branches** | 2 (redirect vs render) | 1 (sempre render) |
| **Fetch blocchi** | `Page::getBlocksBySlug` in mount + `:blocks` su `<x-page>` (duplicato) | solo `<x-page :slug="$pageSlug" />` — fetch nel componente CMS |
| **DRY** | mapping duplicato vs wizard widget | single source of truth: tabella `pages` |
| **Testabilita** | 2 rami da coprire + redirect assertion | 1 path, asserisce solo blocchi resi |
| **Coerenza nome route** | `name('tests.view')` ma a volte redirige | `name('tests.view')` => sempre view |
| **HARD RULE rispettate** | viola `no-business-logic-in-dynamic-router` + `no-hardcoded-mappings-in-views` | rispetta entrambe |

## Principi Applicati

1. **Single Responsibility**: il route file renderizza, non decide redirect
2. **Separation of Concerns**: redirect → block JSON (`{"type": "redirect"}`) o route dedicata; mapping → config; il router resta agnostico
3. **Open/Closed**: nuovi slug → record in `pages` + blocks JSON; mai modifica del router
4. **DRY**: lo slug→step routing (se proprio serve) vive nel widget Filament (SSOT), non duplicato nel router CMS
5. **Clean Code**: il file è leggibile e fa **una sola cosa** — rendere i blocchi della pagina identificata dallo slug

## Detector — quando un PR introduce questo anti-pattern

```bash
# Cerca dentro qualsiasi pagina dinamica
rg -n 'const\s+[A-Z_]+_SLUGS|match\s*\(\s*\$slug|if\s*\(\s*\$slug\s*===|redirect.*\$slug|self::[A-Z_]+\[\$slug\]' \
   $(find . -path '*/pages/*' -name '\[*\].blade.php')
```

Se restituisce match → bloccare il PR. Il fix è la versione canonica sopra.

## Anti-Pattern Riconosciuti e Risolti

- ❌ `private const LEGACY_WIZARD_STEP_SLUGS` → RIMUOVERE
- ❌ `Page::getBlocksBySlug` in mount + `<x-page :blocks="..." />` → solo `:slug` (componente CMS fetcha)
- ❌ Redirect logic in `mount()` → SPOSTARE in block `redirect` JSON o route dedicata
- ❌ Import `LaravelLocalization` in dynamic router → RIMUOVERE (sintomo di logica di dominio)
- ❌ `Page::getBlocksBySlug()` + `@foreach` nel route file se `<x-page>` puo' gestire fetch e rendering
- ❌ `array_merge($data, ['data' => $block->data])` nel route file → il merge appartiene al componente pagina

## Discussione Aperta: Alias `<x-page>`

Prima di sostituire un renderer manuale gia' in produzione, verificare runtime che `<x-page>` risolva al componente class-based `Modules\Cms\View\Components\Page`. Nel tema Sixteen esiste documentazione storica contraddittoria su `page-component-conflict.md`: trattarla come input da verificare, non come fonte finale.

## Slug Corretto

Nel renderer `/tests/{slug}` non passare lo slug grezzo a `<x-page>`.

```blade
{{-- corretto: chiave CMS completa --}}
<x-page side="content" :slug="$pageSlug" :data="$data" />

{{-- sbagliato: cerca pages.slug = "segnalazione-crea" invece di "tests.segnalazione-crea" --}}
<x-page side="content" :slug="$slug" :data="$data" />
```

`$slug` resta utile dentro `$data` per i blocchi, ma la prop `slug` del componente pagina deve puntare al record CMS esatto.

## Cross-Refs

- HARD RULE (memory): `feedback_no_business_logic_in_dynamic_router.md`
- HARD RULE (memory): `feedback_no_page_specific_blocks.md`
- Rule wiki: `docs/wiki/rules/no-hardcoded-mappings-in-views.md`
- Rule wiki: `docs/wiki/rules/011-blocks-view-convention.md`
- Goal: `docs/goal/DESIGN-COMUNI-REFERENCE.md`
- Episodio: 2026-05-21 — `LEGACY_WIZARD_STEP_SLUGS` aggiunto a `pages/tests/[slug].blade.php` violando entrambe le HARD rule, issue #77

---

*Concetto creato: 2026-05-21 — pattern canonico estratto da [slug].blade.php quando era pulito (pre-regression `LEGACY_WIZARD_STEP_SLUGS`).*
