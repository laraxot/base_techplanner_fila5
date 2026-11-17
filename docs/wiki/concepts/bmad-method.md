---
title: "BMad Method"
type: concept
sources:
  - "https://docs.bmad-method.org/"
  - "https://docs.bmad-method.org/llms-full.txt"
  - "https://github.com/bmad-code-org/BMAD-METHOD"
confidence: high
created: 2026-04-21
updated: 2026-04-22
tags: [bmad, agile, ai-agents, workflow, planning]
related:
  - concepts/context-memory-compaction-rule.md
  - concepts/llm-wiki-governance.md
---

# BMad Method

## Cos'è

**BMad** (Build More Architect Dreams) è un framework agile AI-driven per sviluppo software, MIT, 45k+ stelle su GitHub. Versione installata in FixCity: **6.3.1-next.19**.

Principio fondante: gli agenti AI specializzati collaborano come un team agile reale — ciascuno con ruolo, responsabilità e contesto precisi — su chats fresche per evitare context pollution.

## Tre Piste di Pianificazione

| Track | Stories | Quando usarlo |
|-------|---------|--------------|
| Quick Flow | 1–15 | Task singoli, fix, feature piccole |
| BMad Method | 10–50+ | Feature complesse, moduli nuovi |
| Enterprise | 30+ | Sistemi a larga scala, multi-team |

## Quattro Fasi

1. **Analysis** — comprensione requisiti, vincoli, sistema corrente
2. **Planning** — PRD, architettura, storie Agile
3. **Solutioning** — design tecnico dettagliato, diagrammi, decisioni
4. **Implementation** — esecuzione storia per storia con Developer agent

## Agenti Principali

| Agente | Ruolo |
|--------|-------|
| PM | Product Manager — PRD, backlog |
| Architect | Architettura tecnica, ADR |
| Developer | Implementazione codice storia per storia |
| UX Designer | UI/UX, wireframe |
| Analyst | Ricerca, requisiti funzionali |
| QA | Test plan, bug triage |
| SM | Scrum Master — cerimonie, blocchi |
| PO | Product Owner — priorità, acceptance |
| Orchestrator | Coordinamento workflow multi-agente |

## Struttura File

```
{project-root}/
├── _bmad/                         # Configurazione BMad
│   ├── config.toml                # Override config (layer utente)
│   └── custom/
│       ├── config.toml            # Override progetto
│       └── config.user.toml      # Override personale (gitignored)
├── _bmad-output/                  # Memoria esterna — sopravvive ai reset
│   ├── implementation-artifacts/  # Stories in esecuzione (80+ in FixCity)
│   ├── planning-artifacts/        # PRD, architetture
│   └── analysis-artifacts/        # Research, requisiti
└── .opencode/skills/              # 114 skill disponibili
```

## Regole Critiche

- **Chat fresche** per ogni workflow — MAI continuare una chat esausta
- **`_bmad-output/`** = memoria esterna che sopravvive ai reset di contesto
- **`project-context.md`** = documento di continuità mantenuto aggiornato
- **Config override a 3 layer**: `config.user.toml` > `custom/config.toml` > defaults

## Configurazione FixCity

In `_bmad/config.toml`:
```toml
document_output_language = "Italiano"
project_knowledge = "{project-root}/docs"
```

Moduli configurati: Core, BMM, BMB, CIS, GDS, TEA, WDS.

Versioni operative dopo aggiornamento 2026-04-22:

| Modulo | Versione |
|--------|----------|
| core | 6.3.0 |
| bmm | 6.3.0 |
| bmb | 1.6.0 |
| cis | 0.2.0 |
| gds | 0.4.0 |
| tea | 1.7.2 |
| wds | 0.3.1 |

Nota operativa: `bmad-method@next status` segnala `bmb`, `cis` e `gds` come "update available" verso versioni numericamente piu basse (`1.1.0`, `0.1.9`, `0.2.2`). Non fare downgrade automatico: mantenere le versioni installate piu recenti.

Nota installer: dopo un primo `update` a `@next`, le skill OpenCode BMM erano incomplete; un successivo `quick-update` ha rigenerato correttamente 114 skill e il catalogo `bmad-help`.

## Workflow Comuni

```bash
# Avviare una storia di implementazione
# (in una chat NUOVA, con Developer agent)
bmad-dev-story

# Revisionare codice scritto
bmad-code-review

# Creare PRD per nuova feature
bmad-create-prd

# Help generale
bmad-help
```

## Integrazione FixCity

BMad in FixCity è usato attivamente:
- 80+ storie di implementazione già in `_bmad-output/implementation-artifacts/`
- Lingua output impostata su Italiano
- `docs/` del progetto come knowledge base (`project_knowledge`)
- Si integra con il sistema LLM Wiki di FixCity: le storie usano i concetti del wiki come fonte di verità

## Lessons Learned: FixCity Critical Rules (2026-05-28)

### ⚠️ Enum Filament Standard (CRITICAL)

**ERRORE:** Definire metodi `label()`, `icon()`, `color()` negli enum.

**REGOLA:**
- **VIETATO:** Metodi `label()`, `icon()`, `color()` negli enum
- **RICHIESTO:** Usare `EnumTrait` da `Modules\Xot\Traits\EnumTrait`
- **RICHIESTO:** Implementare interfacce `HasLabel`, `HasIcon`, `HasColor`
- **USARE:** Solo `getLabel()`, `getIcon()`, `getColor()` dal trait
- **OVERRIDE:** Sovrascrivere `get*()` se logica custom necessaria

**VERIFICA:**
```bash
grep -rn "public function label():" laravel/Modules/*/app/Enums/
grep -rn "public function icon():" laravel/Modules/*/app/Enums/
grep -rn "public function color():" laravel/Modules/*/app/Enums/
```

### ⚠️ Nwidart Module Structure (CRITICAL)

**ERRORE:** Creare classi PHP fuori da `app/` (es. `Modules/Fixcity/Actions/` invece di `Modules/Fixcity/app/Actions/`).

**REGOLA:**
- **VIETATO:** Classi PHP fuori da `Modules/{Name}/app/`
- **RICHIESTO:** Tutte le classi in `Modules/{Name}/app/{Tipo}/`
- **VERIFICARE:** `composer.json` PSR-4: `"Modules\\{Name}\\": "app/"`
- **NAMESPACE:** Deve matchare path: `namespace Modules\{Name}\{Tipo};`

**ESEMPI CORRETTI:**
```
Modules/Fixcity/app/Actions/GenerateTicketsJsonAction.php ✅
Modules/Fixcity/app/Models/Ticket.php ✅
Modules/Fixcity/app/Filament/Resources/TicketResource.php ✅
```

### ⚠️ Component JS Location (CRITICAL)

**ERRORE:** Creare/modificare componenti JS in `Themes/` che duplicano logica moduli.

**REGOLA:**
- **VIETATO:** Componenti JS in `Themes/*/resources/js/components/` che duplicano moduli
- **RICHIESTO:** Componenti riusabili in `Modules/{Name}/resources/js/components/`
- **TEMA:** Solo consumer, mai provider di logica core
- **CONSENTITO:** CSS overrides, wrapper, inizializzazione theme-specific

**ESEMPIO:**
```javascript
// ✅ CORRETTO: Usare componente modulo
import { MapLit } from '@modules/Geo/resources/js/components/map-lit.js';

// ❌ ERRATO: Duplicare in tema
// Themes/Sixteen/resources/js/components/geo-map-lit-local.js
```

### ⚠️ Single Source of Truth: JSON Data (CRITICAL)

**ERRORE:** Filtri e mappa leggono da fonti dati diverse (DB vs JSON).

**REGOLA:**
- **SSoT:** Un solo JSON (`/data/tickets.json`) per tutti i consumer
- **FILTRI:** Calcolare conteggi aggregando `features[]` dal JSON (client-side)
- **MAPPA:** Usare stesso JSON per marker
- **VIETATO:** Query SQL dirette per dati filtri in pagina elenco

**STRUTTURA JSON CORRETTA:**
```json
{
  "type": {
    "value": "waste_collection",
    "label": "Raccolta Rifiuti",
    "color": "#4caf50",
    "icon": "heroicon-o-trash",
    "iconUrl": "/assets/ui/svg/trash.svg"
  }
}
```

**NON:**
```json
{
  "type": "waste_collection",
  "type_label": "Raccolta Rifiuti",
  "type_color": "#4caf50",
  "type_icon": "heroicon-o-trash"
}
```

---

## Riferimenti

- Docs ufficiali: https://docs.bmad-method.org/
- GitHub: https://github.com/bmad-code-org/BMAD-METHOD
- [[context-memory-compaction-rule]]: regola di compattazione del contesto (complementare)
- [[llm-wiki-governance]]: governance del wiki locale
- Memory: `58ca344f-b0f1-4b75-8115-38d8fcbccaa6` — Composite Lessons Learned 2026-05-28
