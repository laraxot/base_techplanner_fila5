# Agent Directory Optimization

## Overview
On May 4, 2026, the AI agents directory (`bashscripts/ai/.agents`) was optimized to improve agent reactivity, productivity, efficiency, and effectiveness.

## Problem
The `bashscripts/ai/.agents` directory had grown to 128MB, primarily due to:
- Large `node_modules` directory (128MB) containing Playwright, Puppeteer, and other dependencies
- Duplicate files
- Redundant directory structures
- Unnecessary backup and temporary files

This bloat impacted agent startup time and overall performance.

## Solution Applied

### 1. Removed node_modules directory
- The `node_modules` directory was removed from `bashscripts/ai/.agents`
- Agents now use the root `node_modules` directory for dependencies
- This reduced directory size from 128MB to ~7.8MB (94% reduction)

### 2. Applied cleanup procedures
- Removed `*.backup` files (editor/sync debris)
- Cleared skill tmp/ runtime artifacts (screenshots, etc.)
- Found and removed exact duplicates by MD5 hash
- Merged redundant `command/` directory into `commands/`
- Archived old projects under `archive/projects/`

### 3. Documentation
- Updated `README.md` to explain the directory structure and optimization
- Created this wiki entry to document the optimization process

## Results
- Directory size reduced from 128MB to 7.8MB
- Improved agent startup time and reactivity
- Reduced permission prompts through better rule consolidation
- Maintained all essential agent functionality
- No knowledge loss - all critical documentation and configurations preserved

## Related Files
- [OPTIMIZATION_PLAN.md](bashscripts/ai/.agents/OPTIMIZATION_PLAN.md) - Original optimization plan
- [cleanup.sh](bashscripts/ai/.agents/cleanup.sh) - Script used for cleanup
- [backup-before-consolidate.sh](bashscripts/ai/.agents/backup-before-consolidate.sh) - Backup script

## Best Practices Going Forward
- Do not store large dependencies in the agents directory
- Use the root node_modules for any required packages
- Regularly run cleanup procedures to prevent bloat
- Follow the Context Budget guidelines in [CONTEXT_BUDGET.md](bashscripts/ai/.agents/CONTEXT_BUDGET.md)