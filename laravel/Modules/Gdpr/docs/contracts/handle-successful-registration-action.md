---
title: "Contratto — HandleSuccessfulRegistrationAction"
type: contract
action: "Modules\\Gdpr\\Actions\\Registration\\HandleSuccessfulRegistrationAction"
module: Gdpr
status: active
tags: [contract, action, gdpr, registrazione, sessione, email]
created: 2026-11-26
updated: 2026-11-26
---

# HandleSuccessfulRegistrationAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Registration/HandleSuccessfulRegistrationAction.php`. Chiamanti: `Filament/Widgets/Auth/RegisterWidget.php`
(riga 161) e `GdprConsentForm.php` (riga 100), dopo che utente e consensi sono stati salvati.

## Input

- `execute(User $user, XotBaseWidget $widget)`: l'utente appena creato e il widget Livewire che ha ricevuto il form.

## Output

- Nessuno (`void`). L'effetto è la sessione autenticata e il redirect del widget.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GDPR-REGOK-INV-1 | L'utente appena registrato entra in sessione (`Auth::login`) prima di ogni altro passo, anche se la mail di verifica poi fallisce. | — (non dimostrato) |
| GDPR-REGOK-INV-2 | Un errore del server di posta non fa fallire la registrazione già salvata: l'eccezione è inviata a `report()` e non risale; il cittadino può chiedere un nuovo link da `verification.notice`. | — (non dimostrato) |
| GDPR-REGOK-INV-3 | Il redirect va alla pagina che richiedeva l'accesso (`redirectIntended`) e, in mancanza, all'URL di `GetPostLoginUrlAction` (area personale localizzata); mai a `route('dashboard')`, che nel front office risponde 404. | — (non dimostrato) |
| GDPR-REGOK-INV-4 | I testi della notifica di successo vengono da `gdpr::register.success` e `gdpr::register.success_message`: nessuna stringa nel codice. | — (non dimostrato) |

Test: `tests/Unit/Actions/HandleSuccessfulRegistrationActionTest.php` controlla solo che `execute` sia pubblico e abbia due
parametri (riflessione): non prova nessuna delle quattro regole.

## Effetti collaterali

Nell'ordine:

1. `Auth::login($user)` (sessione web, senza «ricordami»).
2. `ResendEmailVerificationAction->execute($user)` del modulo User: invio della mail con il link di verifica (servizio di posta),
   dentro `try/catch (\Throwable)` con `report($exception)`.
3. `Filament\Notifications\Notification` di successo, in sessione.
4. `$widget->redirectIntended(default: GetPostLoginUrlAction->execute())`.

## Errori

- Gli errori della mail non risalgono (INV-2). Qualsiasi altra eccezione (`Auth::login`, notifica, calcolo dell'URL) arriva al
  chiamante, che in `RegisterWidget` non la gestisce: l'utente è già salvato ma la pagina mostra un errore.

## Non fa

- Non crea l'utente e non salva consensi (`SaveGdprConsentsAction`, chiamata prima dal widget).
- Non verifica l'email: la persona è autenticata con l'email ancora non verificata finché non usa il link. Quali aree richiedono
  `verified` lo decide il progetto ospite.
- Non registra la registrazione nell'activity log (`LogRegistrationAction` del modulo User, chiamata dal widget).
- Non gestisce gli errori di registrazione (`HandleRegistrationErrorAction`, oggi senza chiamanti).
