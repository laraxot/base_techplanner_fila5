# PHPStan Configuration Rule

## Regola Fondamentale

**Configurazione PHPStan ESCLUSIVAMENTE in `laravel/phpstan.neon`.**

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

## Comando Corretto

```bash
cd ./laravel
./vendor/bin/phpstan analyse --level=10
```

## Collegamenti

- [PHPStan Guidelines](../../docs/phpstan-guidelines.md)
- [Theme PHPStan Docs](../../laravel/Themes/Zero/docs/phpstan.md)
