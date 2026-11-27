---
title: "Contratto — HandleRegistrationErrorAction"
type: contract
action: "Modules\\Gdpr\\Actions\\Registration\\HandleRegistrationErrorAction"
module: Gdpr
status: active
tags: [contract, action, gdpr, registrazione, log, privacy]
created: 2026-11-26
updated: 2026-11-26
---

# HandleRegistrationErrorAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Registration/HandleRegistrationErrorAction.php`.

Stato d'uso: oggi **nessun codice la chiama** (`rg HandleRegistrationErrorAction`: solo la classe e il suo test). Né
`RegisterWidget` né `GdprConsentForm` la usano. Il contratto fissa cosa promette se qualcuno la collega, e cosa non va esteso.

## Input

- `execute(\Exception $e, XotBaseWidget $widget)`: l'eccezione della registrazione fallita. `$widget` non è usato nel corpo.
- Impliciti: IP e user agent della richiesta corrente.

## Output

- Nessuno (`void`). Non rilancia l'eccezione e non fa redirect.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GDPR-REGERR-INV-1 | L'errore è sempre scritto a livello `error` nel log prima di avvisare la persona. | — (non dimostrato) |
| GDPR-REGERR-INV-2 | La persona vede solo i testi generici `gdpr::register.error` e `gdpr::register.error_message`: il messaggio dell'eccezione non va mai nella notifica. | — (non dimostrato) |

Test: `tests/Unit/Actions/HandleRegistrationErrorActionTest.php` controlla solo che `execute` sia pubblico e abbia due
parametri (riflessione): non prova nessuna delle due regole.

## Effetti collaterali

Nell'ordine:

1. `Log::error('Registration failed: '.$e->getMessage(), ['exception' => $e, 'trace', 'ip', 'user_agent'])`.
2. `Filament\Notifications\Notification` di tipo `danger`, in sessione.

## Errori

- Nessuna eccezione propria. Se il log o la notifica falliscono, l'eccezione arriva al chiamante.

## Non fa

- Non fa rollback: la transazione della registrazione è del chiamante.
- Non distingue gli errori (utente duplicato, database giù, posta): messaggio unico.
- Non cancella né anonimizza i dati già salvati prima dell'errore.

Limite noto (privacy): il log contiene IP, user agent, stack trace e il messaggio dell'eccezione. Per una `QueryException` quel
messaggio include l'SQL con i valori legati (email, nome) e finisce in chiaro nel log applicativo. Prima di collegare l'Action,
decidere cosa si può scrivere nel log e per quanto tempo (nel modulo non c'è alcuna retention dei log: la chiave
`gdpr.config.retention` non è letta da nessun codice). Nel frattempo non imitare questo schema di log in codice nuovo.
