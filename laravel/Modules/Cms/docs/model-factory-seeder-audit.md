---
title: "model factory seeder audit"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "model factory seeder audit"
issues: []
discussions: []
status: draft
---

# Model/Factory/Seeder Audit

<<<<<<< .merge_file_cDZYtd
=======
Generated: 2025-08-22 16:28
<<<<<<< HEAD
>>>>>>> .merge_file_N6vKc7
Generated: [DATE] 16:28
=======
>>>>>>> 6ed19256f (.)

## Coverage
| Model | Factory | Seeded |
|---|---|---|
| Module | yes | no |
| Section | yes | no |
| HasBlocks | no | no |
| PageContent | yes | no |
| Menu | yes | no |
| Page | yes | no |
| Conf | yes | no |

Seeder: `database/seeders/CmsDatabaseSeeder.php`

## Missing / Actions
- Add exemplar seeding in `CmsDatabaseSeeder` for: Page, Menu, Section, PageContent, Conf, Module.
- `HasBlocks`: infrastructure/behavioral; no factory/seeding required.

## Likely non-business-critical
<<<<<<< .merge_file_cDZYtd
- `HasBlocks` (behavioral helper). Documented as infra; exclude from factory/seeding.
=======
<<<<<<< HEAD
- `HasBlocks` (behavioral helper). Documented as infra; exclude from factory/seeding.
=======
- `HasBlocks` (behavioral helper). Documented as infra; exclude from factory/seeding.
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_N6vKc7
