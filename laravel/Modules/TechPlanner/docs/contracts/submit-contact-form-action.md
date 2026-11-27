---
title: "Contratto — SubmitContactFormAction"
type: contract
action: "Modules\TechPlanner\Actions\Contact\SubmitContactFormAction"
tags: [contract, action, contatti, http, antispam]
created: 2026-11-24
updated: 2026-11-24
---

# SubmitContactFormAction

Sorgente: `app/Actions/Contact/SubmitContactFormAction.php`, rotta `POST /{lang}/contact` (`routes/web.php`).
Perché: [ADR](../adr/contact-form-archive-then-forward.md).

## Input

- `Request`: campi `nome`, `email`, `telefono`, `studio`, `tipo`, `messaggio`, `privacy`, honeypot `website`;
  parametro di rotta `lang`.

## Output

- `RedirectResponse` alla pagina di provenienza con frammento `#contact-form-feedback` e, secondo il caso, il flash
  `contact_outcome` (`sent`/`received`/`failed`) oppure gli errori di validazione.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| TP-CONTACT-SUBMIT-INV-1 | La rotta `techplanner.contact.submit` è POST, nel gruppo `web` (sessione, CSRF), con `throttle:5,10`. | `TP-CONTACT-SUBMIT-INV-1` |
| TP-CONTACT-SUBMIT-INV-2 | Honeypot pieno = stessa risposta di un invio riuscito (`sent`), niente archivio né mail. | `TP-CONTACT-SUBMIT-INV-2` |
| TP-CONTACT-SUBMIT-INV-3 | Validazione fallita = errori sui campi giusti, input ripopolato, niente archivio né `contact_outcome`; messaggi in italiano leggibile, mai chiavi grezze. | `TP-CONTACT-SUBMIT-INV-3` |
| TP-CONTACT-SUBMIT-INV-4 | Il flash `contact_outcome` è l'esito di `DeliverContactMessageAction`; con `failed` l'input si ripopola. | `TP-CONTACT-SUBMIT-INV-4` |

## Effetti collaterali

- Quelli di `DeliverContactMessageAction` (archivio, mail, log).
- Dati di sessione: flash `contact_outcome`, errori, old input.

## Errori

- Nessuna eccezione propria: la validazione torna come errori di sessione.

## Non fa

- Non mostra il form né decide se mostrarlo: la vista del tema usa `ResolveContactRecipientAction`.
- Non limita per email: il throttle è per IP sulla rotta.
- Non è una `QueueableAction`: è un controller invocabile (deve rispondere alla richiesta).
