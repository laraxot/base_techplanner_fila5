---
title: PHPStan Module Sweep 2026-05-26
type: concept
confidence: high
created: 2026-05-26
tags: [phpstan, modules, github-issues, quality-gate]
related:
  - ../rules/phpstan-no-level-parameter.md
  - ../rules/phpstan_execution.md
  - ../rules/file-locking-validation-protocol.md
---

# PHPStan Module Sweep 2026-05-26

## Esito

Sweep modulo per modulo eseguito dalla cartella `laravel` con:

```bash
./vendor/bin/phpstan analyse Modules/<Modulo> --memory-limit=-1 --error-format=table
```

Poi root sweep completo:

```bash
./vendor/bin/phpstan analyse Modules --memory-limit=-1 --error-format=table
```

Risultato root sweep: **OK, no errors**, `5151/5151` file analizzati.

## Moduli

Tutti i moduli PHP analizzati sono puliti. `Modules/Sixteen` contiene solo docs/wiki/raw e `ruvector.db`, quindi il run isolato produce `No files found to analyse`: va classificato come `SKIP no PHP files`, non come errore PHPStan di codice.

## GitHub Issues Aggiornate

- `laraxot/module_cms_fila5#12`: chiusa dopo rerun Cms pulito.
- `laraxot/module_cms_fila5#13`: chiusa dopo rerun Cms pulito.
- `laraxot/base_fixcity_fila5#124`: commentata per chiarire `Modules/Sixteen` docs-only e root sweep pulito.

## Regola Consolidata

Non usare mai `--level` nei comandi PHPStan: `phpstan.neon` e' la source of truth. Per restringere il controllo si passa il path del modulo, non si cambia il livello.
