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
