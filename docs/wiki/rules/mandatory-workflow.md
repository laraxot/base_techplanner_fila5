# MANDATORY WORKFLOW - Post File Modification

## 🚨 CRITICAL RULE - ALWAYS FOLLOW THIS WORKFLOW

After **EVERY** file modification, you **MUST** follow this complete workflow:

### 1. Code Quality Verification

#### PHPStan Level 10
```bash
cd laravel
./vendor/bin/phpstan analyse path/to/modified/file.php --level=10 --memory-limit=-1
```

#### PHPMD (PHP Mess Detector)
```bash
./vendor/bin/phpmd path/to/modified/file.php text cleancode,codesize,design,naming,unusedcode
```

#### PHPInsights
```bash
./vendor/bin/phpinsights analyse path/to/modified/file.php --min-quality=90 --min-complexity=90 --min-architecture=90 --min-style=90
```

### 2. Fix and Recheck Loop

If errors are found:
- Fix the errors
- Re-run all three tools
- Repeat until **PERFECT** (0 errors, all metrics pass)

### 3. Documentation Update

After achieving perfection:
- Study what you learned from the fixes
- Update the module's `docs/` folder with:
  - New patterns discovered
  - Fixes applied
  - Best practices learned
  - Anti-patterns to avoid
- Update theme's `docs/` folder if theme-related

### 4. Git Workflow

Once documentation is updated:
```bash
git add .
git commit -m "type(scope): descriptive message

- Detail 1
- Detail 2
- PHPStan Level 10: ✅ 0 errors
- PHPMD: ✅ Clean
- PHPInsights: ✅ 90+ score"

git push
```

## 📋 Checklist

Use this checklist for every file modification:

- [ ] File modified
- [ ] PHPStan Level 10 executed
- [ ] PHPMD executed
- [ ] PHPInsights executed
- [ ] All errors fixed
- [ ] All tools re-run until perfect
- [ ] Module docs updated
- [ ] Theme docs updated (if applicable)
- [ ] Git commit created
- [ ] Git push executed

## 🎯 Why This Workflow?

1. **Quality Assurance**: Ensures every change meets highest standards
2. **Knowledge Preservation**: Documents patterns and learnings immediately
3. **Team Collaboration**: Clear commit history with quality metrics
4. **Continuous Improvement**: Docs evolve with codebase
5. **Zero Technical Debt**: Problems caught and fixed immediately

## 🚫 Never Skip

**NEVER** skip any step of this workflow. Each step is critical:
- Skip quality checks = Technical debt accumulates
- Skip docs update = Knowledge is lost
- Skip git commit = Changes not tracked
- Skip git push = Work not shared/backed up

## 📖 Related Rules

- [PHPStan Critical Rules](./phpstan_critical_rules.md)
- [Documentation Standards](../../docs/shared/documentation-standards.md)
- [Git Commit Conventions](../../docs/shared/git-conventions.md)

---

**Last Updated**: December 15, 2025
**Status**: MANDATORY - NO EXCEPTIONS
