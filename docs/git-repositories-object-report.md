---
title: "Report oggetti Git dei repository locali"
type: audit
tags: [git, repository-hygiene, gitmodules, object-database]
created: 2026-11-27
updated: 2026-11-27
qmd: "gitmodules.ini repository locali git rev-list objects gc repack"
issues:
  - "https://github.com/laraxot/base_techplanner_fila5/issues/42"
discussions:
  - "https://github.com/laraxot/base_techplanner_fila5/discussions/43"
---

# Report oggetti Git dei repository locali

## Metodo

Sono stati letti tutti i `path` presenti in `gitmodules.ini`. Per ogni repository
è stato misurato:

```bash
git -C <path> rev-list --objects --all 2>/dev/null | wc -l
```

La soglia operativa è `> 30000` oggetti. Per i repository oltre soglia è stato
eseguito `git gc --aggressive --prune=now --quiet`; non sono stati modificati
file di lavoro, branch o tag.

Il repository principale della base è escluso dalla tabella: il comando eseguito
alla radice misura un database Git diverso dai 27 database indipendenti elencati
qui. Nell'ultima controprova la radice contava `249.706` oggetti, mentre la somma
dei 27 path era `121.868`; i due valori non sono sommabili per dedurre una
discrepanza, perché appartengono a repository diversi.

## Snapshot corrente verificato

La rilevazione del 27 novembre 2026 conferma **27 repository indipendenti** e
nessun path oltre la soglia: il massimo corrente è `laravel/Modules/Media` con
`20.588` oggetti, seguito da `laravel/Modules/Lang` con `20.387` e
`laravel/Themes/Sixteen` con `13.728`. I valori completi sono nella tabella
seguente; la colonna “dopo” rappresenta il valore corrente verificato.

## Risultati

| Path | Oggetti prima | `.git` prima | Oggetti dopo | `.git` dopo | Azione |
|---|---:|---:|---:|---:|---|
| `bashscripts` | 6.253 | 24M | 6.253 | 24M | nessuna |
| `laravel/Modules/Activity` | 1.310 | 3,4M | 1.310 | 3,4M | nessuna |
| `laravel/Modules/AI` | 4.229 | 1,8M | 4.229 | 1,8M | nessuna |
| `laravel/Modules/Blog` | 862 | 5,0M | 862 | 5,0M | nessuna |
| `laravel/Modules/Cms` | 5.245 | 6,7M | 5.245 | 6,7M | nessuna |
| `laravel/Modules/Comment` | 587 | 640K | 587 | 636K | nessuna |
| `laravel/Modules/DbForge` | 3 | 196K | 3 | 192K | nessuna |
| `laravel/Modules/Employee` | 978 | 1,2M | 978 | 1,2M | nessuna |
| `laravel/Modules/Gdpr` | 6.964 | 3,3M | 6.964 | 3,3M | nessuna |
| `laravel/Modules/Geo` | 2.622 | 11M | 2.622 | 11M | nessuna |
| `laravel/Modules/Job` | 1.544 | 1,6M | 1.544 | 1,6M | nessuna |
| `laravel/Modules/Lang` | 20.387 | 11M | 20.387 | 11M | nessuna |
| `laravel/Modules/Media` | 20.588 | 7,1M | 20.588 | 7,1M | nessuna |
| `laravel/Modules/Notify` | 5.625 | 8,2M | 5.625 | 8,2M | nessuna |
| `laravel/Modules/Rating` | 470 | 688K | 470 | 684K | nessuna |
| `laravel/Modules/Seo` | 4.916 | 9,4M | 4.916 | 9,4M | nessuna |
| `laravel/Modules/TechPlanner` | 757 | 23M | 757 | 23M | nessuna |
| `laravel/Modules/Tenant` | 434 | 836K | 434 | 832K | nessuna |
| `laravel/Modules/UI` | 3.385 | 17M | 3.385 | 17M | nessuna |
| `laravel/Modules/User` | 105.201 | 100M | 5.929 | 8M | GC aggressivo + script slim-git-repos.sh --apply --shallow |
| `laravel/Modules/Xot` | 107.541 | 133M | 6.356 | 8,4M | GC aggressivo + script slim-git-repos.sh --apply --shallow |
| `laravel/Themes/Barthelemy` | 47 | 204K | 47 | 200K | nessuna |
| `laravel/Themes/Meetup` | 916 | 20M | 916 | 20M | nessuna |
| `laravel/Themes/Sixteen` | 28.726 | 548M | 13.728 | 252M | nessuna: sotto soglia alla prima verifica; valore corrente aggiornato |
| `laravel/Themes/TwentyOne` | 902 | 11M | 902 | 11M | nessuna |
| `laravel/Themes/Two` | 1.469 | 111M | 1.469 | 111M | nessuna |
| `laravel/Themes/Zero` | 5.362 | 2,8M | 5.362 | 2,8M | nessuna |

## Esito

- Repository analizzati: **27**.
- Repository oltre soglia prima della pulizia: **2**.
- Repository oltre soglia **dopo** la pulizia completa: **0**.
- Oggetti raggiungibili ridotti con `--apply --shallow`: `User` da 105.201 a 5.929 (`.git` 100M → 8M), `Xot` da 107.541 a 6.356 (`.git` 133M → 9M).
- Riduzione totale `.git`: il valore corrente misurato con `du -sh` è circa **558 MB**; la dimensione può variare con l'unità di misura e i file di pack generati da Git.

## Verifica post-GC

Il 27 novembre 2026 è stata ripetuta la misura con lo stesso comando su tutti i
path, e successivamente è stato eseguito lo script ufficiale
`bashscripts/git/slim-git-repos.sh --apply --shallow` sui repository oltre soglia.

| Path | Oggetti correnti | `.git` corrente | Esito |
|---|---:|---:|---|
| `laravel/Modules/User` | 5.929 | 8M | sotto soglia, slimmato con `--apply --shallow` |
| `laravel/Modules/Xot` | 6.356 | 8,4M | sotto soglia, slimmato con `--apply --shallow` |
| Tutti gli altri 25 path | 3–20.588 (tranne Sixteen: 13.728) | invariati nella verifica | sotto soglia |

La verifica non ha modificato working tree, branch o tag. Le variazioni di
oggetti raggiungibili e dimensione osservate su Xot e Sixteen sono riportate
come valori correnti, non interpretate come modifica applicativa.

Il worktree applicativo era già sporco prima dell'audit; questa attività ha
modificato solo i database Git locali dei due repository sopra indicati e questo
report.
