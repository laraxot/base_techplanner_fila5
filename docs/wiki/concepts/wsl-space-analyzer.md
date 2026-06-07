# WSL Space Analyzer & Cleanup Script

## Script Location
`bashscripts/maintenance/wsl-space-analyzer.sh`

## Purpose
WSL-specific disk space analyzer and cleanup tool. Identifies large space hogs
common in WSL environments (AI agent caches, opencode, npm, ollama, Android SDK,
old logs) and safely cleans them.

## Usage

```bash
# Analyze disk usage only (no cleanup)
bash bashscripts/maintenance/wsl-space-analyzer.sh --analyze

# Clean safe caches automatically (npm, apt, logs, tmp)
bash bashscripts/maintenance/wsl-space-analyzer.sh --safe

# Interactive mode — ask before each step
bash bashscripts/maintenance/wsl-space-analyzer.sh

# Deep clean — includes AI server caches, opencode, ollama
bash bashscripts/maintenance/wsl-space-analyzer.sh --deep

# Dry run — preview without deleting
bash bashscripts/maintenance/wsl-space-analyzer.sh --dry-run
```

## Modes

| Mode | Flag | Behavior |
|------|------|----------|
| Analyze | `--analyze` | Shows disk usage breakdown, no cleanup |
| Safe | `--safe` | Auto-cleans safe caches (npm, composer, apt, logs, tmp) |
| Interactive | _(default)_ | Prompts before each cleanup step |
| Deep | `--deep` | Includes AI caches (cursor, windsurf, copilot, claude, codex, etc.) |
| Dry-run | `--dry-run` | Preview without deleting |

## Targets

### Safe caches (cleaned in safe/interactive mode)
- npm cache (`~/.npm`)
- Composer cache (`~/.cache/composer`)
- Puppeteer browsers (`~/.cache/puppeteer`)
- Playwright browsers (`~/.cache/ms-playwright-go`)
- uv Python cache (`~/.cache/uv`)
- node-gyp cache (`~/.cache/node-gyp`)
- TypeScript cache (`~/.cache/typescript`)
- Prisma cache (`~/.cache/prisma`)
- APT package cache (`/var/cache/apt`)
- Old system logs (`/var/log/*.gz`, journal)
- Temp files (`/tmp`)

### Interactive targets (prompted)
- OpenCode cache (`~/.local/share/opencode`, `~/.cache/opencode`)
- qmd search cache (`~/.cache/qmd`)
- pdepend cache (`~/.pdepend`)
- Bun cache (`~/.bun`)

### Deep targets (--deep only)
- AI server caches (cursor, antigravity, codeium, windsurf, copilot, claude, gemini, codex)
- Android SDK
- Ollama AI models

## Related Scripts
- [disk-space-cleanup.sh](../maintenance/disk-space-cleanup.sh) — Generic cleanup script
- [wsl-cleanup.sh](../system/wsl-cleanup.sh) — Legacy WSL cleanup
