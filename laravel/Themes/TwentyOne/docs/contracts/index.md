---
title: "Indice dei contratti — TwentyOne"
type: index
theme: TwentyOne
status: active
created: 2026-11-27
updated: 2026-11-27
qmd: "twentyone contracts index"
---

# Indice dei contratti — TwentyOne

TwentyOne ha due Action, entrambe di sola lettura (preparano i dati di un blocco, non
scrivono nulla, non chiamano servizi esterni): per la regola del canon non servono
contratti. Non ci sono file `type: contract` e nessun invariante `<SCOPE>-INV-<N>`.

## Action lette (nessun contratto)

| Action | File | Perche' niente contratto |
|---|---|---|
| `app/Actions/Hero/ResolveCinematicHeroDataAction.php` | — | legge `Modules\Predict`, nessuna scrittura |
| `app/Actions/Markets/ResolveFeaturedMarketsGridDataAction.php` | — | delega a `GetHomepageMarketCardsAction` di `Modules\Predict` |

## Note

- `ResolveFeaturedMarketsGridDataAction::execute()` chiama `$this__(...)` invece di `$this->tx(...)`: difetto da correggere, non uno stile da copiare (vedi [README](README.md)).
- I contratti applicativi stanno nei moduli (`Modules/Cms`, `Modules/Predict`).
- Formato per un futuro contratto: [README.md](README.md) e [_template.md](_template.md).
