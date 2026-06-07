---
title: "BMAD Story Multi-Repo GitHub Integration"
type: rule
confidence: high
created: 2026-05-29
updated: 2026-05-29
tags: [critical, bmad, story, github, multi-repo, modules, themes]
related:
  - bmad-story-every-issue-mandatory.md
  - ../bmad/INDEX.md
  - ../skills/bmad-on-demand-routing.md
---

# REGOLA CRITICA: BMAD Story su TUTTI i Repo (Base + Moduli + Temi)

## 🚨 ZERO TOLERANCE

**Ogni richiesta DEVE creare GitHub Issue/Discussion nel repo corretto: base, modulo, O tema, in base al file modificato.**

## Il Principio Multi-Repo

```
┌─────────────────────────────────────────────────────────┐
│           LAVORO su FILE in ...                           │
│                                                          │
│  laravel/Modules/Geo/       →  module_geo_fila5          │
│  laravel/Modules/Fixcity/   →  module_fixcity_fila5      │
│  laravel/Modules/Cms/       →  module_cms_fila5          │
│  laravel/Themes/Sixteen/    →  theme_sixteen_fila5       │
│  laravel/Themes/TwentyOne/  →  theme_twentyone_fila5     │
│  (tutto il resto)           →  base_fixcity_fila5        │
│                                                          │
└─────────────────────────────────────────────────────────┘
```

## Workflow Multi-Repo

```
Utente: "Fai X sul file Y"
    ↓
1. IDENTIFICA: Quale repo? (git remote -v)
    ↓
2. CREA: GitHub Issue nel repo corretto
    ↓
3. CREA: GitHub Discussion nel repo corretto
    ↓
4. CREA: BMAD Story con link al repo corretto
    ↓
5. CREA: BMAD Dev Story
    ↓
6. Esegui /bmad:dev
```

## Mapping File → Repo

| Path File | Repository GitHub | Repo ID | Discussion ID |
|-----------|-------------------|---------|---------------|
| `laravel/Modules/Geo/**` | `laraxot/module_geo_fila5` | `R_kgDOQ9bm1A` | `DIC_kwDOQ9bm1M4C-BZw` |
| `laravel/Modules/Cms/**` | `laraxot/module_cms_fila5` | `R_kgDOQ9bNdQ` | `DIC_kwDOQ9bNdc4C-BV5` |
| `laravel/Modules/Fixcity/**` | `laraxot/module_fixcity_fila5` | TODO | TODO |
| `laravel/Themes/Sixteen/**` | `laraxot/theme_sixteen_fila5` | TODO | TODO |
| `laravel/Themes/TwentyOne/**` | `laraxot/theme_twentyone_fila5` | TODO | TODO |
| *(tutto il resto)* | `laraxot/base_fixcity_fila5` | `R_kgDOQ9ga-w` | `DIC_kwDOQ9ga-84C4TMy` |

## Come Determinare il Repo

### Metodo 1: git remote -v (Consigliato)

```bash
# Dalla cartella del file, esegui:
cd laravel/Modules/Geo
git remote -v
# Output: origin  git@github.com:laraxot/module_geo_fila5.git

cd laravel/Themes/Sixteen
git remote -v
# Output: origin  git@github.com:laraxot/theme_sixteen_fila5.git
```

### Metodo 2: Percorso File

```bash
# Script automatico
FILE_PATH="$1"  # es: laravel/Modules/Geo/app/Models/GeoPoint.php

if [[ "$FILE_PATH" == *"Modules/Geo/"* ]]; then
    REPO="module_geo_fila5"
    REPO_ID="R_kgDOQ9bm1A"
    CAT_ID="DIC_kwDOQ9bm1M4C-BZw"
elif [[ "$FILE_PATH" == *"Modules/Cms/"* ]]; then
    REPO="module_cms_fila5"
    REPO_ID="R_kgDOQ9bNdQ"
    CAT_ID="DIC_kwDOQ9bNdc4C-BV5"
elif [[ "$FILE_PATH" == *"Themes/Sixteen/"* ]]; then
    REPO="theme_sixteen_fila5"
    REPO_ID="TODO"
    CAT_ID="TODO"
else
    REPO="base_fixcity_fila5"
    REPO_ID="R_kgDOQ9ga-w"
    CAT_ID="DIC_kwDOQ9ga-84C4TMy"
fi
```

## Esempi Pratici

### Esempio 1: Lavoro su Modulo Geo

**File modificato:** `laravel/Modules/Geo/app/Actions/MapAction.php`

**AI Actions:**
```bash
# 1. Identifica repo
cd laravel/Modules/Geo && git remote -v
# → origin git@github.com:laraxot/module_geo_fila5.git

# 2. Crea Issue nel repo modulo
gh issue create \
  --repo laraxot/module_geo_fila5 \
  --title "[STORY-050] Refactor MapAction" \
  --body "Refactoring della logica mappa"

# 3. Crea Discussion nel repo modulo
gh api graphql -f query='...'  # con repo_id module_geo

# 4. Crea BMAD Story con link al repo modulo
cat > docs/stories/STORY-050-geo-refactor-mapaction.md << 'EOF'
...
## GitHub (tracciamento)
### Issues
- **module_geo_fila5 #15** — Refactor MapAction: https://github.com/laraxot/module_geo_fila5/issues/15
### Discussions
- **module_geo_fila5 #8** — Map architecture: https://github.com/laraxot/module_geo_fila5/discussions/8
EOF
```

### Esempio 2: Lavoro su Tema Sixteen

**File modificato:** `laravel/Themes/Sixteen/resources/views/components/header.blade.php`

**AI Actions:**
```bash
# 1. Identifica repo
cd laravel/Themes/Sixteen && git remote -v
# → origin git@github.com:laraxot/theme_sixteen_fila5.git

# 2. Crea Issue nel repo tema
gh issue create \
  --repo laraxot/theme_sixteen_fila5 \
  --title "[STORY-051] Fix header component" \
  --body "Correzione componente header"

# 3. Crea Discussion nel repo tema
gh api graphql -f query='...'  # con repo_id theme_sixteen

# 4. Crea BMAD Story con link al repo tema
cat > docs/stories/STORY-051-theme-fix-header.md << 'EOF'
...
## GitHub (tracciamento)
### Issues
- **theme_sixteen_fila5 #23** — Fix header: https://github.com/laraxot/theme_sixteen_fila5/issues/23
### Discussions
- **theme_sixteen_fila5 #12** — Header patterns: https://github.com/laraxot/theme_sixteen_fila5/discussions/12
EOF
```

### Esempio 3: Lavoro su Repo Base

**File modificato:** `docs/wiki/rules/new-rule.md`

**AI Actions:**
```bash
# 1. Identifica repo (root)
# → base_fixcity_fila5 (default)

# 2. Crea Issue nel repo base
gh issue create \
  --repo laraxot/base_fixcity_fila5 \
  --title "[STORY-052] Add new rule" \
  --body "Nuova regola wiki"

# 3. Crea Discussion nel repo base
gh api graphql -f query='...'  # con repo_id base

# 4. Crea BMAD Story con link al repo base
cat > docs/stories/STORY-052-docs-new-rule.md << 'EOF'
...
## GitHub (tracciamento)
### Issues
- **base_fixcity_fila5 #200** — Add new rule: https://github.com/laraxot/base_fixcity_fila5/issues/200
### Discussions
- **base_fixcity_fila5 #50** — Rules architecture: https://github.com/laraxot/base_fixcity_fila5/discussions/50
EOF
```

## Script Automazione Multi-Repo

```bash
#!/bin/bash
# bashscripts/ai/create-bmad-story-multi-repo.sh
# Uso: bash create-bmad-story-multi-repo.sh "Titolo" "Descrizione" "tipo" "file_path"

TITLE="$1"
DESC="$2"
TYPE="${3:-feature}"
FILE_PATH="${4:-.}"

# Determina repo dal percorso
if [[ "$FILE_PATH" == *"Modules/Geo/"* ]]; then
    REPO="module_geo_fila5"
    REPO_ID="R_kgDOQ9bm1A"
    CAT_ID="DIC_kwDOQ9bm1M4C-BZw"
elif [[ "$FILE_PATH" == *"Modules/Cms/"* ]]; then
    REPO="module_cms_fila5"
    REPO_ID="R_kgDOQ9bNdQ"
    CAT_ID="DIC_kwDOQ9bNdc4C-BV5"
elif [[ "$FILE_PATH" == *"Modules/Fixcity/"* ]]; then
    REPO="module_fixcity_fila5"
    REPO_ID="TODO"
    CAT_ID="TODO"
elif [[ "$FILE_PATH" == *"Themes/Sixteen/"* ]]; then
    REPO="theme_sixteen_fila5"
    REPO_ID="TODO"
    CAT_ID="TODO"
elif [[ "$FILE_PATH" == *"Themes/TwentyOne/"* ]]; then
    REPO="theme_twentyone_fila5"
    REPO_ID="TODO"
    CAT_ID="TODO"
else
    REPO="base_fixcity_fila5"
    REPO_ID="R_kgDOQ9ga-w"
    CAT_ID="DIC_kwDOQ9ga-84C4TMy"
fi

echo "🎯 Repo identificato: $REPO"
echo "📁 Dal file: $FILE_PATH"

# Crea Issue
gh issue create --repo "laraxot/$REPO" --title "[STORY-NNN] $TITLE" ...

# Crea Discussion
gh api graphql -f query="..."  # con REPO_ID e CAT_ID

# ... resto dello script
```

## Checklist Multi-Repo

Prima di creare BMAD Story:

- [ ] Identificato il repo corretto (`git remote -v`)
- [ ] Verificato che il repo esista su GitHub
- [ ] Creato GitHub Issue nel **repo corretto** (base/modulo/tema)
- [ ] Creato GitHub Discussion nel **repo corretto**
- [ ] Inseriti links corretti nella BMAD Story
- [ ] Usato il namespace corretto nei link:
  - `base_fixcity_fila5 #N` per repo base
  - `module_X_fila5 #N` per moduli
  - `theme_X_fila5 #N` per temi

## Regole Specifiche per Moduli/Temi

### Moduli (laravel/Modules/*/)

- **Issue:** Crea in `laraxot/module_{name}_fila5`
- **Discussion:** Usa categoria appropriata (Ideas/Bugs)
- **Story:** Documenta nel repo base (docs/stories/) ma linka al repo modulo

### Temi (laravel/Themes/*/)

- **Issue:** Crea in `laraxot/theme_{name}_fila5`
- **Discussion:** Usa categoria appropriata
- **Story:** Documenta nel repo base ma linka al repo tema

### Repo Base (tutto il resto)

- **Issue:** Crea in `laraxot/base_fixcity_fila5`
- **Discussion:** Usa categoria "Ideas"
- **Story:** Standard

## Collegamenti

- Regola principale: [bmad-story-every-issue-mandatory](./bmad-story-every-issue-mandatory.md)
- Script automation: [create-bmad-story-with-github](../../bashscripts/ai/create-bmad-story-with-github.sh)
- BMAD Index: [../bmad/INDEX.md](../bmad/INDEX.md)

---

**Mantra:**
> *"Il giusto repo per il giusto file. Multi-repo = multi-tracking."*

**Data:** 2026-05-29  
**Severità:** CRITICA 🔴  
**Status:** ACTIVE
