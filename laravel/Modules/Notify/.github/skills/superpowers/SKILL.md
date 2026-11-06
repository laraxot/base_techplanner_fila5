# 🦸 Superpowers Framework Skill

> **Version**: 1.0.0  
> **Last Updated**: 2026-03-31  
> **Status**: ✅ Active

---

## 📋 Overview

This skill provides automated assistance for using the Superpowers agentic framework in the FixCity platform.

---

## 🎯 Capabilities

### 1. Workflow Guidance

**What it does**:
- Guides through complete Superpowers workflow
- Triggers appropriate skills based on context
- Ensures TDD adherence
- Manages git worktrees

**When to use**:
- Starting new feature development
- Bug fixing sessions
- Code review requests
- Planning sessions

**Example**:
```bash
# Trigger phrases:
- "help me plan this feature"
- "let's use TDD for this"
- "I need to debug this issue"
- "review my code"
- "I'm done with this branch"
```

---

### 2. TDD Enforcement

**What it does**:
- Ensures tests are written FIRST
- Enforces RED-GREEN-REFACTOR cycle
- Validates test coverage
- Tracks test metrics

**Process**:
```
RED:   Write failing test
  ↓
GREEN: Write minimal code to pass
  ↓
REFACTOR: Improve code quality
  ↓
COMMIT: Save with passing tests
```

**Example**:
```php
// 1. RED - Test first
it('creates activity', function () {
    $activity = Activity::create([...]);
    expect($activity)->toBeInstanceOf(Activity::class);
});
// ❌ FAILS: Activity model doesn't exist

// 2. GREEN - Minimal implementation
class Activity extends BaseModel {
    protected $fillable = ['type', 'metadata'];
}
// ✅ PASSES

// 3. REFACTOR - Add scopes, traits
public function scopeRecent($query) {
    return $query->where('created_at', '>=', now()->subDays(30));
}
// ✅ STILL PASSES
```

---

### 3. Systematic Debugging

**What it does**:
- Structured debugging approach
- Root cause analysis
- Hypothesis testing
- Verified fixes

**Process**:
```
1. Reproduce: Create minimal reproduction
2. Isolate: Narrow down the cause
3. Hypothesize: Form theory
4. Test: Verify hypothesis
5. Fix: Apply targeted fix
6. Verify: Ensure it works
```

**Example**:
```
Issue: "User creation fails"
  ↓
1. Reproduce: User::create() in tinker → Error
2. Isolate: Check migration, model, fillable
3. Hypothesize: Missing 'email' column
4. Test: DESCRIBE users → Confirmed
5. Fix: Add email column
6. Verify: User::create() works ✅
```

---

### 4. Git Worktree Management

**What it does**:
- Creates isolated workspaces
- Manages feature branches
- Cleanup after merge

**Commands**:
```bash
# Create worktree
git worktree add -b feature/my-feature ../worktrees/my-feature

# List worktrees
git worktree list

# Remove worktree
git worktree remove ../worktrees/my-feature
```

**Benefits**:
- Clean main branch
- Parallel development safe
- Easy rollback

---

## 📁 File Locations

### Documentation

| File | Purpose | Location |
|------|---------|----------|
| `README.md` | Main documentation | `docs/superpowers/` |
| `installation.md` | Setup guide | `docs/superpowers/` |
| `workflow.md` | Workflow details | `docs/superpowers/` |
| `skills-reference.md` | All skills | `docs/superpowers/` |
| `INDEX.md` | Quick reference | `docs/superpowers/` |

### Configuration

| File | Purpose | Location |
|------|---------|----------|
| `superpowers-config.json` | Optional config | `.cursor/` |
| `superpowers.md` | AI memory | `.qwen/` |

---

## 🔧 Usage Examples

### Example 1: New Feature Planning

**User**: "I want to add a notification system"

**Skill Response**:
1. Activate `brainstorming` skill
2. Ask clarifying questions:
   - What notification types?
   - Which channels (email, SMS, push)?
   - User preferences?
3. Present design document
4. Wait for validation
5. Activate `writing-plans` skill
6. Break into tasks
7. Begin TDD execution

---

### Example 2: Bug Fix

**User**: "The login page is broken"

**Skill Response**:
1. Activate `systematic-debugging` skill
2. Reproduce issue
3. Isolate root cause
4. Form hypothesis
5. Test hypothesis
6. Create fix plan
7. Execute with TDD
8. Verify fix

---

### Example 3: Code Review

**User**: "Review my changes"

**Skill Response**:
1. Activate `requesting-code-review` skill
2. Present changes
3. Link to original plan
4. Show test results
5. Two-stage review:
   - Stage 1: Spec compliance
   - Stage 2: Code quality
6. Address feedback
7. Re-review if needed

---

## 🚫 Common Mistakes

### Mistake 1: Skipping TDD

```php
// ❌ WRONG - Code first
User::create(['name' => 'Test']);
// Now write test to prove it works

// ✅ CORRECT - Test first
it('creates user', function () {
    $user = User::create(['name' => 'Test']);
    expect($user)->toBeInstanceOf(User::class);
});
// ❌ FAILS initially, then implement
```

---

### Mistake 2: Too Large Tasks

```markdown
# ❌ WRONG - Too big
Task: "Create user system" (4 hours)

# ✅ CORRECT - Small tasks
Task 1: Create users migration (5 min)
Task 2: Create User model (5 min)
Task 3: Write user tests (10 min)
Task 4: Create user actions (10 min)
```

---

### Mistake 3: Skipping Worktrees

```bash
# ❌ WRONG - Work on main
git checkout main
# Make changes directly

# ✅ CORRECT - Use worktree
git worktree add -b feature/user-system ../worktrees/user-system
cd ../worktrees/user-system
# Work in isolation
```

---

## 📊 Troubleshooting

### Issue: Skills Not Triggering

**Symptoms**: Agent responds normally, doesn't use Superpowers

**Solutions**:
1. Verify installation: `/plugin list`
2. Restart Cursor
3. Use trigger phrases: "help me plan", "let's debug"
4. Check `.cursor/superpowers-config.json`

---

### Issue: Tests Not Running

**Symptoms**: TDD skill doesn't execute tests

**Solutions**:
```bash
# Verify test framework
php artisan test --version

# Run manually
php artisan test

# Check configuration
cat phpunit.xml
```

---

### Issue: Worktree Creation Fails

**Error**: `fatal: 'xxx' is already a worktree root`

**Solutions**:
```bash
# List existing worktrees
git worktree list

# Remove stale
git worktree prune

# Try again
git worktree add -b feature/my-feature ../worktrees/my-feature
```

---

## 🔗 Related Skills

### Internal Skills

- [`test-driven-development`](test-driven-development.md) - TDD guide
- [`systematic-debugging`](systematic-debugging.md) - Debugging skill
- [`git-workflow`](git-workflow.md) - Git best practices

### External Skills

- [Superpowers GitHub](https://github.com/obra/superpowers)
- [Superpowers Discord](https://discord.gg/superpowers)

---

## 📝 Maintenance

### Update Schedule

- **Weekly**: Check for plugin updates (`/plugin update superpowers`)
- **Monthly**: Review workflow effectiveness
- **Quarterly**: Update custom skills
- **Annually**: Full workflow audit

### Contributing

1. Fork Superpowers repository
2. Create branch: `feature/my-skill`
3. Write skill following guide
4. Test thoroughly
5. Submit PR

---

## 📞 Support

- **Slack**: #superpowers
- **GitHub Issues**: https://github.com/obra/superpowers/issues
- **Documentation**: `docs/superpowers/`

---

**Maintainer**: Development Team  
**Status**: ✅ Active  
**Last Review**: 2026-03-31  
**Next Review**: 2026-06-30
