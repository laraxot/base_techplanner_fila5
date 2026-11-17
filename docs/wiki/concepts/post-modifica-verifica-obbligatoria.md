---
name: post-modifica-verifica-obbligatoria
description: "Dopo OGNI modifica PHP/Blade: PHPStan + PHPMD + PHPInsights + visual parity. Strumenti standalone, NON vendor."
type: concept
---

# Post-Modifica Verifica Obbligatoria

## STRUMENTI DI VALIDAZIONE

### Installati e disponibili

| Tool | Path | Installazione |
|------|------|---------------|
| **PHPStan** | `/home/zorin/.local/bin/phpstan.phar` | standalone phar (v2.1.17) |
| **PHPMD** | `/home/zorin/.local/bin/phpmd.phar` | standalone phar |
| **PHPInsights** | `laravel/vendor/bin/phpinsights` | composer (nunomaduro/phpinsights) |
| **Visual Parity** | Playwright MCP | browser snapshot |

### Quando usarli

**DOPO ogni modifica di file PHP o Blade:**

1. `phpstan analyse <file> --level=max`
2. `phpmd <file> text unusedcode,design,codesize`
3. Visual parity in browser

### Perché standalone

I tool in `vendor/` possono essere rimossi con `composer update` o `composer install --no-dev`.
Gli strumenti standalone in `~/.local/bin/` sono sempre disponibili.

### Eccezione dichiarata

`PHPInsights` resta intenzionalmente in `laravel/vendor/bin/phpinsights`.

### Vincolo permanente su PHPMD

- **PHPMD NON va installato con Composer**
- **PHPMD va usato sempre come `.phar` standalone**
- percorso canonico: `/home/zorin/.local/bin/phpmd.phar`

Riferimento canonico: [phpmd-standalone-phar-rule](./phpmd-standalone-phar-rule.md)
