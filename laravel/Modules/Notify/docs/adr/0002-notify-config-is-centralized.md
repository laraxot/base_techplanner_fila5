---
title: "ADR — Configurazione Notify centralizzata"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-26
issues: []
module: Notify
qmd: "notify adr configurazione centralizzata contesto driver decisione alternative scartate conseguenze conferma"
decision-makers: [team back office]
---

# ADR — Configurazione Notify centralizzata

## Contesto

Notify ha tre origini di configurazione (lette nel codice il 2026-11-26):

- il file del modulo `Modules/Notify/config/notify.php`, montato come `notify.notify.<chiave>` (per esempio `notify.notify.inbound_token`, `notify.notify.mailjet_webhook_token`, `notify.notify.mail_dns`; `notify.inbound_token` non esiste), con `Env::get` al posto di `env()`;
- `laravel/config/notify-env.php`, dove `env()` è ammesso, che `NotifyServiceProvider::register()` (riga 30, trait `MergesNotifyConfigFromEnv`) fonde in `notify.notify.company|email|paths`, `notify.config.*` (layout mail) e `notify.sms|whatsapp|telegram.*`;
- le impostazioni per installazione: `Datas/NotifyConfigData` legge il file tenant `notify` (`NotifyConfigData::tenantConfigName()`), cioè `laravel/config/local/fixcity/notify.php`, che in FixCity **non esiste**: valgono i default (pulizia dei log disattiva, 30 giorni, lotti da 1000, si tengono i falliti, `fcm_url` di Google).

Le credenziali dei fornitori sono lette dalle Action con `config()` da `services.*` (telegram, twilio, vonage, facebook, 360dialog, netfun), `esendex.*` e `sms.drivers.*`; `laravel/config/local/fixcity/services.php` (tenant) sovrascrive `services`.

Domanda: da dove legge un segreto o un parametro un'Action di Notify, e dove si può chiamare `env()`?

## Driver della decisione

- `env()` fuori da `config/` non funziona con `config:cache`; la regola Larastan `noEnvCallsOutsideOfConfig` lo vieta (commento in `Modules/Notify/config/notify.php`).
- Un modulo condiviso non porta i default di un progetto preciso (`default_from_address`: `noreply@localhost`, commento alla riga 51 di `Modules/Notify/config/notify.php`).
- Alcune impostazioni cambiano per installazione e si modificano dal pannello (`SettingPage`) senza toccare `.env`.
- I segreti dei fornitori non devono diventare un campo modificabile o salvabile.

## Alternative scartate

- `env()` dentro le Action, i provider o le view: smette di funzionare con la configurazione in cache e sparge i segreti in file diversi.
- Un solo file di configurazione del modulo con `env()`: la regola Larastan ammette `env()` solo in `laravel/config` (commento in `Modules/Notify/config/notify.php`), per questo esiste `notify-env.php`.
- I segreti dentro `NotifyConfigData` (impostazioni modificabili dal pannello): resterebbero visibili e salvati; il test «the secret fcm server key is never a property» lo impedisce.

## Decisione

`env()` vive solo nei file di `laravel/config` (`notify-env.php`) e il config del modulo usa `Env::get`; `NotifyServiceProvider` fonde `notify-env` nelle chiavi `notify.*` (`mergeNotifyModuleConfigFromEnv`). Le impostazioni per installazione passano da `NotifyConfigData` (tenant), i segreti no. Le Action e i canali leggono con `config()`.

## Conseguenze

- La configurazione è cacheabile e `env()` non compare fuori da `config/`.
- Il prefisso doppio `notify.notify.` è facile da sbagliare: la chiave sbagliata dà `null` e il webhook risponde 401 per tutti (fail-closed, ADR 0004).
- Debito: provider e Action leggono da più chiavi (`services.*`, `esendex.*`, `sms.drivers.*`, `notify.*`); l'adapter `NotifyConfigData` copre solo pulizia dei log e `fcm_url`.

## Stato attuale

Il codice segue la decisione solo in parte (lettura del 2026-11-26, Pest non eseguito):

- Telegram ha il token definito due volte: `laravel/config/notify-env.php:143` (`notify.telegram.drivers.official.token`, fuso in `notify.telegram.*`) e `laravel/config/local/fixcity/services.php:33` (`services.telegram.token`); le tre Action Telegram leggono solo `services.telegram.token` (`Actions/Telegram/Send*TelegramAction.php:48`).
- Il default dell'indirizzo mittente è contraddetto: `Modules/Notify/config/notify.php:52` ha `noreply@localhost` (il commento dice che il vecchio `noreply@fixcity.eu` è stato tolto), ma `laravel/config/notify-env.php:18` lo ripropone e `mergeNotifyCompanyConfig` lo scrive sempre su `notify.notify.email.default_from_address`: in pratica vince `noreply@fixcity.eu`.
- La regola `larastan.noEnvCallsOutsideOfConfig` è commentata in `laravel/phpstan.neon:27` e non compare in `laravel/phpstan-strict.neon`: la versione precedente di questo ADR la dava per attiva.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Notify/tests/Unit/Datas/NotifyConfigDataTest.php`: fallisce se i default di `NotifyConfigData` cambiano, se il file tenant `notify` non li sovrascrive o se un segreto diventa una proprietà.
- Review ripetibile: `cd laravel && rg -n 'env\(' Modules/Notify/app Modules/Notify/config --glob '*.php'` deve trovare solo commenti (il 2026-11-26: `config/notify.php:10` e `Providers/Concerns/MergesNotifyConfigFromEnv.php:12`).
- Nessuna conferma automatica che le Action leggano dalle stesse chiavi di configurazione; proposta: riattivare `larastan.noEnvCallsOutsideOfConfig` in `laravel/phpstan.neon` e un test che scandisce i `config('…')` di `app/Actions`.
