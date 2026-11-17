---
title: "Claude Code .claude/ Structure and Deduplication Rule"
type: concept
confidence: high
created: 2026-04-30
updated: 2026-05-15
tags: [claude, claude-code, skills, deduplication, ai-efficiency, bashscripts]
related:
  - concepts/context-compression-discipline.md
  - concepts/context-overflow-compression-rule.md
sources:
  - https://code.claude.com/docs/en/claude-directory
  - https://code.claude.com/docs/en/skills
  - https://code.claude.com/docs/en/memory
---

# Claude Skills Deduplication Rule

**Story**: [8-84](./../../../.planning/stories/8-84-claude-skills-deduplication-audit.story.md)
**Status**: ✅ Documentato 2026-04-30

---

## Problema

La cartella `bashscripts/ai/.claude/skills/` accumula file duplicati nel tempo,
specialmente nella famiglia `bmad-testarch-*` che condivide una `resources/knowledge/`
identica in 9 skill diverse.

### Dati misurati (2026-04-30)

| Metrica | Valore |
|---------|--------|
| File totali | 2.411 |
| Skills | 142 directories |
| Copie identiche della knowledge base | 336 (9 skills × 42 file = 378, 42 unici) |
| Skills non registrate in Windsurf | 2 (`bmad-workflow-builder`, `context-compression`) |
| File `workflow.md` con conflitti git | 1 (`bmad-create-story`) |

---

## Regola: No Knowledge Duplication tra bmad-testarch-*

**Le skill `bmad-testarch-*` NON devono contenere copie locali di `resources/knowledge/`.**

La knowledge base condivisa DEVE risiedere in:
```
bashscripts/ai/.claude/skills/bmad-testarch-shared/resources/knowledge/
```

Le singole skill mantengono SOLO i propri file unici:
- `workflow.md`
- `SKILL.md`
- `bmad-skill-manifest.yaml`
- file `steps-*/` specifici

### Regola Anti-Re-accumulo

Prima di ogni aggiornamento di una skill `bmad-testarch-*`:
```bash
# Verifica: non devono esserci file in resources/knowledge/ della singola skill
ls bashscripts/ai/.claude/skills/bmad-testarch-trace/resources/knowledge/ 2>/dev/null && echo "VIOLAZIONE!"
# Output atteso: nessuno (directory vuota o assente)
```

---

## Regola: Skills Non Registrate → Archive

Se una skill NON appare nella lista `tool: skill` di Windsurf, va in `_archive/`:
```
bashscripts/ai/.claude/skills/_archive/
```

Verifica rapida: cerca il nome skill nella descrizione del tool `skill` in `.windsurf/` config.
Se non trovato → `mv skill/ _archive/`.

---

## Regola: Zero Conflitti Git nei Workflow

I file `workflow.md` nelle skill NON devono contenere **marker di conflitto Git** (`<<<<<<<`, `=======`, `>>>>>>>`).

Se trovati:
1. Identificare il blocco corretto (di solito il più recente post-merge)
2. Rimuovere tutti i marker
3. Verificare che il file sia parsabile

```bash
# Verifica di massa
grep -r "<<<<<<" bashscripts/ai/.claude/ | wc -l
# Target: 0
```

---

## Struttura Target

```
bashscripts/ai/.claude/
├── README.md
├── commands/          # Slash commands (34 file) — già ottimale
├── rules/             # Rules (.mdc) (31 file) — già ottimale
├── memory/            # Memory (1 file) — già ottimale
├── skills/
│   ├── bmad-testarch-shared/    # ← NUOVO: knowledge condivisa
│   │   ├── README.md
│   │   └── resources/knowledge/ # 42 file unici
│   ├── bmad-testarch-trace/     # solo workflow.md + SKILL.md + steps-*/
│   ├── bmad-testarch-automate/  # idem
│   ├── ... (altre 7 skill)
│   ├── _archive/                # skill non in Windsurf
│   │   ├── bmad-workflow-builder/
│   │   └── context-compression/
│   └── ... (tutte le altre skill registrate)
└── worktrees/
```

---

## Impatto sull'Efficienza AI

**Prima**: ogni invocazione di una skill `bmad-testarch-*` carica 42 file di knowledge
in contesto anche se identici agli altri — token sprecati.

**Dopo**: la knowledge è condivisa; caricata una sola volta in `bmad-testarch-shared/`.
Gli agenti leggono il path condiviso invece di 9 copie identiche.

**Risparmio stimato**: 336 file × media 8 KB = ~2.7 MB di contesto eliminato.

---

---

## Struttura Ufficiale Claude Code (doc 2025)

Source: https://code.claude.com/docs/en/claude-directory

### Cartelle standard in `.claude/`

| Directory | Scopo | Caricamento |
|-----------|-------|-------------|
| `rules/` | Regole automatiche (`*.md`) | Ad ogni conversazione |
| `skills/` | Skills con `SKILL.md` + frontmatter | Al trigger/invocazione |
| `commands/` | Slash commands (`*.md`) | Al trigger `/nome` |
| `agents/` | Subagents (`*.md`) | Al trigger |
| `output-styles/` | Stili output | Al trigger |

### File standard nella root `.claude/`

| File | Scopo |
|------|-------|
| `CLAUDE.md` | Istruzioni progetto — caricato SEMPRE |
| `settings.json` | Permessi, hooks, env |
| `settings.local.json` | Locale non-versionato (gitignore) |
| `.mcp.json` | Configurazione MCP servers |
| `.worktreeinclude` | Worktrees |

### Frontmatter obbligatorio per `SKILL.md`

```yaml
---
name: skill-name          # opzionale (default: dirname)
description: "Trigger semantico — Claude legge questo per decidere QUANDO usare la skill"
# opzionali:
disable-model-invocation: false
user-invocable: true
allowed-tools: [Read, Grep]
context: fork             # fork = subagent isolato
effort: medium            # low|medium|high|xhigh|max
---
```

**Senza `description`**: la skill non viene mai triggerata automaticamente.

### `inactive-skills/` NON esiste nella doc ufficiale

Claude Code riconosce SOLO `skills/`. La cartella `inactive-skills/` è una
convenzione locale che Claude Code ignora a runtime — ma i file occupano disco.
Le skill non attive devono stare FUORI da `.claude/`.

---

## Metriche Post-Cleanup (Story 8-84 + 8-85, 2026-04-30)

| Metrica | Prima | Dopo |
|---------|-------|------|
| File in `.claude/` | 2.411 | **664** |
| Dimensione `.claude/` | ~21 MB | **5.9 MB** |
| `inactive-skills/` in `.claude/` | 14 MB, 80 dirs | **0 (spostata fuori)** |
| Copie knowledge duplicate | 336 | **0** |
| Conflitti git | 4 file | **0** |

---

## See Also

- [[concepts/context-compression-discipline.md]] — disciplina generale di compressione contesto
- [[concepts/context-overflow-compression-rule.md]] — regola anti-overflow 131k token
- [Story 8-74](./../../../.planning/stories/8-74-agents-directory-audit.story.md) — audit precedente su `.agents/`
- [Story 8-84](./../../../.planning/stories/8-84-claude-skills-deduplication-audit.story.md) — deduplicazione knowledge bmad-testarch-*
- [Story 8-85](./../../../.planning/stories/8-85-claude-code-dot-claude-official-alignment.story.md) — allineamento struttura ufficiale Claude Code