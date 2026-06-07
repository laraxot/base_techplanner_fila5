> **Usare sempre Second Brain (QMD) come primo passo di ogni sessione AI.**

## Regola Permanente — Second Brain Always-On

### Obbligo

All'inizio di ogni sessione Cascade (o quando si riceve un nuovo task tecnico):

1. Eseguire una query QMD sul topic della richiesta prima di rispondere
2. Citare i risultati rilevanti trovati
3. Aggiornare `qmd update` se le collezioni sono vecchie (>24h)

### Comandi canonici (wrapper ufficiale)

```bash
# Smoke test / health check
bashscripts/docs/second-brain-healthcheck.sh

# Query su un topic
bashscripts/docs/llm-wiki-qmd.sh search "topic della domanda" -n 5

# Aggiornamento collezioni
bashscripts/docs/llm-wiki-qmd.sh update

# Query ibrida (migliore qualità)
bashscripts/docs/llm-wiki-qmd.sh query "domanda complessa"
```

### Oppure direttamente con variabili d'ambiente

```bash
PATH=/home/zorin/.nvm/versions/node/v22.22.2/bin:$PATH \
XDG_CONFIG_HOME=/var/www/_bases/base_fixcity_fila5/.cache/qmd-config \
XDG_CACHE_HOME=/var/www/_bases/base_fixcity_fila5/.cache/qmd-cache \
HOME=/var/www/_bases/base_fixcity_fila5/.cache/qmd-home \
QMD_LLAMA_GPU=off \
qmd search "query" -n 5
```

### Collezioni disponibili (13.827 file)

| Collezione | Contenuto |
|------------|-----------|
| `fixcity-root-docs` | docs/ root, wiki globale, regole progetto |
| `fixcity-modules-docs` | docs di tutti i moduli Laraxot |
| `fixcity-themes-docs` | docs tema Sixteen e altri temi |
| `fixcity-bashscripts-docs` | runbook e script condivisi |

### MCP Server (Windsurf nativo)

Configurato in `~/.codeium/windsurf/mcp_config.json`.
Il server MCP espone:
- `qmd_search` — ricerca BM25 veloce
- `qmd_deep_search` — ricerca ibrida + reranking
- `qmd_get` — recupera documento per path
- `qmd_status` — stato indice

### Perché è obbligatorio

- Il codebase ha 27.000+ file: il Second Brain evita di "reinventare la ruota"
- Le decisioni architetturali passate sono documentate e ricercabili
- Riduce errori di regressione su pattern già risolti
- Mantiene la conoscenza persistente tra sessioni

### Workflow tipico

```
1. Ricevo task → qmd search "topic" -n 5
2. Leggo i file rilevanti trovati
3. Rispondo/implemento usando la conoscenza locale
4. Se creo nuova conoscenza → aggiorno docs/wiki/ + qmd update
```

### Verifica funzionamento

```bash
# Test rapido (deve restituire risultati)
PATH=/home/zorin/.nvm/versions/node/v22.22.2/bin:$PATH \
XDG_CONFIG_HOME=/var/www/_bases/base_fixcity_fila5/.cache/qmd-config \
XDG_CACHE_HOME=/var/www/_bases/base_fixcity_fila5/.cache/qmd-cache \
HOME=/var/www/_bases/base_fixcity_fila5/.cache/qmd-home \
QMD_LLAMA_GPU=off \
qmd search "filament laraxot" -n 3
```

### Riferimenti

- Documentazione completa: `docs/project/qmd-local-docs-search.md`
- Bootstrap sessione: `docs/wiki/concepts/second-brain-session-bootstrap.md`
- Index wiki: `docs/wiki/index.md`
- MCP config: `~/.codeium/windsurf/mcp_config.json`
