---
title: "Indice degli ADR — Meetup"
type: index
theme: Meetup
status: active
updated: 2026-11-27
---

# Indice degli ADR — Meetup

| ADR | Stato | Perché | Conferma |
|---|---|---|---|
| [0001-meetup-delegates-domain-logic](0001-meetup-delegates-domain-logic.md) | accepted | Meetup delega la logica ai moduli: il tema resta sostituibile e ogni integrazione ha un owner esplicito. | Verifica di rotte, Blade e asset + test del tema e PHPStan |
| [0002-auth-forms-are-module-widgets](0002-auth-forms-are-module-widgets.md) | accepted | Login (User) e registrazione con consensi (Gdpr) sono widget Filament dei moduli, non componenti Livewire del tema. | Sì: `tests/Unit/PagesAndAuthFormsContractTest.php` |
| [0003-public-pages-from-json-via-x-page](0003-public-pages-from-json-via-x-page.md) | accepted | Le pagine pubbliche sono JSON del CMS resi da `<x-page>`: niente Blade per pagina, niente controller, niente resolver di tipo nel tema. | Sì: `tests/Unit/PagesAndAuthFormsContractTest.php` (parziale: solo le quattro pagine generiche) |

Formato e regole: [README](README.md).
