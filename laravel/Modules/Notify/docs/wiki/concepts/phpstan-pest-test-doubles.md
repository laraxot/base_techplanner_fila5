---
title: "Notify — test doubles e helper PHPStan"
type: concept
tags: [notify, phpstan, pest, testing, doubles]
created: 2026-06-13
updated: 2026-06-13
qmd: "Notify NotificationManager test doubles trait PHPStan Pest mockService"
issues:
<<<<<<< .merge_file_JPzcSd
<<<<<<< .merge_file_GG4yBl
=======
<<<<<<< .merge_file_XMNptP
>>>>>>> .merge_file_65JOKF
  - "https://github.com/laraxot/module_fixcity_fila5/issues/52"
discussions:
  - "https://github.com/laraxot/module_fixcity_fila5/discussions/53"
=======
<<<<<<< .merge_file_JPzcSd
=======
<<<<<<< .merge_file_GG4yBl
  - "https://github.com/laraxot/module_fixcity_fila5/issues/52"
discussions:
  - "https://github.com/laraxot/module_fixcity_fila5/discussions/53"
=======
>>>>>>> .merge_file_PHzvBA
>>>>>>> .merge_file_65JOKF
  - "https://github.com/laraxot/module_app_fila5/issues/52"
discussions:
  - "https://github.com/laraxot/module_app_fila5/discussions/53"
>>>>>>> .merge_file_JMBk8Q
related:
  - ./testing.md
  - ../../phpstan-compliance-status.md
  - ../../../Xot/docs/wiki/concepts/phpstan-pest-bridge-discipline.md
---

# Notify — test doubles e helper PHPStan

## Contesto

Sessione 2026-06-13: ~28 errori PHPStan in `Modules/Notify/tests/` (manager nullable, classi dummy mancanti, mock Mockery vs PHPUnit).

## Migliorie applicate

### 1. `notificationManager()` su TestCase

```php
public function notificationManager(): NotificationManager
{
    Assert::assertNotNull($this->notificationManager);
    return $this->notificationManager;
}
```

Rimuove `assert()` ridondanti e narrowing manuale nelle closure.

### 2. Test doubles per trait coverage

File owner: `tests/Unit/Traits/NotifyTraitTestDoubles.php`

| Classe | Trait coperto |
|--------|---------------|
| `NotifyRateLimitDummy` | `HasNotificationRateLimiting` |
<<<<<<< .merge_file_GG4yBl
=======

`getNotificationRateLimitKey(string $type, int|string $identifier)` — ID utente, non `mixed`. Vedi [mixed-type-ultima-spiaggia.md](../../mixed-type-ultima-spiaggia.md).
>>>>>>> .merge_file_JMBk8Q
| `NotifyTrackingDummy` | `HasNotificationTracking` |
| `NotifyTenantDummyModel` | `HasTenantNotifications` |

Espongono metodi `public` che delegano ai `protected` del trait — pattern KISS per test unitari senza istanziare modelli Eloquent completi.

### 3. Mock `SendNotificationAction`

Preferire `createStub` / `createUnitMock` + `expectsOnce()` da `XotBaseTestCase`, non `Mockery::shouldReceive()->once()` (PHPStan L10 su union Mockery).

## Cosa resta per Notify

| Task | Priorità |
|------|----------|
| Copertura Pest su `Actions/SendNotificationAction` | P1 |
| Allineare test channel (mail, SMS, push) a pattern stub | P2 |
| Migrare test che istanziano `Services/NotificationManager` verso Actions quando il manager sarà thin | P2 |
<<<<<<< .merge_file_JPzcSd
<<<<<<< .merge_file_GG4yBl
| Namespace `tests/` vs `Tests` — [#370](https://github.com/laraxot/base_fixcity_fila5/issues/370) | P2 |
=======
=======
<<<<<<< .merge_file_XMNptP
| Namespace `tests/` vs `Tests` — [#370](https://github.com/laraxot/base_fixcity_fila5/issues/370) | P2 |
=======
<<<<<<< .merge_file_GG4yBl
| Namespace `tests/` vs `Tests` — [#370](https://github.com/laraxot/base_fixcity_fila5/issues/370) | P2 |
=======
>>>>>>> .merge_file_PHzvBA
>>>>>>> .merge_file_65JOKF
| Namespace `tests/` vs `Tests` — [#370](https://github.com/laraxot/platform/issues/370) | P2 |
>>>>>>> .merge_file_JMBk8Q

## Verifica

```bash
cd laravel
./vendor/bin/phpstan analyse Modules/Notify/tests
./vendor/bin/pest Modules/Notify/tests
```
