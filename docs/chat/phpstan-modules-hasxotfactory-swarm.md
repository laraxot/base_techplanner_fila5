---
title: "PHPStan Modules HasXotFactory swarm"
type: handoff
status: active
created: 2026-09-14
updated: 2026-09-14
tags: [phpstan, swarm, coordination, xot, user]
---

# PHPStan Modules HasXotFactory swarm

## Obiettivo

Portare `./vendor/bin/phpstan analyse Modules` a zero errori correggendo il contratto generico `HasXotFactory` senza modificare la configurazione PHPStan.

## Baseline corrente

- 9 segnalazioni PHPStan;
- 2 file contestuali: `BaseUser.php` e `HasXotFactory.php`;
- root cause candidata: `Factory` nei PHPDoc del trait risolto come `Modules\User\Models\Factory` nel consumer.

## Ordine random

Seed riproducibile: `20260914`.

1. Xot `HasXotFactory.php`;
2. User `BaseUser.php`.

## Allocazioni

| Worker | Scope di scrittura | Stato |
|---|---|---|
| Subagent Xot | `laravel/Modules/Xot/app/Models/Traits/HasXotFactory.php` | in corso |
| Subagent User | `laravel/Modules/User/app/Models/BaseUser.php` | in corso |
| Orchestratore | solo artefatti, verifica e gate finali durante il fan-out | attivo |

## Vincoli

- Branch fisso: `dev`.
- Nessun commit o push.
- Nessuna modifica a `laravel/phpstan.neon` o altri `.neon`.
- Nessuna suppressione o baseline.
- Scope di scrittura disgiunti.
- Read-before-write e verifica del diff prima dell'integrazione.

## Gate richiesti

Per ogni file PHP modificato: `php -l`, PHPStan mirato, PHPMD, PHPInsights e Pest pertinente. Chiusura solo dopo PHPStan completo su `Modules` con zero errori.
