---
title: "Contratti del tema Zero"
type: index
tags: [contracts, zero]
created: 2026-11-19
updated: 2026-11-24
---

# Contratti del tema Zero

Zero **non ha Action ne' classi PHP** (`app/` contiene solo `.gitkeep`, verificato da `tests/Unit/ThemeBoundariesTest.php`):
non promette comportamenti, quindi questa cartella non contiene contratti. E' l'unico indice della cartella (il vecchio
`INDEX.md`, con una riga «da scrivere», e' stato unito qui).

**Dove stanno i contratti applicativi:** nei moduli che il tema ospita, es. autenticazione e `LoginWidget`
(`Modules/User/docs/contracts/`), risoluzione delle pagine `[container0]` (`Modules/Cms/docs/contracts/`), consensi
(`Modules/Gdpr/docs/contracts/`).

**Quando leggere questa cartella:** mai per il tema in se'; se qualcuno aggiunge al tema una classe con effetti
collaterali, prima va rivisto l'[ADR](../adr/theme-as-dress-no-php.md), poi il contratto va qui nel formato del
[canon](../../../../Modules/Xot/docs/rules/action-behavioral-contract.md). Glossario del tema: [../glossary.md](../glossary.md).

## Contratti

Nessuno (il tema non ha Action).
