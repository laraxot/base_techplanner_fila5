---
title: "Visual Parity Header Logged Rule"
type: rule
tags: [visual-parity, header, ux, logged, bmad]
created: 2026-06-05
updated: 2026-06-05
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/280"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/281"
related:
  - docs/wiki/rules/english-file-naming-rule.md
  - docs/wiki/rules/html-parity-rule.md
---

# Visual Parity Header Logged Rule

## Problema

L'header mostra sempre il bottone "Accedi all'area personale" anche quando l'utente è autenticato. Deve però mostrare:

1. **Quando NON autenticato**: Bottone "Accedi" che punta a `/login`
2. **Quando autenticato**: Menu a tendina con:
   - Avatar dell'utente (Gravatar o upload)
   - Link al profilo personale
   - Link all'area personale
   - Logout (form POST con CSRF)

## Riferimento

- Design Comuni: https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-area-personale.html
- Sezione: **Header quando loggato**

## HTML Parity Requirements

| Elemento | Attuale | Atteso | Status |
|----------|---------|--------|--------|
| Bottone login | Statico, `#href` | Link a `route('login')` | ❌ |
| Controllo auth | Mancante | `@auth` / `@guest` | ❌ |
| Menu utente | Non implementato | Avatar + dropdown | ❌ |
| Link profilo | Mancante | `route('profile.edit')` | ❌ |
| Logout | Mancante | Form POST con CSRF | ❌ |

## Soluzione Proposta

### 1. Modifica header-comune.blade.php

Aggiungere controllo autenticazione:

\`\`\`blade
@guest
    <div class="it-access-wrapper">
        <a class="btn btn-primary btn-sm" href="{{ route('login') }}">Accedi all'area personale</a>
    </div>
@else
    <div class="it-access-wrapper">
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                <img src="{{ Auth::user()->avatarUrl() ?? 'gravatar' }}" alt="Avatar" class="avatar-small">
                <span class="d-none d-lg-inline">{{ Auth::user()->first_name }}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profilo</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item" type="submit">Esci</button>
                </form>
            </div>
        </div>
    </div>
@endguest
\`\`\`

### 2. Aggiornare le regole

- Aggiornare `docs/wiki/rules/english-file-naming-rule.md` con esempi di header
- Aggiornare `docs/wiki/rules/html-parity-rule.md` con pattern `@auth/@guest`

### 3. Task

- [ ] Creare branch feature/header-logged-parity
- [ ] Implementare controllo auth nell'header
- [ ] Aggiungere avatar support (Gravatar fallback)
- [ ] Verificare con Playwright/Puppeteer
- [ ] Merge PR e chiudere issue #280