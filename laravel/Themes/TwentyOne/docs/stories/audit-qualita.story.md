---
title: "Audit qualita' — tema TwentyOne"
type: story
theme: TwentyOne
status: done
created: 2026-11-19
updated: 2026-11-19
issue: https://github.com/laraxot/base_techplanner_fila5/issues/64
tags: [bmad, audit, docs, qualita]
---

# Audit qualita' — tema TwentyOne

**Fase BMAD**: Dev + QA. **Issue**: [#64](https://github.com/laraxot/base_techplanner_fila5/issues/64).
Audit parallelo dei temi (nomi `.md` senza date, indice unico della docs, file morti, PHPStan, test).

## Risultati

- Nomi `.md` datati: `redundancy-audit-2026-05-21.md` e `copilot-redundancy-audit-2026-05-25.md` erano copie superate dei file
  senza data: rimossi.
- Duplicati esatti: 30 coppie, quasi tutte stesso contenuto in `UPPER_SNAKE` e `kebab-case`. Tenuta la versione kebab-case,
  rimosse quelle maiuscole/snake (es. `ROADMAP_2025.md`, `GSD_WORKFLOW.md`, `kalshi-analysis/ANALISI.md`), `wiki/readme.md`
  (= `wiki/README.md`) e `PROJECT-STRUCTURE.md`; link aggiornati nel tema.

## Codice e test

- PHPStan: 76 errori, concentrati in `app/Actions/Hero/ResolveCinematicHeroDataAction.php` e
  `app/Actions/Markets/ResolveFeaturedMarketsGridDataAction.php` (variabile `$this__` indefinita, classe
  `Modules\Predict\...` assente in questo progetto). Non corretti: il tema dipende dal modulo Predict che qui non c'e'.
- Pest `tests/Unit`: 2 test, 2 passati.

## Aperto

- Correggere `ResolveFeaturedMarketsGridDataAction` (`$this__` e' un bug reale) nel progetto che usa Predict.
