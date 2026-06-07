---
title: "Segnalazione Privacy Step - Design Comuni Parity"
type: concept
sources: ["https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-01-privacy.html", "laravel/Modules/Fixcity/app/Filament/Resources/TicketResource/Schemas/TicketForm.php"]
confidence: high
created: 2026-05-04
updated: 2026-05-04
tags: [segnalazione, privacy, design-comuni, parity, wizard, stepper, checkbox]
related:
  - concepts/sixteen-header-composition-rule.md
  - ../../../laravel/Modules/Fixcity/docs/wiki/concepts/ticket-wizard-frontoffice.md
  - ../../../laravel/Themes/Sixteen/docs/wiki/concepts/design-comuni-header-auth-state.md
---

# Segnalazione Privacy Step - Design Comuni Parity

## Vision & Philosophy

The segnalazione (ticket) creation wizard MUST match Design Comuni reference exactly:
- **Stepper/Wizard**: Visible multi-step indicator (Step 1: Privacy, Step 2: Dati, Step 3: Riepilogo, Step 4: Conferma)
- **Checkbox text**: Exact phrase from Design Comuni (see below)
- **Font family/size**: Match Design Comuni tokens (Titillium Web, Roboto Mono)
- **NO Bootstrap**: Tailwind CSS + Alpine.js + Lit ONLY

## Design Comuni Reference

Official page: https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-01-privacy.html

### Exact Checkbox Text (CRITICAL)

From Design Comuni source (https://github.com/italia/design-comuni-pagine-statiche):

```
"Dichiaro di aver letto l'informativa sulla privacy e acconsento al trattamento dei dati personali"
```

### Stepper Structure

Design Comuni uses Bootstrap classes (we convert to Tailwind):
- Horizontal stepper with numbered steps
- Active step highlighted
- Completed steps marked with check icon
- Mobile: collapsed to dropdown or horizontal scroll

### Font Tokens

From Design Comuni (https://github.com/italia/design-comuni-pagine-statiche/blob/main/src/stylesheets/):

| Element | Design Comuni (Bootstrap) | Sixteen (Tailwind) |
|---------|---------------------------|----------------------|
| Body text | `font-family: 'Titillium Web', Arial, sans-serif` | `font-family: 'Titillium Web', Arial, sans-serif` |
| Headings | `font-family: 'Roboto Mono', monospace` | `font-family: 'Roboto Mono', monospace` |
| Base size | `font-size: 16px` | `text-base` (16px) |
| Small text | `font-size: 14px` | `text-sm` (14px) |

## Implementation in FixCity

### Current Wizard (Filament v5)

File: `laravel/Modules/Fixcity/app/Filament/Resources/TicketResource/Schemas/TicketForm.php`

```php
Wizard::make(static::getSteps())
    ->skippable()
    ->persistStepInQueryString(),
```

Steps defined in `getSteps()`:
1. Privacy (Step::make('privacy'))
2. Data (Step::make('data'))
3. Summary (Step::make('summary'))

### Checkbox Implementation

File: `TicketForm.php` lines 75-78:

```php
Checkbox::make('privacyAccepted')
    ->accepted()
    ->dehydrated(false),
```

Translation file: `laravel/Modules/Fixcity/lang/it/create_ticket_wizard.php`

### Stepper Visibility Fix

**Problem**: Stepper not visible on `/it/tests/segnalazione-crea`

**Root cause**: Filament Wizard `->persistStepInQueryString()` requires `?step=` or proper initialization

**Fix**: Ensure step is initialized in `CreateTicketWizardWidget::mount()`:

```php
public function mount(array $blockData = []): void
{
    $this->blockData = $blockData;
    $this->initWizardState();
    // Force step=1 if not set
    if (! request()->has('step')) {
        $this->dispatch('wizard:setStep', step: 1);
    }
}
```

**CSS**: Stepper container must be visible (Tailwind classes):

```css
.filament-wizard-steps {
    @apply flex items-center justify-between;
}
```

## Filament v5 Wizard Configuration

Reference: https://filamentphp.com/docs/5.x/schemas/wizard

### Step Labels (Multilingual)

```php
Step::make('privacy')
    ->label(__('fixcity::create_ticket_wizard.steps.1.label'))
    ->description(__('fixcity::create_ticket_wizard.steps.privacy.description')),
```

### Icon Support

```php
use Filament\Schemas\Components\Wizard\Step;

Step::make('privacy')
    ->icon('heroicon-o-shield-check'),
```

## Font Implementation in Sixteen Theme

File: `laravel/Themes/Sixteen/resources/css/app.css`

```css
/* Design Comuni Font Tokens */
@import url('https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600;700&family=Roboto+Mono:wght@400;500&display=swap');

body {
    font-family: 'Titillium Web', Arial, sans-serif;
    font-size: 16px;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Roboto Mono', monospace;
}
```

## Testing Checklist

- [ ] Stepper visible on page load
- [ ] Step 1 active by default
- [ ] Checkbox text matches Design Comuni exactly
- [ ] Font family: Titillium Web (body), Roboto Mono (headings)
- [ ] Mobile responsive: stepper collapses properly
- [ ] Checkbox required validation works
- [ ] Next button advances to step 2

## Quality Gates

```bash
# PHPStan
cd laravel && ./vendor/bin/phpstan analyse --level=max Modules/Fixcity

# PHPMD
java -jar phpmd.phar laravel/Modules/Fixcity text cleancode,codesize

# Pest
cd laravel && ./vendor/bin/pest tests/Feature/SegnalazioneTest.php

# Playwright/Puppeteer visual check
# Visit: http://127.0.0.1:8000/it/tests/segnalazione-crea
# Verify: stepper visible, checkbox text correct, fonts match
```

## Related Files

- Wizard Widget: `laravel/Modules/Fixcity/app/Filament/Widgets/CreateTicketWizardWidget.php`
- Form Schema: `laravel/Modules/Fixcity/app/Filament/Resources/TicketResource/Schemas/TicketForm.php`
- Translation: `laravel/Modules/Fixcity/lang/it/create_ticket_wizard.php`
- Theme CSS: `laravel/Themes/Sixteen/resources/css/app.css`
- Blade View: `laravel/Modules/Fixcity/resources/views/pages/tickets/create.blade.php`
