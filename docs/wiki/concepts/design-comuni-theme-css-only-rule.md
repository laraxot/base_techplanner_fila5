# Design Comuni Theme CSS Only Rule

## Regola permanente

Nel flusso Design Comuni, le Blade dei moduli non devono contenere blocchi `<style>` o manipolazioni JavaScript di stile inline per correggere la parity visuale.

## Ownership

- I moduli, come `laravel/Modules/Fixcity`, possiedono markup semantico, stato Livewire, schema Filament e traduzioni.
- Il tema `laravel/Themes/Sixteen` possiede la resa visuale Design Comuni, i token, le override Bootstrap Italia/Filament e le regole responsive.
- Le correzioni di parity per pagine come `segnalazione-crea` vanno in `laravel/Themes/Sixteen/resources/css/` e devono essere compilate dal tema.
- I selettori CSS del tema devono essere component/site-level, non page-slug-level e non dominio-specifici: preferire pattern Design Comuni/Filament (`.it-form-wizard`, `.steppers-*`, `[data-step-section]`, `coordinate-picker-lit`) invece di `.page-content[data-slug="..."]`, `.ticket-wizard-root` o classi di un singolo caso d'uso.

## Build obbligatoria

Dopo una modifica CSS del tema Sixteen:

```bash
cd laravel/Themes/Sixteen
npm run build
npm run copy
```

## Motivo

Inline style o `el.style.setProperty(...)` dentro una view di modulo rompono la separazione tra contenuto e presentation layer, rendono fragile il confronto HTML con la reference Design Comuni e duplicano regole gia' centralizzabili nel tema.

## Applicazione

Per `laravel/Modules/Fixcity/resources/views/filament/widgets/ticket-create-wizard.blade.php`:

- non aggiungere `<style>` nella Blade;
- non nascondere elementi Filament via JavaScript inline;
- usare classi/pattern stabili e riusabili (`.it-form-wizard`, `.steppers-*`, `[data-step-section]`, componenti mappa);
- governare `fi-sc-wizard-footer`, CTA, grid e sidebar dal CSS del tema.
