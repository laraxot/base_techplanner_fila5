---
title: "ADR: `<x-page>` — contratto fisso `side` + `slug` + `data`"
type: "adr"
tags: [adr, cms, x-page, folio, architecture, dry, kiss]
module: "root"
---

# ADR: `<x-page>` — contratto fisso `side` + `slug` + `data`

**Status:** ✅ Accettato  
**Data:** 2026‑06‑04  
**Autore:** Architect Agent  
**Relativo a:** Folio, Volt, CMS, Themes (Sixteen, TwentyOne), Moduli (Fixcity, Blog, Predict, etc.)

---

## Contesto

Il componente `<x-page>` è il ponte tra il routing Folio (che espone `[container0]` e `[slug0]`) e il sistema CMS che carica i blocchi da JSON.

Storicamente c'erano due pattern in competizione:

| Pattern | Esempio | Problema |
|---------|---------|----------|
| **A – Variabili esplicite** | `<x-page side="content" :slug="$pageSlug" :data="$data" :container0="$container0" :slug0="$slug0" />` | Viola **DRY** e **KISS**: `container0` e `slug0` sono **già** dentro `$data`. Se aggiungiamo 1.000 container, dobbiamo cambiare la signature del componente 1.000 volte. |
| **B – Data bag opaco (scelto)** | `<x-page side="content" :slug="$pageSlug" :data="$data" />` | Un solo contratto fisso. Il componente accetta solo `side`, `slug` e `data`. Tutto il contesto (container, slug, parametri extra) viaggia dentro `data`. |

---

## Decisione

**Regola obbligatoria:** **MAI** passare `:container0`, `:slug0` o qualsiasi altra variabile «espansa» come prop separata al componente `<x-page>`.

L'unico contratto ammesso è:

```blade
<x-page
    side="content"
    :slug="$pageSlug"
    :data="$data"
/>
```

Dove:

- `$pageSlug` = `"container0.view"` (es. `tickets.view`, `events.view`, `predicts.view`)
- `$data` = array associativo che **deve** contenere almeno:
  ```php
  ['container0' => $container0, 'slug0' => $slug0]
  ```

I moduli e i temi **non** devono fare assunzioni su chiavi aggiuntive; leggono tutto da `$data`.

---

## Conseguenze

### Positive
- **Estendibilità infinita:** nuovi container non richiedono modifiche al componente.
- **Testabilità:** basta mockare `$data`.
- **Semplicità cognitiva:** un solo contratto, una sola regola.

### Negative
- I template esistenti che usavano il pattern A vanno migrati (one‑shot).
- Documentazione e skill vanno aggiornate per riflettere la regola.

---

## Implementazione

1. **Blade generico (Folio + Volt)** – `Themes/*/resources/views/pages/[container0]/[slug0]/index.blade.php`:
   ```php
   $this->data = ['container0' => $container0, 'slug0' => $slug0];
   ```
   ```blade
   <x-page side="content" :slug="$pageSlug" :data="$data" />
   ```

2. **Componente `<x-page>`** – `Modules/Cms/View/Components/Page.php`:
   - Legge `$this->data['container0']` e `$this->data['slug0']` internamente.
   - Non espone proprietà pubbliche `container0` / `slug0`.

3. **Moduli** – Passano parametri extra **solo** dentro `$data`:
   ```php
   $data = ['container0' => 'events', 'slug0' => $id, 'predictId' => $predictId];
   ```

---

## Referenze

- `docs/wiki/concepts/x-page-data-bag-only.md` (Sixteen)
- `docs/wiki/guidelines/predict-platform.blade.php`
- `Modules/Cms/View/Components/Page.php`
- `Themes/Sixteen/resources/views/pages/[container0]/[slug0]/index.blade.php`

---

## Changelog

| Data | Versione | Descrizione |
|------|----------|-------------|
| 2026‑06‑04 | 1.0 | Prima stesura – regola DRY/KISS per `<x-page>` |

---

*Questa ADR fa parte del *Second Brain* del progetto FixCity.  
Mantenuta in `docs/wiki/concepts/` e indicizzata in `INDEX.md`.*