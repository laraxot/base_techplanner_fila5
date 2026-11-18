# TechPlanner — Riverifica del codice su `dev` (16 novembre 2026)

> Ambito: analisi statica tramite GitHub del ramo `dev`. Non sono stati eseguiti Laravel, DB, PHPStan, Pest o un browser sulla versione odierna. Gli screenshot già presenti sono stati ispezionati come file del repository, **non** riacquisiti.

## Prodotto e architettura

- Laravel 13 / PHP 8.4 / Filament 5 / Livewire 4, moduli nwidart, fondazione Laraxot/Xot.
- Modulo TechPlanner: `Client`, `Device` (tabella legacy `machines`), `DeviceVerification`, `Control` (single-table inheritance), `Appointment`, `Worker`, `PhoneCall`, referenti, contatti dal sito.
- Flusso verifiche apparecchi: cliente → apparecchio → verifica → prossima verifica → dashboard e filtro scadenze.
- Flusso controlli: cliente → controllo tipizzato (`rx`, `intraoral`, `electromedical`, `health_authorization`, `other`) con calendario, tecnico, eventuale apparecchio e ricorrenza predefinita. Le due fonti di scadenze non sono ancora riconciliate in una sola vista o modello decisionale.
- Appuntamenti: stato, durata, tecnico, rilevazione sovrapposizioni e promemoria. Dashboard e comandi schedulati sono presenti.
- Permessi: `super-admin` e `techplanner::admin` possono gestire anche le eliminazioni, `techplanner::operator` può leggere/creare/modificare ma non cancellare; `user::admin` opera nel modulo User. Segreteria e tecnico condividono il ruolo operatore: non esiste una segregazione di dati/azioni per mansione.
- `XotBase*`, Folio/Volt e Actions sono convenzioni architetturali del repository.

## Difetti verificati e correzioni applicate

| Priorità | File | Evidenza | Stato |
| --- | --- | --- | --- |
| P0 | `laravel/Modules/TechPlanner/app/Models/Client.php` | Marcatori Git nelle importazioni di `HasOne` e `SoftDeletes` | Risolto in `5485d2329` |
| P0 | `laravel/Modules/TechPlanner/app/Filament/Resources/ClientResource/Tables/ClientsTable.php` | Marcatori Git negli import e nei filtri `last_appointment_type`, `never_controlled_type` | Risolto in `84d6782c3`, mantenendo entrambi i filtri |
| P1 | `laravel/Modules/TechPlanner/database/factories/DeviceFactory.php` | `client_id=1`, `device_type`, `power_kv`, `current_ma` non corrispondevano ai campi del modello `Device` | Definizione corretta in `65172d76e` usando `ClientFactory::new()`, `type`, `kv`, `ma`; test DB ancora da eseguire |
| P1 | `laravel/Modules/TechPlanner/docs/manual/seed-demo.php` | Dati demo creati con `create()` e ID presunti; `Model::unguard()` senza blocco ambiente esplicito | Rendere idempotente, isolare da produzione e creare veri Seeder/Factory |
| P1 | `laravel/Modules/TechPlanner/docs/manual/screenshots.cjs` | 31 chiamate screenshot in origine con nomi diversi dal Markdown e senza exit code nonzero | Mapping 31/31 e fail-on-error corretti nel commit `52cc51549`; esecuzione browser ancora da provare |
| P1 | `laravel/Modules/TechPlanner/app/Console/Commands/*Reminder*Command.php` | Destinatari `admin`/`super-admin`, ma non `techplanner::admin` | Verificare e correggere con test di notifica |
| P2 | `laravel/Modules/TechPlanner/app/Actions/CheckAppointmentConflictAction.php` | `whereNotIn('status', ...)` può ignorare righe legacy con status NULL | Aggiungere test NULL e query adeguata |
| P2 | `laravel/Modules/TechPlanner/app/Models/DeviceVerification.php` e `Control.php` | Due flussi di scadenza, potenziali decisioni divergenti | Definire source of truth con criteri di migrazione |
| P2 | `laravel/Modules/TechPlanner/app/Enums/ControlTypeEnum.php` | Ricorrenza di 12 mesi per tutti i tipi tranne `other` | Rendere configurabile per tipo di apparecchio/regola contrattuale, validare requisiti |
| P2 | `laravel/Modules/TechPlanner/app/Console/Commands/SendAppointmentRemindersCommand.php` | Il link `AppointmentResource::getUrl('index')` è incluso nell'email al cliente, che normalmente non accede al pannello amministrativo | Predisporre link pubblico autorizzato o omettere l'azione |
| P2 | `laravel/Modules/TechPlanner/docs/README.md` | Testo su Filament 4 non allineato a Filament 5 | Aggiornare la documentazione di riferimento |

## Manuale utente

Esiste già `laravel/Modules/TechPlanner/docs/manual/manuale-uso.md`, più un PDF e 31 immagini citate in Markdown. La guida include segreteria, tecnico, responsabile dati, super-admin, gestore utenti e visitatore/cliente del sito. Ho visualizzato come file del repository la schermata accesso e la dashboard; l'applicazione **non è stata avviata in questa sessione**. Esiste `screenshots.cjs` che usa Playwright e `seed-demo.php` per i dati, ma il percorso di rigenerazione va reso deterministico e verificato end-to-end.

Manca una versione inglese equivalente aggiornata e completa. Le nuove schermate del modulo `Control` devono entrare nel manuale, perché le catture archiviate possono precedere l'unificazione del 11 novembre.

## Test e rilascio

Il report `docs/audit/TEST_RESULTS.md` dichiara **131 test del modulo passati all'11 novembre 2026**, più controlli con MariaDB, PHPStan, Pint e crawl browser. Sono prove storiche, non conferme sull'HEAD di oggi. Esiste la GitHub Action `.github/workflows/techplanner-ci.yml`, configurata per push e pull request sul branch `dev`.

Il report `docs/audit/RELEASE.md` prescrive di non distribuire in produzione senza rotazione delle credenziali segnalate nel report riservato, prova delle migrazioni su copia dati e verifica delle impostazioni del webhook. Non riportare nei documenti pubblici credenziali o dettagli di vulnerabilità riservati.

## Ordine di lavoro proposto

1. Validare `dev`: lint PHP, scansione marcatori di merge, Pest TechPlanner, PHPStan, Pint e migrazione pulita su MariaDB/SQLite.
2. Correggere factory/seeders e creare una demo idempotente con dati fittizi controllati, utenti dei vari ruoli e divieto assoluto di produzione.
3. Eseguire flussi end-to-end per ogni personaggio, provare l'isolamento dei permessi, appuntamenti e controlli.
4. Rigenerare immagini autentiche da browser automatizzato: nomi coerenti con Markdown, verifica 100% dei file, errori fatali, niente screenshot obsoleti.
5. Aggiornare manuali IT/EN in MD/PDF e collegarli ai test di accettazione.
6. Affrontare gli approfondimenti di dominio: modello unificato delle scadenze, differenza tra segreteria e tecnico, conformità, notifiche esterne, agenda.

**Stato:** ricognizione e due correzioni puntuali effettuate. Niente affermazioni di test verdi senza nuova esecuzione.
