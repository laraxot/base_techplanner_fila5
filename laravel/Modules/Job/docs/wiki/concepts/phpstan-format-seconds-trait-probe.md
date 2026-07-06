---
title: PHPStan trait probe FormatSeconds (rimosso)
type: concept
module: Job
tags: [phpstan, trait, probe, filament, format-seconds, deprecated]
created: 2026-07-01
updated: 2026-07-06
related:
  - ../../../Xot/docs/wiki/concepts/phpstan-trait-probes.md
  - ../../../../docs/wiki/concepts/nwidart-module-skeleton-contract.md
---

# PHPStan trait probe — FormatSeconds (rimosso 2026-07-06)

## Problema

`FormatSeconds` è usato da widget Filament (`JobStatsOverview`,
`JobsWaitingOverview`) registrati via discovery. PHPStan può segnalare
`trait.unused` sul file trait isolato se non è referenziato staticamente.

## Stato reale

Il file `Modules/Job/app/Phpstan/FormatSecondsPhpstanProbe.php` citato dalla
versione precedente di questa nota **non esisteva sul disco**. Il test
`Modules/Job/tests/Unit/Traits/FormatSecondsTest.php` lo importava comunque,
quindi era rotto (classe inesistente). Corretto il 2026-07-06 facendo testare
il trait direttamente tramite classe anonima, senza probe:

```php
$formatter = new class {
    use FormatSeconds;
};

Assert::assertSame('1 m 30 s', $formatter->formatSeconds(90));
```

Vedi [phpstan-trait-probes](../../../Xot/docs/wiki/concepts/phpstan-trait-probes.md)
per lo stato generale del pattern probe (abbandonato in tutto il progetto).

## Chiamanti runtime

- `JobResource/Widgets/JobStatsOverview`
- `JobManagerResource/Widgets/JobStatsOverview`
- `JobsWaitingResource/Widgets/JobsWaitingOverview`
