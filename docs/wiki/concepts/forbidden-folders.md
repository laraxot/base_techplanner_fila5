# Forbidden Folders Rule

## Context
To maintain structural integrity, avoid redundancy, and prevent nesting bugs in the Laraxot ecosystem, certain directory names and structures are strictly forbidden.

## Forbidden Folders
The following folders MUST NOT exist and MUST be removed/migrated if found:

1.  **`docs/archive`**: 
    - **Reason**: Redundant with the Karpathy LLM Wiki Standard's `docs/wiki/_archive/`.
    - **Action**: Move content to `docs/wiki/_archive/` and delete the folder.
2.  **`_docs`**:
    - **Reason**: Non-standard documentation root.
    - **Action**: Standardize on `docs/`.
3.  **`lang/lang/`**:
    - **Reason**: Recursion/nesting bug typically caused by faulty automation scripts.
    - **Action**: Delete the redundant nested folder.

## Karpathy LLM Wiki Standard
All modules and themes MUST implement:
- `docs/raw/`: Persistent raw storage.
- `docs/wiki/`: Curated knowledge.
    - Sacred Hierarchy: `concepts/`, `entities/`, `sources/`, `comparisons/`, `decisions/`, `troubleshooting/`, `_archive/`, `_templates/`.

## Enforcement
- All AI agents MUST actively monitor and clean these folders.
- No new tasks should create these structures.
- CI/CD checks (future) will enforce this.

## Related
- [GEMINI.md](../../.gemini/GEMINI.md)
- [Karpathy LLM Wiki Standard](../concepts/karpathy-wiki.md)
