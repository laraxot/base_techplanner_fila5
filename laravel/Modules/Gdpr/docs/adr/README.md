---
title: "ADR del modulo Gdpr"
type: index
tags: [adr, decisioni, gdpr]
created: 2026-11-18
updated: 2026-11-26
---

# ADR del modulo Gdpr

Il **perché** delle forme di codice del modulo Gdpr che un agente rischia di "semplificare": come si conserva la prova dei
consensi (GDPR art. 7), cosa fa la cancellazione dell'account (art. 17) e dove si attacca il banner dei cookie.

Quando leggerli: prima di toccare `consents`/`treatments`, le Action di `app/Actions/Consent` e `app/Actions/Account`, oppure
`GdprServiceProvider` e `InjectCookieBanner`. Formato e regole (sei sezioni in italiano: Contesto, Driver della decisione, Alternative scartate, Decisione, Conseguenze, Conferma;
nomi senza date): `Modules/Xot/docs/rules/action-behavioral-contract.md` e `Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php`.

## Decisioni

- [La prova del consenso è una riga per scelta, mai sovrascritta](0002-consent-proof-is-append-only.md) — solo INSERT alla registrazione, revoca con `revoked_at`, nessun DELETE.
- [La cancellazione dell'account disattiva l'utente e conserva la prova](0001-account-deletion-deactivates-and-keeps-proof.md) — `deleted_at` + revoca consensi e token; anonimizzare è compito del progetto.
- [Il banner cookie è cablato dal provider del modulo](0003-cookie-banner-wired-by-the-module.md) — traduzioni, vista e middleware sopra statikbe, flag del tenant valutato a ogni richiesta.

## Stato di copertura (2026-11-26)

- 3 decisioni, tutte `accepted`, con le sei sezioni e `decision-makers`.
- Conferma: il banner cookie ha un test verde dedicato (`CookieConsentWiringTest`); la prova del consenso ha i group
  `GDPR-SAVE-INV-1`…`5`; la cancellazione dell'account non ha nessun test nel modulo (la prova sta in User e Fixcity) e la revoca ha
  un test rosso nell'ultimo esito noto. Dettaglio nel [README dei contratti](../contracts/README.md).
- Nessun ADR superato e nessun file non-decisione in questa cartella.
