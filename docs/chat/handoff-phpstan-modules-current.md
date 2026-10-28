---
title: "Handoff PHPStan Modules corrente"
type: handoff
status: active
tags: [phpstan, bmad, second-brain, swarm, confidence]
qmd: "PHPStan Modules corrente stato baseline conflitti Xot Activity Media Lang Job Cms handoff"
related:
  - ../wiki/rules/swarm-parallel-bmad-second-brain.md
  - ../wiki/concepts/second-brain-operating-model.md
  - ../wiki/rules/pest-gate-mandatory.md
---

# Handoff PHPStan Modules corrente

> Stato persistente per il riavvio: ripartire dal baseline reale e verificare ogni claim contro il codice.

## Stato verificato

- Worktree fortemente modificato e non isolato: non usare rollback/reset o cancellazioni massive.
- I marker di conflitto PHP sotto `laravel/Modules` sono stati rimossi; `rg` non ne trova più.
- La causa iniziale era un merge incompleto in `Modules/Xot`, non un problema PHPStan di tipo.
- PHPStan usa `laravel/phpstan.neon`, livello massimo, PHP 8.4.
- Marker PHP correnti: zero verificati con `rg`.
- Le precedenti dichiarazioni di lane verdi sono storiche: vanno rieseguite nel checkout corrente prima di usarle come baseline.
- QMD è disponibile (`qmd 2.8.3`), ma la collezione `techplanner-wiki` non esiste; usare il nome restituito da `qmd collection list` o dal wrapper.
- Esistono 130 file `.lock` e circa 17.945 path sporchi: nessuna pulizia massiva è sicura senza isolare il lavoro concorrente.

## Prossimo ordine

1. Eseguire `cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1 --no-progress` dopo aver fermato ogni sync concorrente.
2. Raggruppare gli errori residui per causa e modulo; correggere la sorgente funzionale.
3. Eseguire Pest sullo scope modificato e documentare ogni blocco ambientale.
4. Solo dopo l'isolamento del worktree, auditare prompt e docs con mappa riferimenti; niente rinomina/cancellazione massiva ora.

## Guardrail

- Nessun `mixed`, ignore PHPStan o baseline usato per nascondere errori.
- Ogni lane ha scope disgiunto; controllare `git status` prima di integrare.
- I nomi `.md` nuovi sono lowercase-kebab-case senza date/timestamp; date solo nel frontmatter.
- Nessun commit automatico.
