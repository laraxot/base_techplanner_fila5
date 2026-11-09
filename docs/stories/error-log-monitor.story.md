---
title: "Controllo e correzione periodica degli errori di produzione"
type: story
status: done
created: 2026-11-06
tags: [monitoring, cron, codex, production]
---

# Controllo errori ogni cinque minuti

## Richiesta

Controllare i log di sottana.com ogni cinque minuti e correggere gli errori applicativi individuati, anche dopo la fine della conversazione.

## Perimetro e coordinamento

- Un solo worker alla volta tramite `flock`; questa story e' il riferimento canonico per setup e worker successivi.
- Leggere gli incrementi dei log Laravel, browser e Nginx dei domini sottana.com e sottana.net.
- Avviare Codex soltanto in presenza di nuovi errori, come utente `ploi` e con approvazioni non interattive. Il tentativo workspace-write ha fallito per `bwrap: setting up uid map: Permission denied`; su questo server si usa `danger-full-access`, come nella sessione di setup, senza sudo. I limiti operativi sono istruzioni del worker, non isolamento del filesystem.
- Rispettare i lock e le modifiche degli altri agenti; mai commit, push, reset, migrazioni o modifiche ai dati di produzione.
- Conservare i log originali; registrare controlli, correzioni e blocchi nello stato locale privato del monitor.

## GitHub (tracciamento)

Repository verificato dal remote: `laraxot/base_techplanner_fila5`.

DA CREARE: il connettore GitHub restituisce HTTP 403, `Resource not accessible by integration`. Nessun link inventato. Comando da eseguire con un account abilitato:

```bash
gh issue create --repo laraxot/base_techplanner_fila5 --title "Monitoraggio ogni 5 minuti e correzione errori applicativi" --body "Story canonica: docs/stories/error-log-monitor.story.md"
```

## Criteri di accettazione

- [x] Scanner incrementale verificato: quattro test isolati verdi, inclusi rotazione/troncamento e retry senza perdita di errori.
- [x] Codex non interattivo autenticato; smoke test MONITOR_OK e MONITOR_COMMAND_OK riusciti.
- [x] Primo ciclo reale concluso con `no_action`: errori storici gia' corretti. Scanner successivo senza nuovi errori. Verifica parent autenticata su devices/create e mail-templates/create: HTTP 200 per entrambe.
- [x] Cron ogni cinque minuti installato nell'account `ploi`, senza alterare altri job; lock verificato durante il primo worker.
- [x] Report e procedura di disattivazione documentati.

## Gestione del servizio locale

- Script generico e contratto: `bashscripts/tools/monitoring/error-log-watch.cjs`, `bashscripts/docs/error-log-watch.md`.
- Configurazione privata e stato: `/home/ploi/.local/state/sottana-log-watch/`.
- Stato corrente: `status.json`; ultimo risultato strutturato: `last-report.json`; diagnostica: `last-worker.log` e `cron.log`.
- Cron: `*/5 * * * *`, tag `sottana-error-log-watch`; i trigger durante una riparazione vengono saltati grazie al lock.
- Pausa: `touch /home/ploi/.local/state/sottana-log-watch/disabled`.
- Ripresa: `rm /home/ploi/.local/state/sottana-log-watch/disabled`.
- Rimozione completa della pianificazione: eliminare soltanto la riga con tag `sottana-error-log-watch` usando `crontab -e`.


## Verifica errori applicativi — 2026-11-06 12:55 UTC

- Esito: `no_action`; nessuna nuova patch applicativa. Lock della story acquisito per questa nota, senza sovrascrivere le modifiche preesistenti.
- Bootstrap: Spatie Data installato e lock concordano su `4.23.1`; `ValidationStrategy` e configurazione caricabili. Errori `Log []`/`view` associati al bootstrap incompleto durante l'aggiornamento delle dipendenze (metadati vendor aggiornati alle 12:38 UTC), ora non riprodotti.
- Correzioni gia' presenti in history: icone italiane sotto `values` (`11bc4843f`), etichetta cliente del Select dispositivi con fallback (`a0b41156f`, `0f89f7c35`), controllo directory email (`0b714fdfb`) e layout `base.html` (`0390c09d1`). Nessuna duplicazione dei fix.
- Verifiche riuscite (exit 0): `php -l` su configurazioni data/logging, traduzioni indirizzi, DeviceForm e HtmlLayoutPathSelect; PHPUnit Assert in processo PHP isolato senza DB: 21 icone/SVG, quattro casi etichetta cliente (null/vuoto/nome/ragione sociale), layout presente e directory assente.
- HTTP: login amministrativo e frontoffice `200`; JavaScript Livewire effettivamente referenziato `200`; direttori sanitari, creazione dispositivi e creazione template email `302` verso login. Contenuti autenticati non verificati via HTTP; i componenti interessati sono verificati in isolamento.
- Pubblicazione Livewire: stack esclusivamente CLI (`livewire:publish` → `vendor:publish`), nessun guasto applicativo corrente; parent di destinazione scrivibile e asset runtime disponibile. Nessuna ripubblicazione o modifica permessi.
- Limite documentale: healthcheck wiki fallisce per riferimenti-directory salvati come file; QMD e prompt harness indicato non disponibili. Consultate le fonti leggibili in `bashscripts/ai/wiki/` e le istruzioni owner. Nessuna modifica a monitor, cron, autenticazione, dipendenze o dati.

## Verifica eventi Nginx — 2026-11-06 21:01 UTC

- Esito: `no_action`. I due eventi delle 20:56 UTC sono richieste agli elenchi delle directory `/.well-known/` e `/vendor/`, negati da Nginx; nessun errore applicativo da correggere nei due eventi segnalati.
- Riletti entrambi gli eventi originali senza riportare dati dei client. Verificati vhost attivo, directory fisiche, `try_files` e history dell'entrypoint: le directory vengono gestite da Nginx prima del front controller. La location ACME resta dedicata a `/.well-known/acme-challenge/`.
- Verifiche HTTP riuscite (`curl`, exit 0): `/.well-known/` → `403`, `/vendor/` → `403`, homepage → `302` → `/it` → `200`. Nessuna modifica a codice, configurazione, sicurezza o log; le richieste di verifica possono produrre ulteriori eventi Nginx equivalenti.
- Aggiornata soltanto questa story con lock acquisito e poi rilasciato; controlli Markdown su diff, frontmatter e link. PHP/Pest/PHPStan e aggiornamento indice QMD non applicabili: sola nota operativa, nessun codice o corpus wiki modificato.
- Limite documentale invariato: healthcheck wiki fallito per directory salvate come file; QMD assente. Consultate le fonti equivalenti leggibili in `bashscripts/ai/wiki/`.

## Verifica eventi Nginx — 2026-11-06 21:06 UTC

- Esito: `no_action`. Riletti i due eventi delle 21:00:45 UTC: elenchi delle directory `/.well-known/` e `/vendor/` negati da Nginx, stesso comportamento gia' verificato nel ciclo precedente; nessun errore applicativo nei due eventi.
- Controlli riusciti (exit 0): eventi originali e directory prive di index verificati senza riportare dati dei client; riletti vhost, include e history del front controller. Homepage HTTP `200` dopo un redirect. Nessuna nuova richiesta alle directory negate, per evitare altri eventi equivalenti di verifica.
- Aggiornata solo questa nota, con lock; preservato il contenuto preesistente. Validazione Markdown e diff; nessuna modifica applicativa, al monitor o alla configurazione. PHP/Pest/PHPStan non applicabili alla sola nota operativa.
- Limite documentale confermato: healthcheck fallito (3 file wiki), QMD e riferimenti bootstrap non disponibili nei path indicati; consultate le fonti leggibili in `bashscripts/ai/wiki/`.


## Verifica Passport e richieste ACME — 2026-11-07 03:47 UTC

- Esito: `blocked` per Passport. Mancano la chiave privata e quella pubblica nei percorsi effettivi `storage/oauth-private.key` e `storage/oauth-public.key`; entrambe le alternative nella configurazione runtime sono assenti. Serve una coppia OAuth valida della distribuzione, non disponibile in questa esecuzione; nessuna generazione o modifica di materiale crittografico di produzione.
- Causa confermata senza stampare segreti: bootstrap riuscito, `CryptKey` rifiuta entrambe le sorgenti e la risoluzione di `AuthorizationServer` riproduce esattamente `LogicException: Invalid key supplied`. Studiati provider, chiamanti vendor, route e history (`bb8832ec9`, `ac01e4ac1`): nessun fix gia' presente per le chiavi mancanti.
- Verifiche riuscite (exit 0): `php -l` sul provider User e sulle configurazioni Passport del modulo, globale e del tenant; diagnosi PHP isolata senza query o scritture DB. HTTP: `/` → `302`, `/it` → `200`, `/oauth/authorize` → `500` confermato; la richiesta diagnostica produce un ulteriore evento equivalente. L'URI dell'evento originale non e' ricostruibile dal vhost, che ha `access_log off`.
- Eventi Nginx delle 03:40:30 e 03:40:31: `no_action`; confermati il file letterale `*` inesistente e l'elenco directory ACME negato. Verificati location dedicata, `try_files` e directory priva di index; nessuna modifica alla sicurezza e nessuna nuova richiesta ai percorsi ACME segnalati.
- Aggiornata soltanto questa story con lock, preservando le note preesistenti. Nessuna patch applicativa; test Pest/PHPStan non applicabili alla sola nota. Materiale OAuth da ripristinare tramite il responsabile della distribuzione; nessuna modifica a monitor, cron, autenticazione Codex, dipendenze o dati.
- Limite documentale confermato: healthcheck wiki fallisce e QMD e' assente; letti bootstrap, trigger e regole lock nelle copie leggibili di `bashscripts/ai/wiki/`, istruzioni Laravel e wiki owner User. Il riferimento canonico ulteriore dell'owner e' mancante.

## Ricontrollo Passport e richieste ACME — 2026-11-07 03:51 UTC

- Esito: `blocked`, confermato il blocco precedente. Chiavi OAuth privata e pubblica ancora assenti sia nella configurazione runtime sia nei percorsi storage effettivi; occorre ripristinare la coppia valida della distribuzione tramite il responsabile, materiale non disponibile in questa esecuzione.
- Diagnosi PHP isolata riuscita (exit 0), con guardia che impedisce ogni query SQL: bootstrap valido, entrambe le sorgenti rifiutate da `CryptKey` e `AuthorizationServer` ancora in `LogicException: Invalid key supplied`. Riletti chiamanti e history; nessuna correzione applicativa da duplicare.
- Verifiche riuscite (exit 0): sintassi provider User e tre configurazioni Passport; homepage HTTP `200` dopo un redirect. Nessuna nuova richiesta OAuth destinata a generare lo stesso errore. Eventi originali Laravel/Nginx riletti senza dati dei client; richieste ACME non applicative, file letterale `*` assente ed elenco directory negato, location dedicata confermata.
- Aggiornata solo questa nota sotto lock, preservando le modifiche preesistenti; validazione diff e Markdown. Nessuna patch PHP, quindi Pest/PHPStan non applicabili. Limiti wiki/QMD invariati; nessuna modifica a chiavi, dati, sicurezza, monitor o cron.

## Ricontrollo Passport e richieste ACME — 2026-11-07 04:12 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Nessuna patch applicativa o generazione di chiavi.
- Diagnosi PHP isolata completata (exit 0): bootstrap valido, guardia SQL attiva con zero query tentate, entrambe le sorgenti rifiutate da `CryptKey` e `AuthorizationServer` ancora in `LogicException: Invalid key supplied`. Chiamanti e history ricontrollati; nessun fix da duplicare.
- Verifiche riuscite (exit 0): sintassi provider User e tre configurazioni Passport; homepage HTTP `200` dopo un redirect. Eventi originali riletti senza dati dei client; eventi ACME non applicativi, file letterale `*` assente ed elenco directory negato. Nessuna nuova richiesta ai percorsi OAuth o ACME segnalati.
- Il primo tentativo diagnostico ha bloccato anche la creazione delle connessioni richiesta dal bootstrap Tenant: l'eventuale evento CLI `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva da questa verifica, non da una richiesta applicativa. Il controllo successivo usa la guardia prima delle query e si conclude correttamente.
- Aggiornata solo questa nota con lock, preservando il contenuto preesistente. Healthcheck wiki fallito e QMD assente; consultate le copie leggibili e le istruzioni owner, il cui ulteriore riferimento canonico resta mancante. Nessuna modifica PHP: Pest/PHPStan non applicabili.

## Ricontrollo Passport e classificazione eventi — 2026-11-07 04:16 UTC

- Esito: `blocked`. Confermata l'assenza di entrambe le chiavi OAuth nella configurazione runtime e nei percorsi effettivi `storage/oauth-private.key` e `storage/oauth-public.key`. Occorre ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione.
- Diagnosi isolata riuscita (exit 0): bootstrap valido, guardia SQL su entrambe le connessioni create, zero query tentate; `CryptKey` e `AuthorizationServer` restituiscono ancora `Invalid key supplied`. Chiamanti e history ricontrollati, nessun fix da duplicare.
- `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` delle 04:11:26 proviene dalla precedente diagnosi CLI documentata sopra; nessun errore applicativo da correggere. Eventi ACME originali confermati: file letterale `*` assente ed elenco directory negato, senza nuove richieste ai percorsi segnalati.
- Verifiche riuscite: sintassi del provider User e delle tre configurazioni Passport; homepage HTTP `200` dopo un redirect. Nessuna nuova richiesta OAuth. Aggiornata soltanto questa story sotto lock, preservando le note precedenti; nessuna patch PHP, quindi Pest/PHPStan non applicabili. Limiti documentali wiki/QMD invariati; nessuna modifica a chiavi, dati, monitor o cron.

## Ricontrollo Passport e classificazione eventi — 2026-11-07 04:36 UTC

- Esito: `blocked`. Entrambe le chiavi OAuth ancora assenti nella configurazione runtime e nei percorsi storage effettivi; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Nessuna patch applicativa o generazione di chiavi.
- Diagnosi isolata riuscita (exit 0): bootstrap valido, due connessioni protette, zero query e zero accessi PDO tentati; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Chiamanti e history ricontrollati, nessun fix da duplicare.
- Eventi originali confermati senza riportare dati dei client: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` proviene dalla precedente verifica CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato). Sintassi provider User e tre configurazioni Passport valida; homepage HTTP `200` dopo un redirect, senza nuove richieste OAuth o ACME.
- Aggiornata solo questa story sotto lock, preservando le note precedenti; lock rimosso e controlli Markdown/diff eseguiti. Nessuna modifica PHP: Pest/PHPStan non applicabili; indice QMD non aggiornato per sola nota operativa. Healthcheck wiki fallito, QMD assente e grafo Graphify mancante; consultate le copie leggibili e le istruzioni owner. Nessuna modifica a chiavi, dati, monitor o cron.

## Ricontrollo Passport e classificazione eventi — 2026-11-07 04:57 UTC

- Esito: `blocked`. Entrambe le chiavi OAuth restano assenti nella configurazione runtime e nei percorsi storage effettivi. Serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione; nessuna patch applicativa o generazione di chiavi.
- Diagnosi PHP isolata riuscita (exit 0): bootstrap valido, due connessioni protette, zero query e accessi PDO tentati. `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`; route authorize presente. Riletti chiamanti e history, nessun fix da duplicare.
- Confermati gli eventi originali: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente verifica CLI; richieste ACME non applicative, file letterale `*` assente ed elenco directory negato. Sintassi provider User e tre configurazioni Passport valida; homepage HTTP `200` dopo un redirect. Nessuna nuova richiesta OAuth o ACME.
- Aggiornata solo questa story sotto lock, preservando le note precedenti; verifica Markdown e diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Limiti documentali confermati: healthcheck wiki fallito, QMD assente e grafo Graphify mancante; consultate copie leggibili e istruzioni owner. Nessuna modifica a dati, chiavi, monitor o cron.

## Ricontrollo Passport e classificazione eventi — 2026-11-07 05:17 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; occorre ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite: bootstrap e diagnosi isolata (exit 0), due connessioni protette, zero query e accessi PDO tentati; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi provider User e tre configurazioni Passport valida; homepage HTTP `200` dopo un redirect. Riletti chiamanti e history; nessun fix da duplicare, nessuna nuova richiesta OAuth o ACME.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata confermata). Aggiornata soltanto questa story sotto lock, preservando il contenuto precedente; validazione Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner. Nessuna modifica a chiavi, dati, monitor o cron.

## Ricontrollo Passport e classificazione eventi — 2026-11-07 05:36 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi. Serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione; nessuna patch applicativa o generazione di chiavi.
- Diagnosi isolata riuscita (exit 0): bootstrap valido, due connessioni protette, zero query e accessi PDO tentati; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`, route authorize presente. Chiamanti e history ricontrollati; sintassi provider User e tre configurazioni Passport valida, homepage HTTP `200` dopo un redirect. Nessuna nuova richiesta OAuth o ACME.
- Eventi originali riletti senza dati dei client: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` proviene dalla precedente verifica CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato). Aggiornata solo questa story sotto lock, preservando le note precedenti; controlli Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD assente e grafo Graphify mancante; consultate copie leggibili e istruzioni owner, il cui ulteriore riferimento canonico resta mancante. Nessuna modifica a chiavi, dati, monitor o cron.

## Ricontrollo Passport e classificazione eventi — 2026-11-07 05:57 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi. Occorre ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione; nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): diagnosi isolata con bootstrap valido, due connessioni protette, zero query e zero accessi PDO tentati; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi provider User e tre configurazioni Passport valida; homepage HTTP `200` dopo un redirect. Riletti chiamanti e history; nessun fix da duplicare.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` e' una precedente verifica CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata verificata). Nessuna nuova richiesta OAuth o ACME. Aggiornata soltanto questa story sotto lock, preservando le note precedenti; lock rimosso e controlli Markdown/diff eseguiti. Nessuna modifica PHP: Pest/PHPStan non applicabili; indice QMD non aggiornato per sola nota operativa. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, il cui riferimento canonico ulteriore resta mancante. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 06:16 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO tentati; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi provider User e tre configurazioni Passport valida; homepage HTTP `200` dopo un redirect. Riletti chiamanti e history, nessun fix da duplicare.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente verifica CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata confermata). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto preesistente; controlli Markdown/diff eseguiti. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, il cui ulteriore riferimento canonico resta mancante. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 06:37 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap e diagnosi isolata, due connessioni protette, zero query e zero accessi PDO tentati; entrambe le sorgenti `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`, route authorize presente. Sintassi provider User e tre configurazioni Passport valida; homepage HTTP `200` dopo un redirect. Chiamanti e history ricontrollati, nessun fix da duplicare.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata confermata). Nessuna nuova richiesta OAuth o ACME. Aggiornata solo questa story sotto lock preservando le note preesistenti; lock rimosso e controlli Markdown/diff eseguiti. Nessuna modifica PHP: Pest/PHPStan non applicabili, indice QMD non aggiornato per sola nota operativa. Healthcheck wiki fallito, QMD assente e grafo Graphify mancante; consultate copie leggibili e istruzioni owner, il cui riferimento canonico ulteriore resta mancante. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 06:57 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap e diagnosi isolata, due connessioni protette, zero query e accessi PDO tentati; entrambe le sorgenti `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`, route authorize presente. Sintassi provider User e tre configurazioni Passport valida; homepage HTTP `200` dopo un redirect. Chiamanti e history ricontrollati, nessun fix da duplicare.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata confermata). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto preesistente; controlli Markdown/diff eseguiti. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, il cui riferimento canonico ulteriore resta mancante. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 07:17 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO tentati; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi provider User e quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect. Chiamanti e history ricontrollati, nessun fix da duplicare.
- Eventi originali confermati senza dati dei client: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente verifica CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata verificata). Nessuna nuova richiesta OAuth o ACME.
- Aggiornata solo questa story sotto lock preservando le note preesistenti; controlli Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD assente e grafo Graphify mancante; consultate copie leggibili e istruzioni owner, il cui ulteriore riferimento canonico resta mancante. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 07:37 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi effettivi `storage/oauth-private.key` e `storage/oauth-public.key`; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap e diagnosi PHP isolata, due connessioni protette, zero query e accessi PDO tentati; entrambe le sorgenti `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`, route authorize presente. Sintassi provider User e quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect. Chiamanti e history ricontrollati; nessun fix da duplicare.
- Eventi originali confermati senza dati dei client: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente verifica CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata confermata). Nessuna nuova richiesta OAuth o ACME. Aggiornata solo questa story sotto lock preservando le note precedenti, con controlli Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, il cui ulteriore riferimento canonico resta mancante. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 07:57 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; occorre ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO tentati; `CryptKey` per entrambe le sorgenti e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi provider User e quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect. Chiamanti e history verificati; nessun fix da duplicare.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata verificata). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto preesistente, con controlli Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, il cui ulteriore riferimento canonico resta mancante. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 08:17 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; occorre ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Chiamanti e history verificati; nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi provider User e quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect. Nessuna nuova richiesta OAuth o ACME.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata verificata). Nota aggiunta sotto lock preservando il contenuto precedente; controlli Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con riferimento canonico ulteriore mancante. Nessuna modifica a dati, chiavi, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 08:37 UTC

- Esito: `blocked`. Entrambe le chiavi OAuth restano assenti nella configurazione runtime e nei percorsi storage effettivi; occorre ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi provider User e quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente verifica CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata verificata). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto precedente; Nessuna modifica PHP: Pest/PHPStan non applicabili; indice QMD non aggiornato per sola nota operativa. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, il cui riferimento canonico ulteriore e' mancante. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 08:56 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Chiamanti e history verificati; nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi provider User e quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente verifica CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto precedente; lock rimosso e controlli Markdown/diff eseguiti. Nessuna modifica PHP: Pest/PHPStan non applicabili; indice QMD non aggiornato per sola nota operativa. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, il cui riferimento canonico ulteriore manca. Nessuna modifica a dati, chiavi, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 09:17 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi effettivi `storage/oauth-private.key` e `storage/oauth-public.key`; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi provider User e quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect.
- Eventi originali confermati senza dati dei client: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata verificata). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto precedente; lock rimosso e controlli Markdown/diff eseguiti. Nessuna modifica PHP: Pest/PHPStan non applicabili; indice QMD non aggiornato per sola nota operativa. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, il cui riferimento canonico ulteriore manca. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 09:36 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; serve la coppia valida della distribuzione, non disponibile in questa esecuzione. Chiamanti e history verificati; nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite: bootstrap isolato, due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi provider User e quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect. Nessuna nuova richiesta OAuth o ACME.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata verificata). Nota aggiunta sotto lock preservando il contenuto precedente; controlli Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con riferimento canonico ulteriore mancante. Nessuna modifica a dati, chiavi, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 09:57 UTC

- Esito: `blocked`. Entrambe le chiavi OAuth restano assenti nella configurazione runtime e nei percorsi storage effettivi; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Chiamanti e history verificati; nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi provider Passport e quattro configurazioni valida; homepage HTTP `200` dopo un redirect.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente verifica CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto precedente; controlli Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 10:17 UTC

- Esito: `blocked`. Confermata l'assenza delle chiavi OAuth privata e pubblica sia nella configurazione runtime sia nei percorsi storage effettivi. Serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione; chiamanti e history verificati, nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite: bootstrap isolato con due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`, route authorize presente. Sintassi del provider e delle quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` proviene dalla precedente verifica CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto precedente, con controlli Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Limiti documentali invariati: healthcheck wiki fallito, QMD e grafo Graphify assenti, riferimento canonico ulteriore dell'owner mancante; consultate le copie leggibili e le istruzioni owner. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 10:37 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; occorre ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): diagnosi PHP isolata con bootstrap valido, due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`, route authorize presente. Sintassi del provider e delle quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente verifica CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata verificata). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto precedente; controlli Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, il cui ulteriore riferimento canonico manca. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 10:57 UTC

- Esito: `blocked`. Entrambe le chiavi OAuth sono ancora assenti nella configurazione runtime e nei percorsi storage effettivi; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap e diagnosi PHP isolata con due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi del provider User e delle quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente verifica CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto precedente; controlli Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, con riferimento canonico ulteriore e grafo Graphify mancanti. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 11:17 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Chiamanti e history verificati; nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap e diagnosi PHP isolata con due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`, route authorize presente. Sintassi provider User e quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata verificata). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto precedente; nessuna modifica PHP, quindi Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, con riferimento canonico ulteriore e grafo Graphify mancanti. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 11:37 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi effettivi `storage/oauth-private.key` e `storage/oauth-public.key`; serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`, route authorize presente. Sintassi provider User e quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect.
- Eventi originali confermati senza dati dei client: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata verificata). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto precedente; nessuna modifica PHP, quindi Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, con riferimento canonico ulteriore e grafo Graphify mancanti. Nessuna modifica a chiavi, dati, monitor o cron.


## Ricontrollo Passport e classificazione eventi — 2026-11-07 11:57 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; occorre ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa o generazione di chiavi.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi provider User e quattro configurazioni Passport valida; homepage HTTP `200` dopo un redirect.
- Eventi originali confermati: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata verificata). Nessuna nuova richiesta OAuth o ACME.
- Nota aggiunta sotto lock preservando il contenuto preesistente; lock rimosso e controlli Markdown/diff eseguiti. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, il cui ulteriore riferimento canonico manca. Indice QMD non aggiornato: sola nota operativa. Nessuna modifica a dati, chiavi, monitor o cron.


## Verifica Passport, webhook deploy e classificazione eventi — 2026-11-07 12:02 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; serve la coppia valida della distribuzione. Nuovo blocco: manca anche `public_html/deploy/config.php`, ignorato da Git e richiesto da `GHjson::load_datas()` alla riga 138. Il file di esempio descrive credenziali e destinazioni di deploy, ma non costituisce configurazione valida per questa distribuzione; occorre il materiale corretto del responsabile del deploy. Nessuna generazione di chiavi o ricostruzione di credenziali.
- Studiati chiamanti e history: webhook invariato dal commit iniziale `71ecf78de`; nessun fix gia' presente da duplicare. Diagnosi GHjson isolata riuscita (exit 0): riprodotto esattamente il warning di include mancante con logging sostituito in memoria e trasferimenti bloccati. Nessuna chiamata HTTP al webhook o agli script di test, che possono scrivere file o cancellare log.
- Verifiche riuscite (exit 0): bootstrap Passport isolato, due connessioni protette, zero query e accessi PDO; entrambe le sorgenti `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`, route authorize presente. Sintassi valida per provider User, quattro configurazioni Passport, `GHjson.php` e `deploy.php`; homepage HTTP `200` dopo un redirect. Nessuna nuova richiesta OAuth o ACME.
- Eventi originali riletti senza dati dei client: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative, file letterale `*` assente ed elenco directory negato, location dedicata confermata. Nessuna modifica applicativa per mascherare gli errori di configurazione.
- Aggiornata solo questa story sotto lock preservando le note preesistenti. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico mancante. Pest/PHPStan e aggiornamento indice QMD non applicabili alla sola nota operativa; nessuna modifica a dati, chiavi, monitor, cron o autenticazione Codex.

## Ricontrollo Passport e webhook deploy — 2026-11-07 12:22 UTC

- Esito: `blocked`. Confermate le chiavi OAuth privata e pubblica assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca ancora `public_html/deploy/config.php`, ignorato da Git: il chiamante `GHjson::load_datas()` riproduce il warning segnalato. Servono la coppia OAuth valida e la configurazione corretta del responsabile della distribuzione; nessuna patch per mascherare questi blocchi.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook con logging in memoria e trasferimenti bloccati; nessuna richiesta HTTP al deploy. Sintassi valida per provider User, quattro configurazioni Passport e due script deploy; homepage HTTP `200` dopo un redirect. Chiamanti e history ricontrollati, nessun fix gia' presente da duplicare.
- Eventi originali confermati senza dati dei client: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato). Nessuna nuova richiesta OAuth o ACME. Nota aggiunta sotto lock preservando il contenuto precedente; nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex. Pest/PHPStan non applicabili alla sola nota; limiti documentali wiki/QMD e riferimento canonico owner mancante confermati, consultate le copie leggibili.


## Ricontrollo Passport e webhook deploy — 2026-11-07 12:42 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Manca ancora `public_html/deploy/config.php`, ignorato da Git; il chiamante `GHjson::load_datas()` riproduce il warning originale. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch per mascherare i blocchi.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook con logging in memoria e trasferimenti bloccati. Sintassi valida per provider User, quattro configurazioni Passport e due script deploy; homepage HTTP `200` dopo un redirect. Nessuna nuova richiesta OAuth, ACME o deploy.
- Eventi originali confermati senza dati dei client: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato). Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex. Pest/PHPStan non applicabili alla sola nota; controlli Markdown/diff. Healthcheck wiki fallito, QMD e grafo Graphify assenti, ulteriore riferimento owner mancante; consultate copie leggibili e istruzioni owner.


## Ricontrollo Passport e webhook deploy — 2026-11-07 13:02 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca ancora `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata di `GHjson::load_datas()` riproduce il warning originale alla riga 138. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione; nessuna patch applicativa per mascherarne l'assenza.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy con logging in memoria e trasferimenti bloccati; sintassi valida per provider User, quattro configurazioni Passport e due script deploy. Homepage HTTP `200` dopo un redirect. Chiamanti e history verificati; nessun fix gia' presente da duplicare.
- Eventi originali confermati senza dati dei client: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato, location dedicata verificata). Nessuna nuova richiesta OAuth, ACME o deploy. Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; controlli Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo Graphify assenti, riferimento canonico owner e prompt harness mancanti; consultate copie leggibili e istruzioni owner. Nessuna modifica a dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 13:22 UTC

- Esito: `blocked`. Confermata l'assenza delle due chiavi OAuth nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca ancora `public_html/deploy/config.php`, ignorato da Git; `GHjson::load_datas()` riproduce il warning originale alla riga 138. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione; nessuna patch per mascherarne l'assenza.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook con logging in memoria e zero trasferimenti. Sintassi valida per provider User, quattro configurazioni Passport e due script deploy; homepage HTTP `200` dopo un redirect. Chiamanti e history ricontrollati; nessun fix da duplicare.
- Eventi originali confermati senza dati dei client: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` proviene dalla precedente diagnosi CLI; richieste ACME non applicative (file letterale `*` assente ed elenco directory negato). Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta soltanto questa nota sotto lock preservando il contenuto precedente; validazione Markdown/diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo Graphify assenti, prompt harness e ulteriore riferimento owner mancanti; consultate le copie leggibili e le istruzioni owner. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 13:42 UTC

- Esito: `blocked`. Confermate entrambe le chiavi OAuth assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca ancora `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata di `GHjson::load_datas()` riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook con logging in memoria e zero trasferimenti. Sintassi valida per provider Passport User, quattro configurazioni Passport e due script deploy; homepage HTTP `200` dopo un redirect. Eventi originali confermati senza riportare dati dei client: errore diagnostico CLI non applicativo; richieste ACME per file letterale `*` assente ed elenco directory negato. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta soltanto questa nota sotto lock, preservando il contenuto preesistente; lock rimosso e controlli Markdown/diff eseguiti. Pest/PHPStan e aggiornamento indice QMD non applicabili alla sola nota operativa. Healthcheck wiki fallito, QMD e grafo Graphify assenti, riferimento canonico ulteriore owner mancante; consultate le copie leggibili e le istruzioni owner. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 14:02 UTC

- Esito: `blocked`. Confermate le due chiavi OAuth assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca ancora `public_html/deploy/config.php`, ignorato da Git; `GHjson::load_datas()` riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione. Chiamanti e history verificati; nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy con zero scritture log e trasferimenti; sintassi valida per provider User, quattro configurazioni Passport e due script deploy. Homepage HTTP `200` dopo un redirect. Eventi originali confermati: diagnostica CLI non applicativa; richieste ACME per file letterale `*` assente ed elenco directory negato. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock preservando il contenuto precedente; verifica Markdown/diff e rilascio lock. Pest/PHPStan e aggiornamento indice QMD non applicabili alla sola nota operativa. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico mancante. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 14:22 UTC

- Esito: `blocked`. Confermate le due chiavi OAuth assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca ancora `public_html/deploy/config.php`, ignorato da Git; `GHjson::load_datas()` riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione; chiamanti e history verificati, nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy con zero scritture log e trasferimenti; sintassi valida per provider User, quattro configurazioni Passport e due script deploy. Homepage HTTP `200` dopo un redirect. Eventi originali confermati: diagnostica CLI non applicativa; richieste ACME per file letterale `*` assente ed elenco directory negato. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto preesistente; validazione Markdown/diff. Pest/PHPStan non applicabili alla sola nota operativa. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico mancante. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 14:42 UTC

- Esito: `blocked`. Mancano ancora entrambe le chiavi OAuth nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata di `GHjson::load_datas()` riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione; chiamanti e history ricontrollati, nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook con zero scritture log e trasferimenti; sintassi valida per provider User, quattro configurazioni Passport e due script deploy. Homepage HTTP `200` dopo un redirect. Eventi originali confermati senza dati dei client: errore diagnostico CLI non applicativo; richieste ACME per file letterale `*` assente ed elenco directory negato, location dedicata verificata. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta soltanto questa nota sotto lock preservando il contenuto precedente; verifica Markdown/diff e rilascio lock. Pest/PHPStan non applicabili alla sola nota operativa. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, con riferimento canonico ulteriore e grafo Graphify mancanti. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 15:03 UTC

- Esito: `blocked`. Mancano ancora entrambe le chiavi OAuth nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git; `GHjson::load_datas()` riproduce il warning originale alla riga 138. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook con zero scritture log e trasferimenti; sintassi valida per provider User, quattro configurazioni Passport e due script deploy. Homepage HTTP `200` dopo un redirect. Eventi originali confermati senza dati dei client: errore della precedente diagnosi CLI non applicativo; richieste ACME per file letterale `*` assente ed elenco directory negato, location dedicata verificata. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock preservando il contenuto preesistente; gate Markdown/diff e rilascio lock alla chiusura. Pest/PHPStan non applicabili alla sola nota operativa. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, il cui ulteriore riferimento canonico manca. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 15:22 UTC

- Esito: `blocked`. Confermate entrambe le chiavi OAuth assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata di `GHjson::load_datas()` riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione; chiamanti e history ricontrollati.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook con zero scritture log e trasferimenti; sintassi valida per provider User, quattro configurazioni Passport e due script deploy. Homepage HTTP `200` dopo un redirect. Eventi originali confermati senza dati dei client: errore della precedente diagnosi CLI non applicativo; richieste ACME per file letterale `*` assente ed elenco directory negato. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto preesistente; verifica Markdown/diff e rilascio lock alla chiusura. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico mancante. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 15:42 UTC

- Esito: `blocked`. Mancano ancora le due chiavi OAuth nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git: `GHjson::load_datas()` riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione. Chiamanti e history verificati; nessuna patch applicativa.
- Verifiche riuscite: bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook con logging in memoria e zero trasferimenti; sintassi dei sette file PHP interessati valida, homepage HTTP `200` dopo un redirect. Eventi originali confermati senza riportare dati dei client: diagnostica CLI non applicativa; richieste ACME per file letterale `*` assente ed elenco directory negato. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; verifica Markdown/diff e rilascio lock alla chiusura. Pest/PHPStan non applicabili alla sola nota operativa. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico e grafo Graphify mancanti. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 16:02 UTC

- Esito: `blocked`. Entrambe le chiavi OAuth restano assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git: `GHjson::load_datas()` riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione. Chiamanti e history verificati; nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook con zero scritture log e trasferimenti; sintassi dei sette file PHP interessati valida. Homepage HTTP `200` dopo un redirect. I sei eventi originali sono confermati senza riportare dati dei client: diagnostica CLI non applicativa; richieste ACME per file letterale `*` assente ed elenco directory negato. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto preesistente; gate Markdown/diff e rilascio lock alla chiusura. Pest/PHPStan non applicabili alla sola nota operativa. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico mancante. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 16:22 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Manca ancora `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata di `GHjson::load_datas()` conferma il warning alla riga 138. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione; chiamanti e history verificati, nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook con zero scritture log e trasferimenti; sintassi dei sette file PHP interessati valida. Homepage HTTP `200` dopo un redirect. Confermati tutti i sei eventi originali senza dati dei client: diagnostica CLI non applicativa; richieste ACME per file letterale `*` assente ed elenco directory negato, location dedicata verificata. Nessuna richiesta diagnostica OAuth, ACME o deploy.
- Aggiunta soltanto questa nota sotto lock, preservando il contenuto preesistente; controlli Markdown/diff e rilascio lock alla chiusura. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico mancante. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 16:42 UTC

- Esito: `blocked`. Mancano ancora le due chiavi OAuth nella configurazione runtime e nei percorsi effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata di `GHjson::load_datas()` conferma il warning alla riga 138. Servono la coppia OAuth valida e la configurazione corretta della distribuzione, non disponibili in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook con zero scritture log e trasferimenti; sintassi dei sei file PHP verificati valida. Homepage HTTP `200` dopo un redirect. Confermati tutti i sei eventi originali senza dati dei client: errore della precedente diagnosi CLI non applicativo; richieste ACME per file letterale `*` assente ed elenco directory negato. Nessuna richiesta diagnostica OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto preesistente; verifica Markdown/diff e rilascio lock alla chiusura. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico mancante. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 17:02 UTC

- Esito: `blocked`. Confermate le due chiavi OAuth assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git; verifica isolata di `GHjson::load_datas()` riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook senza scritture log o trasferimenti; sintassi dei sei file PHP verificati valida. Homepage HTTP `200` dopo un redirect. Confermati i sei eventi originali senza riportare dati dei client: errore della precedente diagnosi CLI non applicativo; richieste ACME per file letterale `*` assente ed elenco directory negato. Nessuna richiesta diagnostica OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock preservando il contenuto preesistente. Pest/PHPStan e aggiornamento indice QMD non applicabili alla sola nota operativa; healthcheck wiki fallito e QMD assente, consultate copie leggibili e istruzioni owner con ulteriore riferimento canonico mancante. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex. Rilascio lock e controlli Markdown/diff previsti subito dopo la scrittura.


## Ricontrollo Passport e webhook deploy — 2026-11-07 17:22 UTC

- Esito: `blocked`. Confermate entrambe le chiavi OAuth assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` restituiscono `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata di `GHjson::load_datas()` conferma il warning alla riga 138. Servono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione. Chiamanti e history verificati; nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook senza scritture log o trasferimenti; sintassi dei sette file PHP interessati valida. Homepage HTTP `200` dopo un redirect. Confermati i sei eventi originali senza riportare dati dei client: errore della precedente diagnosi CLI non applicativo; richieste ACME per file letterale `*` assente ed elenco directory negato. Nessuna richiesta diagnostica OAuth, ACME o deploy.
- Aggiunta soltanto questa nota sotto lock, preservando il contenuto preesistente; verifica Markdown/diff e rilascio lock alla chiusura. Pest/PHPStan non applicabili alla sola nota operativa. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico mancante. Nessuna modifica a codice, dati, chiavi, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 17:42 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git: diagnosi isolata conferma il warning originale alla riga 138. Servono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione; chiamanti e history ricontrollati.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy senza scritture log o trasferimenti; sintassi dei sette file PHP interessati valida; homepage HTTP `200` dopo un redirect. Confermati i sei eventi originali senza dati dei client: diagnostica CLI non applicativa, richieste ACME per file letterale `*` assente ed elenco directory negato. Nessuna richiesta diagnostica OAuth, ACME o deploy.
- Aggiornata solo questa story sotto lock, preservando il contenuto precedente; verifica Markdown/diff e rilascio lock alla chiusura. Pest/PHPStan non applicabili alla sola nota. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 18:02 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata conferma il warning alla riga 138. Servono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy senza scritture log o trasferimenti; sintassi dei sette file PHP interessati valida; homepage HTTP `200` dopo un redirect. Confermati i sei eventi originali senza dati dei client: diagnostica CLI non applicativa, richieste ACME per file letterale `*` assente ed elenco directory negato. Nessuna richiesta diagnostica OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; verifica Markdown/diff e rilascio lock alla chiusura. Pest/PHPStan non applicabili alla sola nota. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 18:23 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git; verifica isolata di `GHjson::load_datas()` riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi webhook senza scritture log o trasferimenti; sintassi dei sette file PHP interessati valida; homepage HTTP `200` dopo un redirect. Confermati i sei eventi originali senza dati dei client: diagnostica CLI non applicativa e richieste ACME per file letterale `*` assente ed elenco directory negato; location dedicata negli include Nginx verificata. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto preesistente. Pest/PHPStan e aggiornamento QMD non applicabili alla sola nota operativa. Healthcheck wiki fallito, QMD e grafo Graphify mancanti; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 18:42 UTC

- Esito: `blocked`. Entrambe le chiavi OAuth restano assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata conferma il warning alla riga 138. Servono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy senza scritture log o trasferimenti; sintassi dei sette file PHP interessati valida; homepage HTTP `200` dopo un redirect. Confermati i sei eventi originali senza dati dei client: diagnostica CLI non applicativa e richieste ACME per file letterale `*` assente ed elenco directory negato; location dedicata verificata. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta soltanto questa nota sotto lock, preservando il contenuto preesistente; validazione Markdown/diff e rilascio lock alla chiusura. Pest/PHPStan non applicabili alla sola nota operativa. Healthcheck wiki fallito, QMD e grafo Graphify mancanti; consultate copie leggibili e istruzioni owner, con ulteriore riferimento canonico mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 19:02 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti sia nella configurazione runtime sia nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata conferma il warning alla riga 138. Servono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy senza scritture log o trasferimenti; sintassi dei sette file PHP interessati valida; homepage HTTP `200` dopo un redirect. Confermati i sei eventi originali senza dati dei client: diagnostica CLI non applicativa e richieste ACME per file letterale `*` assente ed elenco directory negato; location dedicata verificata. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto preesistente. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, con ulteriori riferimenti canonici e grafo Graphify mancanti. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 19:22 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione; chiamanti e history verificati.
- Verifiche riuscite (exit 0): bootstrap con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy senza scritture log o trasferimenti; sintassi di sette file PHP valida; homepage HTTP `200` dopo un redirect. Sei eventi originali confermati: diagnostica CLI non applicativa e richieste ACME per file letterale `*` assente ed elenco directory negato. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente. Nessuna patch PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo Graphify mancanti; consultate copie leggibili e istruzioni owner con riferimento canonico mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 19:43 UTC

- Esito: `blocked`. Confermate le due chiavi OAuth assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git: verifica isolata riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione; chiamanti e history ricontrollati.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy senza scritture log o trasferimenti; sintassi di sette file PHP valida; homepage HTTP `200` dopo un redirect. Sei eventi originali confermati: diagnostica CLI non applicativa, richieste ACME per file letterale `*` assente ed elenco directory negato; location dedicata verificata. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente. Nessuna patch PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo Graphify mancanti; consultate copie leggibili e istruzioni owner con riferimento canonico mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 20:02 UTC

- Esito: `blocked`. Confermate entrambe le chiavi OAuth assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione deploy della distribuzione, non disponibili in questa esecuzione. Chiamanti e history ricontrollati.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy senza scritture log o trasferimenti; `php -l` su sette file PHP valido; homepage HTTP `200` dopo un redirect. Sei eventi originali confermati senza dati dei client: diagnostica CLI non applicativa, file ACME letterale `*` assente ed elenco directory negato; location ACME dedicata verificata. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente. Nessuna patch PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo Graphify mancanti; consultate copie leggibili e istruzioni owner, con riferimento canonico mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 20:22 UTC

- Esito: `blocked`. Entrambe le chiavi OAuth sono ancora assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione deploy della distribuzione, non disponibili in questa esecuzione. Chiamanti e history ricontrollati; nessuna patch applicativa.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy senza scritture log o trasferimenti; sintassi di sette file PHP valida; homepage HTTP `200` dopo un redirect. Confermati i sei eventi originali: diagnostica CLI non applicativa e richieste ACME per file letterale `*` assente ed elenco directory negato, con location dedicata verificata. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente. Pest/PHPStan e aggiornamento QMD non applicabili alla sola nota operativa. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con riferimento canonico mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 20:42 UTC

- Esito: `blocked`. Entrambe le chiavi OAuth restano assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione deploy della distribuzione, non disponibili in questa esecuzione. Chiamanti e history ricontrollati.
- Verifiche riuscite (exit 0): bootstrap con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy senza scritture log o trasferimenti; sintassi di sette file PHP valida; homepage HTTP `200` dopo un redirect. Sei eventi originali confermati: diagnostica CLI non applicativa; richieste ACME per file letterale `*` assente ed elenco directory negato, con location dedicata verificata. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; controlli Markdown/diff. Nessuna patch PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner con riferimento canonico mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e webhook deploy — 2026-11-07 21:02 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti sia nella configurazione runtime sia nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git: diagnosi isolata riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione deploy della distribuzione, non disponibili in questa esecuzione; chiamanti e history ricontrollati.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente. Diagnosi deploy senza init, scritture log o trasferimenti; sintassi di sette file PHP valida; homepage HTTP `200` dopo un redirect. Sei eventi originali confermati senza dati dei client: diagnostica CLI non applicativa; richieste ACME per file letterale `*` assente ed elenco directory negato, con location dedicata verificata. Nessuna nuova richiesta OAuth, ACME o deploy.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente. Nessuna patch PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, con riferimento canonico e helper claims mancanti. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport, deploy e fatal Volt blog — 2026-11-07 21:23 UTC

- Esito: `blocked`. Confermate entrambe le chiavi OAuth assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git; diagnosi isolata riproduce il warning alla riga 138. Servono la coppia OAuth valida e la configurazione deploy della distribuzione, non disponibili in questa esecuzione.
- Nuovo fatal blog su sottana.net: sorgente legacy con `$mount = function ($slug)` e componente compilato con due dichiarazioni `mount()`. Confermato HTTP `500`. Il vhost e Git identificano una repository separata in `/home/ploi/sottana.net`, fuori dal repository autorizzato per le modifiche: nessun file modificato li'. Su sottana.com il medesimo sorgente e' gia' corretto in `b157aacb9`, usa `<x-page>` e risponde HTTP `200`; nessun fix duplicato. La singola richiesta diagnostica .net puo' aggiungere un evento equivalente.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; route authorize presente e tema Two. Diagnosi deploy senza init, trasferimenti o scritture log; sintassi di otto file PHP valida. Homepage .com HTTP `200` dopo un redirect; chiamanti e history verificati. Confermati i nove eventi originali senza dati dei client: evento CLI diagnostico non applicativo; richieste ACME per file letterale `*` assente ed elenco directory negato, con location dedicata verificata.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; controlli Markdown/diff e rilascio lock alla chiusura. Nessuna patch PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD assente; consultate copie leggibili e istruzioni owner, con riferimento canonico User mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport, deploy e fatal Volt blog — 2026-11-07 21:27 UTC

- Esito: `blocked`. Entrambe le chiavi OAuth restano assenti nelle sorgenti runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git; warning alla riga 138 riprodotto senza init, trasferimenti o scritture log. Servono la coppia OAuth valida e la configurazione deploy della distribuzione, non disponibili in questa esecuzione.
- Fatal Volt .net ancora confermato nel sorgente legacy e nel compilato con due metodi `mount()`: repository separata `/home/ploi/sottana.net`, fuori dal perimetro autorizzato. Il sorgente .com e' gia' corretto in `b157aacb9`; articolo HTTP `200`, homepage HTTP `200` dopo un redirect. Nessuna patch duplicata e nessuna nuova richiesta .net, OAuth, deploy o ACME.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query/accessi PDO; sintassi di otto file PHP valida; chiamanti, history e dieci eventi originali controllati senza dati dei client. Evento CLI diagnostico e richieste ACME non applicativi. Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; controlli Markdown/diff. Pest/PHPStan non applicabili alla sola nota. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con riferimento canonico User mancante.


## Ricontrollo Passport, deploy e fatal Volt blog — 2026-11-07 21:32 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nelle sorgenti runtime e nei percorsi storage; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git; warning alla riga 138 riprodotto in isolamento, senza init, trasferimenti o scritture log. Servono la coppia OAuth valida e la configurazione deploy della distribuzione, non disponibili in questa esecuzione.
- Fatal Volt .net confermato: sorgente legacy con assegnazione `$mount` e compilato con due metodi `mount()`. Vhost e Git identificano la repository separata `/home/ploi/sottana.net`, fuori dal perimetro autorizzato per le modifiche. Su .com il sorgente e' gia' corretto in `b157aacb9`; homepage e i due articoli segnalati rispondono HTTP `200`. Nessun fix duplicato o nuova richiesta .net, OAuth, ACME o deploy.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; route authorize presente; sintassi di otto file PHP valida. Controllati chiamanti, history e dodici eventi originali senza dati dei client; evento CLI diagnostico e richieste ACME non applicativi, location dedicata confermata.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; controlli Markdown/diff e rilascio lock alla chiusura. Nessuna patch PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD assente e grafo Graphify mancante; consultate copie leggibili e istruzioni owner, con riferimento canonico User mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport, deploy e fatal Volt blog — 2026-11-07 21:37 UTC

- Esito: `blocked`. Confermate entrambe le chiavi OAuth assenti nelle sorgenti runtime e nei percorsi storage; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git; warning alla riga 138 riprodotto senza init, trasferimenti o scritture log. Servono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione.
- Fatal Volt .net ancora presente nel sorgente legacy e nel compilato con due metodi `mount()`: repository separata `/home/ploi/sottana.net`, fuori dal perimetro autorizzato per le modifiche. Su .com il fix `b157aacb9` e' gia' presente: homepage e i due articoli segnalati rispondono HTTP `200`. Nessun fix duplicato o nuova richiesta .net, OAuth, ACME o deploy.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query e accessi PDO; route authorize presente; sintassi di otto file PHP valida. Verificati chiamanti, history e tredici eventi originali senza riportare dati dei client. Diagnostica CLI e richieste ACME non applicative; file letterale `*` assente ed elenco directory negato, location dedicata confermata.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; controlli Markdown/diff. Pest/PHPStan non applicabili alla sola nota operativa. Healthcheck wiki fallito, QMD e grafo Graphify mancanti; consultate copie leggibili e istruzioni owner, con riferimento canonico User mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport, deploy e fatal Volt blog — 2026-11-07 21:57 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nelle sorgenti runtime e nei percorsi storage; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git; warning alla riga 138 riprodotto senza init, trasferimenti o scritture log. Occorrono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione.
- Fatal Volt .net confermato nel sorgente legacy con `$mount` e nel compilato con due dichiarazioni `mount()`. Vhost e Git identificano la repository separata `/home/ploi/sottana.net`, fuori dal perimetro autorizzato per le modifiche. Su .com il fix `b157aacb9` e' gia' presente; homepage e i due articoli segnalati rispondono HTTP `200`. Nessuna patch duplicata o nuova richiesta .net, OAuth, deploy o ACME.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; route authorize presente, tema Two; sintassi di otto file PHP valida. Chiamanti, history e tredici eventi originali verificati senza dati dei client. Evento CLI diagnostico e richieste ACME non applicativi; file letterale `*` assente ed elenco directory negato, location dedicata confermata.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; validazione Markdown/diff e rilascio lock alla chiusura. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con riferimento canonico User mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport, deploy e fatal Volt blog — 2026-11-07 22:17 UTC

- Esito: `blocked`. Entrambe le chiavi OAuth sono ancora assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git; warning alla riga 138 riprodotto senza init, trasferimenti o scritture log. Servono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione.
- Fatal Volt confermato nel sorgente legacy .net e nel compilato con due metodi `mount()`. Vhost e Git identificano la repository separata `/home/ploi/sottana.net`, fuori dal repository autorizzato per le modifiche. Su .com il fix `b157aacb9` e' gia' presente: homepage e i due articoli segnalati rispondono HTTP `200`. Nessuna patch duplicata o nuova richiesta .net, OAuth, deploy o ACME.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query/accessi PDO, route authorize presente e tema Two; sintassi di otto file PHP valida; tredici eventi originali verificati senza dati dei client; chiamanti e history riletti. Evento CLI diagnostico e richieste ACME non applicativi; file letterale `*` assente, directory priva di index e location dedicata confermati. Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; validazione Markdown/diff e rilascio lock alla chiusura. Pest/PHPStan non applicabili alla sola nota operativa. Healthcheck wiki fallito, QMD e grafo Graphify mancanti; consultate copie leggibili e istruzioni owner, con riferimento canonico User mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport, deploy e fatal Volt blog — 2026-11-07 22:37 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti sia nelle sorgenti runtime sia nei percorsi storage; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Assente anche `public_html/deploy/config.php`, ignorato da Git; warning della riga 138 riprodotto senza init, trasferimenti o scritture log. Occorrono la coppia OAuth valida e la configurazione della distribuzione, non disponibili in questa esecuzione.
- Fatal Volt ancora confermato nel sorgente legacy .net e nel compilato con due metodi `mount()`. Repository separata `/home/ploi/sottana.net`, fuori dal perimetro autorizzato per le modifiche. Su .com il fix `b157aacb9` e' gia' presente: homepage e i due articoli segnalati rispondono HTTP `200`. Nessuna patch duplicata.
- Verifiche riuscite: bootstrap isolato, due connessioni protette e zero query/accessi PDO; route authorize presente e tema Two; sintassi di otto file PHP valida; chiamanti, history e tredici eventi originali controllati senza ripubblicarne i dati. Evento CLI diagnostico e richieste ACME non applicativi. Nessuna nuova richiesta .net, OAuth, deploy o ACME.
- Aggiunta soltanto questa nota sotto lock, preservando le note preesistenti; controlli Markdown/diff e rilascio lock alla chiusura. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo Graphify assenti; consultate copie leggibili e istruzioni owner, con riferimento canonico User mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo errori applicativi — 2026-11-07 22:57 UTC

- Esito: `blocked`. Entrambe le chiavi OAuth restano assenti nella configurazione runtime e nello storage; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Assente anche `public_html/deploy/config.php`: warning della riga 138 riprodotto senza init, trasferimenti o scritture log. Servono chiavi valide e configurazione della distribuzione, non disponibili.
- Fatal Volt ancora presente nel sorgente .net e nel compilato con due metodi `mount()`: repository separata `/home/ploi/sottana.net`, fuori dal perimetro autorizzato. Su .com il fix `b157aacb9` e' gia' presente; homepage e i due articoli rispondono HTTP `200`. Nessuna patch duplicata.
- Verifiche riuscite (exit 0): bootstrap con due connessioni protette, zero query/accessi PDO; sintassi di otto file PHP; tredici eventi originali e chiamanti/history controllati. Diagnostica CLI e richieste ACME non applicative. Nessuna nuova richiesta .net, OAuth, deploy o ACME.
- Solo questa nota aggiunta sotto lock; contenuto precedente preservato e diff validato. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo assenti; consultate copie leggibili e istruzioni owner, con riferimento canonico User mancante.


## Ricontrollo errori applicativi — 2026-11-07 23:17 UTC

- Esito: `blocked`. Confermata l'assenza delle chiavi OAuth privata e pubblica nelle sorgenti runtime e nello storage: `CryptKey` e `AuthorizationServer` restituiscono `Invalid key supplied`. Manca anche `public_html/deploy/config.php`, ignorato da Git; warning alla riga 138 riprodotto senza init, trasferimenti o scritture log. Servono le chiavi valide e la configurazione della distribuzione, non disponibili.
- Fatal Volt confermato staticamente nel sorgente legacy .net con `$mount` e nel compilato con due metodi `mount()`. Vhost e Git confermano la repository separata `/home/ploi/sottana.net`, fuori dal perimetro autorizzato. Su .com il fix `b157aacb9` e' gia' presente: homepage e i due articoli segnalati rispondono HTTP `200`. Nessuna patch duplicata.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query/accessi PDO; route authorize presente e tema Two; `php -l` su otto file. Verificati chiamanti, history e tredici eventi originali senza riportare dati dei client. Diagnostica CLI e richieste ACME non applicative; location dedicata, file letterale `*` assente e directory priva di index confermati. Nessuna nuova richiesta .net, OAuth, deploy o ACME.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; rilascio lock e controlli Markdown/diff alla chiusura. Pest/PHPStan non applicabili alla sola nota operativa. Healthcheck wiki fallito, QMD e grafo assenti; consultate copie leggibili e istruzioni owner, con riferimento canonico User mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo errori applicativi — 2026-11-07 23:38 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nelle sorgenti runtime e nello storage; `CryptKey` e `AuthorizationServer` riproducono `Invalid key supplied`. Manca anche `public_html/deploy/config.php` (ignorato da Git): warning alla riga 138 riprodotto senza init, trasferimenti o scritture log. Servono le chiavi valide e la configurazione della distribuzione, non disponibili.
- Fatal Volt confermato staticamente nel sorgente legacy .net e nel compilato con due metodi `mount()`. Repository separata `/home/ploi/sottana.net`, fuori dal repository autorizzato per le modifiche. Su .com il fix `b157aacb9` e' gia' presente: homepage e i due articoli segnalati HTTP `200`. Nessuna patch duplicata.
- Controlli riusciti (exit 0): bootstrap isolato, due connessioni protette, zero query/accessi PDO; sintassi di otto file PHP; tredici eventi originali verificati senza riportare dati dei client. Evento CLI diagnostico e richieste ACME non applicativi. Nessuna nuova richiesta .net, OAuth, deploy o ACME.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; verifica integrita' append e diff. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito, QMD e grafo Graphify mancanti; consultate copie leggibili e istruzioni owner, con riferimento canonico User mancante.


## Ricontrollo errori applicativi — 2026-11-07 23:48 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nelle sorgenti runtime e nello storage; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Assente anche `public_html/deploy/config.php` (ignorato da Git): warning alla riga 138 riprodotto in isolamento senza init, trasferimenti o scritture log. Servono la coppia OAuth valida e la configurazione della distribuzione, non disponibili.
- Fatal Volt ancora presente nel sorgente legacy .net con `$mount` e nel compilato con due metodi `mount()`. Vhost e Git confermano la repository separata `/home/ploi/sottana.net`, fuori dal repository autorizzato per le modifiche. Su .com il fix `b157aacb9` e' gia' presente: homepage e due articoli italiani HTTP `200`; il percorso inglese `/en/blog/safety-dental-practices` su .com risponde `404`, senza fatal Volt. Nessuna patch duplicata o nuova richiesta .net, OAuth, deploy o ACME.
- Verifiche: bootstrap isolato riuscito, due connessioni protette, zero query/accessi PDO; sintassi di otto file PHP valida; chiamanti, history e sedici eventi originali controllati senza ripubblicarne i dati. Evento CLI diagnostico e richieste ACME non applicativi; location dedicata, wildcard letterale assente e directory priva di index confermati.
- Solo questa nota aggiunta sotto lock; contenuto precedente preservato e append verificata. Nessuna modifica PHP: Pest/PHPStan non applicabili. Healthcheck wiki fallito e QMD/grafo assenti; consultate copie leggibili e istruzioni owner, con riferimento canonico User mancante. Nessuna modifica a codice, chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e diagnostica CLI — 2026-11-08 00:07 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione; nessuna patch applicativa.
- Riletti i due eventi originali e verificati chiamanti/history: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` delle 04:11:26 deriva dalla precedente diagnosi CLI documentata, non da un errore applicativo. Nessun fix gia' presente da duplicare.
- Verifiche riuscite: bootstrap isolato, due connessioni protette, zero query e accessi PDO; route authorize presente; sintassi valida su cinque file PHP; homepage HTTP `200` dopo un redirect. Nessuna nuova richiesta OAuth.
- Solo questa nota aggiunta sotto lock, preservando il contenuto precedente; lock rilasciato e controlli Markdown/diff eseguiti. Pest/PHPStan/PHPMD/PHPInsights non applicabili alla sola nota; indice QMD non aggiornato per nota operativa. Healthcheck wiki fallito, QMD e grafo assenti; consultate copie locali e istruzioni owner, con riferimento canonico User mancante.


## Ricontrollo Passport e diagnostica CLI — 2026-11-08 00:27 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Occorre ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione.
- Confermati i due eventi originali e studiati chiamanti/history: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente diagnosi CLI, non da una richiesta applicativa. Nessuna correzione gia' presente da duplicare.
- Verifiche riuscite (exit 0): bootstrap isolato con due connessioni protette, zero query/accessi PDO; route authorize presente; `php -l` su cinque file; homepage HTTP `200` dopo un redirect. Nessuna nuova richiesta OAuth. Nessuna patch PHP: test Pest/PHPStan non applicabili alla sola nota.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; append e diff verificati. Healthcheck wiki fallito, QMD e grafo assenti; consultate copie locali e istruzioni owner, con riferimento canonico User mancante. Nessuna modifica a chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport e diagnostica CLI — 2026-11-08 00:47 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nei percorsi storage effettivi; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Serve ripristinare la coppia valida della distribuzione, non disponibile in questa esecuzione; nessuna patch applicativa.
- Riletti i due eventi originali e verificati chiamanti/history: `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` delle 04:11:26 deriva dalla precedente diagnosi CLI documentata, non da una richiesta applicativa. Nessun fix gia' presente da duplicare.
- Verifiche riuscite (exit 0): bootstrap isolato, due connessioni protette, zero query e accessi PDO; route authorize presente; `php -l` su cinque file; homepage HTTP `200` dopo un redirect. Nessuna nuova richiesta OAuth.
- Aggiunta solo questa nota sotto lock, preservando il contenuto precedente; rilascio lock e controlli Markdown/diff alla chiusura. Nessuna modifica PHP: Pest/PHPStan/PHPMD/PHPInsights non applicabili; QMD non aggiornato per sola nota operativa. Healthcheck wiki fallito, QMD e grafo assenti; consultate copie locali e istruzioni owner, con riferimento canonico User mancante. Nessuna modifica a chiavi, dati, monitor, cron o autenticazione Codex.


## Ricontrollo Passport, diagnostica CLI e fatal Volt blog — 2026-11-08 00:58 UTC

- Esito: `blocked`. Chiavi OAuth privata e pubblica ancora assenti nella configurazione runtime e nello storage effettivo; `CryptKey` e `AuthorizationServer` confermano `Invalid key supplied`. Serve la coppia valida della distribuzione, non disponibile in questa esecuzione; nessuna generazione di chiavi o patch applicativa.
- Fatal Volt .net confermato: il sorgente legacy `Themes/Two/resources/views/pages/blog/[slug].blade.php` registra `$mount` come metodo ordinario; il compilato segnalato contiene due dichiarazioni `mount()`. Vhost e Git confermano la repository separata `/home/ploi/sottana.net`, fuori dal repository autorizzato per le modifiche. Su .com il fix `b157aacb9` e' gia' presente; nessuna patch duplicata.
- Verifiche riuscite: bootstrap isolato con due connessioni protette, zero query e accessi PDO, route authorize presente; sintassi di sette file PHP valida. HTTP .com: homepage, indice blog e articolo CMS esistente `sicurezza-elettromedicali` rispondono `200`; `safety-dental-practices` risponde `404` anche sul vhost locale, e lo slug non compare nei record JSON CMS locali. Nessuna nuova richiesta .net o OAuth.
- Confermati i tre eventi originali senza riportare dati dei client; chiamanti e history studiati. `DIAGNOSTIC_DATABASE_ACCESS_BLOCKED` deriva dalla precedente verifica CLI documentata e non e' un errore applicativo.
- Aggiunta soltanto questa nota con lock, preservando il contenuto precedente; verifica append, Markdown e diff, poi rilascio lock. Nessuna modifica PHP: Pest/PHPStan/PHPMD/PHPInsights non applicabili. Healthcheck wiki fallito, QMD e grafo assenti; consultate copie leggibili e istruzioni owner, con riferimento canonico User mancante. Nessuna modifica a dati, sicurezza, monitor, cron, autenticazione Codex o dipendenze.
