# Indice documentazione — Modulo User

Indice organizzato per argomento di tutti i file `.md` rilevanti sotto `Modules/User/docs/`.
Nessun file è stato rinominato, spostato o cancellato: questo documento è solo una mappa di navigazione.
I duplicati e i contenuti superati sono raggruppati in fondo, sotto "Storico / da consolidare", senza collegamento singolo quando si tratta di intere cartelle di archivio.

Convenzioni: nessuna emoji, nessuna data nei nomi di file nuovi, `README.md`/`CHANGELOG.md` restano maiuscoli (vedi `bashscripts/ai/.claude/skills/module-docs/SKILL.md`).

## Indice delle sezioni

- [Overview e meta-documentazione](#overview-e-meta-documentazione) (48 file)
- [Architettura e design](#architettura-e-design) (61 file)
- [Actions (Spatie Queueable Actions)](#actions-spatie-queueable-actions) (6 file)
- [Autenticazione, login, logout, 2FA](#autenticazione-login-logout-2fa) (70 file)
- [Utenti, profili, team, moderazione](#utenti-profili-team-moderazione) (51 file)
- [Permessi e ruoli (Spatie Permission)](#permessi-e-ruoli-spatie-permission) (13 file)
- [OAuth, SSO, Socialite, Passport](#oauth-sso-socialite-passport) (58 file)
- [GDPR e privacy](#gdpr-e-privacy) (7 file)
- [Filament (resource, widget, navigazione)](#filament-resource-widget-navigazione) (81 file)
- [Volt, Livewire, Blade, Folio](#volt-livewire-blade-folio) (23 file)
- [Database, migrazioni, modelli](#database-migrazioni-modelli) (73 file)
- [Testing e qualita del codice (Pest, coverage)](#testing-e-qualita-del-codice-pest-coverage) (21 file)
- [Qualita, performance e code review (PHPStan, PHPMD, PHPInsights)](#qualita-performance-e-code-review-phpstan-phpmd-phpinsights) (159 file)
- [Traduzioni e i18n](#traduzioni-e-i18n) (22 file)
- [Charts, grafici e widget di reportistica](#charts-grafici-e-widget-di-reportistica) (13 file)
- [Roadmap, prodotto e pianificazione](#roadmap-prodotto-e-pianificazione) (115 file)
- [Best practices e linee guida](#best-practices-e-linee-guida) (34 file)
- [Bug fix e troubleshooting](#bug-fix-e-troubleshooting) (23 file)
- [Console commands](#console-commands) (16 file)
- [Traits e contratti](#traits-e-contratti) (10 file)
- [Integrazioni esterne](#integrazioni-esterne) (37 file)
- [Tooling MCP, ambiente dev, git/LFS](#tooling-mcp-ambiente-dev-gitlfs) (27 file)
- [Guide utente e screenshot](#guide-utente-e-screenshot) (7 file)
- [BMAD: stories e governance](#bmad-stories-e-governance) (15 file)
- [Wiki interno (knowledge base)](#wiki-interno-knowledge-base) (180 file)
- [Storico / da consolidare](#storico--da-consolidare)

## Overview e meta-documentazione

- [00-index.md](00-index.md)
- [INDEX.md](INDEX.md)
- [analysis.md](analysis.md)
- [binary-assets.md](binary-assets.md)
- [changelog.md](changelog.md)
- [codebase-overview.md](codebase-overview.md)
- [composer-dependencies.md](composer-dependencies.md)
- [confidence-guidelines.md](confidence-guidelines.md)
- [dependencies.md](dependencies.md)
- [dependency-intelligence.md](dependency-intelligence.md)
- [dependency-rules.md](dependency-rules.md)
- [dependency.md](dependency.md)
- [directory-structure-checklist.md](directory-structure-checklist.md)
- [directory-structure-rules.md](directory-structure-rules.md)
- [docs-archive-policy.md](docs-archive-policy.md)
- [docs-health.md](docs-health.md)
- [docs-location-policy.md](docs-location-policy.md)
- [documentation-standards.md](documentation-standards.md)
- [external-resources.md](external-resources.md)
- [file-naming-rules.md](file-naming-rules.md)
- [file-naming.md](file-naming.md)
- [filosofia-modulo-user.md](filosofia-modulo-user.md)
- [final-summary.md](final-summary.md)
- [final.md](final.md)
- [index-conflict.md](index-conflict.md)
- [module-structure.md](module-structure.md)
- [module-user.md](module-user.md)
- [module.md](module.md)
- [no-ai-tool-scaffold-dirs.md](no-ai-tool-scaffold-dirs.md)
- [overview-extended.md](overview-extended.md)
- [packages.md](packages.md)
- [philosophy-complete.md](philosophy-complete.md)
- [philosophy.md](philosophy.md)
- [project-structure.md](project-structure.md)
- [purpose.md](purpose.md)
- [quick-start.md](quick-start.md)
- [readme-en.md](readme-en.md)
- [readme-fullcalendar-scheduler.md](readme-fullcalendar-scheduler.md)
- [readme-new.md](readme-new.md)
- [readme.md](readme.md)
- [release-marketing-standard.md](release-marketing-standard.md)
- [root-file-policy.md](root-file-policy.md)
- [root-files-hygiene.md](root-files-hygiene.md)
- [rules-index.md](rules-index.md)
- [scopo.md](scopo.md)
- [second-brain.md](second-brain.md)
- [structure.md](structure.md)
- [troubleshooting.md](troubleshooting.md)

## Architettura e design

- [accessor-delegation-pattern.md](accessor-delegation-pattern.md)
- [advanced-user-architecture.md](advanced-user-architecture.md)
- [agent-confidence-discipline.md](agent-confidence-discipline.md)
- [agent-confidence-protocol.md](agent-confidence-protocol.md)
- [agent-edit-discipline.md](agent-edit-discipline.md)
- [ai-methodologies.md](ai-methodologies.md)
- [architecture-rules.md](architecture-rules.md)
- [architecture.md](architecture.md)
- [case-conflicts.md](case-conflicts.md)
- [case-sensitivity-rules.md](case-sensitivity-rules.md)
- [case-sensitivity.md](case-sensitivity.md)
- [case-variant-collisions.md](case-variant-collisions.md)
- [cases.md](cases.md)
- [component-verification-rules.md](component-verification-rules.md)
- [component-verification.md](component-verification.md)
- [datas-not-dtos-convention.md](datas-not-dtos-convention.md)
- [error-handling.md](error-handling.md)
- [external-packages-inheritance-pattern.md](external-packages-inheritance-pattern.md)
- [external-packages-inheritance.md](external-packages-inheritance.md)
- [filament-table-architecture.md](filament-table-architecture.md)
- [jetstream-vs-laraxot-philosophy.md](jetstream-vs-laraxot-philosophy.md)
- [jetstream-vs-laraxot.md](jetstream-vs-laraxot.md)
- [laraxot-migration-philosophy.md](laraxot-migration-philosophy.md)
- [laraxot-migration-policy.md](laraxot-migration-policy.md)
- [laraxot-migration.md](laraxot-migration.md)
- [namespace-conventions.md](namespace-conventions.md)
- [on-demand-pattern.md](on-demand-pattern.md)
- [parental-inheritance.md](parental-inheritance.md)
- [parental.md](parental.md)
- [path-conventions.md](path-conventions.md)
- [patterns.md](patterns.md)
- [repos.md](repos.md)
- [repositories.md](repositories.md)
- [routing-best-practices.md](routing-best-practices.md)
- [routing-error-solution.md](routing-error-solution.md)
- [routing-solution.md](routing-solution.md)
- [service-provider-architecture.md](service-provider-architecture.md)
- [service-provider-warning.md](service-provider-warning.md)
- [social-auth-architecture.md](social-auth-architecture.md)
- [third-party-model-patterns.md](third-party-model-patterns.md)
- [third-party-models.md](third-party-models.md)
- [timestamps-rule.md](timestamps-rule.md)
- [translation-architecture.md](translation-architecture.md)
- [type-safety-improvements.md](type-safety-improvements.md)
- [vendor-extension-pattern.md](vendor-extension-pattern.md)
- [vendor-extension.md](vendor-extension.md)
- [architecture/README.md](architecture/README.md)
- [architecture/architecture-rules.md](architecture/architecture-rules.md)
- [architecture/architecture.md](architecture/architecture.md)
- [architecture/auth-blade-structure.md](architecture/auth-blade-structure.md)
- [architecture/component-registration.md](architecture/component-registration.md)
- [architecture/structure.md](architecture/structure.md)
- [architecture/testing-structure.md](architecture/testing-structure.md)
- [architecture/user-gdpr-decoupling.md](architecture/user-gdpr-decoupling.md)
- [architecture/user-gdpr-oupling.md](architecture/user-gdpr-oupling.md)
- [concepts/models-contracts-placement.md](concepts/models-contracts-placement.md)
- [concepts/xotbase-never-extend-filament.md](concepts/xotbase-never-extend-filament.md)
- [core/architecture.md](core/architecture.md)
- [namespace/psr4-namespace-correction.md](namespace/psr4-namespace-correction.md)
- [philosophy/service-provider-aration-zen.md](philosophy/service-provider-aration-zen.md)
- [philosophy/service-provider-separation-zen.md](philosophy/service-provider-separation-zen.md)

## Actions (Spatie Queueable Actions)

- [actions-path-convention.md](actions-path-convention.md)
- [actions-refactoring-completion.md](actions-refactoring-completion.md)
- [actions-structure.md](actions-structure.md)
- [actions.md](actions.md)
- [get-new-password-action-business-logic.md](get-new-password-action-business-logic.md)
- [services-support-to-actions.md](services-support-to-actions.md)

## Autenticazione, login, logout, 2FA

- [2fa-guide.md](2fa-guide.md)
- [2fa.md](2fa.md)
- [auth-blade-structure.md](auth-blade-structure.md)
- [auth-components-best-practices.md](auth-components-best-practices.md)
- [auth-header-button.md](auth-header-button.md)
- [auth-login-implementation.md](auth-login-implementation.md)
- [auth-logout-blade.md](auth-logout-blade.md)
- [auth-logout-implementation.md](auth-logout-implementation.md)
- [auth-logout.md](auth-logout.md)
- [auth-pages-implementation.md](auth-pages-implementation.md)
- [auth-social-login-translations.md](auth-social-login-translations.md)
- [auth-widget-rules.md](auth-widget-rules.md)
- [auth-widget.md](auth-widget.md)
- [auth-widgets-view-namespaces.md](auth-widgets-view-namespaces.md)
- [authentication-troubleshooting.md](authentication-troubleshooting.md)
- [authentication.md](authentication.md)
- [avatar-implementation.md](avatar-implementation.md)
- [custom-login.md](custom-login.md)
- [header-auth-button.md](header-auth-button.md)
- [header-components.md](header-components.md)
- [header-language-avatar-implementation.md](header-language-avatar-implementation.md)
- [header-language-selector-with-flags.md](header-language-selector-with-flags.md)
- [intelligent-login-redirect.md](intelligent-login-redirect.md)
- [login-filament-widget-error.md](login-filament-widget-error.md)
- [login-filament-widget.md](login-filament-widget.md)
- [login-issue-resolution-report.md](login-issue-resolution-report.md)
- [login-resolution.md](login-resolution.md)
- [login-widget-analysis.md](login-widget-analysis.md)
- [login-widget-conversion.md](login-widget-conversion.md)
- [login-widget-filament-schema-errors-roadmap.md](login-widget-filament-schema-errors-roadmap.md)
- [login-widget-filament-schemas.md](login-widget-filament-schemas.md)
- [login-widget-fix.md](login-widget-fix.md)
- [login-widget-livewire-binding-fix.md](login-widget-livewire-binding-fix.md)
- [login-widget-livewire-binding.md](login-widget-livewire-binding.md)
- [login-widget-translation-audit-.md](login-widget-translation-audit-.md)
- [login-widget-translation-audit-archive.md](login-widget-translation-audit-archive.md)
- [login-widget-translation-audit-conflict.md](login-widget-translation-audit-conflict.md)
- [login-widget-translation-audit.md](login-widget-translation-audit.md)
- [login-widget-translation.md](login-widget-translation.md)
- [login-widget.md](login-widget.md)
- [loginwidget-error-analysis.md](loginwidget-error-analysis.md)
- [loginwidget.md](loginwidget.md)
- [logout-analysis.md](logout-analysis.md)
- [logout-blade-analysis.md](logout-blade-analysis.md)
- [logout-blade-conclusions.md](logout-blade-conclusions.md)
- [logout-blade-corrected-analysis.md](logout-blade-corrected-analysis.md)
- [logout-blade-corrected.md](logout-blade-corrected.md)
- [logout-blade-error-analysis.md](logout-blade-error-analysis.md)
- [logout-blade-implementation.md](logout-blade-implementation.md)
- [logout-blade-structure.md](logout-blade-structure.md)
- [logout-blade.md](logout-blade.md)
- [logout-error-analysis.md](logout-error-analysis.md)
- [logout-event-error.md](logout-event-error.md)
- [logout-event.md](logout-event.md)
- [logout-filament-widget-corrected.md](logout-filament-widget-corrected.md)
- [logout-filament-widget.md](logout-filament-widget.md)
- [logout-implementation-best-practices.md](logout-implementation-best-practices.md)
- [logout-implementation-error.md](logout-implementation-error.md)
- [logout-implementation-with-laravel-localization.md](logout-implementation-with-laravel-localization.md)
- [logout-implementation.md](logout-implementation.md)
- [logout-page-fix.md](logout-page-fix.md)
- [logout-page-implementation.md](logout-page-implementation.md)
- [logout-page.md](logout-page.md)
- [logout-security.md](logout-security.md)
- [logout.md](logout.md)
- [password-translation-completion-.md](password-translation-completion-.md)
- [password-translation-completion.md](password-translation-completion.md)
- [password.md](password.md)
- [session-management.md](session-management.md)
- [two-factor.md](two-factor.md)

## Utenti, profili, team, moderazione

- [activitylog-moderation-best-practices.md](activitylog-moderation-best-practices.md)
- [activitylog.md](activitylog.md)
- [baseuser-conflicts.md](baseuser-conflicts.md)
- [baseuser-dry-violation-analysis.md](baseuser-dry-violation-analysis.md)
- [baseuser-refactoring-completed.md](baseuser-refactoring-completed.md)
- [baseuser-spatie-duplicates-analysis.md](baseuser-spatie-duplicates-analysis.md)
- [baseuser.md](baseuser.md)
- [baseusers.md](baseusers.md)
- [dentist-moderation-approach.md](dentist-moderation-approach.md)
- [generic-user-moderation-strategy.md](generic-user-moderation-strategy.md)
- [hasteams-currentteam-method-choice.md](hasteams-currentteam-method-choice.md)
- [hasteams-trait-analysis.md](hasteams-trait-analysis.md)
- [hasteams-trait-duplicate-methods.md](hasteams-trait-duplicate-methods.md)
- [hasteams-trait-filosofia-e-correzione-completa.md](hasteams-trait-filosofia-e-correzione-completa.md)
- [hasteams-trait.md](hasteams-trait.md)
- [membership-autoincrement-fix.md](membership-autoincrement-fix.md)
- [membership-autoincrement.md](membership-autoincrement.md)
- [membership-uuid-fix.md](membership-uuid-fix.md)
- [membership-uuid.md](membership-uuid.md)
- [moderation-actions.md](moderation-actions.md)
- [moderation-contracts.md](moderation-contracts.md)
- [moderation-doctor.md](moderation-doctor.md)
- [moderation-notifications.md](moderation-notifications.md)
- [moderation-wizard-generic.md](moderation-wizard-generic.md)
- [multi-org-sync-laraxot-provtv.md](multi-org-sync-laraxot-provtv.md)
- [profile-management.md](profile-management.md)
- [profile.md](profile.md)
- [profiles-id-uuid-policy.md](profiles-id-uuid-policy.md)
- [relazioni-utenti-team.md](relazioni-utenti-team.md)
- [team-bindings-fix.md](team-bindings-fix.md)
- [team-bindings.md](team-bindings.md)
- [team-contract-usage-reasoning.md](team-contract-usage-reasoning.md)
- [team-user-composite-primary-key-fix.md](team-user-composite-primary-key-fix.md)
- [team-user-permissions-fix.md](team-user-permissions-fix.md)
- [team-user-permissions.md](team-user-permissions.md)
- [teams.md](teams.md)
- [user-factory-advanced-integration.md](user-factory-advanced-integration.md)
- [user-factory-complete-ecosystem-integration.md](user-factory-complete-ecosystem-integration.md)
- [user-factory-ecosystem-integration.md](user-factory-ecosystem-integration.md)
- [user-factory-integration.md](user-factory-integration.md)
- [user-invitation.md](user-invitation.md)
- [user-management.md](user-management.md)
- [user-moderation-strategy.md](user-moderation-strategy.md)
- [user-profile-models.md](user-profile-models.md)
- [user-profile-separation.md](user-profile-separation.md)
- [user-profile.md](user-profile.md)
- [user-research.md](user-research.md)
- [user-states.md](user-states.md)
- [user-vs-profile.md](user-vs-profile.md)
- [uuid-trait-conflict-resolution.md](uuid-trait-conflict-resolution.md)
- [uuid-trait-resolution.md](uuid-trait-resolution.md)

## Permessi e ruoli (Spatie Permission)

- [permissions.md](permissions.md)
- [policies.md](policies.md)
- [policy-phpstan-errors.md](policy-phpstan-errors.md)
- [policy-phpstans.md](policy-phpstans.md)
- [roles-migration-philosophy-fix.md](roles-migration-philosophy-fix.md)
- [roles-migration.md](roles-migration.md)
- [roles-permissions.md](roles-permissions.md)
- [spatie-models-verification.md](spatie-models-verification.md)
- [spatie-permission-philosophy.md](spatie-permission-philosophy.md)
- [spatie-permission-teams-laravel.md](spatie-permission-teams-laravel.md)
- [spatie-permission.md](spatie-permission.md)
- [spatie-permissions-methods.md](spatie-permissions-methods.md)
- [spatie-permissions.md](spatie-permissions.md)

## OAuth, SSO, Socialite, Passport

- [SSO-PROVIDERS-IMPLEMENTATION.md](SSO-PROVIDERS-IMPLEMENTATION.md)
- [microsoft-oauth-socialite.md](microsoft-oauth-socialite.md)
- [oauth-access-token-removal.md](oauth-access-token-removal.md)
- [oauth-client-authorizable.md](oauth-client-authorizable.md)
- [oauth-cluster-decision-making.md](oauth-cluster-decision-making.md)
- [oauth-cluster-error-analysis.md](oauth-cluster-error-analysis.md)
- [oauth-cluster-implementation-summary.md](oauth-cluster-implementation-summary.md)
- [oauth-cluster-implementation.md](oauth-cluster-implementation.md)
- [oauth-cluster.md](oauth-cluster.md)
- [oauth-passport-model-wrappers.md](oauth-passport-model-wrappers.md)
- [oauth-token-relations-ide-helper.md](oauth-token-relations-ide-helper.md)
- [passport-admin-actions.md](passport-admin-actions.md)
- [passport-cluster-completion-status.md](passport-cluster-completion-status.md)
- [passport-cluster-completion.md](passport-cluster-completion.md)
- [passport-cluster-current-status.md](passport-cluster-current-status.md)
- [passport-cluster-current.md](passport-cluster-current.md)
- [passport-cluster-implementation-completed.md](passport-cluster-implementation-completed.md)
- [passport-cluster-implementation-needed.md](passport-cluster-implementation-needed.md)
- [passport-cluster-implementation-status.md](passport-cluster-implementation-status.md)
- [passport-cluster-implementation.md](passport-cluster-implementation.md)
- [passport-cluster-implementationd.md](passport-cluster-implementationd.md)
- [passport-cluster-inner-debate.md](passport-cluster-inner-debate.md)
- [passport-cluster-litigation.md](passport-cluster-litigation.md)
- [passport-cluster-namespace-fix.md](passport-cluster-namespace-fix.md)
- [passport-cluster-namespace.md](passport-cluster-namespace.md)
- [passport-cluster-philosophy.md](passport-cluster-philosophy.md)
- [passport-cluster-proposal.md](passport-cluster-proposal.md)
- [passport-cluster-resources-only-rule.md](passport-cluster-resources-only-rule.md)
- [passport-cluster-resources-pattern.md](passport-cluster-resources-pattern.md)
- [passport-cluster-resources.md](passport-cluster-resources.md)
- [passport-cluster-summary.md](passport-cluster-summary.md)
- [passport-cluster-verification.md](passport-cluster-verification.md)
- [passport-cluster-work-completion.md](passport-cluster-work-completion.md)
- [passport-cluster.md](passport-cluster.md)
- [passport-complete-implementation.md](passport-complete-implementation.md)
- [passport-complete-management-debate.md](passport-complete-management-debate.md)
- [passport-filament-cluster-proposal.md](passport-filament-cluster-proposal.md)
- [passport-implementation-summary.md](passport-implementation-summary.md)
- [passport-implementation.md](passport-implementation.md)
- [passport-integration.md](passport-integration.md)
- [passport-model-wrappers.md](passport-model-wrappers.md)
- [passport-oauth-audit.md](passport-oauth-audit.md)
- [passport-oauth-wrapper-conformance.md](passport-oauth-wrapper-conformance.md)
- [passport-oauth-wrapper-convention.md](passport-oauth-wrapper-convention.md)
- [passport-vs-socialite-clarification.md](passport-vs-socialite-clarification.md)
- [passport.md](passport.md)
- [socialite-integration.md](socialite-integration.md)
- [socialite-microsoft-integration.md](socialite-microsoft-integration.md)
- [socialite-study.md](socialite-study.md)
- [socialite.md](socialite.md)
- [sso-guide.md](sso-guide.md)
- [sso.md](sso.md)
- [admin/socialite-configuration.md](admin/socialite-configuration.md)
- [clusters/passport-actions.md](clusters/passport-actions.md)
- [clusters/socialite.md](clusters/socialite.md)
- [oauth/README.md](oauth/README.md)
- [oauth/github.md](oauth/github.md)
- [oauth/oauth-architecture.md](oauth/oauth-architecture.md)

## GDPR e privacy

- [gdpr-compliance-complete.md](gdpr-compliance-complete.md)
- [gdpr-compliance.md](gdpr-compliance.md)
- [gdpr-register-enhancement.md](gdpr-register-enhancement.md)
- [gdpr.md](gdpr.md)
- [terms-and-conditions.md](terms-and-conditions.md)
- [terms-conditions.md](terms-conditions.md)
- [gdpr/compliance.md](gdpr/compliance.md)

## Filament (resource, widget, navigazione)

- [WIDGET-RENDERING-ANALYSIS.md](WIDGET-RENDERING-ANALYSIS.md)
- [critical-filament-rule-getinfolistschema-string-keys.md](critical-filament-rule-getinfolistschema-string-keys.md)
- [doctor-registration-widget.md](doctor-registration-widget.md)
- [doctor-registration.md](doctor-registration.md)
- [email-doctor-registration.md](email-doctor-registration.md)
- [filament-4-actions-namespace.md](filament-4-actions-namespace.md)
- [filament-4-widget-rendering-guide.md](filament-4-widget-rendering-guide.md)
- [filament-4-widget-rendering.md](filament-4-widget-rendering.md)
- [filament-4x-compatibility-conflict.md](filament-4x-compatibility-conflict.md)
- [filament-4x-compatibility.md](filament-4x-compatibility.md)
- [filament-5-panel-governance-rule.md](filament-5-panel-governance-rule.md)
- [filament-5x-compatibility.md](filament-5x-compatibility.md)
- [filament-auth-pages-exceptions.md](filament-auth-pages-exceptions.md)
- [filament-best-practices.md](filament-best-practices.md)
- [filament-charts-implementation.md](filament-charts-implementation.md)
- [filament-components-reference.md](filament-components-reference.md)
- [filament-errors.md](filament-errors.md)
- [filament-filters-and-widgets.md](filament-filters-and-widgets.md)
- [filament-namespace-rules.md](filament-namespace-rules.md)
- [filament-namespace.md](filament-namespace.md)
- [filament-nesting-opportunities.md](filament-nesting-opportunities.md)
- [filament-relation-managers.md](filament-relation-managers.md)
- [filament-resources-coverage-analysis.md](filament-resources-coverage-analysis.md)
- [filament-resources-coverage.md](filament-resources-coverage.md)
- [filament-resources-organization.md](filament-resources-organization.md)
- [filament-resources-philosophical-debate.md](filament-resources-philosophical-debate.md)
- [filament-resources-updated.md](filament-resources-updated.md)
- [filament-version.md](filament-version.md)
- [filament.md](filament.md)
- [filament4-migration.md](filament4-migration.md)
- [filaments.md](filaments.md)
- [form-column-parity.md](form-column-parity.md)
- [missing-filament-resources-analysis.md](missing-filament-resources-analysis.md)
- [missing-filament-resources.md](missing-filament-resources.md)
- [navigation-groups.md](navigation-groups.md)
- [navigation-structure.md](navigation-structure.md)
- [navigation-translations-completion-roadmap.md](navigation-translations-completion-roadmap.md)
- [navigation-translations-completion.md](navigation-translations-completion.md)
- [navigation-translations-fixes-january.md](navigation-translations-fixes-january.md)
- [navigation-translations-fixes.md](navigation-translations-fixes.md)
- [nested-resources.md](nested-resources.md)
- [r1-form-fields-self-validate.md](r1-form-fields-self-validate.md)
- [registration-widget-fileupload-fix.md](registration-widget-fileupload-fix.md)
- [registration-widget-fileupload.md](registration-widget-fileupload.md)
- [registration-widget-update.md](registration-widget-update.md)
- [registration-widget.md](registration-widget.md)
- [resource-implementation-philosophy.md](resource-implementation-philosophy.md)
- [resource-implementation.md](resource-implementation.md)
- [resource-translation-violation-critical-fix.md](resource-translation-violation-critical-fix.md)
- [resource-translation-violation-critical.md](resource-translation-violation-critical.md)
- [resources-array-keys-philosophy.md](resources-array-keys-philosophy.md)
- [resources-array-keys.md](resources-array-keys.md)
- [resources-corrections-summary-.md](resources-corrections-summary-.md)
- [resources-corrections-summary.md](resources-corrections-summary.md)
- [resources-corrections.md](resources-corrections.md)
- [viewclient-infolist-implementation-philosophy.md](viewclient-infolist-implementation-philosophy.md)
- [viewclient-infolist-implementation.md](viewclient-infolist-implementation.md)
- [widget-form-schema-hierarchy.md](widget-form-schema-hierarchy.md)
- [widget-rendering.md](widget-rendering.md)
- [widget-translation-rules.md](widget-translation-rules.md)
- [widget-translation.md](widget-translation.md)
- [widgets-structure.md](widgets-structure.md)
- [xotbase-resource-getpages-automatic.md](xotbase-resource-getpages-automatic.md)
- [xotbasemigration-best-practices.md](xotbasemigration-best-practices.md)
- [xotbasemigration-laraxot-philosophy.md](xotbasemigration-laraxot-philosophy.md)
- [xotbasemigration-laraxot.md](xotbasemigration-laraxot.md)
- [xotbaseresource-violations-removal.md](xotbaseresource-violations-removal.md)
- [filament/errors/static-instance-method-incompatibility.md](filament/errors/static-instance-method-incompatibility.md)
- [filament/filament-table-columns.md](filament/filament-table-columns.md)
- [filament/teams-relation-manager.md](filament/teams-relation-manager.md)
- [filament/widgets-responsive-layout.md](filament/widgets-responsive-layout.md)
- [filament/widgets/dashboard-filters-integration.md](filament/widgets/dashboard-filters-integration.md)
- [filament/widgets/edit-user-widget.md](filament/widgets/edit-user-widget.md)
- [filament/widgets/registration-widget-fileupload-fix.md](filament/widgets/registration-widget-fileupload-fix.md)
- [filament/widgets/registration-widget-fileupload.md](filament/widgets/registration-widget-fileupload.md)
- [filament/widgets/registration-widget.md](filament/widgets/registration-widget.md)
- [widgets/edit-user-widget.md](widgets/edit-user-widget.md)
- [widgets/implementation-summary.md](widgets/implementation-summary.md)
- [widgets/implementation.md](widgets/implementation.md)
- [widgets/translation-guidelines.md](widgets/translation-guidelines.md)
- [widgets/translationlines.md](widgets/translationlines.md)

## Volt, Livewire, Blade, Folio

- [folio-volt-best-practices.md](folio-volt-best-practices.md)
- [livewire-filament-parameter-passing.md](livewire-filament-parameter-passing.md)
- [livewire-form-statepath-issue.md](livewire-form-statepath-issue.md)
- [livewire-form-statepath.md](livewire-form-statepath.md)
- [livewire-namespace.md](livewire-namespace.md)
- [livewire-to-filament-widget-migration.md](livewire-to-filament-widget-migration.md)
- [volt-blade-implementation-error.md](volt-blade-implementation-error.md)
- [volt-blade-implementation.md](volt-blade-implementation.md)
- [volt-errors.md](volt-errors.md)
- [volt-folio-auth-implementation.md](volt-folio-auth-implementation.md)
- [volt-folio-error.md](volt-folio-error.md)
- [volt-folio-logout-debug.md](volt-folio-logout-debug.md)
- [volt-folio-logout-error.md](volt-folio-logout-error.md)
- [volt-folio-logout.md](volt-folio-logout.md)
- [volt-folio-logoutebug.md](volt-folio-logoutebug.md)
- [volt-folio.md](volt-folio.md)
- [volt-logout-action.md](volt-logout-action.md)
- [volt-logout.md](volt-logout.md)
- [volt-missing-directive.md](volt-missing-directive.md)
- [volt-missingirective.md](volt-missingirective.md)
- [volts.md](volts.md)
- [blade/using-filament-components.md](blade/using-filament-components.md)
- [components/blade-component-registration.md](components/blade-component-registration.md)

## Database, migrazioni, modelli

- [DATABASE-SCHEMA.md](DATABASE-SCHEMA.md)
- [cross-database-relations-issue.md](cross-database-relations-issue.md)
- [database-errors.md](database-errors.md)
- [database-issues.md](database-issues.md)
- [database-population.md](database-population.md)
- [databases.md](databases.md)
- [eloquent-properties-best-practices.md](eloquent-properties-best-practices.md)
- [factory-audit-lessons-learned.md](factory-audit-lessons-learned.md)
- [factory-creation-status.md](factory-creation-status.md)
- [factory-creation.md](factory-creation.md)
- [factory-lessons-learned.md](factory-lessons-learned.md)
- [guida-migrazione-step-by-step.md](guida-migrazione-step-by-step.md)
- [ide-helper-models-wave.md](ide-helper-models-wave.md)
- [migration-best-practices.md](migration-best-practices.md)
- [migration-consolidation-philosophy.md](migration-consolidation-philosophy.md)
- [migration-consolidation-plan.md](migration-consolidation-plan.md)
- [migration-consolidation.md](migration-consolidation.md)
- [migration-dry-violations-report.md](migration-dry-violations-report.md)
- [migration-duplicate-resolution.md](migration-duplicate-resolution.md)
- [migration-execution-safety.md](migration-execution-safety.md)
- [migration-filament.md](migration-filament.md)
- [migration-fix-tenants.md](migration-fix-tenants.md)
- [migration-internal.md](migration-internal.md)
- [migration-lang-column.md](migration-lang-column.md)
- [migration-philosophy-internal-analysis.md](migration-philosophy-internal-analysis.md)
- [migration-philosophy-strategy.md](migration-philosophy-strategy.md)
- [migration-philosophy-violations.md](migration-philosophy-violations.md)
- [migration-philosophy.md](migration-philosophy.md)
- [migration-primary-key-fix.md](migration-primary-key-fix.md)
- [migration-strategy.md](migration-strategy.md)
- [migration-teams-owner-id-fix.md](migration-teams-owner-id-fix.md)
- [migration-teams-owner-id-violation-analysis.md](migration-teams-owner-id-violation-analysis.md)
- [migration-teams-owner-id-violation.md](migration-teams-owner-id-violation.md)
- [migration-tenants.md](migration-tenants.md)
- [migration-unicity-rule.md](migration-unicity-rule.md)
- [migration-violations-analysis.md](migration-violations-analysis.md)
- [migration-violations-current-status.md](migration-violations-current-status.md)
- [migration-violations-current.md](migration-violations-current.md)
- [migration-violations.md](migration-violations.md)
- [migration.md](migration.md)
- [migrationry-violations.md](migrationry-violations.md)
- [migrations.md](migrations.md)
- [migrazione-filament.md](migrazione-filament.md)
- [missing-factories-audit.md](missing-factories-audit.md)
- [missing-factories.md](missing-factories.md)
- [model-classification.md](model-classification.md)
- [model-inheritance-analysis.md](model-inheritance-analysis.md)
- [model-inheritance-fixes.md](model-inheritance-fixes.md)
- [model-inheritance-rules.md](model-inheritance-rules.md)
- [model-inheritance.md](model-inheritance.md)
- [model-inheritancees.md](model-inheritancees.md)
- [modelli-factory-seeder-analisi.md](modelli-factory-seeder-analisi.md)
- [models-analysis.md](models-analysis.md)
- [models.md](models.md)
- [nestedset-migration-best-practices.md](nestedset-migration-best-practices.md)
- [schema-org-enhancements.md](schema-org-enhancements.md)
- [schema.md](schema.md)
- [sushi-schema-fix.md](sushi-schema-fix.md)
- [sushi-schema.md](sushi-schema.md)
- [teams-migration-laraxot-compliance.md](teams-migration-laraxot-compliance.md)
- [userfactory-advanced-implementation-complete.md](userfactory-advanced-implementation-complete.md)
- [userfactory-advanced-implementation.md](userfactory-advanced-implementation.md)
- [database/migration-safety-rules.md](database/migration-safety-rules.md)
- [database/migrations/model-has-roles.md](database/migrations/model-has-roles.md)
- [database/profile-uuid-philosophy.md](database/profile-uuid-philosophy.md)
- [migrations/migration-philosophy.md](migrations/migration-philosophy.md)
- [models/README.md](models/README.md)
- [models/base-classes-hierarchy.md](models/base-classes-hierarchy.md)
- [models/baseuser.md](models/baseuser.md)
- [models/team.md](models/team.md)
- [models/teampermission.md](models/teampermission.md)
- [models/xotbaivot-migration.md](models/xotbaivot-migration.md)
- [models/xotbasepivot-migration.md](models/xotbasepivot-migration.md)

## Testing e qualita del codice (Pest, coverage)

- [coverage-clean.md](coverage-clean.md)
- [coverage-full.md](coverage-full.md)
- [coverage.md](coverage.md)
- [pest-test-report.md](pest-test-report.md)
- [rules-testing-no-migrate-fresh.md](rules-testing-no-migrate-fresh.md)
- [testcase-hasusertestcase-property-conflict-fixed.md](testcase-hasusertestcase-property-conflict-fixed.md)
- [testcase-sqlite-to-mysql-fix.md](testcase-sqlite-to-mysql-fix.md)
- [testcase-sqlite-to-mysql.md](testcase-sqlite-to-mysql.md)
- [testing-coverage-floor.md](testing-coverage-floor.md)
- [testing-phpstan-progress.md](testing-phpstan-progress.md)
- [testing-rules.md](testing-rules.md)
- [testing-strategy.md](testing-strategy.md)
- [testing-structure.md](testing-structure.md)
- [testing-user-command-integration-fix.md](testing-user-command-integration-fix.md)
- [testing-user-command-integration.md](testing-user-command-integration.md)
- [testing.md](testing.md)
- [testing/remaining-tenant-failures.md](testing/remaining-tenant-failures.md)
- [testing/tenant-test-fixes.md](testing/tenant-test-fixes.md)
- [testing/tenantfactory-fix.md](testing/tenantfactory-fix.md)
- [testing/tenantfactory.md](testing/tenantfactory.md)
- [testing/tenanttest-fixes.md](testing/tenanttest-fixes.md)

## Qualita, performance e code review (PHPStan, PHPMD, PHPInsights)

- [PERFECTION_AUDIT.md](PERFECTION_AUDIT.md)
- [PERFORMANCE-OPTIMIZATION.md](PERFORMANCE-OPTIMIZATION.md)
- [QUERY-OPTIMIZATION-ANALYSIS.md](QUERY-OPTIMIZATION-ANALYSIS.md)
- [analisi-metodi-duplicati.md](analisi-metodi-duplicati.md)
- [bottlenecks.md](bottlenecks.md)
- [code-conventions.md](code-conventions.md)
- [code-optimization-analysis.md](code-optimization-analysis.md)
- [code-optimization.md](code-optimization.md)
- [code-quality-analysis.md](code-quality-analysis.md)
- [code-quality-improvement-report.md](code-quality-improvement-report.md)
- [code-quality-report.md](code-quality-report.md)
- [code-quality-tools.md](code-quality-tools.md)
- [code-quality.md](code-quality.md)
- [code-redundancy-audit.md](code-redundancy-audit.md)
- [conflict-resolution-passwordresetwidget.md](conflict-resolution-passwordresetwidget.md)
- [conflict-resolution-report.md](conflict-resolution-report.md)
- [conflict-resolution.md](conflict-resolution.md)
- [conflicts-analysis.md](conflicts-analysis.md)
- [conflicts.md](conflicts.md)
- [copilot-redundancy-audit.md](copilot-redundancy-audit.md)
- [cyclomatic-complexity-report.md](cyclomatic-complexity-report.md)
- [cyclomatic-complexity.md](cyclomatic-complexity.md)
- [dry-kiss-analysis-.md](dry-kiss-analysis-.md)
- [dry-kiss-analysis-conflict.md](dry-kiss-analysis-conflict.md)
- [dry-kiss-analysis.md](dry-kiss-analysis.md)
- [dry-kiss-improvements.md](dry-kiss-improvements.md)
- [dry-kiss.md](dry-kiss.md)
- [dry-violation-fix.md](dry-violation-fix.md)
- [dry-violation.md](dry-violation.md)
- [duplicate-methods-analysis.md](duplicate-methods-analysis.md)
- [duplicate-methods-report.md](duplicate-methods-report.md)
- [duplicate-methods.md](duplicate-methods.md)
- [fixes-user-module-phpstan.md](fixes-user-module-phpstan.md)
- [git-conflict-resolution.md](git-conflict-resolution.md)
- [git-conflicts-models-phpdoc.md](git-conflicts-models-phpdoc.md)
- [git-conflicts-resolution-.md](git-conflicts-resolution-.md)
- [git-conflicts-resolution-conflict.md](git-conflicts-resolution-conflict.md)
- [git-conflicts-resolution-local-swarm-backup.md](git-conflicts-resolution-local-swarm-backup.md)
- [git-conflicts-resolution-summary.md](git-conflicts-resolution-summary.md)
- [git-conflicts-resolution.md](git-conflicts-resolution.md)
- [git-multi-org-sync-handoff.md](git-multi-org-sync-handoff.md)
- [git-path-does-not-have-our-version-fix.md](git-path-does-not-have-our-version-fix.md)
- [js-conflicts.md](js-conflicts.md)
- [logging-performance.md](logging-performance.md)
- [memory-optimization-summary.md](memory-optimization-summary.md)
- [memory-optimization.md](memory-optimization.md)
- [merge-conflict-files-list.md](merge-conflict-files-list.md)
- [merge-conflicts-list.md](merge-conflicts-list.md)
- [metodi-duplicati-analisi.md](metodi-duplicati-analisi.md)
- [optimization-analysis-dry-kiss.md](optimization-analysis-dry-kiss.md)
- [optimization-analysis.md](optimization-analysis.md)
- [optimization-recommendations.md](optimization-recommendations.md)
- [optimization.md](optimization.md)
- [optimizations.md](optimizations.md)
- [ottimizzazioni-approfondite-modulo-user.md](ottimizzazioni-approfondite-modulo-user.md)
- [ottimizzazioni-correzioni.md](ottimizzazioni-correzioni.md)
- [ottimizzazioni-dry-kiss.md](ottimizzazioni-dry-kiss.md)
- [ottimizzazioni-modulo-user.md](ottimizzazioni-modulo-user.md)
- [ottimizzazioni-super-dry-kiss.md](ottimizzazioni-super-dry-kiss.md)
- [ottimizzazioni-user.md](ottimizzazioni-user.md)
- [performance-issues.md](performance-issues.md)
- [performances.md](performances.md)
- [phpinsights-errors.md](phpinsights-errors.md)
- [phpinsights-report.md](phpinsights-report.md)
- [phpinsights.md](phpinsights.md)
- [phpmd-errors.md](phpmd-errors.md)
- [phpmd-phpinsights-corrections-.md](phpmd-phpinsights-corrections-.md)
- [phpmd-phpinsights-corrections.md](phpmd-phpinsights-corrections.md)
- [phpmd-report.md](phpmd-report.md)
- [phpmd.md](phpmd.md)
- [phpstan-analysis-user.md](phpstan-analysis-user.md)
- [phpstan-array-types-fixes.md](phpstan-array-types-fixes.md)
- [phpstan-complete-success.md](phpstan-complete-success.md)
- [phpstan-compliance-status.md](phpstan-compliance-status.md)
- [phpstan-compliance.md](phpstan-compliance.md)
- [phpstan-corrections-oauth-resources.md](phpstan-corrections-oauth-resources.md)
- [phpstan-corrections-summary-.md](phpstan-corrections-summary-.md)
- [phpstan-corrections-summary.md](phpstan-corrections-summary.md)
- [phpstan-corrections.md](phpstan-corrections.md)
- [phpstan-dry-kiss-improvements-.md](phpstan-dry-kiss-improvements-.md)
- [phpstan-dry-kiss-improvements.md](phpstan-dry-kiss-improvements.md)
- [phpstan-error-roadmap.md](phpstan-error-roadmap.md)
- [phpstan-errors-philosophy.md](phpstan-errors-philosophy.md)
- [phpstan-errors-resolution-roadmap.md](phpstan-errors-resolution-roadmap.md)
- [phpstan-errors-roadmap.md](phpstan-errors-roadmap.md)
- [phpstan-final-progress.md](phpstan-final-progress.md)
- [phpstan-fix-plan-.md](phpstan-fix-plan-.md)
- [phpstan-fix-plan-user.md](phpstan-fix-plan-user.md)
- [phpstan-fix-plan.md](phpstan-fix-plan.md)
- [phpstan-fix-roadmap.md](phpstan-fix-roadmap.md)
- [phpstan-fixes-.md](phpstan-fixes-.md)
- [phpstan-fixes-archive.md](phpstan-fixes-archive.md)
- [phpstan-fixes-complete.md](phpstan-fixes-complete.md)
- [phpstan-fixes-conflict.md](phpstan-fixes-conflict.md)
- [phpstan-fixes-gennaio-.md](phpstan-fixes-gennaio-.md)
- [phpstan-fixes-gennaio-2025-complete.md](phpstan-fixes-gennaio-2025-complete.md)
- [phpstan-fixes-gennaio-complete.md](phpstan-fixes-gennaio-complete.md)
- [phpstan-fixes-gennaio.md](phpstan-fixes-gennaio.md)
- [phpstan-fixes-gennaiocomplete.md](phpstan-fixes-gennaiocomplete.md)
- [phpstan-fixes-january-complete.md](phpstan-fixes-january-complete.md)
- [phpstan-fixes-january.md](phpstan-fixes-january.md)
- [phpstan-fixes-passport.md](phpstan-fixes-passport.md)
- [phpstan-fixes-roadmap.md](phpstan-fixes-roadmap.md)
- [phpstan-fixes.md](phpstan-fixes.md)
- [phpstan-furious-debate-.md](phpstan-furious-debate-.md)
- [phpstan-furious-debate.md](phpstan-furious-debate.md)
- [phpstan-generic-types.md](phpstan-generic-types.md)
- [phpstan-level-10-fixes.md](phpstan-level-10-fixes.md)
- [phpstan-level-10es.md](phpstan-level-10es.md)
- [phpstan-level10-analysis.md](phpstan-level10-analysis.md)
- [phpstan-level10-fixes.md](phpstan-level10-fixes.md)
- [phpstan-level10-user-fixes.md](phpstan-level10-user-fixes.md)
- [phpstan-level10-useres.md](phpstan-level10-useres.md)
- [phpstan-level10.md](phpstan-level10.md)
- [phpstan-level9-fixes.md](phpstan-level9-fixes.md)
- [phpstan-patterns.md](phpstan-patterns.md)
- [phpstan-philosophy-debate.md](phpstan-philosophy-debate.md)
- [phpstan-plan.md](phpstan-plan.md)
- [phpstan-progress-report.md](phpstan-progress-report.md)
- [phpstan-progress-summary.md](phpstan-progress-summary.md)
- [phpstan-progress.md](phpstan-progress.md)
- [phpstan-relationship-fix.md](phpstan-relationship-fix.md)
- [phpstan-relationship.md](phpstan-relationship.md)
- [phpstan-report-initial.md](phpstan-report-initial.md)
- [phpstan-resolution-debate.md](phpstan-resolution-debate.md)
- [phpstan-roadmap.md](phpstan-roadmap.md)
- [phpstan-success.md](phpstan-success.md)
- [phpstan-syntax-blockers.md](phpstan-syntax-blockers.md)
- [phpstan-syntax-fixes.md](phpstan-syntax-fixes.md)
- [phpstan-user-relations.md](phpstan-user-relations.md)
- [phpstan-user.md](phpstan-user.md)
- [phpstan.md](phpstan.md)
- [phpstanes-passport.md](phpstanes-passport.md)
- [ponytail-audit-over-engineering.md](ponytail-audit-over-engineering.md)
- [ponytail-audit.md](ponytail-audit.md)
- [quality-audit.md](quality-audit.md)
- [quality-improvements-summary.md](quality-improvements-summary.md)
- [quality-improvements.md](quality-improvements.md)
- [quality-roadmap.md](quality-roadmap.md)
- [quality-status-nov.md](quality-status-nov.md)
- [quality-status.md](quality-status.md)
- [quality-tooling.md](quality-tooling.md)
- [quality-tools-final-report-.md](quality-tools-final-report-.md)
- [quality-tools-final-report.md](quality-tools-final-report.md)
- [quality-tools-final.md](quality-tools-final.md)
- [quality-tools-report.md](quality-tools-report.md)
- [quality-tools.md](quality-tools.md)
- [quality.md](quality.md)
- [quality_report.md](quality_report.md)
- [query-optimization.md](query-optimization.md)
- [redundancy-analysis.md](redundancy-analysis.md)
- [redundancy-audit.md](redundancy-audit.md)
- [redundancy-fixes-january.md](redundancy-fixes-january.md)
- [redundancy-fixes.md](redundancy-fixes.md)
- [redundancy-report.md](redundancy-report.md)
- [syntax-errors-to-fix.md](syntax-errors-to-fix.md)
- [performance/authentication-performance-optimization.md](performance/authentication-performance-optimization.md)
- [quality-analysis/user-module-quality-report.md](quality-analysis/user-module-quality-report.md)
- [quality-analysis/user-module-quality.md](quality-analysis/user-module-quality.md)

## Traduzioni e i18n

- [label-hardcoded-prevention.md](label-hardcoded-prevention.md)
- [lang-link.md](lang-link.md)
- [social-login-icons.md](social-login-icons.md)
- [theme-translation-conflicts-resolution.md](theme-translation-conflicts-resolution.md)
- [theme-translations-resolution.md](theme-translations-resolution.md)
- [translation-best-practices.md](translation-best-practices.md)
- [translation-city-field-refactor-.md](translation-city-field-refactor-.md)
- [translation-city-field-refactor-conflict.md](translation-city-field-refactor-conflict.md)
- [translation-city-field-refactor.md](translation-city-field-refactor.md)
- [translation-conflict-resolution-prototype.md](translation-conflict-resolution-prototype.md)
- [translation-fields-key-importance.md](translation-fields-key-importance.md)
- [translation-fixes.md](translation-fixes.md)
- [translation-guidelines.md](translation-guidelines.md)
- [translation-key-prototype.md](translation-key-prototype.md)
- [translation-keys-rules.md](translation-keys-rules.md)
- [translation-keys.md](translation-keys.md)
- [translation-maintenance-log.md](translation-maintenance-log.md)
- [translation-resolution-prototype.md](translation-resolution-prototype.md)
- [translation-syntax-fixes-.md](translation-syntax-fixes-.md)
- [translation-syntax-fixes.md](translation-syntax-fixes.md)
- [translations.md](translations.md)
- [lang/en/auth.md](lang/en/auth.md)

## Charts, grafici e widget di reportistica

- [chartjs-datalabels-user-integration.md](chartjs-datalabels-user-integration.md)
- [charts-implementation.md](charts-implementation.md)
- [fullcalendar-scheduler-documentation-summary.md](fullcalendar-scheduler-documentation-summary.md)
- [fullcalendar-scheduler-license-key-invalid.md](fullcalendar-scheduler-license-key-invalid.md)
- [fullcalendar-scheduler-license-troubleshooting.md](fullcalendar-scheduler-license-troubleshooting.md)
- [fullcalendar-scheduler-license.md](fullcalendar-scheduler-license.md)
- [fullcalendar-scheduler-quick-reference.md](fullcalendar-scheduler-quick-reference.md)
- [fullcalendar-schedulerocumentation.md](fullcalendar-schedulerocumentation.md)
- [jpgraph-integration.md](jpgraph-integration.md)
- [metrics-dashboard.md](metrics-dashboard.md)
- [scheduler-license-key.md](scheduler-license-key.md)
- [task-schema-org-person-enhancement.md](task-schema-org-person-enhancement.md)
- [tasks-schema-org-person.md](tasks-schema-org-person.md)

## Roadmap, prodotto e pianificazione

- [business-logic-analysis.md](business-logic-analysis.md)
- [business-logic-deep-dive.md](business-logic-deep-dive.md)
- [business-logic.md](business-logic.md)
- [cosa-migliorare.md](cosa-migliorare.md)
- [features.md](features.md)
- [implementation-plan.md](implementation-plan.md)
- [implementation-summary.md](implementation-summary.md)
- [implementation.md](implementation.md)
- [import-status.md](import-status.md)
- [launch-plan.md](launch-plan.md)
- [missing-features-analysis.md](missing-features-analysis.md)
- [missing-features.md](missing-features.md)
- [module-analysis-complete.md](module-analysis-complete.md)
- [module-analysis.md](module-analysis.md)
- [prd.md](prd.md)
- [product-launch-plan.md](product-launch-plan.md)
- [product-requirements.md](product-requirements.md)
- [product-roadmap.md](product-roadmap.md)
- [product-strategy.md](product-strategy.md)
- [roadmap-.md](roadmap-.md)
- [roadmap-and-issues.md](roadmap-and-issues.md)
- [roadmap-ands.md](roadmap-ands.md)
- [roadmap-archive.md](roadmap-archive.md)
- [roadmap-complete.md](roadmap-complete.md)
- [roadmap-conflict.md](roadmap-conflict.md)
- [roadmap-miglioramenti.md](roadmap-miglioramenti.md)
- [roadmap.md](roadmap.md)
- [sprint-planning-meeting.md](sprint-planning-meeting.md)
- [sprint-planning.md](sprint-planning.md)
- [status-blockers.md](status-blockers.md)
- [strategy.md](strategy.md)
- [task-completare-2fa.md](task-completare-2fa.md)
- [task-consolidare-documentazione.md](task-consolidare-documentazione.md)
- [task-consolidareocumentazione.md](task-consolidareocumentazione.md)
- [task-ottimizzare-baseuser.md](task-ottimizzare-baseuser.md)
- [task-ridurre-phpstan-suppressioni.md](task-ridurre-phpstan-suppressioni.md)
- [task-test-socialite-actions.md](task-test-socialite-actions.md)
- [todo.md](todo.md)
- [updates-dec.md](updates-dec.md)
- [updates.md](updates.md)
- [development/roadmap.md](development/roadmap.md)
- [development/roadmap/2fa.md](development/roadmap/2fa.md)
- [development/roadmap/bottlenecks.md](development/roadmap/bottlenecks.md)
- [development/roadmap/features/audit-logging.md](development/roadmap/features/audit-logging.md)
- [development/roadmap/features/autenticazione.md](development/roadmap/features/autenticazione.md)
- [development/roadmap/features/autorizzazione.md](development/roadmap/features/autorizzazione.md)
- [development/roadmap/features/gestione-teams.md](development/roadmap/features/gestione-teams.md)
- [development/roadmap/features/gestione-utenti.md](development/roadmap/features/gestione-utenti.md)
- [development/roadmap/features/legacy-code-cleanup.md](development/roadmap/features/legacy-code-cleanup.md)
- [development/roadmap/features/user-analytics.md](development/roadmap/features/user-analytics.md)
- [development/roadmap/features/user-traits.md](development/roadmap/features/user-traits.md)
- [product/launch-plan/README.md](product/launch-plan/README.md)
- [product/prd/README.md](product/prd/README.md)
- [product/roadmap/README.md](product/roadmap/README.md)
- [product/spring-planning/README.md](product/spring-planning/README.md)
- [product/strategy/README.md](product/strategy/README.md)
- [product/user-research/README.md](product/user-research/README.md)
- [roadmap/-q4-roadmap.md](roadmap/-q4-roadmap.md)
- [roadmap/00-index.md](roadmap/00-index.md)
- [roadmap/00-overview.md](roadmap/00-overview.md)
- [roadmap/01-current-state.md](roadmap/01-current-state.md)
- [roadmap/01-now.md](roadmap/01-now.md)
- [roadmap/02-goals.md](roadmap/02-goals.md)
- [roadmap/02-next.md](roadmap/02-next.md)
- [roadmap/03-later.md](roadmap/03-later.md)
- [roadmap/03-workstreams.md](roadmap/03-workstreams.md)
- [roadmap/04-milestones.md](roadmap/04-milestones.md)
- [roadmap/04-risks.md](roadmap/04-risks.md)
- [roadmap/05-risks.md](roadmap/05-risks.md)
- [roadmap/2025-q4-roadmap.md](roadmap/2025-q4-roadmap.md)
- [roadmap/2fa.md](roadmap/2fa.md)
- [roadmap/README.md](roadmap/README.md)
- [roadmap/bottlenecks.md](roadmap/bottlenecks.md)
- [roadmap/chaos-readiness.md](roadmap/chaos-readiness.md)
- [roadmap/current-state.md](roadmap/current-state.md)
- [roadmap/features/audit-logging.md](roadmap/features/audit-logging.md)
- [roadmap/features/autenticazione.md](roadmap/features/autenticazione.md)
- [roadmap/features/autorizzazione.md](roadmap/features/autorizzazione.md)
- [roadmap/features/gestione-teams.md](roadmap/features/gestione-teams.md)
- [roadmap/features/gestione-utenti.md](roadmap/features/gestione-utenti.md)
- [roadmap/features/legacy-code-cleanup.md](roadmap/features/legacy-code-cleanup.md)
- [roadmap/features/user-analytics.md](roadmap/features/user-analytics.md)
- [roadmap/features/user-traits.md](roadmap/features/user-traits.md)
- [roadmap/goals.md](roadmap/goals.md)
- [roadmap/index.md](roadmap/index.md)
- [roadmap/later.md](roadmap/later.md)
- [roadmap/legacy-roadmap.md](roadmap/legacy-roadmap.md)
- [roadmap/milestones.md](roadmap/milestones.md)
- [roadmap/next.md](roadmap/next.md)
- [roadmap/now.md](roadmap/now.md)
- [roadmap/overview.md](roadmap/overview.md)
- [roadmap/phases.md](roadmap/phases.md)
- [roadmap/q4-roadmap.md](roadmap/q4-roadmap.md)
- [roadmap/quality.md](roadmap/quality.md)
- [roadmap/risks.md](roadmap/risks.md)
- [roadmap/roadmap.md](roadmap/roadmap.md)
- [roadmap/technical-debt.md](roadmap/technical-debt.md)
- [roadmap/testing.md](roadmap/testing.md)
- [roadmap/vision.md](roadmap/vision.md)
- [roadmap/workstreams.md](roadmap/workstreams.md)
- [tasks/001-user-management-system.md](tasks/001-user-management-system.md)
- [tasks/audit-dipendenze-user.md](tasks/audit-dipendenze-user.md)
- [tasks/auditipendenze-user.md](tasks/auditipendenze-user.md)
- [tasks/aumentare-copertura-test-user.md](tasks/aumentare-copertura-test-user.md)
- [tasks/features/two-factor-authentication.md](tasks/features/two-factor-authentication.md)
- [tasks/fix-doc-merge-markers.md](tasks/fix-doc-merge-markers.md)
- [tasks/fixoc-merge-kers.md](tasks/fixoc-merge-kers.md)
- [tasks/query-optimization-user.md](tasks/query-optimization-user.md)
- [tasks/spostamento-widget-violante.md](tasks/spostamento-widget-violante.md)
- [tasks/tasks-index.md](tasks/tasks-index.md)
- [tasks/user-cleanup-docs.md](tasks/user-cleanup-docs.md)
- [tasks/user-cleanupocs.md](tasks/user-cleanupocs.md)
- [tasks/user-filament-v5-alignment.md](tasks/user-filament-v5-alignment.md)
- [tasks/user-filament-v5.md](tasks/user-filament-v5.md)
- [tasks/user-management-system.md](tasks/user-management-system.md)

## Best practices e linee guida

- [best-practices.md](best-practices.md)
- [best-practices/auth-components-best-practices.md](best-practices/auth-components-best-practices.md)
- [best-practices/auth-widget-rules.md](best-practices/auth-widget-rules.md)
- [best-practices/auth-widget.md](best-practices/auth-widget.md)
- [best-practices/case-sensitivity-rules.md](best-practices/case-sensitivity-rules.md)
- [best-practices/case-sensitivity.md](best-practices/case-sensitivity.md)
- [best-practices/component-verification-rules.md](best-practices/component-verification-rules.md)
- [best-practices/component-verification.md](best-practices/component-verification.md)
- [best-practices/dependency-rules.md](best-practices/dependency-rules.md)
- [best-practices/dependency.md](best-practices/dependency.md)
- [best-practices/eloquent-properties-best-practices.md](best-practices/eloquent-properties-best-practices.md)
- [best-practices/filament-best-practices.md](best-practices/filament-best-practices.md)
- [best-practices/filament-components.md](best-practices/filament-components.md)
- [best-practices/filament-namespace-rules.md](best-practices/filament-namespace-rules.md)
- [best-practices/filament-namespace.md](best-practices/filament-namespace.md)
- [best-practices/filament-widgets.md](best-practices/filament-widgets.md)
- [best-practices/file-naming-rules.md](best-practices/file-naming-rules.md)
- [best-practices/file-naming.md](best-practices/file-naming.md)
- [best-practices/folio-volt-best-practices.md](best-practices/folio-volt-best-practices.md)
- [best-practices/logout-implementation-best-practices.md](best-practices/logout-implementation-best-practices.md)
- [best-practices/migration-best-practices.md](best-practices/migration-best-practices.md)
- [best-practices/model-inheritance-rules.md](best-practices/model-inheritance-rules.md)
- [best-practices/model-inheritance.md](best-practices/model-inheritance.md)
- [best-practices/namespace-conventions.md](best-practices/namespace-conventions.md)
- [best-practices/nestedset-migration-best-practices.md](best-practices/nestedset-migration-best-practices.md)
- [best-practices/queueable-actions.md](best-practices/queueable-actions.md)
- [best-practices/routing-best-practices.md](best-practices/routing-best-practices.md)
- [best-practices/testing-rules.md](best-practices/testing-rules.md)
- [best-practices/testing.md](best-practices/testing.md)
- [best-practices/translation-best-practices.md](best-practices/translation-best-practices.md)
- [best-practices/translation-keys-rules.md](best-practices/translation-keys-rules.md)
- [best-practices/translation-keys.md](best-practices/translation-keys.md)
- [best-practices/widget-translation-rules.md](best-practices/widget-translation-rules.md)
- [best-practices/widget-translation.md](best-practices/widget-translation.md)

## Bug fix e troubleshooting

- [bugfix-permission-table-names-singular.md](bugfix-permission-table-names-singular.md)
- [bugfix-phpmd-cleanup.md](bugfix-phpmd-cleanup.md)
- [bugfix-profile-uuid-id-missing-default.md](bugfix-profile-uuid-id-missing-default.md)
- [fix-ide-helper-relation-errors.md](fix-ide-helper-relation-errors.md)
- [fix-profile-id-uuid.md](fix-profile-id-uuid.md)
- [troubleshooting-login-component.md](troubleshooting-login-component.md)
- [bug-fixes/make-filament-user-crash-loop.md](bug-fixes/make-filament-user-crash-loop.md)
- [bug-fixes/parse-error-orphan-methods-.md](bug-fixes/parse-error-orphan-methods-.md)
- [bug-fixes/parse-error-orphan-methods.md](bug-fixes/parse-error-orphan-methods.md)
- [bug-fixes/parse-orphan-methods.md](bug-fixes/parse-orphan-methods.md)
- [bug-tracking/base-classes-corrections.md](bug-tracking/base-classes-corrections.md)
- [bugfix/deviceuser-hasxotfactory-fix.md](bugfix/deviceuser-hasxotfactory-fix.md)
- [bugfix/deviceuser-hasxotfactory.md](bugfix/deviceuser-hasxotfactory.md)
- [bugfix/git-conflicts-resolution.md](bugfix/git-conflicts-resolution.md)
- [bugfix/gits-resolution.md](bugfix/gits-resolution.md)
- [bugfix/multiple-bugs-resolution.md](bugfix/multiple-bugs-resolution.md)
- [bugs/make-filament-user-infinite-loop.md](bugs/make-filament-user-infinite-loop.md)
- [bugs/testing.md](bugs/testing.md)
- [errori/class-page-not-found.md](errori/class-page-not-found.md)
- [fixes/base-classes-corrections-.md](fixes/base-classes-corrections-.md)
- [fixes/base-classes-corrections.md](fixes/base-classes-corrections.md)
- [fixes/phpstan-fixes.md](fixes/phpstan-fixes.md)
- [fixes/phpstanes.md](fixes/phpstanes.md)

## Console commands

- [console-commands-philosophy.md](console-commands-philosophy.md)
- [console-commands.md](console-commands.md)
- [commands/README.md](commands/README.md)
- [commands/assign-module-command.md](commands/assign-module-command.md)
- [commands/change-password-command.md](commands/change-password-command.md)
- [commands/console-commands-philosophy.md](commands/console-commands-philosophy.md)
- [console-commands/README.md](console-commands/README.md)
- [console-commands/assign-module-command.md](console-commands/assign-module-command.md)
- [console-commands/change-password-command.md](console-commands/change-password-command.md)
- [console-commands/console-commands-philosophy.md](console-commands/console-commands-philosophy.md)
- [console-commands/console-commands.md](console-commands/console-commands.md)
- [console_commands/README.md](console_commands/README.md)
- [console_commands/assign-module-command.md](console_commands/assign-module-command.md)
- [console_commands/change-password-command.md](console_commands/change-password-command.md)
- [console_commands/console-commands-philosophy.md](console_commands/console-commands-philosophy.md)
- [console_commands/console-commands.md](console_commands/console-commands.md)

## Traits e contratti

- [contracts-naming.md](contracts-naming.md)
- [traits-complete-guide.md](traits-complete-guide.md)
- [traits-hasteams-analysis-corrected.md](traits-hasteams-analysis-corrected.md)
- [traits-hasteams-corrected.md](traits-hasteams-corrected.md)
- [traits.md](traits.md)
- [contracts/hasteamsandusercontract.md](contracts/hasteamsandusercontract.md)
- [contracts/teamcontract.md](contracts/teamcontract.md)
- [traits/has-authentication-log.md](traits/has-authentication-log.md)
- [traits/has-teams.md](traits/has-teams.md)
- [traits/has-tenants.md](traits/has-tenants.md)

## Integrazioni esterne

- [API.md](API.md)
- [cms-link.md](cms-link.md)
- [eav.md](eav.md)
- [json.md](json.md)
- [limesurvey-database-commands.md](limesurvey-database-commands.md)
- [links.md](links.md)
- [payment.md](payment.md)
- [placeholder.md](placeholder.md)
- [stats.md](stats.md)
- [tailwind.md](tailwind.md)
- [tips.md](tips.md)
- [docs/confidence-guidelines.md](docs/confidence-guidelines.md)
- [docs/eav.md](docs/eav.md)
- [docs/filament-version.md](docs/filament-version.md)
- [docs/filament.md](docs/filament.md)
- [docs/gdpr.md](docs/gdpr.md)
- [docs/json.md](docs/json.md)
- [docs/links.md](docs/links.md)
- [docs/passport.md](docs/passport.md)
- [docs/payment.md](docs/payment.md)
- [docs/placeholder.md](docs/placeholder.md)
- [docs/profile.md](docs/profile.md)
- [docs/repos.md](docs/repos.md)
- [docs/socialite.md](docs/socialite.md)
- [docs/spatie_permissions.md](docs/spatie_permissions.md)
- [docs/sso.md](docs/sso.md)
- [docs/stats.md](docs/stats.md)
- [docs/tailwind.md](docs/tailwind.md)
- [docs/terms_and_conditions.md](docs/terms_and_conditions.md)
- [docs/tips.md](docs/tips.md)
- [docs/two_factor.md](docs/two_factor.md)
- [html2pdf/advanced.md](html2pdf/advanced.md)
- [html2pdf/index.md](html2pdf/index.md)
- [html2pdf/laravel.md](html2pdf/laravel.md)
- [html2pdf/security.md](html2pdf/security.md)
- [html2pdf/styling.md](html2pdf/styling.md)
- [html2pdf/usage.md](html2pdf/usage.md)

## Tooling MCP, ambiente dev, git/LFS

- [QMD-SETUP.md](QMD-SETUP.md)
- [boost-skill-fix-summary.md](boost-skill-fix-summary.md)
- [codex-error-fix.md](codex-error-fix.md)
- [cursor-rules.md](cursor-rules.md)
- [cursor.md](cursor.md)
- [git-push-lfs-issue.md](git-push-lfs-issue.md)
- [git-reset.md](git-reset.md)
- [git-resolution.md](git-resolution.md)
- [gits-resolution.md](gits-resolution.md)
- [laravel-13-auth-composer-notes.md](laravel-13-auth-composer-notes.md)
- [laravel-13-upgrade.md](laravel-13-upgrade.md)
- [mcp-configuration.md](mcp-configuration.md)
- [mcp-database-tools.md](mcp-database-tools.md)
- [mcp-integration.md](mcp-integration.md)
- [mcp-server-recommended.md](mcp-server-recommended.md)
- [no-git-lfs.md](no-git-lfs.md)
- [no-log-in-production.md](no-log-in-production.md)
- [pandoc_guide.md](pandoc_guide.md)
- [setup-super-admin.md](setup-super-admin.md)
- [windsurf-rules.md](windsurf-rules.md)
- [windsurf.md](windsurf.md)
- [prompts/fix01.md](prompts/fix01.md)
- [prompts/fix02.md](prompts/fix02.md)
- [prompts/push.md](prompts/push.md)
- [prompts/socialite.md](prompts/socialite.md)
- [scripts/fix-module-structure.sh.md](scripts/fix-module-structure.sh.md)
- [scripts/fix-paths.sh.md](scripts/fix-paths.sh.md)

## Guide utente e screenshot

- [img/create-user.jpg.md](img/create-user.jpg.md)
- [img/create_user.md](img/create_user.md)
- [img/roles-list.jpg.md](img/roles-list.jpg.md)
- [img/roles_list.md](img/roles_list.md)
- [img/set-password.jpg.md](img/set-password.jpg.md)
- [img/set_password.md](img/set_password.md)
- [screenshots/event-detail-page.md](screenshots/event-detail-page.md)

## BMAD: stories e governance

- [stories/3.1.rbac-evaluator-role.story.md](stories/3.1.rbac-evaluator-role.story.md)
- [stories/3.10.login-audit.story.md](stories/3.10.login-audit.story.md)
- [stories/3.2.rbac-staff-role.story.md](stories/3.2.rbac-staff-role.story.md)
- [stories/3.3.rbac-admin-role.story.md](stories/3.3.rbac-admin-role.story.md)
- [stories/3.4.rbac-senior-mgmt-role.story.md](stories/3.4.rbac-senior-mgmt-role.story.md)
- [stories/3.9.verify-data-residency.story.md](stories/3.9.verify-data-residency.story.md)
- [stories/5.1.user-lang-phpstan-debt.story.md](stories/5.1.user-lang-phpstan-debt.story.md)
- [stories/6.2.user-invite-workflow.story.md](stories/6.2.user-invite-workflow.story.md)
- [stories/6.3.permission-seeding-invite-batch.story.md](stories/6.3.permission-seeding-invite-batch.story.md)
- [stories/7.1.phpstan-application-contracts.story.md](stories/7.1.phpstan-application-contracts.story.md)
- [stories/7.2.phpstan-test-harness-contracts.story.md](stories/7.2.phpstan-test-harness-contracts.story.md)
- [stories/7.3.test-mai-eseguiti-suffisso-mancante.story.md](stories/7.3.test-mai-eseguiti-suffisso-mancante.story.md)
- [stories/7.4.phpstan-paramtype-coverage.story.md](stories/7.4.phpstan-paramtype-coverage.story.md)
- [stories/form-column-parity.story.md](stories/form-column-parity.story.md)
- [stories/roles-teams-scoping-disabled-by-override.md](stories/roles-teams-scoping-disabled-by-override.md)

## Wiki interno (knowledge base)

### `llm-wiki/`

- [llm-wiki/agents.md](llm-wiki/agents.md)
- [llm-wiki/index.md](llm-wiki/index.md)
- [llm-wiki/log.md](llm-wiki/log.md)

### `llm-wiki/_templates/`

- [llm-wiki/_templates/concept.md](llm-wiki/_templates/concept.md)
- [llm-wiki/_templates/entity.md](llm-wiki/_templates/entity.md)
- [llm-wiki/_templates/source.md](llm-wiki/_templates/source.md)

### `llm-wiki/concepts/`

- [llm-wiki/concepts/filament-widget-no-validate-form.md](llm-wiki/concepts/filament-widget-no-validate-form.md)

### `raw/`

- [raw/README.md](raw/README.md)
- [raw/index.md](raw/index.md)

### `raw/root-import/`

- [raw/root-import/analyst-report.md](raw/root-import/analyst-report.md)
- [raw/root-import/changelog.md](raw/root-import/changelog.md)
- [raw/root-import/git-reset.md](raw/root-import/git-reset.md)
- [raw/root-import/pest-test-report.md](raw/root-import/pest-test-report.md)
- [raw/root-import/story-user-audit-improvements.md](raw/root-import/story-user-audit-improvements.md)

### `wiki/`

- [wiki/README.md](wiki/README.md)
- [wiki/agents.md](wiki/agents.md)
- [wiki/architecture.md](wiki/architecture.md)
- [wiki/auth-patterns.md](wiki/auth-patterns.md)
- [wiki/bmad-method.md](wiki/bmad-method.md)
- [wiki/context-compression.md](wiki/context-compression.md)
- [wiki/index.md](wiki/index.md)
- [wiki/log.md](wiki/log.md)
- [wiki/overview.md](wiki/overview.md)
- [wiki/schema.md](wiki/schema.md)
- [wiki/socialite-architecture.md](wiki/socialite-architecture.md)
- [wiki/twofactorauthentication.md](wiki/twofactorauthentication.md)
- [wiki/uservsprofile.md](wiki/uservsprofile.md)

### `wiki/_templates/`

- [wiki/_templates/concept.md](wiki/_templates/concept.md)
- [wiki/_templates/entity.md](wiki/_templates/entity.md)
- [wiki/_templates/source.md](wiki/_templates/source.md)

### `wiki/commands/`

- [wiki/commands/index.md](wiki/commands/index.md)
- [wiki/commands/user-super-admin.md](wiki/commands/user-super-admin.md)

### `wiki/concepts/`

- [wiki/concepts/ai-harness-user-discipline.md](wiki/concepts/ai-harness-user-discipline.md)
- [wiki/concepts/baseuser-hierarchy.md](wiki/concepts/baseuser-hierarchy.md)
- [wiki/concepts/code-redundancy-user.md](wiki/concepts/code-redundancy-user.md)
- [wiki/concepts/context-mode-user-discipline.md](wiki/concepts/context-mode-user-discipline.md)
- [wiki/concepts/context-overflow-prevention.md](wiki/concepts/context-overflow-prevention.md)
- [wiki/concepts/duplicate-method-bodies.md](wiki/concepts/duplicate-method-bodies.md)
- [wiki/concepts/filament-langserviceprovider-governance.md](wiki/concepts/filament-langserviceprovider-governance.md)
- [wiki/concepts/filament-widget-linear-crud-model-create.md](wiki/concepts/filament-widget-linear-crud-model-create.md)
- [wiki/concepts/filament-widget-resource-form-delegation.md](wiki/concepts/filament-widget-resource-form-delegation.md)
- [wiki/concepts/folio-pages-owner-pattern.md](wiki/concepts/folio-pages-owner-pattern.md)
- [wiki/concepts/index.md](wiki/concepts/index.md)
- [wiki/concepts/lang-backup-in-place.md](wiki/concepts/lang-backup-in-place.md)
- [wiki/concepts/legacy-docs-duplication-pattern.md](wiki/concepts/legacy-docs-duplication-pattern.md)
- [wiki/concepts/local-mysql-user-provision.md](wiki/concepts/local-mysql-user-provision.md)
- [wiki/concepts/login-invalid-credentials-copy-rule.md](wiki/concepts/login-invalid-credentials-copy-rule.md)
- [wiki/concepts/login-page-design-comuni.md](wiki/concepts/login-page-design-comuni.md)
- [wiki/concepts/mariadb-create-table-after-rule.md](wiki/concepts/mariadb-create-table-after-rule.md)
- [wiki/concepts/method-name-homonyms.md](wiki/concepts/method-name-homonyms.md)
- [wiki/concepts/migration-naming-religion-user.md](wiki/concepts/migration-naming-religion-user.md)
- [wiki/concepts/migrations-users-inventory.md](wiki/concepts/migrations-users-inventory.md)
- [wiki/concepts/model-migration-seeder-rule.md](wiki/concepts/model-migration-seeder-rule.md)
- [wiki/concepts/module-root-folder-violations.md](wiki/concepts/module-root-folder-violations.md)
- [wiki/concepts/no-app-support-queueable-actions.md](wiki/concepts/no-app-support-queueable-actions.md)
- [wiki/concepts/no-comment-module-dependency.md](wiki/concepts/no-comment-module-dependency.md)
- [wiki/concepts/no-services-no-support-queueable-actions.md](wiki/concepts/no-services-no-support-queueable-actions.md)
- [wiki/concepts/notifications-folio-page.md](wiki/concepts/notifications-folio-page.md)
- [wiki/concepts/notifications-folio-route.md](wiki/concepts/notifications-folio-route.md)
- [wiki/concepts/notifications-runtime-model.md](wiki/concepts/notifications-runtime-model.md)
- [wiki/concepts/one-migration-consolidamento-wave2.md](wiki/concepts/one-migration-consolidamento-wave2.md)
- [wiki/concepts/organizzativa-money.md](wiki/concepts/organizzativa-money.md)
- [wiki/concepts/pest-helpers-bootfiles.md](wiki/concepts/pest-helpers-bootfiles.md)
- [wiki/concepts/policy-base-choice.md](wiki/concepts/policy-base-choice.md)
- [wiki/concepts/policy-hierarchy.md](wiki/concepts/policy-hierarchy.md)
- [wiki/concepts/policy-inheritance-boundary.md](wiki/concepts/policy-inheritance-boundary.md)
- [wiki/concepts/policy-inheritance-strategy.md](wiki/concepts/policy-inheritance-strategy.md)
- [wiki/concepts/policy-structure.md](wiki/concepts/policy-structure.md)
- [wiki/concepts/ponytail-audit.md](wiki/concepts/ponytail-audit.md)
- [wiki/concepts/profile-id-bigint-uuid-fix.md](wiki/concepts/profile-id-bigint-uuid-fix.md)
- [wiki/concepts/profile-migration-uuid-contract.md](wiki/concepts/profile-migration-uuid-contract.md)
- [wiki/concepts/profiles-ownership-boundary-rule.md](wiki/concepts/profiles-ownership-boundary-rule.md)
- [wiki/concepts/ridondanze-docs-legacy-cluster.md](wiki/concepts/ridondanze-docs-legacy-cluster.md)
- [wiki/concepts/second-brain-local-discipline.md](wiki/concepts/second-brain-local-discipline.md)
- [wiki/concepts/socialite-admin-configuration.md](wiki/concepts/socialite-admin-configuration.md)
- [wiki/concepts/socialite-admin-tutorial.md](wiki/concepts/socialite-admin-tutorial.md)
- [wiki/concepts/socialite-architecture-analysis.md](wiki/concepts/socialite-architecture-analysis.md)
- [wiki/concepts/socialite-architecture.md](wiki/concepts/socialite-architecture.md)
- [wiki/concepts/socialite-backoffice-google-setup.md](wiki/concepts/socialite-backoffice-google-setup.md)
- [wiki/concepts/socialite-provider-governance.md](wiki/concepts/socialite-provider-governance.md)
- [wiki/concepts/spatie-permission-migration-no-table-name.md](wiki/concepts/spatie-permission-migration-no-table-name.md)
- [wiki/concepts/spatie-permission-table-names.md](wiki/concepts/spatie-permission-table-names.md)
- [wiki/concepts/teams-owner-id-in-create-migration.md](wiki/concepts/teams-owner-id-in-create-migration.md)
- [wiki/concepts/testing.md](wiki/concepts/testing.md)
- [wiki/concepts/trait-alias-conflict-resolution.md](wiki/concepts/trait-alias-conflict-resolution.md)
- [wiki/concepts/translation-5-level-structure.md](wiki/concepts/translation-5-level-structure.md)
- [wiki/concepts/translation-convention.md](wiki/concepts/translation-convention.md)
- [wiki/concepts/user-auth-visibility.md](wiki/concepts/user-auth-visibility.md)
- [wiki/concepts/user-module-operating-focus.md](wiki/concepts/user-module-operating-focus.md)
- [wiki/concepts/user-support-to-actions.md](wiki/concepts/user-support-to-actions.md)
- [wiki/concepts/xotbase-table-columns-enforcement.md](wiki/concepts/xotbase-table-columns-enforcement.md)
- [wiki/concepts/xotbasefield-view-rule.md](wiki/concepts/xotbasefield-view-rule.md)
- [wiki/concepts/xotbasepage-inheritance-rules.md](wiki/concepts/xotbasepage-inheritance-rules.md)
- [wiki/concepts/xotbasepage-inheritance.md](wiki/concepts/xotbasepage-inheritance.md)

### `wiki/decisions/`

- [wiki/decisions/contracts-and-lang-backup-archival-.deprecated.md](wiki/decisions/contracts-and-lang-backup-archival-.deprecated.md)
- [wiki/decisions/contracts-and-lang-backup-archival.md](wiki/decisions/contracts-and-lang-backup-archival.md)

### `wiki/entities/`

- [wiki/entities/socialite-user.md](wiki/entities/socialite-user.md)

### `wiki/how-to/`

- [wiki/how-to/gitmodules-sync-session.md](wiki/how-to/gitmodules-sync-session.md)

### `wiki/integrations/`

- [wiki/integrations/architecture.md](wiki/integrations/architecture.md)
- [wiki/integrations/baseuser-consolidated.md](wiki/integrations/baseuser-consolidated.md)
- [wiki/integrations/business-consolidated.md](wiki/integrations/business-consolidated.md)
- [wiki/integrations/business-logic-analysis.md](wiki/integrations/business-logic-analysis.md)
- [wiki/integrations/business-logic-deep-dive.md](wiki/integrations/business-logic-deep-dive.md)
- [wiki/integrations/code-consolidated.md](wiki/integrations/code-consolidated.md)
- [wiki/integrations/code-quality-analysis.md](wiki/integrations/code-quality-analysis.md)
- [wiki/integrations/dry-consolidated.md](wiki/integrations/dry-consolidated.md)
- [wiki/integrations/fullcalendar-consolidated.md](wiki/integrations/fullcalendar-consolidated.md)
- [wiki/integrations/git-consolidated.md](wiki/integrations/git-consolidated.md)
- [wiki/integrations/graphify-map.md](wiki/integrations/graphify-map.md)
- [wiki/integrations/hasteams-consolidated.md](wiki/integrations/hasteams-consolidated.md)
- [wiki/integrations/login-consolidated.md](wiki/integrations/login-consolidated.md)
- [wiki/integrations/logout-consolidated.md](wiki/integrations/logout-consolidated.md)
- [wiki/integrations/model-consolidated.md](wiki/integrations/model-consolidated.md)
- [wiki/integrations/model-inheritance-analysis.md](wiki/integrations/model-inheritance-analysis.md)
- [wiki/integrations/model-inheritance-fixes.md](wiki/integrations/model-inheritance-fixes.md)
- [wiki/integrations/moderation-consolidated.md](wiki/integrations/moderation-consolidated.md)
- [wiki/integrations/navigation-consolidated.md](wiki/integrations/navigation-consolidated.md)
- [wiki/integrations/on-demand-pattern.md](wiki/integrations/on-demand-pattern.md)
- [wiki/integrations/ottimizzazioni-consolidated.md](wiki/integrations/ottimizzazioni-consolidated.md)
- [wiki/integrations/passport-consolidated.md](wiki/integrations/passport-consolidated.md)
- [wiki/integrations/phpstan_l10.md](wiki/integrations/phpstan_l10.md)
- [wiki/integrations/phpstan_status.md](wiki/integrations/phpstan_status.md)
- [wiki/integrations/quality-consolidated.md](wiki/integrations/quality-consolidated.md)
- [wiki/integrations/query-consolidated.md](wiki/integrations/query-consolidated.md)
- [wiki/integrations/query-optimization-analysis.md](wiki/integrations/query-optimization-analysis.md)
- [wiki/integrations/readme.md](wiki/integrations/readme.md)
- [wiki/integrations/registration-consolidated.md](wiki/integrations/registration-consolidated.md)
- [wiki/integrations/resources-consolidated.md](wiki/integrations/resources-consolidated.md)
- [wiki/integrations/spatie-consolidated.md](wiki/integrations/spatie-consolidated.md)
- [wiki/integrations/spatie-permissions-methods.md](wiki/integrations/spatie-permissions-methods.md)
- [wiki/integrations/sso-consolidated.md](wiki/integrations/sso-consolidated.md)
- [wiki/integrations/sso-providers-implementation.md](wiki/integrations/sso-providers-implementation.md)
- [wiki/integrations/team-consolidated.md](wiki/integrations/team-consolidated.md)
- [wiki/integrations/traits-consolidated.md](wiki/integrations/traits-consolidated.md)
- [wiki/integrations/translation-consolidated.md](wiki/integrations/translation-consolidated.md)
- [wiki/integrations/user-consolidated.md](wiki/integrations/user-consolidated.md)
- [wiki/integrations/volt-consolidated.md](wiki/integrations/volt-consolidated.md)
- [wiki/integrations/widget-consolidated.md](wiki/integrations/widget-consolidated.md)
- [wiki/integrations/widget-rendering-analysis.md](wiki/integrations/widget-rendering-analysis.md)

### `wiki/integrations/_da-riconciliare/`

- [wiki/integrations/_da-riconciliare/index.divergenza.md](wiki/integrations/_da-riconciliare/index.divergenza.md)
- [wiki/integrations/_da-riconciliare/index.md](wiki/integrations/_da-riconciliare/index.md)
- [wiki/integrations/_da-riconciliare/phpinsights-errors.DIVERGENZA.md](wiki/integrations/_da-riconciliare/phpinsights-errors.DIVERGENZA.md)
- [wiki/integrations/_da-riconciliare/phpinsights-errors.md](wiki/integrations/_da-riconciliare/phpinsights-errors.md)
- [wiki/integrations/_da-riconciliare/project-structure.divergenza.md](wiki/integrations/_da-riconciliare/project-structure.divergenza.md)
- [wiki/integrations/_da-riconciliare/project-structure.md](wiki/integrations/_da-riconciliare/project-structure.md)
- [wiki/integrations/_da-riconciliare/testing.divergenza.md](wiki/integrations/_da-riconciliare/testing.divergenza.md)
- [wiki/integrations/_da-riconciliare/testing.md](wiki/integrations/_da-riconciliare/testing.md)

### `wiki/memories/`

- [wiki/memories/index.md](wiki/memories/index.md)
- [wiki/memories/phpstan-belongstomany-covariance-.deprecated.md](wiki/memories/phpstan-belongstomany-covariance-.deprecated.md)
- [wiki/memories/phpstan-belongstomany-covariance.md](wiki/memories/phpstan-belongstomany-covariance.md)

### `wiki/overviews/`

- [wiki/overviews/user-module.md](wiki/overviews/user-module.md)

### `wiki/product/_da-riconciliare/`

- [wiki/product/_da-riconciliare/index.md](wiki/product/_da-riconciliare/index.md)

### `wiki/redundancy/`

- [wiki/redundancy/duplicated-auth-widgets.md](wiki/redundancy/duplicated-auth-widgets.md)
- [wiki/redundancy/duplicated-profile-form.md](wiki/redundancy/duplicated-profile-form.md)
- [wiki/redundancy/duplicated-ratings-relation-manager.md](wiki/redundancy/duplicated-ratings-relation-manager.md)
- [wiki/redundancy/duplicated-users-relation-manager.md](wiki/redundancy/duplicated-users-relation-manager.md)
- [wiki/redundancy/oauth-dual-resource-trees.md](wiki/redundancy/oauth-dual-resource-trees.md)

### `wiki/rules/`

- [wiki/rules/agent-confidence-protocol.md](wiki/rules/agent-confidence-protocol.md)
- [wiki/rules/can-comment-retired-wrong-placement.md](wiki/rules/can-comment-retired-wrong-placement.md)
- [wiki/rules/frontend-stack-canonical.md](wiki/rules/frontend-stack-canonical.md)
- [wiki/rules/header-auth-flow.md](wiki/rules/header-auth-flow.md)
- [wiki/rules/header-design-colors.md](wiki/rules/header-design-colors.md)
- [wiki/rules/index.md](wiki/rules/index.md)
- [wiki/rules/module-commit-push-after-change.md](wiki/rules/module-commit-push-after-change.md)
- [wiki/rules/navigation-properties.md](wiki/rules/navigation-properties.md)
- [wiki/rules/no-filament-labels.md](wiki/rules/no-filament-labels.md)
- [wiki/rules/no-notifications-migration-in-user-module.md](wiki/rules/no-notifications-migration-in-user-module.md)

### `wiki/skills/`

- [wiki/skills/filament-translation-audit.md](wiki/skills/filament-translation-audit.md)
- [wiki/skills/index.md](wiki/skills/index.md)

### `wiki/sources/`

- [wiki/sources/user-architecture-sources.md](wiki/sources/user-architecture-sources.md)

### `wiki/troubleshooting/`

- [wiki/troubleshooting/filament-user-creation-pty-error.md](wiki/troubleshooting/filament-user-creation-pty-error.md)
- [wiki/troubleshooting/git-lfs-orphan-pointer-svg-fix.md](wiki/troubleshooting/git-lfs-orphan-pointer-svg-fix.md)
- [wiki/troubleshooting/git-merge-conflict-inventory-.deprecated.md](wiki/troubleshooting/git-merge-conflict-inventory-.deprecated.md)
- [wiki/troubleshooting/git-merge-conflict-inventory.md](wiki/troubleshooting/git-merge-conflict-inventory.md)
- [wiki/troubleshooting/git-push-dual-remote-unrelated.md](wiki/troubleshooting/git-push-dual-remote-unrelated.md)
- [wiki/troubleshooting/git-push-lfs-missing-objects.md](wiki/troubleshooting/git-push-lfs-missing-objects.md)
- [wiki/troubleshooting/phpstan-module-analysis-memory.md](wiki/troubleshooting/phpstan-module-analysis-memory.md)
- [wiki/troubleshooting/phpstan-widget-property-types-.deprecated.md](wiki/troubleshooting/phpstan-widget-property-types-.deprecated.md)
- [wiki/troubleshooting/phpstan-widget-property-types.md](wiki/troubleshooting/phpstan-widget-property-types.md)
- [wiki/troubleshooting/spatie-permission-team-model-not-configured.md](wiki/troubleshooting/spatie-permission-team-model-not-configured.md)

## Storico / da consolidare

Contenuto storico, duplicato o superato. Nessun file è stato cancellato: questa sezione serve solo a non farli comparire come documentazione corrente. Vanno consolidati o rimossi in un intervento dedicato, non in questo audit.

### Cartelle storiche in blocco

Intere cartelle di archivio/legacy/backup: contenuto non linkato file per file (volumi troppo alti), solo conteggio.

| Cartella | File .md | Nota |
|---|---|---|
| `-integration/` | 36 | set di doc integrazioni duplicato di `docs/`/`_docs/`/`_integration/` |
| `_docs/` | 19 | duplicato quasi integrale di `docs/` |
| `_integration/` | 30 | set di doc integrazioni duplicato di `docs/` |
| `archive/` | 775 | archivio storico principale del modulo |
| `bug-fixes/archive/` | 4 | archivio interno a `bug-fixes/` |
| `bug-fixes/legacy/` | 1 | legacy interno a `bug-fixes/` |
| `bugs/archive/` | 2 | archivio interno a `bugs/` |
| `console_commands/archive/` | 1 | archivio interno a `console_commands/` |
| `filament/archive/` | 2 | archivio interno a `filament/` |
| `filament/legacy/` | 1 | legacy interno a `filament/` |
| `fixes/archive/` | 4 | archivio interno a `fixes/` |
| `fixes/legacy/` | 1 | legacy interno a `fixes/` |
| `legacy/` | 143 | materiale legacy, incluso `legacy/historical/` |
| `models/models-backup/` | 1 | backup di `models/` |
| `models/models-superseded/` | 1 | versione superata di `models/` |
| `models/models-uppercase/` | 1 | variante case-only di `models/` |
| `models/models.tmp-rename/` | 1 | residuo di rinomina temporanea |
| `models/models.tmp_rename/` | 1 | residuo di rinomina temporanea (variante underscore) |
| `models/models/` | 4 | sottocartella annidata anomala (models/models/models/...) |
| `models/models_backup/` | 1 | backup di `models/` (variante underscore) |
| `models/models_superseded/` | 1 | versione superata di `models/` (variante underscore) |
| `performance/archive/` | 2 | archivio interno a `performance/` |
| `roadmap/legacy/` | 7 | roadmap superata |
| `root-md-files/` | 6 | file .md recuperati dalla root del repo durante un cleanup |
| `root-txt-files/` | 2 | file .txt rinominati .md recuperati dalla root |
| `wiki-archive/` | 114 | snapshot/mirror precedente di `wiki/` |

### Varianti duplicate a livello root (con canonico attivo)

Il file canonico è già linkato nella sezione tematica sopra. Le varianti (numerate, con underscore, con data, `.deprecated`) restano su disco ma non sono ripetute come voci di indice.

- **[00-index.md](00-index.md)** — varianti storiche: `00-INDEX.md`, `00-index-1.md`
- **[API.md](API.md)** — varianti storiche: `api.md`
- **[DATABASE-SCHEMA.md](DATABASE-SCHEMA.md)** — varianti storiche: `database-schema.md`
- **[INDEX.md](INDEX.md)** — varianti storiche: `index-1.md`, `index-2.md`, `index.md`
- **[PERFORMANCE-OPTIMIZATION.md](PERFORMANCE-OPTIMIZATION.md)** — varianti storiche: `performance-optimization.md`
- **[QMD-SETUP.md](QMD-SETUP.md)** — varianti storiche: `qmd-setup.md`
- **[QUERY-OPTIMIZATION-ANALYSIS.md](QUERY-OPTIMIZATION-ANALYSIS.md)** — varianti storiche: `QUERY_OPTIMIZATION_ANALYSIS.md`, `query-optimization-analysis-1.md`, `query-optimization-analysis-2.md`, `query-optimization-analysis-3.md`, `query-optimization-analysis-4.md`, `query-optimization-analysis-5.md`, `query-optimization-analysis.md`, `query_optimization_analysis.md`
- **[SSO-PROVIDERS-IMPLEMENTATION.md](SSO-PROVIDERS-IMPLEMENTATION.md)** — varianti storiche: `SSO_PROVIDERS_IMPLEMENTATION.md`, `sso-providers-implementation-1.md`, `sso-providers-implementation-2.md`, `sso-providers-implementation-3.md`, `sso-providers-implementation-4.md`, `sso-providers-implementation-5.md`, `sso-providers-implementation.md`, `sso_providers_implementation.md`
- **[WIDGET-RENDERING-ANALYSIS.md](WIDGET-RENDERING-ANALYSIS.md)** — varianti storiche: `WIDGET_RENDERING_ANALYSIS.md`, `widget-rendering-analysis-1.md`, `widget-rendering-analysis-2.md`, `widget-rendering-analysis-3.md`, `widget-rendering-analysis-4.md`, `widget-rendering-analysis-5.md`, `widget-rendering-analysis.md`, `widget_rendering_analysis.md`
- **[actions-path-convention.md](actions-path-convention.md)** — varianti storiche: `actions-path-convention-1.md`, `actions-path-convention-2.md`, `actions_path_convention.md`
- **[actions-structure.md](actions-structure.md)** — varianti storiche: `actions-structure-1.md`, `actions-structure-2.md`, `actions-structure-3.md`, `actions_structure.md`
- **[architecture-rules.md](architecture-rules.md)** — varianti storiche: `architecture-rules-1.md`, `architecture-rules-2.md`, `architecture_rules.md`
- **[auth-blade-structure.md](auth-blade-structure.md)** — varianti storiche: `auth-blade-structure-1.md`, `auth-blade-structure-2.md`, `auth_blade_structure.md`
- **[auth-components-best-practices.md](auth-components-best-practices.md)** — varianti storiche: `auth-components-best-practices-1.md`, `auth-components-best-practices-2.md`, `auth-components-best-practices-3.md`, `auth_components_best_practices.md`
- **[auth-login-implementation.md](auth-login-implementation.md)** — varianti storiche: `auth-login-implementation-1.md`, `auth-login-implementation-2.md`, `auth-login-implementation-3.md`, `auth_login_implementation.md`
- **[auth-logout-blade.md](auth-logout-blade.md)** — varianti storiche: `auth-logout-blade-1.md`, `auth-logout-blade-2.md`, `auth_logout_blade.md`
- **[auth-logout-implementation.md](auth-logout-implementation.md)** — varianti storiche: `auth-logout-implementation-1.md`, `auth-logout-implementation-2.md`, `auth-logout-implementation-3.md`, `auth_logout_implementation.md`
- **[auth-logout.md](auth-logout.md)** — varianti storiche: `auth-logout-1.md`, `auth-logout-2.md`, `auth_logout.md`
- **[auth-pages-implementation.md](auth-pages-implementation.md)** — varianti storiche: `auth-pages-implementation-1-1.md`, `auth-pages-implementation-1.md`, `auth-pages-implementation-2.md`, `auth_pages_implementation.md`
- **[auth-widget-rules.md](auth-widget-rules.md)** — varianti storiche: `auth-widget-rules-1.md`, `auth-widget-rules-2.md`, `auth_widget_rules.md`
- **[auth-widgets-view-namespaces.md](auth-widgets-view-namespaces.md)** — varianti storiche: `auth-widgets-view-namespaces-1.md`, `auth-widgets-view-namespaces-2.md`, `auth-widgets-view-namespaces-3.md`, `auth_widgets_view_namespaces.md`
- **[avatar-implementation.md](avatar-implementation.md)** — varianti storiche: `avatar-implementation-1-1.md`, `avatar-implementation-1.md`, `avatar-implementation-2.md`, `avatar_implementation.md`
- **[baseuser-refactoring-completed.md](baseuser-refactoring-completed.md)** — varianti storiche: `baseuser-refactoring-completed-1.md`, `baseuser-refactoring-completed-2.md`, `baseuser-refactoring-completed-2025-10-15.deprecated.md`, `baseuser-refactoring-completed-2025-10-15.md`, `baseuser-refactoring-completed-3.md`, `baseuser-refactoring-completed.deprecated.md`
- **[boost-skill-fix-summary.md](boost-skill-fix-summary.md)** — varianti storiche: `boost-skill-fix-summary-1.md`, `boost-skill-fix-summary-2.md`, `boost_skill_fix_summary.md`
- **[bugfix-phpmd-cleanup.md](bugfix-phpmd-cleanup.md)** — varianti storiche: `bugfix-phpmd-cleanup-2026-07.md`
- **[business-logic-analysis.md](business-logic-analysis.md)** — varianti storiche: `BUSINESS-LOGIC-ANALYSIS.md`, `BUSINESS_LOGIC_ANALYSIS.md`, `business-logic-analysis-1.md`, `business-logic-analysis-2.md`, `business-logic-analysis-3.md`, `business-logic-analysis-4.md`, `business-logic-analysis-5.md`, `business_logic_analysis.md`
- **[business-logic-deep-dive.md](business-logic-deep-dive.md)** — varianti storiche: `BUSINESS-LOGIC-DEEP-DIVE.md`, `BUSINESS_LOGIC_DEEP_DIVE.md`, `business-logic-deep-dive-1.md`, `business-logic-deep-dive-2.md`, `business-logic-deep-dive-3.md`, `business-logic-deep-dive-4.md`, `business-logic-deep-dive-5.md`, `business_logic_deep_dive.md`
- **[changelog.md](changelog.md)** — varianti storiche: `CHANGELOG.md`
- **[cms-link.md](cms-link.md)** — varianti storiche: `cms-link-1-1.md`, `cms-link-1.md`, `cms-link-2.md`, `cms_link.md`
- **[code-conventions.md](code-conventions.md)** — varianti storiche: `code-conventions-1.md`, `code-conventions-2.md`, `code_conventions.md`
- **[code-optimization-analysis.md](code-optimization-analysis.md)** — varianti storiche: `code-optimization-analysis-1.md`, `code-optimization-analysis-2.md`, `code_optimization_analysis.md`
- **[code-quality-analysis.md](code-quality-analysis.md)** — varianti storiche: `CODE-QUALITY-ANALYSIS.md`, `CODE_QUALITY_ANALYSIS.md`, `code-quality-analysis-1.md`, `code-quality-analysis-2.md`, `code-quality-analysis-3.md`, `code-quality-analysis-4.md`, `code-quality-analysis-5.md`, `code_quality_analysis.md`
- **[component-verification-rules.md](component-verification-rules.md)** — varianti storiche: `component-verification-rules-1.md`, `component-verification-rules-2.md`, `component-verification-rules-3.md`, `component_verification_rules.md`
- **[confidence-guidelines.md](confidence-guidelines.md)** — varianti storiche: `confidence_guidelines.md`
- **[conflict-resolution-passwordresetwidget.md](conflict-resolution-passwordresetwidget.md)** — varianti storiche: `conflict-resolution-passwordresetwidget-1.md`, `conflict-resolution-passwordresetwidget-2.md`, `conflict_resolution_passwordresetwidget.md`
- **[conflict-resolution-report.md](conflict-resolution-report.md)** — varianti storiche: `conflict-resolution-report-1.md`, `conflict-resolution-report-2.md`, `conflict_resolution_report.md`
- **[console-commands-philosophy.md](console-commands-philosophy.md)** — varianti storiche: `console-commands-philosophy-1.md`, `console-commands-philosophy-2.md`, `console_commands_philosophy.md`
- **[copilot-redundancy-audit.md](copilot-redundancy-audit.md)** — varianti storiche: `copilot-redundancy-audit-1.md`, `copilot-redundancy-audit-2026-05-25.deprecated.md`, `copilot-redundancy-audit-2026-05-25.md`, `copilot-redundancy-audit.deprecated.md`
- **[coverage-clean.md](coverage-clean.md)** — varianti storiche: `coverage_clean.md`
- **[cross-database-relations-issue.md](cross-database-relations-issue.md)** — varianti storiche: `cross-database-relations-issue-1.md`, `cross-database-relations-issue-2.md`, `cross_database_relations_issue.md`
- **[custom-login.md](custom-login.md)** — varianti storiche: `custom-login-1.md`
- **[database-errors.md](database-errors.md)** — varianti storiche: `database-errors-1.md`, `database-errors-2.md`, `database_errors.md`
- **[database-issues.md](database-issues.md)** — varianti storiche: `database-issues-1.md`, `database-issues-2.md`, `database-issues-3.md`, `database_issues.md`
- **[dentist-moderation-approach.md](dentist-moderation-approach.md)** — varianti storiche: `dentist-moderation-approach-1.md`, `dentist-moderation-approach-2.md`, `dentist_moderation_approach.md`
- **[directory-structure-checklist.md](directory-structure-checklist.md)** — varianti storiche: `directory-structure-checklist-1.md`, `directory-structure-checklist-2.md`, `directory_structure_checklist.md`
- **[documentation-standards.md](documentation-standards.md)** — varianti storiche: `documentation-standards-1.md`, `documentation-standards-2.md`, `documentation_standards.md`
- **[dry-kiss-analysis-.md](dry-kiss-analysis-.md)** — varianti storiche: `dry-kiss-analysis-.deprecated.md`
- **[dry-kiss-analysis.md](dry-kiss-analysis.md)** — varianti storiche: `dry-kiss-analysis-1.md`, `dry-kiss-analysis-2.md`, `dry-kiss-analysis-2025-10-15.deprecated.md`, `dry-kiss-analysis-2025-10-15.md`, `dry-kiss-analysis-3.md`, `dry-kiss-analysis-4.md`, `dry-kiss-analysis.deprecated.md`
- **[duplicate-methods-report.md](duplicate-methods-report.md)** — varianti storiche: `duplicate_methods_report.md`
- **[duplicate-methods.md](duplicate-methods.md)** — varianti storiche: `duplicate-methods-1.md`, `duplicate_methods.md`
- **[error-handling.md](error-handling.md)** — varianti storiche: `error-handling-1.md`, `error-handling-2.md`, `error_handling.md`
- **[filament-4x-compatibility.md](filament-4x-compatibility.md)** — varianti storiche: `filament-4x-compatibility-1-1.md`, `filament-4x-compatibility-1.md`, `filament-4x-compatibility-2.md`, `filament_4x_compatibility.md`
- **[filament-components-reference.md](filament-components-reference.md)** — varianti storiche: `filament-components-reference-1.md`, `filament-components-reference-2.md`, `filament_components_reference.md`
- **[filament-errors.md](filament-errors.md)** — varianti storiche: `filament-errors-1.md`, `filament-errors-2.md`, `filament_errors.md`
- **[filament-namespace-rules.md](filament-namespace-rules.md)** — varianti storiche: `filament-namespace-rules-1-1.md`, `filament-namespace-rules-1.md`, `filament-namespace-rules-2.md`, `filament_namespace_rules.md`
- **[filament-relation-managers.md](filament-relation-managers.md)** — varianti storiche: `filament-relation-managers-1-1.md`, `filament-relation-managers-1.md`, `filament-relation-managers-2.md`, `filament_relation_managers.md`
- **[filament-resources-organization.md](filament-resources-organization.md)** — varianti storiche: `filament-resources-organization-1.md`, `filament-resources-organization-2.md`, `filament_resources_organization.md`
- **[fullcalendar-scheduler-documentation-summary.md](fullcalendar-scheduler-documentation-summary.md)** — varianti storiche: `fullcalendar-scheduler-documentation-summary-1.md`, `fullcalendar-scheduler-documentation-summary-2.md`, `fullcalendar-scheduler-documentation-summary-3.md`, `fullcalendar_scheduler_documentation_summary.md`
- **[fullcalendar-scheduler-license-key-invalid.md](fullcalendar-scheduler-license-key-invalid.md)** — varianti storiche: `fullcalendar-scheduler-license-key-invalid-1.md`, `fullcalendar-scheduler-license-key-invalid-2.md`, `fullcalendar_scheduler_license_key_invalid.md`
- **[fullcalendar-scheduler-license-troubleshooting.md](fullcalendar-scheduler-license-troubleshooting.md)** — varianti storiche: `fullcalendar-scheduler-license-troubleshooting-1-1.md`, `fullcalendar-scheduler-license-troubleshooting-1.md`, `fullcalendar-scheduler-license-troubleshooting-2.md`, `fullcalendar_scheduler_license_troubleshooting.md`
- **[fullcalendar-scheduler-license.md](fullcalendar-scheduler-license.md)** — varianti storiche: `fullcalendar-scheduler-license-1-1.md`, `fullcalendar-scheduler-license-1.md`, `fullcalendar-scheduler-license-2.md`, `fullcalendar_scheduler_license.md`
- **[fullcalendar-scheduler-quick-reference.md](fullcalendar-scheduler-quick-reference.md)** — varianti storiche: `fullcalendar-scheduler-quick-reference-1.md`, `fullcalendar-scheduler-quick-reference-2.md`, `fullcalendar-scheduler-quick-reference-3.md`, `fullcalendar_scheduler_quick_reference.md`
- **[gdpr-compliance.md](gdpr-compliance.md)** — varianti storiche: `gdpr-compliance-1.md`, `gdpr_compliance.md`
- **[generic-user-moderation-strategy.md](generic-user-moderation-strategy.md)** — varianti storiche: `generic-user-moderation-strategy-1-1.md`, `generic-user-moderation-strategy-1.md`, `generic-user-moderation-strategy-2.md`, `generic_user_moderation_strategy.md`
- **[git-conflict-resolution.md](git-conflict-resolution.md)** — varianti storiche: `git-conflict-resolution-1.md`, `git-conflict-resolution-2.md`, `git_conflict_resolution.md`
- **[git-conflicts-resolution-.md](git-conflicts-resolution-.md)** — varianti storiche: `git-conflicts-resolution--1.md`, `git-conflicts-resolution-.deprecated.md`
- **[git-conflicts-resolution.md](git-conflicts-resolution.md)** — varianti storiche: `git-conflicts-resolution-1.md`, `git-conflicts-resolution-2.md`, `git-conflicts-resolution-2025-01-27.deprecated.md`, `git-conflicts-resolution-2025-01-27.md`, `git-conflicts-resolution-3.md`, `git-conflicts-resolution-4.md`, `git-conflicts-resolution-5.md`, `git-conflicts-resolution-6.md`, `git-conflicts-resolution.deprecated.md`, `git_conflicts_resolution.md`, `git_conflicts_resolution_2025_01_27.md`
- **[git-push-lfs-issue.md](git-push-lfs-issue.md)** — varianti storiche: `git-push-lfs-issue-2026-07-28.md`
- **[git-reset.md](git-reset.md)** — varianti storiche: `git_reset.md`
- **[hasteams-currentteam-method-choice.md](hasteams-currentteam-method-choice.md)** — varianti storiche: `hasteams-currentteam-method-choice-1.md`, `hasteams-currentteam-method-choice-2.md`, `hasteams-currentteam-method-choice-3.md`, `hasteams_currentteam_method_choice.md`
- **[hasteams-trait-analysis.md](hasteams-trait-analysis.md)** — varianti storiche: `hasteams-trait-analysis-1.md`, `hasteams-trait-analysis-2.md`, `hasteams_trait_analysis.md`
- **[hasteams-trait-duplicate-methods.md](hasteams-trait-duplicate-methods.md)** — varianti storiche: `hasteams-trait-duplicate-methods-1.md`, `hasteams-trait-duplicate-methods-2.md`, `hasteams_trait_duplicate_methods.md`
- **[hasteams-trait-filosofia-e-correzione-completa.md](hasteams-trait-filosofia-e-correzione-completa.md)** — varianti storiche: `hasteams-trait-filosofia-e-correzione-completa-1.md`, `hasteams-trait-filosofia-e-correzione-completa-2.md`, `hasteams-trait-filosofia-e-correzione-completa-3.md`, `hasteams_trait_filosofia_e_correzione_completa.md`
- **[header-components.md](header-components.md)** — varianti storiche: `header-components-1.md`, `header-components-2.md`, `header_components.md`
- **[header-language-avatar-implementation.md](header-language-avatar-implementation.md)** — varianti storiche: `header-language-avatar-implementation-1.md`, `header-language-avatar-implementation-2.md`, `header-language-avatar-implementation-3.md`, `header_language_avatar_implementation.md`
- **[header-language-selector-with-flags.md](header-language-selector-with-flags.md)** — varianti storiche: `header-language-selector-with-flags-1-1.md`, `header-language-selector-with-flags-1.md`, `header-language-selector-with-flags-2.md`, `header_language_selector_with_flags.md`
- **[implementation-plan.md](implementation-plan.md)** — varianti storiche: `implementation-plan-1.md`, `implementation-plan-2.md`, `implementation_plan.md`
- **[jetstream-vs-laraxot-philosophy.md](jetstream-vs-laraxot-philosophy.md)** — varianti storiche: `jetstream-vs-laraxot-philosophy-1-1.md`, `jetstream-vs-laraxot-philosophy-1.md`, `jetstream-vs-laraxot-philosophy-2.md`, `jetstream_vs_laraxot_philosophy.md`
- **[label-hardcoded-prevention.md](label-hardcoded-prevention.md)** — varianti storiche: `label-hardcoded-prevention-1.md`, `label-hardcoded-prevention-2.md`, `label_hardcoded_prevention.md`
- **[lang-link.md](lang-link.md)** — varianti storiche: `lang-link-1.md`, `lang-link-2.md`, `lang-link-3.md`, `lang_link.md`
- **[livewire-namespace.md](livewire-namespace.md)** — varianti storiche: `livewire-namespace-1.md`, `livewire-namespace-2.md`, `livewire_namespace.md`
- **[logging-performance.md](logging-performance.md)** — varianti storiche: `LOGGING_PERFORMANCE.md`, `logging-performance-1.md`, `logging-performance-2.md`, `logging-performance-3.md`, `logging-performance-4.md`, `logging_performance.md`
- **[login-filament-widget-error.md](login-filament-widget-error.md)** — varianti storiche: `login-filament-widget-error-1.md`, `login-filament-widget-error-2.md`, `login_filament_widget_error.md`
- **[login-widget-analysis.md](login-widget-analysis.md)** — varianti storiche: `login-widget-analysis-1.md`, `login-widget-analysis-2.md`, `login_widget_analysis.md`
- **[login-widget-conversion.md](login-widget-conversion.md)** — varianti storiche: `login-widget-conversion-1-1.md`, `login-widget-conversion-1.md`, `login-widget-conversion-2.md`, `login_widget_conversion.md`
- **[login-widget-translation-audit.md](login-widget-translation-audit.md)** — varianti storiche: `login-widget-translation-audit-1.md`, `login-widget-translation-audit-2025.md`
- **[logout-analysis.md](logout-analysis.md)** — varianti storiche: `logout-analysis-1.md`, `logout-analysis-2.md`, `logout_analysis.md`
- **[logout-blade-analysis.md](logout-blade-analysis.md)** — varianti storiche: `logout-blade-analysis-1.md`, `logout-blade-analysis-2.md`, `logout-blade-analysis-3.md`, `logout_blade_analysis.md`
- **[logout-blade-conclusions.md](logout-blade-conclusions.md)** — varianti storiche: `logout-blade-conclusions-1-1.md`, `logout-blade-conclusions-1.md`, `logout-blade-conclusions-2.md`, `logout_blade_conclusions.md`
- **[logout-blade-corrected-analysis.md](logout-blade-corrected-analysis.md)** — varianti storiche: `logout-blade-corrected-analysis-1.md`, `logout-blade-corrected-analysis-2.md`, `logout-blade-corrected-analysis-3.md`, `logout_blade_corrected_analysis.md`
- **[logout-blade-error-analysis.md](logout-blade-error-analysis.md)** — varianti storiche: `logout-blade-error-analysis-1.md`, `logout-blade-error-analysis-2.md`, `logout-blade-error-analysis-3.md`, `logout_blade_error_analysis.md`
- **[logout-blade-implementation.md](logout-blade-implementation.md)** — varianti storiche: `logout-blade-implementation-1-1.md`, `logout-blade-implementation-1.md`, `logout-blade-implementation-2.md`, `logout_blade_implementation.md`
- **[logout-blade-structure.md](logout-blade-structure.md)** — varianti storiche: `logout-blade-structure-1.md`, `logout-blade-structure-2.md`, `logout_blade_structure.md`
- **[logout-error-analysis.md](logout-error-analysis.md)** — varianti storiche: `logout-error-analysis-1-1.md`, `logout-error-analysis-1.md`, `logout-error-analysis-2.md`, `logout_error_analysis.md`
- **[logout-event-error.md](logout-event-error.md)** — varianti storiche: `logout-event-error-1-1.md`, `logout-event-error-1.md`, `logout-event-error-2.md`, `logout_event_error.md`
- **[logout-filament-widget-corrected.md](logout-filament-widget-corrected.md)** — varianti storiche: `logout-filament-widget-corrected-1.md`, `logout-filament-widget-corrected-2.md`, `logout-filament-widget-corrected-3.md`, `logout_filament_widget_corrected.md`
- **[logout-filament-widget.md](logout-filament-widget.md)** — varianti storiche: `logout-filament-widget-1.md`, `logout-filament-widget-2.md`, `logout-filament-widget-3.md`, `logout_filament_widget.md`
- **[logout-implementation-best-practices.md](logout-implementation-best-practices.md)** — varianti storiche: `logout-implementation-best-practices-1-1.md`, `logout-implementation-best-practices-1.md`, `logout-implementation-best-practices-2.md`, `logout_implementation_best_practices.md`
- **[logout-implementation-error.md](logout-implementation-error.md)** — varianti storiche: `logout-implementation-error-1.md`, `logout-implementation-error-2.md`, `logout-implementation-error-3.md`, `logout_implementation_error.md`
- **[logout-implementation-with-laravel-localization.md](logout-implementation-with-laravel-localization.md)** — varianti storiche: `logout-implementation-with-laravel-localization-1.md`, `logout-implementation-with-laravel-localization-2.md`, `logout-implementation-with-laravel-localization-3.md`, `logout_implementation_with_laravel_localization.md`
- **[logout-page-fix.md](logout-page-fix.md)** — varianti storiche: `logout-page-fix-1.md`, `logout-page-fix-2.md`, `logout_page_fix.md`
- **[logout-page-implementation.md](logout-page-implementation.md)** — varianti storiche: `logout-page-implementation-1.md`, `logout-page-implementation-2.md`, `logout-page-implementation-3.md`, `logout_page_implementation.md`
- **[logout-security.md](logout-security.md)** — varianti storiche: `logout-security-1.md`, `logout-security-2.md`, `logout_security.md`
- **[mcp-integration.md](mcp-integration.md)** — varianti storiche: `mcp-integration-1.md`, `mcp-integration-2.md`, `mcp_integration.md`
- **[mcp-server-recommended.md](mcp-server-recommended.md)** — varianti storiche: `mcp-server-recommended-1.md`, `mcp-server-recommended-2.md`, `mcp_server_recommended.md`
- **[metodi-duplicati-analisi.md](metodi-duplicati-analisi.md)** — varianti storiche: `METODI-DUPLICATI-ANALISI.md`, `METODI_DUPLICATI_ANALISI.md`, `metodi-duplicati-analisi-1.md`, `metodi-duplicati-analisi-2.md`, `metodi-duplicati-analisi-3.md`, `metodi-duplicati-analisi-4.md`, `metodi-duplicati-analisi-5.md`, `metodi_duplicati_analisi.md`
- **[metrics-dashboard.md](metrics-dashboard.md)** — varianti storiche: `metrics-dashboard-1.md`, `metrics-dashboard-2.md`, `metrics_dashboard.md`
- **[migration-best-practices.md](migration-best-practices.md)** — varianti storiche: `MIGRATION_BEST_PRACTICES.md`, `migration-best-practices-1.md`, `migration-best-practices-2.md`, `migration_best_practices.md`
- **[migration-filament.md](migration-filament.md)** — varianti storiche: `migration-filament-4.md`
- **[migrazione-filament.md](migrazione-filament.md)** — varianti storiche: `migrazione-filament-4.md`
- **[model-inheritance-analysis.md](model-inheritance-analysis.md)** — varianti storiche: `MODEL-INHERITANCE-ANALYSIS.md`, `MODEL_INHERITANCE_ANALYSIS.md`, `model-inheritance-analysis-1.md`, `model-inheritance-analysis-2.md`, `model-inheritance-analysis-3.md`, `model-inheritance-analysis-4.md`, `model-inheritance-analysis-5.md`, `model_inheritance_analysis.md`
- **[model-inheritance-fixes.md](model-inheritance-fixes.md)** — varianti storiche: `MODEL-INHERITANCE-FIXES.md`, `MODEL_INHERITANCE_FIXES.md`, `model-inheritance-fixes-1.md`, `model-inheritance-fixes-2.md`, `model-inheritance-fixes-3.md`, `model-inheritance-fixes-4.md`, `model-inheritance-fixes-5.md`, `model_inheritance_fixes.md`
- **[modelli-factory-seeder-analisi.md](modelli-factory-seeder-analisi.md)** — varianti storiche: `modelli-factory-seeder-analisi-1.md`, `modelli-factory-seeder-analisi-2.md`, `modelli_factory_seeder_analisi.md`
- **[moderation-doctor.md](moderation-doctor.md)** — varianti storiche: `moderation-doctor-1.md`, `moderation-doctor-2.md`, `moderation_doctor.md`
- **[moderation-wizard-generic.md](moderation-wizard-generic.md)** — varianti storiche: `moderation-wizard-generic-1.md`, `moderation-wizard-generic-2.md`, `moderation_wizard_generic.md`
- **[module-structure.md](module-structure.md)** — varianti storiche: `module-structure-1.md`, `module-structure-2.md`, `module_structure.md`
- **[module-user.md](module-user.md)** — varianti storiche: `module-user-1.md`
- **[namespace-conventions.md](namespace-conventions.md)** — varianti storiche: `namespace-conventions-1.md`, `namespace-conventions-2.md`, `namespace-conventions-3.md`, `namespace_conventions.md`
- **[navigation-structure.md](navigation-structure.md)** — varianti storiche: `navigation-structure-1.md`, `navigation-structure-2.md`, `navigation_structure.md`
- **[navigation-translations-fixes-january.md](navigation-translations-fixes-january.md)** — varianti storiche: `navigation-translations-fixes-january-1.md`, `navigation-translations-fixes-january-2026.md`
- **[on-demand-pattern.md](on-demand-pattern.md)** — varianti storiche: `ON-DEMAND-PATTERN.md`
- **[optimization-analysis.md](optimization-analysis.md)** — varianti storiche: `optimization-analysis-1.md`, `optimization-analysis-2.md`, `optimization_analysis.md`
- **[optimization-recommendations.md](optimization-recommendations.md)** — varianti storiche: `optimization-recommendations-1.md`, `optimization-recommendations-2.md`, `optimization_recommendations.md`
- **[pandoc_guide.md](pandoc_guide.md)** — varianti storiche: `PANDOC_GUIDE.md`
- **[parental-inheritance.md](parental-inheritance.md)** — varianti storiche: `parental-inheritance-1.md`
- **[passport-admin-actions.md](passport-admin-actions.md)** — varianti storiche: `passport-admin-actions-1.md`, `passport-admin-actions-2.md`, `passport_admin_actions.md`
- **[passport-implementation-summary.md](passport-implementation-summary.md)** — varianti storiche: `passport-implementation-summary-1.md`, `passport-implementation-summary-2.md`, `passport_implementation_summary.md`
- **[password-translation-completion.md](password-translation-completion.md)** — varianti storiche: `password-translation-completion-1.md`, `password-translation-completion-2.md`, `password-translation-completion-2025-1.md`, `password-translation-completion-2025.md`, `password_translation_completion.md`, `password_translation_completion_2025.md`
- **[path-conventions.md](path-conventions.md)** — varianti storiche: `path-conventions-1.md`, `path-conventions-2.md`, `path_conventions.md`
- **[patterns.md](patterns.md)** — varianti storiche: `PATTERNS.md`
- **[phpinsights-errors.md](phpinsights-errors.md)** — varianti storiche: `phpinsights_errors.md`
- **[phpinsights-report.md](phpinsights-report.md)** — varianti storiche: `phpinsights_report.md`
- **[phpmd-errors.md](phpmd-errors.md)** — varianti storiche: `phpmd_errors.md`
- **[phpmd-phpinsights-corrections.md](phpmd-phpinsights-corrections.md)** — varianti storiche: `phpmd-phpinsights-corrections-1.md`
- **[phpmd-report.md](phpmd-report.md)** — varianti storiche: `phpmd_report.md`
- **[phpstan-corrections-summary.md](phpstan-corrections-summary.md)** — varianti storiche: `phpstan-corrections-summary-1.md`
- **[phpstan-dry-kiss-improvements-.md](phpstan-dry-kiss-improvements-.md)** — varianti storiche: `phpstan-dry-kiss-improvements-.deprecated.md`
- **[phpstan-dry-kiss-improvements.md](phpstan-dry-kiss-improvements.md)** — varianti storiche: `phpstan-dry-kiss-improvements-1.md`, `phpstan-dry-kiss-improvements-2.md`, `phpstan-dry-kiss-improvements-2025-10-17.deprecated.md`, `phpstan-dry-kiss-improvements-2025-10-17.md`, `phpstan-dry-kiss-improvements-3.md`, `phpstan-dry-kiss-improvements.deprecated.md`
- **[phpstan-fix-plan.md](phpstan-fix-plan.md)** — varianti storiche: `PHPSTAN_FIX_PLAN.md`, `phpstan-fix-plan-1.md`, `phpstan-fix-plan-2.md`, `phpstan-fix-plan-3.md`, `phpstan-fix-plan-4.md`, `phpstan-fix-plan-5.md`, `phpstan_fix_plan.md`
- **[phpstan-fixes-.md](phpstan-fixes-.md)** — varianti storiche: `phpstan-fixes-.deprecated.md`
- **[phpstan-fixes-archive.md](phpstan-fixes-archive.md)** — varianti storiche: `phpstan-fixes-archive-1.md`
- **[phpstan-fixes-gennaio.md](phpstan-fixes-gennaio.md)** — varianti storiche: `phpstan-fixes-gennaio-1.md`, `phpstan-fixes-gennaio-2.md`, `phpstan-fixes-gennaio-2025.md`
- **[phpstan-fixes.md](phpstan-fixes.md)** — varianti storiche: `phpstan-fixes-1-1.md`, `phpstan-fixes-1.md`, `phpstan-fixes-2-1.md`, `phpstan-fixes-2.md`, `phpstan-fixes-2025-1.md`, `phpstan-fixes-2025-10-01.deprecated.md`, `phpstan-fixes-2025-10-01.md`, `phpstan-fixes-2025.md`, `phpstan-fixes-3-1.md`, `phpstan-fixes-3-2.md`, `phpstan-fixes-3.md`, `phpstan-fixes-4.md`, `phpstan-fixes-5.md`, `phpstan-fixes-6.md`, `phpstan-fixes-7.md`, `phpstan-fixes-8.md`, `phpstan-fixes.deprecated.md`, `phpstan-fixes_3.md`, `phpstan_fixes.md`, `phpstan_fixes_2025.md`
- **[phpstan-furious-debate.md](phpstan-furious-debate.md)** — varianti storiche: `phpstan-furious-debate-1.md`
- **[phpstan-relationship-fix.md](phpstan-relationship-fix.md)** — varianti storiche: `phpstan-relationship-fix-1.md`, `phpstan-relationship-fix-2.md`, `phpstan_relationship_fix.md`
- **[phpstan-roadmap.md](phpstan-roadmap.md)** — varianti storiche: `phpstan-roadmap-1.md`, `phpstan-roadmap-2.md`, `phpstan_roadmap.md`
- **[ponytail-audit.md](ponytail-audit.md)** — varianti storiche: `ponytail-audit-2026-07-02.deprecated.md`, `ponytail-audit-2026-07-02.md`, `ponytail-audit.deprecated.md`
- **[product-launch-plan.md](product-launch-plan.md)** — varianti storiche: `PRODUCT_LAUNCH_PLAN.md`, `product-launch-plan-1.md`, `product-launch-plan-2.md`, `product_launch_plan.md`
- **[product-roadmap.md](product-roadmap.md)** — varianti storiche: `PRODUCT_ROADMAP.md`, `product-roadmap-1.md`, `product-roadmap-2.md`, `product_roadmap.md`
- **[product-strategy.md](product-strategy.md)** — varianti storiche: `PRODUCT_STRATEGY.md`, `product-strategy-1.md`, `product-strategy-2.md`, `product_strategy.md`
- **[profile-management.md](profile-management.md)** — varianti storiche: `profile-management-1.md`, `profile-management-2.md`, `profile_management.md`
- **[project-structure.md](project-structure.md)** — varianti storiche: `PROJECT-STRUCTURE.md`
- **[quality-status.md](quality-status.md)** — varianti storiche: `QUALITY_STATUS.md`, `quality-status-1.md`, `quality-status-11.md`, `quality-status-2.md`, `quality-status-2025-11.md`, `quality_status.md`
- **[quality-tools-final-report.md](quality-tools-final-report.md)** — varianti storiche: `quality-tools-final-report-1.md`
- **[quality.md](quality.md)** — varianti storiche: `quality-1.md`, `quality-11.md`
- **[quality_report.md](quality_report.md)** — varianti storiche: `QUALITY_REPORT.md`
- **[quick-start.md](quick-start.md)** — varianti storiche: `QUICK-START.md`
- **[readme-fullcalendar-scheduler.md](readme-fullcalendar-scheduler.md)** — varianti storiche: `readme-fullcalendar-scheduler-1-1.md`, `readme-fullcalendar-scheduler-1.md`, `readme-fullcalendar-scheduler-2.md`, `readme_fullcalendar_scheduler.md`
- **[readme.md](readme.md)** — varianti storiche: `README.md`
- **[redundancy-analysis.md](redundancy-analysis.md)** — varianti storiche: `REDUNDANCY_ANALYSIS.md`, `redundancy_analysis.md`
- **[redundancy-audit.md](redundancy-audit.md)** — varianti storiche: `redundancy-audit-1.md`, `redundancy-audit-2026-05-21.deprecated.md`, `redundancy-audit-2026-05-21.md`, `redundancy-audit.deprecated.md`
- **[redundancy-fixes-january.md](redundancy-fixes-january.md)** — varianti storiche: `redundancy-fixes-january-1.md`, `redundancy-fixes-january-2026.md`
- **[registration-widget-fileupload-fix.md](registration-widget-fileupload-fix.md)** — varianti storiche: `registration-widget-fileupload-fix-1-1.md`, `registration-widget-fileupload-fix-1.md`, `registration-widget-fileupload-fix-2.md`, `registration_widget_fileupload_fix.md`
- **[registration-widget-update.md](registration-widget-update.md)** — varianti storiche: `registration-widget-update-1-1.md`, `registration-widget-update-1.md`, `registration-widget-update-2.md`, `registration_widget_update.md`
- **[registration-widget.md](registration-widget.md)** — varianti storiche: `registration-widget-1.md`, `registration-widget-2.md`, `registration-widget-3.md`, `registration_widget.md`
- **[resources-corrections-summary.md](resources-corrections-summary.md)** — varianti storiche: `resources-corrections-summary-1.md`
- **[roadmap.md](roadmap.md)** — varianti storiche: `roadmap-1-1.md`, `roadmap-1.md`, `roadmap-2025.md`
- **[roles-permissions.md](roles-permissions.md)** — varianti storiche: `roles-permissions-1.md`, `roles-permissions-2.md`, `roles-permissions-3.md`, `roles_permissions.md`
- **[routing-best-practices.md](routing-best-practices.md)** — varianti storiche: `routing-best-practices-1.md`, `routing-best-practices-2.md`, `routing_best_practices.md`
- **[routing-error-solution.md](routing-error-solution.md)** — varianti storiche: `routing-error-solution-1.md`, `routing-error-solution-2.md`, `routing_error_solution.md`
- **[scheduler-license-key.md](scheduler-license-key.md)** — varianti storiche: `scheduler-license-key-1.md`, `scheduler-license-key-2.md`, `scheduler_license_key.md`
- **[service-provider-warning.md](service-provider-warning.md)** — varianti storiche: `service-provider-warning-1.md`, `service-provider-warning-2.md`, `service_provider_warning.md`
- **[session-management.md](session-management.md)** — varianti storiche: `session-management-1.md`, `session-management-2.md`, `session_management.md`
- **[spatie-permission-teams-laravel.md](spatie-permission-teams-laravel.md)** — varianti storiche: `spatie-permission-teams-laravel-13.md`
- **[spatie-permissions-methods.md](spatie-permissions-methods.md)** — varianti storiche: `SPATIE-PERMISSIONS-METHODS.md`, `SPATIE_PERMISSIONS_METHODS.md`, `spatie-permissions-methods-1.md`, `spatie-permissions-methods-2.md`, `spatie-permissions-methods-3.md`, `spatie-permissions-methods-4.md`, `spatie-permissions-methods-5.md`, `spatie_permissions_methods.md`
- **[spatie-permissions.md](spatie-permissions.md)** — varianti storiche: `spatie-permissions-1.md`, `spatie-permissions-2.md`, `spatie_permissions.md`
- **[sprint-planning.md](sprint-planning.md)** — varianti storiche: `SPRINT_PLANNING.md`, `sprint-planning-1.md`, `sprint-planning-2.md`, `sprint_planning.md`
- **[status-blockers.md](status-blockers.md)** — varianti storiche: `status-blockers-2026-07-28.md`
- **[team-bindings-fix.md](team-bindings-fix.md)** — varianti storiche: `team-bindings-fix-1.md`, `team-bindings-fix-2.md`, `team-bindings-fix-3.md`, `team_bindings_fix.md`
- **[team-contract-usage-reasoning.md](team-contract-usage-reasoning.md)** — varianti storiche: `team-contract-usage-reasoning-1.md`, `team-contract-usage-reasoning-2.md`, `team_contract_usage_reasoning.md`
- **[teams-migration-laraxot-compliance.md](teams-migration-laraxot-compliance.md)** — varianti storiche: `teams-migration-laraxot-compliance-1.md`, `teams-migration-laraxot-compliance-2.md`, `teams-migration-laraxot-compliance.deprecated.md`
- **[terms-and-conditions.md](terms-and-conditions.md)** — varianti storiche: `terms-and-conditions-1.md`, `terms-and-conditions-2.md`, `terms_and_conditions.md`
- **[testing-rules.md](testing-rules.md)** — varianti storiche: `testing-rules-1.md`, `testing-rules-2.md`, `testing_rules.md`
- **[theme-translation-conflicts-resolution.md](theme-translation-conflicts-resolution.md)** — varianti storiche: `theme-translation-conflicts-resolution-1.md`, `theme-translation-conflicts-resolution-2.md`, `theme_translation_conflicts_resolution.md`
- **[timestamps-rule.md](timestamps-rule.md)** — varianti storiche: `TIMESTAMPS_RULE.md`, `timestamps_rule.md`
- **[traits-complete-guide.md](traits-complete-guide.md)** — varianti storiche: `traits-complete-guide-1-1.md`, `traits-complete-guide-1.md`, `traits-complete-guide-2.md`, `traits_complete_guide.md`
- **[translation-best-practices.md](translation-best-practices.md)** — varianti storiche: `translation-best-practices-1.md`, `translation-best-practices-2.md`, `translation_best_practices.md`
- **[translation-city-field-refactor-.md](translation-city-field-refactor-.md)** — varianti storiche: `translation-city-field-refactor-.deprecated.md`
- **[translation-city-field-refactor.md](translation-city-field-refactor.md)** — varianti storiche: `translation-city-field-refactor-1.md`, `translation-city-field-refactor-2.md`, `translation-city-field-refactor-2025-08-08.deprecated.md`, `translation-city-field-refactor-2025-08-08.md`, `translation-city-field-refactor-3.md`, `translation-city-field-refactor.deprecated.md`
- **[translation-key-prototype.md](translation-key-prototype.md)** — varianti storiche: `TRANSLATION_KEY_PROTOTYPE.md`, `translation_key_prototype.md`
- **[translation-keys-rules.md](translation-keys-rules.md)** — varianti storiche: `translation-keys-rules-1.md`, `translation-keys-rules-2.md`, `translation_keys_rules.md`
- **[translation-syntax-fixes.md](translation-syntax-fixes.md)** — varianti storiche: `translation-syntax-fixes-1.md`, `translation-syntax-fixes-2025.md`
- **[two-factor.md](two-factor.md)** — varianti storiche: `two-factor-1.md`, `two-factor-2.md`, `two_factor.md`
- **[updates.md](updates.md)** — varianti storiche: `updates-1.md`, `updates-12.md`, `updates-2025.md`
- **[user-factory-advanced-integration.md](user-factory-advanced-integration.md)** — varianti storiche: `user-factory-advanced-integration-1.md`, `user-factory-advanced-integration-2.md`, `user-factory-advanced-integration-3.md`, `user_factory_advanced_integration.md`
- **[user-factory-complete-ecosystem-integration.md](user-factory-complete-ecosystem-integration.md)** — varianti storiche: `user-factory-complete-ecosystem-integration-1-1.md`, `user-factory-complete-ecosystem-integration-1.md`, `user-factory-complete-ecosystem-integration-2.md`, `user_factory_complete_ecosystem_integration.md`
- **[user-factory-integration.md](user-factory-integration.md)** — varianti storiche: `user-factory-integration-1-1.md`, `user-factory-integration-1.md`, `user-factory-integration-2.md`, `user_factory_integration.md`
- **[user-invitation.md](user-invitation.md)** — varianti storiche: `user-invitation-1.md`, `user-invitation-2.md`, `user_invitation.md`
- **[user-moderation-strategy.md](user-moderation-strategy.md)** — varianti storiche: `user-moderation-strategy-1.md`, `user-moderation-strategy-2.md`, `user-moderation-strategy-3.md`, `user_moderation_strategy.md`
- **[user-research.md](user-research.md)** — varianti storiche: `USER_RESEARCH.md`, `user-research-1.md`, `user-research-2.md`, `user_research.md`
- **[userfactory-advanced-implementation-complete.md](userfactory-advanced-implementation-complete.md)** — varianti storiche: `userfactory-advanced-implementation-complete-1.md`, `userfactory-advanced-implementation-complete-2.md`, `userfactory_advanced_implementation_complete.md`
- **[volt-blade-implementation-error.md](volt-blade-implementation-error.md)** — varianti storiche: `volt-blade-implementation-error-1.md`, `volt-blade-implementation-error-2.md`, `volt-blade-implementation-error-3.md`, `volt_blade_implementation_error.md`
- **[volt-blade-implementation.md](volt-blade-implementation.md)** — varianti storiche: `volt-blade-implementation-1.md`, `volt-blade-implementation-2.md`, `volt-blade-implementation-3.md`, `volt_blade_implementation.md`
- **[volt-errors.md](volt-errors.md)** — varianti storiche: `volt-errors-1.md`, `volt-errors-2.md`, `volt_errors.md`
- **[volt-folio-auth-implementation.md](volt-folio-auth-implementation.md)** — varianti storiche: `volt-folio-auth-implementation-1.md`, `volt-folio-auth-implementation-2.md`, `volt-folio-auth-implementation-3.md`, `volt_folio_auth_implementation.md`
- **[volt-folio-error.md](volt-folio-error.md)** — varianti storiche: `volt-folio-error-1.md`, `volt-folio-error-2.md`, `volt_folio_error.md`
- **[volt-folio-logout-debug.md](volt-folio-logout-debug.md)** — varianti storiche: `volt-folio-logout-debug-1.md`, `volt-folio-logout-debug-2.md`, `volt_folio_logout_debug.md`
- **[volt-folio-logout-error.md](volt-folio-logout-error.md)** — varianti storiche: `volt-folio-logout-error-1.md`, `volt-folio-logout-error-2.md`, `volt-folio-logout-error-3.md`, `volt_folio_logout_error.md`
- **[volt-folio-logout.md](volt-folio-logout.md)** — varianti storiche: `volt-folio-logout-1-1.md`, `volt-folio-logout-1.md`, `volt-folio-logout-2.md`, `volt_folio_logout.md`
- **[volt-logout-action.md](volt-logout-action.md)** — varianti storiche: `volt-logout-action-1.md`, `volt-logout-action-2.md`, `volt_logout_action.md`
- **[volt-logout.md](volt-logout.md)** — varianti storiche: `volt-logout-1.md`, `volt-logout-2.md`, `volt_logout.md`
- **[volt-missing-directive.md](volt-missing-directive.md)** — varianti storiche: `volt-missing-directive-1.md`, `volt-missing-directive-2.md`, `volt_missing_directive.md`
- **[widget-translation-rules.md](widget-translation-rules.md)** — varianti storiche: `widget-translation-rules-1.md`, `widget-translation-rules-2.md`, `widget-translation-rules-3.md`, `widget_translation_rules.md`
- **[widgets-structure.md](widgets-structure.md)** — varianti storiche: `widgets-structure-1.md`, `widgets-structure-2.md`, `widgets_structure.md`

### Varianti duplicate nelle sottocartelle

#### `architecture/`

- **[architecture/README.md](architecture/README.md)** — varianti storiche: `readme.md`

#### `bug-fixes/`

- **[bug-fixes/parse-error-orphan-methods-.md](bug-fixes/parse-error-orphan-methods-.md)** — varianti storiche: `parse-error-orphan-methods-.deprecated.md`
- **[bug-fixes/parse-error-orphan-methods.md](bug-fixes/parse-error-orphan-methods.md)** — varianti storiche: `parse-error-orphan-methods-2.md`, `parse-error-orphan-methods-1.md`, `parse-error-orphan-methods.deprecated.md`, `parse-error-orphan-methods-2025-01-27.md`, `parse-error-orphan-methods-3.md`, `parse-error-orphan-methods-1-1.md`, `parse-error-orphan-methods-2025-01-27.deprecated.md`

#### `bugs/`

- **[bugs/testing.md](bugs/testing.md)** — varianti storiche: `TESTING.md`

#### `commands/`

- **[commands/console-commands-philosophy.md](commands/console-commands-philosophy.md)** — varianti storiche: `console_commands_philosophy.md`

#### `console-commands/`

- **[console-commands/README.md](console-commands/README.md)** — varianti storiche: `readme.md`

#### `console_commands/`

- **[console_commands/console-commands-philosophy.md](console_commands/console-commands-philosophy.md)** — varianti storiche: `console-commands-philosophy-2.md`, `console_commands_philosophy.md`, `console-commands-philosophy-1-1.md`, `console-commands-philosophy-1.md`
- **[console_commands/README.md](console_commands/README.md)** — varianti storiche: `readme.md`

#### `database/`

- **[database/migration-safety-rules.md](database/migration-safety-rules.md)** — varianti storiche: `migration_safety_rules.md`, `MIGRATION_SAFETY_RULES.md`, `migration-safety-rules-1.md`
- **[database/profile-uuid-philosophy.md](database/profile-uuid-philosophy.md)** — varianti storiche: `PROFILE_UUID_PHILOSOPHY.md`, `profile-uuid-philosophy-1.md`, `profile_uuid_philosophy.md`

#### `docs/`

- **[docs/confidence-guidelines.md](docs/confidence-guidelines.md)** — varianti storiche: `confidence_guidelines.md`

#### `filament/`

- **[filament/teams-relation-manager.md](filament/teams-relation-manager.md)** — varianti storiche: `teams-relation-manager-1.md`, `teams_relation_manager.md`, `teams-relation-manager-2.md`, `teams-relation-manager-3.md`
- **[filament/filament-table-columns.md](filament/filament-table-columns.md)** — varianti storiche: `filament-table-columns-3.md`, `filament-table-columns-1.md`, `filament_table_columns.md`, `filament-table-columns-2.md`

#### `fixes/`

- **[fixes/base-classes-corrections.md](fixes/base-classes-corrections.md)** — varianti storiche: `base-classes-corrections-2.md`, `base-classes-corrections.deprecated.md`, `base-classes-corrections-3.md`, `base-classes-corrections-2025-10-15.md`, `base-classes-corrections-2025-10-15.deprecated.md`, `base-classes-corrections-1.md`
- **[fixes/base-classes-corrections-.md](fixes/base-classes-corrections-.md)** — varianti storiche: `base-classes-corrections-.deprecated.md`
- **[fixes/phpstan-fixes.md](fixes/phpstan-fixes.md)** — varianti storiche: `phpstan-fixes-1.md`

#### `llm-wiki/`

- **[llm-wiki/agents.md](llm-wiki/agents.md)** — varianti storiche: `AGENTS.md`

#### `models/`

- **[models/README.md](models/README.md)** — varianti storiche: `readme.md`

#### `performance/`

- **[performance/authentication-performance-optimization.md](performance/authentication-performance-optimization.md)** — varianti storiche: `AUTHENTICATION-PERFORMANCE-OPTIMIZATION.md`, `authentication-performance-optimization-2.md`, `authentication-performance-optimization-1.md`, `AUTHENTICATION_PERFORMANCE_OPTIMIZATION.md`, `authentication-performance-optimization-4.md`, `authentication_performance_optimization.md`, `authentication-performance-optimization-3.md`, `authentication-performance-optimization-5.md`

#### `raw/root-import/`

- **[raw/root-import/git-reset.md](raw/root-import/git-reset.md)** — varianti storiche: `git-reset-2.md`, `git-reset-1.md`
- **[raw/root-import/changelog.md](raw/root-import/changelog.md)** — varianti storiche: `changelog-7.md`, `changelog-3.md`, `changelog-1.md`, `changelog-2.md`, `changelog-5.md`, `changelog-4.md`, `changelog-8.md`, `changelog-6.md`
- **[raw/root-import/pest-test-report.md](raw/root-import/pest-test-report.md)** — varianti storiche: `pest-test-report-2.md`, `pest-test-report-1.md`

#### `roadmap/`

- **[roadmap/risks.md](roadmap/risks.md)** — varianti storiche: `risks-1.md`
- **[roadmap/00-index.md](roadmap/00-index.md)** — varianti storiche: `00-index-1.md`, `00-INDEX.md`
- **[roadmap/q4-roadmap.md](roadmap/q4-roadmap.md)** — varianti storiche: `q4-roadmap-1.md`

#### `wiki/`

- **[wiki/schema.md](wiki/schema.md)** — varianti storiche: `SCHEMA.md`
- **[wiki/twofactorauthentication.md](wiki/twofactorauthentication.md)** — varianti storiche: `TwoFactorAuthentication.md`
- **[wiki/uservsprofile.md](wiki/uservsprofile.md)** — varianti storiche: `UserVsProfile.md`
- **[wiki/agents.md](wiki/agents.md)** — varianti storiche: `AGENTS.md`
- **[wiki/auth-patterns.md](wiki/auth-patterns.md)** — varianti storiche: `AUTH-PATTERNS.md`
- **[wiki/architecture.md](wiki/architecture.md)** — varianti storiche: `Architecture.md`

#### `wiki/commands/`

- **[wiki/commands/index.md](wiki/commands/index.md)** — varianti storiche: `INDEX.md`

#### `wiki/concepts/`

- **[wiki/concepts/index.md](wiki/concepts/index.md)** — varianti storiche: `INDEX.md`

#### `wiki/decisions/`

- **[wiki/decisions/contracts-and-lang-backup-archival.md](wiki/decisions/contracts-and-lang-backup-archival.md)** — varianti storiche: `contracts-and-lang-backup-archival-2026-06-30.deprecated.md`, `contracts-and-lang-backup-archival-2026-06-30.md`, `contracts-and-lang-backup-archival.deprecated.md`

#### `wiki/integrations/`

- **[wiki/integrations/phpstan_status.md](wiki/integrations/phpstan_status.md)** — varianti storiche: `PHPSTAN_STATUS.md`
- **[wiki/integrations/business-logic-analysis.md](wiki/integrations/business-logic-analysis.md)** — varianti storiche: `BUSINESS-LOGIC-ANALYSIS.md`, `business_logic_analysis.md`, `BUSINESS_LOGIC_ANALYSIS.md`
- **[wiki/integrations/query-optimization-analysis.md](wiki/integrations/query-optimization-analysis.md)** — varianti storiche: `QUERY-OPTIMIZATION-ANALYSIS.md`
- **[wiki/integrations/phpstan_l10.md](wiki/integrations/phpstan_l10.md)** — varianti storiche: `PHPSTAN_L10.md`
- **[wiki/integrations/code-quality-analysis.md](wiki/integrations/code-quality-analysis.md)** — varianti storiche: `CODE-QUALITY-ANALYSIS.md`
- **[wiki/integrations/on-demand-pattern.md](wiki/integrations/on-demand-pattern.md)** — varianti storiche: `ON-DEMAND-PATTERN.md`
- **[wiki/integrations/spatie-permissions-methods.md](wiki/integrations/spatie-permissions-methods.md)** — varianti storiche: `SPATIE-PERMISSIONS-METHODS.md`
- **[wiki/integrations/sso-providers-implementation.md](wiki/integrations/sso-providers-implementation.md)** — varianti storiche: `SSO-PROVIDERS-IMPLEMENTATION.md`
- **[wiki/integrations/model-inheritance-fixes.md](wiki/integrations/model-inheritance-fixes.md)** — varianti storiche: `MODEL_INHERITANCE_FIXES.md`, `MODEL-INHERITANCE-FIXES.md`, `model_inheritance_fixes.md`
- **[wiki/integrations/model-inheritance-analysis.md](wiki/integrations/model-inheritance-analysis.md)** — varianti storiche: `MODEL-INHERITANCE-ANALYSIS.md`
- **[wiki/integrations/business-logic-deep-dive.md](wiki/integrations/business-logic-deep-dive.md)** — varianti storiche: `BUSINESS-LOGIC-DEEP-DIVE.md`
- **[wiki/integrations/widget-rendering-analysis.md](wiki/integrations/widget-rendering-analysis.md)** — varianti storiche: `WIDGET-RENDERING-ANALYSIS.md`
- **[wiki/integrations/architecture.md](wiki/integrations/architecture.md)** — varianti storiche: `ARCHITECTURE.md`

#### `wiki/integrations/_da-riconciliare/`

- **[wiki/integrations/_da-riconciliare/index.md](wiki/integrations/_da-riconciliare/index.md)** — varianti storiche: `INDEX.md`
- **[wiki/integrations/_da-riconciliare/project-structure.divergenza.md](wiki/integrations/_da-riconciliare/project-structure.divergenza.md)** — varianti storiche: `project-structure.DIVERGENZA.md`
- **[wiki/integrations/_da-riconciliare/index.divergenza.md](wiki/integrations/_da-riconciliare/index.divergenza.md)** — varianti storiche: `INDEX.DIVERGENZA.md`
- **[wiki/integrations/_da-riconciliare/testing.md](wiki/integrations/_da-riconciliare/testing.md)** — varianti storiche: `TESTING.md`
- **[wiki/integrations/_da-riconciliare/phpinsights-errors.DIVERGENZA.md](wiki/integrations/_da-riconciliare/phpinsights-errors.DIVERGENZA.md)** — varianti storiche: `phpinsights-errors.divergenza.md`
- **[wiki/integrations/_da-riconciliare/testing.divergenza.md](wiki/integrations/_da-riconciliare/testing.divergenza.md)** — varianti storiche: `TESTING.DIVERGENZA.md`

#### `wiki/memories/`

- **[wiki/memories/index.md](wiki/memories/index.md)** — varianti storiche: `INDEX.md`
- **[wiki/memories/phpstan-belongstomany-covariance.md](wiki/memories/phpstan-belongstomany-covariance.md)** — varianti storiche: `phpstan-belongstomany-covariance.deprecated.md`, `phpstan-belongstomany-covariance-2026-07-06.deprecated.md`, `phpstan-belongstomany-covariance-2026-07-06.md`

#### `wiki/product/_da-riconciliare/`

- **[wiki/product/_da-riconciliare/index.md](wiki/product/_da-riconciliare/index.md)** — varianti storiche: `INDEX.md`

#### `wiki/rules/`

- **[wiki/rules/index.md](wiki/rules/index.md)** — varianti storiche: `INDEX.md`

#### `wiki/skills/`

- **[wiki/skills/index.md](wiki/skills/index.md)** — varianti storiche: `INDEX.md`

#### `wiki/troubleshooting/`

- **[wiki/troubleshooting/phpstan-widget-property-types.md](wiki/troubleshooting/phpstan-widget-property-types.md)** — varianti storiche: `phpstan-widget-property-types-2026-05-06.deprecated.md`, `phpstan-widget-property-types-2026-05-06.md`, `phpstan-widget-property-types-1.md`, `phpstan-widget-property-types.deprecated.md`
- **[wiki/troubleshooting/git-merge-conflict-inventory.md](wiki/troubleshooting/git-merge-conflict-inventory.md)** — varianti storiche: `git-merge-conflict-inventory.deprecated.md`, `git-merge-conflict-inventory-1.md`, `git-merge-conflict-inventory-2026-04-28.deprecated.md`, `git-merge-conflict-inventory-2026-04-28.md`

### File con nome anomalo o corrotto

Nomi probabilmente danneggiati da un refuso di uno script di normalizzazione precedente (sillabe mancanti: `dry`, `database`, `doctor`, `debate`, `duplicate`, `primary`, `separation`...). Il contenuto duplica quasi certamente un argomento già coperto da un file con nome corretto altrove in questo indice. Da verificare manualmente prima di qualsiasi consolidamento.

- `analisi-metodiuplicati.md`
- `baseuser-refactoring-completed-.md`
- `baseuser-refactoringd.md`
- `baseuser-spatieuplicates.md`
- `baseuserry-violation.md`
- `business-logiceepive.md`
- `chartjsatalabels-user-integration.md`
- `crossatabase-relations.md`
- `dor-registration-widget.md`
- `dor-registration.md`
- `emailor-registration.md`
- `filament-resources-philosophicalebate.md`
- `hasteams-traituplicate-methods.md`
- `jss.md`
- `limesurveyatabase-commands.md`
- `mcpatabase-tools.md`
- `metodiuplicati-analisi.md`
- `metricsashboard.md`
- `migration-priy-key.md`
- `migrationuplicate-resolution.md`
- `moderationor.md`
- `navigation-translationses.md`
- `oauth-cluster-ision-making.md`
- `optimizationry-kiss.md`
- `ottimizzazioni-superry-kiss.md`
- `ottimizzazioniry-kiss.md`
- `passport-cluster-innerebate.md`
- `passport-managementebate.md`
- `phpinsightss.md`
- `phpmds.md`
- `phpstan-array-typeses.md`
- `phpstan-furiousebate.md`
- `phpstan-level10es.md`
- `phpstan-level9es.md`
- `phpstan-resolutionebate.md`
- `phpstan-syntaxes.md`
- `phpstanebate.md`
- `phpstanes.md`
- `phpstanry-kiss-improvements.md`
- `phpstans-resolution.md`
- `phpstans.md`
- `redundancyes.md`
- `syntaxs-to.md`
- `team-user-composite-priy-key.md`
- `traits-hasteams-analisi-corretta.md`
- `traits-hasteams-analysis-corretta.md`
- `traits-hasteams-corretta.md`
- `translation-syntaxes.md`
- `translationes.md`
- `user-profile-aration.md`

### Snapshot datati, deprecati o con hash di conflitto residuo

File auto-descritti come `.deprecated`, snapshot con data nel nome, o residui con hash di conflitto git nel nome.

- `2025-12-01-teams-migration-laraxot-compliance.md` (dated-snapshot)
- `copilot-redundancy-audit-.deprecated.md` (deprecated)
- `dry-kiss-018b09.md` (conflict-hash-artifact)
- `dry-kiss-analysis-conflict-018b09.md` (conflict-hash-artifact)
- `git-conflicts-resolution-conflict-06cb77.md` (conflict-hash-artifact)
- `gits-resolution-06cb77.md` (conflict-hash-artifact)
- `lfs_resolution_2026_07_28.md` (dated-snapshot)
- `phpstan-fixes-conflict-276dc0.md` (conflict-hash-artifact)
- `phpstan-fixes-conflict-2e.md` (conflict-hash-artifact)
- `phpstanes-276dc0.md` (conflict-hash-artifact)
- `phpstanes-2e.md` (conflict-hash-artifact)
- `ponytail-audit-.deprecated.md` (deprecated)
- `quality_gates_2026_07_28.md` (dated-snapshot)
- `redundancy-audit-.deprecated.md` (deprecated)

### Cluster duplicati senza rappresentante pulito

Gruppi in cui anche il file "canonico" ha un nome anomalo o è uno snapshot: l'intero cluster è storico, nessun file è stato promosso a voce di indice.

- `baseuser-refactoring-completed-.md` — con varianti: `baseuser-refactoring-completed-.deprecated.md`
- `lfs_resolution_2026_07_28.md` — con varianti: `LFS_RESOLUTION_2026_07_28.md`
- `phpstanes.md` — con varianti: `phpstanes-1.md`, `phpstanes-2.md`, `phpstanes-3.md`
- `quality_gates_2026_07_28.md` — con varianti: `QUALITY_GATES_2026_07_28.md`
- `traits-hasteams-analisi-corretta.md` — con varianti: `traits-hasteams-analisi-corretta-1.md`, `traits-hasteams-analisi-corretta-2.md`, `traits-hasteams-analisi-corretta-3.md`, `traits_hasteams_analisi_corretta.md`

### Altro contenuto ambiguo

- `outputs/README.md` — README isolato senza contesto di modulo/argomento chiaro, da verificare.
