---
name: multi-agent-collaboration
description: "Coordinates work with multiple AI agents on the same codebase. Activates when multiple agents are working simultaneously, when checking for conflicts, when declaring intentions, when communicating progress, or when coordinating via GitHub issues/discussions."
license: MIT
metadata:
  author: fixcity
  version: 1.0
---

# Multi-Agent AI Collaboration

## When to Apply

Activate this skill when:

- Multiple AI agents are working on the same codebase
- Checking what other agents are doing
- Declaring your intentions before starting work
- Communicating progress to other agents
- Coordinating via GitHub issues or discussions
- Resolving conflicts between agents
- Cross-verifying other agents' work
- Onboarding new AI agents

## CRITICAL: Multi-Agent is a STRENGTH

**Multiple AI agents (Qwen, Claude, Cursor, Copilot, etc.) work on this codebase simultaneously.**

**This is a SUPERPOWER, not a weakness!** 🚀

### Advantages

- ✅ **Parallel Work**: Multiple tasks completed simultaneously
- ✅ **Diverse Perspectives**: Different agents bring different insights
- ✅ **Cross-Verification**: Agents verify each other's work
- ✅ **Specialization**: Agents focus on their strengths
- ✅ **24/7 Progress**: Work continues even when one agent is offline

## Coordination Framework

### 0. YOLO / Autonomy-First by Default

Unless the task is explicitly interactive, agents should operate in **YOLO mode**:

- execute the next clear step immediately
- make reasonable assumptions locally
- record decisions in docs/issues/discussions after acting
- interrupt the flow only for destructive actions, missing permissions, or unclear high-risk choices

This repository treats multi-agent autonomy as a force multiplier, not a risk to be minimized.

### 1. CHECK BEFORE STARTING ⚠️

**ALWAYS** check what other agents are doing:

```bash
# Check recent commits
git log --oneline -20 --all

# Check open issues
gh issue list --state open

# Check recent activity
gh run list --limit 10
```

**Why**: Avoid duplicate work and conflicts.

### 2. DECLARE YOUR INTENTIONS 📢

**BEFORE** starting work, declare on GitHub issue:

```markdown
🤖 **Agent**: [Your Name/Type]
**Task**: [What you'll work on]
**ETA**: [Estimated completion]
**Branch**: [Branch you'll use]
**Coordination**: [How you'll coordinate]
```

**Example**:
```markdown
🤖 **Agent**: Qwen-Code
**Task**: Fix sync_remote_repo.sh unbound variable errors
**ETA**: 30 minutes
**Branch**: dev (direct)
**Coordination**: Will comment progress every 10 minutes
```

**Why**: Other agents can avoid conflicts and offer help.

### 3. WORK IN SMALL INCREMENTS 🔄

**DO**:
- ✅ Small, focused commits
- ✅ Frequent pushes (every 5-10 minutes)
- ✅ Clear commit messages
- ✅ Test before each push

**DON'T**:
- ❌ Large, monolithic commits
- ❌ Work for hours without pushing
- ❌ Vague commit messages
- ❌ Push untested code

**Why**: Small increments make it easier for other agents to:
- Understand your progress
- Merge their work with yours
- Catch issues early
- Offer help if needed

### 4. COMMUNICATE PROGRESS 📡

**DURING** work, communicate progress:

**Every 10-15 minutes**:
```markdown
**Progress Update**:
- ✅ Completed: [what's done]
- 🔄 In Progress: [what you're working on]
- ⏳ Next: [what's next]
- 🆘 Help Needed: [if you need help]
```

**When Blocked**:
```markdown
🛑 **BLOCKED**:
- Issue: [what's blocking you]
- Tried: [what you've tried]
- Need: [what you need to unblock]
```

**When Complete**:
```markdown
✅ **COMPLETE**:
- Task: [what was completed]
- Files Changed: [list of files]
- Testing: [how it was tested]
- Next Steps: [what needs to be done next]
```

**Why**: Keeps all agents synchronized and enables collaboration.

### 5. DOCUMENT EVERYTHING 📚

**ALWAYS** document your work:

**For Scripts**:
- Create/update `bashscripts/docs/[category]/[script].md`
- Include usage examples
- Document known issues
- Add troubleshooting section

**For Workflows**:
- Update `.github/` AND `bashscripts/ai/.github/`
- Document in `docs/GITHUB_ACTIONS.md`
- Note any secrets required

**For Rules**:
- Update `AGENTS.md`
- Update `.windsurfrules`
- Save memories for future reference

**Why**: Other agents (and future you) need to understand your work.

## Agent Teams

### Current Teams

| Team | Focus | Status |
|------|-------|--------|
| **Sync** | sync_remote_repo.sh | ✅ Stable |
| **Actions** | GitHub Actions fixes | 🔄 In Progress |
| **Docs** | Documentation | ✅ Active |
| **SemVer** | Semantic versioning | ⏳ Planned |

### How to Join a Team

1. **Check Open Issues**: See what needs work
2. **Choose a Team**: Based on your skills/interests
3. **Comment on Issue**: Declare you're joining
4. **Start Work**: Follow coordination framework
5. **Report Progress**: Keep team updated

## Communication Channels

### GitHub Issues

**Use for**:
- Task tracking
- Bug reports
- Feature requests
- Progress updates

**Best Practices**:
- Use clear titles
- Add labels (bug, enhancement, help-wanted)
- Link related issues
- Comment frequently

### GitHub Discussions

**Use for**:
- Announcements
- Questions
- Decisions
- Brainstorming

**Best Practices**:
- Use appropriate categories
- Tag relevant people
- Summarize decisions
- Link to issues

### Git Commits

**Use for**:
- Code changes
- Documentation updates
- Configuration changes

**Best Practices**:
- Conventional commits (`type: description`)
- Small, focused commits
- Clear messages
- Reference issues (`fixes #123`)

## Conflict Resolution

### When Conflicts Occur

1. **Stop**: Don't push conflicting changes
2. **Communicate**: Comment on the issue
3. **Coordinate**: Work together to resolve
4. **Merge**: One agent merges, others rebase
5. **Test**: Verify merged changes work

### Example Scenario

**Problem**: Two agents fix the same file differently

**Solution**:
```markdown
Agent A: "I see you're also working on sync_remote_repo.sh. 
          I've fixed the unbound variable issue. Can you review?"

Agent B: "Thanks! I was fixing the SSH authentication. 
          Let me rebase on your changes and test both fixes."

Agent A: "Great! I'll wait for your test results before pushing."

Agent B: "Tests passed! Both fixes work together. Pushing now."
```

**Result**: Both fixes merged, tested, and working!

## Best Practices

### DO ✅

1. **Check First**: Always check what others are doing
2. **Declare Intentions**: Say what you'll work on
3. **Small Commits**: Work in small increments
4. **Frequent Pushes**: Push every 5-10 minutes
5. **Document Everything**: Docs as you go
6. **Communicate Progress**: Regular updates
7. **Help Others**: Offer help when blocked
8. **Verify Work**: Cross-check other agents' work

### DON'T ❌

1. **Don't Duplicate**: Check before starting
2. **Don't Work in Silence**: Communicate frequently
3. **Don't Large Commits**: Keep them small
4. **Don't Hoard Work**: Share and collaborate
5. **Don't Skip Docs**: Document everything
6. **Don't Ignore Others**: Respond to comments
7. **Don't Force Push**: Coordinate with others
8. **Don't Skip Testing**: Test before pushing

## Success Story: 2026-03-13 Sync Fix

**Challenge**: sync_remote_repo.sh had multiple errors

**Multi-Agent Solution**:
1. **Agent A** (Qwen): Fixed unbound variables
2. **Agent B** (Claude): Fixed SSH authentication
3. **Agent C** (Cursor): Created test plan
4. **All Agents**: Cross-verified and tested

**Result**: ✅ All errors fixed, bidirectional sync working!

**Key Success Factors**:
- Clear communication via issues
- Small, focused commits
- Frequent pushes
- Cross-verification
- Comprehensive documentation

## Tools

### Check Recent Activity

```bash
# Recent commits
git log --oneline -20 --all

# Open issues
gh issue list --state open

# Recent runs
gh run list --limit 10

# Check who's working
gh issue list --state open --label "in-progress"
```

### Declare Work

```bash
# Comment on issue
gh issue comment <number> --body "🤖 Starting work on..."

# Create new issue
gh issue create --title "Task: [description]"
```

### Communicate Progress

```bash
# Update issue
gh issue comment <number> --body "**Progress Update**: ..."

# Create discussion
gh api graphql -F query='...'
```

## Related Resources

- [docs/MULTI_AGENT_COLLABORATION.md](../../../docs/MULTI_AGENT_COLLABORATION.md) - Complete guide
- [docs/AI_AGENT_TEAMS.md](../../../docs/AI_AGENT_TEAMS.md) - Team organization
- [Issue #12](https://github.com/laraxot/base_fixcity_fila5/issues/12) - AI Agent Collaboration
- [AGENTS.md](../../../AGENTS.md) - Agent guidelines
- [.windsurfrules](../../../.windsurfrules) - IDE rules

## Common Pitfalls

- ❌ Starting work without checking what others are doing
- ❌ Working in silence without communication
- ❌ Large commits that are hard to review
- ❌ Not documenting work as you go
- ❌ Ignoring other agents' comments
- ❌ Duplicate work on same task
- ❌ Conflicting changes without coordination
- ❌ Not cross-verifying other agents' work
