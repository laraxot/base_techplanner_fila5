---
title: "Rilascio in produzione: checklist, procedura e ritorno indietro"
type: runbook
status: review
created: 2026-11-10
updated: 2026-11-10
tags: [rilascio, produzione, deploy, rollback, techplanner]
related:
  - ./BACKLOG_AND_ROADMAP.md
  - ./TEST_RESULTS.md
  - ../../deploy.sh
---

# Rilascio in produzione

Stato al 2026-11-10: il codice del modulo TechPlanner è pronto; **tre azioni restano a chi gestisce il server**
(sezione «Prima del rilascio»). Senza quelle il rilascio non va fatto.

## Prima del rilascio (azioni dell'utente)

| # | Cosa | Perché | Come si verifica |
|---|---|---|---|
| 1 | Ruotare le credenziali segnalate nel report riservato (sez. 1) e toglierle dal tracciamento | Il repository è pubblico | Report riservato senza CRITICAL aperti |
| 2 | Provare `php artisan migrate` su una **copia** del database di produzione | Le migrazioni nuove modificano `machines`, `device_verifications`, `medical_directors` e aggiungono il cestino; con dati reali possono emergere righe orfane | Migrazione senza errori; `SELECT COUNT(*) FROM machines WHERE client_id NOT IN (SELECT id FROM clients)` annotato (se > 0 il vincolo verso `clients` viene rimandato, i dati restano) |
| 3 | Impostare `webhook_secret` in `public_html/deploy/config.php` e lo stesso «Secret» nel webhook GitHub/Bitbucket | `deploy.php` ora rifiuta le richieste non firmate | Un push di prova arriva con `200`, una richiesta senza firma riceve `403` |
| 4 | Assegnare i ruoli: segreteria e tecnici `techplanner::operator`, chi può cancellare `techplanner::admin` | Prima chiunque entrasse nel pannello poteva cancellare tutto | Un operatore non vede il cestino rosso nelle tabelle |

Asset dei temi: arrivano in `public_html` con symlink (`public_html/themes/<Tema>` creato con `ln -s ../../laravel/Themes/<Tema>/public`),
niente `npm run copy`. Se sul server `public_html/themes/Two` è ancora una **cartella** (vecchia copia), toglierla una
volta prima del `git pull`: `rm -rf public_html/themes/Two`. La cartella `public_html` è la document root: non va
cancellata né sostituita.

Requisiti del server: **PHP ≥ 8.4.1** (lo richiede il `composer.lock`; `deploy.sh` si ferma se manca), MySQL/MariaDB,
`mysqldump` e `gzip` per la copia del database.

## Procedura

```bash
cd /percorso/del/progetto
git fetch origin && git checkout dev && git pull --ff-only
git tag -a "rilascio-$(date +%Y%m%d-%H%M)" -m "Rilascio"   # punto a cui tornare
./deploy.sh
```

`deploy.sh` mette il sito in manutenzione, installa le dipendenze **dal lock** (niente più `composer update`), salva il
database in `laravel/storage/backups/db-AAAAMMGG-HHMMSS.sql.gz`, esegue le migrazioni, ricostruisce le cache e rimette il
sito online, anche se un passo fallisce. Scrive `DEPLOY_SUCCESS` o `DEPLOY_FAILED (riga N)`.

Dopo il rilascio, controllo a mano (5 minuti):

1. accesso al pannello con un utente operatore e uno amministratore;
2. pagina iniziale con i riquadri «Verifiche scadute», «In scadenza», «Appuntamenti di oggi»;
3. Apparecchi → filtro «Scadenza verifica» → «Scadute»;
4. scheda di un apparecchio → nuova verifica salvata;
5. `storage/logs/laravel.log` senza nuovi `ERROR`.

## Tornare indietro

1. `php artisan down`
2. Codice: `git checkout <tag del rilascio precedente>` e `composer install --no-interaction --optimize-autoloader`.
3. Database, **solo se le migrazioni hanno creato problemi**:
   `gunzip -c laravel/storage/backups/db-<data>.sql.gz | mysql -u <utente> -p <database>`
   (si perdono i dati inseriti dopo la copia: usarlo subito, non a giorni di distanza).
4. `php artisan optimize:clear && php artisan config:cache && php artisan up`

Le migrazioni di questo rilascio non cancellano colonne né dati: tornare al codice precedente senza ripristinare il
database è possibile (le colonne nuove vengono ignorate).

## Cosa cambia per gli utenti

| Novità | Dove |
|---|---|
| Pagina iniziale con verifiche scadute, in scadenza, mai fatte e il giro di oggi | Dashboard |
| Colonna «Prossima verifica» colorata e filtro «Scadenza verifica» | Apparecchi |
| «Elimina» sposta nel cestino; filtro «Record eliminati», «Ripristina», «Elimina definitivamente» (solo amministratore) | Tutte le tabelle |
| Ruolo operatore: lavora ma non cancella | Gestione utenti |
| Partita IVA e codice fiscale controllati | Modulo cliente |
| Recapiti una sola volta nel modulo cliente | Modulo cliente |
| Reimportare un file aggiorna invece di duplicare | Importa clienti/apparecchi/direttori |

Il manuale d'uso aggiornato è in `laravel/Modules/TechPlanner/docs/manual/manuale-uso.{md,pdf}`.
