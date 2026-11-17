# GitHub Agent Coordination: Check Before Work

**Effective**: 2026-03-05
**Type**: Behavioral Rule
**Severity**: 🚨 CRITICAL

## Creazione issue quando il backlog non ha traccia (2026-05-21)

**Applicabile a tutti i temi** (non solo «coverage» sotto).

1. Repo attesa da `origin`: `laraxot/base_fixcity_fila5` (fork: `--repo owner/repo`).
2. Cerca issue esistenti: `gh issue list --state open` e/o `--search "<keyword>"`.
3. Nessuna issue pertinente → **`gh issue create`** (`--title`, `--body`, `--label` se usa il team già quel set).
4. **Non chiedere** all’utente il permesso di aprire l’issue: è **norma implicita** sulla repo progetto ([#83](https://github.com/laraxot/base_fixcity_fila5/issues/83)). Se trovi quasi lo stesso tema, **meglio un commento** su issue esistente che un duplicato.

Ref: [`agent-github-issue-mandatory-cycle.md`](../../memories/agent-github-issue-mandatory-cycle.md), [`agent-conduct-rules.md`](../agent-conduct-rules.md).

## The Rule

🚨 **BEFORE STARTING ANY WORK ON COVERAGE**:

1. **Check GitHub Issues**:
   ```bash
   gh issue list --label "coverage" --state open
   ```
   → Is anyone already working on your target module?
   → If YES: Choose different module or add comment "I'll do XYZ part"

2. **Check GitHub Discussions**:
   ```bash
   gh discussion list
   ```
   → Did other agents discover patterns/blockers in your module?
   → Learn from their work

3. **If starting new module**: Create GitHub Issue
   ```bash
   gh issue create --title "[AGENT-WORK] ModuleName - YourTask" \
     --label "coverage,in-progress,module-name"
   ```

4. **Work on tests** (as normal)

5. **When done**: Close issue and reference in commit
   ```bash
   gh issue close <number>
   git commit -m "feat: add ModuleName tests
   
   Closes #123
   - Added X tests
   - Achieved Y% coverage"
   ```

## Why This Matters

**Without GitHub coordination**:
- Agent A starts User tests
- Agent B also starts User tests (doesn't see Agent A)
- Collision, duplicate work, merge conflicts
- Wasted effort

**With GitHub coordination**:
- Agent A: Creates issue, marks IN PROGRESS
- Agent B: Sees issue, chooses Geo instead
- Parallel work, no collisions, 2x speed

## The Social Contract

Every agent promises to:
1. ✅ Check GitHub Issues before starting work
2. ✅ Create [AGENT-WORK] issue when starting module
3. ✅ Use GitHub Discussions to share learnings
4. ✅ Close issues with completion comment
5. ✅ Reference issues in commit messages

## What "Before Starting Work" Means

**Not after thinking about it.**
**Right now. First thing.**

```
SESSION START
  ↓
STOP
  ↓
CHECK GITHUB ISSUES
  ↓
(only then) CONTINUE WITH WORK
```

## If You See This Rule

🚨 **Read**: `docs/GITHUB-AGENT-COMMUNICATION.md` (full guide)
🧠 **Remember**: `docs/memories/github-agent-coordination.md` (why this matters)

## Example Workflow

**Session Start** (2026-03-05 14:50):

```bash
# Step 1: Check GitHub Issues
$ gh issue list --label "coverage" --state open
#123  [AGENT-WORK] User Module - Fix Role/Permission
#124  [AGENT-WORK] Meetup Module - Event CRUD tests
#125  [AGENT-WORK] Geo Module - Location services

# I see User is taken. Check Geo issue.

# Step 2: Open Geo issue
$ gh issue view 125
Title: [AGENT-WORK] Geo Module - Location services
Status: IN PROGRESS
Agent: Agent X
Work: Writing location/distance tests
Est completion: 2 hours

# Geo is taken. Check Job module (not listed = available)

# Step 3: Create new issue for Job
$ gh issue create \
    --title "[AGENT-WORK] Job Module - Background job coverage" \
    --label "coverage,in-progress,job-module" \
    --body "Status: IN PROGRESS
Agent: This Agent (session abc123)
Module: Job
Work: Testing Job scheduling, queue processing, monitoring
Expected: 30 tests, 20% coverage"

# Step 4: Work on Job module tests
# ... write tests ...

# Step 5: Close issue when done
$ gh issue close #126
$ git commit -m "feat: add Job module tests

Closes #126
- Added 30 tests for job scheduling
- Achieved 20% coverage
- All tests passing"
```

## Status Tracking in GitHub

**Always check these labels**:
- `coverage` - All coverage-related work
- `in-progress` - Agent is ACTIVELY working NOW
- `blocked` - Waiting for another agent to fix something
- `completed` - Done, tests passing
- `module-name` - Which module (e.g., `user-module`, `job-module`)

**Title Format**:
```
[AGENT-WORK] ModuleName - Specific Task
```

## What If Multiple Agents Want Same Module?

**Option 1**: Divide the work
```
Agent A comment: "I'll do Actions + Models"
Agent B comment: "I'll do Filament Resources + tests"
```
→ Update issue title and continue

**Option 2**: One agent waits
```
Agent B comment: "I see you're on this. I'll start Job module instead."
```
→ Agent B creates new issue for Job

**Option 3**: Work sequentially on same module
```
Agent A: "ETA 2 hours. Then it's yours."
Agent B: "Got it. I'll start Seo meanwhile."
```
→ Both create issues, different modules

## The Bottom Line

**GitHub Issues are the synchronization layer between AI agents.**

Without them: Chaos, collisions, wasted work
With them: Parallel execution, clear communication, 2x+ productivity

**Check GitHub Issues.** It's that important.

---

**Status**: Rule active 🚨
**Violations**: Immediately leads to wasted agent time
**Compliance**: 100% required for team coordination
