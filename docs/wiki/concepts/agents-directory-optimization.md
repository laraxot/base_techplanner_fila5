# Agents Directory Optimization Analysis

**Data analisi**: 2026-05-04
**Scope**: `bashscripts/ai/.agents/` e `bashscripts/ai/.claude/`

---

## Dimensioni attuali

| Directory | Dimensione | File totali | File .md |
|-----------|-----------|-------------|----------|
| `bashscripts/ai/.agents/` | **31 MB** | 3.076 | 1.822 |
| `bashscripts/ai/.claude/` | **5.7 MB** | 635 | 541 |
| **Totale** | **36.7 MB** | **3.711** | **2.363** |

---

## Top 5 cartelle più pesanti

### In `.agents/`

| Cartella | Dimensione | Note |
|----------|-----------|------|
| `skills/` | 18 MB | Contiene skill non-Claude-Code (vedi sotto) |
| `rules/` | 4.3 MB | 729 file! Mix `.mdc` e `.md`, molti generici |
| `docs/` | 2.1 MB | Duplica parzialmente `docs/wiki/` root |
| `get-shit-done/` | 1.3 MB | Workflow GSD separato |
| `commands/` | 944 KB | Comandi agenti non Claude Code |

### In `.claude/`

| Cartella | Dimensione | Note |
|----------|-----------|------|
| `skills/` | 5.2 MB | 57 skill directory (tutte BMAD + 8 progetto) |
| `commands/` | 292 KB | Solo 2 comandi |
| `rules/` | 136 KB | 32 regole — dimensione accettabile |

---

## Problemi critici identificati

### 1. `.agents/skills/testing/dev-browser/tmp/` — Immagini PNG temporanee (4.2 MB)

**Problema**: Cartella `tmp/` con 10+ screenshot PNG (~400KB ciascuno) lasciati da sessioni di debug.
Sono file binari temporanei, non pertinenti come knowledge base.

**Azione**: Eliminare `bashscripts/ai/.agents/skills/testing/dev-browser/tmp/*.png`
e aggiungere `tmp/` a `.gitignore`.

### 2. `.agents/rules/` — 729 regole di cui molte generiche non-Laraxot

**Problema**: 729 file in `rules/` includono regole `.mdc` generiche (SQLite, LangChain,
Puppeteer, etc.) non pertinenti al progetto Fixcity/Laraxot.
Le regole `.mdc` sono per Cursor AI, non per Claude Code.

**Azione**: 
- Separare le regole Laraxot/Fixcity specifiche (stimato ~50-100) da quelle generiche
- Le regole `.mdc` (formato Cursor) non vanno in `.claude/rules/` → archiviarle
- Target: ridurre da 729 a ~80 file pertinenti

### 3. `.agents/skills/marketing/` — 992 KB skill di marketing non pertinenti

**Problema**: Skill per `cold-email`, `ad-creative`, `ai-seo`, `churn-prevention`, `paid-ads`
non hanno alcuna rilevanza per Fixcity (PA digitale, segnalazioni cittadini).
Spreco di spazio e context quando l'agente le carica.

**Azione**: Spostare in `bashscripts/ai/inactive-skills/marketing/`

### 4. `.agents/skills/testing/dev-browser/` — Package Node.js nella knowledge base

**Problema**: Contiene `package-lock.json` (108 KB) e codice Node.js sorgente
nella cartella `src/`. Non è documentazione ma un progetto JS embedded.

**Azione**: Spostare il progetto in `bashscripts/tools/dev-browser/` (fuori da `.agents/`)

### 5. `.claude/rules/` — 3 regole sopra soglia 100 righe

**Problema**: `leaflet-wizard-invalidate-size.md` (118 righe), `filament5-infolist-wizard-summary.md`
(113 righe), `filament5-schemas-section.md` (101 righe) superano la soglia consigliata di 100 righe.
Le regole troppo lunghe rallentano il context loading a ogni sessione.

**Azione**: Sintetizzare ciascuna a <70 righe mantenendo solo i vincoli assoluti;
spostare esempi dettagliati nel wiki `concepts/`.

---

## Piano di riduzione

### Fase 1 — Rimozione file temporanei (immediato, ~4.5 MB liberati)

```bash
# PNG temporanei di debug
rm -rf bashscripts/ai/.agents/skills/testing/dev-browser/tmp/
# Aggiunta a .gitignore
echo "bashscripts/ai/.agents/skills/testing/dev-browser/tmp/" >> .gitignore
```

### Fase 2 — Skill non pertinenti (dopo conferma, ~1.5 MB)

Cartelle da spostare in `bashscripts/ai/inactive-skills/`:
- `marketing/` (992 KB)
- `obsidian/` (88 KB)
- `predict/` (40 KB)
- `free-tool-strategy/` (24 KB)

### Fase 3 — Pulizia `.agents/rules/` (analisi manuale, stima ~3 MB)

- Identificare regole `.mdc` (formato Cursor) → spostarle in archivio
- Mantenere solo regole Laraxot/Fixcity specifiche
- Target: da 729 a ~100 file

### Fase 4 — Compressione regole lunghe in `.claude/rules/` (sintetica)

- `leaflet-wizard-invalidate-size.md`: sintetizzare 118→60 righe
- `filament5-infolist-wizard-summary.md`: sintetizzare 113→60 righe
- `filament5-schemas-section.md`: sintetizzare 101→60 righe

### Fase 5 — Ricollocazione dev-browser (architettura)

```
bashscripts/ai/.agents/skills/testing/dev-browser/
  → bashscripts/tools/dev-browser/
```
Solo `SKILL.md` rimane in `.agents/skills/testing/dev-browser/SKILL.md`

---

## Stima impatto

| Fase | Spazio liberato | Impatto performance |
|------|----------------|---------------------|
| Fase 1 (PNG tmp) | ~4.2 MB | Basso (binari non caricati in context) |
| Fase 2 (skill irrilevanti) | ~1.5 MB | Medio (skill non matchate) |
| Fase 3 (rules .mdc) | ~3 MB | Alto (729→100 file nel context scan) |
| Fase 4 (regole lunghe) | ~8 KB | Alto (context per sessione ridotto) |
| Fase 5 (dev-browser) | ~4.5 MB | Medio |
| **Totale stimato** | **~13 MB** | |

**Target**: da 36.7 MB → **~24 MB** (riduzione ~35%)

---

## Raccomandazioni architetturali

1. **`.agents/` vs `.claude/`**: chiarire che `.agents/` è un repository di reference/memoria
   storica, mentre `.claude/` è il perimetro operativo caricato da Claude Code. Non duplicare.

2. **Regole `.mdc` (Cursor)**: non appartengono a `.claude/rules/` (Claude Code);
   archiviarle o convertirle al formato Claude Code se ancora valide.

3. **`tmp/` folder policy**: mai committare cartelle `tmp/` con binari. Aggiungere
   pattern a `.gitignore` globale del progetto.

4. **Skill senza `description:` nel frontmatter**: Claude Code non le trigghera mai
   automaticamente → verificare tutte le 57 skill in `.claude/skills/` e aggiungere
   il frontmatter mancante (tool Bash con permesso per grep sistematico).

5. **Wiki come SSoT**: contenuto concettuale che esiste in `.agents/docs/` e anche
   in `docs/wiki/` va consolidato in `docs/wiki/` e rimosso da `.agents/docs/`
   (pattern: wiki compiled = SSoT, `.agents/docs/` = raw draft).

---

## File di riferimento

- Regola struttura `.claude/`: `bashscripts/ai/.claude/rules/claude-code-dot-claude-structure.md`
- Regola skills deduplication: `docs/wiki/concepts/claude-skills-deduplication-rule.md`
- Context compression: `docs/wiki/concepts/context-compression-discipline.md`
