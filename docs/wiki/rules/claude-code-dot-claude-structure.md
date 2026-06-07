# .claude/ Structure Rule

La cartella `.claude/` segue la struttura **ufficiale Claude Code**:
https://code.claude.com/docs/en/claude-directory

## Struttura Canonica

```
.claude/
├── CLAUDE.md              # istruzioni progetto (caricato SEMPRE)
├── settings.json          # permessi, hooks, env
├── settings.local.json    # locale non-versionato
├── .mcp.json              # MCP servers
├── rules/                 # regole caricate automaticamente (*.md)
├── skills/                # skills attive con SKILL.md + description
├── commands/              # slash commands (*.md)
├── agents/                # subagents (*.md)
└── output-styles/         # stili output (*.md)
```

## Regole MANDATORY

1. **NON creare `inactive-skills/`** — le skill non usate si spostano in
   `bashscripts/ai/inactive-skills/` (fuori dal perimetro Claude Code)

2. **NON mettere file `.md` di processo nella root** di `.claude/`
   (vengono caricati in contesto automaticamente da Claude Code)

3. **Ogni `SKILL.md` DEVE avere `description:`** nel frontmatter:
   ```yaml
   ---
   description: "Quando usare questa skill — trigger semantico"
   ---
   ```
   Senza `description`, la skill non viene mai triggerata automaticamente.

4. **`rules/` caricate a ogni conversazione** — tenerle sintetiche (<100 righe ciascuna)

5. **`skills/` solo per skill del progetto Fixcity/Laraxot** — skill generiche
   (docx, pptx, gds-*, wds-*, bmad-cis-*) in `inactive-skills/` fuori da `.claude/`

## Verifica

```bash
# Nessuna directory non-standard in .claude/
ls .claude/ | grep -v "CLAUDE.md\|settings\|.mcp\|rules\|skills\|commands\|agents\|output-styles\|README\|memory\|projects\|worktrees"

# Tutte le skill hanno description
for d in .claude/skills/*/; do
  grep -q "^description:" "$d/SKILL.md" 2>/dev/null || echo "MISSING: $d"
done
```
