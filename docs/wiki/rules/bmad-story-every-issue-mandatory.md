---
title: "BMAD Story Mandatory for Every Issue"
type: rule
confidence: high
created: 2026-05-29
updated: 2026-05-29
tags: [critical, bmad, story, workflow, process]
related:
  - ../bmad/INDEX.md
  - ../bmad/method-v6-overview.md
  - ../skills/bmad-on-demand-routing.md
---

# REGOLA CRITICA: BMAD Story Obbligatoria per Ogni Issue

## 🚨 ZERO TOLERANCE

**Ogni richiesta DEVE diventare: BMAD Story → BMAD Dev Story + GitHub Issue + GitHub Discussion.**

### Il Principio Completo

```
┌─────────────────────────────────────────────────────────┐
│  FLUSSO OBBLIGATORIO per OGNI richiesta                   │
│                                                          │
│  1. Utente dice: "Fai X"                                   │
│          ↓                                               │
│  2. CREA: GitHub Issue (gh issue create)                   │
│          ↓                                               │
│  3. CREA: GitHub Discussion (gh api graphql)             │
│          ↓                                               │
│  4. CREA: docs/stories/STORY-NNN-title.md                  │
│             ↓ (con link GitHub dentro)                     │
│  5. CREA: docs/stories/STORY-NNN-title.dev.md            │
│          ↓                                               │
│  6. Esegui con BMAD Dev Story workflow                   │
│          ↓                                               │
│  7. Completa e aggiorna GitHub Issue/Discussion          │
│          ↓                                               │
│  8. Chiudi story                                           │
└─────────────────────────────────────────────────────────┘
```

## Regola Fondamentale

> **"Se non c'è BMAD Story + GitHub Issue + GitHub Discussion, non c'è lavoro."**

> **"I link GitHub DEVONO essere dentro la BMAD Story."**

### ❌ Sbagliato

```
Utente: "Correggi il bug nella mappa"
AI: "Ok, correggo subito!"  ← ❌ SBAGLIATO!
   ↓
[Fa la modifica direttamente]
```

### ✅ Corretto

```
Utente: "Correggi il bug nella mappa"
AI: "Creo BMAD Story per tracciare questo lavoro"  ← ✅ CORRETTO!
   ↓
[Crea STORY-NNN-map-bug-correction.md]
   ↓
[Crea STORY-NNN-map-bug-correction.dev.md]
   ↓
[Esce con BMAD Dev Story workflow]
   ↓
[Implementa]
   ↓
[Chiude story]
```

## Il Workflow Obbligatorio

### Fase 1: BMAD Story (Requisito)

**File:** `docs/stories/STORY-NNN-{titolo}.md`

**Contenuto:**
```markdown
---
title: "[STORY-NNN] Titolo"
type: story
status: draft
priority: high
created: 2026-MM-DD
---

## User Request
{Copia testo utente}

## Analysis
{Analisi problema}

## Acceptance Criteria
- [ ] Criterio 1
- [ ] Criterio 2

## GitHub (tracciamento)
### Issues
- **REPO #N** — titolo: URL
### Discussions
- **REPO #N** — titolo: URL
```

### Fase 2: BMAD Dev Story (Pianificazione)

**File:** `docs/stories/STORY-NNN-{titolo}.dev.md`

**Contenuto:**
```markdown
# STORY-NNN Dev Story

## Technical Plan
{Piano tecnico}

## Files to Modify
1. `path/to/file.php`
2. `path/to/file.blade.php`

## Implementation Steps
1. [ ] Step 1
2. [ ] Step 2

## Testing
- [ ] Test case 1
- [ ] Test case 2

## Verification
```bash
{bash per verificare}
```
```

### Fase 2.5: GitHub Issue e Discussion (OBBLIGATORIO)

**Prima di creare la BMAD Story, creare GitHub Issue e Discussion:**

#### 1. Creare GitHub Issue

```bash
# Esempio: Creare issue per bug mappa
gh issue create \
  --repo laraxot/base_fixcity_fila5 \
  --title "[STORY-046] Bug: Wrong icon on map" \
  --body "## Problem
Icona cestino appare per marker sbagliato

## Expected
Icona corretta per ogni tipo ticket

## Story
STORY-046-fixcity-bug-map-icon.md" \
  --label "bug,story-046"
```

#### 2. Creare GitHub Discussion

```bash
# Esempio: Creare discussion per architettura
gh api graphql -f query='
mutation {
  createDiscussion(input: {
    repositoryId: "R_kgDOQ9ga-w",
    categoryId: "DIC_kwDOQ9ga-84C4TMy",
    title: "[STORY-046] Map icon architecture",
    body: "Discussion sul fix delle icone mappa\n\n## Story\nSTORY-046-fixcity-bug-map-icon.md"
  }) {
    discussion {
      id
      url
    }
  }
}'
```

#### 3. Ottenere i Link

Dopo la creazione, ottieni:
- **Issue URL**: `https://github.com/laraxot/REPO/issues/N`
- **Discussion URL**: `https://github.com/laraxot/REPO/discussions/N`

#### 4. Inserire i Link nella BMAD Story

```markdown
## GitHub (tracciamento)

### Issues
- **base_fixcity_fila5 #123** — Map icon bug: https://github.com/laraxot/base_fixcity_fila5/issues/123

### Discussions
- **base_fixcity_fila5 #45** — Map markers architecture: https://github.com/laraxot/base_fixcity_fila5/discussions/45
```

**Repo IDs:**
- `base_fixcity_fila5`: `R_kgDOQ9ga-w` (Issues), `DIC_kwDOQ9ga-84C4TMy` (Discussions Ideas)
- `module_geo_fila5`: `R_kgDOQ9bm1A`, `DIC_kwDOQ9bm1M4C-BZw`
- `module_cms_fila5`: `R_kgDOQ9bNdQ`, `DIC_kwDOQ9bNdc4C-BV5`

### Fase 3: Esecuzione

**Comandi:**
```bash
# 1. Attiva BMAD Dev Story
/bmad:dev

# 2. Implementa
# 3. Verifica
# 4. Chiudi story
```

## Checklist Pre-Lavoro (ORDINE OBBLIGATORIO)

Prima di iniziare QUALSIASI lavoro:

- [ ] **1. Creata GitHub Issue** (con `gh issue create`)
- [ ] **2. Creata GitHub Discussion** (con `gh api graphql`)
- [ ] **3. Ottenuti i link** (issue URL + discussion URL)
- [ ] **4. Creata BMAD Story** in `docs/stories/STORY-NNN-*.md` (con link GitHub)
- [ ] **5. Creata BMAD Dev Story** in `.dev.md`
- [ ] **6. Definiti Acceptance Criteria**
- [ ] **7. Identificati file da modificare**
- [ ] **8. SOLO DOPO:** inizia implementazione

**⚠️ ATTENZIONE:** Non saltare mai i passi 1-3! I link GitHub DEVONO esistere prima della BMAD Story.

## Pattern Nomenclatura

| Tipo | Pattern | Esempio |
|------|---------|---------|
| Bug | `STORY-NNN-{modulo}-bug-{desc}` | `STORY-042-fixcity-bug-map-icon` |
| Feature | `STORY-NNN-{modulo}-feat-{desc}` | `STORY-043-fixcity-feat-filter` |
| Refactor | `STORY-NNN-{modulo}-refactor-{desc}` | `STORY-044-theme-refactor-css` |
| Docs | `STORY-NNN-docs-{desc}` | `STORY-045-docs-wiki-update` |

## Comandi BMAD

```bash
# Attiva Dev Story
/bmad:dev

# Attiva Architect
/bmad:architect

# Attiva PM
/bmad:pm
```

## Perché Questa Regola

### 1. Tracciabilità
- Ogni lavoro ha uno story ID
- Collegamento GitHub issue/discussion
- Storico completo

### 2. Qualità
- Acceptance Criteria definiti prima
- Piano tecnico prima di codice
- Verifica obbligatoria

### 3. DRY
- Non ripetere lo stesso errore
- Pattern riutilizzabili
- Documentazione automatica

### 4. Visibility
- Team sa cosa si sta facendo
- Progresso tracciabile
- Blockers evidenti

## Esempi Pratici

### Esempio 1: Bug Fix

**Utente:** "C'è un bug nella mappa"

**AI Actions:**
```bash
# 1. Crea Story
cat > docs/stories/STORY-046-fixcity-map-bug-icon.md << 'EOF'
---
title: "[STORY-046] Bug: Wrong icon on map"
type: story
status: draft
priority: high
created: 2026-05-29
---

## User Request
C'è un bug nella mappa - icona sbagliata

## Analysis
L'icona cestino appare per marker sbagliato

## Acceptance Criteria
- [ ] Icona corretta per ogni tipo ticket
- [ ] Test visuale passato

## GitHub
### Issues
- **base_fixcity_fila5 #123** — Map icon bug: https://github.com/laraxot/base_fixcity_fila5/issues/123
### Discussions
- **base_fixcity_fila5 #45** — Map markers: https://github.com/laraxot/base_fixcity_fila5/discussions/45
EOF

# 2. Crea Dev Story
cat > docs/stories/STORY-046-fixcity-map-bug-icon.dev.md << 'EOF'
# Dev Story

## Technical Plan
Fix icon mapping in map-lit.js

## Files
- `Modules/Geo/resources/js/components/map-lit.js`

## Steps
1. [ ] Verify icon logic
2. [ ] Fix if wrong
3. [ ] Test

## Verification
```bash
# Check markers
curl /data/tickets.json | jq '.features[].properties.type.icon'
```
EOF

# 3. BMAD Dev
/bmad:dev
```

### Esempio 2: Refactor

**Utente:** "Rimuovi TicketList.php"

**AI Actions:**
```bash
# Story già creata: STORY-047-remove-ticketlist.md
# Dev story già creata: STORY-047-remove-ticketlist.dev.md

/bmad:dev  # Attiva workflow
```

## Script di Automazione

### Script Completo: Crea Issue + Discussion + Story

```bash
#!/bin/bash
# bashscripts/ai/create-bmad-story-with-github.sh
# Uso: bash create-bmad-story-with-github.sh "Titolo" "Descrizione" "tipo"

STORY_NUM=$(ls docs/stories/STORY-*.md 2>/dev/null | wc -l)
STORY_NUM=$((STORY_NUM + 1))
TITLE="$1"
DESC="$2"
TYPE="${3:-feature}"  # bug, feature, refactor, docs

REPO="laraxot/base_fixcity_fila5"
REPO_ID="R_kgDOQ9ga-w"
CATEGORY_ID="DIC_kwDOQ9ga-84C4TMy"

echo "🎯 Creando BMAD Story $STORY_NUM: $TITLE"

# 1. Crea GitHub Issue
echo "📋 1. Creando GitHub Issue..."
ISSUE_URL=$(gh issue create \
  --repo "$REPO" \
  --title "[STORY-$STORY_NUM] $TITLE" \
  --body "## Story
$DESC

## Type
$TYPE" \
  --label "story-$STORY_NUM,$TYPE")

ISSUE_NUM=$(echo "$ISSUE_URL" | grep -oE '[0-9]+$')

# 2. Crea GitHub Discussion
echo "💬 2. Creando GitHub Discussion..."
DISCUSSION_RESULT=$(gh api graphql -f query="
mutation {
  createDiscussion(input: {
    repositoryId: \"$REPO_ID\",
    categoryId: \"$CATEGORY_ID\",
    title: \"[STORY-$STORY_NUM] $TITLE\",
    body: \"Discussion per STORY-$STORY_NUM: $TITLE\\n\\n$DESC\"
  }) {
    discussion {
      id
      number
      url
    }
  }
}")

DISCUSSION_NUM=$(echo "$DISCUSSION_RESULT" | jq -r '.data.createDiscussion.discussion.number')
DISCUSSION_URL="https://github.com/$REPO/discussions/$DISCUSSION_NUM"

# 3. Crea BMAD Story
echo "📄 3. Creando BMAD Story..."
STORY_FILE="docs/stories/STORY-$(printf "%03d" $STORY_NUM)-${TYPE}-${TITLE// /-}.md"

cat > "$STORY_FILE" << EOF
---
title: "[STORY-$(printf "%03d" $STORY_NUM)] $TITLE"
type: story
status: draft
priority: high
created: $(date +%Y-%m-%d)
type: $TYPE
---

## User Request
$DESC

## Analysis
{Analisi del problema}

## Acceptance Criteria
- [ ] Criterio 1
- [ ] Criterio 2

## GitHub (tracciamento) ⭐ OBBLIGATORIO

### Issues
- **base_fixcity_fila5 #$ISSUE_NUM** — $TITLE: $ISSUE_URL

### Discussions
- **base_fixcity_fila5 #$DISCUSSION_NUM** — $TITLE: $DISCUSSION_URL

## Note
{Note aggiuntive}
EOF

# 4. Crea BMAD Dev Story
echo "🔧 4. Creando BMAD Dev Story..."
DEV_FILE="${STORY_FILE%.md}.dev.md"

cat > "$DEV_FILE" << EOF
# STORY-$(printf "%03d" $STORY_NUM) Dev Story

## Technical Plan
{Piano tecnico}

## Files to Modify
1. \`path/to/file.php\`
2. \`path/to/file.blade.php\`

## Implementation Steps
1. [ ] Step 1
2. [ ] Step 2

## Testing
- [ ] Test case 1
- [ ] Test case 2

## Verification
\`\`\`bash
{bash per verificare}
\`\`\`

## GitHub Links
- Issue: $ISSUE_URL
- Discussion: $DISCUSSION_URL
EOF

echo ""
echo "✅ BMAD Story $(printf "%03d" $STORY_NUM) creata!"
echo ""
echo "📄 Story:     $STORY_FILE"
echo "🔧 Dev:       $DEV_FILE"
echo "📋 Issue:     $ISSUE_URL"
echo "💬 Discussion: $DISCUSSION_URL"
echo ""
echo "Prossimi passi:"
echo "1. Leggi:    cat $STORY_FILE"
echo "2. Plan:     cat $DEV_FILE"
echo "3. Execute:  /bmad:dev"
```

### Uso Rapido

```bash
# Crea story completa con GitHub
bash bashscripts/ai/create-bmad-story-with-github.sh \
  "Bug: Wrong icon on map" \
  "Icona cestino appare per marker sbagliato" \
  "bug"
```

## Script di Verifica

```bash
# Verifica che ogni story abbia link GitHub
bash bashscripts/ai/check-bmad-story-github-links.sh
```

## Collegamenti

- BMAD Index: [../bmad/INDEX.md](../bmad/INDEX.md)
- Method v6: [../bmad/method-v6-overview.md](../bmad/method-v6-overview.md)
- Skills: [../skills/bmad-on-demand-routing.md](../skills/bmad-on-demand-routing.md)
- BMAD Story GitHub Rule: [bmad-story-github-links-mandatory](./bmad-story-github-links-mandatory.md)

---

**Mantra:**
> *"No Story, No Work. BMAD First, Code Second."*

**Data:** 2026-05-29  
**Severità:** CRITICA 🔴  
**Status:** ACTIVE - Ogni richiesta diventa BMAD Story
