# GSD (Get Shit Done) — Regole per Cursor AI

## Principi

GSD è un sistema di meta-prompting, context engineering e sviluppo spec-driven. Risolve il context rot mantenendo ogni task in un contesto fresco e ottimale.

## Workflow Obbligatorio

Per task non-triviali (multi-file, multi-sessione, refactoring):

1. **Read State**: Leggere `.planning/STATE.md` all'inizio di ogni sessione
2. **Discuss → Plan → Execute → Verify**: Seguire il ciclo GSD completo
3. **Atomic Commits**: Ogni task = un commit con formato `feat(phase-{N}): {description}`
4. **Fresh Context**: Ogni piano deve essere eseguibile senza accumulare context
5. **Quality Gates**: PHPStan L10 + Pint + no labels + strict types dopo ogni execute

## File di Riferimento

| File | Scopo |
|------|-------|
| `.planning/STATE.md` | Stato corrente del progetto |
| `.planning/config.json` | Configurazione workflow GSD |
| `.planning/ROADMAP.md` | Fasi mappate ai requisiti |
| `.planning/REQUIREMENTS.md` | Requisiti scoped |
| `.gsd/templates/` | Template per documenti GSD |
| `.gsd/adapters/CURSOR.md` | Adapter specifico Cursor |

## Regole di Esecuzione

### Wave Execution
- Piani indipendenti → stessa wave → paralleli
- Piani dipendenti → wave successiva → attendono
- Conflitti file → sequenziali

### XML Task Format
Ogni piano usa task XML strutturati:
```xml
<task type="auto">
  <name>{nome}</name>
  <files>{percorsi file}</files>
  <action>{istruzioni precise}</action>
  <verify>{come verificare}</verify>
  <done>{criterio di completamento}</done>
</task>
```

### Quick Mode
Per task piccoli: creare piano in `.planning/quick/{NNN}-{slug}/PLAN.md`, eseguire, scrivere summary.

## Integrazione Laraxot

Ogni task GSD DEVE rispettare:
- `declare(strict_types=1)` sempre
- No `->label()`, `->placeholder()`, `->helperText()` nei componenti Filament
- Modelli estendono solo `BaseModel` del modulo
- No `property_exists()` — usare `??`
- Migrazioni: no `down()`, classi anonime, extend `XotBaseMigration`
- PHPStan Level 10 — no ignores
- Traduzioni in struttura espansa

## Session Management

### Inizio Sessione
1. Leggere `.planning/STATE.md`
2. Leggere `.planning/config.json`
3. Riprendere dall'ultima fase

### Fine Sessione
1. Aggiornare `.planning/STATE.md`
2. Committare docs se `commit_docs: true`

## Comandi GSD

Per avviare un workflow GSD, l'utente può dire:
- "GSD new-project" — Inizializza progetto
- "GSD discuss phase N" — Discuti fase N
- "GSD plan phase N" — Pianifica fase N
- "GSD execute phase N" — Esegui fase N
- "GSD verify phase N" — Verifica fase N
- "GSD quick: {desc}" — Task rapido
- "GSD map codebase" — Mappa codebase brownfield
- "GSD progress" — Mostra stato corrente
- "GSD pause" / "GSD resume" — Salva/ripristina stato

## Collegamenti

- [GSD Methodology](docs/project/gsd-methodology.md)
- [AGENTS.md](AGENTS.md)
- [Cursor Adapter](.gsd/adapters/CURSOR.md)
