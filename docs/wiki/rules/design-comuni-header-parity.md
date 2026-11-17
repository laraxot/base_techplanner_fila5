---
title: "Design Comuni — header slim HTML + visual parity"
type: rule
tags: [header, design-comuni, parity, six, r21, ux]
created: 2026-06-05
updated: 2026-06-05
qmd: "header slim logged guest btn-icon btn-full rounded-icon visual parity html parity segnalazione-area-personale"
issues:
  - https://github.com/laraxot/base_fixcity_fila5/issues/277
discussions:
  - https://github.com/laraxot/base_fixcity_fila5/issues/277#issuecomment-4630813109
related:
  - ../memories/header-html-visual-parity-rule.md
  - ../memories/r21-header-authenticated-state.md
  - ../../stories/STORY-147-ux-design-header-logged-in.md
  - ../../../laravel/Themes/Sixteen/docs/design-comuni/raw/cmp-header.hbs
  - ../../../laravel/Themes/Sixteen/docs/design-comuni/analysis/header-html-parity.md
sources:
  - https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-area-personale.html
---

# Design Comuni — header slim HTML + visual parity

## Perché (religione)

Il cittadino autenticato deve riconoscere lo **stesso linguaggio PA** del kit Design Comuni. Non basta che il menu funzioni: **DOM + CSS computed** devono essere indistinguibili dal reference live.

**Zen:** guest e logged condividono lo stesso componente (`btn btn-primary btn-icon btn-full`); cambia solo il contenuto di `rounded-icon` (icona utente → avatar/iniziale).

## SSoT (ordine obbligatorio)

1. [DC live — area personale](https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-area-personale.html)
2. `laravel/Themes/Sixteen/docs/design-comuni/raw/cmp-header.hbs` (righe 33–68 logged)
3. `laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php`
4. `partials/user-dropdown.blade.php`
5. UX: `docs/stories/STORY-147-ux-design-header-logged-in.md` §11–13

## Regole operative

| Stato | Toggle slim | Vietato |
|-------|-------------|---------|
| Guest | `a.btn.btn-primary.btn-icon.btn-full` + `it-user` in `rounded-icon` | CTA custom fuori pattern BI |
| Logged | **Stesso pattern** + `img` 20×20 o iniziale in `rounded-icon` | `nav-link dropdown-toggle`, Gravatar FO, icona power blu |

## Doppia parity obbligatoria

1. **HTML parity** — confronto struttura vs `cmp-header.hbs` / `header-html-parity.md`
2. **Visual parity** — screenshot auth vs `logged-original.png` o reference live; **computed style** toggle `background: rgb(0, 64, 43)`

## CSS cascade (non fidarsi del markup)

- `app/11-tailwind-utility-compat.css` imposta `.btn-primary` blu `#0066CC` **dopo** layer 08.
- Override finale: `app/13-final-runtime-overrides.css` su `.it-header-slim-wrapper .it-user-wrapper > a.btn-primary.btn-icon.btn-full`.
- Iniziale fallback: `<strong class="user-initial-fallback">` (non `<span>`) — evita `span:not(.rounded-icon){color:#fff}`.

## Avatar FO

- Solo `getFirstMediaUrl('avatar')` o iniziale; **mai** URL `gravatar.com` in slim bar.
- Foto reference: `img` 20×20 `border rounded-circle icon-white` dentro `rounded-icon`.

## Verifica (investigare, non assumere)

```bash
cd laravel/Themes/Sixteen && npm run build
cd ../../laravel && php artisan view:clear
# Login FO → /it → DevTools computed style toggle + screenshot slim
```

- Pest: `HeaderV1SlimDropdownContractTest`
- Credenziali test: **solo runtime** (tinker), mai in file repo

## Trigger agenti

Caricare questa rule + `header-html-visual-parity-rule.md` quando: header slim, logged toggle, `logged.png`, STORY-147, R21.
