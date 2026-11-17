# Laraxot Documentation Standards

**Version**: 1.0.0  
**Effective Date**: 2026-03-18  
**Applies To**: All Laraxot modules and themes  
**Enforcement**: PHPStan + Manual Review

---

## Rule 1: Standard Documentation Structure

**Every module MUST have the following structure:**

```
Modules/{ModuleName}/docs/
├── README.md                    # REQUIRED - Module overview
├── architecture/                # REQUIRED - Architectural docs
│   ├── overview.md
│   ├── components.md
│   └── data-flow.md
├── guides/                      # REQUIRED - How-to guides
│   ├── getting-started.md
│   ├── installation.md
│   ├── configuration.md
│   └── extending.md
├── references/                  # REQUIRED - API references
│   ├── api-reference.md
│   ├── database-schema.md
│   ├── configuration-reference.md
│   └── events.md
├── best-practices/              # REQUIRED - Best practices
│   ├── coding-standards.md
│   ├── testing-patterns.md
│   ├── security-considerations.md
│   └── performance-tips.md
└── troubleshooting/             # REQUIRED - Troubleshooting
    ├── common-issues.md
    ├── error-codes.md
    ├── debugging-guide.md
    └── faq.md
```

**Exceptions**: None (all 42 modules must comply)

**Quality Gate**: Module documentation score >= 80/100

---

## Rule 2: README.md Requirements

**Every module README.md MUST contain:**

1. **One-sentence description** - Clear value proposition
2. **Features list** - 3-5 key features with benefits
3. **Installation steps** - Tested, working commands
4. **Configuration options** - Key settings with defaults
5. **Usage example** - Basic code example
6. **Documentation links** - Links to all 5 sections
7. **Testing instructions** - How to run tests
8. **License** - MIT License reference

**Template**: See `.planning/docs-improvement-plan.md` for template

**Quality Gate**: README quality score >= 85/100

---

## Rule 3: Architecture Documentation

**Architecture docs MUST include:**

1. **Overview** - Explains "why" not just "what"
2. **Components** - All major components with responsibilities
3. **Data Flow** - Diagram showing how data moves
4. **Key Decisions** - Table with decisions, rationale, status
5. **Dependencies** - Clear mapping of module dependencies
6. **Scaling Considerations** - How architecture scales
7. **Security Boundaries** - Security considerations

**File Naming**: lowercase kebab-case
- ✅ `data-flow.md`
- ❌ `DataFlow.md`
- ❌ `data_flow.md`

**Quality Gate**: Architecture completeness >= 90%

---

## Rule 4: Guides Must Be Actionable

**All guides MUST:**

1. **Step-by-step instructions** - Numbered steps
2. **Code examples** - For each step
3. **Screenshots** - Where helpful (UI guides)
4. **Common pitfalls** - Call out gotchas
5. **Prerequisites** - What's needed before starting
6. **Expected outcomes** - What success looks like
7. **Troubleshooting tips** - What to do if stuck

**Guide Types**:
- Getting Started (REQUIRED for all modules)
- Installation (if applicable)
- Configuration (REQUIRED for all modules)
- Extending (REQUIRED for all modules)
- User Guides (for user-facing modules)

**Quality Gate**: Guide clarity score >= 80/100

---

## Rule 5: References Must Be Complete

**API Reference MUST include:**

1. **All public methods** - With signatures
2. **Parameters** - Name, type, description, required/optional
3. **Return types** - Type and description
4. **Examples** - Usage example for each method
5. **Exceptions** - What can go wrong

**Database Schema MUST include:**

1. **Table structures** - All columns with types
2. **Relationships** - Foreign keys, constraints
3. **Indexes** - Performance indexes
4. **Sample data** - Example records

**Configuration Reference MUST include:**

1. **All config options** - Complete list
2. **Default values** - What's used if not specified
3. **Valid values** - Range/options for each
4. **Examples** - How to configure

**Events MUST include:**

1. **Event name** - Full event class name
2. **Payload** - All data included
3. **When dispatched** - Trigger condition
4. **Listeners** - Default listeners

**Quality Gate**: Reference completeness = 100%

---

## Rule 6: Best Practices Must Be Specific

**Best practices MUST cover:**

1. **Coding Standards** - Module-specific conventions
   - Naming conventions
   - File organization
   - Code style (beyond Pint)

2. **Testing Patterns** - How to test this module
   - Unit test patterns
   - Integration test patterns
   - Factory usage
   - Mocking strategies

3. **Security Considerations** - Security guidelines
   - Input validation
   - Authorization checks
   - Data encryption
   - Audit logging

4. **Performance Tips** - Optimization guidance
   - Query optimization
   - Caching strategies
   - Batch operations
   - Common bottlenecks

**Quality Gate**: Best practices actionable (yes/no)

---

## Rule 7: Troubleshooting Must Enable Self-Service

**Troubleshooting MUST include:**

1. **Common Issues** - Top 10 issues with solutions
   - Symptom description
   - Root cause
   - Step-by-step fix
   - Prevention tips

2. **Error Codes** - Complete error code reference
   - Error code
   - Meaning
   - Resolution

3. **Debugging Guide** - How to debug issues
   - Tools needed
   - Steps to diagnose
   - Common debug scenarios

4. **FAQ** - Frequently asked questions
   - Question
   - Answer with examples

5. **Maintenance Schedule** - Regular maintenance tasks
   - Task frequency
   - Steps
   - Verification

6. **Rollback Procedures** - How to rollback
   - When to rollback
   - Steps
   - Verification

**Quality Gate**: Self-service success rate >= 70%

---

## Rule 8: Documentation Quality Gates

**After documenting each module, run:**

### Automated Checks

```bash
# Check all links work
npx markdown-link-check docs/**/*.md

# Check spelling
npx cspell docs/**/*.md

# Check formatting
npx prettier --check docs/**/*.md
```

### Manual Review

- [ ] README.md complete (8+ sections)
- [ ] Architecture docs complete (7 sections)
- [ ] Guides actionable (7 elements)
- [ ] References complete (4 types)
- [ ] Best practices specific (4 areas)
- [ ] Troubleshooting enables self-service (6 sections)

### Quality Score Calculation

```
Quality Score = (
  README completeness × 0.15 +
  Architecture completeness × 0.20 +
  Guides completeness × 0.20 +
  References completeness × 0.15 +
  Best practices completeness × 0.15 +
  Troubleshooting completeness × 0.15
)

Target: >= 80/100
```

---

## Rule 9: Documentation Updates

**Documentation MUST be updated when:**

1. **Code changes** - Any feature/bugfix
   - Update affected docs immediately
   - No docs update = PR incomplete

2. **New release** - Every semantic version bump
   - Update changelog
   - Update upgrade guide
   - Review all docs for accuracy

3. **Breaking changes** - API changes
   - Migration guide REQUIRED
   - Deprecation notices
   - Examples updated

4. **Issues reported** - Documentation gaps
   - Fix within 1 week
   - Add to troubleshooting if common

**Review Cadence**:
- Critical modules (Performance, Ptv, Indennita*): Monthly review
- Domain modules: Quarterly review
- Utility modules: Bi-annual review

---

## Rule 10: Documentation Ownership

**Each module MUST have:**

1. **Documentation Owner** - Primary responsible person
   - Named in module README
   - Contact info available
   - Reviews PRs affecting docs

2. **Backup Owner** - Secondary responsible person
   - Available when primary unavailable
   - Cross-trained on module

3. **Review Schedule** - Regular review dates
   - Next review date documented
   - Review checklist available
   - Review history logged

**Documentation Owners Table**:

| Module | Primary Owner | Backup Owner | Next Review |
|--------|--------------|--------------|-------------|
| Xot | [TBD] | [TBD] | 2026-04-18 |
| User | [TBD] | [TBD] | 2026-04-18 |
| Performance | [TBD] | [TBD] | 2026-04-18 |
| ... | ... | ... | ... |

---

## Enforcement

### PHPStan Integration

```neon
# phpstan.neon
parameters:
  laraxot:
    documentation:
      required_sections:
        - README.md
        - architecture/
        - guides/
        - references/
        - best-practices/
        - troubleshooting/
      minimum_quality_score: 80
```

### CI/CD Checks

```yaml
# .github/workflows/docs-check.yml
name: Documentation Quality Check

on: [push, pull_request]

jobs:
  docs:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v5
      
      - name: Check documentation structure
        run: bash scripts/check-docs-structure.sh
      
      - name: Check documentation quality
        run: bash scripts/check-docs-quality.sh
      
      - name: Check broken links
        run: npx markdown-link-check docs/**/*.md
```

### Pre-commit Hook

```bash
#!/bin/bash
# .git/hooks/pre-commit

# Check if modified files include docs
DOCS_CHANGED=$(git diff --cached --name-only | grep -c "docs/")

if [ $DOCS_CHANGED -gt 0 ]; then
  # Run quality checks
  bash scripts/check-docs-quality.sh
  
  if [ $? -ne 0 ]; then
    echo "Documentation quality check failed"
    exit 1
  fi
fi
```

---

## Templates

All documentation templates available in:
- `.planning/docs-improvement-plan.md` - Complete templates
- `laravel/Modules/Xot/docs/` - Reference implementations

---

## Exceptions

**No exceptions allowed** for:
- README.md (all modules must have)
- Architecture documentation (all modules must have)
- Quality score minimum (80/100)

**Temporary exceptions** (max 2 weeks) allowed for:
- Guides (if module in active development)
- References (if API unstable)
- Troubleshooting (if module brand new)

Exception process:
1. Create GitHub Issue explaining exception
2. Get approval from project maintainer
3. Set deadline for compliance
4. Document exception in module README

---

## Metrics

**Track these metrics:**

1. **Coverage**: % of modules with complete docs
   - Target: 100%
   - Current: 29% (12/42)

2. **Quality**: Average quality score
   - Target: 80+/100
   - Current: 58/100

3. **Freshness**: % of docs reviewed in last quarter
   - Target: 100%
   - Current: [TBD]

4. **Usage**: Documentation page views (if hosted)
   - Target: Increasing trend
   - Current: [TBD]

**Reporting**: Monthly report to project maintainers

---

## Resources

- **Laraxot Documentation Standards**: This document
- **Documentation Improvement Plan**: `.planning/docs-improvement-plan.md`
- **Module Audit Report**: `.planning/docs-audit.md`
- **Xot Module Docs**: `laravel/Modules/Xot/docs/` (reference)

---

*Standard created: 2026-03-18*  
*Version: 1.0.0*  
*Owner: AI Agent Team*  
*Next review: 2026-06-18*
