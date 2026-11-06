---
title: "Zero: cosa manca per completare"
type: status
module: Zero
updated: 2026-10-28
repository: "https://github.com/provtv/base_ptv_fila5_mono"
github_issue: "https://github.com/provtv/base_ptv_fila5_mono/issues"
github_discussion: "https://github.com/provtv/base_ptv_fila5_mono/discussions"
related:
  - ../../../Modules/Xot/docs/project-completion-status.md
---

# Zero: cosa manca per completare

Fotografia misurata il 2026-10-28 (sola lettura). Si rigenera con gli stessi controlli: story nel frontmatter,
PHPStan livello 10, blade troncate, traduzioni, test. Riepilogo di progetto: `Modules/Xot/docs/project-completion-status.md`.

## Indicatori

| Indicatore | Valore |
|---|---|
| File PHP in `app/` | 0 |
| Errori PHPStan livello 10 | 0 |
| Blade (troncate in testa) | 23 (0) |
| File di test (`*Test.php`) | 0 |
| TODO/FIXME nel codice | 0 |
| Traduzioni it / en (solo in it) | 2 / 2 (0) |
| Story/epic BMAD (aperte) | 10 (1) |

## Problemi noti e prossimi passi

| Priorita' | Problema | Dove si lavora |
|---|---|---|
| BLOCCANTE | `public_html/hot` attivo: gli asset `@vite` del tema puntano a 127.0.0.1:5173. | vedi elenco trasversale |
| AVVISO | La build (`Themes/Zero/public/manifest.json`) non e' pubblicata in `public_html` (nessuna cartella themes): verificare come vengono serviti gli asset del tema in produzione. |  |

Problemi trasversali (valgono per tutto il progetto): vedi `project-completion-status.md` in Xot.

## Story aperte (per stato)

| Stato | Story |
|---|---|
| ready | [Story — Zero theme: verifica dedup docs peer + frontmatter audit](docs/bmad/stories/theme-docs-dedup-frontmatter.story.md) |
