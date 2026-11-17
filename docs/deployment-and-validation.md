# Deployment e validazione produzione

## Produzione

- **Dominio target**: `sottana.com` (HTTPS da abilitare – vedi [ssl-configuration.md](./ssl-configuration.md))
- **Document root server**: `/home/ploi/sottana.com/public_html`
- **Codice Laravel**: `/home/ploi/sottana.com/laravel`
- **Sito storico / alias**: `sottana.net` (altro host; validazione PageSpeed ancora su quel dominio se attivo)
- **Deploy**: push sul branch `master` attiva l’auto-deploy
- **Validazione**: dopo modifiche frontend o contatti/mappa verificare su `https://sottana.com/it/contatti` (o `http://` finché SSL non è installato)

## Workflow

1. Sviluppo e test in locale (es. http://127.0.0.1:8002)
2. Commit e push su branch di sviluppo
3. Merge su `master` → auto-deploy
4. Verifica su https://sottana.net (stesse pagine modificate)

## Diagnosi HTTP 500 del 2026-11-06

La richiesta `https://sottana.com/it` ha evidenziato tre blocchi successivi:

1. L'autoload generato richiedeva `Modules/Xot/Helpers/Helper.php`, mentre il manifest corrente indica `Modules/Xot/helpers/Helper.php`. Il fatal avveniva prima del bootstrap Laravel ed era registrato in `/var/log/nginx/sottana.com-error.log`.
2. La rigenerazione era impedita da una dipendenza duplicata senza virgola in `Modules/Gdpr/composer.json`. Dopo la correzione, il codice richiedeva ancora dipendenze diverse da quelle installate: il runtime era Laravel 12.52.0, mentre il lock del rilascio prevedeva Laravel 13.40.0. Il modello `BaseUser` falliva sulla precedenza del metodo `HasSpatiePermission::teams`. L'aggiornamento Composer avviato separatamente nella sessione del server ha allineato le dipendenze e risolto questo fatal.
3. Il CMS rilevava due record con slug `header`: `sections/1.json`, vuoto, e `sections/header.json`, completo. Lo stesso valeva per `footer` con `2.json` e `footer.json`. Rimossi i due record vuoti da `laravel/config/local/techplanner/database/content/sections/`, preservando i file completi, la home ha risposto HTTP 200.

Per i deploy, allineare `vendor/` al `composer.lock` del rilascio e verificare la validita' dei manifest di tutti i moduli prima di rigenerare l'autoload. Non mantenere due JSON con lo stesso slug nella cartella dei contenuti attivi: il CMS segnala correttamente la collisione.

Verifiche dalla cartella `laravel/`:

```bash
php artisan --version
curl -sS -o /dev/null -w 'HTTP %{http_code}\n' https://sottana.com/it
```

Per gli errori successivi al bootstrap consultare anche `laravel/storage/logs/laravel.log`.

## Collegamenti simbolici del tenant e del tema

Il commit `02abdc831` del 2026-11-06 ha cambiato il tipo Git dei collegamenti da `120000` (symlink) a `100644` (file normale), conservando soltanto il testo del percorso. Un file con scritto `../local/techplanner/` non e' una directory e provoca `DirectoryNotFoundException` durante il bootstrap di Tenant.

Collegamenti richiesti:

- `laravel/config/com/sottana` → `../local/techplanner/`
- `laravel/config/net/sottana` → `../local/techplanner/`
- `public_html/themes/Two` → `../../laravel/Themes/Two/public`

Ripristinati i tre symlink e impostato `git config --local core.symlinks true`. Nei commit e nei merge devono conservare il modo Git `120000`; l'opzione locale non converte da sola file gia' registrati come `100644`. Verificare sia `test -L <percorso>` sia `test -d <percorso>`.

Verifica del ripristino: tenant `com/sottana`, 25 configurazioni PHP leggibili, home e login HTTP 200; `/techplanner/admin` senza sessione autenticata risponde 302 verso il login amministrativo.

## Verifica dei log del 2026-11-06

L'audit ha individuato un riferimento residuo a `TenantService::filePath()` nel trait `SushiToJson`: sostituito con `GetTenantFilePathAction`. Riparato inoltre `information_schema_tables.json`, che conteneva marcatori di merge, e ripubblicati gli asset Livewire per allinearli al pacchetto installato.

Verificati HTTP 200 su dashboard, clienti e dispositivi con autenticazione temporanea interna, oltre alle pagine pubbliche e di autenticazione. Controllati i JSON runtime e il comportamento dell'attributo `Client::distance`. PHPStan sul trait corretto: nessun errore. La suite Pest resta bloccata dal bootstrap dei test (`XotBaseTestCase` non risolto); PHPMD non e' installato e il browser headless richiede librerie di sistema mancanti.

La pulizia interessa i log attivi `laravel/storage/logs/{laravel,browser}.log` e `/var/log/nginx/sottana.{com,net}-error.log`, troncati senza rimuovere i file. Gli archivi ruotati restano conservati. Dopo la pulizia ripetere le richieste e controllare che non vengano registrati nuovi errori.

## Asset JavaScript Filament dopo Composer

Gli errori Alpine `filamentSidebar is not defined`, `filamentSidebarBackground is not defined`, `notificationsComponent is not defined` e `setUpFilamentBroadcastNotifications is not defined` richiedono di verificare gli asset Filament, oltre a quelli Livewire. Le viste aggiornate devono essere servite insieme ai JavaScript della stessa versione.

Il callback Composer `post-autoload-dump` esegue `php artisan filament:upgrade` dopo `package:discover`: pubblica gli asset correnti e pulisce le cache Filament interessate. La pubblicazione manuale si esegue dalla cartella `laravel/`:

```bash
php artisan filament:upgrade
php artisan livewire:publish --assets
php artisan vendor:publish --tag=cookie-public --force
```

La verifica browser autenticata del 2026-11-06 su `/techplanner/admin/medical-directors` conferma HTTP 200, tabella inizializzata, sidebar disponibile e funzione broadcast registrata, senza errori JavaScript. Pubblicato anche il CSS cookie-consent precedentemente in 404. Il browser pulito non riproduce gli avvisi Permissions-Policy indicati: le risposte osservate non contengono quell'header. Dopo una pubblicazione con URL gia' presenti nella cache del browser, ricaricare la pagina con `Ctrl+F5`.

## Pagine da controllare dopo deploy

- Home: https://sottana.net/it
- Contatti (mappa, indirizzo, link Google Maps): https://sottana.net/it/contatti
- Servizi, Chi siamo, altre pagine toccate dalla release

## PageSpeed Insights

Validare le pagine frontoffice con [PageSpeed Insights](https://pagespeed.web.dev/). Elenco URL e procedura in:

- [Themes/Two/docs/pagespeed-frontoffice-validation.md](laravel/Themes/Two/docs/pagespeed-frontoffice-validation.md)
- Elenco URL: [docs/pagespeed-frontoffice-urls.txt](pagespeed-frontoffice-urls.txt)

## SSL prima del go-live HTTPS

1. Correggere DNS (record A + CNAME `www`) – [ssl-configuration.md](./ssl-configuration.md)
2. `bash bashscripts/utils/verify_ssl_dns.sh`
3. Installare Let's Encrypt dal **pannello Ploi**
4. Impostare `APP_URL=https://sottana.com` e `FORCE_SSL=true` in `.env` produzione

## Collegamenti

- [Configurazione SSL](./ssl-configuration.md)
- [Tema Two - Deploy e validazione](laravel/Themes/Two/docs/deployment-and-validation.md)
- [Contatti e mappa - Sottana Service](laravel/Themes/Two/docs/contatti-sottana-service.md)
- [PageSpeed frontoffice](laravel/Themes/Two/docs/pagespeed-frontoffice-validation.md)
- [Regole mappe solo gratuiti](.cursor/rules/free-maps-only.mdc)
