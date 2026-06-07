---
title: "Migrazioni — updateTimestamps solo in tableUpdate"
type: rule
tags: [migrations, xot, timestamps, dry]
created: 2026-06-05
updated: 2026-06-05
qmd: "rule migration updateTimestamps tableUpdate no timestamps softDeletes created_by duplicate"
story: STORY-140
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/248"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/249"
related:
  - ../bmad/architecture-migration-update-timestamps-only.md
  - ../../laravel/Modules/Xot/app/Database/Migrations/XotBaseMigration.php
---

# updateTimestamps — no duplicati

## Regola

`$this->updateTimestamps(table: $table, hasSoftDeletes: true)` **solo** in `tableUpdate`.

**Vietato** nello stesso file:

```php
$table->timestamps();
$table->softDeletes();
$table->string('created_by')->nullable();
$table->string('updated_by')->nullable();
$table->string('deleted_by')->nullable();
```

Il helper usa `foreignIdFor(User)` — non `string`.

## Audit

`bashscripts/tools/audit-migration-timestamp-redundancy.sh laravel/Modules/<Module>/database/migrations`

## Collegamenti

- [architecture-migration-update-timestamps-only.md](../bmad/architecture-migration-update-timestamps-only.md)
- [migration-patterns.md](../agents/migration-patterns.md)
