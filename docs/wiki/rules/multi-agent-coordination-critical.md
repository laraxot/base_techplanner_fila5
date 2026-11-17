# Multi-Agent Coordination (CRITICAL)

## Rule

**ALWAYS use `./docs/chat/` to coordinate locally with other AI agents working on this project.** Do NOT work in isolation or assume what other agents have completed.

GitHub issues and discussions remain useful for remote tracking, but in this repository they are secondary to the local `docs/chat/` board.

## Implementation

### 1. Before Starting Any Work
1. Read `docs/chat/INDEX.md`
2. Read any task-specific files in `docs/chat/`
3. Add a local claim/status note in `docs/chat/` before non-trivial work
4. Check **GitHub Issues** (open/closed) for similar work when remote tracking is relevant
5. Check **GitHub Discussions** for agent coordination messages when remote tracking is relevant
6. Read comments from other agents on related issues
7. Search for `@agent-*` mentions to see active task assignments

### 2. During Work
- **Update `docs/chat/` proactively** with progress status
- Update issues/discussions when the work is tracked remotely
- Post status updates in comments (e.g., "Working on Action tests for Xot module")
- Mention other agents if your work depends on theirs: `@agent-01` or `@agent-02`
- Link related issues and PRs

### 3. Multi-Agent Communication Pattern
```
Issue: Task X (assigned implicitly to you)
Your comment: "Starting work on Task X. Will coordinate with @agent-01 on database setup."
→ Do work
Your comment: "Completed Task X. Tests passing. Updated coverage-plan.md."
→ Merge/close issue
```

### 4. Common Coordination Scenarios

**Scenario A: Multiple agents on same module**
- Issue #195 (Meetup coverage): Agent-00 works on Actions, Agent-01 works on Models
- In comments: "Agent-00: Working on Action tests", "Agent-01: Waiting for Action tests to complete (dependency)"

**Scenario B: Module dependencies**
- Issue #192 (Xot coverage): Core module that others depend on
- Xot finishes → Tenant starts → Lang starts → Meetup starts
- Comments track this cascade

**Scenario C: Documentation first**
- Before code changes, create an issue with plan
- Post documentation (`.cursor/rules`, `docs/memory`, `docs/skills`) as comments
- Other agents review before you start implementation

## Key GitHub Resources

- **Epic #191**: 100% Pest Coverage (tracks all module coverage)
- **Issues #192-205**: Individual module coverage tasks
- **Issue #209**: Recent multi-agent status update
- **Issue #208**: Activity module refactoring (Laraxot rules coordination)
- **Issue #206**: Full-project coverage program

## Why This Rule

- Prevents duplicate work (two agents writing same tests)
- Unblocks dependencies (agents know when to start)
- Ensures documentation is coordinated
- Makes progress transparent and auditable
- Allows agents to help each other

## Default Workflow

1. **Read**: Check open issues + discussion messages
2. **Update docs**: Create .cursor/rules, docs/memory, docs/skills first
3. **Comment**: Post plan in relevant issue
4. **Work**: Implement with coordination notes
5. **Close**: Update issue with final status

---

**Last Updated**: 2026-03-05
**Enforcer**: All AI agents
**Critical**: YES - All agents must follow this
