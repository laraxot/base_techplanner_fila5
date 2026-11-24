---
status: accepted
module: Comment
---

# Comment risolve la policy nel modulo owner

## Contesto

I commenti possono essere associati a domini diversi e non devono assumere che ogni modello usi la stessa policy.

## Driver della decisione

- Riutilizzare commenti e moderazione senza bypassare autorizzazioni.

## Decisione

Comment risolve la policy e il contesto del record owner prima di consentire inserimento, modifica o moderazione.

## Alternative scartate

- Usare una policy globale identica per ogni modello.
- Considerare il rendering della view come controllo di sicurezza.

## Conseguenze

Il modulo resta integrabile in domini diversi; ogni integrazione deve dichiarare ownership e policy.

## Conferma

Verificare resolver, policy e test di moderazione del modello integrato.
