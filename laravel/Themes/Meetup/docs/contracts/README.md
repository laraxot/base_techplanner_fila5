---
title: "Contratti del tema Meetup"
type: index
tags: [contracts, meetup]
created: 2026-11-24
updated: 2026-11-24
---

# Contratti del tema Meetup

Meetup **non ha Action**: `app/` contiene solo `Providers/ThemeServiceProvider.php`. La cartella non contiene contratti.

**Unico effetto collaterale del tema (debito dichiarato):** il provider registra `POST /events/{slug}/book` →
`Http/Controllers/EventBookingController::book()`, che valida nome, email e posti (1-5) e **incrementa
`attendees_count` dell'evento** con `save()`. Non e' un'Action e non ha contratto; da sapere prima di toccarlo o imitarlo:

- la rotta e' registrata senza middleware `web`: niente sessione ne' CSRF, chiunque puo' chiamarla;
- lettura e scrittura del contatore non sono atomiche (due richieste concorrenti possono superare `max_attendees`);
- nome ed email validati non vengono salvati (nessun record di prenotazione);
- dipende da `Modules\Meetup\Models\Event`, modulo non presente in ogni installazione.

Il posto giusto per questa logica e' un'Action del modulo eventi con il suo contratto, chiamata da un widget o da Volt
([ADR](../adr/0003-public-pages-from-json-via-x-page.md)).

**Dove stanno i contratti applicativi:** nei moduli, es. `Modules/User/docs/contracts/` (login),
`Modules/Gdpr/docs/contracts/` (consensi in registrazione), `Modules/Cms/docs/contracts/` (pagine).

## Contratti

Nessuno (il tema non ha Action). Inventario machine-readable: [INDEX.md](INDEX.md); tabella di lavoro: [index.md](index.md); template per un futuro contratto: [_template.md](_template.md).

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

I contratti di **theme_meetup_fila5** restano accanto alle Action, interfacce o superfici di questo package; root e Xot definiscono lo standard, non copiano le promesse. Un contratto comportamentale esplicita **Input, Output, Invarianti, Effetti collaterali, Errori, Non fa**; ogni ID di invariante punta a un group Pest effettivo oppure segnala `non dimostrata`. Se esiste la classe, il docblock deve rimandare al file con `@contract` e `@see`; per temi senza classi PHP non inventare Action/contratti.

- [Standard Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/contracts/contract-authoring-standard.md) · [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md) · [runbook ECC/Second Brain](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md).
- **BMAD**: prima di cambiare una promessa, fissa nella story owner scope, esclusioni, evidenza e approvazioni richieste.
- **ECC**: i marker di merge rendono invalido l'indice; citare una suite non significa averla eseguita. Distingui `pass`, `fail`, `non eseguito` e registra il debito in [rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
