---
title: "Contratti — Theme Zero"
type: index
owner: Zero
updated: 2026-11-24
qmd: "Theme Zero contract presentation-contract assenti viste Blade anonime"
---

# Contratti — Theme Zero

Standard: [contract-authoring-standard](../../../../Modules/Xot/docs/contracts/contract-authoring-standard.md) (sezione «Contratti non-Action»).

## Stato

**Nessun contract in Zero.** Motivo: il tema non ha Action di dominio (`app/` contiene solo `.gitkeep`) e le sue superfici sono viste Blade anonime (`resources/views/components/layouts/*`, `components/blocks/*`, `pages/*`) senza classe PHP: un `presentation-contract` richiede `contract: <FQCN>` e un `@see` dalla classe, che qui non esistono. I contratti applicativi stanno nei moduli. Il vecchio segnaposto `BC-T01` («Render layout autenticato», «da scrivere») è stato rimosso dall'indice perché non descriveva comportamento implementato.

Se una vista del tema diventasse un componente con classe (`View\Components\...`), scrivere allora un `presentation-contract` con `type: presentation-contract` e `contract: <FQCN>`.

## File presenti

- [INDEX.md](INDEX.md): registro operativo e backlog
