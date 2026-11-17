---
title: "Link navigazione FO — Folio path + localizeUrl"
type: rule
tags: [folio, frontoffice, localization, navigation, header, religion]
created: 2026-06-05
updated: 2026-06-05
qmd: "folio frontoffice navigation links localizeUrl FrontofficeUrl no route user.services multilingua"
related:
  - no-controllers-rule.md
  - ../memories/folio-frontoffice-links-localize-url.md
  - ../../laravel/Themes/Sixteen/docs/wiki/concepts/fo-folio-links-multilingua.md
  - ../../laravel/Modules/Cms/docs/folio-routing-locale.md
---

# Link navigazione FO — Folio path + localizeUrl

## Religione (una frase)

**Frontoffice = Folio + path localizzato. Mai `route('user.*')`, mai rotte Controller, mai path BO Filament nel menu cittadino.**

## Superfici

| Superficie | Routing | Link in Blade |
|------------|---------|---------------|
| FO menu utente | Folio `pages/` con `name()` | `route('<folio-name>')` — verificare con `folio:list` |
| FO nav CMS/JSON | URL da `header.json` | `FrontofficeUrl::fromStoredUrl($url)` only |
| BO admin | Filament panel | `Resource::getUrl()` — solo in Filament |
| API JSON | Folio `pages/api/` + Action | path Folio, zero Controller |

## Vietato nel header / menu FO

```blade
route('user.services')
route('tests.view', ['slug' => 'servizi'])
url('/servizi')                    {{-- senza locale --}}
href="/dashboard"                  {{-- dashboard = Filament BO --}}
href="/{{ app()->getLocale() }}/profilo/notifiche"  {{-- getLocale manuale + path IT inventato --}}
__('ui::ui.profile.notifications')                  {{-- chiave 5 livelli sbagliata --}}
```

### Tre pilastri header FO

| Pilastro | Vietato | Corretto |
|----------|---------|----------|
| URL | `getLocale()` nell'href, `/it/...`, `FrontofficeUrl::personalArea*` | `route('services.categories')` ecc. (`folio:list`) |
| Path | `profilo/*` (italiano nel routing) | pagina Folio owner (`area-personale/notifiche`) |
| Copy | `ui::ui.profile.*` | `pub_theme::header.user.dropdown.*.label` |

Canon: [fo-folio-named-routes-header.md](../../laravel/Themes/Sixteen/docs/wiki/concepts/fo-folio-named-routes-header.md) · [fo-header-url-and-translation-contract.md](../../laravel/Themes/Sixteen/docs/wiki/concepts/fo-header-url-and-translation-contract.md)

## Corretto (tema Sixteen)

Menu utente — named route Folio (`php artisan folio:list`):

```blade
href="{{ route('services.categories') }}"
href="{{ route('area-personale.notifiche') }}"
```

CMS/JSON nav: `FrontofficeUrl::fromStoredUrl($url)` only.

## Verifica

- Pest: `laravel/Themes/Sixteen/tests/Unit/HeaderAreaPersonaleLinksContractTest.php`
- Grep header: `rg "route\('user\.|route\('tests\.view" laravel/Themes/Sixteen/resources/views/components/sections/header`

## Backlink

- [no-controllers-rule.md](no-controllers-rule.md)
- [Memoria](../memories/folio-frontoffice-links-localize-url.md)
- [Concept tema](../../laravel/Themes/Sixteen/docs/wiki/concepts/fo-folio-links-multilingua.md)
