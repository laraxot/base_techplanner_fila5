# Second Brain Session Bootstrap

## Scopo

Ridurre l'errore umano: all'inizio della sessione si esegue una sola procedura che verifica stack, aggiorna indice e conferma retrieval.

## Script canonico

`bashscripts/docs/second-brain-session-bootstrap.sh`

## Flusso eseguito

1. Verifica versione QMD.
2. Verifica collezioni e contesti.
3. Esegue `qmd update`.
4. Esegue due smoke search:
   - `fixcity-root-docs`
   - `fixcity-modules-docs`
5. Mostra status finale indice.

## Perche'

- Tiene allineati root/moduli/temi senza passaggi manuali sparsi.
- Rende ripetibile il "second brain always-on".
- Favorisce DRY+KISS: un comando, un outcome verificabile.

## Collegamenti

- [second-brain-always-on-rule](./second-brain-always-on-rule.md)
- [second-brain-canonical-operating-model](./second-brain-canonical-operating-model.md)
- [cursor-second-brain-max-workflow](../skills/cursor-second-brain-max-workflow.md) — checklist operativa Cursor
- [qmd-local-docs-search](../../project/qmd-local-docs-search.md)
