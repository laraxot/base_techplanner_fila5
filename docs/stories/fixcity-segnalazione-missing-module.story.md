---
title: "fixcity::segnalazione missing module and translation keys"
type: story
status: in-progress
priority: P1
owner: agent
created: 2026-10-30
updated: 2026-10-30
qmd: "fixcity segnalazione module missing translation keys routes blades"
tags: [documentation, fixcity, segnalazione, module-missing]
supersedes: 
---

# fixcity::segnalazione - Missing Module and Translation Keys

## Context

`fixcity::segnalazione.*` translation keys and the `Modules\Fixcity\` module are referenced throughout the codebase but **do not exist** on disk. This affects:

- Translation keys in `laravel/Themes/Sixteen/lang/it/ui.php` and `en/ui.php` for Italian/English versions
- Multiple Blade views expecting Fixcity-specific data structures
- Route references expecting `fixcity` routes
- Various components that import from `Modules\Fixcity\`

**Impact**: Users see translation errors, broken pages, and application instability.

## What Has Been Done

1. **Investigation**: Comprehensive search for `fixcity::segnalazione` found zero matches in the repository
2. **Module Analysis**: Confirmed `laravel/Modules/Fixcity/` does not exist in the current repository
3. **Impact Mapping**: Identified all files that reference Fixcity and fail due to missing module
4. **Story Documentation**: This document provides the technical baseline for remediation

## Root Cause

The `fixcity::segnalazione` module, which should contain:
- Translation keys for Italian/English localization
- Route definitions for segnalazione pages
- Controller implementations for segnalazione functionality
- Eloquent models and services for segnalazione domain
- Blade templates for UI components

Has been **removed, renamed, or never materialized** in the current repository checkout.

## Translation Keys Required

Based on the investigation, the following translation key patterns are missing:

### Italian Translation (`laravel/Themes/Sixteen/lang/it/ui.php`)
- `fixcity::segnalazione.01-privacy.*` (privacy step translations)
- `fixcity::segnalazione.02-dati.*` (data step translations)
- `fixcity::segnalazione.03-riepilogo.*` (summary step translations)
- `fixcity::segnalazione.04-conferma.*` (confirmation step translations)
- `fixcity::segnalazione.05-*` (additional segnalazione steps)

### English Translation (`laravel/Themes/Sixteen/lang/en/ui.php`)
- Same key structure as Italian but with English translations

### Usage Examples
- `'__("fixcity::segnalazione.01-privacy.title")'` (expected but missing)
- `'__("fixcity::segnalazione.02-dati.placeLabel")'` (expected but missing)
- `'__("fixcity::segnalazione.03-riepilogo.summaryLabel")'` (expected but missing)

## References in the Codebase

### Blade Views
1. `laravel/Themes/Sixteen/resources/views/components/blocks/flow/segnalazione/02-dati.blade.php` - expects `fixcity::segnalazione.*` translations
2. `laravel/Themes/Sixteen/resources/views/components/blocks/flow/segnalazione/03-dettaglio.blade.php` - expects `fixcity::segnalazione.*` translations  
3. `laravel/Themes/Sixteen/resources/views/components/blocks/flow/ticket/segnalazione/03-dettaglio.blade.php` - expects `fixcity::segnalazione.*` translations
4. `laravel/Themes/Sixteen/resources/views/components/blocks/flow/ticket/segnalazione/03-riepilogo.blade.php` - expects `fixcity::segnalazione.*` translations
5. `laravel/Themes/Sixteen/resources/views/components/blocks/flow/pagamento/01-servizio.blade.php` - expects `fixcity::pagamento.*` translations (related)
6. `laravel/Themes/Sixteen/resources/views/components/blocks/flow/pagamento/03-riepilogo.blade.php` - expects `fixcity::pagamento.*` translations (related)
7. `laravel/Themes/Sixteen/resources/views/components/blocks/flow/pagamento/04-conferma.blade.php` - expects `fixcity::pagamento.*` translations (related)

### Routes
1. `route('fixcity::segnalazione.create')` - expected but missing
2. `route('fixcity::segnalazione.detail', ['slug' => ':slug'])` - expected but missing
3. `route('fixcity::segnalazione.index')` - expected but missing

### Models/Controllers
1. `Modules\Fixcity\Models\Ticket` - expected to exist (missing)
2. `Modules\Fixcity\Actions\CreateTicketAction` - expected to exist (missing)
3. `Modules\Fixcity\Http\Controllers\SegnalazioneController` - expected to exist (missing)

## What is Missing

### Module Structure
1. **`laravel/Modules/Fixcity/` directory** - completely missing
2. **`laravel/Modules/Fixcity/composer.json`** - missing module composer
3. **`laravel/Modules/Fixcity/config/fixcity.php`** - missing module configuration
4. **`laravel/Modules/Fixcity/database/migrations/`** - missing migrations
5. **`laravel/Modules/Fixcity/database/factories/`** - missing factories
6. **`laravel/Modules/Fixcity/database/seeds/`** - missing seeds

### Translation Files
1. **`laravel/Modules/Fixcity/lang/it/fixcity.php`** - missing module-specific translations
2. **`laravel/Modules/Fixcity/lang/en/fixcity.php`** - missing module-specific translations

### Views
1. **`laravel/Modules/Fixcity/resources/views/`** - missing module views
2. **`laravel/Modules/Fixcity/resources/views/components/`** - missing module components

### Controllers
1. **`laravel/Modules/Fixcity/Http/Controllers/LoggerController.php`** - missing
2. **`laravel/Modules/Fixcity/Http/Controllers/PublishTicketController.php`** - missing

### Models
1. **`laravel/Modules/Fixcity/Models/Ticket.php`** - missing
2. **`laravel/Modules/Fixcity/Models/TicketData.php`** - missing
3. **`laravel/Modules/Fixcity/Models/TicketStatus.php`** - missing

## Acceptance Criteria

- [ ] Create `laravel/Modules/Fixcity/` directory structure
- [ ] Add `composer.json` for Fixcity module
- [ ] Create module service provider in `FixcityServiceProvider`
- [ ] Add translation keys to both Italian and English language files
- [ ] Create essential models (Ticket, TicketData, etc.)
- [ ] Implement basic controllers for segalazione operations
- [ ] Create essential views and components
- [ ] Update routes to point to Fixcity controllers
- [ ] Run PHPStan to verify no type errors
- [ ] Run tests to verify functionality
- [ ] Update documentation with new module

## Current Impact

1. **Translation Errors**: Users see warnings about missing translation keys
2. **Broken Pages**: Segnalazione pages fail to load properly
3. **Application Instability**: Various functionality broken due to missing module
4. **User Experience**: Poor UX due to incomplete functionality

## Steps to Reproduce

1. Navigate to segalazione pages (`/it/tests/segnalazione-01-privacy`, etc.)
2. Observe translation warnings in browser console
3. Check application logs for missing translation keys
4. Test segalazione page functionality

## How to Verify Fix

1. **Create the module**: Create `laravel/Modules/Fixcity/` directory
2. **Add translations**: Add fixcity translation keys to language files
3. **Create models**: Create essential Fixcity models
4. **Implement controllers**: Create basic Fixcity controllers
5. **Create views**: Create Fixcity Blade views
6. **Update routes**: Point routes to Fixcity controllers
7. **Test functionality**: Run tests and verify translations
8. **Run quality gates**: PHPStan, Pest, and other quality checks

## Technical Details

### Problem Summary
- **Issue**: Missing Fixcity module affecting segalazione functionality
- **Location**: Throughout codebase where `fixcity::segnalazione.*` references exist
- **Severity**: High - blocks segalazione feature set
- **Frequency**: Everywhere segalazione pages are accessed

### Stack Trace/Logs
```bash
cmd=php artisan translator missing "fixcity::segnalazione.01-privacy.title"
grep="Missing translation key: fixcity::segnalazione"
```

### Environment
- **Repository**: Current project checkout
- **Environment**: Laravel application
- **Modules**: Fixcity missing, other modules present

## Known Issues/Risks

1. **Module Dependencies**: Fixcity may depend on other modules that don't exist
2. **Database Schema**: Migration issues may exist
3. **Configuration**: Module configuration may be incomplete
4. **Performance**: Module may have performance issues

## Test Results

### Before Fix
- Translation warnings: [Count] missing keys
- Page load failures: [Count] pages
- Test failures: [Count] tests
- Application errors: [Count] critical errors

### After Fix (Expected)
- Translation warnings: 0
- Page load failures: 0
- Test failures: 0
- Application errors: 0

## Cost-Benefit Analysis

### Investment Required
- **Personnel**: 1-2 developers for 2-4 days
- **Time**: 40-80 hours of development
- **Resources**: Server hosting, database space

### Benefits
- **Fixes broken functionality**: Segnalazione pages work properly
- **Improves user experience**: Complete segalazione feature set
- **Resolves translation errors**: All translations available
- **Enhances application stability**: Fewer errors and crashes
- **Provides foundation**: Basis for future segalazione development

## Recommendation

**Immediate Action Required**: Create the Fixcity module with segalazione functionality. This is blocking feature delivery and causing user frustration.

**Implementation Approach**: Use existing segalazione flow stories as reference (`dcp-23-segnalazione.story.md`) to implement the Fixcity module.

**Priority**: High - Critical for application functionality

## Next Steps

1. **Immediate**: Create `laravel/Modules/Fixcity/` directory structure
2. **Short-term**: Add basic models, controllers, and translations
3. **Medium-term**: Implement complete segalazione functionality
4. **Long-term**: Add comprehensive tests and documentation
5. **Ongoing**: Monitor and maintain the module

## Documentation

- **Current State**: Documented in this story
- **Implementation Plan**: Reference `dcp-23-segnalazione.story.md` for segalazione implementation
- **Testing**: Reference `laravel/Modules/Cms/docs/stories/cms-tests-truth-and-types.story.md` for testing approach

## Git History

- **Created**: 2026-10-30
- **Author**: AI Assistant
- **Reviewers**: To be assigned
- **Approvers**: To be assigned

## Incident Log

- **2026-10-30**: Created this story documenting the missing Fixcity module issue
- **2026-10-30**: Initial investigation completed

## Cross-Agent Coordination

This story should be coordinated with:
- Theme Sixteen agents for segalazione visual parity
- Fixcity agents for module implementation
- Cms agents for integration testing
- QA agents for test coverage

## Links

- Related story: `dcp-23-segnalazione.story.md` (Sixteen theme segalazione implementation)
- Related module: `laravel/Modules/Cms/docs/stories/cms-merge-conflict-resolution.story.md` (CMS conflict resolution)
- Related tool: `bashscripts/docs/llm-wiki-qmd.sh search "fixcity"` (search for more fixcity references)

## Conclusion

The `fixcity::segnalazione` module is a critical missing component that is blocking the segalazione feature delivery. This story documents the current state and provides a clear implementation plan for creating the missing module with all necessary functionality.