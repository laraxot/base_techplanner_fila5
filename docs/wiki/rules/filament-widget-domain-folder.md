# Widget Filament: dominio in cartella, ruolo in classe

Mirror di `.cursor/rules/filament-widget-domain-folder.mdc`.

**Invariante:** `Modules\<Modulo>\Filament\Widgets\<Dominio>\<Ruolo>Widget`

- Vietato: `TicketViewWidget`, `CreateTicketWizardWidget` in root `Widgets/` (nuovo codice).
- Corretto: `Ticket\ViewWidget`, `Auth\LoginWidget` (User).

**FO Fixcity:** `Modules\Fixcity\Filament\Widgets\Ticket\ViewWidget`

**Wiki:** `laravel/Modules/Xot/docs/wiki/concepts/filament-widgets-domain-folder-naming.md`
