---
title: "php artisan view:cache fails — filament-schemas::form component missing"
type: handoff
tags: [filament, blade, view-cache, cross-module, multi-agent]
created: 2026-07-24
updated: 2026-07-24
related:
  - ../../laravel/Modules/Xot/docs/wiki/concepts/filament-page-form-wrapper.md
  - ../wiki/rules/multi-agent-lock-coordination.md
---

# `php artisan view:cache` fails — `filament-schemas::form` component missing

## Sintomo

```
InvalidArgumentException
Unable to locate a class or view for component [filament-schemas::form].
```

## Causa

12 view in `Modules/{Cms,User,Xot}/resources/views/filament/...` usano
`<x-filament-schemas::form wire:submit="...">...</x-filament-schemas::form>`
per avvolgere `{{ $this->form }}` in Filament Page custom (non Resource).

Questo componente **non è mai esistito** in `filament/schemas` (verificato su
`vendor/filament/schemas/resources/views/components/`: solo `grid.blade.php`
e `fieldset.blade.php`; zero occorrenze nel sorgente ufficiale
`filamentphp/filament`). `Filament\Schemas\Components\Form` è una classe PHP
(`Form::make([...])`) che si renderizza da sé via `toEmbeddedHtml()` — non è
un tag Blade da usare direttamente nel markup della pagina.

## Fix

Un solo view override Laravel invece di editare i 12 consumer:

`laravel/resources/views/vendor/filament-schemas/components/form.blade.php`
→ alias del componente mancante a un `<form>` HTML nativo con
`wire:submit`, pattern che Filament stesso usa nelle sue demo per le pagine
custom.

## ⚠️ Nota multi-agente

Questo file di override è stato **rimosso più volte da agenti concorrenti**
in questo repository (probabilmente scambiato per un file temporaneo/di
debug, dato che vive sotto `resources/views/vendor/`, percorso normalmente
associato a pubblicazioni di pacchetto). **Non cancellarlo.** Prima di
toccare qualsiasi cosa sotto `resources/views/vendor/filament-schemas/`,
esegui `cd laravel && php artisan view:cache` per confermare che sia ancora
necessario.

## Verifica

```bash
cd laravel && php artisan view:clear && php artisan view:cache
```

Deve completare con `INFO  Blade templates cached successfully.` senza
`InvalidArgumentException`.

## Alternativa scartata

Editare i 12 consumer sostituendo il tag con `<form wire:submit="...">`
diretto: funzionalmente equivalente, ma richiede touch di 12 file in 3 moduli
invece di 1 file singolo — violazione DRY senza motivo, dato che il view
override risolve tutti i casi in un colpo solo e resta valido per qualsiasi
nuovo consumer futuro che riusi lo stesso (errato) tag.
