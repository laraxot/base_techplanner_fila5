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

## Risultati

| Path | Oggetti prima | `.git` prima | Oggetti dopo | `.git` dopo | Azione |
|---|---:|---:|---:|---:|---|
| `bashscripts` | 6.253 | 24M | 6.253 | 24M | nessuna |
| `laravel/Modules/Activity` | 1.310 | 3,4M | 1.310 | 3,4M | nessuna |
| `laravel/Modules/AI` | 4.229 | 1,8M | 4.229 | 1,8M | nessuna |
| `laravel/Modules/Blog` | 862 | 5,0M | 862 | 5,0M | nessuna |
| `laravel/Modules/Cms` | 5.245 | 6,7M | 5.245 | 6,7M | nessuna |
| `laravel/Modules/Comment` | 587 | 640K | 587 | 640K | nessuna |
| `laravel/Modules/DbForge` | 3 | 196K | 3 | 196K | nessuna |
| `laravel/Modules/Employee` | 978 | 1,2M | 978 | 1,2M | nessuna |
| `laravel/Modules/Gdpr` | 6.964 | 3,3M | 6.964 | 3,3M | nessuna |
| `laravel/Modules/Geo` | 2.622 | 11M | 2.622 | 11M | nessuna |
| `laravel/Modules/Job` | 1.544 | 1,6M | 1.544 | 1,6M | nessuna |
| `laravel/Modules/Lang` | 20.387 | 11M | 20.387 | 11M | nessuna |
| `laravel/Modules/Media` | 20.588 | 7,1M | 20.588 | 7,1M | nessuna |
| `laravel/Modules/Notify` | 5.625 | 8,2M | 5.625 | 8,2M | nessuna |
| `laravel/Modules/Rating` | 470 | 688K | 470 | 688K | nessuna |
| `laravel/Modules/Seo` | 4.916 | 9,4M | 4.916 | 9,4M | nessuna |
| `laravel/Modules/TechPlanner` | 757 | 23M | 757 | 23M | nessuna |
| `laravel/Modules/Tenant` | 434 | 836K | 434 | 836K | nessuna |
| `laravel/Modules/UI` | 3.385 | 17M | 3.385 | 17M | nessuna |
| `laravel/Modules/User` | 105.201 | 100M | 105.201 | 42M | GC aggressivo |
| `laravel/Modules/Xot` | 107.541 | 133M | 107.541 | 33M | GC aggressivo |
| `laravel/Themes/Barthelemy` | 47 | 204K | 47 | 204K | nessuna |
| `laravel/Themes/Meetup` | 916 | 20M | 916 | 20M | nessuna |
| `laravel/Themes/Sixteen` | 28.726 | 548M | 28.726 | 548M | nessuna: sotto soglia |
| `laravel/Themes/TwentyOne` | 902 | 11M | 902 | 11M | nessuna |
| `laravel/Themes/Two` | 1.469 | 111M | 1.469 | 111M | nessuna |
| `laravel/Themes/Zero` | 5.362 | 2,8M | 5.362 | 2,8M | nessuna |

## Esito

- Repository analizzati: **27**.
- Repository oltre soglia prima della pulizia: **2**.
- Oggetti raggiungibili rimasti invariati: il GC ha compattato il database senza
  rimuovere commit, branch o tag raggiungibili.
- Riduzione dello spazio `.git`: `User` da **100M a 42M**, `Xot` da **133M a
  33M**.

Il worktree applicativo era già sporco prima dell'audit; questa attività ha
modificato solo i database Git locali dei due repository sopra indicati e questo
report.
