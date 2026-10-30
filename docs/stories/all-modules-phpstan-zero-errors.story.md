---
title: "[STORY] Full PHPStan pass on all Modules"
type: story
status: done
priority: high
created: 2026-06-06
updated: 2026-10-30
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

### Debito aperto: `@phpstan-ignore` nel codice (da 80 a 7, misurato 2026-10-30)
Il 2026-10-28 le annotazioni in `Modules/*/app` erano 80 (Xot 44, Media 15, User 6, Geo 6, Notify 4, Lang 2, Activity 2, Tenant 1), contro la regola «mai `@phpstan-ignore`»: lo zero era in parte coperto da loro. Il 2026-10-30 sei lane disgiunte (Geo/Lang/Activity, Xot trait vari, Xot tabella, Media, User/Notify, chiavi lang UI) ne hanno tolte 66 (restavano 14); un giro successivo ha tolto le ultime 7 `method.deprecated` di `HasXotTable`: restano **7** (Xot 2, Media 2, User 1, Tenant 1, Activity 1). `analyse Modules` dà **0 errori** con cache dei risultati svuotata e di nuovo dopo l'ultimo giro; `laravel/phpstan.neon` è invariato (`ignoreErrors` vuoto, nessuna baseline). Procedura seguita: togliere l'annotazione, rianalizzare la **cartella** (non il singolo file: `trait.unused` scatta solo così), correggere la causa senza `mixed`. Le story delle lane sono `phpstan-ignore-removal` in `Modules/{Geo,Lang,Activity,Xot,Media,User}/docs/stories/`.

Cosa ha chiuso le annotazioni: la maggior parte era obsoleta (PHPStan non segnalava più nulla); `method.deprecated` (hook di progetto omonimi a metodi deprecati di Filament) si risolve con `@not-deprecated` sull'hook; i `trait.unused` si risolvono dove il trait è davvero usato (anche solo da fixture/probe di test: se escono dal perimetro analizzato l'errore torna); `Media\Actions\Image\Merge` è stata riscritta sull'API di Intervention Image 4 (`decodePath`, `createImage`, `insert`) perché con la 4.4.0 installata il vecchio codice non girava.

Le sette `method.deprecated` di `Xot/app/Filament/Traits/HasXotTable.php` si sono chiuse aggiungendo `@not-deprecated` agli override di `XotBaseRelationManager` (le due varianti), `XotBaseResource/Pages/XotBaseManageRelatedRecords` e `XotBaseListRecords` (quattro stub) e dichiarando `getTableColumns()` in `XotBaseTableWidget`. Togliere la deprecazione ha fatto emergere due segnalazioni prima nascoste (dentro un metodo deprecato le chiamate a metodi deprecati non si segnalano): `disableCreateAnother()` di Filament, sostituito dall'equivalente `createAnother(false)`, e la chiamata di `TenantsRelationManager` a `ListTenants::getTableColumns()`, chiusa dal tag su `XotBaseListRecords`.

Restano, con il motivo:
- `trait.unused` su trait senza consumatori nel repo: `Activity/.../HasSnapshots` (trait vuoto), `Xot/.../HasUuid`, `User/.../HasTeamsMembershipAdministration`, `Tenant/.../SushiToPhpArray` (merge Tenant aperto, non toccato). Cancellarli è una decisione dell'utente.
- `Xot/.../EnumIntegerTrait`: API di piattaforma senza consumatori nel repo.
- `method.notFound` ×2 in `Media/Actions/Video/ConvertVideoBy{Data,MediaConvert}Action`: `MediaExporter::save()` accetta un solo argomento, quindi il formato WebM non viene mai applicato; serve scegliere il formato.
- Non verificato: Pest (`.env.testing` punta a MySQL con dati veri); le modifiche a `InteractsWithTenant` (ora `Assert::subclassOf`: con `tenant.tenant_model` non valido lancia `InvalidArgumentException` invece dell'errore Eloquent; la chiave non è definita in nessuna config, il default è `Tenant::class`) e a `Merge.php` (provata solo con una sonda GD) non hanno test eseguiti.

### Riverifica 2026-10-30 e ripartenza (portato qui da `docs/chat/handoff-phpstan-modules-current.md`)

- `cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=-1 --no-progress` → **exit 0, 0 errori**, con `laravel/phpstan.neon` invariato. Una corsa precedente nella stessa giornata, a merge Tenant ancora aperto (`SushiToJsons.php`), ne dava 108 tutti in `Modules/TechPlanner/config/*.php` (`env()` fuori dalla cartella config, chiavi duplicate, classi `Orbit` assenti): erano sotto il claim di un altro agente e sono stati chiusi da lui.
- Lo zero vale per il working tree corrente. Le dichiarazioni di lane verdi dei giorni scorsi sono storiche: rieseguire prima di usarle come baseline.
- Ordine di ripartenza: (1) fermare ogni sync concorrente e rilanciare PHPStan; (2) raggruppare gli errori residui per causa e modulo e correggere la sorgente funzionale; (3) Pest sullo scope modificato, documentando ogni blocco ambientale; (4) auditare prompt e docs con mappa dei riferimenti solo dopo aver isolato il worktree, senza rinomine o cancellazioni di massa.
- Guardrail: nessun `mixed`, `@phpstan-ignore` o baseline per nascondere errori; ogni lane con scope disgiunto e `git status` prima di integrare; nomi `.md` nuovi in kebab-case senza date; nessun commit automatico.
- QMD: la collezione `techplanner-wiki` non esiste; usare il nome restituito da `qmd collection list` o dal wrapper `bashscripts/docs/llm-wiki-qmd.sh`.
- Non verificato: Pest (il `.env.testing` punta a MySQL con dati veri); i prompt `.txt` storici e i link legacy non sono stati riscritti in massa (servono owner e mappa canonica).

Dependencies: gdpr-sync-phpstan-complete, activity-constant-type-coverage-fix, cms-merge-conflict-resolution
Owner: AI Agent (BMAD sprint)
