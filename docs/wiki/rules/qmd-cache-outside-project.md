# QMD cache fuori dal repository

**Rule type**: infrastructure / config hygiene
**Status**: enforced (2026-05-11)

## Regola

La cache di QMD **non** deve vivere dentro `/var/www/_bases/<project>/.cache/`.
Deve stare nella home utente seguendo XDG Base Directory:

```
${HOME}/.cache/qmd-cache/    # XDG_CACHE_HOME — indice SQLite + modelli (2.4G)
${HOME}/.cache/qmd-config/   # XDG_CONFIG_HOME — qmd/index.yml (collections)
${HOME}/.cache/qmd-home/     # (opzionale) HOME isolato — npm cache di qmd
```

Nei file `.mcp.json` tracciati da git usare **solo** variabili (`${HOME}`),
mai percorsi assoluti, mai `../` che risolvono dentro al progetto.

### Setup corretto

```jsonc
// laravel/.mcp.json (e .mcp.json root)
"qmd": {
  "command": "qmd",
  "args": ["--index", "fixcity", "mcp"],
  "env": {
    "XDG_CONFIG_HOME": "${HOME}/.cache/qmd-config",
    "XDG_CACHE_HOME":  "${HOME}/.cache/qmd-cache"
  }
}
```

### Setup vietato

```jsonc
// ❌ NO — cache dentro al repo
"env": {
  "XDG_CONFIG_HOME": "../.cache/qmd-config",
  "XDG_CACHE_HOME":  "../.cache/qmd-cache"
}

// ❌ NO — path assoluto hard-coded
"env": {
  "XDG_CACHE_HOME": "/home/zorin/.cache/qmd-cache"
}

// ❌ NO — tilde non sempre espanso negli env JSON
"env": {
  "XDG_CACHE_HOME": "~/.cache/qmd-cache"
}
```

## Perché

1. **Performance WSL2 / drvfs**: tenere DB SQLite di grandi dimensioni
   sul filesystem Linux nativo è significativamente più veloce che su
   filesystem montati cross-host.
2. **Repo pulito**: 2.4G di indice + 56M di npm cache non devono pesare
   sul working tree, sui backup, su `find/grep/rsync`.
3. **Portabilità**: nessun path assoluto in config tracciati da git;
   ogni dev usa la sua `${HOME}`.
4. **Multi-progetto**: la stessa installazione qmd serve più progetti;
   ognuno punta alla sua collection via `--index <nome>` ma usa lo
   stesso XDG cache root.
5. **XDG compliance**: `~/.cache/` è il posto canonico per cache utente.

## Trigger di applicazione

- Crei o modifichi `.mcp.json` con il server `qmd`
- Aggiungi una nuova collection in `${HOME}/.cache/qmd-config/qmd/index.yml`
- Vedi una cartella `.cache/` apparire nel progetto → spostala subito fuori

## Migrazione (one-shot)

```bash
mv /path/to/project/.cache/qmd-cache  "${HOME}/.cache/qmd-cache"
mv /path/to/project/.cache/qmd-config "${HOME}/.cache/qmd-config"
mv /path/to/project/.cache/qmd-home   "${HOME}/.cache/qmd-home"   # se presente
rmdir /path/to/project/.cache
# poi aggiornare .mcp.json e laravel/.mcp.json come mostrato sopra
# verifica:
XDG_CONFIG_HOME=${HOME}/.cache/qmd-config XDG_CACHE_HOME=${HOME}/.cache/qmd-cache \
  qmd --index fixcity status
```

## Riferimenti

- Memory: `feedback_no_absolute_paths_config.md`
- Setup doc: `docs/MCP-QMD-SETUP.md`
- XDG Base Directory Specification: https://specifications.freedesktop.org/basedir-spec/
