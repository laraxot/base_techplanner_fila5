# Rule 014: Visual Inspection Script Promotion

## Regola

- Gli script di ispezione visiva nati in `/tmp` non possono restare li se diventano parte del workflow.
- Devono essere promossi in una sottocartella tematica di `bashscripts/inspectors/`.
- Devono avere documentazione in `bashscripts/docs/<topic>/`.
- La documentazione del tooling e la documentazione del tema/modulo devono linkarsi a vicenda con path relativi.
- Gli screenshot e le analisi visive restano nei docs del tema/modulo; il codice degli inspector resta in `bashscripts/`.

## Motivo

Questo separa in modo netto tooling riusabile, evidenze visive e documentazione funzionale, evitando dispersione in `/tmp` e semplificando il riuso multi-agente.

## Esempio canonico

- Script: `bashscripts/inspectors/homepage-visual-parity/inspect-readmore.mjs`
- Doc script: `bashscripts/docs/homepage-visual-parity/inspectors.md`
- Doc tema: `laravel/Themes/Sixteen/docs/design-comuni/homepage-parity-report.md`
