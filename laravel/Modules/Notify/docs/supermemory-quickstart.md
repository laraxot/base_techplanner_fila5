---
title: "SuperMemory - AI Memory Infrastructure"
type: concept
tags: [supermemory, quickstart]
created: 2026-07-14
updated: 2026-07-14
qmd: "supermemory-quickstart supermemory - ai memory infrastructure"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./00-index-1.md"
  - "./00-index-2.md"
  - "./00-index.md"
  - "./absolute-completion-100.md"
  - "./acronym-naming-conventions-1.md"
  - "./acronym-naming-conventions-2.md"
  - "./acronym-naming-conventions.md"
  - "./action-plan-immediate.md"
---

# SuperMemory - AI Memory Infrastructure

**Project**: FixCity Platform  
**Last Updated**: 2026-04-09  
**API Key**: Configured (sm_BzH3Cugxk1hMDm5V1EHC2N_...)  
<<<<<<< .merge_file_myN9rX
**Container Tag**: `fixcity`  
=======
<<<<<<< .merge_file_gNUcXq
**Container Tag**: `fixcity`  
=======
>>>>>>> .merge_file_Vd0PQC
**Container Tag**: `ptv`  
>>>>>>> .merge_file_4xffRa
**User**: marco.sottana@gmail.com (Xot org)

## Overview

SuperMemory is the long-term and short-term memory and context infrastructure for AI agents. It provides persistent memory across conversations, semantic search, and knowledge graph capabilities.

**Master MCP Docs**: [Project MCP Servers](../../../docs/mcp-servers.md)

## Quick Start

### Verify Authentication
```bash
supermemory whoami
```

Expected output:
```
User:  marco.sottana@gmail.com
Org:   Xot (BzH3Cugxk1hMDm5V1EHC2N)
Plan:  free
Auth:  api-key (sm_BzH3Cugxk1hMDm5V1EHC2N_Jr9N****)
```

### Add Project Context
```bash
<<<<<<< .merge_file_myN9rX
cd /var/www/_bases/base_fixcity_fila5
supermemory add --tag fixcity --file .supermemory/fixcity-context.md
=======
<<<<<<< .merge_file_gNUcXq
cd /var/www/_bases/base_fixcity_fila5
supermemory add --tag fixcity --file .supermemory/fixcity-context.md
=======
>>>>>>> .merge_file_Vd0PQC
cd /var/www/_bases/base_ptv_fila5
supermemory add --tag ptv --file .supermemory/ptv-context.md
>>>>>>> .merge_file_4xffRa
```

### Search Memories
```bash
<<<<<<< .merge_file_myN9rX
supermemory search "FixCity architecture" --tag fixcity
supermemory search "Laravel Filament patterns" --tag fixcity
supermemory search "theme build process" --tag fixcity
=======
<<<<<<< .merge_file_gNUcXq
supermemory search "FixCity architecture" --tag fixcity
supermemory search "Laravel Filament patterns" --tag fixcity
supermemory search "theme build process" --tag fixcity
=======
>>>>>>> .merge_file_Vd0PQC
supermemory search "FixCity architecture" --tag ptv
supermemory search "Laravel Filament patterns" --tag ptv
supermemory search "theme build process" --tag ptv
>>>>>>> .merge_file_4xffRa
```

### Get Profile
```bash
<<<<<<< .merge_file_myN9rX
supermemory profile --tag fixcity --query "project preferences"
=======
<<<<<<< .merge_file_gNUcXq
supermemory profile --tag fixcity --query "project preferences"
=======
>>>>>>> .merge_file_Vd0PQC
supermemory profile --tag ptv --query "project preferences"
>>>>>>> .merge_file_4xffRa
```

## Core Commands

| Command | Description | Example |
|---------|-------------|---------|
<<<<<<< .merge_file_myN9rX
| `add` | Ingest content and extract memories | `supermemory add --tag fixcity --file docs/mcp-servers.md` |
| `search` | Search memories semantically | `supermemory search "ticket workflow" --tag fixcity` |
| `remember` | Store a specific memory | `supermemory remember "All models extend XotBaseModel" --tag fixcity` |
| `forget` | Remove a specific memory | `supermemory forget <memory-id>` |
| `update` | Update an existing memory | `supermemory update <memory-id> --content "..."` |
| `profile` | Get user/project profile | `supermemory profile --tag fixcity --query "preferences"` |
=======
<<<<<<< .merge_file_gNUcXq
| `add` | Ingest content and extract memories | `supermemory add --tag fixcity --file docs/mcp-servers.md` |
| `search` | Search memories semantically | `supermemory search "ticket workflow" --tag fixcity` |
| `remember` | Store a specific memory | `supermemory remember "All models extend XotBaseModel" --tag fixcity` |
| `forget` | Remove a specific memory | `supermemory forget <memory-id>` |
| `update` | Update an existing memory | `supermemory update <memory-id> --content "..."` |
| `profile` | Get user/project profile | `supermemory profile --tag fixcity --query "preferences"` |
=======
| `add` | Ingest content and extract memories | `supermemory add --tag ptv --file docs/mcp-servers.md` |
| `search` | Search memories semantically | `supermemory search "ticket workflow" --tag ptv` |
| `remember` | Store a specific memory | `supermemory remember "All models extend XotBaseModel" --tag ptv` |
| `forget` | Remove a specific memory | `supermemory forget <memory-id>` |
| `update` | Update an existing memory | `supermemory update <memory-id> --content "..."` |
| `profile` | Get user/project profile | `supermemory profile --tag ptv --query "preferences"` |
>>>>>>> .merge_file_4xffRa
>>>>>>> .merge_file_Vd0PQC
| `tags` | Manage container tags | `supermemory tags list` |
| `docs` | Manage documents | `supermemory docs list` |

## FixCity Use Cases

### 1. Project Context Persistence
Store project architecture decisions:
```bash
<<<<<<< .merge_file_myN9rX
supermemory add --tag fixcity --content "FixCity uses Nwidart modules + Laraxot extensions. All models extend XotBaseModel. Service providers extend XotBaseServiceProvider."
=======
<<<<<<< .merge_file_gNUcXq
supermemory add --tag fixcity --content "FixCity uses Nwidart modules + Laraxot extensions. All models extend XotBaseModel. Service providers extend XotBaseServiceProvider."
=======
>>>>>>> .merge_file_Vd0PQC
supermemory add --tag ptv --content "FixCity uses Nwidart modules + Laraxot extensions. All models extend XotBaseModel. Service providers extend XotBaseServiceProvider."
>>>>>>> .merge_file_4xffRa
```

### 2. Module-Specific Knowledge
Store module patterns:
```bash
<<<<<<< .merge_file_myN9rX
supermemory add --tag fixcity --content "Fixcity module: Ticket model extends XotBaseModel, uses Filament resources for admin, Folio+Volt for frontoffice."
=======
<<<<<<< .merge_file_gNUcXq
supermemory add --tag fixcity --content "Fixcity module: Ticket model extends XotBaseModel, uses Filament resources for admin, Folio+Volt for frontoffice."
=======
>>>>>>> .merge_file_Vd0PQC
supermemory add --tag ptv --content "Fixcity module: Ticket model extends XotBaseModel, uses Filament resources for admin, Folio+Volt for frontoffice."
>>>>>>> .merge_file_4xffRa
```

### 3. Theme Conventions
Store theme development patterns:
```bash
<<<<<<< .merge_file_myN9rX
supermemory add --tag fixcity --content "Sixteen theme: Bootstrap Italia classes replicated with Tailwind @apply. Vite outDir: './public', then npm run copy to public_html/themes/Sixteen/."
=======
<<<<<<< .merge_file_gNUcXq
supermemory add --tag fixcity --content "Sixteen theme: Bootstrap Italia classes replicated with Tailwind @apply. Vite outDir: './public', then npm run copy to public_html/themes/Sixteen/."
=======
>>>>>>> .merge_file_Vd0PQC
supermemory add --tag ptv --content "Sixteen theme: Bootstrap Italia classes replicated with Tailwind @apply. Vite outDir: './public', then npm run copy to public_html/themes/Sixteen/."
>>>>>>> .merge_file_4xffRa
```

### 4. Development Workflows
Store build processes:
```bash
<<<<<<< .merge_file_myN9rX
supermemory remember "After ANY CSS/JS change in theme: cd Themes/Sixteen && npm run build && npm run copy" --tag fixcity
=======
<<<<<<< .merge_file_gNUcXq
supermemory remember "After ANY CSS/JS change in theme: cd Themes/Sixteen && npm run build && npm run copy" --tag fixcity
=======
>>>>>>> .merge_file_Vd0PQC
supermemory remember "After ANY CSS/JS change in theme: cd Themes/Sixteen && npm run build && npm run copy" --tag ptv
>>>>>>> .merge_file_4xffRa
```

### 5. Architectural Decisions
Store reasoning behind decisions:
```bash
<<<<<<< .merge_file_myN9rX
supermemory add --tag fixcity --content "Decision: Use Actions over Services for business logic. Rationale: Queueable, testable, reusable. Spatie/laravel-queueable-action package."
=======
<<<<<<< .merge_file_gNUcXq
supermemory add --tag fixcity --content "Decision: Use Actions over Services for business logic. Rationale: Queueable, testable, reusable. Spatie/laravel-queueable-action package."
=======
>>>>>>> .merge_file_Vd0PQC
supermemory add --tag ptv --content "Decision: Use Actions over Services for business logic. Rationale: Queueable, testable, reusable. Spatie/laravel-queueable-action package."
>>>>>>> .merge_file_4xffRa
```

## Integration with AI Workflow

### Before Starting Work
```bash
# Get project context
<<<<<<< .merge_file_myN9rX
supermemory profile --tag fixcity --query "FixCity project architecture and conventions"

# Search for relevant patterns
supermemory search "Filament widget patterns" --tag fixcity
=======
<<<<<<< .merge_file_gNUcXq
supermemory profile --tag fixcity --query "FixCity project architecture and conventions"

# Search for relevant patterns
supermemory search "Filament widget patterns" --tag fixcity
=======
supermemory profile --tag ptv --query "FixCity project architecture and conventions"

# Search for relevant patterns
supermemory search "Filament widget patterns" --tag ptv
>>>>>>> .merge_file_4xffRa
>>>>>>> .merge_file_Vd0PQC
```

### During Development
```bash
# Store decisions
<<<<<<< .merge_file_myN9rX
supermemory remember "Added file upload component to CreateTicketWizardWidget using wire:change" --tag fixcity

# Search for similar patterns
supermemory search "file upload Livewire" --tag fixcity
=======
<<<<<<< .merge_file_gNUcXq
supermemory remember "Added file upload component to CreateTicketWizardWidget using wire:change" --tag fixcity

# Search for similar patterns
supermemory search "file upload Livewire" --tag fixcity
=======
supermemory remember "Added file upload component to CreateTicketWizardWidget using wire:change" --tag ptv

# Search for similar patterns
supermemory search "file upload Livewire" --tag ptv
>>>>>>> .merge_file_4xffRa
>>>>>>> .merge_file_Vd0PQC
```

### After Completion
```bash
# Store completed work summary
<<<<<<< .merge_file_myN9rX
supermemory add --tag fixcity --file path/to/session-summary.md
=======
<<<<<<< .merge_file_gNUcXq
supermemory add --tag fixcity --file path/to/session-summary.md
=======
>>>>>>> .merge_file_Vd0PQC
supermemory add --tag ptv --file path/to/session-summary.md
>>>>>>> .merge_file_4xffRa

# Update project context if needed
supermemory update <context-memory-id> --content "Updated architecture..."
```

## Container Tags Strategy

| Tag | Purpose | Example Content |
|-----|---------|-----------------|
<<<<<<< .merge_file_myN9rX
=======
<<<<<<< .merge_file_gNUcXq
>>>>>>> .merge_file_Vd0PQC
| `fixcity` | Project-wide context | Architecture, conventions, decisions |
| `fixcity-{module}` | Module-specific | Module patterns, models, resources |
| `fixcity-{theme}` | Theme-specific | Theme conventions, build process |
| `fixcity-{session}` | Session-specific | Session summary, decisions made |
<<<<<<< .merge_file_myN9rX
=======
=======
>>>>>>> .merge_file_Vd0PQC
| `ptv` | Project-wide context | Architecture, conventions, decisions |
| `ptv-{module}` | Module-specific | Module patterns, models, resources |
| `ptv-{theme}` | Theme-specific | Theme conventions, build process |
| `ptv-{session}` | Session-specific | Session summary, decisions made |
>>>>>>> .merge_file_4xffRa

## Best Practices

1. **Use Descriptive Content**: Be specific about what you're storing
<<<<<<< .merge_file_myN9rX
2. **Tag Consistently**: Always use `fixcity` as base tag
=======
<<<<<<< .merge_file_gNUcXq
2. **Tag Consistently**: Always use `fixcity` as base tag
=======
>>>>>>> .merge_file_Vd0PQC
2. **Tag Consistently**: Always use `ptv` as base tag
>>>>>>> .merge_file_4xffRa
3. **Update Regularly**: Keep memories current with project evolution
4. **Search Before Adding**: Avoid duplicate memories
5. **Use Metadata**: Add metadata for better filtering:
   ```bash
<<<<<<< .merge_file_myN9rX
   supermemory add --tag fixcity --content "..." --metadata '{"type":"architecture","module":"Xot"}'
=======
<<<<<<< .merge_file_gNUcXq
   supermemory add --tag fixcity --content "..." --metadata '{"type":"architecture","module":"Xot"}'
=======
>>>>>>> .merge_file_Vd0PQC
   supermemory add --tag ptv --content "..." --metadata '{"type":"architecture","module":"Xot"}'
>>>>>>> .merge_file_4xffRa
   ```

## Configuration

### MCP Configuration
Located in `laravel/.mcp.json`:
```json
{
  "supermemory": {
    "command": "supermemory",
    "args": [],
    "env": {
      "SUPERMEMORY_API_KEY": "sm_BzH3Cugxk1hMDm5V1EHC2N_..."
    }
  }
}
```

### CLI Configuration
<<<<<<< .merge_file_myN9rX
Located in `~/.supermemory/projects/-var-www-_bases-base_fixcity_fila5/config.json`:
```json
{
  "apiKey": "sm_BzH3Cugxk1hMDm5V1EHC2N_...",
  "containerTag": "fixcity"
=======
<<<<<<< .merge_file_gNUcXq
Located in `~/.supermemory/projects/-var-www-_bases-base_fixcity_fila5/config.json`:
```json
{
  "apiKey": "sm_BzH3Cugxk1hMDm5V1EHC2N_...",
  "containerTag": "fixcity"
=======
Located in `~/.supermemory/projects/-var-www-_bases-base_ptv_fila5/config.json`:
```json
{
  "apiKey": "sm_BzH3Cugxk1hMDm5V1EHC2N_...",
  "containerTag": "ptv"
>>>>>>> .merge_file_4xffRa
>>>>>>> .merge_file_Vd0PQC
}
```

## Troubleshooting

### Authentication Issues
```bash
# Check authentication
supermemory whoami

# Re-authenticate if needed
<<<<<<< .merge_file_myN9rX
supermemory init --api-key YOUR_KEY --container-tag fixcity --scope project
=======
<<<<<<< .merge_file_gNUcXq
supermemory init --api-key YOUR_KEY --container-tag fixcity --scope project
=======
>>>>>>> .merge_file_Vd0PQC
supermemory init --api-key YOUR_KEY --container-tag ptv --scope project
>>>>>>> .merge_file_4xffRa
```

### No Results from Search
- Try broader search terms
<<<<<<< .merge_file_myN9rX
- Verify container tag: `--tag fixcity`
=======
<<<<<<< .merge_file_gNUcXq
- Verify container tag: `--tag fixcity`
=======
>>>>>>> .merge_file_Vd0PQC
- Verify container tag: `--tag ptv`
>>>>>>> .merge_file_4xffRa
- Wait 1-2 minutes after adding content for processing

### Content Not Appearing
- Check file path is correct
- Verify content format (markdown preferred)
- Use `supermemory docs list` to see ingested documents

## Related Documentation

- **Master MCP Docs**: [Project MCP Servers](../../../docs/mcp-servers.md)
- **Xot Module MCP**: [Xot MCP Guide](../../Modules/Xot/docs/mcp-servers.md)
- **Theme MCP**: [Sixteen Theme MCP](../../Themes/Sixteen/docs/mcp-servers.md)
- **SuperMemory Skill**: [.qwen/skills/supermemory/](.qwen/skills/supermemory/)
- **SuperMemory Console**: https://console.supermemory.ai

---

*This document follows DRY+KISS principles. For general MCP server info, see the master doc.*
