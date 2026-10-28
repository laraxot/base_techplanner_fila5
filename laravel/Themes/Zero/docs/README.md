---
id: zero-docs-readme
slug: readme
title: "Documentazione del tema Zero"
description: "Punto di ingresso della docs del tema Zero: scopo del tema, mappa delle cartelle, documenti chiave e regole di manutenzione."
document_type: index
type: index
category: documentation
status: active
module: Zero
tags: [zero, tema, docs, indice]
created: "2026-09-24"
updated: "2026-10-20"
qmd: "tema zero docs indice mappa cartelle bmad wiki stories archivio frontmatter duplicati"
issues: []
discussions: []
related:
  - ./inventory.md
  - ./wiki/index.md
  - ./bmad/00-index.md
  - ./bmad/scopo.md
  - ./bmad/purpose.md
  - ./stories/docs-temi-audit-organizzazione.story.md
  - ../../../Modules/Cms/docs/scopo.md
  - ../../../Modules/Lang/docs/scopo.md
  - ../../../Modules/Xot/docs/wiki/memories/phpstan-single-neon-config.md
  - ../../../Modules/Xot/docs/conventions/docs-organization.md
  - ./INDEX.md
---

<!--
GateGuard facts:
1. Supersedes previous related-only set — adds docs-organization + INDEX spine link; non cancella contenuto.
2. Linked from Themes/Zero/docs/INDEX.md, bmad/00-index.md, inventory.
3. Edit existing README.md — not a new file.
4. User verbatim: "aggiorna studia e migliora e organizza meglio le cartelle docs dentro i moduli e dentro i temi e migliora il tuo second brain"
-->

# Documentazione del tema Zero

## Scopo del tema

`laravel/Themes/Zero` e' l'unico tema frontend **attivo** del monorepo (tipo `pub`, vedi `theme.json`); One e Three esistono come skeleton. Contiene solo presentazione: viste Blade, asset e traduzioni. La cartella `app/` e' vuota.

**Perche' (pagine canoniche):** [bmad/scopo.md](bmad/scopo.md) (IT) · [bmad/purpose.md](bmad/purpose.md) (bridge EN) · [wiki/concepts/theme-zero-operating-focus.md](wiki/concepts/theme-zero-operating-focus.md).

| Parte | Cosa c'e' | Dove |
|---|---|---|
| Viste | layout `app`, pagine `home`, `index`, login, componenti `layouts`, `blocks`, `ui`, override Filament per il login | `resources/views/` |
| Asset | Tailwind 3.4, Alpine 3, Flowbite 4, Vite 6 con `laravel-vite-plugin`; build in `public/` | `resources/css`, `resources/js`, `vite.config.js` |
| Mail | layout HTML `base`, `clean`, `christmas-professional` | `resources/mail-layouts/` |
| Lingue | `navigation` e `ui` in it, en, de | `lang/` |

Il tema non contiene logica di dominio. Survey, autorizzazione e dati Pulse appartengono al modulo Quaeris, non presente in questo repository: il contratto resta esterno. Non copiare nel tema metriche o decisioni di dominio.

**Confini:** Folio/Blade/asset qui; risoluzione pagina e blocchi JSON nel modulo Cms, non presente in questo repository; autolabel e locale switcher in [Lang — scopo](../../../Modules/Lang/docs/scopo.md); foundation Filament in [Xot](../../../Modules/Xot/docs/00-index.md) e [mai estendere Filament*](concepts/xotbase-never-extend-filament.md).

**Indici:** questa pagina e' l'ingresso. BMAD usa [bmad/00-index.md](bmad/00-index.md) (minuscolo). Non creare `00-INDEX.md` gemello.

## Mappa delle cartelle

| Percorso | Ruolo | Ingresso |
|---|---|---|
| [`bmad/`](bmad/) | guide, architettura, report e pianificazione del tema (la parte piu' grande) | [`bmad/00-index.md`](bmad/00-index.md), [`bmad/README.md`](bmad/README.md), panoramica lunga [`bmad/theme-overview.md`](bmad/theme-overview.md) |
| [`wiki/`](wiki/) | conoscenza curata per gli agenti: concetti, regole, how-to, memorie, fonti | [`wiki/index.md`](wiki/index.md), [`wiki/README.md`](wiki/README.md) |
| [`stories/`](stories/) | story BMAD del tema | [`stories/README.md`](stories/README.md) |
| [`bmad/stories/`](bmad/stories/) | altre due story, nate prima della policy | vedi sotto |
| [`concepts/`](concepts/) | vincoli e concetti specifici del tema | [`concepts/README.md`](concepts/README.md) |
| [`skills/`](skills/) | note sulle skill del tema | [`readme.md`](skills/readme.md) |
| [`_archive/`](_archive/) | copie storiche, non canoniche; ogni file ha `canonical:` verso il documento vivo | [`README.md`](_archive/README.md) (tabella copia e canonico) |

File nella radice: [`changelog.md`](changelog.md) (cronologia), [`inventory.md`](inventory.md) (conteggi verificati), [`index.md`](index.md) (indice canonico) e [`index-pointer.md`](index-pointer.md) (alias storico).

## Documenti chiave

- Architettura: [`bmad/architecture.md`](bmad/architecture.md), [`wiki/rules/architecture-rules.md`](wiki/rules/architecture-rules.md), [`concepts/xotbase-never-extend-filament.md`](concepts/xotbase-never-extend-filament.md).
- Viste e UI: [`bmad/layouts.md`](bmad/layouts.md), [`bmad/components.md`](bmad/components.md), [`bmad/customization.md`](bmad/customization.md), [`bmad/mail-layouts.md`](bmad/mail-layouts.md).
- Grafici: [`bmad/filament-chart-integration.md`](bmad/filament-chart-integration.md), [`wiki/concepts/jpgraph-guide.md`](wiki/concepts/jpgraph-guide.md).
- Qualita': [`bmad/phpstan.md`](bmad/phpstan.md) (gate **Modules**, non analyse sul solo tema), [`bmad/phpstan-dry-kiss-theme-guidelines.md`](bmad/phpstan-dry-kiss-theme-guidelines.md), [`bmad/php-quality-gates-rule.md`](bmad/php-quality-gates-rule.md). Gate unico: solo `laravel/phpstan.neon` — [phpstan-single-neon-config](../../../Modules/Xot/docs/wiki/memories/phpstan-single-neon-config.md). Evidenza foundation: [Xot phpstan-modules-zero-wave3](../../../Modules/Xot/docs/stories/phpstan-modules-zero-wave3.story.md); religione **scopo → fix** + Services→Actions in [services-to-actions-global-wave](../../../Modules/Xot/docs/stories/services-to-actions-global-wave.story.md).
- **Boy scout post-zero (continua):** dopo il gate Modules a zero non c'e' PHP di dominio da tipizzare nel tema (`app/` vuota). Il miglioramento continuo resta su docs/viste/asset (indice = questo README; story [docs-temi-audit-organizzazione](stories/docs-temi-audit-organizzazione.story.md) wave 4+).

## Story

- In `stories/`: [audit e organizzazione delle docs dei temi, 2026-10-20](stories/docs-temi-audit-organizzazione.story.md), [salute della docs, 2026-10-08](stories/zero-docs-health.story.md), [audit documentazione](stories/docs-theme-zero-audit.story.md), [audit indice](stories/docs-index-audit.story.md), [pulizia marker di conflitto](stories/zero-conflict-markers-cleanup.story.md), [restyling login](stories/auth-login-ui-ux-redesign.story.md).
- In `bmad/stories/`: [gate PHPStan e swarm](bmad/stories/quality-gates-phpstan-swarm.story.md), [dedup e frontmatter](bmad/stories/theme-docs-dedup-frontmatter.story.md).

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
- Nomi che differivano solo per la maiuscola (collidono su filesystem case-insensitive): `bmad/readme.md` e' stato assorbito in [`bmad/theme-overview.md`](bmad/theme-overview.md); `INDEX.md` e' stato assorbito in [`index.md`](index.md) e [`index-pointer.md`](index-pointer.md) resta un alias. Il controllo `find docs -type f | tr A-Z a-z | sort | uniq -d` non stampa nulla.
