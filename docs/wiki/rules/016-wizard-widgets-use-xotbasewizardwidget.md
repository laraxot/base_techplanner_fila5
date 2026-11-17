# Rule 016: Wizard Widgets Use XotBaseWizardWidget

## Regola

Se un widget Filament espone un `Filament\Schemas\Components\Wizard` come struttura principale del proprio `getFormSchema()`, deve estendere:

`Modules\Xot\Filament\Widgets\XotBaseWizardWidget`

e non il piu' generico:

`Modules\Xot\Filament\Widgets\XotBaseWidget`

## Perche'

- `XotBaseWidget` governa form generici.
- Un wizard ha semantica aggiuntiva: step iniziale, navigazione multi-step, eventuale `?step=`, submit finale, normalizzazione stato.
- La policy deve stare in Xot, non essere ricopiata in ogni modulo.

## Obiettivo architetturale

Separare:

- dominio: step, campi, validazione, submit
- framework policy: bootstrap wizard, sicurezza `?step=`, hook azioni, convenzioni condivise

Questo riduce divergenze, bug e duplicazioni tra moduli.

## Pattern corretto

```php
use Modules\Xot\Filament\Widgets\XotBaseWizardWidget;

class CreateTicketWizardWidget extends XotBaseWizardWidget
{
    public function getFormSchema(): array
    {
        return [
            $this->makeWizard([
                $this->makeStepPrivacy(),
                $this->makeStepData(),
                $this->makeStepSummary(),
            ]),
        ];
    }
}
```

## Pattern errato

```php
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class CreateTicketWizardWidget extends XotBaseWidget
{
}
```

## Collegamenti

- [XotBaseWizardWidget](../../../../laravel/Modules/Xot/docs/filament/widgets/xot-base-wizard-widget.md)
- [Fixcity wizard pattern](../../../../laravel/Modules/Fixcity/docs/filament-wizard-pattern.md)
