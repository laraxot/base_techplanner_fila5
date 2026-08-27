---
title: "Quality and coverage contract: Job"
module: "Job"
type: concept
tags: [coverage, phpstan, pest, quality]
created: 2026-07-14
updated: 2026-08-24
qmd: "job phpstan pest coverage semantic tests no coverage farming"
related:
  - "./stories/4.26.phpstan-regression-remediation.story.md"
  - "./testing.md"
---

# Quality and coverage contract: Job

Coverage is evidence produced by behavioural tests, not a target that justifies executing
arbitrary methods. A Job test must assert a public, observable contract: command exit and
output, policy authorization, schedule schema shape, model behaviour, or provider/resource
discovery. Tests that swallow every exception or finish with `assertTrue(true)` do not count
as regression protection.

## PHPStan remediation, story 4.26

The cold module measurement on 2026-08-24 found **76 test findings and no remaining
production finding**. The previously reported `TestJobCommand` production finding had
already been corrected concurrently by importing the concrete `Log` facade.

| Disposition | Files | Reason |
|---|---:|---|
| Retained and corrected | 8 | command, policy, schedule/schema and shared discovery contracts have observable assertions |
| Deleted | 4 | reflection sweeps swallowed failures, called protected APIs, referenced imaginary classes, or asserted tautologies |

Deleted files:

- `JobCoverage100RemainingTest.php`
- `JobGapAttackCoverageTest.php`
- `JobGapCloserCoverageTest.php`
- `ModuleCoverageBoostTest.php`

The retained suite uses exact policy results, command exit codes, concrete table names,
typed validation callbacks, Safe output/filesystem functions, and explicit generic tuple or
collection shapes. Protected Filament APIs remain protected.

## Reproducible gates

```bash
cd laravel
php -d memory_limit=-1 ./vendor/bin/phpstan analyse Modules/Job --no-progress
./vendor/bin/pest \
  Modules/Job/tests/Unit/JobBusinessCoverageTest.php \
  Modules/Job/tests/Unit/JobDeepCoverageTest.php \
  Modules/Job/tests/Unit/JobExecuteCoverage50Test.php \
  Modules/Job/tests/Unit/JobFilamentSchemaCoverageTest.php \
  Modules/Job/tests/Unit/JobPolicyBehaviorTest.php \
  Modules/Job/tests/Unit/JobPolicyTest.php \
  Modules/Job/tests/Unit/JobScheduleFormCoverageTest.php \
  --no-coverage
```

Campagna 4.26: `analyse Modules/Job` → **[OK] No errors**. B = tautologie cancellate
(asserzioni `assertIsString` su `getTable()`/`getLabel()` sostituite da valori concreti,
o file interi di coverage-farming). G = callback di validazione e `id` stringa sul
contratto utente, senza allargare le firme.

The canonical certification remains `phpstan analyse Modules`, because analysing only a
module can omit cross-file and type-coverage diagnostics.
