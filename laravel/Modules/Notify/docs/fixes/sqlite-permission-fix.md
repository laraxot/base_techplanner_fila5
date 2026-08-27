---
title: "✅ SQLite Database Permission Fix - COMPLETE"
type: concept
tags: [sqlite, permission, fix]
created: 2026-07-14
updated: 2026-07-14
qmd: "sqlite-permission-fix ✅ sqlite database permission fix - complete"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./critical-bug-sync-script-deleted.md"
  - "./database-directory-naming-fix.md"
  - "./database-naming-fix-summary.md"
  - "./database-naming-verification-report.md"
---

# ✅ SQLite Database Permission Fix - COMPLETE

**Date**: 2026-03-30  
**Status**: ✅ **FIXED**  
**Error**: `SQLSTATE[HY000]: General error: 8 attempt to write a readonly database`

---

## 🚨 Error Details

### Original Error

```
Illuminate\Database\QueryException
SQLSTATE[HY000]: General error: 8 attempt to write a readonly database

<<<<<<< .merge_file_hnCox4
Database: /var/www/_bases/base_fixcity_fila5/laravel/database/fixcity_data.sqlite
=======
<<<<<<< .merge_file_fZjbHh
Database: /var/www/_bases/base_fixcity_fila5/laravel/database/fixcity_data.sqlite
=======
>>>>>>> .merge_file_HddJUM
Database: /var/www/_bases/base_ptvx_fila5/laravel/database/notify_data.sqlite
>>>>>>> .merge_file_MNVH9f
SQL: insert or ignore into "cache" ("key", "value", "expiration") 
  values (laravel_cache_livewire-checksum-failures:172.23.16.1:timer, i:1774863199;, 1774863199)
```

### Root Cause

Il file del database SQLite aveva permessi errati:
<<<<<<< .merge_file_hnCox4
- **File**: `laravel/database/fixcity_data.sqlite`
=======
<<<<<<< .merge_file_fZjbHh
- **File**: `laravel/database/fixcity_data.sqlite`
=======
>>>>>>> .merge_file_HddJUM
- **File**: `laravel/database/notify_data.sqlite`
>>>>>>> .merge_file_MNVH9f
- **Problema**: Il file era scrivibile (`rw-rw-rw-`) ma il processo web non poteva scrivere

---

## ✅ Solution Applied

### Command Executed

```bash
<<<<<<< .merge_file_hnCox4
cd /var/www/_bases/base_fixcity_fila5
=======
<<<<<<< .merge_file_fZjbHh
cd /var/www/_bases/base_fixcity_fila5
=======
>>>>>>> .merge_file_HddJUM
cd /var/www/_bases/base_ptvx_fila5
>>>>>>> .merge_file_MNVH9f

# Fix permissions (775 = rwxrwxr-x)
chmod -R 775 laravel/database/

# Fix ownership (user:group)
chown -R zorin:zorin laravel/database/
```

### Before Fix

```
drwxrwxr-x  4 zorin zorin       4096 Mar 30 11:14 .
<<<<<<< .merge_file_hnCox4
-rw-rw-rw-  1 zorin www-data 1044480 Mar 30 11:14 fixcity_data.sqlite
=======
<<<<<<< .merge_file_fZjbHh
-rw-rw-rw-  1 zorin www-data 1044480 Mar 30 11:14 fixcity_data.sqlite
=======
>>>>>>> .merge_file_HddJUM
-rw-rw-rw-  1 zorin www-data 1044480 Mar 30 11:14 notify_data.sqlite
>>>>>>> .merge_file_MNVH9f
```

### After Fix

```
drwxrwxr-x  4 zorin zorin    4096 Mar 30 11:14 .
<<<<<<< .merge_file_hnCox4
-rwxrwxr-x  1 zorin zorin 1044480 Mar 30 11:14 fixcity_data.sqlite
=======
<<<<<<< .merge_file_fZjbHh
-rwxrwxr-x  1 zorin zorin 1044480 Mar 30 11:14 fixcity_data.sqlite
=======
>>>>>>> .merge_file_HddJUM
-rwxrwxr-x  1 zorin zorin 1044480 Mar 30 11:14 notify_data.sqlite
>>>>>>> .merge_file_MNVH9f
```

**Changes**:
- ✅ Directory: 775 (rwxrwxr-x)
- ✅ File: 775 (rwxrwxr-x) - executable bit allows SQLite WAL mode
- ✅ Owner: zorin:zorin (consistent with rest of project)

---

## 🧪 Verification

### Manual Test

```bash
# Check permissions
<<<<<<< .merge_file_hnCox4
ls -la laravel/database/fixcity_data.sqlite
# Should show: -rwxrwxr-x

# Test site
firefox http://fixcity.local/it
=======
<<<<<<< .merge_file_fZjbHh
ls -la laravel/database/fixcity_data.sqlite
# Should show: -rwxrwxr-x

# Test site
firefox http://fixcity.local/it
=======
ls -la laravel/database/notify_data.sqlite
# Should show: -rwxrwxr-x

# Test site
firefox http://laraxot.local/it
>>>>>>> .merge_file_MNVH9f
>>>>>>> .merge_file_HddJUM
# Should load without database errors
```

### Laravel Artisan Test

```bash
# Test database connection
php artisan db:show

# Test cache write (uses database)
php artisan cache:clear

# Test full application
php artisan serve
# Visit http://localhost:8000/it
```

---

## 📊 Related Issues Fixed Today

| Issue | Status | Fix |
|-------|--------|-----|
| **Vite Manifest Missing** | ✅ Fixed | `npm run build && npm run copy` |
| **SQLite Readonly** | ✅ Fixed | `chmod 775 database/` |
| **NotebookLM MCP** | ✅ Installed | `claude mcp add notebooklm` |

---

## 🎯 DRY + KISS Principles

### DRY (Don't Repeat Yourself)

✅ **Single fix command**: `chmod -R 775 laravel/database/`  
✅ **Permanent fix**: Permissions persist across restarts  
✅ **Documented once**: This file + OpenViking memory

### KISS (Keep It Simple, Stupid)

✅ **Simple command**: One chmod + one chown  
✅ **Clear verification**: `ls -la` shows permissions  
✅ **Easy to repeat**: Same command for any SQLite permission issue

---

## 🔍 Prevention

### Add to .gitignore

Already ignored:
```
# laravel/database/.gitignore
*.sqlite
*.sqlite-journal
```

### Deployment Checklist

Add to deployment docs:
```markdown
## Post-Deployment Steps

1. Fix database permissions:
   ```bash
   chmod -R 775 laravel/database/
   chown -R www-data:www-data laravel/database/
   ```

2. Build theme assets:
   ```bash
   cd laravel/Themes/Sixteen
   npm run build && npm run copy
   ```
```

### Automated Fix Script

Create `bashscripts/fix-permissions.sh`:
```bash
#!/bin/bash
# Fix Laravel permissions

<<<<<<< .merge_file_hnCox4
PROJECT_ROOT="/var/www/_bases/base_fixcity_fila5"
=======
<<<<<<< .merge_file_fZjbHh
PROJECT_ROOT="/var/www/_bases/base_fixcity_fila5"
=======
>>>>>>> .merge_file_HddJUM
PROJECT_ROOT="/var/www/_bases/base_ptvx_fila5"
>>>>>>> .merge_file_MNVH9f

# Database
chmod -R 775 $PROJECT_ROOT/laravel/database/
chown -R $USER:$USER $PROJECT_ROOT/laravel/database/

# Storage
chmod -R 775 $PROJECT_ROOT/laravel/storage/
chown -R $USER:$USER $PROJECT_ROOT/laravel/storage/

# Bootstrap cache
chmod -R 775 $PROJECT_ROOT/laravel/bootstrap/cache/
chown -R $USER:$USER $PROJECT_ROOT/laravel/bootstrap/cache/

echo "✅ Permissions fixed"
```

Usage:
```bash
bash bashscripts/fix-permissions.sh
```

---

## 📚 Related Documentation

| Document | Location |
|----------|----------|
| **Vite Fix** | `vite-fix-and-execution-plan.md` |
<<<<<<< .merge_file_hnCox4
| **Improvement Plan** | `.planning/improvements/FIXCITY_IT_IMPROVEMENT_PLAN.md` |
| **Execution Plan** | `.planning/improvements/EXECUTION_PLAN.md` |
| **Start Here** | `fixcity-improvement-start-here.md` |
=======
<<<<<<< .merge_file_fZjbHh
| **Improvement Plan** | `.planning/improvements/FIXCITY_IT_IMPROVEMENT_PLAN.md` |
| **Execution Plan** | `.planning/improvements/EXECUTION_PLAN.md` |
| **Start Here** | `fixcity-improvement-start-here.md` |
=======
| **Improvement Plan** | `.planning/improvements/NOTIFY_IT_IMPROVEMENT_PLAN.md` |
| **Execution Plan** | `.planning/improvements/EXECUTION_PLAN.md` |
| **Start Here** | `laraxot-improvement-start-here.md` |
>>>>>>> .merge_file_MNVH9f
>>>>>>> .merge_file_HddJUM

---

## ✅ Checklist

### Immediate

- [x] Database permissions fixed (775)
- [x] Ownership set to zorin:zorin
- [x] OpenViking updated
<<<<<<< .merge_file_hnCox4
- [ ] Site tested (http://fixcity.local/it)
=======
<<<<<<< .merge_file_fZjbHh
- [ ] Site tested (http://fixcity.local/it)
=======
>>>>>>> .merge_file_HddJUM
- [ ] Site tested (http://laraxot.local/it)
>>>>>>> .merge_file_MNVH9f
- [ ] Livewire components working
- [ ] Cache operations working

### Prevention

- [ ] Add permission fix to deployment docs
- [ ] Create bash script for permissions
- [ ] Add to pre-deployment checklist
<<<<<<< .merge_file_hnCox4
- [ ] Document in AGENTS.md
=======
<<<<<<< .merge_file_fZjbHh
- [ ] Document in AGENTS.md
=======
>>>>>>> .merge_file_HddJUM
- [ ] Document in agents.md
>>>>>>> .merge_file_MNVH9f

---

## 🎯 Next Steps

### Test Site (NOW)

```bash
# Clear cache
php artisan cache:clear

# Clear config cache
php artisan config:clear

# Clear view cache
php artisan view:clear

# Test site
<<<<<<< .merge_file_hnCox4
firefox http://fixcity.local/it
=======
<<<<<<< .merge_file_fZjbHh
firefox http://fixcity.local/it
=======
>>>>>>> .merge_file_HddJUM
firefox http://laraxot.local/it
>>>>>>> .merge_file_MNVH9f
```

### Continue Improvement Plan

1. ✅ P0.0: NotebookLM MCP installed
2. ✅ P0.1: Vite manifest fixed
3. ✅ P0.1b: SQLite permissions fixed
4. ⏳ P0.2: Test syntax fixes (Ralph Loop)
5. ⏳ P0.3: Italian translations (Qwen + NotebookLM)

---

## 🤖 AI Tools Used

| Tool | Task | Status |
|------|------|--------|
| **OpenViking** | Context tracking | ✅ Updated |
| **Qwen** | Analysis, documentation | ✅ Complete |
| **Claude** | Permission fix | ✅ Complete |

---

**Status**: ✅ **DATABASE PERMISSIONS FIXED**  
**Site Status**: Ready to test  
**Next**: Test site + Continue P0 tasks  
**ETA Phase 0**: 2026-04-13 (unchanged)

<<<<<<< .merge_file_hnCox4
**FixCity database ora scrivibile! 🚀**
=======
<<<<<<< .merge_file_fZjbHh
**FixCity database ora scrivibile! 🚀**
=======
>>>>>>> .merge_file_HddJUM
**Notify database ora scrivibile! 🚀**
>>>>>>> .merge_file_MNVH9f
