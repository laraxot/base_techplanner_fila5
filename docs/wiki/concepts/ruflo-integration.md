# Ruflo Integration per FixCity

## Panoramica

Ruflo (ex claude-flow) è il sistema di orchestrazione multi-agent installato in questo progetto nella directory `.claude-flow/`. 

**Versione installata:** `ruflo v3.7.0-alpha.11`

## Configurazione Attuale

```yaml
# .claude-flow/config.yaml
version: "3.0.0"

swarm:
  topology: adaptive
  maxAgents: 15
  autoScale: true
  coordinationStrategy: consensus

memory:
  backend: agentdb
  enableHNSW: true
  persistPath: .claude-flow/data
  cacheSize: 100
  learningBridge:
    enabled: true
    sonaMode: balanced
    confidenceDecayRate: 0.005
    accessBoostAmount: 0.03
    consolidationThreshold: 10
  memoryGraph:
    enabled: true
    pageRankDamping: 0.85
    maxNodes: 5000
    similarityThreshold: 0.8
  agentScopes:
    enabled: true
    defaultScope: project

neural:
  enabled: true
  modelPath: .claude-flow/neural

hooks:
  enabled: true
  autoExecute: true

mcp:
  autoStart: false
  port: 3000
```

## Installazione e Setup

### CLI Install (già presente)

```bash
# Versione globale
which ruflo  # /home/zorin/.nvm/versions/node/v25.9.0/bin/ruflo
npx ruflo@latest --version  # v3.7.0-alpha.11
```

### Aggiungi come MCP server

```bash
claude mcp add ruflo -- npx ruflo@latest mcp start
```

## Comandi Utili

| Comando | Descrizione |
|---------|------------|
| `npx ruflo@latest init` | Inizializza progetto |
| `npx ruflo@latest memory store` | Salva in memoria |
| `npx ruflo@latest memory search` | Cerca in memoria |
| `npx ruflo@latest agent spawn` | Spawn agent |
| `npx ruflo@latest swarm init` | Inizializza swarm |
| `npx ruflo@latest doctor` | Diagnostica sistema |

## Integrazione con questo Progetto

### Directory Strutture

- **Config:** `.claude-flow/config.yaml`
- **Data:** `.claude-flow/data/`
- **Memory:** `.claude-flow/memory/`  
- **Logs:** `.claude-flow/logs/`
- **Sessions:** `.claude-flow/sessions/`

### Hooks Installati

Gli hooks automatici sono configurati ma non attivi (directory vuota).

### Agenti Spawned

Nessun agente attivo manualmente in questo progetto.

## Plugins Ruflo Attuali

Questo progetto usa già funzionalità simili a Ruflo tramite:
- MCP servers (Playwright, Context Mode, QMD)
- ACM (Active Context Management)
- Supermemory

## Link Utili

- [Repo GitHub](https://github.com/ruvnet/ruflo)
- [Documentazione](https://github.com/ruvnet/ruflo/blob/main/docs/USERGUIDE.md)
- [Web UI Demo](https://flo.ruv.io/)
- [Goal Planner](https://goal.ruv.io/)

## Note

- Ruflo è già configurato ma non attivo come daemon
- Gli MCP tools sono accessibili tramite altri MCP servers configurati
- memory_search via `mcp__plugin_claude-mem_mcp-search__search` è configurato

---

*Ultimo aggiornamento: 2026-05-08*