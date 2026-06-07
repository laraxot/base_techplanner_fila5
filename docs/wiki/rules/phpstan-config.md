# PHPStan Configuration Rule

## Regola Fondamentale

**Configurazione PHPStan ESCLUSIVAMENTE in `laravel/phpstan.neon`.**

**Solo l'utente (IO)** può modificare `phpstan.neon`. Gli agenti: **vietato** qualsiasi edit — eseguire analisi e correggere solo codice in `Modules/`.

Standing rule: [phpstan-neon-user-only-standing.md](../memories/phpstan-neon-user-only-standing.md)

### ❌ VIETATO
- `phpstan.neon.dist` in moduli o temi
- `phpstan*.json` file di output committati
- Configurazioni alternative o parallele
- File di analisi sparsi nei temi/moduli

### ✅ PERMESSO
- `laravel/phpstan.neon` - Configurazione unica e centralizzata
- Output temporanei esclusi da `.gitignore`

## Pattern Corretto

```
laravel/
└── phpstan.neon          # UNICA fonte di verità
```

## Anti-Pattern (VIETATO)

```
laravel/Themes/Zero/phpstan_themes_zero.json     ❌
laravel/Modules/Xot/phpstan.neon.dist            ❌
```

## File Output PHPStan

File come `phpstan_themes_zero.json`:
- Sono output temporanei di analisi
- Vanno aggiunti a `.gitignore`
- **MAI committati nel repository**

## .gitignore

Aggiungere ai `.gitignore` di moduli e temi:
```
# PHPStan output files
phpstan*.json
```

## excludePaths — test annidati

I moduli usano sia `tests/` sia `Tests/` (es. Tenant: `Modules/Tenant/Tests/Unit/`). Il pattern a un solo livello **non** esclude le sottocartelle:

```neon
# ❌ non basta — analizza ancora Tests/Unit/*.php
- ./*/Tests/*

# ✅ ricorsivo
- ./*/tests/**
- ./*/Tests/**
```

Sintomo: centinaia di errori `method.internalClass` (Pest) su file sotto `Tests/Feature`, `Tests/Unit`, ecc.

## Comando Corretto

```bash
cd laravel
./vendor/bin/phpstan analyse --memory-limit=-1
```

Livello e path sono in `phpstan.neon` — **mai** passare `--level` da CLI.

## Pre-flight lang (parse blocker)

Prima di `./vendor/bin/phpstan analyse`, se compaiono errori `phpstan.parse` su file sotto `lang/`:

1. Cercare marker merge: `grep -r '^<<<<<<<' Modules/*/lang --include='*.php'`
2. Eliminare path duplicati `lang/lang/` (es. Job: usare solo `Modules/Job/lang/it/`)
3. Validare sintassi: `php -l` sui file segnalati

Dettaglio: [phpstan-modules-zero-2026-06-06.md](../memories/phpstan-modules-zero-2026-06-06.md).

## Collegamenti

- [PHPStan Guidelines](../../docs/phpstan-guidelines.md)
- [Theme PHPStan Docs](../../laravel/Themes/Zero/docs/phpstan.md)
