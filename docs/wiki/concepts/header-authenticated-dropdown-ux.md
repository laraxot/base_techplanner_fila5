---
title: "Header Authenticated Dropdown — UX Design (R21)"
type: concept
sources:
  - "raw/repos/italia-design-comuni-pagine-statiche.md"
  - "raw/screenshots/fixcity-header-logged-dropdown.png"
confidence: high
created: 2026-06-05
updated: 2026-06-05
tags: [r21, header, dropdown, ux, design-comuni, mobile-responsive, bootstrap-italia]
related:
  - ../concepts/header-authenticated-state.md
  - ../memories/r21-header-authenticated-state.md
  - ../../stories/STORY-148-r21-header-implementation.md
  - ../../stories/STORY-147-header-logged-in-design-comuni-parity.md
issues:
  - https://github.com/laraxot/base_fixcity_fila5/issues/277
---

# Header Authenticated Dropdown — UX Design (R21)

> **Scopo**: definire design, contenuti, stati e comportamento responsive del dropdown utente autenticato nel slim header, allineato a Bootstrap Italia "Design Comuni".

## 1. Riferimento canonico

**URL**: https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-area-personale.html

**Sezione**: `header.it-header-wrapper > div.it-header-slim-wrapper > .it-header-slim-wrapper-content > .it-header-slim-right-zone > div.it-user-wrapper.nav-item.dropdown`

**Pattern canonico** (estratto HTML, 320-768px mobile + 992px+ desktop):

```html
<div class="it-user-wrapper nav-item dropdown">
  <a class="btn btn-primary btn-icon btn-full" data-bs-toggle="dropdown" data-focus-mouse="false"
     aria-haspopup="true" aria-expanded="false" aria-controls="header-user-menu">
    <span class="rounded-icon">
      <img src="..." alt="Mario Rossi" class="border rounded-circle icon-white" width="20" height="20">
    </span>
    <span class="d-none d-lg-block">Mario Rossi</span>           <!-- mobile: hidden -->
    <svg class="icon icon-white d-none d-lg-block">…it-expand</svg>  <!-- mobile: hidden -->
  </a>
  <div class="dropdown-menu" id="header-user-menu" role="menu" aria-labelledby="…">
    <ul class="link-list">
      <li><a class="dropdown-item list-item" href="#"><span>I miei servizi</span></a></li>
      <li><a class="dropdown-item list-item" href="#"><span>Le mie pratiche</span></a></li>
      <li><a class="dropdown-item list-item" href="#"><span>Notifiche</span></a></li>
      <li><span class="divider"></span></li>
      <li><a class="dropdown-item list-item" href="#"><span>Impostazioni</span></a></li>
      <li>
        <a class="list-item left-icon" href="#">
          <svg class="icon icon-primary icon-sm left">…it-external-link</svg>
          <span class="fw-bold">Esci</span>
        </a>
      </li>
    </ul>
  </div>
</div>
```

## 2. Screenshot "as-is" (bug)

Path: `/mnt/c/Users/Marco/Pictures/Screenshots/fixcity/header/logged-dropdown.png`

**Osservazioni** (dal PNG fornito dall'utente 2026-06-05):
- Slim bar: verde DC `#00402b` (corretto)
- Toggle avatar: cerchio **scuro/grigio scuro** (NON blu come `logged.png` vista in sessione precedente — qui il dropdown è aperto e copre parzialmente il toggle)
- Dropdown aperto, allineato a destra del toggle
- **5 voci** con testo verde DC `#007A52`:
  1. I miei servizi
  2. Le mie pratiche
  3. Notifiche
  4. (divider)
  5. Impostazioni
  6. (divider sottile)
  7. ↗ Esci (icona external-link + bold)
- Larghezza dropdown: ~250-280px (auto da contenuto)
- Sfondo bianco, padding consistente

**Conferma**: lo screenshot ha **2 divider** (prima di Impostazioni + prima di Esci), mentre il reference HTML ha **1 divider** (solo prima di Impostazioni). Lo screenshot è la "verità" che l'utente vuole come risultato finale → mantenere **2 divider** nel codice.

## 3. Stato attuale (Laraxot Sixteen)

File owner: `laravel/Themes/Sixteen/resources/views/components/sections/header/partials/user-dropdown.blade.php`

### Confronto reference vs nostro

| Elemento | Reference | Nostro (attuale) | Match |
|----------|-----------|------------------|-------|
| Wrapper | `it-user-wrapper nav-item dropdown` | `it-user-wrapper nav-item dropdown` | ✅ |
| Toggle classes | `btn btn-primary btn-icon btn-full` | `btn btn-primary btn-icon btn-full` | ✅ |
| Toggle `data-bs-toggle` | `dropdown` | `dropdown` | ✅ |
| Toggle `data-focus-mouse` | `false` | `false` | ✅ |
| Toggle `aria-expanded` | `false` | `false` | ✅ |
| Toggle `aria-haspopup` | `true` | `true` | ✅ |
| Toggle `aria-controls` | (implicito) | `header-user-menu` (migliorativo) | ✅ |
| Avatar container | `rounded-icon` | `rounded-icon` | ✅ |
| Avatar img classes | `border rounded-circle icon-white` | `border rounded-circle icon-white` | ✅ |
| Avatar size | 20×20 | 20×20 | ✅ |
| Username visibility | `d-none d-lg-block` | `d-none d-lg-block` | ✅ |
| Chevron visibility | `d-none d-lg-block` | `d-none d-lg-block` | ✅ |
| Menu `role` | `menu` | `menu` | ✅ |
| Item 1 | I miei servizi | I miei servizi | ✅ |
| Item 2 | Le mie pratiche | Le mie pratiche | ✅ |
| Item 3 | Notifiche (+ badge opzionale) | Notifiche (+ badge) | ✅ |
| Divider prima Impostazioni | SI (1 divider) | SI | ✅ |
| Item 4 | Impostazioni | Impostazioni | ✅ |
| Divider prima Esci | NO | SI (migliorativo) | ✅ |
| Item 5 | Esci (`list-item left-icon`, fw-bold) | Esci (form POST, fw-bold) | ✅+ |
| Esci icon | `it-external-link` | `it-external-link` | ✅ |

**Verdetto**: il dropdown **è già R21-compliant** per HTML/markup. Bug rimanenti (risolti in STORY-148 F1+F2):

- ❌ Toggle background: blu `#0066CC` (CSS layer 11 `.btn-primary`) invece di verde DC
- ❌ Avatar: Gravatar identicon blu "mp" invece di foto/iniziale (in alcune sessioni)
- ⚠️ Esci: POST form vs reference link — accettabile per sicurezza CSRF, ma migliorabile con link + JS confirm pattern

## 4. User Flow

```
[Header slim]                   
  ↓ click toggle
[Dropdown open]                 
  ├─ click "I miei servizi"  → /it/servizi (o tests/view servizi)
  ├─ click "Le mie pratiche" → /it/segnalazione-area-personale
  ├─ click "Notifiche"        → /it/segnalazione-area-personale (tab notifiche)
  ├─ click "Impostazioni"     → /it/segnalazione-area-personale (tab impostazioni)
  ├─ click "Esci"             → POST /logout → redirect /it
  └─ click outside / Esc      → close
```

**Mobile (<992px)**: solo avatar visibile nel toggle, click → dropdown full-width sotto il toggle.

## 5. Wireframe

### Desktop (≥992px)

```
┌──────────────────────────────────────────────────────────────────────┐
│  Nome della Regione                            ITA ⌄  [👤] Mario ⌄    │ ← slim bar 48px
└──────────────────────────────────────────────────────────────────────┘
                                                        ↓ click
                                              ┌────────────────────┐
                                              │ I miei servizi     │ ← green DC text
                                              │ ──────             │
                                              │ Le mie pratiche    │
                                              │ ──────             │
                                              │ Notifiche  [3]     │ ← badge unread
                                              │ ──────────         │ ← divider
                                              │ Impostazioni       │
                                              │ ──────────         │ ← divider
                                              │ ↗ Esci             │ ← bold + icon
                                              └────────────────────┘
```

### Mobile (<992px)

```
┌──────────────────────────────────────┐
│  Nome Regione     ITA ⌄       [👤]    │ ← solo avatar nel toggle
└──────────────────────────────────────┘
                              ↓ click
                  ┌────────────────────┐
                  │ I miei servizi     │
                  │ Le mie pratiche    │
                  │ Notifiche    [3]   │
                  │ ──────────         │
                  │ Impostazioni       │
                  │ ──────────         │
                  │ ↗ Esci             │
                  └────────────────────┘
```

## 6. Design tokens

| Token | Valore | Uso |
|-------|--------|-----|
| `--dc-primary` | `#007A52` | Testo link dropdown, focus ring |
| `--dc-green-dark` | `#00402b` | Bg toggle (override layer 13) |
| `--dc-green-light` | `#1a6049` | Hover toggle |
| `--dc-text-on-green` | `#ffffff` | Icon/avatar su toggle |
| `--dc-divider` | `#e6e6e6` | `<span class="divider">` |
| `--dc-dropdown-bg` | `#ffffff` | Sfondo dropdown |
| `--dc-dropdown-shadow` | `0 2px 12px rgba(0,0,0,0.12)` | Elevazione |
| Breakpoint | `992px` | `d-lg-block` username/chevron |

## 7. Accessibility (WCAG 2.1 AA)

| Criterio | Implementazione |
|----------|-----------------|
| **Perceivable** | |
| 1.4.3 Contrast | Toggle: white `#fff` su green `#00402b` = 9.7:1 (AAA) · Link: green DC su white = 4.6:1 (AA) |
| 1.4.11 Non-text contrast | Focus ring: 2px outline `--dc-primary` (contrasto 4.6:1) |
| 1.1.1 Non-text content | Avatar `<img alt="Mario Rossi">` |
| **Operable** | |
| 2.1.1 Keyboard | `Tab` → toggle · `Enter`/`Space` → open · `Esc` → close · arrow keys in menu |
| 2.4.7 Focus visible | `focus-visible` outline su `<a class="dropdown-item">` |
| 2.5.5 Target size | Touch target ≥ 44×44px (item dropdown) |
| **Understandable** | |
| 3.2.4 Consistent | Stesso pattern in tutte le pagine authenticated |
| **Robust** | |
| 4.1.2 Name, role, value | `role="menu"` + `role="menuitem"` + `aria-haspopup` + `aria-expanded` + `aria-controls` |
| 4.1.3 Status messages | Badge notifiche `aria-live="polite"` quando count cambia |

**Skip-link**: il `<a class="visually-hidden-focusable" href="#main-container">` è già presente nella pagina (NON nel header) — OK.

## 8. Component contract

```php
// Props accettati dal partial user-dropdown.blade.php
@props([
    'avatarUrl' => null,                    // string|null
    'displayName' => 'Account',              // string
    'unreadNotificationsCount' => 0,         // int
    'userInitial' => 'A',                    // string (1 char uppercase)
])
```

**Regole di rendering**:
1. `avatarUrl` valido (NON gravatar.com, NON empty SHA hash) → `<img>`
2. Altrimenti → `<span>{{ $userInitial }}</span>` con classe `icon-white fw-bold text-uppercase`
3. `displayName` sempre visibile **solo** su `d-lg-block` (≥992px)
4. Chevron `it-expand` sempre visibile **solo** su `d-lg-block`
5. `unreadNotificationsCount > 0` → badge `<span class="badge badge-primary ml-2">{{ N }}</span>`

## 9. Implementazione gap (link a STORY-148)

| ID | Attività | Story | Stato |
|----|----------|-------|-------|
| F1 | CSS override `.it-header-slim-right-zone .btn-primary` bg = verde DC | STORY-148 | ⏳ pending |
| F2 | Avatar resolver skip `gravatar.com` (anche in `Profile::getAvatarUrl`) | STORY-148 | ⏳ pending |
| F3 | `@deprecated` su 5 file vecchi | STORY-148 | ⏳ pending |
| F4 | Pest test `HeaderV1SlimDropdownContractTest` extend + Playwright | STORY-148 | ⏳ pending |
| F5 | Docs + AGENTS.md + trigger map | STORY-148 | ⏳ pending |

## 10. Note di design

1. **Perché 2 divider e non 1**: lo screenshot fornito mostra 2 divider (prima di Impostazioni + prima di Esci). Il reference HTML ufficiale ha 1 divider. Manteniamo 2 perché lo screenshot è la "verità utente" e il dropdown così ha una separazione visiva tra azioni di navigazione e azione distruttiva (logout).

2. **Perché `<a>` e non `<button>` per Esci**: il reference usa `<a>`, ma per protezione CSRF in Laravel serve POST. Soluzione attuale: `<form method="POST" action="{{ route('logout') }}">` con `<button>` interno. Trade-off accettabile. Alternativa futura: link con `onclick="event.preventDefault(); document.getElementById('logout-form').submit();"`.

3. **Badge notifiche**: reference HTML non mostra badge. Aggiunto per supportare R21 unread count. Posizionato inline dopo il testo "Notifiche" con `ml-2`.

4. **Lingua switcher**: posizionato a sinistra del user dropdown nello slim right zone. Stesso pattern dropdown ma solo 2 voci (ITA/ENG).

## 11. Relazioni

- Concetto: [concepts/header-authenticated-state.md](../concepts/header-authenticated-state.md) — design religion R21
- Memory: [memories/r21-header-authenticated-state.md](../memories/r21-header-authenticated-state.md) — religion summary
- Story UX: [STORY-147-header-logged-in-design-comuni-parity.md](../../stories/STORY-147-header-logged-in-design-comuni-parity.md) — screenshot + investigation
- Story impl: [STORY-148-r21-header-implementation.md](../../stories/STORY-148-r21-header-implementation.md) — F1-F5 acceptance criteria
- Issue: https://github.com/laraxot/base_fixcity_fila5/issues/277
- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-area-personale.html
