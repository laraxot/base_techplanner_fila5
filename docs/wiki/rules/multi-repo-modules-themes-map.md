---
title: "Multi-repo map — Modules e Themes"
type: rule
confidence: high
created: 2026-06-01
tags: [git, multi-repo, modules, themes, github, agent-conduct]
related:
  - rules/bmad-story-multi-repo-github.md
  - rules/agent-conduct-rules.md
---

# Multi-repo map — Modules e Themes

## Regola

> Per trovare la repo GitHub di un modulo o tema, fare **`git remote -v`** dentro la sua cartella:
> ```bash
> cd laravel/Modules/<Nome> && git remote -v
> cd laravel/Themes/<Nome> && git remote -v
> ```
> **MAI** assumere il remote — verificare sempre con `git remote -v`.

## Mappa attuale (2026-06-01)

### Temi (`laravel/Themes/`)

| Cartella | Repo GitHub |
|----------|-------------|
| `Sixteen` | `laraxot/theme_sixteen_fila5` |
| `TwentyOne` | `laraxot/theme_twentyone_fila5` |
| `Barthelemy` | `laraxot/base_fixcity_fila5` (subtree) |
| `Meetup` | `laraxot/base_fixcity_fila5` (subtree) |
| `docs` | `laraxot/base_fixcity_fila5` (subtree) |

### Moduli (`laravel/Modules/`)

| Cartella | Repo GitHub |
|----------|-------------|
| `AI` | `laraxot/module_ai_fila5` |
| `Activity` | `laraxot/module_activity_fila5` |
| `Blog` | `laraxot/module_blog_fila5` |
| `Cms` | `laraxot/module_cms_fila5` |
| `Comment` | `laraxot/module_comment_fila5` |
| `Fixcity` | `laraxot/module_fixcity_fila5` |
| `Gdpr` | `laraxot/module_gdpr_fila5` |
| `Geo` | `laraxot/module_geo_fila5` |
| `Job` | `laraxot/module_job_fila5` |
| `Lang` | `laraxot/module_lang_fila5` |
| `Media` | `laraxot/module_media_fila5` |
| `Notify` | `laraxot/module_notify_fila5` |
| `Rating` | `laraxot/module_rating_fila5` |
| `Seo` | `laraxot/module_seo_fila5` |
| `Sixteen` | `laraxot/base_fixcity_fila5` (subtree) |
| `Tenant` | `laraxot/module_tenant_fila5` |
| `UI` | `laraxot/module_ui_fila5` |
| `User` | `laraxot/module_user_fila5` |
| `Xot` | `laraxot/module_xot_fila5` |
| `docs` | `laraxot/base_fixcity_fila5` (subtree) |

## Workflow per ogni story BMAD

Per ogni story che tocca moduli/temi:
1. Identificare quali `laravel/Modules/*` e `laravel/Themes/*` sono toccati
2. `cd laravel/Modules/<Nome> && git remote -v` per ogni modulo/tema
3. Aprire issue + discussion (se disponibile) su **ogni repo con remote proprio**
4. Inserire tutti i link nella tabella `## GitHub (tracciamento)` della story
