---
paths:
  - "*.json"
  - "**/*.json"
  - "*.neon"
  - "**/*.neon"
  - "**/*.yml"
  - "**/*.yaml"
  - "**/*.toml"
---

# No Absolute Paths in Git-Tracked Config Files

## REGOLA PERMANENTE: Mai percorsi assoluti in configurazioni tracciate da git

### Vincolo assoluto

```
VIETATO: /var/www/html/...  o qualsiasi percorso assoluto in .mcp.json, .env.example, configs
OBBLIGATORIO: percorsi relativi (../  ./  ../.cache/)  o variabili d'ambiente (${VAR})
```

### Perché

Un file di configurazione con percorso assoluto funziona SOLO sulla macchina di chi l'ha scritto.
Chiunque cloni il progetto in un percorso diverso (es. `/home/user/projects/fixcity`) avrà
configurazioni rotte senza errori chiari.

### Esempi corretti

```json
// .mcp.json — qmd server
"qmd": {
    "env": {
        "XDG_CONFIG_HOME": "../.cache/qmd-config",
        "XDG_CACHE_HOME": "../.cache/qmd-cache",
        "HOME": "../.cache/qmd-home"
    }
}

// .mcp.json — memory-bank
"memory-bank": {
    "args": ["../.memory-bank"]
}
```

### Esempi vietati

```json
// SBAGLIATO — percorso assoluto non portabile
"XDG_CONFIG_HOME": "/var/www/html/_bases/base_fixcity_fila5/.cache/qmd-config"
"args": ["/var/www/html/_bases/base_fixcity_fila5/.memory-bank"]
```

### Eccezioni legittime

- Variabili d'ambiente con `${VAR}` placeholder (es. `${GITHUB_TOKEN}`) — OK perché il valore è iniettato a runtime
- File nella cartella `.gitignore` che non vengono tracciati — OK, ma preferire comunque percorsi relativi

### Verifica rapida

```bash
grep -r '/var/www\|/home/\|/Users/' laravel/.mcp.json .mcp.json 2>/dev/null
# Deve tornare 0 righe
```

### Documentazione

- `docs/wiki/concepts/no-absolute-paths-in-config.md`
- Memory: `memory/feedback_no_absolute_paths_config.md`
