# Rule 018: No Wizard Step Page Blades

**Status**: CRITICAL  
**Created**: 2026-05-23  
**Priority**: MANDATORY  
**Related**: [#77](https://github.com/laraxot/base_fixcity_fila5/issues/77), [011-blocks-view-convention.md](./011-blocks-view-convention.md), [016-wizard-widgets-use-xotbasewizardwidget.md](./016-wizard-widgets-use-xotbasewizardwidget.md)

---

## The Rule

> **Il flusso wizard segnalazione ha un solo entrypoint Livewire (`segnalazione-crea`).  
> NON devono esistere blade CMS per step wizard (01 privacy, 02 dati, 03 riepilogo).**

---

## Perché (business logic)

| Design Comuni (reference statico) | FixCity (runtime) |
|-----------------------------------|-------------------|
| `segnalazione-01-privacy.html` | Step 1 — **Filament Wizard** |
| `segnalazione-02-dati.html` | Step 2 — **Filament Wizard** |
| `segnalazione-03-riepilogo.html` | Step 3 — **Filament Wizard** |
| Pagine HTML separate | **Una URL**: `/it/tests/segnalazione-crea` |

Duplicare step in blade (`blocks/tests/segnalazione-02-dati.blade.php`, ecc.):

1. Rompe la submit chain Livewire ([#75](https://github.com/laraxot/base_fixcity_fila5/issues/75))
2. Viola [rule 011](./011-blocks-view-convention.md) (tipo blocco = nome pagina)
3. Duplica markup, traduzioni, CSS parity
4. Diverge da `CreateTicketWizardWidget` (SSoT schema + submit)

---

## Consentito

| Artefatto | Ruolo |
|-----------|--------|
| `pages/tests/[slug].blade.php` | Unica Folio blade per `/it/tests/*` |
| `blocks/tests/segnalazione-crea.blade.php` | `@livewire(CreateTicketWizardWidget)` |
| Redirect slug legacy → `segnalazione-crea?step=N` | Middleware/config/CMS (`_legacy_redirect_step` nei JSON), **non** in `[slug].blade.php` |
| `blocks/tests/segnalazione-04-conferma.blade.php` | Pagina **post-submit** (non step wizard) |
| Docs/reference `segnalazione-02-dati.html` in `docs/` | Parity Design Comuni (non runtime) |

---

## Vietato

```
❌ blocks/tests/segnalazione-01-privacy.blade.php
❌ blocks/tests/segnalazione-02-dati.blade.php
❌ blocks/tests/segnalazione-03-riepilogo.blade.php
❌ blocks/flow/segnalazione/01-privacy.blade.php
❌ blocks/flow/segnalazione/02-dati.blade.php
❌ blocks/flow/segnalazione/03-riepilogo.blade.php
❌ pages/tests/segnalazione-02-dati.blade.php
```

---

## Pattern canonico

**Renderer Folio** — solo mount + loop blocchi (vedi [`clean-volt-route-files-pattern.md`](../concepts/clean-volt-route-files-pattern.md)):

```php
// pages/tests/[slug].blade.php — mount()
$this->pageSlug = $slug ? 'tests.'.$slug : 'tests';
$this->blocks = Page::getBlocksBySlug($this->pageSlug, 'content');
```

**Entry wizard** — un solo block:

```blade
{{-- blocks/tests/segnalazione-crea.blade.php --}}
@livewire(\Modules\Fixcity\Filament\Widgets\CreateTicketWizardWidget::class, ['blockData' => $data])
```

**Compat legacy Design Comuni** — fuori dal router:

```php
// ✅ config/middleware — NON nel Folio [slug].blade.php
// es. LegacyWizardRedirectMiddleware + config('fixcity.wizard.legacy_redirects')
// oppure metadati CMS _legacy_redirect_step nei JSON pagina
```

---

## Documentazione owner

| Scope | Path |
|-------|------|
| Wizard Fixcity | [ticket-wizard-frontoffice.md](../../../laravel/Modules/Fixcity/docs/ticket-wizard-frontoffice.md) |
| CMS blocks Sixteen | [CMS-DRIVEN-BLOCKS.md](../../../laravel/Themes/Sixteen/docs/architecture/CMS-DRIVEN-BLOCKS.md) |
| Architettura agenti | [architecture.md](../agents/rules/architecture.md) |

---

**Enforced by**: code review, repository search for forbidden wizard-step page Blades and hardcoded step mappings  
**Violations**: 0 (must remain 0)
