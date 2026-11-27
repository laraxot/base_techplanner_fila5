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

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

Questo indice appartiene a **module_gdpr_fila5**: ogni decisione su codice, dominio o tema va nell'ADR del package owner; il root registra soltanto i vincoli di composizione. Un ADR richiede una scelta reale con alternative e conseguenze, più una **Conferma** ripetibile (oppure la dichiarazione esplicita che manca). Non creare ADR fittizi per riempire un indice.

- [Confine LaravelDay/harness Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/adr/0042-laravel-day-harness-adoption-boundary.md); [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md).
- **BMAD**: la story owner-local conserva `scope`, `must_not_change`, `evidence`, `approval_required` nei cambi rischiosi.
- **ECC**: nessun marker di merge; distinguere la prova eseguita dal semplice riferimento a un test; se la conferma non è disponibile segnare `non eseguita`.
- **Second Brain**: QMD/Graphify e `.harness/memory/{facts,lessons}.md` sono puntatori a evidenza datata, non copie degli ADR. [Runbook](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md) · [Rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
