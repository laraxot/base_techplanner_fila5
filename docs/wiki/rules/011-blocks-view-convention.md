# Rule: Blocks View Convention

**Status**: CRITICAL
**Created**: 2026-03-30
**Priority**: MANDATORY

---

## The Rule

> **Ogni blocco ha una view definita come: `pub_theme::components.blocks.<tipo blocco>.<blade del blocco>`**
>
> **`<tipo blocco>` DEVE essere un tipo semantico universale, MAI un nome di pagina o modulo.**

---

## Canonical Block Types

I tipi di blocco sono definiti in base a Flowbite Blocks, Tailwind Plus UI Blocks e [DaisyUI](https://daisyui.com/docs/) (componenti e convenzioni documentazione ufficiale).

### Tipi Validi (esempi)

```
hero          card          navigation    footer
header        sidebar       cta           pricing
features      blog          contact       form
login         faq           stats         testimonials
newsletter    alert         modal         tabs
table         list          avatar        badge
calendar      news          topics        links
feedback      search        filter        gallery
```

### Tipi NON Validi

```
tests.argomenti    ❌ "argomenti" è una pagina, non un tipo
fixcity.tickets    ❌ "tickets" è un modulo, non un tipo
homepage.hero      ❌ "homepage" è una pagina, non un tipo
segnalazione-02-dati ❌ step wizard — usa il wizard/cms canonicale, non un block type pagina
```

---

## Renderer `tests/[slug]` Non Compensa Blocchi Sbagliati

Il renderer Folio `Themes/Sixteen/resources/views/pages/tests/[slug].blade.php` deve restare una shell CMS generica:

- costruisce `tests.{slug}`;
- chiama `Page::getBlocksBySlug($pageSlug, 'content')`;
- include `$block->view`.

Non deve contenere mappe tipo `LEGACY_WIZARD_STEP_SLUGS`, redirect verso `segnalazione-crea?step=N`, import di `LaravelLocalization`, o qualunque conoscenza degli step Filament. Quelle informazioni sono dati/policy applicative e devono vivere in CMS/config/middleware/service/widget, non nel renderer.

Se un vecchio slug Design Comuni (`segnalazione-01-privacy`, `segnalazione-02-dati`, `segnalazione-03-riepilogo`) deve aprire uno step del wizard, usare i metadati CMS/configurazione esistenti (`_legacy_slug`, `_legacy_redirect_step`) nel layer corretto. Non duplicare la tabella in Blade.

---

## Esempio Corretto

```json
{
    "type": "hero",
    "data": {
        "view": "pub_theme::components.blocks.hero.page-intro",
        "title": "Argomenti",
        "subtitle": "Gli argomenti rispondono..."
    }
}
```

## Esempio Sbagliato

```json
{
    "type": "argomenti",
    "data": {
        "view": "pub_theme::components.blocks.tests.argomenti.topics-grid"
    }
}
```

---

## Directory Structure

```
Themes/Sixteen/resources/views/components/blocks/
├── hero/           ← tipo: hero
│   ├── default.blade.php
│   ├── page-intro.blade.php
│   └── enhanced.blade.php
├── card/           ← tipo: card
│   ├── default.blade.php
│   ├── teaser-trio.blade.php
│   └── featured-grid.blade.php
├── navigation/     ← tipo: navigation
│   ├── breadcrumb.blade.php
│   ├── header-slim.blade.php
│   ├── header-center.blade.php
│   └── header-navbar.blade.php
├── footer/         ← tipo: footer
│   ├── default.blade.php
│   └── slim.blade.php
├── topics/         ← tipo: topics
│   ├── grid.blade.php
│   └── featured.blade.php
├── feedback/       ← tipo: feedback
│   └── rating.blade.php
├── contact/        ← tipo: contact
│   └── card.blade.php
├── news/           ← tipo: news
│   └── featured.blade.php
├── calendar/       ← tipo: calendar
│   └── carousel.blade.php
└── links/          ← tipo: links
    ├── list.blade.php
    └── search.blade.php
```

---

## Autodiscovery

`GetViewBlocksOptionsByTypeAction` scansiona:
```
Modules/*/resources/views/components/blocks/{type}/*.blade.php
```
e restituisce:
```php
['module::components.blocks.{type}.{name}' => '{name}']
```

---

## Icon Convention

### SVG Registration

Gli SVG nelle cartelle `Modules/*/resources/svg/` vengono registrati **automaticamente** come icone Filament.

```
Modules/UI/resources/svg/brands/facebook.svg  →  ui-brands.facebook
Modules/UI/resources/svg/brands/twitter.svg   →  ui-brands.twitter
Modules/UI/resources/svg/brands/linkedin.svg  →  ui-brands.linkedin
```

**Formula**: `<nome_modulo_minuscolo>-<sottocartella>.<nome_file>`

### Usage

```blade
{{-- Social icons (registered from Module SVGs) --}}
<x-filament::icon icon="ui-brands.facebook" class="w-5 h-5" />
<x-filament::icon icon="ui-brands.twitter" class="w-5 h-5" />
<x-filament::icon icon="ui-brands.linkedin" class="w-5 h-5" />
<x-filament::icon icon="ui-brands.instagram" class="w-5 h-5" />

{{-- Standard icons (Heroicons via Filament) --}}
<x-filament::icon icon="heroicon-o-arrow-right" class="w-4 h-4" />
<x-filament::icon icon="heroicon-o-shield-check" class="w-5 h-5" />
<x-filament::icon icon="heroicon-o-map-pin" class="w-5 h-5" />
```

### Rules

- **MAI** usare `<x-heroicon-o-*>` diretto - non è registrato come Blade component
- **MAI** usare `<svg><use xlink:href="...sprites.svg#...">` - non serve, gli SVG sono registrati
- **SEMPRE** usare `<x-filament::icon icon="...">`
- Per brand/social icons: usare `ui-brands.*` da `Modules/UI/resources/svg/brands/`
- Per icone standard: usare `heroicon-o-*` o `heroicon-s-*`

---

**Enforced By**: AI Agents, Code Review
**Violations**: 0 (must remain 0)
