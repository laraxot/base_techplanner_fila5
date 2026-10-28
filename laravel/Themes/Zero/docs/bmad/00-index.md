---
title: "Zero Theme - Documentation Index"
type: concept
tags: ['filament', 'laravel', 'charts', 'testing']
created: 2026-07-14
updated: 2026-10-20
qmd: "zero theme documentation index bmad scopo purpose phpstan modules gate stack reale"
related:
  - "./scopo.md"
  - "./purpose.md"
  - "../README.md"
id: zero-docs-bmad-00-index
slug: 00-index
description: "Indice BMAD del tema Zero. Ingresso docs: ../README.md. Nome 00-index.md minuscolo (niente gemello 00-INDEX.md)."
document_type: concept
category: documentation
status: active
issues: []
discussions: []
---

# Zero Theme — indice BMAD

**Aggiornato**: 2026-10-20  
**Ingresso docs del tema**: [../README.md](../README.md)  
**Nome file**: `00-index.md` (lowercase). Non creare `00-INDEX.md`: collisione su FS case-insensitive e regola nomi minuscoli (eccezione solo `README.md`).

## Perche' / confini (leggere prima)

1. [scopo.md](./scopo.md) — perche' Zero esiste in questo repo (IT, misurato)
2. [purpose.md](./purpose.md) — bridge EN verso `scopo.md`
3. [../wiki/concepts/theme-zero-operating-focus.md](../wiki/concepts/theme-zero-operating-focus.md) — focus agenti
4. [../concepts/xotbase-never-extend-filament.md](../concepts/xotbase-never-extend-filament.md) — confini Filament/Xot

## Navigazione rapida

### Essenziali
1. [theme-overview.md](./theme-overview.md) — panoramica lunga
2. [architecture.md](./architecture.md) — pattern "vestito"
3. [layouts.md](./layouts.md) / [components.md](./components.md) / [customization.md](./customization.md)
4. [model-docs-governance.md](./model-docs-governance.md) — igiene nomi/docs

### Sviluppo
- [filament-chart-integration.md](./filament-chart-integration.md)
- [phpstan.md](./phpstan.md) — gate agenti su **Modules** (vietato analyse solo-tema; policy [phpstan-neon-user-only](../../../../../docs/wiki/rules/phpstan-neon-user-only.md))
- [dry-kiss-best-practices.md](./dry-kiss-best-practices.md)
- Il tema non ha PHP di dominio in `app/`: il gate Modules non lo copre.
- **Boy scout post-zero:** dopo Modules a zero continua solo igiene docs/viste/asset (`app/` vuota); niente PHPStan theme-only. Story: [docs-temi-audit-organizzazione](../stories/docs-temi-audit-organizzazione.story.md). Ingresso: [../README.md](../README.md).
- [authentication.md](./authentication.md) / [mail-layouts.md](./mail-layouts.md)

### Stack reale del tema (package.json + codice)

| Technology | Version | Role in Zero |
|------------|---------|--------------|
| Tailwind CSS | 3.4.x | Utility CSS |
| Alpine.js | 3.x | Interattivita' leggera |
| Flowbite | 4.x | Componenti UI JS |
| Vite | 6.x | Build assets |
| Laravel / Filament | monorepo | Usati dai moduli; Zero fornisce view/override |

Guide che ancora citano Tailwind v4 / Flux / Volt come stack del tema sono **debito**: allineare quando si tocca quella guida. Dettaglio: [scopo.md](./scopo.md).

### Risorse correlate

- Cms (non presente in questo repository) — risoluzione pagina/blocchi
- [Lang — scopo](../../../../Modules/Lang/docs/scopo.md) — i18n
- [Xot — indice](../../../../Modules/Xot/docs/00-index.md) — foundation
- [AGENTS.md](../../../../AGENTS.md) — linee guida monorepo (root, non wiki tema)
