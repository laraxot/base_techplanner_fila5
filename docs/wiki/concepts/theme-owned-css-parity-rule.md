# Theme-Owned CSS Parity Rule

## Regola

Le regole visuali di parity Design Comuni non devono stare nei Blade dei moduli.

Per il wizard segnalazione:

- il modulo Fixcity mantiene markup, stato Livewire, schema Filament e logica dominio;
- il tema Sixteen mantiene CSS e asset visuali in `laravel/Themes/Sixteen/resources/css/`;
- dopo modifiche CSS del tema eseguire dalla cartella tema `npm run build` e `npm run copy`;
- evitare `<style>` e attributi `style=""` nei Blade modulo per non rompere HTML parity e DRY.

## Motivazione

Il Blade modulo e' riusabile e deve restare indipendente dalla skin visuale. La parity Design Comuni appartiene al tema: metterla nel modulo crea duplicazioni, rende imprevedibile l'ordine CSS e impedisce confronti HTML puliti.

## Applicazione

Per `laravel/Modules/Fixcity/resources/views/filament/widgets/ticket-create-wizard.blade.php`:

- ammesso: classi semantiche stabili come `segnalazione-wizard-root`, `ticket-wizard-root`, `segnalazione-next-btn`;
- vietato: blocchi `<style>`, fix cromatici/layout inline, dimensioni via `style=""`;
- owner CSS: `laravel/Themes/Sixteen/resources/css/app.css` o file importato da `app.css`.

## Collegamenti

- Sixteen local rule: `laravel/Themes/Sixteen/docs/wiki/concepts/theme-owned-wizard-css-parity-rule.md`
- Fixcity local rule: `laravel/Modules/Fixcity/docs/wiki/concepts/theme-owned-wizard-css-parity-rule.md`
