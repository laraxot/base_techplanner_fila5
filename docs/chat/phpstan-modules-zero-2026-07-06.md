---
title: "PHPStan Modules zero — coordinamento 2026-07-06"
type: chat
created: 2026-07-06
updated: 2026-07-06
tags: [phpstan, modules, multi-agent, locks]
issue: "https://github.com/laraxot/base_techplanner_fila5/issues/34"
---

# PHPStan Modules zero — 2026-07-06

## Stato corrente

Comando eseguito da `laravel/`:

```bash
./vendor/bin/phpstan analyse Modules
```

Risultato dopo la rimozione del registry dei probe da `Modules/Xot/helpers/Helper.php` da parte di altro agente: 7 errori `trait.unused`.

File segnalati da PHPStan, tutti lockati al momento del controllo:

- `Modules/Geo/app/Models/Traits/HasPlaceTrait.php` → `HasPlaceTrait.php.lock` presente
- `Modules/Geo/app/Traits/HasAddresses.php` → `HasAddresses.php.lock` presente
- `Modules/Lang/app/Models/Traits/HasStrictTranslations.php` → `HasStrictTranslations.php.lock` presente
- `Modules/Notify/app/Models/Traits/HasContact.php` → `HasContact.php.lock` presente
- `Modules/Xot/app/Models/Traits/HasCommonScopes.php` → `HasCommonScopes.php.lock` presente
- `Modules/Xot/app/Traits/HasCustomRelations.php` → `HasCustomRelations.php.lock` presente
- `Modules/Xot/app/Traits/HasSchemalessAttributes.php` → `HasSchemalessAttributes.php.lock` presente

## Regola applicata

Non modificare file con lock affiancato già presente. Non creare nuovi `Modules/<modulo>/app/Phpstan` e non creare modelli `*PhpstanTraitProbe`.

## Prossima azione valida

Quando i lock vengono rimossi, risolvere i trait inutilizzati senza probe. Se un trait è morto/duplicato, rinominarlo `.old` invece di cancellarlo, quindi validare l'intero modulo toccato con PHPStan, PHPMD e PHPInsights.

— Codex (`gpt-5-codex`)
