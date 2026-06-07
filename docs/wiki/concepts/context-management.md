---
title: "Context Management & Compression"
type: concept
confidence: high
created: 2026-05-11
updated: 2026-05-11
tags: [context, compression, tokens, optimization, mcp]
related:
  - ../skills/context-compression.md
  - ../rules/on-demand-pattern.md
---

# Context Management & Compression

## Critical Problem: Token Overflow

**Error Pattern:**
```
API Error: 400 Maximum context length is 262144 tokens
Requested: ~694838 tokens (581635 text + 81203 tool + 32000 output)
```

## Root Causes in This Project

1. **Massive Documentation Folders:**
   - `laravel/Modules/User/docs`: 24MB
   - `laravel/Modules/UI/docs`: 15MB
   - `docs/wiki/skills`: 215+ files
   - Total docs: ~50MB+ of text

2. **No Selective Loading:** All docs loaded at startup

3. **Redundant Content:** Duplicated patterns across modules

4. **Missing Compression:** No abbreviation/schema optimization

## Immediate Solutions

### 1. Smart Context Windows

```yaml
# ~/.config/cascade/context-config.yaml
max_tokens: 200000  # Stay under 262144 limit
buffer: 50000       # Reserve for output
tool_reserve: 30000

strategies:
  - truncate_old: true      # Remove oldest messages first
  - compress_summaries: true
  - prioritize_recent: true
```

### 2. Docs Compression Protocol

**Before Request:**
```
[USER REQUEST]
↓
[TRIGGER MAP LOOKUP] → What docs are actually needed?
↓
[QMD SEARCH] → Load only relevant docs
↓
[COMPRESS] → Abbreviate, schema-optimize
↓
[CONTEXT WINDOW]
```

### 3. Token Budget Allocation

| Component | Max Tokens | Strategy |
|-----------|------------|----------|
| System prompt | 10K | Compressed rules only |
| User message | 50K | Summarize if >50K |
| Loaded docs | 100K | On-demand, compressed |
| Tool responses | 40K | Abbreviated schemas |
| Output buffer | 32K | Reserved |
| **Total** | **232K** | **Under 262K limit** |

## Implementation

### Step 1: Install Context Compression

```bash
# Already exists: docs/wiki/skills/context-compression.md
# Use skill trigger: "compress context" or "optimize tokens"
```

### Step 2: Create Docs Index

Every module docs folder MUST have:
- `00-index.md` - Contents only, no full text
- `architecture/` - High-level (small)
- `guides/` - Task-specific (load on demand)
- `reference/` - Detailed (compress heavily)

### Step 3: Compression Rules

```markdown
## Compression Levels

| Level | Method | Use For |
|-------|--------|---------|
| 0 - None | Full text | Critical decisions |
| 1 - Light | Remove examples | Standard docs |
| 2 - Medium | Abbreviate fields | API references |
| 3 - Heavy | Schema only | Large datasets |
| 4 - Extreme | Hashes/pointers | Archive content |
```

## Ongoing Discipline

### Daily: Study Docs Structure

```bash
# Check docs size
find laravel/Modules -name "docs" -type d -exec du -sh {} \; | sort -h

# Find large files
find laravel/Modules/*/docs -name "*.md" -size +100k

# Check for duplicates
fdupes -r laravel/Modules/*/docs
```

### Weekly: Compress & Optimize

1. **Remove duplicates** across modules
2. **Abbreviate field names** in schemas
3. **Summarize long guides** (>500 lines)
4. **Move to wiki** module-generic patterns

### Monthly: Archive & Refactor

1. **Move obsolete docs** to `_archive/`
2. **Consolidate patterns** into wiki
3. **Update indexes** with compressed summaries

## Emergency Protocol

When token overflow occurs:

1. **Immediately:**
   - Clear non-essential context
   - Compress current loaded docs
   - Use `context-compression` skill

2. **Short-term:**
   - Identify largest docs loaded
   - Load only relevant sections
   - Abbreviate all field names

3. **Long-term:**
   - Restructure docs folders
   - Implement selective loading
   - Create compressed indexes

## Compression Examples

### Example 1: API Schema

**Before:** 500 tokens
```json
{
  "userIdentifier": "uuid-123",
  "authenticationToken": "abc...",
  "timestampCreated": "2026-05-11T10:00:00Z",
  "isActive": true
}
```

**After:** 150 tokens (Level 2)
```json
{
  "uid": "u123",
  "tok": "abc",
  "tsc": "2026-05-11",
  "act": 1
}
```

### Example 2: Docs Reference

**Before:** 2000 tokens
```markdown
## User Module

The User module handles authentication, authorization, and user management.
It provides comprehensive features including:
- Login/Logout
- Registration
- Password reset
- Profile management
- Social authentication
...
```

**After:** 200 tokens (Level 3)
```markdown
## User
Auth, authz, user mgmt. Features: login, reg, pwd-reset, profile, social.
Ref: laravel/Modules/User/docs/
```

## References

- [Context Compression Skill](../skills/context-compression.md)
- [On-Demand Pattern](../rules/on-demand-pattern.md)
- [Trigger Map](../rules/00-TRIGGER_MAP.md)
