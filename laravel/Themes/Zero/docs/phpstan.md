---
title: "PHPStan — Theme Zero"
type: guide
tags: [laravel, phpstan, theme-zero]
created: 2026-07-14
updated: 2026-08-24
qmd: "phpstan theme zero solo laravel/phpstan.neon modules gate no --level"
related:
  - "./phpstan-level10-analysis.md"
  - "../../../../Modules/Xot/docs/stories/5.7.phpstan-modules-green.story.md"
---

# PHPStan — Theme Zero

## Perché

Il tema serve il FO (login, layout). PHPStan **non** è il Job dell'utente: è il gate degli agenti. `laravel/phpstan.neon` ha `paths: Modules/` — analizzare **solo** il tema produce ignore unmatched e rumore. Il gate verde è:

```bash
cd laravel
./vendor/bin/phpstan analyse Modules --memory-limit=-1 --no-progress
```

**Solo** `laravel/phpstan.neon`, con il suo `level: max`. Agenti: niente neon temp,
niente `--level`, baseline, esclusioni o `@phpstan-ignore`. I test fanno parte del gate.

## Vietato

- `phpstan*.neon` / `phpstan*.json` nel tema (tranne output temporanei gitignored)
- `analyse Themes` da solo

## Permesso

- Fixare **codice** del tema se un consumer in `Modules/` lo analizza
- PHP del tema: risalire al tipo al boundary; `mixed` non è una scorciatoia — [Xot phpstan-rules](../../../../Modules/Xot/docs/quality/phpstan-rules.md)
- Dettaglio storico: [phpstan-level10-analysis.md](./phpstan-level10-analysis.md)

## Stato e prove

Le vecchie note “Level 10” e “0 errori” sono storiche. Lo stato corrente esiste solo
come output datato del comando canonico e come evidenza nella story proprietaria; un
conteggio ottenuto con `analyse Themes` o `--level=<n>` non aggiorna questo gate.
