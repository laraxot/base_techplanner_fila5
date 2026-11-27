---
title: "Facts — fatti verificabili dell'harness"
type: memory
created: 2026-11-27
updated: 2026-11-27
related:
  - ./lessons.md
  - ./laravelday-workshop-comparison.md
  - ../../laravel/Modules/Xot/docs/concepts/agent-harness-guide.md
---

# Facts

Fatti verificabili sul progetto: ogni voce ha il comando che la riverifica.
Se il comando non torna più vero, la riga si aggiorna o si toglie.

| Fatto | Verifica |
|---|---|
| Il guard PreToolUse è `.harness/bin/guard`, PHP puro senza bootstrap Laravel, registrato in `.claude/settings.json` | `echo '{"tool_name":"Bash","tool_input":{"command":"git status"}}' \| php .harness/bin/guard` → exit 0 |
| I sensori docs/contratti/guard girano con `composer harness:check` da `laravel/` | `cd laravel && composer harness:check` |
| Ogni modulo/tema ha `docs/adr/` e `docs/contracts/` con README | `ls laravel/Modules/*/docs/adr/README.md laravel/Themes/*/docs/adr/README.md` |
| Le decisioni architetturali dei pacchetti stanno in `docs/adr/NNNN-*.md` | test `AdrFilenamesAreNumberedTest` |
| Il confronto col workshop upstream è in `laravelday-workshop-comparison.md` | questo file |
| I path di `gitmodules.ini` sono repo git separati, non submodule | `git -C laravel/Modules/Xot rev-parse --show-toplevel` |
