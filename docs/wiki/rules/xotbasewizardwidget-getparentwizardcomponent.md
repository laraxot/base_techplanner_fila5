---
title: "XotBaseWizardWidget getWizardComponent must use getParentWizardComponent"
type: rule
confidence: high
created: 2026-05-12
updated: 2026-05-12
tags: [filament, wizard, xotbasewizardwidget, haswizard, standard]
related:
  - workflow/mandatory-workflow.md
  - 016-wizard-widgets-use-xotbasewizardwidget.md
---

# Regola: XotBaseWizardWidget getWizardComponent usa getParentWizardComponent()

## Enunciato

Quando si override `getWizardComponent()` in `XotBaseWizardWidget`, **DEVE** chiamare `$this->getParentWizardComponent()` per mantenere lo standard Filament HasWizard.

## Pattern corretto

```php
use Filament\Resources\Pages\Concerns\HasWizard {
    getWizardComponent as getParentWizardComponent;
}

class XotBaseWizardWidget extends XotBaseWidget
{
    use HasWizard;

    public function getWizardComponent(): Component
    {
        // Chiama SEMPRE getParentWizardComponent() per mantenere lo standard
        $wizard = $this->getParentWizardComponent();

        // Poi applica customizzazioni Laraxot
        $wizard->startOnStep($this->wizardStartStep);

        if (! inAdmin()) {
            $wizard = $wizard->view('pub_theme::components.wizard');
        }

        return $wizard;
    }
}
```

## Perché

1. **Standard Filament**: `HasWizard::getWizardComponent()` fornisce la logica base del wizard (submit/cancel actions, skippable steps)
2. **DRY**: non duplicare la costruzione del Wizard, estenderla
3. **Manutenibilità**: aggiornamenti del trait Filament si riflettono automaticamente

## Anti-pattern da evitare

```php
// ❌ SBAGLIATO: costruisce Wizard direttamente senza chiamare getParentWizardComponent()
public function getWizardComponent(): Component
{
    $wizard = Wizard::make($this->getSteps())
        ->startOnStep($this->wizardStartStep)
        ->skippable($this->hasSkippableSteps());
        
    // ... customizzazioni
    return $wizard;
}
```

## Verifica

Dopo ogni modifica:
1. PHPStan: `phpstan analyse Modules/Xot/app/Filament/Widgets/XotBaseWizardWidget.php`
2. Test funzionale: wizard naviga correttamente tra step