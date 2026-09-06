# BMAD Stories Manifest — All Modules
**Date**: 2026-09-06  
**Status**: Planning Phase  
**Total Modules**: 18  
**Ready Stories**: 5  
**In-Progress**: 2  

---

## Story Queue by Priority

### 🔴 BLOCKING (PHPStan Parse Errors — Bootstrap Blocked)

#### **6.1 Cms: Resolve Git Merge Conflicts + PHPStan**
- **Status**: ready-for-dev
- **Effort**: small
- **Errors**: 16 (all parse/merge markers)
- **Files**: 3 (DownloadAttachmentPlaceHolder.php, 2 test files)
- **Blocker**: YES — prevents full Modules analysis
- **Actions**: Resolve merge markers, verify syntax, phpstan, git sync

---

### 🟡 HIGH (Actionable PHPStan Errors)

#### **5.1 Activity: Fix PHPStan Type Coverage — RedactModelAttributesAction**
- **Status**: ready-for-dev
- **Effort**: trivial
- **Errors**: 1 (typeCoverage.constantTypeCoverage)
- **File**: `app/Actions/RedactModelAttributesAction.php:18`
- **Fix**: Add explicit const type declarations (`const TYPE = value` → `const string TYPE = value`)
- **Blocker**: NO (aggregate metric, may disappear after Cms fix)

#### **5.2 Employee: Fix Deprecated Filament API + Type Coverage**
- **Status**: ready-for-dev
- **Effort**: small
- **Errors**: 1 deprecated + 2 coverage (workflow incomplete)
- **Files**: TimeClockPage.php (form → schema), WorkHour.php (const types)
- **Progress**: form() → schema() DONE, uncommitted changes
- **Blocker**: NO (only blocking Employee tests)

---

### 🟢 MEDIUM (Requires Analysis First)

#### **TBD: Xot Module — Core PHPStan Audit**
- **Status**: awaiting-analysis
- **Modules dependent on it**: 16/18
- **Action**: Run single-module phpstan, catalog errors, create per-file stories

#### **TBD: User Module — User/Profile Contract Migration**
- **Status**: awaiting-analysis
- **Pattern needed**: Replace Quaeris\Profile with Xot\Contracts\ProfileContract
- **Scope**: TBD (need to scan for all usages)
- **Blockers**: Lang module (Profile reference)

#### **TBD: Media Module — Deprecated Filament Methods**
- **Status**: awaiting-analysis
- **Known issues**: getTableActions() deprecated (2 occurrences)
- **Requires**: Filament v5 API migration guide

#### **TBD: Notify Module — PSR-4 Duplicate + PHPStan**
- **Status**: awaiting-analysis
- **Known issue**: Duplicate PSR-4 class file (from merge)
- **Requires**: Dedup, phpstan run

---

## Module Status Matrix

| Module | .git Remote | Changes | Story Count | Status |
|--------|-------------|---------|-------------|--------|
| Activity | laraxot/dev | 0 | 1 ready | analyzing |
| AI | (unknown) | ? | 0 | queued |
| Cms | (unknown) | merge conflicts | 1 ready | **BLOCKING** |
| Employee | laraxot/dev | +9 uncommitted | 1 ready | in-progress |
| Gdpr | (unknown) | ? | 0 | queued |
| Geo | (unknown) | ? | 0 | queued |
| Job | (unknown) | ? | 0 | queued |
| Lang | (unknown) | ? | 0 | queued |
| Media | (unknown) | ? | 1 analysis | queued |
| Notify | (unknown) | ? | 1 analysis | queued |
| Seo | (unknown) | ? | 0 | queued |
| TechPlanner | (unknown) | ? | 0 | queued |
| Tenant | (unknown) | ? | 0 | queued |
| test | (unknown) | ? | 0 | queued |
| TestModule | (unknown) | ? | 0 | queued |
| UI | (unknown) | ? | 0 | queued |
| User | (unknown) | ? | 1 analysis | queued |
| Xot | laraxot/dev | 0 | 1 analysis | core-audit |

---

## Execution Plan — Phase 1 (Session Tomorrow)

### A. Blocker Unblock (Day 1)
1. **[FIRST]** Story 6.1 (Cms): Resolve merge conflicts → git sync
2. Re-run PHPStan global → verify all modules parse
3. Catalog actual errors post-Cms

### B. Quick Wins (Day 1 afternoon)
4. **[PARALLEL]** Stories 5.1 (Activity), 5.2 (Employee) → phpstan verify each
5. Root project git sync (both repo + all modules)

### C. Analysis Phase (Day 2)
6. Single-module phpstan scans for each of 16 remaining modules
7. Create per-module story files
8. Categorize errors by type (deprecated, type-coverage, mixed, etc.)
9. Identify cross-module dependencies

### D. Execution Phase (Days 3+)
10. Assign stories to agents by module owner
11. Parallel execution within non-overlapping modules
12. Cascading: fix base modules (Xot, Tenant, User) → leaf modules

---

## Known Patterns

### Type Coverage (typeCoverage.constantTypeCoverage)
- **Pattern**: Const without explicit type
- **Fix**: `const NAME = 'value'` → `const string NAME = 'value'`
- **Frequency**: Multiple modules (Activity, Employee, others unknown)
- **Story template**: "Add const type declarations in {Module}"

### Deprecated Filament API
- **Pattern**: `->form([...])` on Filter/BaseFilter
- **Fix**: Change to `->schema([...])`
- **Frequency**: Employee (1), Media (suspected), others unknown
- **Story template**: "Migrate {Module} Filament form() → schema()"

### Mixed Types
- **Pattern**: Parameter accepts `mixed`, needs specificity
- **Fix**: Infer actual type from call sites, add union type or narrow
- **Frequency**: Unknown (need full scan)
- **Story template**: "Replace mixed types in {Module}"

### Merge Conflicts (Git)
- **Pattern**: Unresolved `<<<<<<<`, `=======`, `>>>>>>>` markers
- **Fix**: Manually resolve, test syntax, commit
- **Frequency**: Cms (3 files), others unknown
- **Story template**: "Resolve git conflicts in {Module}"

---

## Dependencies & Coordination

### Hard Dependencies (Xot is base)
```
Xot (core) ← everything else
Tenant (core) ← everything else
User (contains ProfileContract migration) ← Lang, potentially others
```

### Soft Dependencies (test/doc references)
- All test files may reference other modules
- Stories should batch by module for git sync efficiency

### Coordination Rules (from Standing Order)
1. **Before editing**: `git fetch && git merge` to coordinate with other agents
2. **After editing**: `phpstan + phpmd + pest + git commit/push`
3. **Lock advisory**: `/bashscripts/lock/` to avoid double-edits
4. **Const type migration**: All mixed → specific types
5. **No ignore**: Never add @phpstan-ignore; fix root cause

---

## Next Steps for Coordinator

1. **Validate Cms story**: Are conflict resolutions correct?
2. **Approve 5.1 & 5.2**: Activity + Employee stories ready?
3. **Trigger Day 1 execution**:
   - Story 6.1: Resolve Cms conflicts
   - Stories 5.1, 5.2: Fix Activity + Employee
   - Verify: `phpstan analyse Modules --no-progress` completes
4. **Day 2 planning**: Scan remaining 15 modules, create stories
5. **Assign to agents**: By module owner + expertise area

---

## Meta: This Document

**Purpose**: Single source of truth for all pending BMAD stories across modules  
**Updated**: 2026-09-06 20:xx UTC  
**Format**: Markdown (version-controllable, grep-friendly)  
**Storage**: `/bmad-output/BMAD_STORIES_MANIFEST_*.md` (archive by date)  
**Integration**: Link from each module's story index or sprint-status.yaml
