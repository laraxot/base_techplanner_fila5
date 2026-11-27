---
title: "Contratto — SaveRegistrationConsentsAction"
type: contract
action: "Modules\\Gdpr\\Actions\\Consent\\SaveRegistrationConsentsAction"
module: Gdpr
status: active
tags: [contract, action, gdpr, consenso, listener, legacy]
created: 2026-11-26
updated: 2026-11-26
related:
  - ../adr/0002-consent-proof-is-append-only.md
  - save-gdpr-consents-action.md
---

# SaveRegistrationConsentsAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Consent/SaveRegistrationConsentsAction.php`. Chiamante: il listener `Listeners/SaveGdprConsents` (evento
`Modules\User\Events\UserRegistered`).

**Comportamento legacy**: documentato com'è, non è il modello per codice nuovo. Il percorso che fa fede per la prova del consenso
alla registrazione è `SaveGdprConsentsAction` ([contratto](save-gdpr-consents-action.md)), che non salta nulla in silenzio.

Stato d'uso: nessun codice di produzione lancia `UserRegistered` (`rg "new UserRegistered|UserRegistered::dispatch"` fuori dai
test: nessun risultato); `RegisterWidget` salva i consensi chiamando direttamente `SaveGdprConsentsAction`. Questa Action oggi
parte solo se un progetto ospite emette l'evento.

## Input

- `execute(User $user, array $formData, ?string $ipAddress = null, ?string $userAgent = null)`.
- `$formData`: dati grezzi del form; si leggono i campi `privacy_policy_accepted`, `terms_accepted`, `data_processing_accepted`,
  `marketing_consent`, `profiling_consent`, `analytics_consent`, `third_party_consent`.
- IP e user agent: nessun default alla richiesta corrente (se `null` restano `null` nella riga).

## Output

- Nessuno (`void`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GDPR-REGCONS-INV-1 | Solo INSERT (`Consent::create`): una chiamata aggiunge righe, non aggiorna né cancella quelle esistenti. | — (non dimostrato) |
| GDPR-REGCONS-INV-2 | Una riga per ogni campo **presente** nel form (`isset`), accettato o rifiutato (`accepted_at` nullo per il rifiuto); un campo assente non produce nessuna riga. | — (non dimostrato) |
| GDPR-REGCONS-INV-3 | Le righe portano `ip_address` e `user_agent` ricevuti e `created_by`/`updated_by` = `'system'`. | — (non dimostrato) |

Test: `tests/Unit/Listeners/SaveGdprConsentsTest.php` prova solo che il listener delega all'Action con gli stessi argomenti
(Action finta): il comportamento dell'Action non ha test.

## Effetti collaterali

1. Una `SELECT` su `treatments` per i sette nomi noti.
2. `Consent::create` per ogni campo presente il cui trattamento esiste.
3. `Log::debug('GDPR consents saved for user registration', …)` con `user_id`, `ip` e l'elenco dei campi mappati.

## Errori

- Le eccezioni del database arrivano al chiamante (il listener).
- Nessuna validazione: un valore non booleano è convertito con `(bool)`.

## Non fa

- Non crea i trattamenti mancanti.
- Non scrive `metadata` (né `document_version` né `locale`): la riga non dice quale testo è stato accettato.
- Non revoca né aggiorna consensi esistenti.
- Non valida che i consensi obbligatori siano accettati.

Limiti noti:

- Un trattamento assente da `treatments` viene saltato **in silenzio**, senza log né errore: la registrazione risulta riuscita
  senza prova per quel consenso. È l'errore che DCP-135 ha corretto in `SaveGdprConsentsAction`, qui rimasto (ADR
  [prova del consenso](../adr/0002-consent-proof-is-append-only.md), sezione Conseguenze).
- `created_by`/`updated_by` valgono la stringa `'system'`: un commento di `SaveGdprConsentsAction` dice che quelle colonne sono
  uuid e che una stringa veniva rifiutata da MariaDB/MySQL. Nessun test esercita questo percorso su un database reale, quindi
  non si sa se oggi fallisce.
- Il `Log::debug` scrive `user_id` e IP nel log applicativo (dato personale).
