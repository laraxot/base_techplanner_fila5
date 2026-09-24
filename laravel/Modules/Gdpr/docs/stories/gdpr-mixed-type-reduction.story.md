# Story: Reduce mixed type usage — Gdpr

**Fase BMAD**: Qualita del codice (type-safety). Nessun PrivacyPolicyWidget. Nessun tocco a User 10.4.

**Contesto**: convenzione di progetto ("cerchiamo di non usare mixed, quando lo troviamo cerchiamo di
sostituirlo con qualcosa di adeguato"). Scope di questo passaggio: `app/` (ultima spiaggia =
JSON / metadata / config) + `declare(strict_types=1)` su ogni `.php` / `.blade.php` del modulo
che ne era sprovvisto nelle prime 25 righe.

**Perche'**: il tipo dice il contratto. `mixed` nasconde la forma reale dei dati di registrazione
e rende PHPStan cieco. Dove il valore e' un payload JSON/config polimorfo, `mixed` resta
l'unica descrizione onesta.

**Modifiche applicate**:
- `app/Actions/Validation/ValidateUserDataAction.php`: `@return array<string, mixed>` sostituito
  con lo shape reale costruito nel `return` letterale
  (`first_name`/`last_name`/`email`/`password`/`type`/`lang`: string;
  `email_verified_at`: `Carbon`). Il passo precedente aveva revertito questo narrowing per
  6 errori PHPStan nei test che leggono `$validatedData['state']` (chiave **mai** presente
  nel ritorno). Qui lo shape torna: e' evidente, non e' JSON/metadata/config.
  I test che pretendevano `state` (chiave mai presente nel ritorno) sono allineati
  allo shape: rimossa l'asserzione su `state` e i `?? null` ridondanti su `password`.
- `app/Models/Traits/HasGdpr.php`: rimosso `@param array<string, mixed> $metadata` duplicato;
  il tipo resta `mixed` — metadata di audit JSON polimorfo, nessun chiamante nel modulo
  vincola la forma.
- `resources/views/components/already-registered.blade.php` e `consent-label.blade.php`:
  aggiunto `declare(strict_types=1)` (unici file del modulo che ne erano sprovvisti).

**Lasciato `mixed` (motivato, ultima spiaggia)**:
- `app/Datas/GdprData.php` (`@var array<string, mixed> $data`): arriva da
  `GetTenantConfigArrayAction::execute()` che legge un file di config PHP arbitrario.
- `app/Models/Profile.php` (`childrenWith` / `childrenWithCount`): IDE-helper che rispecchia
  la firma vendor Eloquent, non va ristretta.
- `app/Models/Traits/HasGdpr.php` (`giveConsent` metadata): JSON di audit estensibile.
- `tests/TestCase.php`, `tests/PestHelpers.php`: helper di test polimorfici, fuori da `app/`.

**Fuori scope (esplicito)**: nessun `PrivacyPolicyWidget` creato o modificato; User 10.4 non toccato.

**Verifica**: PHPStan senza `--level` (livello da `phpstan.neon`) e PHPMD sul modulo, dopo lock/unlock.
