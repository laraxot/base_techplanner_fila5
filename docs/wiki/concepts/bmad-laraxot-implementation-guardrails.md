---
title: "BMAD — guardrail Laraxot (implementazione)"
type: concept
created: 2026-05-28
updated: 2026-05-28
tags: [bmad, laraxot, nwidart, modules, second-brain]
related:
  - ../rules/bmad-v6-on-demand.md
  - ../rules/namespace-structure-rules.md
  - ../memories/incident-nwidart-class-outside-app.md
  - ../skills/bmad-on-demand-routing.md
---

# BMAD — guardrail Laraxot (implementazione)

Caricare **on-demand** quando si esegue `/bmad-create-story`, `/bmad-dev-story` o qualsiasi implementazione PHP/JS in questo monorepo.

## Scopo

BMAD upstream è generico. Fixcity/Laraxot aggiunge vincoli non negoziabili che devono comparire in story, task e review — altrimenti gli agenti reintroducono errori già pagati (es. path modulo sbagliato, fork mappa nel tema).

## Moduli nwidart (PHP)

| ✅ Canonico | ❌ Vietato |
|------------|-----------|
| `laravel/Modules/{Mod}/app/Actions/Foo.php` | `laravel/Modules/{Mod}/Actions/Foo.php` |
| `Modules\{Mod}\Actions\Foo` (namespace) | `Modules\{Mod}\App\Actions\Foo` |
| Leggere `Modules/{Mod}/composer.json` autoload | Assumere PSR-4 root = cartella modulo |

**Verifica obbligatoria** prima di ogni nuova classe nel modulo:

```bash
grep -A3 '"psr-4"' laravel/Modules/{Modulo}/composer.json
```

## Story BMAD — cosa scrivere nei task

- Path file con **`app/`** esplicito: `Modules/Fixcity/app/Actions/GenerateTicketsJsonAction.php`.
- Se il task tocca GeoJSON pubblico: indicare action nel modulo **owner** (Fixcity), non nel tema Sixteen.
- Acceptance criteria: “nessun file PHP nuovo fuori da `app/` nel modulo owner”.

## Dev story — preflight Laraxot (dopo Pre-Flight BMAD)

1. Identificare **modulo owner** (Fixcity, Geo, Xot, …).
2. Caricare [namespace-structure-rules.md](../rules/namespace-structure-rules.md).
3. Se mappa/JS condiviso: [no-theme-map-lit-fork.md](../rules/no-theme-map-lit-fork.md) + memoria [incident-geo-map-lit-local-fork.md](../memories/incident-geo-map-lit-local-fork.md).
4. Se enum/traduzioni: [enum-trait-required.md](../rules/enum-trait-required.md).
5. Dopo implementazione: PHPStan L10 sul path toccato; quality gate wiki.

## HTTP — niente Controller

- **Vietato** `laravel/app/Http/Controllers/*.php` e `Modules/*/app/Http/Controllers/*` per route applicative.
- **API JSON:** Folio `resources/views/pages/api/*.blade.php` + `render()` → `response()->json()` + Actions.
- **Religione / perché:** [no-controllers-rule.md](../rules/no-controllers-rule.md) — leggere prima di ogni endpoint.
- Canon tecnico: [folio-api-no-controllers.md](folio-api-no-controllers.md) · Story: [STORY-107](../../stories/STORY-107-no-http-controllers-religion-standing-rule.md).

## Frontoffice — tab Design Comuni

- **HTML parity** su [segnalazioni-elenco AgID](https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html): classi `nav-tabs`, `nav-link`, `tab-pane` — **vietato** `segnalazioni-tabs-bar`, `ticket-tabs-bar`, `tabs-bar`, `segnalazioni-fi-tabs`.
- Canon: [tabs-class-naming-rule.md](tabs-class-naming-rule.md), partial `Themes/Sixteen/.../segnalazioni/tabs.blade.php`.

## Incidenti documentati (non ripetere)

| Incidente | Memory |
|-----------|--------|
| `Actions/` senza `app/` | [incident-nwidart-class-outside-app.md](../memories/incident-nwidart-class-outside-app.md) |
| `geo-map-lit-local.js` nel tema | [incident-geo-map-lit-local-fork.md](../memories/incident-geo-map-lit-local-fork.md) |

## Integrazione BMAD v6

- Regola on-demand: [bmad-v6-on-demand.md](../rules/bmad-v6-on-demand.md) (punto 8).
- Router: [bmad-on-demand-routing.md](../skills/bmad-on-demand-routing.md).
- Wrapper locali: `.claude/commands/bmad/create-story.md`, `.claude/commands/bmad/dev-story.md` (sezione Laraxot Preflight).
