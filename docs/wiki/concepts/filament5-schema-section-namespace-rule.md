---
title: Filament 5 Schema Section Namespace Rule
type: concept
tags: [filament, schemas, forms, infolists, livewire, rule]
created: 2026-04-22
updated: 2026-04-22
sources:
  - https://filamentphp.com/docs/5.x/schemas/overview
  - https://filamentphp.com/docs/5.x/schemas/sections
  - https://filamentphp.com/docs/5.x/components/form#using-multiple-forms
---

# Filament 5 Schema Section Namespace Rule

## Regola Permanente

In Filament 5, `Section` e' un layout component del package schema:

```php
use Filament\Schemas\Components\Section;
```

Non usare `Filament\Infolists\Components\Section`: nel vendor installato non esiste.

## Mappa DRY Dei Namespace

- Layout e contenitori: `Filament\Schemas\Components\*` (`Section`, `Grid`, `Wizard`, `Text`).
- Campi input validabili: `Filament\Forms\Components\*` (`TextInput`, `Select`, `Checkbox`, `FileUpload`).
- Valori read-only tipo description list: `Filament\Infolists\Components\*` (`TextEntry`, `ImageEntry`, `IconEntry`).
- Utility injection nello schema: `Filament\Schemas\Components\Utilities\Get` e `Set`.

## Multiple Forms

Il pattern ufficiale Filament 5 per piu form non richiede classi `Form::make()` dentro lo schema. Si definiscono piu metodi schema con nome distinto:

- `editPostForm(Schema $schema): Schema`
- `createCommentForm(Schema $schema): Schema`

Ogni metodo usa il proprio `statePath()` e la propria property Livewire pubblica, ad esempio `$postData` e `$commentData`. In Blade e nel componente il form e' indirizzato con il nome metodo (`$this->editPostForm`, `$this->createCommentForm`).

## Applicazione Fixcity

`CreateTicketWizardWidget` usa un solo schema standard chiamato `form`, ereditato da `XotBaseWidget::form(Schema $schema)`, con `statePath('data')`. La view deve quindi renderizzare `{{ $this->form }}` e il widget deve inizializzare `$data` con `form->fill()` o fallback equivalente.

Gli step wizard possono combinare:

- `Section` e `Grid` da schema per il layout;
- campi form nello step editabile;
- `TextEntry` e `ImageEntry` nello step di riepilogo o nei blocchi read-only.

Questa combinazione e' coerente con il modello Server-Driven UI di Filament 5.

## Regola Wizard + Mappe

Le mappe Leaflet dentro uno step Filament possono essere inizializzate mentre lo step e' nascosto. Il componente mappa deve quindi chiamare `invalidateSize()` quando diventa visibile dopo il cambio step Livewire. Non risolvere con duplicati Blade, viste speciali per slug, CSS per pagina o CSS `.ticket-wizard-root`: il fix appartiene al componente mappa e a regole tema riusabili.
