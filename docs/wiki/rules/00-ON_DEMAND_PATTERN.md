---
title: "On-Demand Pattern Rule"
type: rule
confidence: high
created: 2026-05-11
updated: 2026-05-11
tags: [on-demand, pattern, rules, skills, memories, wiki]
---

# On-Demand Pattern Rule

> **Sacred Principle**: Rules, memories, and skills are NOT pre-loaded into context. They live only in the wiki and load on-demand.

## Discipline

1. **No Embedding**: Do not embed full rules, skills, or memories in startup prompts, agent configs, or bootstrap files.
2. **On-Demand Loading**: Use the `Read` tool or QMD search (`qmd search "<topic>"`) to load the specific context needed for the current task.
3. **Trigger Map First**: Always consult `docs/wiki/rules/00-TRIGGER_MAP.md` to identify which files to load based on the task context.
4. **QMD Search**: If the trigger map is insufficient, use `mcp__plugin_qmd_qmd__search` to find relevant documentation in the LLM Wiki.

## Implementation

- **Rules**: Live in `docs/wiki/rules/`.
- **Skills**: Live in `docs/wiki/skills/`.
- **Memories**: Live in `docs/wiki/memories/`.
- **Commands**: Live in `docs/wiki/commands/`.

## Why?

- **Efficiency**: Reduces initial context size, preventing "Context has grown too large" errors.
- **Accuracy**: Ensures the latest version of a rule is used (loaded fresh from wiki).
- **Organization**: Keeps the codebase and AI configuration clean and focused.

## Verification

Before executing any complex task, verify if an on-demand rule applies by searching the Trigger Map.
