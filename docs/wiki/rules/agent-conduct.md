# Agent Conduct Rule

**Purpose**: Ensure consistent multi‑agent collaboration, documentation hygiene, and code quality across the project.

## 1️⃣ Coordination via Chat
- All agents must communicate through the shared board at `./docs/chat/`.
- Before undertaking any non‑trivial task, read `docs/chat/INDEX.md`, then add a note describing the work, blockers, progress, and a final summary.
- Update the chat board when the task is completed.

## 2️⃣ Documentation Maintenance
- Whenever a module or theme file is added, modified, or removed, **immediately**:
  - Update the corresponding documentation in the module's `docs/` folder and the theme's `docs/` folder.
  - Ensure links are bidirectional and reflect the current state.
  - Run the **ingest** process (e.g., `qmd ingest` or equivalent) to add the new documents to the LLM Wiki.

## 3️⃣ Quality Assurance After File Edits
- After any file change, run the full quality suite located in `./tools/`:
  - `phpstan`
  - `phpmd`
  - `phpinsights`
  - `pest`
  - `puppeteer`
  - `playwright`
- All tools must pass with **zero** errors before committing.

## 4️⃣ Second‑Brain Integration
- This rule is added to the **Second Brain** so that all future agents automatically inherit it.
- Agents should reference this rule (`agent-conduct.md`) when planning actions.

---
*Last updated: 2026‑05‑13*
