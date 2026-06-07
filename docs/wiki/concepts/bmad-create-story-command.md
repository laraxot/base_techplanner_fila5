# BMAD Create Story Command

## Regola

Il comando slash `/bmad-create-story` e' un wrapper locale per il workflow BMAD Method `bmad-create-story`.

## Source Of Truth

- `.opencode/command/bmad-create-story.md`: wrapper slash command per opencode/Codex.
- `.opencode/skills/bmad-create-story/SKILL.md`: skill opencode/Codex locale.
- `.opencode/skills/bmad-create-story/workflow.md`: workflow operativo BMAD locale.
- `.claude/commands/bmad-create-story.md`: wrapper slash command.
- `.claude/skills/bmad-create-story/SKILL.md`: skill Claude locale.
- `.claude/skills/bmad-create-story/workflow.md`: workflow operativo BMAD v6.
- `.github/skills/bmad-create-story/SKILL.md`: mirror GitHub skill.
- `bashscripts/ai/.agents/skills/bmad-create-story/SKILL.md`: mirror agents/Codex.

## Motivazione

La documentazione BMAD Method attuale indica `bmad-create-story` come primo passo del build cycle: crea il file story da epic/sprint status prima di `bmad-dev-story`.

## Disciplina Locale

- Prima di caricare documenti grandi consultare indici, QMD e LLM Wiki.
- Leggere `sprint-status.yaml` per intero prima di scegliere la prossima story.
- Se il contesto si avvicina al limite modello, usare context compression e retry.
- Per i quality gates e i runbook collegati, **PHPMD e' sempre standalone `.phar`**:
  - usare `/home/zorin/.local/bin/phpmd.phar`
  - non usare Composer come meccanismo di installazione di PHPMD
- Includere nelle story le regole persistenti rilevanti, in particolare:
  - `getSummarySchema()` usa Filament 5 Infolists.
  - `SchemaView` e' vietato per i riepiloghi wizard.
  - CSS parity Design Comuni appartiene ai temi, non ai Blade modulo.
  - **Moduli nwidart:** path PHP sempre `Modules/{Mod}/app/...` — vedi [bmad-laraxot-implementation-guardrails.md](bmad-laraxot-implementation-guardrails.md).

## Verifica

Il wrapper esiste in `.opencode/command/bmad-create-story.md` e punta agli artefatti BMAD locali gia' installati.
