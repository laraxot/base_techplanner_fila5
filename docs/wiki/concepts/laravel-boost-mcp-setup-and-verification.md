# Laravel Boost MCP Setup And Verification

## Verified Sources

- Laravel Boost docs: `https://laravel.com/docs/12.x/boost`
- Laravel Boost repository: `https://github.com/laravel/boost`

## Local Project State

Nel progetto `base_fixcity_fila5` Laravel Boost risulta gia' presente e configurato:

- `laravel/composer.json` contiene `laravel/boost:^2.4` in `require-dev`
- `laravel/boost.json` esiste con:
  - `mcp: true`
  - `guidelines: true`
  - `agents: ["junie", "cursor", "claude_code", "copilot", "gemini", "codex", ...]`
- `laravel/.mcp.json` registra il server:

```json
{
  "mcpServers": {
    "laravel-boost": {
      "command": "/usr/bin/php",
      "args": [
        "/var/www/_bases/base_fixcity_fila5/laravel/artisan",
        "boost:mcp"
      ]
    }
  }
}
```

## What Boost Provides

Secondo la documentazione ufficiale, Boost fornisce:

- MCP server Laravel-aware
- AI guidelines generati localmente
- agent skills selettive
- documentation API e search docs per pacchetti installati

## Why It Matters Here

Per questo progetto Boost e' rilevante perche':

- permette all'agente di interrogare struttura app, config, routes, logs e docs
- riduce codice inventato su Laravel / Filament / Livewire
- si integra bene con la disciplina locale `docs -> index -> log -> ingest`

## Best Practices

- mantenere `laravel/boost` in `require-dev`
- rigenerare config/agenti con `php artisan boost:install` o `boost:update` quando cambia il parco agenti
- usare `php artisan boost:mcp` come source of truth del server MCP locale
- versionare almeno `boost.json` e la config MCP del progetto se il team vuole setup condiviso
- usare Boost assieme a wiki locale e non in sostituzione della conoscenza specifica del progetto

## Bad Practices

- assumere che Boost sia attivo solo perche' il pacchetto e' installato
- registrare il server MCP con path relativi ambigui se il progetto usa piu' root operative
- usare Boost come scusa per non documentare le regole locali del progetto
- lasciare skills/guidelines generate senza re-check quando cambia stack o agent tooling

## False Friends

- "Boost installato = MCP certamente attivo": falso, serve anche registrazione agent-side
- "Boost sostituisce la wiki del progetto": falso, Boost conosce Laravel/ecosistema, non tutte le regole locali
- "basta il package composer": falso, contano anche `boost.json`, `.mcp.json` e l'abilitazione lato agent

## Minimal Verification Checklist

1. `composer.json` contiene `laravel/boost`
2. `boost.json` esiste e ha `mcp: true`
3. `.mcp.json` registra `php artisan boost:mcp`
4. `php artisan boost:mcp --help` risponde senza bootstrap fatal
5. l'agente vede il server `laravel-boost` attivo nel proprio ambiente MCP

## Where To Go Deeper

- Laravel docs: `https://laravel.com/docs/12.x/boost`
- Repository: `https://github.com/laravel/boost`
- Announcement: `https://laravel.com/blog/announcing-laravel-boost`
