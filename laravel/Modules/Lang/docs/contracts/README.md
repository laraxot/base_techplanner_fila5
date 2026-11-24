---
title: "Contratti — Lang"
type: index
owner: Lang
updated: 2026-11-24
qmd: "Lang contract language switcher presentation-contract localizzazione invarianti LANG-SWITCHER"
---

# Contratti — Lang

Un contract descrive una superficie del modulo Lang con comportamento promesso. Oggi sono tutti contract di presentazione del language switcher (nessuna Action di scrittura ha un contract). Standard: [contract-authoring-standard](../../../Xot/docs/contracts/contract-authoring-standard.md); governance: [ADR 0012](../../../Xot/docs/adr/0012-behavioral-contract-governance.md).

## Formato

Contract di Action: frontmatter `type: contract` e `action: "Modules\\Lang\\Actions\\..."`, sezioni `## Input`, `## Output`, `## Invarianti`, `## Effetti collaterali`, `## Errori`, `## Non fa`. Contract non-Action: `type: presentation-contract` e `contract: <FQCN>`, senza obbligo delle sei sezioni. Invarianti con ID stabile e test Pest con `->group('<ID>')`. Registro: [INDEX.md](INDEX.md).

## File presenti

- [language-switcher](language-switcher.md) (presentation-contract; definisce `LANG-SWITCHER-001..003`, in inglese)
- [language-switcher-component](language-switcher-component.md) (presentation-contract per `Modules\Lang\View\Components\LanguageSwitcher`)
- [language-switcher-view-data](language-switcher-view-data.md) (`type: contract` ma senza `action` né sei sezioni complete: descrive i dati prodotti da `LanguageSwitcherWidget`)
- Template: [_template](_template.md)

I tre file si sovrappongono parzialmente (stesso componente, stessi ID); consolidarli è lavoro futuro: non sono stati riscritti.
