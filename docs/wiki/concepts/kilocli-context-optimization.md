# Kilo CLI Context Optimisation

## Problem
The Kilo CLI (Kilocode plugin) aborts immediately on startup with:
```
This endpoint's maximum context length is 256000 tokens.
However, you requested about 424983 tokens (358454 of text input, 56529 of tool input, 10000 in the output).
```

## Root Cause Analysis
Investigation revealed that the excessive token count was **not** primarily from the `.agents` directory (only 8.6M), but from:
- Large lock files: `package-lock.json` (452M node_modules), `pnpm-lock.yaml`, `composer.lock`
- Third-party notices: `node_modules/playwright*/ThirdPartyNotices.txt` (~1.5M each)
- Build artifacts and cached data
- Ruflo directory (727M) containing extensive AI orchestration data

## Solution
Created a `.kiloignore` file at the repository root to exclude heavy/unnecessary directories and files from Kilo's context scanning:

```bash
# Kilo CLI context optimisation — exclude heavy/unnecessary files
# Generated 2026-05-08

# Dependencies (huge lock files, binaries)
node_modules/
*/node_modules/
*/package-lock.json
*/pnpm-lock.yaml
*/yarn.lock
*/composer.lock

# Ruflo (727M — not needed for Kilo context)
ruflo/
ruflo/**/node_modules/

# Agents dir (8.6M of AI artifacts, transcripts, JSON)
bashscripts/ai/.agents/

# Build / dist artifacts
dist/
build/
out/
.cache/
.turbo/

# Logs and output dumps
*.log
*.txt
phpstan_output.txt
report.txt

# Playwright third-party notices (large text)
**/ThirdPartyNotices.txt

# Large data files
public_html/data/tickets_big.json
public_html/data/*.json

# PDF / docs dumps
bashscripts/pdf/

# Vendor dirs
**/vendor/
laravel/vendor/

# QMD cache
.cache/qmd-*
.qmd/
```

## Verification
After adding `.kiloignore`:
1. Restart the Kilo CLI session
2. Confirm startup completes without context length errors
3. Monitor token usage via CLI diagnostics if available

## Related Rules
- [Context Compression Discipline](../rules/context-compression-discipline.md)
- [Second Brain — Always First](../rules/second-brain-always-first.md)
- [No Absolute Paths in Config](../rules/no-absolute-paths-in-config.md)

## Implementation Notes
- The `.kiloignore` follows `.gitignore` patterns
- Exclusions are safe for Kilo's purpose (prompt/context building)
- Ruflo and `.agents` excluded as they contain AI metadata not needed for code context
- Lock files and binaries excluded as they bloat context without adding semantic value