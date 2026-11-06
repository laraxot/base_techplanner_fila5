---
name: bashscripts-management
description: "Manages bash scripts organization, structure, and documentation. Activates when creating, organizing, or documenting shell scripts; ensuring scripts are in bashscripts/ folders; verifying script documentation; or when the user mentions bash, shell, scripts, or .sh files."
license: MIT
metadata:
  author: fixcity
  version: 1.0
---

# Bash Scripts Management

## CRITICAL: COMMIT & PUSH RULE

**AFTER EVERY SUCCESSFUL OPERATION**:
- ✅ Script created & tested → `git commit && git push`
- ✅ Documentation created → `git commit && git push`
- ✅ GitHub Action success → `git commit && git push`
- ✅ Configuration changed → `git commit && git push`

**WHY**:
- Unpushed changes = invisible to other AI agents
- GitHub Actions need committed code
- Work isn't done until it's pushed!

**EXAMPLE**:
```bash
# After creating script
git add bashscripts/category/script.sh
git commit -m "feat: Add new script"
git push origin dev

# After GitHub Action success
git add .github/workflows/workflow.yml
git commit -m "ci: Add workflow"
git push origin dev
```

## When to Apply

Activate this skill when:

- Creating new shell scripts (.sh files)
- Organizing existing scripts
- Documenting scripts
- Moving scripts to correct locations
- Verifying script organization
- Cleaning up misplaced scripts

## CRITICAL Rule: Script Location

**ALL .sh files MUST be in `bashscripts/` subfolders**

### ✅ CORRECT Locations

```bash
bashscripts/system/optimization/ollama-optimize-cpu.sh
bashscripts/ai/ai_init.sh
bashscripts/git/git-cleanup.sh
```

### ❌ WRONG Locations (NEVER DO THIS)

```bash
./ollama-optimize-cpu.sh              # Project root - WRONG!
./laravel/cleanup.sh                  # Laravel root - WRONG!
./scripts/build.sh                    # Separate scripts/ folder - WRONG!
```

## Script Organization Structure

### Standard Directory Layout

```
bashscripts/
├── <category>/
│   ├── <script-name>.sh
│   ├── utils/
│   │   └── helper.sh
│   └── docs/
│       ├── README.md           # Category index
│       ├── <script>.md         # Script documentation
│       └── examples/           # Usage examples
├── utils/                       # Shared utilities
│   ├── common.sh
│   ├── logging.sh
│   └── validation.sh
└── docs/
    ├── bashscripts-organization.md
    ├── script-templates.md
    └── best-practices.md
```

### Categories

Common script categories:

- **ai/** - AI tool scripts (ai_init.sh, etc.)
- **system/** - System administration
  - **optimization/** - Performance optimization
- **git/** - Git management
- **database/** - Database operations
- **quality/** - Code quality checks
- **backup/** - Backup scripts
- **deployment/** - Deployment scripts
- **maintenance/** - Maintenance tasks
- **testing/** - Test runners

## Documentation Requirements

### Every Script Must Have

1. **Header Comment** with purpose and usage
2. **Documentation File** in `bashscripts/docs/<category>/`
3. **Usage Examples** in documentation
4. **Prerequisites** listed clearly
5. **Troubleshooting** section

### Script Header Template

```bash
#!/bin/bash
# ==============================================
# SCRIPT NAME - Brief Description
# ==============================================
# Purpose: What this script does
# Usage: How to run it
# Prerequisites: What's needed before running
# Documentation: bashscripts/docs/<category>/<script>.md
# ==============================================

set -euo pipefail

# Rest of script...
```

### Documentation Template

```markdown
# Script Name

**Script**: `bashscripts/<category>/<script>.sh`  
**Purpose**: Brief description  
**Status**: Active/Deprecated  

## Quick Start

```bash
cd bashscripts
./<category>/<script>.sh
```

## Purpose

Detailed explanation of what the script does and why.

## Usage

```bash
# Basic usage
./<category>/<script>.sh

# With options
./<category>/<script>.sh --option value
```

## Prerequisites

- List requirements here

## Examples

Show common use cases.

## Troubleshooting

Common issues and solutions.
```

## Script Best Practices

### Safety

1. **Always use `set -euo pipefail`**
   ```bash
   #!/bin/bash
   set -euo pipefail
   ```

2. **Validate prerequisites**
   ```bash
   require_commands rsync grep find
   ```

3. **Use safe defaults**
   ```bash
   : "${VARIABLE:=default_value}"
   ```

4. **Handle errors gracefully**
   ```bash
   trap 'echo "Error on line $LINENO"' ERR
   ```

5. **If a script is used by GitHub Actions, keep it dual-context safe**
   ```bash
   CI=true SKIP_SUBTREE_BACKUP=1 bash bashscripts/git/subtrees/sync_remote_repo.sh
   ```
   - No mandatory interactive prompts in automation
   - No required writes to `~/.gitconfig`
   - Mirror workflow changes under `bashscripts/ai/.github/workflows/`

### Organization

1. **One script, one purpose**
   - Don't create Swiss Army knife scripts
   - Keep focused and simple

2. **Use shared utilities**
   ```bash
   source "$(dirname "$0")/../utils/common.sh"
   ```

3. **Document as you go**
   - Create docs BEFORE committing script
   - Update docs when changing script

4. **Test before committing**
   - Run script in safe environment
   - Verify all paths work
   - Check error handling

5. **COMMIT & PUSH IMMEDIATELY**
   - After testing succeeds
   - After documentation created
   - Don't leave work uncommitted!

### Naming

1. **Use lowercase with hyphens**
   - ✅ `ollama-optimize-cpu.sh`
   - ❌ `OllamaOptimize.sh`
   - ❌ `ollama_optimize.sh`

2. **Be descriptive**
   - ✅ `cleanup-old-backups.sh`
   - ❌ `cleanup.sh`

3. **Include purpose**
   - ✅ `phpstan-level10-check.sh`
   - ❌ `phpstan.sh`

## Common Operations

### Create New Script

1. **Choose category**
   ```bash
   mkdir -p bashscripts/<category>
   ```

2. **Create script with header**
   ```bash
   cat > bashscripts/<category>/<script>.sh << 'EOF'
   #!/bin/bash
   # Script header...
   EOF
   ```

3. **Make executable**
   ```bash
   chmod +x bashscripts/<category>/<script>.sh
   ```

4. **Create documentation**
   ```bash
   mkdir -p bashscripts/docs/<category>
   # Create docs/<category>/<script>.md
   ```

5. **Test locally**
   ```bash
   bash -n bashscripts/<category>/<script>.sh
   ```

6. **COMMIT & PUSH IMMEDIATELY** ⚠️
   ```bash
   git add bashscripts/<category>/<script>.sh
   git commit -m "feat: Add new script"
   git push origin dev
   ```

### Move Misplaced Script

1. **Find misplaced scripts**
   ```bash
   find . -maxdepth 2 -name "*.sh" -not -path "./bashscripts/*"
   ```

2. **Move to correct location**
   ```bash
   mv ./script.sh bashscripts/<category>/script.sh
   ```

3. **Update documentation**
   - Update paths in docs
   - Update references

4. **Test from new location**
   ```bash
   cd bashscripts
   ./<category>/<script>.sh
   ```

5. **COMMIT & PUSH IMMEDIATELY** ⚠️
   ```bash
   git add bashscripts/
   git commit -m "refactor: Move script to bashscripts/"
   git push origin dev
   ```

### Verify Script Organization

```bash
# Check all .sh files are in bashscripts/
find . -name "*.sh" -not -path "./bashscripts/*" -not -path "./node_modules/*" -not -path "./vendor/*"

# Should return nothing!
```

## Integration with AI Tools

### For AI Agents

When working with scripts:

1. **Always check location first**
   - If not in `bashscripts/`, move it
   - Create proper documentation

2. **Use correct paths in documentation**
   - Reference `bashscripts/<category>/<script>.sh`
   - Never reference root-level scripts

3. **Run from correct directory**
   ```bash
   cd bashscripts
   ./<category>/<script>.sh
   ```

4. **COMMIT & PUSH AFTER EVERY SUCCESS** ⚠️
   - After script created
   - After documentation created
   - After GitHub Action success
   - Don't leave work uncommitted!

5. **Respect .github special status**
   - Never create `laravel/.github`
   - Never make `.github` a symlink
   - GitHub Actions won't work otherwise

## Troubleshooting

### Script in Wrong Location

**Problem**: Script found in project root or `laravel/`

**Solution**:
```bash
# Move to bashscripts/
mv ./script.sh bashscripts/<category>/script.sh

# Update any references
grep -r "./script.sh" . --include="*.md"
# Update found references

# COMMIT & PUSH
git add bashscripts/
git commit -m "fix: Move script to correct location"
git push origin dev
```

### Missing Documentation

**Problem**: Script exists but no documentation

**Solution**:
```bash
# Create documentation
mkdir -p bashscripts/docs/<category>
cat > bashscripts/docs/<category>/<script>.md << 'EOF'
# Script Name
...
EOF

# COMMIT & PUSH
git add bashscripts/docs/
git commit -m "docs: Add documentation for script"
git push origin dev
```

### Broken Symlinks

**Problem**: Script uses symlinks that are broken

**Solution**:
```bash
# Check symlinks
find bashscripts -type l -exec test ! -e {} \; -print

# Fix or remove broken symlinks
```

## Related Resources

- [Bash Guide](https://guide.bash.sh/)
- [ShellCheck](https://www.shellcheck.net/)
- [Bash Pitfalls](http://mywiki.wooledge.org/BashPitfalls)
- [bashscripts/docs/](../../../bashscripts/docs/)
- [Git Commit & Push Rule](../../../docs/GIT_COMMIT_PUSH_RULE.md)

## Common Pitfalls

- ❌ Creating scripts in project root
- ❌ Not documenting scripts
- ❌ Using uppercase in script names
- ❌ Not using `set -euo pipefail`
- ❌ Hardcoding paths
- ❌ Not validating prerequisites
- ❌ Creating scripts without clear purpose
- ❌ **NOT COMMITTING & PUSHING after success** ⚠️
