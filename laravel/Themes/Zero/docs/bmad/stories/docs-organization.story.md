---
title: "Organizzazione docs — Theme Zero"
type: story
status: done
theme: Zero
epic: docs-governance
story_id: "theme-zero-docs-organization"
track: quick-flow
created: 2026-10-21
updated: 2026-10-21
tags: [docs, theme, zero, bmad, conflicts, index, frontmatter, links]
qmd: "theme zero docs organization merge conflicts canonical index archives frontmatter qmd link audit filament blueprint"
related:
  - ../theme-overview.md
  - ../../../../One/docs/bmad/stories/docs-organization.story.md
  - ../../../../Three/docs/bmad/stories/docs-organization.story.md
  - ../../../../../Modules/Xot/docs/bmad/stories/phpstan-modules-swarm-20261021.story.md
---

# Organizzazione docs — Theme Zero

## Obiettivo

Riportare la docs del tema Zero a uno stato navigabile e verificabile: risolvere
i conflitti Git committati, scegliere un solo indice canonico, archiviare i
duplicati senza perdere contenuto, completare frontmatter/qmd e ridurre i link
rotti.

## Baseline verificata

- 65 file `.md` contenevano 123 blocchi di conflitto Git, già committati nel repo
  annidato (`HEAD` 4bb1b3e): la docs non era leggibile né indicizzabile.
- Coppie case-only: `bmad/readme.md`/`bmad/README.md`, `INDEX.md`/`index.md`.
- Ingressi duplicati: `wiki/readme.md`/`wiki/README.md`,
  `wiki/AGENTS.md`/`wiki/agents.md`, `skills/README.md`/`skills/readme.md`,
  `wiki/skills/INDEX.md`/`wiki/skills/index.md`.
- `bmad/outputs/` e `docs/archive/duplicates/` erano contenitori fuori standard.
- Link attivi verso moduli assenti (`Quaeris`, `Cms`, `Geo`) e verso file cancellati.

## Acceptance criteria

- [x] Zero marker di conflitto Git nella docs.
- [x] Nessuna coppia di nomi che differisce solo per la maiuscola.
- [x] Un solo indice canonico: `docs/index.md`; `index-pointer.md` è un alias.
- [x] Contenuto storico conservato in `_archive/`, non cancellato in massa.
- [x] Frontmatter YAML valido e `qmd` presente in tutti i `.md` attivi.
- [x] `filament-blueprint.md` descrive il contratto Filament del tema.
- [x] Nessun link relativo rotto negli indici e nei README del tema.

## Lavoro eseguito

| Area | Azione | Esito |
| --- | --- | --- |
| Conflitti | Risolti 65 file / 123 blocchi; default lato `laraxot/dev`, override `HEAD` per due analisi F1 | Docs leggibile |
| Indice | `index.md` canonico; vecchio contenuto in `_archive/index-legacy.md`; `INDEX.md` assorbito; `index-pointer.md` alias | Un solo indice |
| Case-only | Assorbiti `bmad/readme.md`, `wiki/readme.md`, `wiki/AGENTS.md`, `skills/README.md`, `wiki/skills/INDEX.md` | 0 coppie residue |
| Archivio | `bmad/outputs/` → `_archive/bmad-outputs/`; `archive/duplicates/` → `_archive/duplicates/` | Fuori standard eliminato |
| README | Aggiornati `README.md`, `bmad/README.md`, `bmad/theme-overview.md`, `wiki/index.md`, `wiki/agents.md` | Riferimenti ai canonici |
| Frontmatter | Aggiunto `qmd` ai file attivi mancanti | 0 mancanti |
| Link | Rebase automatico dei link con basename univoco + fix manuale | 62 link corretti |
| Blueprint | Creato `bmad/filament-blueprint.md` | Contratto XotBase + widget FO espliciti |
| Architettura | Creato `architecture/README.md` | Cartella non più vuota |

## Verifica

```bash
rg -n '^(<<<<<<<|=======$|>>>>>>>)' laravel/Themes/Zero/docs --glob '*.md'  # vuoto
find laravel/Themes/Zero/docs -type f | tr 'A-Z' 'a-z' | sort | uniq -d     # vuoto
# frontmatter/qmd: 204 file attivi, 0 senza frontmatter, 0 senza qmd
# link relativi: 0 rotti in indici/README; debito residuo nei documenti storici
git diff --check -- laravel/Themes/Zero/docs                  # solo whitespace storico
```

Nessun codice applicativo toccato: Pest e PHPStan non applicabili a un diff
docs-only. Nessun commit/push.

## Debito residuo

- Link relativi rotti in documenti storici verso moduli assenti nel checkout o
  file rimossi in passate pulizie; non sono negli indici/README.
- Le due analisi F1 in `screenshots/` e `wiki/comparisons/` possono avere
  divergenze di contenuto: la risoluzione ha privilegiato `HEAD` solo nelle
  copie `screenshots/`, il resto usa `laraxot/dev`.
- Il tema non ha classi proprie in `app/`: il blueprint descrive il contratto,
  non un'implementazione già presente.
- Rischio di scritture concorrenti: `INDEX.md` era stato modificato da un altro
  processo durante la sessione; ricontrollare `git status` prima di nuovi edit.

## Note docs-guardian (swarm PHPStan 2026-10-21b)

Temi già organizzati: nessun nuovo contenuto di feature. Dominio PHPStan residuo
documentato nei moduli (Progressioni/Sigma/Ptv/Pdnd), non qui.