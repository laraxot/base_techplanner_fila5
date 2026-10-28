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

## Stories per modulo (`laravel/Modules/<M>/docs/stories/phpstan-cleanup-<m>.{story,dev}.md`)
xot-app · xot-rest · cms · lang · user · geo · notify · tenant · activity · media · ai · ui · job · gdpr · techplanner · seo ·
tema: `laravel/Themes/Sixteen/docs/stories/const-to-enum-sixteen-appointment.*`

## Seconda passata (2026-10-28): 1600 → 1 errore
Baseline `phpstan analyse Modules` = **1600 errori in 181 file** (Activity 383, Media 292, Lang 213, Cms 168, Job 165, Seo 131, Xot 110, AI 65, altri 73).
Run completo a cache pulita a fine passata: **1 errore** (`Xot/.../TypedHasRecursiveRelationships.php` `trait.unused`, residuo di un merge Xot aperto). Dopo la bonifica dei marker da parte di una seconda sessione, il run completo dà **0 errori**, ma perche' quel file e' stato cancellato e committato dal sync delle 16:44 senza l'utente: tenere la cancellazione o ripristinarlo dal commit precedente e' una decisione dell'utente.
**Causa radice**: non deriva di qualita', ma rebase/merge interrotti nei repo dei moduli e commit «.» con conflitti salvati a meta' (`use` persi, fixture e classi cancellate, versioni vecchie riapparse). Lo zero vale per il working tree a meta' rebase.
Storie per modulo: `phpstan-zero-errors-<m>.{story,dev}.md` (o storia esistente aggiornata). Procedura e pre-flight: `docs/wiki/how-to/phpstan-modules-swarm.md`.
- [ ] Pest: il DB `techplanner_data_test` non esiste su questa macchina; `TestDatabaseGuard` impone `*_test`. Servono creazione + migrazioni additive dell'utente.
- [ ] Rebase/merge aperti (AI, Activity, Cms, Gdpr, UI, Media, Xot): decide l'utente.

## GitHub (tracciamento)
### Issues
- TODO (gh non installato su questa macchina)
### Discussions
- TODO

## Riverifica 2026-10-28

`cd laravel && ./vendor/bin/phpstan analyse Modules` a cache pulita (`clear-result-cache`, via `heavy-slot.sh`, config `laravel/phpstan.neon`) → **exit 0, 0 errori**. Una passata del mattino aveva trovato 1600 errori; la causa non era deriva di qualità ma rebase interrotti nei moduli e commit `.` automatici con conflitti a metà (vedi [handoff-git-collisions-rebase-markers](../chat/handoff-git-collisions-rebase-markers.md)). Lo zero vale per il working tree a metà rebase: se i rebase vengono chiusi va rieseguito.

### Riverifica 17:38 dopo `composer update -W` altrui: 96 errori, tornati a 0
Dopo il rifacimento di `vendor/` (phpstan 2.3.0→2.3.3, larastan 3.12.3→3.13.2, filament 5.10→5.11, laravel/framework 13.35→13.39, spatie/laravel-queueable-action 2.17.0→2.17.1) il run a cache pulita dava 96 errori. Cause e correzioni:
- **Lang, 95**: 4 script di audit traduzioni in `Modules/Lang/docs/*.php` (codice top-level, restano fuori dall'`excludePaths` `docs/**/*` perché stanno direttamente in `docs/`): funzioni `Safe\*`, array shape reali, percorso derivato da `dirname(__DIR__, 3)` (era un segnaposto corrotto di un'altra macchina) e glob corretto con `Modules/`. Un solo `mixed` motivato (albero di traduzioni ricorsivo).
- **Cms, 9**: `->lazy()` deprecato in Filament 5.11 → `->live(onBlur: true)` (2 form); `Menu` e `BaseTreeModel` ora dichiarano `@implements HasRecursiveRelationshipsContract<…>` (il contratto Xot è generico dal sync di oggi); il test `ResolvePageModelExposureTest` dipendeva dal modulo opzionale Blog, assente qui: classe risolta per nome e test saltato se Blog non c'è.
- **Employee, 1**: `QueueableAction::onQueue()` restituisce un proxy anonimo che PHPStan vede `mixed` (stessa causa già documentata in `Media/MediaConvertsTable`); `exportData()` ora accoda direttamente `ActionJob` con `->onQueue('exports')`, stesso comportamento.
Esito: `clear-result-cache` + `heavy-slot.sh phpstan analyse Modules` → **exit 0, 0 errori**. Pest non eseguito (`.env.testing` = MySQL, DB `*_test` assente).

### Debito aperto: `@phpstan-ignore` nel codice (misurato 2026-10-28 17:20)
80 annotazioni in `Modules/*/app` (Xot 44, Media 15, User 6, Geo 6, Notify 4, Lang 2, Activity 2, Tenant 1), contro la regola «mai `@phpstan-ignore`»: lo zero è in parte coperto da loro. `laravel/phpstan.neon` ha `ignoreErrors` vuoto e nessuna baseline (a norma). Per tipo: `trait.unused` 20 (trait di libreria Xot, scopo da verificare caso per caso), `method.deprecated` 16 (hook di progetto omonimi a nomi deprecati di Filament), `*.alreadyNarrowedType` 6, `-next-line` generici 15, `method.notFound` 3, `missingType` 1. Procedura: togliere l'annotazione, rieseguire PHPStan sul modulo, correggere la causa (tipo reale, rinomina, trait da collegare o da non dichiarare) senza `mixed`; richiede `vendor/` stabile. Un agent per modulo (Xot da solo).

Dependencies: gdpr-sync-phpstan-complete, activity-constant-type-coverage-fix, cms-merge-conflict-resolution
Owner: AI Agent (BMAD sprint)
