---
title: "Module Test Location Rule"
type: concept
sources: ["laravel/Modules/Notify/docs/llm-wiki/raw/articles/module-test-location-rule.md"]
confidence: high
created: 2026-04-21
updated: 2026-04-21
tags: [testing, architecture, laraxot, bounded-context, ddd, all-modules]
related:
  - concepts/laraxot-architecture.md
  - concepts/phpstan-central-config-rule.md
---

# Regola: I Test Appartengono al Modulo (Project-Wide)

## Principio

In Laraxot, ogni modulo/tema è un **bounded context autonomo**. I test appartengono al
bounded context che testano: SEMPRE dentro il modulo, mai nell'applicazione host.

## Struttura del Progetto

```
/var/www/_bases/base_fixcity_fila5/            ← ROOT PROJECT (conductor/monorepo)
  tests/                                        ← SOLO test del conductor (rarissimi)
  laravel/
    tests/                                      ← SOLO test della Laravel app host
    Modules/
      <Name>/
        tests/                                  ← QUI i test del modulo ✓
          Feature/
          Unit/
          Pest.php
          TestCase.php
    Themes/
      <Name>/
        tests/                                  ← QUI i test del tema ✓
```

## La Regola in Una Frase

> "I test di un modulo seguono il modulo, non l'host."

## Tre Livelli, Tre Destinatari

| Directory | Destinatario | Usare per |
|-----------|-------------|-----------|
| `tests/` (root progetto) | Conductor/monorepo | Test del sistema di conduzione |
| `laravel/tests/` | Laravel app host | Test dell'app host |
| `laravel/Modules/<X>/tests/` | Modulo X | **Test del modulo X** ← UNICA SCELTA |
| `laravel/Themes/<X>/tests/` | Tema X | **Test del tema X** ← UNICA SCELTA |

## Anti-Pattern e Causa Radice

**Incidente 2026-04-21:** I test del modulo Notify (50+ file) sono stati creati in `tests/Feature/`
e `tests/Unit/` alla ROOT del progetto, dove erano già presenti correttamente in
`laravel/Modules/Notify/tests/` sin dal 16 aprile.

**Causa:** La skill `pest-testing` (da laravel/boost) è per app monolitiche e dice
`tests/Feature` come path generico. In Laraxot, questo va sempre letto come
`laravel/Modules/<CurrentModule>/tests/Feature/`.

## Come Applicare

Prima di creare qualsiasi test, rispondere: "A quale modulo appartiene il codice che sto testando?"

```
Notify   → laravel/Modules/Notify/tests/
User     → laravel/Modules/User/tests/
Cms      → laravel/Modules/Cms/tests/
Geo      → laravel/Modules/Geo/tests/
UI       → laravel/Modules/UI/tests/
Xot      → laravel/Modules/Xot/tests/
Sixteen  → laravel/Themes/Sixteen/tests/
```

## Relazioni con Altri Concetti

- L'architettura Laraxot tratta i moduli come unità deployabili autonome
- La stessa regola si applica a: `docs/`, `lang/`, `config/`, `resources/`
- Vedi anche: `testing-rules.md` in `laravel/Modules/Notify/docs/` per regole Pest specifiche

## Documentazione di Test (File .md)

La stessa logica si applica alla **documentazione relativa ai test** (file .md):

| Tipo Documentazione | Posizione Corretta |
|----------------|----------------|
| Test SMTP/Email docs | `Modules/Notify/docs/` |
| Test S3/Storage docs | `Modules/Media/docs/` |
| Test Auth docs | `Modules/Activity/docs/` |
| Test UI/Frontend docs | `Modules/UI/docs/` |
| Test Generale | `Modules/Xot/docs/` (modulo base) |

**NO:** `docs/test-*.md` (root)
**SÌ:** `Modules/{Modulo}/docs/test-*.md`

Vedi: [no-root-test-docs-rule.md](./concepts/no-root-test-docs-rule.md)
