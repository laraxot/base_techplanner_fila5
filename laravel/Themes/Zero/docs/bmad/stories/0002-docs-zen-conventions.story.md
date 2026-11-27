---
title: "Docs zen: convenzioni .md del tema Zero"
type: story
status: done
module: Zero
epic: docs-second-brain
created: 2026-11-25
updated: 2026-11-25
qmd: "zero docs zen convenzioni md kebab frontmatter qmd duplicati alias template fabbricati bonifica"
related:
  - ../../../../../Modules/Xot/docs/bmad/stories/docs-zen-conventions-swarm.story.md
---
# Docs zen: Zero

## Context and Problem Statement

Story ombrello `laravel/Modules/Xot/docs/bmad/stories/docs-zen-conventions-swarm.story.md` (lane D).
Rumore nei docs (alias, copie, template inventati, nomi non conformi) degrada QMD e confonde gli agenti.

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

## Perche'

Story ombrello `laravel/Modules/Xot/docs/bmad/stories/docs-zen-conventions-swarm.story.md` (lane D).
Rumore nei docs (alias, copie, template inventati, nomi non conformi) degrada QMD e confonde gli agenti.

## Prima / Dopo

| Metrica | Prima | Dopo |
|---|---:|---:|
| file .md | 366 | 313 |
| copie esatte (md5) | 0 | 0 |
| nomi datati | 2 | 0 |
| nomi non kebab | 21 | 4 |
| senza frontmatter | 0 | 0 |
| senza `qmd` | 0 | 0 |

Eccezioni volute (non rinominate): `adr/INDEX.md`, `contracts/INDEX.md`, `contracts/_template.md` sono letti per nome da `bashscripts/tools/harness/harness-audit.py`; `wiki/SCHEMA.md` viene ricreato da `bashscripts/docs/setup-llm-wiki-structure.sh` se manca; `wiki/AGENTS.md` e' il nome convenzionale letto dagli agenti.

## Cosa e' stato eliminato/fuso e perche'

- Eliminati 19 template fabbricati (root e `bmad/`: product_*, product-*, sprint*, user*, launch-plan): ricerche utente con partecipanti inventati, roadmap trimestrali, nessuna classe del tema citata. Tenuto `bmad/product-requirements.md` (stack Tailwind/Vite/Flowbite/Alpine verificato in `package.json`); la copia root identica nel corpo e' stata fusa li'.
- Eliminati 12 alias `superseded` (nomi datati `*-2025-10-1x`, `-historic`, `-historical`, maiuscoli) con link reindirizzati al canonico.
- Metodi duplicati: 7 varianti (`duplicate_methods*`, `METODI_DUPLICATI_ANALISI`, `metodi-duplicati-analisi`, `duplicate-methods-report` globale) fuse su `bmad/duplicate-methods.md` (contiene il finding reale `curl_postfields_flatten` e la sua chiusura).
- `conflict-resolution-summary.md` (versione Filament 4) e `_archive/conflict_resolution_summary.md` sussunti da `bmad/conflict-resolution-summary.md`.
- `auth_examples.md` (route `socialite.redirect` obsoleta) sussunto da `auth-examples.md`.
- Collisioni maiuscole/minuscole: `wiki/*/INDEX.md`→`index.md` (5), `readme.md`→`README.md` (parte unica fusa), `bmad/readme.md`→`bmad/theme-overview.md`, `skills/readme.md`→`skills/README.md`, `wiki/readme.md`→`wiki/README.md` (fusa), `wiki/agents.md`→`wiki/AGENTS.md`, `wiki/schema.md`→`wiki/SCHEMA.md`, `changelog.md`→`CHANGELOG.md`.
- Aggiunto `title` a 1 file.

Link aggiornati con mappa vecchio→nuovo su `laravel/Modules/*/docs`, `laravel/Themes/*/docs`, `docs/`, `bashscripts/ai/wiki`; link verso file eliminati senza canonico trasformati in testo o rimossi dagli indici. Verifica finale: 0 link markdown verso path rimossi.

## Casi lasciati in dubbio

- `00-INDEX.md` vs `00-index.md`: contenuti diversi (00-INDEX cita temi di un altro progetto: Barthelemy, Sixteen, TwentyOne); lasciati entrambi.
- `wiki/sources/theme-zero-product-and-roadmap-docs.md` riassume documenti di strategia rimossi.
- `bmad/prd.md` (autore Gemini CLI, generico) tenuto.

## Gate

Solo file `.md` sotto `docs/`: PHPStan/Pint/Pest non applicabili (skip documentato; PHPStan gia' 0 da story ombrello). Nessun commit eseguito dall'agente.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
