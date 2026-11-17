# Filament admin vs pub_theme wizard

## Regola

| Contesto | Componente wizard | Vista |
|----------|---------------------|--------|
| **Backoffice** (pannello Filament, `inAdmin()` true) | `Filament\Schemas\Components\Wizard` | Default Filament (skin pannello) |
| **Frontoffice** (pub_theme, pagine cittadino) | `XotBaseWizardWidget` (via `HasWizard`) | `pub_theme::components.wizard` (Design Comuni) |

## Filosofia (v5)

1. **Native over Custom**: Utilizziamo il trait `HasWizard` di Filament per gestire il ciclo di vita, lo stato e la validazione del wizard.
2. **Runtime View Selection**: Il componente `Wizard` viene istanziato via `XotBaseWizardWidget`. Se `inAdmin()` è false, viene iniettata automaticamente la vista `pub_theme::components.wizard`.
3. **State Pathing**: Il wizard è ancorato al path `data` del widget, garantendo la sincronizzazione automatica dei campi Livewire (`$this->data[...]`).

## Implementazione (v5)

- **Base**: `Modules\Xot\Filament\Widgets\XotBaseWizardWidget`
- **Widget**: `Modules\Fixcity\Filament\Widgets\CreateTicketWizardWidget`
- **Schema**: `TicketForm::getFormSchema()` (definito una sola volta per admin e frontoffice).
- **Parità Visiva**: Gestita interamente tramite la blade del tema e i CSS Italia.it.

## Perché

Il pannello admin deve mantenere il look & feel di Filament. Il frontoffice deve essere indistinguibile da un'applicazione Design Comuni. L'uso di `XotBaseWizardWidget` garantisce questa separazione mantenendo la logica di business e la definizione del form centralizzate.

## Collegamenti

- [wizard-architecture.md](../../laravel/Modules/Fixcity/docs/wizard-architecture.md)
- [xot-base-wizard-widget.md](../../laravel/Modules/Xot/docs/xot-base-wizard-widget.md)
- [wizard-component.md](../../laravel/Themes/Sixteen/docs/wizard-component.md)

*Ultimo aggiornamento: Maggio 2026*
