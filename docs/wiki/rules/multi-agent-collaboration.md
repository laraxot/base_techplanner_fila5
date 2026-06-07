# Multi-Agent Collaboration Rule

**Status**: CRITICAL COORDINATION RULE  
**Last Updated**: 2026-03-05  
**Context**: Multiple AI agents work in parallel on LaravelPizza coverage initiative

---

## 🎯 Core Principle

**ALWAYS assume other agents are working on this repository.**  
**ALWAYS check what's been done before starting work.**  
**ALWAYS use `./docs/chat/` for local inter-agent communication.**
GitHub Issues & Discussions may still be used for remote/project tracking, but they do not replace the local `docs/chat/` message board in this repository.

---

## ✅ Checklist Before Starting Any Work

1. **Check Git History**
   ```bash
   git log --oneline | head -20
   ```
   - Look for recent commits showing what others completed
   - Check if your target module/files were already worked on

2. **Check Local Agent Chat**
   ```bash
   sed -n '1,220p' docs/chat/INDEX.md
   ```
   - Read current claims, blockers, and handoff notes
   - Add your own claim before starting non-trivial work
   - Keep `docs/chat/` updated during and after the task

3. **Check GitHub Issues** (#191-205)
   - Visit issue for your module (e.g., #195 for Meetup)
   - Read comments to see what work is in progress
   - Check for notes from other agents

4. **Check GitHub Discussions**
   - Look for discussion threads about multi-agent coordination
   - See if anyone mentioned what they're working on
   - Share what YOU'RE about to do

5. **Check Coverage Plan**
   ```bash
   head -100 docs/coverage-plan.md
   ```
   - See latest test statistics
   - Identify what's been marked as complete (checkmarks)
   - Find unclaimed work

6. **Review Recent Commits**
   - Look at commit messages to understand patterns
   - See which modules/files were recently touched
   - Avoid working on the same file simultaneously

---

## 📋 Communication Protocol

### BEFORE Starting Work

1. **Open/Update GitHub Issue** for your module
   ```
   Title: [IN PROGRESS] {Module Name} - Test Coverage
   Message: 
   - Starting work on: [specific files/tests]
   - Estimated time: [hours]
   - Expected test count: [number]
   - Avoiding: [files other agents mentioned]
   ```

2. **Check Existing Comments** on issue
   - See if another agent left notes
   - Respect their claimed territory
   - Communicate conflicts in issue comments

### WHILE Working

1. **Update Issue Progress** (every hour if long task)
   - Comment with: "In progress: 30/50 tests done"
   - Note any blockers discovered
   - Call out conflicts if detected

2. **Use Meaningful Commit Messages**
   - Include module name
   - Include file count
   - Example: `test(Meetup): Add 21 action tests for Create/Update/Delete`

### AFTER Completing Work

1. **Update GitHub Issue** with final summary
   ```
   ✅ COMPLETED:
   - Files: [list]
   - Tests added: [count]
   - Pass rate: [%]
   - Next: [what's needed next]
   ```

2. **Update coverage-plan.md**
   - Mark completed sections with checkmarks
   - Note test counts
   - Document blockers

3. **Update Local SQL Database**
   ```sql
   UPDATE todos SET status = 'done' WHERE id = 'your-todo-id';
   ```

---

## 🎯 Conflict Avoidance Strategy

### Choosing What to Work On

**PREFER** (less collision-prone):
1. Modules with 0% coverage (untouched)
2. Different modules than recent commits
3. Sub-modules within a module (e.g., Actions vs Services vs Filament)

**AVOID** (higher collision risk):
1. Modules worked on in last 2 hours
2. Same sub-module type recently touched
3. Files mentioned in open GitHub issue comments

### If Collision Detected

1. **Check Who Got There First**
   - Look at git timestamps
   - Check issue comments timestamps

2. **Communicate on GitHub Issue**
   ```
   @agent-name: I see you're working on CreateEventActionTest.php.
   I was about to work on it too. I'll switch to UpdateEventActionTest instead.
   ```

3. **Merge or Separate**
   - If separate files: both can proceed
   - If same file: one agent continues, other moves to different file
   - One agent can review/improve other's work

---

## 📊 Module Ownership Strategy

To minimize collisions, use this priority for module selection:

**Currently In Heavy Work** (avoid unless specifically assigned):
- Meetup (being tested actively)
- Activity (recent major work)
- Notify (recent major work)

**Good Targets** (likely less conflict):
- UI (partially done, needs Theme model)
- Xot (foundation, low collision risk)
- Tenant (small module, specific work)

**Completed Modules** (verify before touching):
- Activity (mostly 100%)
- Notify (mostly 100%)
- App (100%)

---

## 🔄 Real-Time Coordination

### GitHub Issues as Shared Workspace

Each module has an issue (#192-205):

**Use Comments For:**
- Marking sections as "in progress"
- Announcing blockers
- Asking other agents for help
- Sharing discoveries about test patterns

**Example Comment:**
```
[13:45 UTC] Starting work on Meetup Service tests.
Claiming:
- OrderService tests
- RegistrationService tests
- NotificationService tests

Expected completion: 16:00 UTC
Will update progress every 30 min.
```

### Discord/Async Coordination via Issues

Since agents work asynchronously:
1. Leave comments with timestamps
2. Check comments before starting
3. Assume 30-minute lag for responses
4. Plan work to minimize conflicts

---

## 📝 Documentation Updates

### After Each Session

1. **Update`.cursor/memories/multi-agent-log.md`**
   ```
   ## 2026-03-05 14:30 UTC
   Agent: [your-name]
   Module: Meetup
   Work: Added 21 action tests
   Blockers: None
   Next: Service tests ready
   ```

2. **Update `docs/coverage-plan.md`**
   - Mark completed sections
   - Note test counts
   - Document blockers

3. **Update Relevant Module Docs**
   - `Modules/{Module}/docs/test-progress.md`
   - Add completed test counts
   - Note any pattern discoveries

---

## ⚠️ Common Pitfalls

### ❌ DON'T
- Start work without checking git history
- Commit to same file another agent is working on
- Ignore GitHub issue comments
- Leave work incomplete without documenting status
- Skip marking todos as complete
- Create duplicate test files

### ✅ DO
- Check git log before starting
- Read GitHub issues thoroughly
- Leave comments on issues
- Update coverage-plan.md after work
- Mark todos/issues as complete
- Coordinate in issue comments

---

## 🚀 Scalability Benefits

This approach allows:
- **10+ agents** working simultaneously
- **Minimal merge conflicts** (different files/modules)
- **Clear visibility** of who's doing what (GitHub Issues)
- **No wasted effort** (know what's done)
- **Fast feedback** (see other agents' discoveries)

---

## 📌 Golden Rules

1. **Always check before you code**
2. **Always communicate on GitHub**
3. **Always update coverage-plan.md**
4. **Always mark todos as done**
5. **Assume 30-minute coordination lag**
6. **Prefer untouched modules**
7. **Document blockers immediately**

---

## 🔗 Related Resources

- GitHub Issues: #191 (Epic), #192-205 (Modules)
- Coverage Plan: `docs/coverage-plan.md`
- Test Patterns: `.cursor/rules/pest-testing-patterns.md`
- Skills: `.cursor/skills/pest-test-generation-skill.md`
- Log: `.cursor/memories/multi-agent-log.md`

---

**Status**: Active  
**Participants**: Multiple AI Agents  
**Target**: 100% coverage, 2,000+ tests  
**Success Rate**: 2,866/2,967 tests passing (96.6%)
