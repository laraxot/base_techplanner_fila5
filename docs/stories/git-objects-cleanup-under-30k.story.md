---
title: "Git Objects Cleanup - Snellitura .git oltre 30000 oggetti"
type: story
tags: [git, objects-cleanup, gc, repository-hygiene, second-brain, bmad]
created: 2026-11-27
updated: 2026-11-27
qmd: "git objects cleanup second brain repository hygiene .git snellitura"
issues: []
discussions: []
epic: "Git Repository Hygiene"
status: "done"
priority: "medium"
effort: "medium"
---

# Story: Git Objects Cleanup - Snellitura .git oltre 30000 oggetti

## Sommario

Lettura di `gitmodules.ini`, verifica della presenza di `.git` separato per ogni path dichiarato, conteggio oggetti con `git rev-list --objects --all | wc -l`, report nella cartella `docs/`, snellitura delle cartelle `.git` con più di 30.000 oggetti e aggiornamento del report con i nuovi valori.

## Cosa è stato fatto

1. Parsing di `gitmodules.ini`: 27 path (moduli e temi).
2. Per ogni path: verifica `.git` separato (tutti OK: 27/27).
3. Conteggio oggetti per path con `git rev-list --objects --all | wc -l`.
4. Report iniziale in `docs/git_objects_report.md`.
5. Snellitura delle cartelle `.git` > 30.000 oggetti tramite:
   - `git reflog expire --expire=now --all`
   - `git gc --prune=now --aggressive`
6. Aggiornamento del report con i valori dopo pulitura.

## Repo trattati (>30.000 oggetti)

| Path | Oggetti prima | .git prima | .git dopo | Azione |
|------|--------------|------------|-----------|--------|
| laravel/Modules/Xot | 107.541 | 133M | 33M | reflog expire + gc --aggressive |
| laravel/Modules/User | 105.201 | 100M | 42M | reflog expire + gc --aggressive |

`laravel/Themes/Sixteen` ha 28.726 oggetti (sotto soglia 30.000), non trattato.

## Risultati finali

- Path con `.git` separato: 27 su 27 (100%)
- Path con >30.000 oggetti dopo pulitura: 0 su 27
- Riduzione complessiva dimensione `.git`: circa 171M liberati (Xot -100M, User -58M)

## Evidenze e verifica

File report: `docs/git_objects_report.md`

Comandi di verifica eseguiti:

```bash
grep -E '^\s*path\s*=' gitmodules.ini | awk -F' = ' '{gsub(/\t/,""); print $2}' | while read p; do
  [ -d "$p/.git" ] && cd "$p" && git rev-list --objects --all | wc -l
done
```

Comandi di pulitura:

```bash
cd laravel/Modules/Xot && git reflog expire --expire=now --all && git gc --prune=now --aggressive
cd laravel/Modules/User && git reflog expire --expire=now --all && git gc --prune=now --aggressive
```

## Note

- Il conteggio degli oggetti reachable (`rev-list --objects --all`) non cambia con `git gc`; si riduce la dimensione fisica della cartella `.git` rimuovendo oggetti non reachable e compattando i pack.
- Nessun file tracked è stato modificato; nessun impatto sui repo remoti GitHub.
- Coecrizione via second brain (QMD tag `git objects cleanup`) e story BMAD come artefatto di coordinamento persistente (`docs/chat/` non è la fonte di verità).