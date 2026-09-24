# SPEC: Improve Prompts in bashscripts/docs/prompts

## Problem

The `bashscripts/docs/prompts/` directory has structural issues that violate DRY and naming conventions: duplicate files (start.md/START.md/start_optimized.md), corrupted file (filament-rules.md.corrupted), inconsistent YAML front matter, date-based filenames, and content duplicated across prompts instead of linked to wiki. This makes prompt maintenance fragile and multi-agent coordination harder.

## Capabilities

- Standardize all prompts with consistent YAML front matter (id, slug, title, description, document_type, category, status, version, language, tags)
- Remove true duplicates (keep canonical version, link others to it)
- Fix corrupted files
- Rename date-based files to kebab-case
- Add BMAD references to all prompts (cross-link to bmad-output docs)
- Link detailed content to wiki instead of embedding in prompts
- Ensure all prompts follow `NN-title-kebab.md` naming
- Ensure all prompts have proper categories and tags

## Constraints

- Forward-only git strategy (no amend/reset)
- Max 6 .md files per module docs folder (from user)
- PHPStan Level 10 compliance
- DRY principle — link to wiki, don't duplicate
- BMAD methodology throughout
- No destructive operations without explicit authorization
- Lock system respected before modifications

## Non-Goals

- Don't change operational logic of prompts (only structure/front matter/links)
- Don't remove prompt content that's still relevant (only true duplicates)
- Don't modify code files (only prompt documentation)
- Don't break existing wiki/IDE junctions
- Don't add new features to prompts (only improve structure)

## Success Metrics

- Zero duplicate files (by content hash)
- All prompts have valid YAML front matter with all required fields
- All prompts link to wiki for detailed content (no inline duplication)
- Zero corrupted files in directory
- All prompts follow `NN-title-kebab.md` naming convention
- Zero broken markdown links in prompts
