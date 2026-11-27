---
title: "Contratto — UpdateGdprConsentsAction"
type: contract
action: "Modules\\Gdpr\\Actions\\UpdateGdprConsentsAction"
module: Gdpr
status: active
tags: [contract, action, gdpr, consenso, profilo]
created: 2026-11-26
updated: 2026-11-26
related:
  - ../adr/0002-consent-proof-is-append-only.md
  - save-gdpr-consents-action.md
---

# UpdateGdprConsentsAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/UpdateGdprConsentsAction.php`. Cambiare idea sul consenso (dal profilo) **aggiunge** righe: perché è nell'
[ADR prova del consenso](../adr/0002-consent-proof-is-append-only.md).

Stato d'uso: nessun codice di produzione nel repository la chiama (`rg UpdateGdprConsentsAction`: solo la classe). È un punto
di ingresso per i progetti ospite.

## Input

- `execute(User $user, array $consents, ?string $ipAddress = null, ?string $userAgent = null)`: gli stessi argomenti di
  `SaveGdprConsentsAction` (`privacy_accepted`, `terms_accepted`, `marketing_consent`).

## Output

- Nessuno (`void`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GDPR-UPDATE-INV-1 | Non aggiorna mai una riga esistente: delega a `SaveGdprConsentsAction` e quindi aggiunge una riga per trattamento, così la storia delle scelte resta la prova (art. 7). | — (non dimostrato: `GDPR-SAVE-INV-5` prova la regola sulla Action a cui delega, non questa) |

## Effetti collaterali

- Quelli di `SaveGdprConsentsAction` (vedi il suo contratto): `Treatment::firstOrCreate`, tre `Consent::create`, un `Log::debug`.

## Errori

- Quelli di `SaveGdprConsentsAction`: le eccezioni del database arrivano al chiamante.

## Non fa

- Non revoca: per ritirare tutti i consensi serve `Consent\RevokeGdprConsentsAction`.
- Non confronta la scelta nuova con l'ultima: una chiamata con gli stessi valori aggiunge comunque tre righe.
- Non controlla che l'utente autenticato sia `$user`: l'autorizzazione è del chiamante.
- Non calcola lo stato attuale: chi legge deve prendere l'ultima riga non revocata per trattamento.
