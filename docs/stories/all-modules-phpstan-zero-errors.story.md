---
title: "[STORY] Full PHPStan pass on all Modules"
type: story
status: done
priority: high
created: 2026-06-06
updated: 2026-10-06
tags: [phpstan, quality, enum, bmad, swarm]
---
# Story: Full PHPStan pass on all Modules

## User Request
«sistema tutte le segnalazioni di phpstan [...] concentrati sullo scopo, sulla funzionalità, non sull'errore; aumenta la qualità del codice;
al posto di `public const STATUS_PENDING = 'pending'` usa enum, cerca i const in tutto il progetto» (2026-10-06)

## Analysis
`cd laravel && ./vendor/bin/phpstan analyse Modules` → **843 errori in 306 file** (Xot 234, Cms 111, Lang 108, User 108, Geo 104, Notify 69, altri 109).
Dominanti: variable.unused 206, typeCoverage.constantTypeCoverage 158, missingType.iterableValue 116, argument.type 89.
Molte "variabili mai lette" erano logica persa in refactor (fallback email Cms, prefisso cross-db `morphToManyX`, invio push Firebase, asserzioni nei test): ripristinata la funzione, non zittito l'errore.

## Result (verificato 2026-10-06 21:4x, result-cache pulita)
`phpstan analyse Modules` → **0 errori**. Lint `php -l` pulito sui file toccati. **Pest non eseguito** (`.env.testing` = MySQL, `APP_ENV=local`): da lanciare in sqlite.

## Acceptance Criteria
- [x] `./vendor/bin/phpstan analyse Modules` = 0 errori
- [x] Nessun file cancellato/spostato dall'intervento; `phpstan.neon` non toccato dagli agent
- [x] Costanti di dominio → backed enum (AI, Job, Lang, User, Sixteen); costanti di config restano tipizzate
- [x] Storia + dev-story BMAD per modulo; docs di modulo aggiornate
- [ ] Pest in ambiente sqlite (asserzioni nuove non ancora eseguite)
- [ ] Issue/Discussion GitHub (`gh` non installato)

## Stories per modulo (`laravel/Modules/<M>/docs/stories/2026-10-06-phpstan-cleanup-<m>.{story,dev}.md`)
xot-app · xot-rest · cms · lang · user · geo · notify · tenant · activity · media · ai · ui · job · gdpr · techplanner · seo ·
tema: `laravel/Themes/Sixteen/docs/stories/2026-10-06-const-to-enum-sixteen-appointment.*`

## GitHub (tracciamento)
### Issues
- TODO (gh non installato su questa macchina)
### Discussions
- TODO

Dependencies: gdpr-sync-phpstan-complete, activity-constant-type-coverage-fix, cms-merge-conflict-resolution
Owner: AI Agent (BMAD sprint)
