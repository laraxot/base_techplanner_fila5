---
title: "Gdpr — architettura"
type: architecture
tags: [documentation]
module: Gdpr
created: 2026-09-26
updated: 2026-09-26
qmd: "architecture"
issues: []
discussions: []
---

# Gdpr Architecture

Core components and design decisions (migrato da `architecture.md` in root, 2026-09-24).

## Structure

- `app/Models/` — Eloquent models (`Consent`, `Event`, `Profile`, `Treatment`)
- `app/Actions/` — Business logic (QueueableAction), e.g. `SaveGdprConsentsAction`, `UpdateGdprConsentsAction`
- `app/Filament/Resources/` — Admin resources (`ConsentResource`, `EventResource`, `ProfileResource`, `TreatmentResource`)
- `app/Filament/Pages/` — Admin pages
- `config/` — Configuration (`config.php`, `consent.php`)
- `database/migrations/` — Database schema
- `lang/` — Translations

<<<<<<< .merge_file_4BIcgg
<<<<<<< .merge_file_1MKzxW
See the module [README](../readme.md) for overview, [contributing](./contributing.md) for the
=======
See the module [README](../README.md) for overview, [contributing](./CONTRIBUTING.md) for the
>>>>>>> .merge_file_DrUBFd
=======
See the module [README](../README.md) for overview, [contributing](./CONTRIBUTING.md) for the
>>>>>>> .merge_file_l0j11l
development workflow, and [architecture/structure](./architecture/structure.md) for details.
