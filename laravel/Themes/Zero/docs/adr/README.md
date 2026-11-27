---
title: "ADR — Theme Zero"
type: index
owner: Zero
updated: 2026-11-24
qmd: "Theme Zero ADR architecture decision record MADR formato asset Vite symlink"
---

# ADR — Theme Zero

Un ADR del tema Zero registra una scelta difficile da invertire, sorprendente o frutto di un trade-off reale su struttura del tema, build degli asset e confini tra tema e moduli. Ogni affermazione ha un file di prova. Le decisioni di business restano negli ADR del modulo interessato. Template condiviso: [0000-template](../../../../Modules/Xot/docs/adr/0000-template.md).

## Formato MADR

Frontmatter (`title`, `type: decision`, `status`, `created`, `updated`, `decision-makers`, `module`, `qmd`) e sezioni nell'ordine: `## Contesto`, `## Driver della decisione`, `## Alternative scartate`, `## Decisione`, `## Conseguenze`, `## Conferma`. Nome file canonico `NNNN-slug.md` in kebab-case senza data; eccezioni: `README.md`, `INDEX.md` (stub superseded), `0000-template.md`, `index.md`.

## ADR presenti

Inventario canonico: [index.md](index.md). Presenti: [0001-auth-pages-render-module-widgets-with-panel-css](0001-auth-pages-render-module-widgets-with-panel-css.md), [0002-theme-as-dress-no-php](0002-theme-as-dress-no-php.md), [0003-theme-assets-are-built-in-theme-and-served-by-symlink](0003-theme-assets-are-built-in-theme-and-served-by-symlink.md).

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

Questo indice appartiene a **theme_zero_fila5**: ogni decisione su codice, dominio o tema va nell'ADR del package owner; il root registra soltanto i vincoli di composizione. Un ADR richiede una scelta reale con alternative e conseguenze, più una **Conferma** ripetibile (oppure la dichiarazione esplicita che manca). Non creare ADR fittizi per riempire un indice.

- [Confine LaravelDay/harness Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/adr/0042-laravel-day-harness-adoption-boundary.md); [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md).
- **BMAD**: la story owner-local conserva `scope`, `must_not_change`, `evidence`, `approval_required` nei cambi rischiosi.
- **ECC**: nessun marker di merge; distinguere la prova eseguita dal semplice riferimento a un test; se la conferma non è disponibile segnare `non eseguita`.
- **Second Brain**: QMD/Graphify e `.harness/memory/{facts,lessons}.md` sono puntatori a evidenza datata, non copie degli ADR. [Runbook](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md) · [Rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
