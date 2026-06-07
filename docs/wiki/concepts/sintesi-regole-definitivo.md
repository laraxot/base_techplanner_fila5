---
title: "Sintesi Regole Definitivo - Token-Efficient Pattern Guide"
type: concept
tags: [sintesi, regole-definitivo, dry-kiss, on-demand, second-brain, efficienza]
created: 2026-06-05
updated: 2026-06-05
qmd: "sintesi regole definitivo token efficient on-demand second brain"
related:
  - ../../../CLAUDE.md
  - ../../../docs/wiki/rules/00-TRIGGER_MAP.md
---

# Sintesi Regole Definitivo

## 🎯 Obiettivo
Ridurre l'uso di tokens mantenendo efficienza e accuratezza. Tutte le regole sono **on-demand** nel second brain (LLM Wiki).

---

## 📋 Regole Principali (DRY+KISS)

### 1. **Migrazioni**
```
USA SOLO: $this->updateTimestamps(table: $table, hasSoftDeletes: true|false)
NO: $table->timestamps() + $table->softDeletes() + campi manuali
```

### 2. **Nomi File**
```
Sempre INGLESE, mai Italiano
Esempio: segnalazione → ticket, non segnalazione
```

### 3. **Componenti Blade**
```
Percorso: components.blocks.cta.{english-name}
Esempio: components.blocks.cta.ticket
```

### 4. **Frontmatter Markdown**
```yaml
---
title: "Nome Chiaro"
type: rule|concept|story|bugfix
tags: [tag1, tag2, ...]
created: YYYY-MM-DD
updated: YYYY-MM-DD
qmd: "search keywords space-separated"
related:
  - ../path/relativo.md
---
```

---

## 📚 Accesso On-Demand

### Trigger Map
`docs/wiki/rules/00-TRIGGER_MAP.md` → carica regola specifica

### Search Pattern
```bash
qmd search "<topic>" --limit 5
bashscripts/docs/llm-wiki-qmd.sh search "<t>" -n 5 --files
```

### Indici Second Brain
| Cartella | Contenuto |
|----------|-----------|
| `docs/wiki/rules/` | Regole definitive |
| `docs/wiki/concepts/` | Pattern e filosofie |
| `docs/wiki/memories/` | Decisioni storiche |
| `docs/wiki/skills/` | Istruzioni skill |
| `docs/chat/` | Issue correnti |

---

## 🔧 Workflow Corretto

### Nuovo Task
1. Leggi `TRIGGER_MAP.md`
2. Cerca con QMD se esiste già
3. Crea/aggiorna documento
4. Aggiorna indici
5. Fai ingest QMD

### Modifica Codice
1. Leggi contesto esistente
2. Fai modifica
3. PHPStan L10
4. Verifica sintassi
5. Commit

---

## 📊 Metriche Token

| Operazione | Token Spent |
|------------|-------------|
| Read file | 0.5K/file |
| Search QMD | 0.1K/query |
| Edit | 0.2K/edit |
| Write nuovo | 1-2K/doc |

**Target:** < 5K per documento, < 10K per task complesso

---

## 🔄 Pattern Ricordo

Quando dimentico qualcosa:
1. Cerca in `docs/wiki/` con QMD
2. Se non trovo, crea documento
3. Aggiorna index
4. Ripeti su

---

*Claude (`claude-opus-4-8`) - 2026-06-05*
*Version: 1.0 - Sintesi elettronica, accesso on-demand*