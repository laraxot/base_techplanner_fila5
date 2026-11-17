---
title: "Backlog prioritizzato e roadmap di completamento (audit 2026-11-05)"
type: audit
status: review
created: 2026-11-05
updated: 2026-11-10
tags: [audit, backlog, roadmap, priorita, techplanner]
qmd: "backlog roadmap techplanner P0 P1 P2 P3 percorso critico criteri accettazione stabilizzazione production readiness"
related:
  - ./README.md
  - ./FUNCTIONAL_COVERAGE.md
  - ../stories/project-audit.story.md
---

# Backlog prioritizzato e roadmap

Gli ID `TPL-*`, `SEC-*`, `GEO-*`, `NTF-*`, `DB-*`, `OPS-*`, `TST-*` vengono dall'audit del 2026-10-29: le evidenze
di sicurezza stanno **solo** nel report riservato (`bashscripts/docs/audit/`), perché questo repository è pubblico.
Gli ID `FUN-*`, `ARC-*`, `DEV-*`, `PERF-*`, `DOC-*` sono nuovi.

Tipo: **B** bug dimostrato · **R** rischio altamente probabile · **F** funzionalità mancante confermata dal codice ·
**F?** da validare con i requisiti · **D** debito tecnico. Sforzo: S ≤ ½ giorno, M 1-3 giorni, L > 3 giorni.

## Chiusi il 2026-11-05 (nel working tree, non committati)

| ID | Cosa | Verifica |
|---|---|---|
| TPL-02 | Verifiche degli apparecchi: relazione del relation manager, colonne, campo obbligatorio senza input, form, ultima verifica per data | `DeviceVerificationTest` (9 casi) |
| TPL-01 | Lista clienti in errore senza punto di partenza | `ClientDistanceTest` |
| GEO-03 / TPL-07 | Distanze in km gonfiate del 15%; clienti senza coordinate in cima | `ClientDistanceTest` |
| FUN-06 | Appuntamenti e chiamate creati dal menu senza cliente; `PhoneCall::client()` assente | `DeviceVerificationTest` (dataset) |
| — | Residuo `Progressioni` in `MailTemplateResource` | lint |
| MAN-01 | Apparecchio non salvabile senza appuntamento (`machines.appointment_id` NOT NULL) | `ManualJourneysTest` |
| MAN-02 | Direttori sanitari: colonne del form e dell'import Access assenti nella tabella | `ManualJourneysTest` |
| MAN-03 | Filtri, «Ordina per distanza» e azioni di massa dei clienti mai mostrati (codice morto in `ListClients`) | `ManualJourneysTest` |
| MAN-04 | Schede figlie (es. Chiamate del cliente) con righe vuote: `XotBaseRelationManager` non leggeva la classe Table | `ManualJourneysTest` |
| MAN-05 | Lista clienti in errore `SvgNotFound`: file lang degli enum contatto senza `values` | `ManualJourneysTest` |
| MAN-06 | Etichette inglesi o grezze in menu, schede, titoli finestre; menu riordinato per lavoro quotidiano | revisione screenshot del manuale |

## Chiusi il 2026-11-10 (nel working tree, non committati)

| ID | Cosa | Verifica |
|---|---|---|
| TPL-04 | Policy per i 14 modelli TechPlanner: `techplanner::admin` tutto, nuovo `techplanner::operator` lavora ma non cancella | `TechPlannerPolicyMatrixTest`, browser (operatore senza cestino, 403 su modelli e-mail e gestione utenti) |
| AUTH-05 | `super-admin` entra in tutti i pannelli; `{modulo}::operator` entra nel pannello del suo modulo | browser |
| TPL-03 | `SoftDeletes` sui modelli; cestino a cascata cliente → apparecchi/verifiche/chiamate/referenti, ripristino a cascata; filtro «Record eliminati», «Ripristina», «Elimina definitivamente»; migrazione che aggiunge `deleted_at` dove manca | `SoftDeleteCascadeTest` |
| FUN-01 | Colonna «Prossima verifica» colorata e filtro «Scadenza verifica» (scadute, 30/60/90 giorni, mai verificati) | `DueVerificationsTest`, browser |
| FUN-03 | Dashboard: verifiche scadute, in scadenza, mai verificati, appuntamenti di oggi, elenco da verificare, giro di oggi | browser |
| FUN-04 | Import: aggiorna per id, partita IVA o codice fiscale invece di duplicare; ripristina dal cestino; notifica in italiano | `ClientDataQualityTest` |
| FUN-05 | Validazione partita IVA e codice fiscale (cifra di controllo, omocodie) | `ClientDataQualityTest`, browser |
| TPL-08 | Recapiti una sola volta nel modulo cliente | `ClientDataQualityTest`, browser |
| FRESH-01 | `profiles.id` ricreato bigint su SQLite/Postgres quando la tabella è vuota | migrate:fresh su SQLite |
| FRESH-02 | Installazione pulita su MySQL/MariaDB falliva: `machines.client_id` integer contro `clients.id` bigint (errno 150) | migrate:fresh e aggiornamento simulato su MariaDB 10.11, con e senza righe orfane |
| TPL-09 | Sedi legali, rappresentanti legali e direttori sanitari: moduli con colonne inesistenti e senza cliente, `LegalOffice::client()` assente: nessun salvataggio possibile | `FormsMatchSchemaTest`, browser |
| UI-01 | Testi d'aiuto e segnaposto con il nome del campo («email», «value», «remember») in tutti i pannelli | browser (pagina di accesso) |
| UI-02 | Conteggi del menu sempre «--»: id stringa nei modelli JSON (Sushi) | `CreateJsonFileByRecordActionStringIdTest`, browser |
| UI-03 | «Scollega» e «Collega» mostrati anche nelle schede uno-a-molti | browser |
| TST-07 | Test di Geo e Notify vincolati alla connessione `fixcity` di un altro progetto | Notify: da 858 falliti a 698 passati |
| DEV-02 | `composer.json` richiede PHP ^8.4 come il lock (hash del lock aggiornato) | `composer validate`, `install --dry-run` |
| OPS-07 | `deploy.sh` riscritto: lock, manutenzione, backup DB, uscita sicura | vedi `RELEASE.md` |
| RC3 | Webhook di deploy solo con firma HMAC; `test.php` rimosso; log non scaricabili; log escapati; password d'esempio rifiutata | test locale 403/403/200 |
| OPS-05 | CI su `dev`: Pest TechPlanner, migrazioni da zero su MariaDB, PHPStan+Larastan sul modulo, Pint | `.github/workflows/techplanner-ci.yml` |
| QA-01 (modulo) | PHPStan + Larastan sul modulo TechPlanner: 0 errori (`phpstan.techplanner.neon`) | |
| FUN-09 | «Richieste dal sito»: elenco e dettaglio in sola lettura delle richieste del modulo Contatti, stato di inoltro, contatore 7 giorni | `ContactMessageResourceTest`, browser |
| AUTH-06 | «Accedi con Google» dava 500: la pagina di ritorno `oauth.callback` esisteva solo nel tema Sixteen, aggiunta al tema Two | test User Socialite da 13 a 5 falliti (i 5 restanti chiedono lingue de/es non attive qui), curl 302 |
| MAIL-01 | E-mail da modello e «Nuovo modello e-mail» in errore: il tema Two non ha `mail-layouts`; ripiego sui layout di Notify | `MailLayoutFallbackTest` |
| OPS-08 | Tema Two servito via symlink come Zero e Sixteen: build in `Themes/Two/public`, symlink versionato in `public_html/themes/Two`, `npm run copy`/`sync-public` e `public/themes/Two` rimossi; `deploy.sh` pubblica lo stile del banner cookie (prima 404) | browser, curl |
| USR-02 | Etichette grezze del modulo User tradotte (112 file) | browser |
| UI-04 | Pulsante «Torna all'elenco» con chiave grezza; azioni con etichetta inglese grezza; date non in formato italiano; etichette dei campi grezze nelle schede | crawl di tutte le pagine (58 pagine, 0 errori 5xx, 0 etichette grezze) |
| — | Copie morte `*.o` delle resource rimosse; Pint applicato al modulo | |

Ancora aperti:

| ID | Priorità | Cosa |
|---|---|---|
| SEC | P0 | Rotazione delle credenziali e pulizia (azione dell'utente, report riservato) |
| DB-PROD | P0 | Provare le migrazioni su una copia del DB di produzione (azione dell'utente, `RELEASE.md`) |
| FUN-02 | P2 | Tecnico assegnato, stato e calendario degli appuntamenti (da validare con gli utenti) |
| TST-08 | P2 | Suite dei moduli condivisi (Xot, User, Notify, Cms…) con fallimenti preesistenti, legati all'ambiente di Fixcity: vedi `TEST_RESULTS.md` |
| QA-01 | P2 | Larastan attivo su tutti i moduli (oggi solo TechPlanner) |
| TST-09 | P2 | Alcuni test di Xot/Lang/Job rigenerano l'autoload senza il merge dei moduli: l'app resta senza classi dei moduli finché non si rifà `composer dump-autoload` |
| PERF-01 | P2 | Geocoding in coda invece che nella richiesta |

Manuale d'uso: `laravel/Modules/TechPlanner/docs/manual/manuale-uso.{md,pdf}` (anche documento Claude Docs). Rilascio: `RELEASE.md`.

Story: `laravel/Modules/TechPlanner/docs/stories/device-verifications-fix.story.md`.

## P0 — Bloccanti

| ID | Tipo | Descrizione | Criterio di accettazione | Sforzo | Chi |
|---|---|---|---|---|---|
| SEC (sez. 1 del report riservato) | R | Materiale riservato ancora tracciato nel repo pubblico al 2026-11-05 (riverificato: presente) | Rotazione eseguita; file fuori dal tracciamento; `.gitignore` copre le varianti | S + decisione | **Utente** |
| RC3 | R | Endpoint eseguibili nel docroot e upload senza filtro sul tipo (riverificato: `public_html/deploy/` ancora tracciato) | Nessun PHP eseguibile nelle cartelle di upload; `acceptedFileTypes` sugli upload | M | Dev |
| DB-PROD | R | La migrazione rende facoltativa `exposure_parameters` (`->change()`): eseguirla prima su una copia del DB di produzione | `migrate` provato su copia, nessun errore | S | **Utente** |

## P1 — Essenziali per il prodotto

| ID | Tipo | Descrizione | Criterio di accettazione | Sforzo |
|---|---|---|---|---|
| TPL-04 | B | Nessuna policy in TechPlanner: ogni utente del pannello legge, modifica e cancella tutto | Policy per i 9 modelli esposti; test ruolo × abilità come `UserPolicyMatrixTest` | M |
| TPL-03 | B | Cancellare un cliente cancella in cascata apparecchi, verifiche, chiamate, appuntamenti, referenti | `SoftDeletes` sui modelli; cancellazione bloccata se esistono verifiche, o conferma esplicita | M |
| FUN-01 | F | Nessuna vista degli apparecchi in scadenza (il dato esiste: `next_verification_date`) | Filtro/tab «In scadenza entro N giorni» su Dispositivi; colonna «Prossima verifica» | M |
| FUN-03 | F | Dashboard vuota | Widget: verifiche scadute, in scadenza 30 gg, appuntamenti di oggi | M |
| FUN-02 | F? | Appuntamenti senza tecnico, stato e calendario | Da validare: tecnico (`Worker` esiste), stato, vista calendario | L |
| DEV-01 | B | Suite di test non avviabile in modo standard: `vendor/` ottenibile solo ignorando la piattaforma su PHP 8.3 | Ambiente di riferimento PHP 8.4 documentato e usato da CI | S |
| DEV-02 | B | `composer.json` dichiara `php ^8.2`, `platform.php ^8.3`, ma il lock richiede ≥ 8.4.1 | Vincoli coerenti con il lock | S |

## P2 — Qualità e affidabilità

| ID | Tipo | Descrizione | Criterio di accettazione | Sforzo |
|---|---|---|---|---|
| OPS-05 / TST-06 | D | Nessuna CI su `dev` | Workflow su `dev`: Pest (moduli), PHPStan, Pint | M |
| OPS-07 / SITE-10 | R | `deploy.sh` fa `composer update -W` in produzione, cancella `database/migrations/*`, nessun `down`, backup, rollback | Deploy con `composer install --no-dev` dal lock, `down`/`up`, backup DB prima di `migrate`, procedura di rollback scritta | M |
| ARC-03 | R | 1.113 percorsi tracciati che collidono per maiuscole | 0 collisioni; controllo in CI | M |
| PERF-01 | D | Geocoding di tutti i clienti dentro una richiesta HTTP, a lotti di 50 | Job in coda con avanzamento; limite di velocità del geocoder rispettato | M |
| FUN-04 | F | Import senza deduplica | `resolveRecord()` cerca per P.IVA/CF o `id` sorgente | S |
| FUN-05 | F | Nessuna validazione di P.IVA e codice fiscale | Regole di validazione nel form e nell'import | S |
| NTF-01 | ? | Invio notifiche in blocco segnalato come non effettivo | Test che verifica l'invio (Mail::fake) | S |
| D-01 | D | Codice morto/duplicato in TechPlanner (vedi ARCHITECTURE) | Rimosso dopo verifica dei chiamanti, o documentato | S |
| D-02 | D | `Device` e `Machine` condividono la tabella `machines` (apparecchi e macchine degli appuntamenti) | Decisione documentata: un solo concetto o due tabelle | M |
| TST-07 | B | 297 test di Geo richiedono la connessione `fixcity`, di un altro progetto (`Geo/tests/TestCase.php`) | Test di Geo indipendenti dal progetto (regola di agnosticismo dei moduli) | S |
| QA-01 | D | Larastan commentato in `phpstan.neon`: con il lock attuale 10.121 errori su `Modules/` (2.019 fuori dai test) | Larastan attivo; numero di errori misurato e in calo, o baseline dichiarata | L |

## P3 — Miglioramenti

| ID | Descrizione |
|---|---|
| ARC-01 | Togliere le dipendenze di Xot da User/Tenant/Lang/Cms (ciclo) |
| ARC-02 | Allineare `modules_statuses.json` ai moduli presenti |
| DOC-01 | Aggiornare `laravel/CLAUDE.md` (dichiara Laravel 12/Filament 4/Livewire 3; il lock ha 13/5/4) e rendere la wiki leggibile senza `bashscripts/` |
| FUN-07 | Rapporto di verifica stampabile per il cliente (da validare) |
| FUN-08 | Mappa clienti nel pannello (widget esistenti non raggiungibili) |

## Roadmap

| Fase | Obiettivo | Attività | Prerequisiti | Completata quando |
|---|---|---|---|---|
| 1 Stabilizzazione | Nessuna esposizione, nessuna perdita di dati | P0 + TPL-03 + TPL-04 | Decisioni dell'utente su segreti e storia | Report riservato senza CRITICAL aperti; test policy verdi |
| 2 Completamento funzionale | Il ciclo «scadenza → chiamata → appuntamento → verifica» si chiude nel pannello | FUN-01, FUN-03, FUN-02 (se confermato), FUN-04/05 | Fase 1; requisiti validati con l'utente | J1-J6 completabili (FUNCTIONAL_COVERAGE) con test feature |
| 3 Qualità | Regressioni intercettate prima del merge | DEV-01/02, CI su `dev`, ARC-03, test sui percorsi critici | Ambiente PHP 8.4 | CI verde su `dev` per 2 settimane |
| 4 Ottimizzazione | Operazioni lunghe fuori dalle richieste | PERF-01, D-01, ARC-01 | Fase 3 | Nessuna richiesta del pannello > 2 s su dati reali |
| 5 Production readiness | Rilasci ripetibili e reversibili | OPS-07, backup/restore provati, header di sicurezza, monitoraggio errori | Fasi 1-3 | Un rilascio e un rollback eseguiti in staging |
| 6 Evoluzione | Valore aggiunto | FUN-07, FUN-08, notifiche automatiche di scadenza | Fase 2 | Validato con gli utenti |

**Percorso critico:** decisioni sui segreti (utente) → P0 → TPL-04/TPL-03 → ambiente PHP 8.4 + CI su `dev` → FUN-01 →
FUN-03 → rilascio con deploy riscritto. FUN-01 e la CI sono indipendenti e possono procedere in parallelo alla fase 1.
