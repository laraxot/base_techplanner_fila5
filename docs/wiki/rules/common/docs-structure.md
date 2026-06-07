# Documentation Structure Rules

## CRITICAL: `docs/` is the ONLY correct location

Project-level shared documentation belongs outside the Laravel runtime tree.

### Correct locations

| Type | Path |
|------|------|
| Project governance docs | `docs/project/` |
| Root project docs | `docs/` |
| Module docs | `laravel/Modules/{Name}/docs/` |
| Theme docs | `laravel/Themes/{Name}/docs/` |

### Forbidden locations

```
docs/    ALWAYS - this is the ONLY correct location
_docs/                   NEVER - underscore prefix = temp/ignored
lang/lang/{locale}/      NEVER - redundant nesting
```

### Why

- `laravel/` is the runtime tree: app code, modules, themes, config
- Governance and cross-cutting docs are not runtime artifacts
- Keeping them in `docs/` at repo root makes boundaries clear for both humans and AI agents
- `_docs/` is in `.gitignore` and will not be committed

### Detection and remediation

```bash
# Should return nothing
find . -type d -name "project_docs" -path "*/laravel/*"
find . -type d -name "_docs"

# If found: move files forward-only to docs/project/
# Never use git checkout or git reset
```

### Related rules

- `laravel-traits.md` - Do not duplicate methods already in traits
- `git-workflow.md` - Git goes forward only, no resets
