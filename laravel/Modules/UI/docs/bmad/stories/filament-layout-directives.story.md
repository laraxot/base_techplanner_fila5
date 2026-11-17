---
<<<<<<< .merge_file_AUWFnl
title: "Direttive Filament nel layout UI"
type: story
status: done
module: UI
qmd: "Filament layout @filamentStyles @filamentScripts UI main"
=======
title: "Direttive Filament nel layout UI (PTVX senza Cms)"
type: story
status: done
module: UI
updated: 2026-11-16
qmd: "Filament layout @filamentStyles @filamentScripts UI main master notifications no Cms"
related:
  - ../../../../../../docs/wiki/memories/filament5-layout-contract-shared-modules.md
  - ../../../Xot/docs/bmad/stories/module-portfolio-topology-no-cms-in-ptvx.story.md
>>>>>>> .merge_file_uPoWjF
---

# Direttive Filament nel layout UI

<<<<<<< .merge_file_AUWFnl
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
=======
## Religione portfolio

`Cms` **non** sta in `base_ptvx_fila5` e non va introdotto. Il contratto
Filament 5 si impara dai progetti FO che hanno `Cms` (`head`/`foot`), e si
applica ai layout **reali** di questo progetto: `UI` e `User`.

Fonte: [Configuring your layout](https://filamentphp.com/docs/5.x/introduction/installation#configuring-your-layout).

Obblighi (stessi di `cms::head` / `cms::foot` altrove):

1. `@filamentStyles` in `<head>` (prima del CSS Vite del tema/app).
2. `@livewire('notifications')` a fine body **senza** `@auth`.
3. `@filamentScripts` a fine `<body>`.

## Layout owner in PTVX

- `Modules/UI/.../layouts/main.blade.php` e `master.blade.php`
- `Modules/User/.../layouts/main.blade.php`

## Acceptance criteria

- [x] Nessun `Modules/Cms` nel checkout PTVX.
- [x] Layout UI/User: Styles + Scripts + notifications nudo.
- [x] Pest `FilamentLayoutDirectivesTest` verde (file-read, no DB).
- [x] Memoria portfolio aggiornata col mapping Cms→UI.
>>>>>>> .merge_file_uPoWjF
