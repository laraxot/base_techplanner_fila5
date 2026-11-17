---
title: "Module Vendor Isolation Rule"
type: rule
sources: ["session-2026-05-20"]
confidence: high
created: 2026-05-20
updated: 2026-05-20
tags: [modules, vendor, composer, phpstan, dependency-management, laraxot]
related:
  - rules/quality-gate-after-edit.md
  - rules/post-modifica-verifica-obbligatoria.md
  - concepts/llm-wiki-operational-discipline.md
---

# Module Vendor Isolation Rule

**REGOLA**: In una struttura a moduli (laravel/Modules/), ogni modulo può avere un proprio `composer.json` con le sue dipendenze, ma **NON deve avere una cartella `vendor/` locale**.

## Problema

Se un modulo ha una cartella `vendor/` locale, questa shadowa le dipendenze principali del progetto (quelle in `laravel/vendor/`), causando errori come:

```
Class Modules\Xot\States\XotBaseState extends unknown class Spatie\ModelStates\State
```

Anche se il pacchetto è correttamente dichiarato nel `composer.json` del modulo.

## Logica di Risoluzione

Quando PHPStan (o altri tool) segnalano `extends unknown class` per una dipendenza Spatie/Laravel:

1. **Riconoscere il modulo** dal namespace — es. `Modules\Xot\States\XotBaseState` → modulo **`Xot`**
2. **Verificare** `laravel/Modules/Xot/composer.json` — il pacchetto deve essere in `require` (es. `spatie/laravel-model-states`)
3. **Cancellare vendor locale del modulo** — `rm -rf laravel/Modules/Xot/vendor/` (mai `composer install` dentro il modulo)
4. **Risolvere dal root Laravel** — `cd laravel && composer update -W` (merge-plugin unisce `Modules/*/composer.json` nel vendor centrale)
5. **Verificare** — `class_exists('Spatie\ModelStates\State')` e PHPStan sul file

### Esempio concreto (Xot + model-states)

```bash
# Namespace → modulo Xot
grep model-states laravel/Modules/Xot/composer.json

# Vendor locale = shadow autoload → errore PHPStan
rm -rf laravel/Modules/Xot/vendor/
rm -rf laravel/Modules/*/vendor/   # audit: nessun vendor sotto Modules/

cd laravel && composer update spatie/laravel-model-states -W

./vendor/bin/phpstan analyse Modules/Xot/app/States/XotBaseState.php
```

**Non usare stub PHPStan** per pacchetti installati in `laravel/vendor/` — analisi contro API reale.

## Perché Funziona

- I moduli Laraxot usano `nwidart/laravel-modules` per il caricamento
- Le dipendenze dei moduli vengono risolte dal `composer.json` root (`laravel/composer.json`)
- Un `vendor/` locale nel modulo crea un autoload separato che shadowa quello principale
- Rimuovendo il vendor locale, tutte le classi vengono caricate dall'autoload centrale

## Anti-Pattern

- ❌ Creare `vendor/` locali nei moduli
- ❌ Eseguire `composer install` dentro una cartella modulo
- ❌ Ignorare errori "unknown class" senza verificare la struttura vendor

## Best Practices

- ✅ Dichiarare tutte le dipendenze nel `composer.json` del modulo
- ✅ Eseguire `composer update -W` dalla cartella `laravel/` root
- ✅ Verificare che non esistano `vendor/` locali nei moduli
- ✅ Usare `find laravel/Modules -name "vendor" -type d` per audit periodici

## Audit Script

```bash
# Verifica presenza di vendor locali nei moduli
find laravel/Modules -name "vendor" -type d 2>/dev/null | while read d; do
  echo "⚠️ VENDOR LOCALE TROVATO: $d"
  echo "   Risoluzione: rm -rf $d && cd laravel && composer update -W"
done
```

---

*Creato: 2026-05-20 — Risoluzione errore Spatie\ModelStates\State nel modulo Xot*
