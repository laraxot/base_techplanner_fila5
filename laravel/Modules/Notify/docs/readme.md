---
title: "Notify Module — Document"
type: docs/bmad
status: active
module: Notify
scope: documentation
bmad_version: 1.0
updated: 2026-10-06
---

# Notify Module Documentation

Complete documentation for the Notify module, organized by purpose and content type.

## Root Directory

- `README.md` - This file. Start here for navigation.
- `CHANGELOG.MD` - Historical changes to the Notify module.

## Main Structure

### BMAD (Brainstorm, Model, Action, Deliver)

**Directory**: `bmad/`

The primary home for all module analysis, design, brainstorming, and strategic content.

- `architecture/` - Technical architecture and design patterns
- `brainstorming/` - Working notes and exploratory documents
- `design/` - Design specifications and decisions
- `epics/` - Epic definitions and roadmap items
- `stories/` - Completed BMAD stories (work history)
- `analysis/` - Deep analysis and audit documents (if organized separately)
- `patterns/` - Reusable patterns and best practices

Key files:
- `architecture.md` - Module architecture overview
- `epics.md` - Epic tracker and roadmap
- `decision-log.md` - Key architectural decisions
- `setup-guide.md` - Setup and configuration guide

### Wiki (Knowledge Base)

**Directory**: `wiki/`

Reference documentation, concepts, and institutional knowledge.

- `concepts/` - Conceptual documentation (naming conventions, standards, etc.)
- `commands/` - CLI commands and workflows
- `memories/` - Institutional knowledge and lessons learned
- `rules/` - Module rules and constraints
- `skills/` - Tools, skills, and automation

Key files:
- `INDEX.md` - Wiki navigation index
- `overview.md` - High-level overview
- `AGENTS.md` - Agent/automation notes

### Specialized Directories

**Architecture**  
Directory: `architecture/`  
Technical design documents and module boundary specifications.

**Communication Channels**  
- `mail-templates/` - Email template documentation
- `notifications/` - Notification behavior and design
- `sms/` - SMS provider and channel documentation
- `templates/` - Template structure and standards

**Quality & Analysis**  
- `phpstan/` - PHPStan level 10 analysis, configuration, and fixes
- `deployment/` - Deployment guides and infrastructure docs

**Project Documentation**  
- `project_docs/` - Project-specific documentation
- `reports/` - Analysis reports and audits
- `llm-wiki/` - LLM-specific documentation
- `rules/` - Module-level rules and conventions

## Navigation

1. **New to the module?** Start with `bmad/setup-guide.md` and `bmad/architecture.md`
2. **Looking for a specific topic?** Check `wiki/INDEX.md` or search within subdirectories
3. **Need the module roadmap?** See `bmad/epics/` for strategic direction
4. **Want to understand past decisions?** Review `bmad/decision-log.md` and `bmad/stories/`

## File Count by Category

After consolidation (2026-10-06):

| Category | Files | Purpose |
|----------|-------|---------|
| bmad/ | 326 | Analysis, design, brainstorming, stories |
| wiki/ | 35 | Knowledge base and reference |
| phpstan/ | 35 | Quality analysis and fixes |
| architecture/ | 8 | Technical design |
| Other | 13 | Mail, SMS, deployment, reports, etc. |
| **Total** | **417** | |

## Consolidation History

**2026-10-06**: Initial consolidation phase
- Removed 19 duplicate and stub files (304 → 285 root files)
- Removed 8 stub directories (.obsidian, .schema, -integration, _integration, theme, superpowers)
- Moved specialized files into appropriate subdirectories
- Reduced root-level clutter from 304 files to 4 files

## Next Steps

Future consolidations may:
- Merge communication channel directories (mail, SMS, notifications) into a single `channels/` directory
- Consolidate analysis reports into `wiki/analysis/`
- Establish clear ownership and deprecation policy for old analysis files
