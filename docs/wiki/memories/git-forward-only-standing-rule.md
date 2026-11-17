---
title: "Git forward-only — regola standing utente"
type: memory
tags: [git, forward-only, agent, standing-rule]
created: 2026-06-07
updated: 2026-06-07
qmd: "git forward only never restore checkout old commit study history patch manual"
related:
  - ../rules/git-forward-only.md
  - ../concepts/agent-bootstrap-compact.md
---

# Git forward-only — promemoria standing

**Richiesta esplicita utente (standing, rinforzata 2026-06-07):**

> *«Con git andiamo solo in avanti: non ripristiniamo mai una vecchia versione. Puoi e devi studiare le vecchie versioni, ma non puoi ripristinarle.»*

## Consentito

- `git log`, `git show`, `git blame`, `git diff` — studio read-only della history
- Ricostruire il contratto corretto **copiando a mano** nel file attuale ciò che serve da una versione storica
- Risolvere marker `<<<<<<<` nel working tree corrente (merge manuale, non checkout)

## Vietato (agenti)

- `git checkout <commit> -- <path>` · `git checkout <branch> -- <path>`
- `git restore` · `git restore --source=<commit> <path>`
- `git show <ref>:path > path` (sovrascrittura con snapshot storico)
- `git reset --hard` · `git revert` come remediation predefinita
- Batch «sync da dev/master» che sostituiscono file interi senza patch consapevole
- Qualsiasi «torniamo al commit/branch X» come fix di conflitti, PHPStan o parse error **senza ordine esplicito dell’utente nel messaggio odierno**

## Anti-pattern reale (da non ripetere)

Sessione PHPStan: usare `git checkout dev -- laravel/Modules` o `git show dev:file > file` per «pulire» conflitti — **viola forward-only**. Corretto: `git show` per leggere, poi edit manuale sullo stato attuale.

## Workflow conflitti / parse error

1. Leggere file corrotto + `git show` della versione di riferimento
2. Risolvere marker o sintassi **nel working tree attuale**
3. PHPStan / `php -l` / test

Canon completo: [git-forward-only.md](../rules/git-forward-only.md)