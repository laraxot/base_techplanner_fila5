# Filament 5 Widget Schema Submit State Rule

## Regola Permanente

Nei widget Laraxot basati su `XotBaseWidget` / `XotBaseWizardWidget`, il form e' un `Filament\Schemas\Schema` esposto come property dinamica `$this->form`.

Usare:

```php
$this->form->getState()
```

Non usare:

```php
$this->getForm('form')
```

## Motivazione

`XotBaseWidget` usa `InteractsWithSchemas`, non `InteractsWithForms` come contratto primario. `getForm()` non e' disponibile e causa:

```text
BadMethodCallException: Method ...::getForm does not exist.
```

## Pattern

- Render Blade: `{{ $this->form }}`.
- Submit/validation widget: `$this->form->getState()`.
- Normalizzazione dominio: dopo `getState()`, non prima.
- Multiple forms Filament: usare property schema nominate solo quando la classe le dichiara davvero; non assumere `getForm('form')`.

## Esempio Fixcity

`CreateTicketWizardWidget::submit()` deve validare/preparare lo stato del wizard tramite `$this->form->getState()`. I bottoni Design Comuni nella view sono bridge visuali e non cambiano il contratto schema.

