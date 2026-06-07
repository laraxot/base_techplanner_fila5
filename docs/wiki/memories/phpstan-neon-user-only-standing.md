---
title: "phpstan.neon — solo utente modifica"
type: memory
tags: [phpstan, standing-rule, agent, neon]
created: 2026-06-07
updated: 2026-06-07
qmd: "phpstan neon immutable agent user only modify configuration IO"
related:
  - ../rules/phpstan-no-level-parameter.md
  - ../rules/phpstan-config.md
  - phpstan-modules-zero-2026-06-06.md
---

# phpstan.neon — standing rule utente (IO only)

**Richiesta esplicita (2026-06-07):** *«ricordati: devi usare phpstan.neon e solo IO posso modificarlo! te NO!»*

| Chi | Cosa |
|-----|------|
| **Utente (IO)** | Unico owner di `laravel/phpstan.neon` — ignore, excludePaths, level, baseline, `reportUnmatchedIgnoredErrors` |
| **Agenti** | **VIETATO** qualsiasi edit su `phpstan.neon` (inclusi comment/uncomment di righe in `ignoreErrors`) |

## Agenti — permesso / vietato

**Permesso**

- Leggere `phpstan.neon` per capire path, level, ignore globali
- Eseguire: `cd laravel && ./vendor/bin/phpstan analyse --memory-limit=-1`
- Correggere errori nel **codice** (`Modules/`, bootstrap PHP se il messaggio lo richiede)

**Vietato**

- `StrReplace` / `Write` / patch su `laravel/phpstan.neon`
- Aggiungere `@phpstan-ignore` al posto di fix codice quando il fix è possibile nel sorgente
- Chiedere all'agente di «aggiustare il neon» — segnalare all'utente e attendere

## Se exit 1 senza errori su file

Spesso **ignore obsoleto** non più matchato (es. `#Static call to instance method Nwidart#`). **Solo l'utente** rimuove la riga in `ignoreErrors` oppure imposta `reportUnmatchedIgnoredErrors: false`.

## Canon

[phpstan-no-level-parameter.md](../rules/phpstan-no-level-parameter.md)
