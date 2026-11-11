---
title: "Strumenti eseguiti ed esiti (audit 2026-11-05)"
type: audit
status: review
created: 2026-11-05
updated: 2026-11-11
tags: [audit, test, pest, phpstan, larastan, pint, ambiente]
qmd: "risultati test pest phpstan larastan pint techplanner php 8.4 ambiente composer packagist 10121 errori"
related:
  - ./README.md
  - ./BACKLOG_AND_ROADMAP.md
---

# Verifica finale 2026-11-10/11 (pronto al rilascio)

Ambiente: PHP 8.4.27, MariaDB 10.11 (driver `mysql`, come in produzione), Chromium/Playwright per il pannello.

| Controllo | Esito |
|---|---|
| Pest modulo TechPlanner (SQLite in memoria) | **119 passati, 0 falliti** (erano 55 il 2026-11-05) |
| PHPStan + Larastan + regole Safe, modulo TechPlanner (`phpstan.techplanner.neon`) | **0 errori** |
| PHPStan sui file dei moduli condivisi toccati (Xot, User, Lang, Tenant) | 0 errori |
| Pint sul modulo TechPlanner | conforme |
| `migrate:fresh` su MariaDB (installazione pulita) | **tutte le migrazioni eseguite** (prima falliva su `machines.client_id`) |
| Aggiornamento simulato da schema vecchio, con e senza righe orfane | ok; con righe orfane il vincolo viene rimandato, i dati restano |
| `migrate:fresh` su SQLite | ok, `profiles.id` intero autoincrementale |
| `deploy.sh` eseguito per intero contro il DB di prova | `DEPLOY_SUCCESS`, copia del DB creata, sito rimesso online |
| Webhook `deploy.php` | senza firma 403, firma sbagliata 403, firma giusta 200 |
| Crawl del pannello: elenco, nuovo, scheda, modifica di 8 risorse, come amministratore e come operatore | **58 pagine, 0 errori 5xx, 0 etichette grezze**; operatore: 403 su modelli e-mail (atteso) |
| Schede del cliente: creazione di rappresentante, sede legale, direttore sanitario | salvati |
| Sito pubblico (home, accesso, contatti) con il tema servito via symlink | ok; «Accedi con Google» senza credenziali: 302 con messaggio (prima 500) |

## Suite dei moduli condivisi (preesistenti, ambiente Fixcity)

I moduli condivisi tra i progetti hanno test scritti per l'ambiente di Fixcity (lingue de/es, dati di esempio,
connessioni dedicate, esecuzione non da root). Confronto con la prima misura del 2026-11-10, stesso ambiente MariaDB:

| Modulo | Prima (falliti / passati) | Dopo | Note |
|---|---|---|---|
| User | 221 / 1183 | **201 / 1203** | DB appena migrato; 1 «nuovo» fallito dipende da righe rimaste da altri test |
| Notify | 858 / 0 (connessione `fixcity`) → 158 / 698 | **156 / 700** | TST-07 |
| Geo | 352 / 305 | **94 / 561** | TST-07 |
| UI | 17 / 211 | 17 / 211 | invariato |
| Tenant | 18 / 185 | 18 / 186 | +1 test (id stringa nei JSON) |
| Cms | 138 / 564 | 136 / 566 | |
| Activity | 49 / 468 | 49 / 468 | |
| Media, Gdpr | 36 / 256, 82 / 157 | 37 / 255, 84 / 155 | eseguiti mentre il DB veniva ricreato: scarto non legato al codice |
| Employee, AI | 26 / 20, 6 / 60 | 26 / 20, 6 / 60 | |
| Xot (SQLite) | — | 92 / 788 | rompe l'autoload a fine esecuzione (TST-09) |
| Lang, Job, Seo (SQLite) | — | 29 / 230, 71 / 292, 5 / 126 | |

Tutti i test stanno nella cartella `tests/` del proprio modulo (`laravel/Modules/<Modulo>/tests`); `laravel/tests/` non
si usa. La CI esegue `vendor/bin/pest Modules/TechPlanner/tests`.

Nessun test dei moduli condivisi fallisce per una modifica di questo rilascio (confronto nome per nome su User; gli altri
hanno conteggi uguali o migliori). Attenzione: alcuni test di Xot/Lang/Job rigenerano l'autoload di Composer senza il
plugin di merge dei moduli e lasciano l'applicazione senza classi dei moduli; dopo averli eseguiti serve
`composer dump-autoload` (finding TST-09).

# Strumenti eseguiti ed esiti (audit 2026-11-05)

Ambiente: container Linux, PHP **8.4.27 compilato dai sorgenti** (`php/php-src`, tag `php-8.4.27`) perché il lock
richiede PHP ≥ 8.4.1 e il sistema ha 8.3. Dipendenze installate dal `composer.lock` senza modificarlo: Packagist e
l'API GitHub non sono raggiungibili da qui, quindi i pacchetti vengono da clone git; `phpstan/phpstan` (solo dist)
da un archivio costruito dal suo repo pubblico allo stesso commit. Database: SQLite in memoria.

## Esiti

| Strumento | Ambito | Esito | Note |
|---|---|---|---|
| Pest | `Modules/TechPlanner/tests` | **48 passati**, 0 falliti (213 asserzioni) | Comprende i 2 file nuovi: `DeviceVerificationTest` (9), `ClientDistanceTest` (3) |
| Pest | `Modules/Geo/tests` | 305 passati, **352 falliti**, 8 todo, 2 skip, 2 risky | 297 falliscono per la connessione DB `fixcity` (di un altro progetto) richiesta da `Geo/tests/TestCase.php` (TST-07); gli altri per chiamate HTTP esterne e binding mancanti. Nessun fallimento coinvolge `scopeWithDistance`, modificato oggi |
| PHPStan (config del progetto, livello max) | tutto `Modules/` | **10.121 errori** (2.019 fuori dai test) | `phpstan.neon` ha Larastan commentato: senza le sue regole le chiamate statiche dei modelli risultano «undefined». Il «0 errori» dichiarato in docs non vale con il lock attuale (QA-01) |
| PHPStan + Larastan (config temporanea fuori dal repo) | `Modules/TechPlanner` | 92 errori, di cui 2 nell'app (prima delle correzioni) | Con Larastan l'app di TechPlanner passa da 29 a 2 errori: conferma la causa |
| PHPStan, config del progetto e con Larastan | i 14 file PHP modificati o nuovi | **0 errori** | Esclusi i `method.internalClass` di Pest (29 nei 2 test nuovi): stessi errori di tutti i test del repo (2.484 in totale) |
| Pint (`pint.json` del progetto) | file modificati | applicato | Ha riformattato anche righe preesistenti di `GeoTrait.php` (solo stile) |
| `php -l` | file modificati | nessun errore | |
| npm audit (`--omit=dev`) | `laravel/package-lock.json` | 0 vulnerabilità | |
| composer audit | — | **non eseguibile** | Packagist bloccato dal proxy; database advisory GitHub e OSV non raggiungibili. L'audit del 2026-10-29 riportava 1 advisory medio |

## Difetti dimostrati a runtime

| Difetto | Prova |
|---|---|
| TPL-01: lista clienti in errore senza punto di partenza | `ClientDistanceTest`: `$client->getAttribute('distance')` senza `withDistance()` lancia `LogicException` (Eloquent tratta `GeoTrait::distance()` come relazione) |
| GEO-03: km gonfiati | Venezia–Treviso con le coordinate del test: ora 25,77 km; con `* 1.1515` erano 29,67 km (+15%) |
| TPL-02: verifiche non salvabili | Vedi la prova di regressione sotto |

**Prova di regressione.** I 12 test nuovi eseguiti sul codice originale (worktree separato su `19909e62b`, stesso
`vendor/`): **9 falliti, 3 passati**. Passano già i 3 che coprono comportamenti non modificati (FK su installazione
nuova, apparecchio senza verifiche «da verificare», relazione `Appointment::client()`). Con le correzioni: 12 su 12.

## Errore di diagnosi corretto durante la verifica

L'analisi iniziale riteneva sbagliata la FK `device_verifications.device_id → machines`. Il primo giro di test ha
mostrato che `Device` usa proprio la tabella `machines`: la FK era giusta. Il codice che la «riparava» è stato
rimosso prima di qualsiasi commit; story e documenti sono stati corretti.

## Non eseguito

- Suite completa di tutti i moduli (stima > 3.000 test; ambiente con connessioni di altri progetti).
- Prove nel browser del pannello, `migrate` su MySQL reale, test su dati di produzione.
- Strumenti SAST (Semgrep, Gitleaks): non installati, nessuna rete verso i loro registri.
