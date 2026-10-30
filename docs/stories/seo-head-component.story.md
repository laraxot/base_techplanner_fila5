---
title: "Seo Head component implementation"
type: story
status: in-progress
priority: P1
owner: agent
created: 2026-10-30
updated: 2026-10-30
qmd: "seo head component meta tags schema alpine dark-mode"
tags: [seo, head, component, blade, meta-tags, schema, dark-mode]
supersedes: 
---

# Seo Head component implementation

## Context

The project requires a reusable SEO-optimized Blade component that generates the complete `<head>` section with full meta tags, schema.org JSON-LD, dark mode support, Alpine.js integration, and FOUC prevention. This component should be available in the `laravel/Modules/Seo/` module and integrate with the existing codebase including the Sixteen theme.

Currently, the codebase has a basic Head component in `laravel/Modules/Cms/` but lacks the comprehensive SEO features required for modern web applications.

## What Has Been Done

1. **Investigation**: Analyzed existing Cms Head component and determined requirements for comprehensive SEO implementation
2. **Implementation**: Created the SEO Head component in `laravel/Modules/Seo/app/View/Components/Head.php`
3. **View Template**: Created the Blade view `laravel/Modules/Seo/resources/views/components/head.blade.php`
4. **Component Metadata**: Created `_components.json` for component discovery

## Root Cause

The existing Head component in Cms module lacks:
- Schema.org WebSite structured data generation
- Dark mode inline script with preference persistence
- Alpine.js bootstrap integration
- Critical CSS for FOUC prevention
- x-layouts.seo-links placeholder for theme-specific links
- Full Open Graph and Twitter Card meta tag sets
- Proper integration with Laravel Head facade

## Implementation Details

### Component: `laravel/Modules/Seo/app/View/Components/Head.php`

The `Head` component accepts the following properties:

| Property | Type | Description |
|----------|------|-------------|
| `title` | `string` | Page title for browser tab and SEO |
| `description` | `string` | Meta description for search engines |
| `url` | `string` | Canonical URL for the page |
| `image` | `string` | Open Graph and Twitter image |
| `siteName` | `string` | Site name for Open Graph |
| `locale` | `string` | Page locale for multilingual SEO |
| `schema` | `array` | Additional schema.org structured data |
| `isHomepage` | `boolean` | Whether this is the homepage |

### View: `laravel/Modules/Seo/resources/views/components/head.blade.php`

The view includes:

1. **Meta tags**: charset, viewport, theme-color, robots, author, keywords
2. **Open Graph**: type, title, description, url, image, site_name, locale
3. **Twitter Card**: card type, title, description, image
4. **Schema.org JSON-LD**: WebSite structured data with proper context and type
5. **Layout SEO links**: `@include('layouts.seo-links')` for theme-specific SEO links
6. **Laravel Head**: `@headMeta`, `@headLink`, `@headScript`, `@headStyle` for package integration
7. **Dark mode**: Inline script that persists preference in localStorage and respects `prefers-color-scheme`
8. **Alpine.js**: Bootstrap from CDN if not already loaded
9. **Critical CSS**: `[x-cloak]` selector to prevent FOUC
10. **Styles**: `@livewireStyles`, `@filamentStyles`, `@vite('resources/css/app.css')`

## References in the Codebase

### Blade Views Using Fixcity References
- `laravel/Themes/Sixteen/resources/views/components/blocks/flow/segnalazione/02-dati.blade.php` - expects `fixcity::segnalazione.*` translations
- `laravel/Themes/Sixteen/resources/views/components/blocks/flow/segnalazione/03-dettaglio.blade.php` - expects `fixcity::segnalazione.*` translations
- `laravel/Themes/Sixteen/resources/views/components/blocks/flow/ticket/segnalazione/03-dettaglio.blade.php` - expects `fixcity::segnalazione.*` translations
- `laravel/Themes/Sixteen/resources/views/components/blocks/flow/ticket/segnalazione/03-riepilogo.blade.php` - expects `fixcity::segnalazione.*` translations

### Routes
- `route('fixcity::segnalazione.create')` - expected but missing
- `route('fixcity::segnalazione.detail', ['slug' => ':slug'])` - expected but missing
- `route('fixcity::segnalazione.index')` - expected but missing

### Models/Controllers
- `Modules\Fixcity\Models\Ticket` - expected to exist (missing)
- `Modules\Fixcity\Actions\CreateTicketAction` - expected to exist (missing)
- `Modules\Fixcity\Http\Controllers\SegnalazioneController` - expected to exist (missing)

## What is Missing

### SEO Head Component
- [ ] Full SEO Head component implemented in `laravel/Modules/Seo/`
- [ ] Translation keys for multilingual support
- [ ] Integration with existing layouts
- [ ] Tests for component rendering

### Module Structure Still Needed
- [ ] Create missing Fixcity module files (already partially addressed)
- [ ] Translation files for fixcity module
- [ ] Module views and controllers

## Acceptance Criteria

- [x] Create `laravel/Modules/Seo/app/View/Components/Head.php` - **DONE**
- [x] Create `laravel/Modules/Seo/resources/views/components/head.blade.php` - **DONE**
- [x] Create `laravel/Modules/Seo/app/View/Components/_components.json` - **DONE**
- [x] Component accepts all required properties
- [x] View includes all SEO meta tags and schema
- [x] Dark mode script with preference persistence
- [x] Alpine.js bootstrap integration
- [x] Critical CSS FOUC prevention
- [x] Laravel Head facade integration
- [x] x-layouts.seo-links placeholder
- [ ] Run PHPStan to verify no type errors
- [ ] Run tests to verify component rendering
- [ ] Update documentation with new component

## Steps to Verify

1. **Component rendering**: Test that `<seo:head>` renders without errors
2. **Meta tags**: Verify all meta tags are present in rendered HTML
3. **Schema.org**: Verify JSON-LD script is valid and contains correct data
4. **Dark mode**: Test that theme preference is persisted in localStorage
5. **Alpine.js**: Verify Alpine.js is loaded and functional
6. **Laravel Head**: Test integration with Laravel Head package
7. **FOUC prevention**: Verify `[x-cloak]` styles prevent flash of unstyled content

## Technical Details

### Problem Summary
- **Issue**: Missing comprehensive SEO Head component for modern web applications
- **Location**: Should be in `laravel/Modules/Seo/` module
- **Severity**: High - affects all page SEO and social sharing
- **Frequency**: Every page load

### Stack Trace/Logs
No specific errors; component simply doesn't exist.

### Environment
- **Repository**: Current project checkout
- **Environment**: Laravel application with Filament and Livewire
- **Modules**: Seo module exists, Cms module has basic Head component

### Known Issues/Risks
1. **Module Dependencies**: Seo module may depend on other modules
2. **Schema.org validity**: JSON-LD must validate against schema.org requirements
3. **Dark mode persistence**: Must work across page reloads and sessions
4. **Performance**: Inline critical CSS should be minimal

### Test Results

#### Before Fix
- No comprehensive SEO Head component exists
- Pages rely on inline meta tags without structured organization
- No dark mode support
- No FOUC prevention strategy

#### After Fix (Expected)
- SEO Head component renders correctly
- All meta tags present and valid
- Schema.org JSON-LD validates successfully
- Dark mode preference persists
- Alpine.js loaded and functional
- Laravel Head integrates without conflicts
- FOUC prevented with critical CSS

## Cost-Benefit Analysis

### Investment Required
- **Personnel**: 1 developer for 1 day
- **Time**: 8 hours of development
- **Resources**: Existing Laravel installation, PHP, Node.js

### Benefits
- **Improves SEO**: Proper meta tags and schema.org structured data
- **Enables social sharing**: Open Graph and Twitter Card meta tags
- **Supports dark mode**: User preference persistence
- **Prevents FOUC**: Critical CSS inline strategy
- **Improves developer experience**: Reusable component with clear API
- **Foundation for future**: Easy to extend with additional schema types

### Implementation Approach
- Use existing Cms Head component as reference pattern
- Follow project conventions for module structure
- Integrate with existing Laravel Head package
- Document component with bmad story framework

## Next Steps

1. **Immediate**: Run PHPStan to verify component type safety
2. **Short-term**: Create translation keys for multilingual support
3. **Medium-term**: Integrate component into existing page layouts
4. **Long-term**: Add additional schema types (Article, Product, etc.)
5. **Ongoing**: Monitor SEO performance and update component as needed

## Documentation

- **Current State**: Documented in this bmad story
- **Implementation Reference**: Cms module Head component at `laravel/Modules/Cms/app/View/Components/Head.php`
- **Testing Reference**: Reference existing component tests in repo
- **Related**: Sixteen theme segalazione implementation stories

## Git History

- **Created**: 2026-10-30
- **Author**: AI Assistant
- **Reviewers**: To be assigned
- **Approvers**: To be assigned

## Incident Log

- **2026-10-30**: Created this story documenting the SEO Head component implementation
- **2026-10-30**: Component created and view template implemented

## Cross-Agent Coordination

This story should be coordinated with:
- Theme Sixteen agents for visual parity
- Cms agents for integration with existing Head component
- QA agents for test coverage
- Translation agents for multilingual support

## Links

- Related story: `fixcity-segnalazione-missing-module.story.md` (Fixcity module implementation)
- Related module: `laravel/Modules/Cms/docs/stories/cms-merge-conflict-resolution.story.md` (CMS conflict resolution)
- Related tool: `bashscripts/docs/llm-wiki-qmd.sh search "seo head component"` (search for more references)
- Related skill: `laravel-head` package documentation

## Conclusion

The SEO Head component is a critical missing piece for modern web application SEO and social sharing. This story documents the implementation and provides a clear plan for creating the component with all necessary functionality. The component should be reusable across the application and integrate seamlessly with existing Laravel, Filament, and Livewire infrastructure.