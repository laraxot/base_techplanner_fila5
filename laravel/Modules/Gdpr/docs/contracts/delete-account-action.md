---
title: "Contratto — DeleteAccountAction"
type: contract
action: "Modules\\Gdpr\\Actions\\Account\\DeleteAccountAction"
module: Gdpr
status: active
tags: [contract, action, gdpr, cancellazione, art-17]
created: 2026-11-24
updated: 2026-11-26
related:
  - ../adr/0001-account-deletion-deactivates-and-keeps-proof.md
---

# DeleteAccountAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Account/DeleteAccountAction.php`. Perché disattiva invece di cancellare:
[ADR cancellazione dell'account](../adr/0001-account-deletion-deactivates-and-keeps-proof.md).

Ripristinato il 2026-11-26: il file era stato cancellato dal commit `bb71164f` (riordino dei docs «ceiling 100»).

## Input

- `__invoke(Request $request)`: rotta `account.delete` (`Route::match(['get', 'post'], '/{lang}/account/delete')`,
  `routes/web.php` riga 11), utente autenticato, campi `confirm` (deve valere `cancella`) e `reason` (facoltativo, max 1000).
- `execute(BaseUser $user, string $reason = '')`: uso diretto da un'altra Action del progetto ospite.

## Output

- `__invoke`: redirect a `/{locale}`. GET: senza fare nulla. POST: con flash `status` = `gdpr::account.flash.account_deleted`.
- `execute`: `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GDPR-DELETE-INV-1 | Autorizza con l'ability `deleteOwnAccount` (`BaseUserPolicy`), mai con `delete` (che è del back office: un amministratore non cancella l'account altrui da qui). | — (non dimostrato: `SignedInUserAuthPagesTest` prova la policy, non che l'Action la usi) |
| GDPR-DELETE-INV-2 | Revoca consensi, riga `account_deletion`, `deleted_at`/`deleted_by`, revoca token e activity girano dentro `DB::connection('user')->transaction()`: un'eccezione lascia l'utente attivo. | — (non dimostrato) |
| GDPR-DELETE-INV-3 | L'utente non viene cancellato fisicamente: si valorizza `deleted_at` (`BaseUser` non usa `SoftDeletes`). | — (non dimostrato nel pacchetto; prova indiretta in `Modules/Fixcity/tests/Feature/Privacy/AccountDeletionFromSettingsTest.php`, senza group) |
| GDPR-DELETE-INV-4 | La richiesta di cancellazione resta come riga di `consents` di tipo `account_deletion` con IP, user agent e motivo in `metadata.reason`. | — (non dimostrato nel pacchetto; stessa prova indiretta in Fixcity, che controlla l'esistenza della riga ma non IP né motivo) |
| GDPR-DELETE-INV-5 | Dopo il commit la sessione è chiusa e invalidata, il token CSRF rigenerato. | — (non dimostrato nel pacchetto; Fixcity controlla `assertGuest()`, non invalidazione e token) |

Nessun test del modulo Gdpr esercita questa Action (`rg DeleteAccountAction` nei test: solo Fixcity e User). L'effetto a valle,
un account con `deleted_at` non entra più, è provato da `Modules/User/tests/Feature/Auth/DeletedAccountAccessTest.php`.

## Effetti collaterali

Nell'ordine, dentro la transazione sulla connessione `user`:

1. `RevokeGdprConsentsAction` (vedi il suo contratto).
2. `Treatment::firstOrCreate(['name' => 'account_deletion'])` e `Consent::updateOrCreate` su `user_id` + `user_type` +
   `treatment_id`: una sola riga per utente, l'unica eccezione alla regola «solo INSERT» dei consensi (ADR).
3. `deleted_at = now()` e `deleted_by` (utente autenticato, altrimenti l'utente stesso) con `save()`.
4. `RevokeUserAccessAction` del modulo User: token Passport, refresh token, «ricordami».
5. Se la classe `Modules\Activity\Models\Activity` esiste: `UPDATE` di `deleted_at` sulle activity dove `subject_id` e
   `subject_type` sono dell'utente.

Dopo il commit: `Auth::logout()`, `session()->invalidate()`, `session()->regenerateToken()`.

## Errori

- `abort(401)` senza utente autenticato; `AuthorizationException` (403) se la policy nega (INV-1); `ValidationException` se
  `confirm` non è `cancella` (nessuna modifica).
- Eccezione nella transazione: rollback della connessione `user` e l'utente resta attivo (INV-2). Limite noto: `Consent` e
  `Treatment` stanno sulla connessione `gdpr` e `Activity` su `activity`; sono coperti dal rollback solo se puntano allo stesso
  database di `user`. Una transazione per connessione non è atomica tra database diversi: non imitare.

## Non fa

- Non cancella né anonimizza nome, email o altri dati personali: lo fa il progetto ospite dopo la chiamata.
- Non purga gli account cancellati dopo un periodo di conservazione (`gdpr.config.retention` non è letta da nessun codice).
- Non manda email di conferma.
- Non esclude l'utente dal login: lo fa il provider utenti del modulo User (`BuildActiveUserProviderAction`).
- Non gestisce accesso (art. 15) né portabilità (art. 20): nessun export esiste nel modulo.
