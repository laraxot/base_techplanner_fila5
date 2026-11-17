# GitHub Multi-Agent Communication Protocol

**Status**: CRITICAL - Active Coordination Rule  
**Updated**: 2026-03-05  
**Purpose**: Enable seamless communication between autonomous AI agents via GitHub  

---

## Core Principle: GitHub as Central Communication Hub

Multiple AI agents work on LaravelPizza **simultaneously**. Use GitHub Issues and Discussions as the **single source of truth** for agent coordination.

---

## Rule 1: Always Check GitHub Before Starting

### Step 1: Query GitHub Issues
```bash
gh issue list --repo base_laravelpizza --label "pest-coverage" --state all --json title,number,state,labels
```

**Look for**:
- Issues labeled `pest-coverage` (current initiative)
- Issues labeled `in-progress` (another agent working)
- Issues labeled `blocked` (needs resolution)
- Recent activity (timestamps)

### Step 2: Check GitHub Discussions
```bash
gh discussion list --repo base_laravelpizza --filter all
```

**Look for**:
- Agent coordination discussions
- Test failure reports
- Module assignment discussions
- Coverage status updates

### Step 3: Check Recent Commits
```bash
git log --oneline --all --grep="PEST\|coverage\|test" --since="2 hours ago"
```

---

## Rule 2: Create Issues for Your Work

When starting a new batch of tests:

```bash
gh issue create \
  --title "[PEST] Modules/Geo: Expand coverage (0% → 40%)" \
  --body "
## Batch Assignment
- **Agent**: $(hostname)
- **Module**: Modules/Geo
- **Files**: app/Actions/*.php (6 files)
- **Target**: 40% coverage
- **Status**: In Progress

## Progress
- [ ] File 1: ActionName.php
- [ ] File 2: ServiceName.php

## Notes
- Using DatabaseTransactions trait
- Coverage validation: --coverage --min=100
  " \
  --label "pest-coverage,in-progress,modules-geo"
```

### Issue Labels Convention

Use these standardized labels:

| Label | Meaning |
|-------|---------|
| `pest-coverage` | Part of 100% coverage initiative |
| `in-progress` | Agent currently working on this |
| `blocked` | Needs resolution (test failures, etc.) |
| `done` | Completed, ready for merge |
| `modules-geo` | Module tag (modules-{name}) |
| `needs-review` | Requires verification by another agent |

---

## Rule 3: Update Issue Status Continuously

After EVERY batch completion:

```bash
# Mark as done and close
gh issue close <issue-number> \
  --comment "✅ Completed: 150 → 310 LOC covered (40% → 70% coverage)
  
- Added 25 tests
- All passing with --coverage --min=100
- Updated coverage-plan.md
- Ready for merge

Co-authored-by: Copilot <223556219+Copilot@users.noreply.github.com>" \
  --reason completed
```

Or if blocked:

```bash
gh issue comment <issue-number> \
  --body "🔴 **BLOCKED**: 
  
Error: Class 'Theme' not found in Modules/UI/tests/Feature/UIBusinessLogicTest.php:17

Action needed: Remove or fix test file. Another agent?"
```

---

## Rule 4: Use Discussions for Coordination

When encountering conflicts or needing to sync:

```bash
gh discussion create \
  --title "🤝 Multi-Agent Sync: Coverage Progress (2026-03-05)" \
  --body "
## Status Report
- Geo module: 0% → 40% ✅ (Agent-A)
- Cms module: 0% → 25% 🟡 (Agent-B, blocked on fixtures)
- User module: Stalled by unique constraint violation

## Blockers
1. Modules/UI/tests/Feature/UIBusinessLogicTest.php - Theme model missing
2. Modules/Meetup pivot tables not in test DB

## Coordination
- Let's avoid Cms for next 2 hours (Agent-B needs it)
- Need help resolving Theme model issue
  " \
  --category "announcements"
```

---

## Rule 5: Prevent Collision via GitHub Projects

If available, use GitHub Project board:

```bash
# View board
gh project view 1 --owner base_laravelpizza

# Add issue to project
gh project item-add 1 --id <issue-number> --owner base_laravelpizza
```

Assign different modules to different agents to minimize conflicts.

---

## Rule 6: Real-Time Awareness Queries

Before starting work:

```bash
# See all in-progress pest coverage work
gh issue list --repo base_laravelpizza \
  --label "pest-coverage,in-progress" \
  --json title,number,state,createdAt

# Get last 10 commits (any agent)
git log --oneline -10 --all

# Check active discussions
gh discussion list --repo base_laravelpizza \
  --filter unanswered,updatedRecently

# See blocked issues
gh issue list --repo base_laravelpizza \
  --label "pest-coverage,blocked" \
  --json title,number,body
```

---

## Implementation Flow (Per Batch)

### Phase 1: Check & Plan (5 min)
```bash
# 1. Query GitHub for assignments
gh issue list --label "pest-coverage,in-progress"

# 2. Check discussions for blockers
gh discussion list

# 3. See what's already covered
git log --oneline --since="2 hours ago" | grep PEST

# 4. Pick module NOT currently being worked
# Example: If Geo is in-progress, pick Seo or Lang
```

### Phase 2: Create Issue (2 min)
```bash
gh issue create \
  --title "[PEST] Modules/Selected: Expand coverage (X% → Y%)" \
  --body "Starting batch on Modules/Selected..." \
  --label "pest-coverage,in-progress,modules-selected"

# Note the issue number
ISSUE_NUMBER=123
```

### Phase 3: Work & Update (30-60 min)
```bash
# Write tests
cd laravel/Modules/Selected
# ... add tests ...

# Verify coverage
php artisan test --coverage --min=100 tests/

# Commit frequently with issue reference
git commit -m "[PEST] Modules/Selected: Add X tests (#$ISSUE_NUMBER)"
```

### Phase 4: Complete & Close (5 min)
```bash
# Update coverage-plan.md
# Mark items as ✅

# Close issue
gh issue close $ISSUE_NUMBER \
  --comment "✅ Completed: X tests added, Y% coverage reached"

# Update discussion if needed
gh discussion comment --id <disc-id> \
  --body "🟢 **COMPLETED**: Modules/Selected now at Y% coverage"
```

---

## Communication Templates

### Template 1: Starting Work
```
## 🚀 Starting Batch

**Module**: Modules/Geo
**Target Coverage**: 0% → 40%
**Files**: 6 Actions
**Duration**: ~1 hour

Checking for conflicts... None detected ✅
```

### Template 2: Blocked
```
## 🔴 BLOCKED

**Issue**: Class 'Theme' not found
**File**: Modules/UI/tests/Feature/UIBusinessLogicTest.php:17
**Status**: Waiting for another agent to resolve model definition

Next steps: Continue other modules while this is resolved
```

### Template 3: Completed
```
## ✅ COMPLETED

**Module**: Modules/Geo
**Tests Added**: 25
**Coverage**: 0% → 40%
**Status**: Ready for merge

All tests passing with --coverage --min=100
```

---

## GitHub Environment Setup

Add to your shell profile:

```bash
# Alias for checking pest work
alias pest-status='gh issue list --repo base_laravelpizza --label pest-coverage --json title,number,state'

# Alias for creating pest issue
function pest-issue() {
  local module=$1
  local coverage=$2
  gh issue create \
    --title "[PEST] $module: Expand coverage $coverage" \
    --label "pest-coverage,in-progress,modules-$(echo $module | tr '[:upper:]' '[:lower:]' | sed 's/.*\///')"
}
```

---

## Critical Remember Points

✅ **ALWAYS check GitHub Issues first** - Don't duplicate work  
✅ **Create issue BEFORE starting** - Claim your batch  
✅ **Update issue status after EACH completion** - Keep board current  
✅ **Use discussions for blockers** - Alert other agents  
✅ **Pick non-overlapping modules** - Reduce collisions  
✅ **Commit with issue references** - Link code to coordination  

---

## Example Workflow

```bash
# 1. Check status
$ pest-status
# Output shows: Geo (in-progress), Cms (in-progress), Lang (available)

# 2. Pick Lang (no conflict)
$ pest-issue "Modules/Lang" "0% → 35%"
# Creates issue #456

# 3. Work on it
cd laravel/Modules/Lang
# ... add tests ...

# 4. Verify
php artisan test --coverage --min=100

# 5. Commit
git commit -m "[PEST] Modules/Lang: Add tests for translation service (#456)"

# 6. Close
gh issue close 456 --comment "✅ Lang now at 35% coverage"
```

---

**Status**: Active  
**Last Updated**: 2026-03-05  
**Maintained By**: All AI Agents  
**Next Review**: When issues list > 20
