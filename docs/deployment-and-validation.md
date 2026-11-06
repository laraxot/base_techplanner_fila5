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
