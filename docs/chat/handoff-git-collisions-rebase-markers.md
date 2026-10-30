---
title: "Handoff collisioni git: rebase aperti e marker committati"
type: handoff
status: active
created: 2026-10-28
updated: 2026-10-28
tags: [git, rebase, conflitti, sync, bmad, second-brain]
qmd: "collisioni git rebase aperti marker committati dummy_push sync moduli Xot merge decisioni aperte"
issues: []
discussions: []
related:
  - ../stories/git-collision-detection-resolution-system.story.md
  - ../wiki/rules/git-forward-only.md
  - ./handoff-phpstan-modules-current.md
---

# Handoff collisioni git: rebase aperti e marker committati

> Stato verificato il 2026-10-28 con comandi di sola lettura; ogni claim va riverificato sul checkout corrente (altre sessioni scrivono in parallelo).
>
> **Aggiornamento 17:15.** Un'altra sessione ha chiuso i rebase e i merge dei moduli: nessun `rebase-merge`, `MERGE_HEAD` o file `unmerged` in nessun repo (git-dir assoluto). Chiudendoli i marker sono **riapparsi** nei commit `.` rigiocati (208 file alle 17:03, di cui 14 PHP/blade) e sono scesi a **15 `.md` alle 17:10**, tutti in Activity, quelli con contenuto diverso sui due lati (`REVIEW` del tool). Passi di questa sessione:
> - blocchi banali risolti con `resolve_merge_blocks.py --apply` (Activity, AI); `.gitattributes` di AI e Activity: tenuta l'intestazione canonica del template (la riga `# Mai: filter=lfs...` del lato scartato c'è già); marker annidati di UI e Gdpr chiusi da un'altra sessione.
> - `laravel/config/debugbar.php`: tre chiavi `'enabled'` duplicate ridotte a una, quella che rispetta «mai debugbar con APP_DEBUG=false» (valore effettivo invariato: in un array PHP vince l'ultima).
> - frontmatter YAML: nuovo `bashscripts/tools/docs/frontmatter-check.py` (`check`, `dedupe`, `selftest`). Trovati 172 file invalidi (chiavi duplicate `qmd`/`title`/`issues`, `links: {github_issue: #XXX}` in 23 decision-log, `updated: 2026-07-16=======`); `dedupe --apply` ne ha corretti 121 tenendo l'ultima chiave, restano 52 (riparazione a mano in corso). Tre `decision-log.md` (Activity, Cms, Notify) erano toccati da meno di 10 minuti e restano con `links: {github_issue: #XXX}`: vanno quotati (`"#XXX"`) a mano o con `check` + Edit; la causa è il generatore dei decision-log, non trovato in `bashscripts/`.
> - **PHPStan 17:11-17:38**: un'altra sessione ha lanciato `rm -rf laravel/vendor && composer install --prefer-source` e, in parallelo, più `composer.phar update -W`; `laravel/composer.lock` risulta modificato (983 righe aggiunte, 1508 tolte). Tre composer concorrenti sullo stesso `vendor/` sono una corsa: decidere chi li governa e rivedere il diff di `composer.lock` prima di committare. Col `vendor/` nuovo PHPStan dava 96 errori (95 in 4 script `Lang/docs/*.php`, 9 in Cms, 1 in Employee); corretti alla causa (vedi `docs/stories/all-modules-phpstan-zero-errors.story.md`). **17:38: `clear-result-cache` + `heavy-slot.sh phpstan analyse Modules` → exit 0, 0 errori.** Marker 0 in tutto il repo, nessun rebase/merge aperto, frontmatter invalidi 0 (esclusi 3 template vendorizzati in `Notify/.github/skills`). I difetti frontmatter dei file Cms sono riapparsi una volta dopo la correzione (mtime vecchi: probabile copia con `cp -p`/rsync da un albero precedente): rilanciare `frontmatter-check.py check` dopo ogni sync.
>
> Le sezioni sotto descrivono lo stato di prima (~16:45). Una bonifica «per unione» di 1517 file ha inoltre rotto 109 file di codice in `bashscripts/ai`: vedi `bashscripts/docs/stories/1.17.skills-frontmatter-repair.story.md`.

## Stato

- **10 moduli hanno un `rebase-merge` aperto** di `dev` su `laraxot/dev` (HEAD staccata): Activity 1/5, AI 1/5, Cms 3/5, Gdpr 1/5, Job 1/5, Lang 1/6, Media 1/2, Seo 1/2, TechPlanner 1/1, UI 1/16. **Xot** ha `MERGE_HEAD`.
- Nessun file `unmerged`: i marker erano dentro commit con messaggio `.`. Nel working tree i marker sono **0** (`python3 -I bashscripts/tools/resolve_merge_blocks.py <root>`).
- `cd laravel && ./vendor/bin/phpstan analyse Modules` (cache pulita, via `heavy-slot.sh`) → **exit 0, 0 errori**. Vale per il working tree a metà rebase.
- Controllo dello stato: `git -C <modulo> rev-parse --absolute-git-dir` poi `ls` di `rebase-merge`/`MERGE_HEAD`. Non usare `.git` relativo: dà "nessuna operazione" anche quando c'è.

## Causa

`dummy_push()` (`bashscripts/lib/custom.sh`, chiamata da `sync_remote_repo{,_2,_3}.sh`) fa `git add -A`, `git commit -am "."` e push senza guardie. Con un rebase fermo committa i marker e il push li pubblica. Il commit `.` si ripete a ogni giro (batch 15:50 e 16:43 del 2026-10-28).

**Correzione fatta:** guardia all'inizio di `dummy_push` che ritorna `0` (non `1`: i caller hanno `set -euo pipefail`) se è aperto `rebase-merge`, `rebase-apply`, `MERGE_HEAD`, `CHERRY_PICK_HEAD` o `REVERT_HEAD`. Provata su un repo fixture, non su repo veri.

**Non toccato:** `git pull --rebase --depth=1 --strategy-option=ours` dei sync, che ha già riscritto il remoto laraxot su provtv (`bashscripts/ai/wiki/memories/incident-sync-script-rewrote-laraxot-remote-to-provtv.md`).

## Recupero del contenuto

Un'altra sessione ha tolto i marker alle 16:34:57, spesso tenendo il lato upstream. Nove agent (uno per modulo) hanno confrontato 96 file con 4 o più righe perse: i lati scartati erano quasi sempre stub, link rotti o classi inesistenti. Recuperate circa 30 righe (intestazione `Canon:` dei `.gitattributes`, voci dei `.gitignore`, sezioni di docs in Activity, Media, Lang e Xot).

## Nomi `.md`

`md-filenames.py apply` su Notify, User e `docs/` radice: 250 rinomine, 41 copie contenute rinominate `.old`, 1626 riferimenti riscritti; violazioni da 534 a 243. **283 riferimenti saltati** perché in file sporchi o occupati: ripetere `python3 -I bashscripts/tools/docs/md-filenames.py links` e correggerli a mano. Restano fuori i moduli con rebase aperto, `bashscripts/ai/.agents` e `bmad-output`.

## Decisioni aperte (spettano all'utente)

1. ~~Chiudere i rebase e il merge~~ superata alle 17:03: li ha chiusi un'altra sessione. Resta da verificare che `dev` di ogni modulo contenga il lavoro locale (`git -C <modulo> log --oneline -5`) e che non restino marker.
2. `Xot/app/Models/Traits/TypedHasRecursiveRelationships.php` è stato cancellato e committato dal sync: era l'unico errore PHPStan, ma era una scelta di design da fare.
3. `Activity/docs/module.md` (stub di 14 righe contro 318 scartate), `Activity/docs/module-analysis.md`, `Lang/docs/00-index.md` contro `00-INDEX.md`, stile del README di Gdpr e Job, impostazioni IDE nei `_*.code-workspace`.

4. Dagli agent di docs (17:25), non toccato da nessuno:
   - **`mixed`**: `00-master-prompt.md`, `25-services-to-actions.md`, `README.md:195` dicono «ultima spiaggia» (come l'utente), il mio brief diceva «mai». Valgono i prompt, il brief era sbagliato.
   - **`@phpstan-ignore`**: 80 nel codice di `Modules/*/app` contro la regola; vedi il debito in `docs/stories/all-modules-phpstan-zero-errors.story.md`.
   - **Duplicati esatti**: Employee 66 gruppi (68 copie), Geo 41 gruppi (88 file), 43 coppie `.md`/`.txt` nei prompt. Trasformarli in rimandi di 1-2 righe richiede riscrivere corpi interi: decidere quale copia è canonica.
   - **Docs di altri progetti nei moduli**: User cita Fixcity (58 file), SaluteOra (86), Patient (82); Geo e Sixteen citano Fixcity; Zero/Cms/Quaeris. Il modulo non è in questo checkout.
   - **Issue/URL**: `brainstorm-test-case-architecture-laravel-modules.md` (Activity) tiene l'issue 316 del repo `base_fixcity_fila5`, ma nessuno dei due repo è questo; User ha 792 `issues:` boilerplate verso `provtv/base_ptv_fila5#124`, 403 `canonical:` verso `Themes/docs/shared-components/` che non esiste.
   - **Migrazioni nei test**: `Modules/Xot/tests/TestCase.php` dice di eseguire `php artisan migrate --env=testing` a mano, `XotBaseTestCase::createApplication()` non migra; `Activity/tests/TestCase.php` ha `$connectionsToTransact = ['sqlite','activity','user']` mentre la sua doc dice `mysql`. User ha 5 migrazioni che creano `model_has_roles`/`model_has_role`, contro «una migrazione per modello».
   - **Rinomine annullate (17:35)**: `md-filenames.py apply` aveva rinominato 27 file di skill BMAD/laravel-upgrade vendorizzate in `bashscripts/ai/wiki/skills/` (es. `step-04-session-01..07.md`, richiamati per nome dal workflow; `from-9-to-10.md` perdeva la versione di arrivo). Rimessi al nome originale e riportati i riferimenti; il tool ora salta `/wiki/skills/` e `/.agents/skills/` e tiene i numeri dopo `to`, `session`, `laravel`, `filament`. Restano 50 nomi non conformi: collisioni (due file datati sullo stesso nome pulito: serve scegliere/unire), `.agents/memories` e `.agents/docs`, file occupati.
   - **Comando di rinomina**: eseguire sempre `md-filenames.py apply ... --map-out FILE` (senza, `fixrefs` non può riscrivere i riferimenti dei file che erano sporchi: 915 saltati nell'ultimo giro, ricostruiti dalla storia git e ridotti a 15).
5. `deploy.sh` (`bashscripts/lib/`): ha già le emoji (altra sessione, 17:18, non committate nel repo `bashscripts`). Fa `rm -rf database/migrations/*`, `sudo chown -R www-data:www-data .` e `composer update -W`: i `composer update -W` visti alle 17:11-17:16 combaciano; `composer.lock` ora ha 983 righe aggiunte e 1508 tolte (Filament 5.10 → 5.11 e altri). Non committare `composer.lock` senza rieseguire PHPStan e Pest.

## Altri filoni della stessa giornata (2026-10-28, sera)

- **Tenant `SushiToJsons`:** l'utente ha corretto `collectRowsFromJsonFiles` (una sola sorgente: `config/<tenant>/database/content/<tabella>`); il livello baseline moduli/temi era un errore (bisogno di Fixcity). Corrette le regressioni della riscrittura (guardia cartella assente, `dddx`, `array_values`). Vedi `laravel/Modules/Tenant/docs/stories/sushi-json-single-tenant-source.story.md`.
- **UI/UX mobile:** `docs/stories/mobile-ui-ux-pass.story.md` (Xot `stackedOnMobile` + CSS 44 px, Employee time clock, TechPlanner tabelle, tema Two; in Sixteen era fuori perimetro, vedi il filone `data-*` sotto). PHPStan `Modules` a 0 errori dopo tutto. Aperti: `npm run build` dei temi, `pub_theme` triplicato in `xra.php`.
- **Employee, autorizzazione assenze (2026-10-29):** in Filament una policy senza il metodo consente (e il suo `before()` non gira), quindi un dipendente poteva approvarsi da solo. Policy esplicita, campi `status`/`user_id` nascosti e forzati lato server, `approve`/`reject` autorizzate; sonda sul Gate 40/40, PHPStan Employee 0, test Pest scritto e non eseguito. Aperto: chi e' il responsabile (oggi solo `super-admin`) e `WorkHourPolicy` ancora vuota. Vedi `laravel/Modules/Employee/docs/stories/absence-request-authorization.story.md`.
- **Sixteen, parità HTML (2026-10-29):** `data-sixteen-*` era sbagliato. Nel riferimento Design Comuni (33 pagine) ci sono solo 12 nomi `data-*` (`data-element`, `data-bs-*`, `data-step`, …), nessuno col nome di un tema. La regola `013-design-comuni-html-match` lo vietava già, ma il trigger map non la caricava per task di UI/UX o di tema, e `public-theme-resolution-and-vite-assets` diceva già che il tema del tenant è Two. Codex (task `data-attribute-parity`, lock `*.lock` in `Themes/Sixteen`) ha rinominato `data-sixteen-*` → `data-*` nei sorgenti (zero residui); da parte mia: tolto `loading="lazy"` da `segnalazioni/layout`, regola in 013, `design-comuni-header-parity` e `Themes/Sixteen/docs/data-attribute-rule.md`, riga nel trigger map, memoria. **Per codex:** su `ui/header`, `ui/app/header` e `sections/header_bi5` il tag `<header>` ha `data-mobile-nav-target`, mentre nel riferimento (e in altre 7 varianti) è `data-bs-target="#header-nav-wrapper"`; `ui/header.blade.php` non compila (apice non escapato alle righe 59 e 66, preesistente). **Aperti (utente):** `npm run build` di Sixteen (i bundle tracciati in `public/assets` hanno ancora i vecchi selettori) e l'audit degli 83 `data-*` custom emessi dalle Blade. Vedi `laravel/Themes/Sixteen/docs/stories/data-attribute-parity.story.md`.
- Lo stesso messaggio utente puo' arrivare a due sessioni Claude insieme: controllare `git status` e mtime e rileggere prima di ogni Edit.

## Ripartenza

1. Leggere questo file e `git-forward-only.md`. 2. `ps -eo pid,etimes,args | grep -E "claude|codex|pi|kilo|opencode"` e stato rebase di ogni modulo. 3. Mai provare funzioni distruttive su repo veri. 4. Non fare commit senza richiesta: il sync li fa già, e solo se non c'è un rebase aperto.
