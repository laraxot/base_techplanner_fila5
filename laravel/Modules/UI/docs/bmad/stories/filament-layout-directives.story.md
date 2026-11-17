---
title: "Direttive Filament nel layout UI"
type: story
status: done
module: UI
qmd: "Filament layout @filamentStyles @filamentScripts UI main"
---

# Direttive Filament nel layout UI

## Contesto

I percorsi indicati `laravel/Modules/Cms/resources/views/components/head.blade.php`
e `foot.blade.php` non appartengono al checkout corrente: il modulo `Cms` non è
presente. Il layout esistente per questo ruolo è
`laravel/Modules/UI/resources/views/components/layouts/main.blade.php`.

## Regola funzionale

Filament richiede `@filamentStyles` dentro `head` e `@filamentScripts` alla fine
del `body` nei layout Blade che ospitano componenti Filament/Livewire.

## Implementazione

- aggiunto `@filamentStyles` nel `head` del layout UI;
- aggiunto `@filamentScripts` nel `body` del layout UI;
- non creati file o moduli Cms inesistenti;
- non modificati layout che già rispettavano il contratto.

## Verifica

- fonte ufficiale: <https://filamentphp.com/docs/5.x/introduction/installation#configuring-your-layout>;
- eseguire PHPStan e rendering del layout in ambiente non produttivo;
- il gate Pest completo resta dipendente dalla disponibilità del database di test.

## Acceptance criteria

- [x] Il layout reale contiene `@filamentStyles` nel `head`.
- [x] Il layout reale contiene `@filamentScripts` nel `body`.
- [x] Nessun file Cms inesistente viene introdotto.
