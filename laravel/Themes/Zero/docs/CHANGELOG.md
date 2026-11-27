---
title: "Changelog documentazione — Theme Zero"
type: changelog
theme: Zero
updated: 2026-11-25
qmd: "zero changelog documentazione sintesi argomenti"
merged_from:
  - bmad/changelog.md
  - _archive/changelog.md
---

# Changelog documentazione — Theme Zero

Il changelog di release (semantic-release) e' `../CHANGELOG.md`.

## 2026-11-25

- Sintesi per argomento: 299 documenti non-story → pagine per argomento
  (story [docs-topic-synthesis](./bmad/stories/docs-topic-synthesis.story.md)).
- Eliminati: `_archive/`, screenshot e analisi di un altro progetto (F1), guide Chart.js /
  JpGraph / LimeSurvey / SimpleChartWidget (codice non presente), PRD/roadmap generici,
  indici e inventari generati, credenziali MySQL in chiaro.
- `00-INDEX.md` unico (prima conviveva con `00-index.md` e citava temi di un altro progetto).

## 2026-10 / 2026-11

- Nomi kebab-case, frontmatter con `qmd`, collisioni di maiuscole risolte (story `docs-zen-conventions`,
  `theme-docs-dedup-frontmatter`).
- ADR: tema come vestito, asset per symlink, login con widget del modulo User.
