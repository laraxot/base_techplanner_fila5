---
title: "Indice dei contratti — Theme Zero"
type: index
theme: Zero
status: active
created: 2026-11-27
updated: 2026-11-27
qmd: "theme zero contracts index"
---

# Indice dei contratti — Theme Zero

**Nessun contract in Zero.** Il tema non ha Action di dominio (`app/` contiene solo
`.gitkeep`) e le sue superfici sono viste Blade anonime (`resources/views/components/layouts/*`,
`components/blocks/*`, `pages/*`) senza classe PHP: un `presentation-contract` richiede
`contract: <FQCN>` e un `@see` dalla classe, che qui non esistono. I contratti
applicativi stanno nei moduli.

## Contratti

| Contratto | Action | File | Invarianti (group Pest) |
|---|---|---|---|
| — | — | Nessuno | — |

## Note

- Se una vista del tema diventasse un componente con classe (`View\Components\...`), scrivere allora un `presentation-contract` con `type: presentation-contract` e `contract: <FQCN>`.
- Formato per un futuro contratto: [README.md](README.md) e [_template.md](_template.md).
