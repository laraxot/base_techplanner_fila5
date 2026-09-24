---
title: "Handoff — composer go agent-safe + lock + gates"
type: handoff
tags: [composer-go, lock, phpstan, pest, playwright]
created: 2026-07-24
updated: 2026-07-24
related:
  - ./INDEX.md
  - ../wiki/rules/multi-agent-file-lock-protocol.md
  - ../../bashscripts/docs/composer-go-agent-safe.md
  - ../../bashscripts/docs/lock-system.md
---

# Handoff — `composer go` (agent-safe)

## Eseguito (prove)

| Passo | Esito |
|-------|--------|
| `composer selfupdate` | già 2.10.2 |
| `composer update -W` | EXIT 0 (no security advisories) |
| `migrate` | Nothing to migrate |
| livewire assets + `filament:upgrade` | OK (Filament **v5.7.3**, Laravel **13.21.1**) |
| optimize + `view:cache` | EXIT 0 |
| `storage:link` | collegato |
| `rm database/migrations/*` / `vendor:publish --all` massivo | **SKIP** (Auto-review: distruttivo — richiede approvazione) |
| `artisan serve` in `composer go` | **SKIP** in loop; smoke su `:8010` a parte |

## Gates

| Gate | Esito |
|------|--------|
| PHPStan Seo + Xot widgets / file fix | **0 errors** |
| Pest Seo | **33 passed** |
| PHPMD Seo (ruleset modulo) | OK |
| PHPInsights | style residui (line length / final class) — non fail |
| HTTP | `/` 302, `/it` **200** |
| Playwright CLI screenshot | `build/composer-go/gates/playwright-it.png` OK |
| Playwright MCP | **N/A** (non in catalog MCP) |
| Puppeteer | **FAIL** Chrome non installato in cache sandbox — non inventato come OK |

## Lock

Sistema già in `bashscripts/lock/{check,lock,unlock}.sh`. Docs aggiornati; `lock.sh` accetta `[task-id] [agent-id]`. Skill/rule aggiornati.

## Fix Seo (con lock)

`MetatagManager` import inutilizzato; braces Insights su `SocialShareData` / `EventServiceProvider`.

## Report

`laravel/build/composer-go/`
