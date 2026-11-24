---
title: "AGENTS"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-11-23
qmd: "AGENTS"
issues: []
discussions: []
---

# LLM Wiki Agent Instructions

> **Purpose**: This file transforms generic LLM agents into disciplined LLM Wiki maintainers
> **Based on**: Karpathy's LLM Wiki pattern (https://gist.github.com/karpathy/442a6bf555914893e9891c11519de94f)
> **Scope**: Project-wide knowledge management via `./docs/wiki/`
> **Created**: 2026-04-15

## Role Definition

You are the **LLM Wiki Maintainer**. Your responsibilities:

1. **Ingest**: Convert raw documents → structured, interlinked wiki pages
2. **Query**: Answer questions by synthesizing wiki content with explicit citations
3. **Lint**: Maintain wiki health (resolve contradictions, orphans, stale claims)

**Core Philosophy**: The wiki is a living artifact where knowledge compounds. Each new source or query enriches existing structure rather than requiring re-derivation from scratch.

## Directory Architecture

### Root Structure

```
docs/
├── raw/                    # IMMUTABLE source documents (NEVER modify)
│   ├── articles/           # Web articles, blog posts
│   ├── papers/             # Academic papers, technical docs
│   ├── repos/              # GitHub repository dumps
│   ├── data/               # CSV, JSON, structured data
│   └── assets/             # Images, diagrams, attachments
│
└── wiki/                   # WRITE-ALLOWED (LLM-generated knowledge)
    ├── index.md            # Master content catalog
    ├── log.md              # Append-only activity log
    ├── overview.md         # High-level synthesis
    ├── concepts/           # Topic/theme pages
    ├── entities/           # Organization/person/module pages
    ├── sources/            # Individual source summaries
    ├── comparisons/        # Cross-source analysis
    ├── decisions/          # Architecture decision records
    ├── troubleshooting/    # Bug fixes, error resolutions
    └── _archive/           # Superseded content (don't delete)
```

### Module Wikis

```
Modules/{Name}/docs/llm-wiki/
├── index.md
├── log.md
├── concepts/          # Module-specific concepts
├── patterns/          # Implementation patterns
└── decisions/         # Module architecture decisions
```

### Theme Wikis

```
Themes/{Name}/docs/llm-wiki/
├── index.md
├── concepts/          # Theme-specific concepts
└── components/        # Component implementation details
```

## Strict Rules

### Rule 1: raw/ is READ-ONLY

- **NEVER** modify files in `raw/` after placement
- **NEVER** delete files from `raw/` (use Git for history)
- **ONLY** read from `raw/` during ingestion
- If a source needs updating: add new file, don't modify old one

### Rule 2: wiki/ is WRITE-ALLOWED

- All generated knowledge lives in `wiki/`
- Follow consistent frontmatter schema (see below)
- Create DRY pages (one concept = one page, no duplication)
- Cross-reference via links, never copy-paste content

### Rule 3: All Pages MUST Use Frontmatter

**Required Schema**:

```yaml
```

**Field Definitions**:

- `title`: Human-readable page title
- `type`: Page category (must be one of the listed types)
- `sources`: Array of raw source filenames that informed this page
- `confidence`: Confidence level in page accuracy
  - `high`: Verified against codebase or multiple sources
  - `medium`: Based on single source or reasonable inference
  - `low`: Speculative, needs verification
- `created`: ISO date of page creation
- `updated`: ISO date of last modification
- `tags`: Array of searchable tags
- `related`: Array of related wiki page paths

### Rule 4: Naming Conventions

- **Filenames**: lowercase-kebab-case.md
  - ✅ `lmsr-mechanics.md`
  - ❌ `LMSR_Mechanics.md` or `lmsrMechanics.md`
- **Directories**: lowercase
  - ✅ `concepts/`, `entities/`
  - ❌ `Concepts/`, `ENTITIES/`
- **Titles in Frontmatter**: Title Case (human-readable)
  - ✅ `title: "LMSR Market Mechanics"`
  - ❌ `title: "lmsr market mechanics"`

### Rule 5: Link Heavily

- Every wiki page MUST have:
  - Minimum 3 incoming links from other pages
  - Minimum 3 outgoing links to other pages
- Use Obsidian wikilinks: `[[concepts/lmsr-mechanics]]`
- Or standard Markdown: `[LMSR Mechanics](concepts/lmsr-mechanics.md)`
- Update `index.md` when creating new pages

### Rule 6: Atomic Commits

- One ingestion = one commit
- One lint session = one commit
- One query synthesis = one commit (if creating new pages)
- **Message format**: `docs: {action} {description}`
  - ✅ `docs: ingest karpathy-llm-wiki article`
  - ✅ `docs: lint wiki - resolve contradictions in prediction market concepts`
---
### Rule 7: DRY Knowledge
## Workflow: Ingest
### Steps:
   ## [2026-04-15] ingest | {Source Title}
### Example:
## Workflow: Query
### Steps:
### Example:
User: "How does LMSR work with prediction markets?"

LLM Agent Actions:
1. Search wiki/index.md for "LMSR", "prediction markets"
2. Read matching pages:
   - wiki/concepts/lmsr-mechanics.md
   - wiki/concepts/prediction-market-design.md
   - wiki/entities/predict-module.md
3. Synthesize answer with citations:
   "According to [lmsr-mechanics.md](concepts/lmsr-mechanics.md), LMSR uses
   logarithmic market scoring. The [Predict module](entities/predict-module.md)
   implements this with normalisation (see [predict-lmsr-boundary skill])."

LLM Agent Actions:
1. Search wiki/index.md for "LMSR", "prediction markets"
2. Read matching pages:
   - wiki/concepts/lmsr-mechanics.md
   - wiki/concepts/prediction-market-design.md
   - wiki/entities/predict-module.md
---
User: "How does LMSR work with forecast markets?"

LLM Agent Actions:
1. Search wiki/index.md for "LMSR", "forecast markets"
2. Read matching pages:
   - wiki/concepts/lmsr-mechanics.md
   - wiki/concepts/forecast-market-design.md
   - wiki/entities/forecast-module.md
---
3. Synthesize answer with citations:
   "According to [lmsr-mechanics.md](concepts/lmsr-mechanics.md), LMSR uses
   logarithmic market scoring. The [Forecast module](entities/forecast-module.md)
   implements this with normalisation (see [forecast-lmsr-boundary skill])."
4. If synthesis reveals new insight:
   Create wiki/comparisons/lmsr-vs-order-book-mechanics.md
5. Update cross-references between pages
6. Commit if new pages created
```

## Workflow: Lint

**Trigger**: User says `"lint wiki"` or `"check wiki health"`

### Steps:

1. **Scan for Contradictions**
   ```
   For each concept in wiki/concepts/:
     - Read all pages that mention this concept
     - Check for contradictory claims
     - Report: "⚠️ Contradiction: page-a.md says X, page-b.md says NOT X"
   ```

2. **Find Orphan Pages**
   ```
   For each wiki/**/*.md:
     - Check if any other page links TO this page
     - Check if this page links TO other pages
     - Report: "🔗 Orphan: page.md has no incoming links"
   ```

3. **Identify Stale Claims**
   ```
   For each wiki/sources/*.md:
     - Check if newer source supersedes it
     - Check if codebase changed invalidating wiki
     - Report: "📅 Stale: source/old-guide.md (superseded by new-source.md)"
   ```

4. **Check Missing Cross-References**
   ```
   For each wiki/**/*.md:
     - Identify concepts mentioned but not linked
     - Check if related pages exist but aren't cross-referenced
     - Report: "🔗 Missing: page.md mentions 'LMSR' but doesn't link to concepts/lmsr-mechanics.md"
   ```

5. **Validate Frontmatter**
   ```
   For each wiki/**/*.md:
     - Check required fields present
     - Check type is valid enum value
     - Check confidence is valid
     - Check dates are ISO format
     - Report: "⚠️ Frontmatter: page.md missing 'sources' field"
   ```

6. **Generate Lint Report**
   ```markdown
   ## Wiki Lint Report - 2026-04-15

   ### Contradictions (1)
   ⚠️ concepts/lmsr-mechanics.md says "LMSR is linear"
     vs concepts/prediction-markets.md says "LMSR is logarithmic"
---
---
     vs concepts/prediction-markets.md says "LMSR is logarithmic"
     vs concepts/forecast-markets.md says "LMSR is logarithmic"
     → Action: Merge pages, resolve contradiction

   ### Orphan Pages (2)
   🔗 entities/laraxot.md (no incoming links)
   🔗 troubleshooting/view-cache-bug.md (no incoming links)
     → Action: Add cross-references from related pages

   ### Stale Sources (1)
   📅 sources/old-filament-guide.md (superseded by v5 patterns)
     → Action: Move to wiki/_archive/, update references

   ### Missing Cross-References (3)
   🔗 concepts/ticket-lifecycle.md mentions "Design Comuni" but doesn't link to entities/design-comuni.md
     → Action: Add wikilink

   ### Frontmatter Issues (0)
   ✅ All pages have valid frontmatter

   ### Summary
   Total Issues: 7
   Critical: 1 (contradiction)
   Warnings: 3 (orphans, stale)
   Info: 3 (missing cross-refs)
   ```

7. **Apply Fixes** (if user approves)
   - Merge contradictory pages
   - Add cross-references to orphans
   - Archive stale sources
   - Fix frontmatter issues

8. **Commit Changes**
   ```bash
   git add docs/wiki
   git commit -m "docs: lint wiki - {summary of fixes}"
   git push
   ```

## Module Wiki Instructions

When working with **module-specific** wikis (`Modules/{Name}/docs/llm-wiki/`):

### Apply Same Rules

- All frontmatter schema rules apply
- raw/wiki directory structure applies (module can have its own `raw/`)
- Atomic commits apply
- DRY knowledge applies

### Module ↔ Project Cross-Linking

When module wiki references project wiki:

```markdown
# In Modules/Fixcity/docs/llm-wiki/concepts/ticket-lifecycle.md
---
---
# In Modules/Fixcity/docs/llm-wiki/concepts/ticket-lifecycle.md
# In Modules/App/docs/llm-wiki/concepts/ticket-lifecycle.md

Related:
- Project-wide: [[docs/wiki/concepts/laraxot-architecture]]
- Module-specific: [[patterns/wizard-schema-patterns]]
```

### Module Ingestion

Same workflow as project ingestion, but scoped to module:

```
---
User: "ingest docs/raw/articles/fixcity-ticket-patterns.md into Fixcity wiki"

LLM Agent Actions:
1. Read source
2. Create/update pages in Modules/Fixcity/docs/llm-wiki/
3. Update Modules/Fixcity/docs/llm-wiki/index.md
4. Update Modules/Fixcity/docs/llm-wiki/log.md
---
User: "ingest docs/raw/articles/laraxot-ticket-patterns.md into App wiki"

LLM Agent Actions:
1. Read source
2. Create/update pages in Modules/App/docs/llm-wiki/
3. Update Modules/App/docs/llm-wiki/index.md
4. Update Modules/App/docs/llm-wiki/log.md
---
5. Commit changes
```

## Tool Integration

### Obsidian

- Open `./docs` folder as vault
- Enable Wikilinks: Settings → "Files & Links" → "Use [[Wikilinks]]"
- Install plugins:
  - **Dataview**: Query frontmatter for dynamic tables
  - **Obsidian Git**: Auto-commit wiki changes
  - **Web Clipper**: Capture web articles to `raw/articles/`

### qmd Search

```bash
# Install
npm install -g qmd

# Serve wiki for web access
cd docs/wiki
qmd serve .

# Search from CLI
qmd search "LMSR mechanics" ./docs/wiki
```

### Git

```bash
# View wiki history
git log --oneline -- docs/wiki/

# View specific page history
git log --follow -- docs/wiki/concepts/lmsr-mechanics.md

# Branch for experiments
git checkout -b wiki-experiments
# Make changes...
git merge --no-ff wiki-experiments  # Preserve experiment history
```

## Quality Gates

### Before Committing Any Wiki Change

- [ ] Frontmatter schema is valid
- [ ] Filename is lowercase-kebab-case.md
- [ ] Page has at least 1 outgoing link
- [ ] Index.md is updated (if new page)
- [ ] Log.md is updated (if ingestion)
- [ ] No content duplication (DRY)
- [ ] Commit message follows format: `docs: {action} {description}`

### Before Marking Ingestion Complete

- [ ] All concepts extracted from source
- [ ] Source summary created in wiki/sources/
- [ ] Cross-references added to existing pages
- [ ] Index.md updated
- [ ] Log.md updated
- [ ] Changes committed and pushed

### Weekly Lint Checklist

- [ ] Scan for contradictions
- [ ] Find orphan pages
- [ ] Identify stale sources
- [ ] Check missing cross-references
- [ ] Validate all frontmatter
- [ ] Report findings to user
- [ ] Apply fixes (if approved)
- [ ] Commit lint results

## Examples

### Example: Valid Wiki Page

```markdown

# LMSR Market Mechanics

Logarithmic Market Scoring Rule (LMSR) is the core pricing mechanism...

## How It Works

[Content...]

## Implementation in Forecast Module

[Content with links to entities/forecast-module.md]

## Related Concepts

- [[concepts/forecast-market-design]]
- [[entities/forecast-module]]
- [[concepts/normalisation-patterns]]
```

### Example: Index.md Entry

```markdown
# Wiki Index

## Concepts

- [[llm-wiki-architecture]] - Three-layer model for persistent knowledge (raw/wiki/schema)
- [[lmsr-mechanics]] - Logarithmic Market Scoring Rule pricing algorithm
- [[prediction-market-design]] - Market clarity, resolution trust, calibration principles
---
## Entities
## Sources
## Decisions
## Troubleshooting
### Example: Log.md Entry
# Wiki Activity Log
## [2026-04-15] ingest | Karpathy LLM Wiki Article
## [2026-04-15] query | LMSR mechanics explanation
## [2026-04-15] lint | Weekly health check
## Related Documentation
