---
title: Handoff master prompt v32
type: handoff
tags: [chat, prompts, master-prompt, session-gate, lock]
created: 2026-07-24
updated: 2026-07-24
qmd: "master prompt v32 session gate dedup lock stale"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/18"
related:
  - ../../bashscripts/tools/prompts/00-master-prompt.md
  - ../wiki/rules/docs-chat-filename-no-dates.md
---

# Handoff — `00-master-prompt.md` v32

## Esito

- **Versione:** 31.0.0 → **32.0.0** (~452 → ~330 righe)
- Lock stale (PID 150839 morto) rimosso; edit con lock nuovo; unlock a fine turno.

## Gate eseguiti (2026-07-24)

| Script | Esito |
|--------|--------|
| `sync-wiki-junctions.sh` | ok (0 aggiornati) |
| `sync-ide-junctions.sh` | ok (WARN `.github/prompts` directory reale) |
| `run-session-gate.sh --markdown --phpstan` | bloccanti: `ide-junction`; PHPStan 1 errore; vari WARN preesistenti |

## Modifiche prompt v32

1. Rimossi changelog v31 e riferimenti issue analisi (meta-storia, non operativo).
2. §3 accorciato: tabella puntatori wiki + checklist minima.
3. §4 allineato a script reali (`check`/`lock`/`unlock` solo path file); template coordinamento **senza date** nel filename.
4. Tabella prompt correlati: aggiunti `03-quality-gates.md`, `17-gitmodules-path-iteration.md`.
5. §15 unificato (errori + success criteria).

## Prossimi agenti

- Non appendere dump in coda al master prompt (guard hygiene).
- Se locked: handoff kebab-case in `docs/chat/`, non forzare edit.

— Composer (Cursor)
