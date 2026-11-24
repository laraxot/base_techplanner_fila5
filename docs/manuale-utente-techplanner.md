# TechPlanner — Manuale d'uso (bozza verificabile)

> **Stato:** in preparazione. Le sezioni qui sotto distinguono le funzionalità descritte nel repository da quelle da verificare sull'applicazione in esecuzione. **Non includere mockup spacciati per screenshot reali.**
>
> **Repository:** [laraxot/base_techplanner_fila5](https://github.com/laraxot/base_techplanner_fila5), branch `dev`.

## Ambito

TechPlanner è un applicativo Laravel con moduli nwidart e interfacce Filament, dedicato alla gestione di clienti, appuntamenti di servizio tecnico, apparecchiature e riferimenti professionali. La documentazione del modulo `laravel/Modules/TechPlanner/docs/README.md` descrive questi flussi; occorre verificarli sulle risorse UI effettive prima della pubblicazione finale.

## Profili e accesso

Il `RoleSeeder` del modulo `User` definisce i ruoli applicativi `super-admin`, `admin`, `moderator`, `editor`, `user` e `guest`. **La presenza di un ruolo non dimostra che abbia uno specifico permesso su una funzione.** La matrice dei permessi va verificata tramite policy, assegnazioni e controlli dell'applicazione.

| Profilo | Percorso da documentare | Stato della verifica |
|---|---|---|
| super-admin | Configurazione utenti, ruoli e autorizzazioni | Da verificare in UI |
| admin | Gestione operativa e anagrafiche | Da verificare in UI |
| moderator | Operazioni consentite dalle policy effettive | Da verificare in UI |
| editor | Inserimento e aggiornamento consentiti | Da verificare in UI |
| user | Consultazione e operazioni assegnate | Da verificare in UI |
| guest | Pagine eventualmente accessibili senza autenticazione | Da verificare in UI |

Le **figure di dominio** non equivalgono ai ruoli di autorizzazione: clienti, lavoratori/tecnici, partecipanti agli appuntamenti, rappresentanti legali e direttori sanitari sono entità descritte nel modulo, non necessariamente tipi di account.

## Percorsi operativi da verificare

### 1. Anagrafica cliente

1. Accedere all'ambiente di prova con un account autorizzato.
2. Aprire la risorsa clienti effettivamente disponibile nel menu.
3. Inserire dati identificativi, indirizzo e recapiti supportati dal modulo.
4. Associare, quando previsti, rappresentante legale e direttore sanitario.
5. Salvare e controllare l'anagrafica nell'elenco.

**Schermate richieste:** elenco clienti, creazione cliente, dettaglio cliente, gestione contatti. Acquisirle solo da applicazione reale con dati fittizi.

### 2. Registrazione apparecchiature

1. Selezionare il cliente già registrato.
2. Aprire la sezione delle apparecchiature/machine realmente disponibile.
3. Compilare i campi esposti dalla UI e salvare.
4. Verificare l'associazione cliente–apparecchiatura.

**Schermate richieste:** elenco dispositivi, form di inserimento, dettaglio/relazioni.

### 3. Pianificazione appuntamento

1. Aprire la funzione appuntamenti.
2. Selezionare cliente, data e orario.
3. Associare personale e apparecchiature nei limiti consentiti dalla UI.
4. Salvare e verificare l'appuntamento nell'elenco/calendario, se presente.
5. Documentare modifiche e stati soltanto se effettivamente implementati.

**Schermate richieste:** elenco, creazione, dettaglio e modifica appuntamento; calendario solo se realmente presente.

### 4. Esecuzione e follow-up

La documentazione del modulo cita verifiche sul posto, note, report e follow-up. Prima di formulare istruzioni operative occorre accertare quali schermate e azioni siano implementate, se generino davvero report e quali permessi richiedano.

## Screenshot: criteri obbligatori

- Realizzare le immagini **nell'applicazione TechPlanner avviata** (non dal codice, né con un generatore di immagini).
- Usare un database di prova con record dimostrativi credibili, ma **interamente fittizi** e privi di dati sanitari/personali reali.
- Includere, per ogni ruolo che abbia accesso, almeno login, menu, elenco, creazione, dettaglio, modifica, conferme/errori e workflow principali effettivamente presenti.
- Salvare gli screenshot in `docs/manuale/screenshots/<ruolo>/<funzione>.png`; riportare una didascalia con ruolo, funzione e versione/commit applicativo.
- Controllare che screenshot, istruzioni e permessi corrispondano al medesimo commit e alla medesima configurazione di test.
- Nessuna immagine viene dichiarata reale fino a quando non è stata effettivamente acquisita e verificata.

## Preparazione dati dimostrativi

L'ambiente documentale deve utilizzare un database **separato dalla produzione**. Prima di aggiungere o eseguire nuovi seeders/factories verificare quelli esistenti in `laravel/Modules/*/database/{seeders,factories}`, lo schema migrato e le relazioni, ed evitare chiamate a `migrate:fresh` o `db:wipe` su ambienti condivisi. Dati e account demo devono essere deterministici, anonimizzati e idempotenti.

## Checklist di completamento

- [ ] Inventario reale delle risorse e pagine Filament, delle rotte e dei menu.
- [ ] Matrice ruolo/permesso effettiva verificata con account diversi.
- [ ] Seeders/factories demo coerenti con schema e dipendenze, validati da test.
- [ ] Esecuzione dell'applicazione in ambiente isolato.
- [ ] Screenshot reali di ogni procedura e profilo.
- [ ] Verifica end-to-end e correzioni riscontrate.
- [ ] Edizione finale italiana e inglese, Markdown e PDF.

## Fonti nel repository

- `laravel/Modules/TechPlanner/docs/README.md`
- `laravel/Modules/TechPlanner/module.json`
- `laravel/Modules/User/database/seeders/RoleSeeder.php`
- `laravel/Modules/User/database/seeders/UserDatabaseSeeder.php`
- `laravel/phpunit.xml`
