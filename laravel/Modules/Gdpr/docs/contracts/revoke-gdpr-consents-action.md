---
title: "Contratto — RevokeGdprConsentsAction"
type: contract
action: "Modules\\Gdpr\\Actions\\Consent\\RevokeGdprConsentsAction"
module: Gdpr
status: active
tags: [contract, action, gdpr, consenso, revoca, art-7]
created: 2026-11-24
updated: 2026-11-26
related:
  - ../adr/0002-consent-proof-is-append-only.md
---

# RevokeGdprConsentsAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Consent/RevokeGdprConsentsAction.php` (GDPR art. 7 par. 3). Perché la revoca non cancella righe:
[ADR prova del consenso](../adr/0002-consent-proof-is-append-only.md).

Ripristinato il 2026-11-26: il file era stato cancellato dal commit `bb71164f` (riordino dei docs «ceiling 100»).

## Input

- `execute(BaseUser $user)`: l'utente di cui si revocano i consensi.
- Impliciti: l'IP della richiesta corrente (`request()->ip()`) e l'utente autenticato (`auth()->id()`).

Unico chiamante: `Account\DeleteAccountAction` (riga 72, passo 1 della cancellazione). `Models/Traits/HasGdpr::revokeConsent()`
(riga 119) non passa da questa Action (`rg RevokeGdprConsentsAction`): revoca per tipo con codice proprio.

## Output

- Nessuno (`void`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GDPR-REVOKE-INV-1 | Revoca = `UPDATE` di `revoked_at`, `revoked_ip_address`, `updated_by`: nessuna riga di `consents` viene cancellata (traccia per l'art. 30). Una `DELETE` renderebbe la revoca stessa non dimostrabile. | `GDPR-REVOKE-INV-1` |
| GDPR-REVOKE-INV-2 | Tocca solo le righe con `revoked_at` nullo: una revoca precedente conserva data e IP originali. | `GDPR-REVOKE-INV-2` |
| GDPR-REVOKE-INV-3 | L'utente si riconosce da `user_id` + `user_type` in entrambe le forme (classe, scritta da `SaveGdprConsentsAction`; alias morph, scritto da `HasGdpr::giveConsent`); i consensi di un altro utente non si toccano. | `GDPR-REVOKE-INV-3` |
| GDPR-REVOKE-INV-4 | Scrive solo colonne che esistono in `consents` (DCP-285): mai `subject_type` né `revoked_user_agent`. | `GDPR-REVOKE-INV-4` |
| GDPR-REVOKE-INV-5 | Un utente senza consensi non è un errore: 0 righe aggiornate, nessuna riga creata. | `GDPR-REVOKE-INV-5` |

Test: `tests/Unit/Actions/RevokeGdprConsentsActionTest.php`, classe PHPUnit con `#[Group]` per metodo (il test 1 prova INV-2,
INV-3 e INV-4 perché esegue l'UPDATE reale; il test 2 INV-1; il test 3 INV-5). Ultimo esito noto: rosso il 2026-11-24 nel DB di
prova condiviso, perché la `UserFactory` scrive `users.state` che quella tabella non ha (errore prima di arrivare all'Action).
Non rieseguito il 2026-11-26: finché non torna verde il group seleziona il test ma non dimostra la regola.

## Effetti collaterali

- Una sola query: `UPDATE consents SET revoked_at = now(), revoked_ip_address = <ip>, updated_by = <auth id o id utente>
  WHERE user_id = ? AND user_type IN (alias morph, classe) AND revoked_at IS NULL`.

## Errori

- Le eccezioni del database arrivano al chiamante. Un utente senza consensi non è un errore (INV-5).

## Non fa

- Non salva lo user agent della revoca: manca la colonna `revoked_user_agent` (richiesta di schema in DCP-285).
- Non revoca un solo trattamento: revoca tutto.
- Non cancella l'utente né i suoi dati (`Account\DeleteAccountAction`).
- Non crea una riga che registri la revoca: la prova è la colonna `revoked_at` stessa.
- Non apre una transazione e non notifica l'utente.
