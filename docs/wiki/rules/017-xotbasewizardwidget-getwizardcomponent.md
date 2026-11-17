---
title: "Rule 017: XotBaseWizardWidget::getWizardComponent() DEVE usare getParentWizardComponent()"
type: rule
confidence: high
created: 2026-05-12
updated: 2026-05-12
tags: [wizard, xotbasewizardwidget, haswizard, filament, getWizardComponent, getParentWizardComponent]
related:
  - rules/016-wizard-widgets-use-xotbasewizardwidget.md
  - skills/xotbasewizardwidget-pattern.md
  - concepts/filament5-section-namespace.md
---

# Rule 017: XotBaseWizardWidget::getWizardComponent() DEVE usare getParentWizardComponent()

## Regola

Il metodo `getWizardComponent()` in `XotBaseWizardWidget` (e in qualsiasi override nelle classi figlie) **DEVE** iniziare con:

```php
$wizard = $this->getParentWizardComponent();
```

## Perché

`XotBaseWizardWidget` usa il trait `HasWizard` con aliasing:

```php
use HasWizard {
    getWizardComponent as getParentWizardComponent;
}
```

`getParentWizardComponent()` è l'implementazione standard Filament di `HasWizard::getWizardComponent()`.
Chiamarla garantisce:

- Il `Wizard` è costruito secondo lo standard Filament (steps, azioni, alpine handler)
- Le customizzazioni Laraxot (view tema, `startOnStep`, `persistStepInQueryString`) vengono applicate **sopra** lo standard, non al posto di esso
- Override nelle classi figlie rimangono compatibili col contratto del trait

## Pattern CORRETTO

```php
public function getWizardComponent(): Component
{
    /** @var Wizard $wizard */
    $wizard = $this->getParentWizardComponent();

    // Customizzazioni Laraxot applicate sopra lo standard
    $wizard->startOnStep($this->wizardStartStep);

    if (! inAdmin()) {
        $wizard = $wizard->view('pub_theme::components.wizard');
    }

    return $wizard;
}
```

## Pattern ERRATO

```php
// ❌ NON fare così — bypassa HasWizard e rompe lo standard Filament
public function getWizardComponent(): Component
{
    $wizard = Wizard::make($this->getSteps())
        ->startOnStep($this->wizardStartStep);

    return $wizard;
}
```

## Override nelle classi figlie

Se una classe figlia ha bisogno di customizzare ulteriormente, DEVE chiamare il parent:

```php
public function getWizardComponent(): Component
{
    /** @var Wizard $wizard */
    $wizard = parent::getWizardComponent(); // chiama XotBaseWizardWidget::getWizardComponent()

    // ulteriori customizzazioni...
    return $wizard;
}
```

## File di riferimento

- `Modules/Xot/app/Filament/Widgets/XotBaseWizardWidget.php` — implementazione canonica
- `Modules/Fixcity/app/Filament/Widgets/CreateTicketWizardWidget.php` — esempio classe figlia

## Enforcement

Ogni modifica a `getWizardComponent()` in `XotBaseWizardWidget` o classi figlie DEVE:
1. Iniziare con `$wizard = $this->getParentWizardComponent();` (o `parent::getWizardComponent()` nelle figlie)
2. Applicare customizzazioni sull'oggetto `$wizard` restituito
3. Restituire `$wizard`
