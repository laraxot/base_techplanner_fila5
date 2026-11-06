<<<<<<< .merge_file_ZUrBfm
---
title: "queueable action"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "queueable action"
issues: []
discussions: []
status: draft
---

=======
<<<<<<< HEAD
>>>>>>> .merge_file_wcpqt3
# Standard <nome progetto>: spatie/laravel-queueable-action

In tutto il progetto <nome progetto>, **NON si utilizzano Service class custom**. La business logic asincrona e le azioni riutilizzabili sono gestite SEMPRE tramite [spatie/laravel-queueable-action](https://github.com/spatie/laravel-queueable-action).
=======
# Standard SaluteOra: spatie/laravel-queueable-action

In tutto il progetto SaluteOra, **NON si utilizzano Service class custom**. La business logic asincrona e le azioni riutilizzabili sono gestite SEMPRE tramite [spatie/laravel-queueable-action](https://github.com/spatie/laravel-queueable-action).
>>>>>>> 6ed19256f (.)

## Vantaggi rispetto ai Service

- Azioni invocabili sia sincrone che asincrone
- Testabilità e riuso
- Dispatch asincrono semplice
- Chiarezza architetturale

## Pattern di utilizzo

```php
use Spatie\QueueableAction\QueueableAction;

class SendWelcomeEmailAction
{
    use QueueableAction;
    public function execute(User $user): void
    {
        // logica
    }
}
// Sincrono
(new SendWelcomeEmailAction())->execute($user);
// Asincrono
(new SendWelcomeEmailAction())->dispatch($user);
```

## Collegamenti

- [Documentazione ufficiale](https://github.com/spatie/laravel-queueable-action)
<<<<<<< .merge_file_ZUrBfm
- [README Notify](../../Notify/docs/README.md)
=======
- [README Notify](../laravel/Modules/Notify/docs/README.md)
<<<<<<< HEAD
- [README Notify](../laravel/modules/notify/docs/readme.md)
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_wcpqt3
