---
title: "AI Assistant Documentation"
type: index
tags: [notify, docs, ai-agents, split]
module: Notify
created: 2026-07-20
updated: 2026-07-20
qmd: "notify documentazione ai agents split readme ai assistant documentation index readme frontmatter qmd search"
issues:
  - "https://github.com/laraxot/module_notify_fila5/issues/56"
discussions:
  - "https://github.com/laraxot/module_notify_fila5/discussions/57"
related:
  - ../../README.md
  - ../../wiki/index.md
  - ../../notifications/readme.md
  - ../../integrations/readme.md
  - ../../templates/readme.md
---
# AI Assistant Documentation

<<<<<<< .merge_file_5Fi92q
**Purpose**: Centralized documentation for all AI assistants used in the FixCity project  
=======
<<<<<<< .merge_file_wrT1Mf
**Purpose**: Centralized documentation for all AI assistants used in the FixCity project  
=======
>>>>>>> .merge_file_hzsM2D
**Purpose**: Centralized documentation for all AI assistants used in the Notify project  
>>>>>>> .merge_file_HPgICR
**Last Updated**: 2026-04-11  

---

## Quick Access

| Assistant | Original File | Split Files | Index |
|-----------|--------------|----|----|
<<<<<<< .merge_file_5Fi92q
| BMad Agents | [AGENTS.md](../../../AGENTS.md) | 32 files | [agents/INDEX.md](agents/INDEX.md) + [tasks/INDEX.md](tasks/INDEX.md) |
| Claude/Laravel Boost | [CLAUDE.md](../../../docs/CLAUDE.md) | 21 files | [claude/INDEX.md](claude/INDEX.md) |
| Gemini | [GEMINI.md](../../../laravel/GEMINI.md) | 14 files | [gemini/INDEX.md](gemini/INDEX.md) |
=======
<<<<<<< .merge_file_wrT1Mf
| BMad Agents | [AGENTS.md](../../../AGENTS.md) | 32 files | [agents/INDEX.md](agents/INDEX.md) + [tasks/INDEX.md](tasks/INDEX.md) |
| Claude/Laravel Boost | [CLAUDE.md](../../../docs/CLAUDE.md) | 21 files | [claude/INDEX.md](claude/INDEX.md) |
| Gemini | [GEMINI.md](../../../laravel/GEMINI.md) | 14 files | [gemini/INDEX.md](gemini/INDEX.md) |
=======
>>>>>>> .merge_file_hzsM2D
| BMad Agents | [agents.md](../../../agents.md) | 32 files | [agents/index.md](agents/index.md) + [tasks/index.md](tasks/index.md) |
| Claude/Laravel Boost | [CLAUDE.md](../../../docs/CLAUDE.md) | 21 files | [claude/index.md](claude/index.md) |
| Gemini | [GEMINI.md](../../../laravel/GEMINI.md) | 14 files | [gemini/index.md](gemini/index.md) |
>>>>>>> .merge_file_HPgICR
| Qwen | [QWEN.md](../../../QWEN.md) | 1 file (no split needed) | — |

**Total**: 68 split files across 4 assistants

---

## Directory Structure

```
.agents/docs/
<<<<<<< .merge_file_5Fi92q
├── INDEX.md                    ← Master index (this is referenced by all)
├── README.md                   ← This file
├── agents/                     ← 10 BMad agent definitions
│   ├── INDEX.md
=======
<<<<<<< .merge_file_wrT1Mf
├── INDEX.md                    ← Master index (this is referenced by all)
├── README.md                   ← This file
├── agents/                     ← 10 BMad agent definitions
│   ├── INDEX.md
=======
├── index.md                    ← Master index (this is referenced by all)
├── README.md                   ← This file
├── agents/                     ← 10 BMad agent definitions
│   ├── index.md
>>>>>>> .merge_file_HPgICR
>>>>>>> .merge_file_hzsM2D
│   ├── ux-expert.md
│   ├── scrum-master.md
│   ├── test-architect.md
│   ├── product-owner.md
│   ├── product-manager.md
│   ├── full-stack-developer.md
│   ├── bmad-orchestrator.md
│   ├── bmad-master.md
│   ├── architect.md
│   └── business-analyst.md
├── tasks/                      ← 22 BMad task definitions
<<<<<<< .merge_file_5Fi92q
│   ├── INDEX.md
=======
<<<<<<< .merge_file_wrT1Mf
│   ├── INDEX.md
=======
>>>>>>> .merge_file_hzsM2D
│   ├── index.md
>>>>>>> .merge_file_HPgICR
│   ├── validate-next-story.md
│   ├── trace-requirements.md
│   ├── ... (20 more)
├── claude/                     ← 20 Laravel Boost sections
<<<<<<< .merge_file_5Fi92q
│   ├── INDEX.md
=======
<<<<<<< .merge_file_wrT1Mf
│   ├── INDEX.md
=======
>>>>>>> .merge_file_hzsM2D
│   ├── index.md
>>>>>>> .merge_file_HPgICR
│   ├── foundation-rules.md
│   ├── boost-rules.md
│   ├── ... (18 more)
├── gemini/                     ← 13 Gemini sections
<<<<<<< .merge_file_5Fi92q
│   ├── INDEX.md
=======
<<<<<<< .merge_file_wrT1Mf
│   ├── INDEX.md
=======
>>>>>>> .merge_file_hzsM2D
│   ├── index.md
>>>>>>> .merge_file_HPgICR
│   ├── boost-integration.md
│   ├── foundation-rules.md
│   ├── ... (11 more)
└── qwen/                       ← Qwen rules (no split needed)
    └── (referenced from ../../../QWEN.md)
```

---

## Why Split?

The original files were very large:
- **AGENTS.md**: 5,349 lines → 32 focused files
- **CLAUDE.md**: 833 lines → 21 focused files
- **GEMINI.md**: 581 lines → 14 focused files

Splitting improves:
- **Readability**: Each file focuses on one topic
- **Maintainability**: Easier to update individual sections
- **AI Context**: AI assistants can load only relevant sections
- **Navigation**: Clear index files with bidirectional links

---

## Cross-References

### Bidirectional Links
Every split file contains links back to:
<<<<<<< .merge_file_5Fi92q
- Its section index (e.g., `agents/INDEX.md`)
=======
<<<<<<< .merge_file_wrT1Mf
- Its section index (e.g., `agents/INDEX.md`)
=======
>>>>>>> .merge_file_hzsM2D
- Its section index (e.g., `agents/index.md`)
>>>>>>> .merge_file_HPgICR
- The master index (`INDEX.md`)
- The original source file

### Related Documentation
- [BMad Method Setup](../../docs/bmad/setup-guide.md)
- [Project Configuration](../../docs/project/configuration.md)
- [Module Docs Index](../../docs/modules/index.md)
- [AI Workflow](../../docs/project/ai-workflow/)

---

## Maintenance

### Adding New Split Files
1. Create file in appropriate subdirectory
<<<<<<< .merge_file_5Fi92q
2. Add entry to the section INDEX.md
3. Add bidirectional link back to INDEX.md
4. Update master INDEX.md if needed

### Updating Split Files
1. Update the split file
2. Update line count in section INDEX.md
3. Add changelog entry to master INDEX.md
=======
<<<<<<< .merge_file_wrT1Mf
2. Add entry to the section INDEX.md
3. Add bidirectional link back to INDEX.md
4. Update master INDEX.md if needed

### Updating Split Files
1. Update the split file
2. Update line count in section INDEX.md
3. Add changelog entry to master INDEX.md
=======
2. Add entry to the section index.md
3. Add bidirectional link back to index.md
4. Update master index.md if needed

### Updating Split Files
1. Update the split file
2. Update line count in section index.md
3. Add changelog entry to master index.md
>>>>>>> .merge_file_HPgICR
>>>>>>> .merge_file_hzsM2D

### Changelog
| Date | Change | Author |
|------|--------|--------|
<<<<<<< .merge_file_5Fi92q
| 2026-04-11 | Initial split of AGENTS.md, CLAUDE.md, GEMINI.md | Qwen |
=======
<<<<<<< .merge_file_wrT1Mf
| 2026-04-11 | Initial split of AGENTS.md, CLAUDE.md, GEMINI.md | Qwen |
=======
>>>>>>> .merge_file_hzsM2D
| 2026-04-11 | Initial split of agents.md, CLAUDE.md, GEMINI.md | Qwen |
>>>>>>> .merge_file_HPgICR

---

**Maintained By**: AI Agents + Development Team
