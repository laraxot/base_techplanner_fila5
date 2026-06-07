# Multi-Agent Harmony Rules

**Status**: CRITICAL - Active Coordination Rule  
**Updated**: 2026-03-05  
**Applicable To**: All AI agents working on LaravelPizza  

---

## Core Principle: Harmonious Parallel Execution

This project is worked on by **multiple autonomous AI agents simultaneously**. To prevent conflicts, collisions, and duplicated effort:

### Rule 1: Never Delete, Always Rename with `.old`
- ❌ DO NOT delete files directly
- ✅ ALWAYS rename to `filename.old` when replacing/refactoring
- Reason: Other agents may still be reading/referencing old content

**Example**:
```bash
# Wrong
rm docs/old-coverage.md

# Right
mv docs/old-coverage.md docs/old-coverage.md.old
```

### Rule 2: Check Work Not Already Done

Before starting a task:

1. **Query the SQL todos table** for status
2. **Read coverage-plan.md** for checkmarks
3. **Scan recent git commits** for related work
4. **Check file modification dates** (recent = another agent working)

**Query Pattern**:
```sql
SELECT * FROM todos WHERE status = 'in_progress' OR status = 'pending'
  ORDER BY updated_at DESC LIMIT 10;
```

### Rule 3: Non-Sequential Task Selection (Reduce Collisions)

- ❌ DO NOT work modules in order (Activity → App → Cms...)
- ✅ DO work random/scattered modules to minimize overlap
- Reason: Multiple agents working same module = conflicts

**Selection Strategy**:
```
Available modules in coverage-plan.md: [Activity, App, Cms, Gdpr, Geo, Job, Lang, Media, Meetup, Notify, Seo, Tenant, Ui, User, Xot]
Pick: Random selection that others aren't currently working
```

### Rule 4: Update Documentation Continuously

After EVERY batch of tests completed:

1. **Update `/var/www/_bases/base_laravelpizza/docs/coverage-plan.md`**
   - Remove completed file lines (add ✅ before removing)
   - Add section summary with timestamp

2. **Update SQL todos table**
   ```sql
   UPDATE todos SET status = 'done' WHERE id = 'batch-xyz';
   ```

3. **Commit with clear message**
   ```
   [PEST] Module/File: Expand coverage (X→Y%)
   
   - Added: N tests
   - Covered: N methods
   - Status: X% → Y% coverage
   
   Co-authored-by: Copilot <223556219+Copilot@users.noreply.github.com>
   ```

### Rule 5: Real-Time Awareness

**Check Before Starting**:
```bash
# See what coverage-plan.md says
grep "^- \[.\] Modules/User" /var/www/_bases/base_laravelpizza/docs/coverage-plan.md | head -5

# See recent commits
git log --oneline --since="30 minutes ago" | grep PEST

# Check SQL
sqlite3 /home/zorin/.copilot/session-state/*/session.db \
  "SELECT id, status FROM todos ORDER BY updated_at DESC LIMIT 5;"
```

### Rule 6: File Locking via SQL

Use the todos table as a **distributed lock**:

```sql
-- Lock a task
UPDATE todos SET status = 'in_progress' WHERE id = 'meetup-models';

-- Release/Complete it
UPDATE todos SET status = 'done' WHERE id = 'meetup-models';

-- Check conflicts
SELECT id, status FROM todos WHERE status = 'in_progress';
```

---

## Implementation Checklist (Per Batch)

- [ ] Query SQL: any agents working this module?
- [ ] Read coverage-plan.md: module already assigned?
- [ ] Check git log: recent work on this module?
- [ ] Select RANDOM uncovered module to avoid collision
- [ ] Create/Update SQL todo for this batch
- [ ] Write tests until 100% coverage on selected files
- [ ] Verify: `php artisan test --coverage --min=100 Modules/Selected`
- [ ] Update coverage-plan.md with checkmarks and removed lines
- [ ] Update SQL todos: mark as `done`
- [ ] Commit with timestamp and details
- [ ] Notify via docs: Log work in CLAUDE.md memory

---

## Pattern: Batch Workflow

### Step 1: Analyze & Lock (2 min)
```bash
# Check what's uncovered
grep "^- \[ \]" /var/www/_bases/base_laravelpizza/docs/coverage-plan.md \
  | shuf | head -3

# Pick one random module to avoid collision
# SELECT Xot, Geo, or Seo (fewer agents likely working those)
```

### Step 2: Create Tests (30-60 min)
```bash
cd laravel/Modules/Selected
# Write tests until coverage-plan shows ✅ for files
php artisan test --coverage --min=100 tests/
```

### Step 3: Update Docs (5 min)
```bash
# Remove lines from coverage-plan.md
# Update todos table status
# Commit
```

### Step 4: Verify No Collision (1 min)
```bash
# Check recent commits from other agents
git log --oneline --since="1 hour ago" | head -5
# If same module: discuss via .claude/MEMORY.md
```

---

## Discord / Coordination Protocol

When agents detect collision (same module being worked):

1. **Log to CLAUDE.md**: Add entry to "Multi-Agent Coordination" section
2. **Merge strategies**: First agent to push wins, second rebases
3. **No hard conflicts**: SQL todos + coverage-plan.md are sources of truth

---

## File Renaming Examples

```bash
# Backing up old test
docs/pest-testing-guide.md.old

# Old coverage report
docs/coverage-report-2026-02-28.md.old

# Previous rule version
.cursor/rules/MULTI_AGENT_HARMONY.md.old
```

Never delete—always keep history with `.old` suffix.

---

## Summary

✅ **Work in parallel** on different modules  
✅ **Check SQL todos** before starting  
✅ **Rename (don't delete)** files with `.old`  
✅ **Update coverage-plan.md** after each batch  
✅ **Pick random modules** to reduce collisions  
✅ **Commit frequently** with timestamps  

**Goal**: Achieve 100% Pest coverage through coordinated, non-blocking parallel execution.
