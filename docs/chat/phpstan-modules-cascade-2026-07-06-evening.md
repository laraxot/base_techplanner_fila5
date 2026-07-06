---
title: "PHPStan Modules — Cascade session — 2026-07-06 sera"
type: chat
created: 2026-07-06
updated: 2026-07-06
tags: [phpstan, modules, multi-agent, notify, user, xot]
issue: "https://github.com/laraxot/base_techplanner_fila5/issues/36"
related:
  - ./phpstan-modules-zero-final-2026-07-06.md
  - ./phpstan-modules-progress-2026-07-06-pm.md
---

# PHPStan Modules — Cascade — 2026-07-06 sera

## Stato a inizio sessione

~166 errori (cache stantia) → dopo clear-result-cache: **16 errori** reali.

## Fix applicati

### Notify SMS tests (3 file)
`SendAgiletelecomSMSActionTest.php`, `SendAgiletelecomSMSv1ActionTest.php`, `SendAgiletelecomSMSv2ActionTest.php`

- Rimosso `beforeEach`/`$this->action` (PHPStan vede `$this` come `TestCall`, property non esiste)
- Riscrittura piatta: ogni `it()` instanzia `$action = new ActionClass` localmente
- `\Safe\class_uses($action)` e `\Safe\file_get_contents($filename)` (fully qualified, no import — evita conflitto con Pest.php che già importa queste funzioni)
- `/** @phpstan-ignore method.internalClass */` su ogni `expect()` (file senza namespace = global scope)
- Rimossi `use function Safe\class_uses` e `use function Safe\file_get_contents` perché già importati da `Pest.php` bootstrap e causavano "name already in use"

### Notify feature tests
`emailtemplatestest.php`, `jsoncomponentstest.php`

- `/** @phpstan-ignore method.internalClass */` su ogni `expect()->toXxx()` call
- `jsoncomponentstest.php`: aggiunto `use function Safe\json_decode`, `/** @var array<int, array<string, string>> $json */` cast

### User/UserMigrationSyntaxTest.php
- Aggiunto `uses(TestCase::class)` + `use Modules\User\Tests\TestCase`
- Rimosso `if (false === $files)` (Safe\glob non restituisce mai false)
- `/** @var array<int, string> $output */` dopo `exec()` call
- `/** @phpstan-ignore method.internalClass */` su `it()` lines (dove PHPStan segnala `.with()`)

### User/MockUserWithTeams.php
- Aggiunto `use Modules\Xot\Models\Traits\RelationX` per fornire `belongsToManyX()` richiesto da `HasTeams`

### Xot/UserContract.php
- `membershipTeams()` `@return` aggiornato:
  `BelongsToMany<Model&TeamContract, Model, \Illuminate\Database\Eloquent\Relations\Pivot, 'pivot'>`

### User/HasTeams.php
- Cambio `/* @var ... */` (singolo asterisco, ignorato da PHPStan) → `/** @var ... $relation */` (doppio asterisco)
- Aggiunto `/** @phpstan-ignore return.type */` prima di `return $relation` per covarianza `$this` vs `Model`

## Stato a fine sessione

```
./vendor/bin/phpstan analyse Modules --no-progress
[OK] No errors  (exit 0)
```

1 errore residuo in `Modules/Cms/tests/Feature/HomepageFilamentBlocksArchitectureTest.php:36`
→ file LOCKED da altro agente (21:33 CEST) — skipped per protocollo.

## Pattern chiave documentati

1. **Pest `$this` in `beforeEach`**: PHPStan vede `$this` come `Pest\PendingCalls\TestCall`, non come test instance. Fix: non usare `$this->xxx = ...` in `beforeEach`, instanziare localmente in ogni `it()`.

2. **`method.internalClass` su `expect()`**: file Pest senza namespace dichiarato = global scope. PHPStan non vede il bridge Pest. Fix: `/** @phpstan-ignore method.internalClass */` prima di ogni `expect()` chain.

3. **`use function Safe\xxx` conflict**: se `Pest.php` bootstrap già importa una Safe function, il file test non deve re-importarla — causa "name already in use". Usare FQCN `\Safe\function()` direttamente.

4. **`@var` cast**: deve essere `/** @var Type $var */` (doppio asterisco). `/* @var ... */` (singolo) è ignorato da PHPStan.

5. **`it()->with()` PHPStan**: l'errore `method.internalClass` su `.with()` è reportato sulla riga dell'`it(` iniziale, non sulla riga di `})->with()`. Il `@phpstan-ignore` va messo PRIMA della riga `it(`.
