# Agent Rules Index

This directory contains the rules and guidelines for AI agents working on this project.
Rules are organized into subdirectories for better maintainability.

## 🔴 Critical Rules (MANDATORY)

**These rules MUST be followed without exception:**

- [Rule 001: No Commit Without Testing](../QWEN.md#-critical-rules) - Quality gate enforcement
- **[Rule 002: One Field = One Migration](./laravel/one-migration-per-field.md)** ⭐ NEW - NO multiple fields in one migration
- **[Rule 003: Translation Keys Protocol](./docs/translation-keys-protocol.md)** ⭐ NEW - MUST follow namespace::context.collection.key.type
- [Rule 004: Container Blade Agnostic](./arch/003-container-blade-agnostic.md) - Theme-first architecture
- [Rule 005: Filament Table for Lists](./005-filament-table-for-lists.md) - NO custom blade for lists
- **[Rule 006: PHPMD PHAR Installation](./tools/phpmd-phar-installation.md)** ⭐ NEW - NO composer install for PHPMD
- **[Rule 011: Blocks View Convention](./011-blocks-view-convention.md)** ⭐ NEW - pub_theme::components.blocks.<type>.<blade>
- **[Rule 012: Agnostic Documentation](./012-agnostic-documentation.md)** ⭐ NEW - Docs in modules/themes must be project-agnostic
- **[Rule 013: Design Comuni HTML Match](./013-design-comuni-html-match.md)** ⭐ NEW - Body HTML must match design-comuni-pagine-statiche
- **[Rule 014: Visual Inspection Script Promotion](./014-visual-inspection-script-promotion.md)** ⭐ NEW - Promote reusable visual inspectors from `/tmp` to `bashscripts/inspectors/`
- **[Rule 015: Parity-Safe CSS Scoping](./015-parity-safe-css-scoping.md)** ⭐ NEW - Use only stable final-DOM hooks, never runtime wrappers
- **[Rule 016: Wizard Widgets Use XotBaseWizardWidget](./016-wizard-widgets-use-xotbasewizardwidget.md)** ⭐ NEW - Wizard schema => specialized Xot base class
- **[Rule 017: GitHub Issue/Discussion in Every BMAD Story](./016-github-issue-discussion-in-every-story.md)** ⭐ NEW - Ogni story DEVE avere ≥1 issue + ≥1 discussion link
- **[Rule 019: Filament-First](./filament-first-rule.md)** ⭐ NEW - Always prefer Filament components over custom HTML/CSS/Blade solutions
- **[Rule 020: Translation Namespace Rule](./translation-namespace-rule.md)** ⭐ NEW - `ticket/` views use `fixcity::ticket`, `segnalazioni/` use `fixcity::segnalazione`
- **[Rule 021: No CSS `!important` Override](./no-css-important-override-rule.md)** ⭐ NEW - Use Design Comuni classes, never `!important`
- **[Rule 022: Form Schema Validation Only](./form-schema-validation-rule.md)** ⭐ NEW - Validation ONLY in Schema, never in Widget

---

## 📂 Directories

### [Architecture](./arch/)
Core architectural principles, modular monolith rules, XotBase inheritance, and namespace conventions.
- [Multi-Outcome Architecture](./arch/001-multi-outcome-architecture.md)
- [Laraxot Rules](./arch/laraxot-rules.md)
- [Namespace Conventions](./arch/namespace-conventions.md)

### [Code Quality](./code/)
General coding standards, DRY/KISS/SOLID principles, naming conventions, and language-specific rules.
- [Coding Standards](./code/coding-standards.md)
- [Naming Conventions](./code/naming_conventions.md)
- [DRY Principle](./code/dry.md)

### [Documentation](./docs/)
Documentation standards, naming rules for .md files, and translation/localization guidelines.
- [Documentation Standards](./docs/documentation-standards.md)
- [Translation Rules](./docs/translation-rules.md)

### [Laravel Framework](./laravel/)
Laravel-specific rules for Models, Actions, Migrations, Providers, Folio, and Volt.
- [Action Execution Pattern](./laravel/action-execution-pattern.md)
- [Migration Rules](./laravel/migration-rules.md)
- [Model Property Rules](./laravel/model-property-rules.md)

### [Filament Admin](./filament/)
Rules for Filament resources, widgets, tables, and custom actions.
- [Filament Rules](./filament/filament-rules.md)
- [Widget Styling](./filament/filament-widget-sexy-styling.md)

### [Frontend & Themes](./frontend/)
UI/UX guidelines, Tailwind CSS patterns, Blade components, and theme structure.
- [Blade Component Rules](./frontend/blade-component-rules.md)
- [Theme Structure](./frontend/theme-structure.md)
- **[Tailwind `@apply` alias — tema Sixteen](./tailwind-apply-sixteen-alias-rule.md)** — on-demand (parity PA / Design Comuni)
- [Theme CSS build workflow](./theme-css-build-workflow.md) — `npm run build && npm run copy` Sixteen

### [Git & Workflow](./git/)
Git workflow, commit messages, PR templates, and issue management.
- [Git Workflow](./git/git-workflow.md)
- [Conventional Commits](./git/conventional-commits.md)

### [Operational Workflows](./workflow/)
GSD (Get Shit Done), BMAD, Super Mucca methodology, and testing protocols.
- [GSD Methodology](./workflow/gsd.md)
- [Super Mucca Methodology](./workflow/super-mucca-methodology.md)
- [Pest Testing Patterns](./workflow/pest-testing-patterns.md)

### [Vendor & Templates](./vendor/)
Generic technology templates and rules for 3rd party libraries.

---
*Note: Always study the relevant rules before starting a task.*
