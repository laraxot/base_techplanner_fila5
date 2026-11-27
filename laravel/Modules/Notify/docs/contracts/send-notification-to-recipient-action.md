---
title: "Contratto — SendNotificationToRecipientAction"
type: contract
action: "Modules\\Notify\\Actions\\SendNotificationToRecipientAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail]
created: 2026-11-26
updated: 2026-11-26
---

# SendNotificationToRecipientAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SendNotificationToRecipientAction.php`. Inoltra una `Notification` Laravel a un indirizzo email
nudo (destinatario anonimo), per i moduli che non hanno un modello destinatario.

## Input

- `string $recipient`: indirizzo email del destinatario (non un modello Eloquent).
- `Illuminate\Notifications\Notification $notification`: la notifica da inoltrare.
- `?string $locale`: accettato ma non usato (vedi INV-4).

## Output

- `true` dopo l'inoltro al dispatcher Laravel. Non dice se la mail sia stata consegnata: la consegna dipende dal canale
  della notifica e dalla coda.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-RECIPIENT-INV-1 | L'indirizzo è validato con `Assert::email` prima di ogni invio: un indirizzo non valido lancia `InvalidArgumentException` e non parte nessuna notifica. | NOTIFY-RECIPIENT-INV-1 |
| NOTIFY-RECIPIENT-INV-2 | La notifica va a un destinatario anonimo con rotta `mail` uguale a `$recipient` (`Notification::route('mail', $recipient)->notify($notification)`). | NOTIFY-RECIPIENT-INV-2 |
| NOTIFY-RECIPIENT-INV-3 | Se l'inoltro non solleva eccezioni, l'Action ritorna sempre `true`. | NOTIFY-RECIPIENT-INV-3 |
| NOTIFY-RECIPIENT-INV-4 | `$locale` non ha effetto: l'Action non imposta nessuna lingua (commento nel codice: «AnonymousNotifiable non supporta ->locale()»); la lingua dipende dalla `Notification`. Limite noto: il parametro è nella firma ma è morto. | — (non dimostrato) |

## Effetti collaterali

- Inoltra la `Notification` tramite la facade `Notification` sul canale `mail`: dispatch immediato, oppure in coda se la
  notifica implementa `ShouldQueue`.
- Tratta un dato personale (l'indirizzo email) ma non lo salva: nessuna riga in `notifications`.

## Errori

- `InvalidArgumentException` (da `Webmozart\Assert`) con messaggio «Recipient must be valid email address» per un
  indirizzo non valido.
- Le eccezioni del dispatcher o del mailer risalgono al chiamante: l'Action non le cattura.

## Non fa

- Non risolve modelli destinatario né altri canali oltre a `mail`.
- Non persiste un `Notification` Eloquent, non fa retry propri e non verifica la consegna.
- Non applica il locale richiesto.
