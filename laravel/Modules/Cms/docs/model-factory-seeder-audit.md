# Model/Factory/Seeder Audit

<<<<<<< HEAD
<<<<<<< HEAD
Generated: [DATE] 16:28
=======
Generated: 2025-08-22 16:28
>>>>>>> 4b6b99016 (first commit)
=======
Generated: [DATE] 16:28
>>>>>>> dev

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
- `HasBlocks` (behavioral helper). Documented as infra; exclude from factory/seeding.
