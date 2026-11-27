---
title: "Contratto — SendMailAction"
type: contract
action: "Modules\\Notify\\Actions\\Mail\\SendMailAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail, engine]
created: 2026-11-26
updated: 2026-11-26
---

# SendMailAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Mail/SendMailAction.php`. Dispatcher verso l'engine email
`Engines\{Driver}\Send{Driver}MailAction` (default `duocircle`, WIP).

## Input

- `string $to`: destinatario.
- `?string $body`: corpo.
- `array<string, mixed> $vars`: variabili; le chiavi stringa diventano anche proprieta' pubbliche
  dell'Action (e sono unite a `$this->vars`).
- `?string $from`, `string $driver`: mittente e driver (`duocircle`, ...).

## Output

- `void`: l'esito e' quello dell'engine delegato.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-MAIL-INV-1 | Il nome della classe engine e' derivato da `$driver` (`Str::studly`) nel namespace `Modules\Notify\Actions\Mail\Engines\<Driver>\Send<Driver>MailAction`. | — (non dimostrato) |
| NOTIFY-MAIL-INV-2 | Driver senza engine o engine senza `execute()` → `Assert::classExists` fallisce oppure `RuntimeException`. | — (non dimostrato) |
| NOTIFY-MAIL-INV-3 | Le chiavi stringa di `$vars` sovrascrivono le proprieta' pubbliche omonime prima del dispatch. | — (non dimostrato) |

## Effetti collaterali

- Quelli dell'engine risolto (oggi `SendDuocircleMailAction` lancia sempre `RuntimeException`).

## Errori

- `RuntimeException`/`AssertionFailedException`: engine mancante, privo di `execute()`, o il WIP
  dell'engine Duocircle.

## Non fa

- Non compone il messaggio: solo instrada al driver.
- Non ha fallback: senza engine l'invio fallisce.
- Non e' il percorso principale: `SendNotificationAction` (canale `mail`) usa la Notification facade.
