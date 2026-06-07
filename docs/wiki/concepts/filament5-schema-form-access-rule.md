# Filament 5 Schema Form Access Rule

## Regola permanente

Nei widget Laraxot basati su `Filament\Schemas\Concerns\InteractsWithSchemas`, non usare `getForm('form')`.

Il form e' uno schema Filament v5 esposto come proprieta' dinamica:

```php
$this->form->getState();
```

## Motivo

`XotBaseWidget` implementa `HasSchemas` e usa `InteractsWithSchemas`; `HasForms` / `InteractsWithForms` non e' il contratto attivo. Chiamare `getForm('form')` genera:

```text
BadMethodCallException: Method ...::getForm does not exist.
```

## Applicazione

Per `CreateTicketWizardWidget`:

- validazione / lettura submission: `$this->form->getState()` (nessuna riscrittura PHP del payload tra schema e `Ticket::create`, salvo merge espliciti dominio tipo `owner_id`);
- view: `{{ $this->form }}`.

## Submit Livewire

Quando un bottone Blade custom usa `wire:click="submit"`, il metodo Livewire deve restare coerente con il contratto schema-based:

```php
public function submit(): void
{
    /** @var array<string, mixed> $state */
    $state = $this->form->getState();

    // crea il record / dispatch eventi / redirect usando $state così come dal dehydrate Filament
}
```

Non separare il submit visuale dal contratto dati del widget. Le CTA Design Comuni sono bridge visuali; non diventano owner di validation o state management.

## Checklist

- Cercare `getForm('form')` nei widget che estendono `XotBaseWidget` / `XotBaseWizardWidget`.
- Sostituire con `$this->form->getState()`.
- Verificare con `php -l` e con un POST Livewire reale, non solo con il GET della pagina.
- Se ci sono piu' form/schema, usare property nominate solo quando la classe le dichiara esplicitamente.

## Fonti

- Filament 5 components/form, multiple forms: `https://filamentphp.com/docs/5.x/components/form#using-multiple-forms`
- Runtime locale `XotBaseWidget::form(Schema $schema)`.
