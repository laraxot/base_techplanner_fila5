---
title: "Contratto — SaveGdprConsentsAction"
type: contract
action: "Modules\\Gdpr\\Actions\\SaveGdprConsentsAction"
module: Gdpr
status: active
tags: [contract, action, gdpr, consenso, art-7]
created: 2026-11-18
updated: 2026-11-26
related:
  - ../adr/0002-consent-proof-is-append-only.md
---

# SaveGdprConsentsAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/SaveGdprConsentsAction.php`. Perché le righe non si sovrascrivono mai:
[ADR prova del consenso](../adr/0002-consent-proof-is-append-only.md).

Ripristinato il 2026-11-26: il file era stato cancellato dal commit `bb71164f` (riordino dei docs «ceiling 100») mentre il
docblock dell'Action, l'ADR e i test continuavano a citarlo.

## Input

- `execute(User $user, array $consents, ?string $ipAddress = null, ?string $userAgent = null)`.
- `$user`: `Modules\User\Models\User`; si leggono solo `id` e la classe (non serve un utente salvato).
- `$consents`: `privacy_accepted`, `terms_accepted`, `marketing_consent` (`bool`); una chiave assente vale «rifiutato».
- IP e user agent: se `null`, quelli della richiesta corrente (`request()->ip()`, `request()->userAgent()`).

Chiamanti: `Filament/Widgets/Auth/RegisterWidget.php` e `GdprConsentForm.php` (le scelte arrivano da `CollectGdprConsentsAction`) e
`UpdateGdprConsentsAction`, che delega qui.

## Output

- Nessuno (`void`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GDPR-SAVE-INV-1 | Per ognuno dei tre trattamenti (`privacy_policy`, `terms_conditions`, `marketing_consent`) si scrive una riga di `consents`, accettato o rifiutato. Se manca anche una sola riga la registrazione non lascia la prova completa. | `GDPR-SAVE-INV-1` |
| GDPR-SAVE-INV-2 | Ogni riga porta `metadata.document_version` mai vuota, `metadata.locale`, `ip_address` e `user_agent`: senza versione non si dimostra quale testo è stato accettato. | `GDPR-SAVE-INV-2` |
| GDPR-SAVE-INV-3 | `accepted_at` è valorizzato solo se la scelta è vera; un rifiuto resta una riga con `accepted_at` nullo, mai una riga assente o accettata. | `GDPR-SAVE-INV-3` |
| GDPR-SAVE-INV-4 | Un trattamento mancante si crea da `TREATMENT_DEFAULTS` e uno senza versione riceve `1.0`: la prova non si salta mai in silenzio (art. 7 par. 1). | `GDPR-SAVE-INV-4` |
| GDPR-SAVE-INV-5 | Solo INSERT: una seconda chiamata aggiunge righe e non aggiorna né cancella le precedenti. | `GDPR-SAVE-INV-5` |

Test: `tests/Unit/Actions/SaveGdprConsentsActionTest.php` (intercetta gli INSERT su `consents` con l'evento `creating` e li
blocca: prova le righe che l'Action scriverebbe, non lo schema reale della tabella).

## Effetti collaterali

Nell'ordine, per ognuno dei tre trattamenti:

1. `Treatment::firstOrCreate(['name' => …], TREATMENT_DEFAULTS[…])`.
2. Se il trattamento esistente non ha `documentVersion`: `forceFill(['documentVersion' => '1.0'])->save()`.
3. `Consent::create` con `user_id`, `user_type` (classe), `treatment_id`, `type`, `accepted_at`, `subject_id`, `created_by` e
   `updated_by` (= id dell'utente), `ip_address`, `user_agent`, `metadata` (`document_version`, `document_url`, `locale`).

Poi una riga `Log::debug('GDPR consents saved via action', …)` con `user_id`, `ip` e le scelte.

## Errori

- Le eccezioni del database arrivano al chiamante: la registrazione deve fallire, non riuscire senza prova (INV-1).
- Nessuna validazione: una scelta mancante diventa un rifiuto, non un errore (INV-3).
- Un trattamento fuori da `TREATMENT_DEFAULTS` darebbe `Log::warning` e verrebbe saltato; con la mappa fissa a tre voci il
  ramo oggi non è raggiungibile.

## Non fa

- Non valida le scelte obbligatorie: lo fanno il form di registrazione e `Validation\ValidateGdprConsentAction`.
- Non revoca né aggiorna consensi esistenti (`Consent\RevokeGdprConsentsAction`).
- Non scrive i sette trattamenti del listener `SaveGdprConsents`: quelli li scrive `Consent\SaveRegistrationConsentsAction`
  (vedi il suo contratto: salta in silenzio i trattamenti mancanti, da non imitare).
- Non apre una transazione propria: nel `RegisterWidget` gira dentro `DB::connection('user')->transaction()` (riga 151), ma la
  tabella `consents` è sulla connessione del modulo, quindi l'atomicità vale solo se le connessioni puntano allo stesso database.
- Non manda email e non decide dove vanno le persone dopo la registrazione.

Limite noto: il `Log::debug` finale scrive IP e scelte del cittadino nel log applicativo (dato personale, livello debug): non
imitarlo in codice nuovo e non lasciare il livello debug acceso in produzione. Le descrizioni dei tre trattamenti in
`TREATMENT_DEFAULTS` sono testo italiano nel codice (non passano dai file di lingua).
