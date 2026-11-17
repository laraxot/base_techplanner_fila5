---
title: "Gate sessione — bloccanti residui 2026-07-24"
type: handoff
tags: [session-gate, blockers, ide-junction, runtime-psr4, techplanner]
created: 2026-07-24
updated: 2026-07-24
qmd: "session gate blockers ide junction github prompts runtime psr4 vendor autoload master prompt"
related:
  - ../../bashscripts/tools/prompts/00-master-prompt.md
  - INDEX.md
---

# Gate sessione — bloccanti residui (§0 di `00-master-prompt.md`)

Eseguito `run-session-gate.sh --markdown` durante l'esecuzione/miglioramento del
master prompt. Non risolti (fuori scope del task richiesto: migliorare il file
prompt), solo documentati come da protocollo §0.

## Bloccanti

1. **`ide-junction`**: `.github/prompts` è directory reale, non symlink verso
   `bashscripts/ai/.agents/prompts`. Il gate lo segnala come FAIL da tempo
   (pre-esistente).
2. **`runtime-psr4`** (exit 255): check PSR-4 runtime (`BaseUser`
   teams/membershipTeams API) fallisce — verificare se `vendor/autoload.php`
   è presente e aggiornato prima di indagare oltre.

## WARN non bloccanti (annotati, non risolti)

- PHPUnit legacy: 2 file `extends TestCase` da convertire a Pest
- Test naming: 8 file lowercase
- Junction multi-tool: 2 symlink da verificare
- Ponytail sync: `ponytail-source` assente
- Composer skeleton: root non-skeleton

## Bug trovato nel master prompt

`bashscripts/tools/prompts/00-master-prompt.md` §13 referenzia
`bashscripts/quality-gates/verify-llm-wiki.sh` — **il file/directory non esiste**.
Il gate reale in uso è `bashscripts/tools/run-session-gate.sh` (usato in §0).
Corretto nel file (v31).
