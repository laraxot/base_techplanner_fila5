---
title: "Theme Zero — scopo"
type: readme
theme: Zero
status: active
updated: 2026-11-25
qmd: "theme zero scopo tema pubblico attivo pub_theme adm_theme vestito blade tailwind alpine flowbite vite nessun php folio login widget mail layouts"
merged_from:
  - bmad/scopo.md
  - bmad/purpose.md
  - bmad/README.md
  - bmad/readme-en.md
  - bmad/theme-overview.md
  - bmad/philosophy.md
  - bmad/comprehensive-theme-analysis.md
  - analisi-completa-tema.md
  - bmad/theme-documentation.md
  - bmad/themes-system-complete-guide.md
  - wiki/concepts/theme-zero-operating-focus.md
  - wiki/overview.md
  - wiki/overviews/overview.md
  - wiki/README.md
  - glossary.md
  - concepts/README.md
  - architecture/README.md
---

# Theme Zero — scopo

## Perche' esiste

**Zero e' il "vestito" del front office PTVX**: markup Blade, token di stile, pipeline Vite,
layout email e testi di interfaccia. Non decide cosa e' una pagina ne' quale dato mostrare:
dati e interazioni arrivano dai moduli (in primis il `LoginWidget` del modulo User).
Filosofia in una riga: **tema = vestito, moduli = corpo, Xot = ossatura**.

## Dove si usa

- `theme.json`: `name: Zero`, `type: pub`, `active: true`.
- `config/local/ptvx/xra.php` e `config/local/ptvx-mono/xra.php`: `$adm_theme = 'Zero'`,
  `$pub_theme = $adm_theme` → Zero e' sia tema pubblico sia tema admin degli host PTVX.
- Theme One riusa la **build** di Zero: `@vite([...], 'themes/Zero')` nei suoi layout.
- Theme Three e' un guscio senza codice (vedi `../../Three/docs/README.md`).

## Cosa contiene (verificato 2026-11-25)

| Parte | Contenuto | Dove |
|---|---|---|
| [`bmad/`](bmad/) | guide, architettura, report e pianificazione del tema (la parte piu' grande) | [`bmad/00-index.md`](bmad/00-index.md), [`bmad/README.md`](bmad/README.md), panoramica lunga [`bmad/theme-overview.md`](bmad/theme-overview.md) |
| [`wiki/`](wiki/) | conoscenza curata per gli agenti: concetti, regole, how-to, memorie, fonti | [`wiki/index.md`](wiki/index.md), [`wiki/README.md`](wiki/readme.md) |
| [`stories/`](stories/) | story BMAD del tema | [`stories/README.md`](stories/README.md) |
| [`bmad/stories/`](bmad/stories/) | altre story, nate prima della policy | vedi sotto |
| [`architecture/`](architecture/) | solo ingresso verso l'architettura (il contenuto sta in `bmad/architecture.md` e `wiki/rules/`) | [`architecture/README.md`](architecture/README.md) |
| [`concepts/`](concepts/) | vincoli e concetti specifici del tema | [`concepts/README.md`](concepts/README.md) |
| [`skills/`](skills/) | note sulle skill del tema | [`README.md`](skills/README.md) |
| [`_archive/`](_archive/) | copie storiche, non canoniche; ogni file ha `canonical:` verso il documento vivo | [`README.md`](_archive/README.md) (tabella copia e canonico) |
| Layout | `layouts.main`, `layouts.guest`, `layouts.auth`, `layouts.app` + `layouts/app.blade.php` | `resources/views/components/layouts/`, `resources/views/layouts/` |
| Pagine Folio | `index`, `home`, `auth/login` | `resources/views/pages/` |
| Blocchi | hero, cta, features, stats, testimonials, links, navigation, sidebar | `resources/views/components/blocks/` |
| Componenti | `navigation`, `nav-link`, `responsive-nav-link`, `ui/logo` | `resources/views/components/` |
| Override Filament | vista del widget di login | `resources/views/filament/widgets/auth/login.blade.php` |
| Asset | Tailwind 3.4, Alpine 3, Flowbite (`^1.8.1`), Vite 6; build in `public/` | `resources/css/app.css`, `resources/js/app.js`, `vite.config.js` |
| Mail | `base.html`, `christmas-professional.html` | `resources/mail-layouts/` |
| Lingue | it, en, de (completi), es (parziale) | `lang/` |
| PHP | nessuno: `app/` contiene solo `.gitkeep` | test `tests/Unit/ThemeBoundariesTest.php` |

File nella radice: [`CHANGELOG.md`](CHANGELOG.md) (cronologia), [`inventory.md`](inventory.md) (conteggi verificati), [`index.md`](index.md) (indice canonico) e `index-pointer.md` (alias storico, non più presente).

## Documenti chiave

- Architettura: [`bmad/architecture.md`](bmad/architecture.md), [`wiki/rules/architecture-rules.md`](wiki/rules/architecture-rules.md), [`concepts/xotbase-never-extend-filament.md`](concepts/xotbase-never-extend-filament.md).
- Viste e UI: [`bmad/layouts.md`](bmad/layouts.md), [`bmad/components.md`](bmad/components.md), [`bmad/customization.md`](bmad/customization.md), [`bmad/mail-layouts.md`](bmad/mail-layouts.md).
- Grafici: [`bmad/filament-chart-integration.md`](bmad/filament-chart-integration.md), [`wiki/concepts/jpgraph-guide.md`](wiki/concepts/jpgraph-guide.md).
- Qualita': [`bmad/phpstan.md`](bmad/phpstan.md) (gate **Modules**, non analyse sul solo tema), [`bmad/dry-kiss-best-practices.md`](bmad/dry-kiss-best-practices.md), [`bmad/php-quality-gates-rule.md`](bmad/php-quality-gates-rule.md). Gate unico: solo `laravel/phpstan.neon`, modificabile solo dall'utente — [phpstan-neon-user-only](../../../../docs/wiki/rules/phpstan-neon-user-only.md). Religione **scopo → fix** + Services→Actions in [services-to-actions-global-wave](../../../Modules/Xot/docs/stories/services-to-actions-global-wave.story.md).
- **Boy scout post-zero (continua):** dopo il gate Modules a zero non c'e' PHP di dominio da tipizzare nel tema (`app/` vuota). Il miglioramento continuo resta su docs/viste/asset (indice = questo README; story [docs-temi-audit-organizzazione](stories/docs-temi-audit-organizzazione.story.md) wave 4+).

## Story

- In `stories/`: [audit e organizzazione delle docs dei temi, 2026-10-20](stories/docs-temi-audit-organizzazione.story.md), [salute della docs, 2026-10-08](stories/zero-docs-health.story.md), [audit documentazione](stories/docs-theme-zero-audit.story.md), [audit indice](stories/docs-index-audit.story.md), [pulizia marker di conflitto](stories/zero-conflict-markers-cleanup.story.md), [restyling login](stories/auth-login-ui-ux-redesign.story.md).
- In `bmad/stories/`: [gate PHPStan e swarm](bmad/stories/quality-gates-phpstan-swarm.story.md), [gate PHPStan, run themes-zero](bmad/stories/quality-gates-phpstan-swarm-gate-themes-zero-run.story.md), [dedup e frontmatter](bmad/stories/theme-docs-dedup-frontmatter.story.md), [organizzazione docs](bmad/stories/docs-organization.story.md).

## Regole di manutenzione

1. Ogni `.md` apre con front matter completo (`id`, `slug`, `title`, `description`, `document_type`, `category`, `status`); regola in `bashscripts/ai/wiki/rules/markdown-file-naming-and-frontmatter.md`.
2. Un solo canonico per argomento. Il duplicato resta ma con `status: superseded` e `superseded_by`, oppure sta in `_archive/` con `canonical:`. Non cancellare, non rinumerare le story.
3. Nomi in kebab-case senza date ne' suffissi numerici, story comprese (regola dell'utente 2026-10-15); la data sta nel front matter. Verifica: `python3 -I bashscripts/tools/docs/md-filenames.py check --paths <file>...` con i file `.md` elencati uno per uno (passando una cartella il comando stampa "0" senza controllare niente).
4. Nuove pagine nella cartella piu' specifica gia' esistente, con link dall'indice di quella cartella.

## Debito noto

- Marker di conflitto Git: 0 file, verificato il 2026-10-20 con `rg -nP '^(<{7}|={7}|>{7})( |$)'` e con un caso positivo noto (la nota precedente su 30 file era superata).
- Link relativi che non risolvono: conteggio e cause in [`inventory.md`](inventory.md). La maggior parte punta a moduli o pagine di altri progetti della famiglia Laraxot (Performance, Sigma, Ptv, Rating, docs di root) e non sono correggibili senza riscrivere il contenuto.
- Dieci pagine di `bmad/` e `wiki/concepts/` citano moduli che non esistono in questo repository: ognuna ha in testa una "Nota di verifica 2026-10-20" e il contenuto non e' stato riscritto.
- Le guide in `bmad/` citano Tailwind v4, Livewire 4 e Flux UI; il tema reale usa Tailwind 3.4, Alpine e Flowbite. Allineare quando si tocca la guida.
- Nomi che differiscono solo per la maiuscola (collidono su filesystem case-insensitive): **13 coppie** il 2026-11-24, tra cui `readme.md`/`README.md` nella radice, in `bmad/`, `skills/`, `wiki/`, `changelog.md`/`CHANGELOG.md`, `00-index.md`/`00-INDEX.md` e gli `index.md`/`INDEX.md` delle sottocartelle di `wiki/`. Vanno unificati (uno canonico, l'altro assorbito). Elenco: `find docs -type f | tr A-Z a-z | sort | uniq -d`.
## Regole in breve

1. Solo presentazione: Blade, CSS/JS, mail-layouts, traduzioni. Niente Action/modelli in `app/`.
2. Comportamento Filament nuovo: prima il mirror `XotBase*` in Xot, poi l'override di vista qui.
3. Niente testo hardcoded: `__('pub_theme::<file>.<chiave>')`.
4. Lo stack reale e' Tailwind **3.4** + Alpine + Flowbite: non documentare Tailwind 4 / Flux.

## Documentazione

Mappa completa: [index.md](./index.md). Punti d'ingresso:
[architecture](./architecture.md) · [frontend-build](./frontend-build.md) ·
[authentication](./authentication.md) · [theme-boundaries](./theme-boundaries.md) ·
[ADR](./adr/README.md).
