# CRITICAL RULE: Never Pass --level to PHPStan

## 🚨 ABSOLUTE RULE

**NEVER pass `--level` parameter to PHPStan command.**

## ❌ WRONG
```bash
./vendor/bin/phpstan analyse --level=10 Modules/Xot
```

## ✅ CORRECT
```bash
./vendor/bin/phpstan analyse Modules/Xot --memory-limit=-1
```

**The level is configured in `phpstan.neon` and must NOT be overridden or modified.**

## 🔒 NEVER MODIFY phpstan.neon — SOLO UTENTE (IO)

**CRITICAL**: `laravel/phpstan.neon` è **immutabile per gli agenti**. Solo l'utente (IO) può modificarlo.

Gli agenti: **leggere** il neon, **eseguire** PHPStan, **correggere il codice** in `Modules/`. Mai edit sul file neon.

Standing rule: [phpstan-neon-user-only-standing.md](../memories/phpstan-neon-user-only-standing.md)

### ❌ FORBIDDEN (agenti)
```bash
# ❌ NEVER edit phpstan.neon
vim phpstan.neon
sed -i 's/level: 10/level: 5/' phpstan.neon
```

### ✅ ONLY ALLOWED
```bash
# ✅ Use it for analysis only
./vendor/bin/phpstan analyse Modules --memory-limit=-1
```

**Modifying phpstan.neon breaks the entire quality system.**

---

**Last Updated**: December 15, 2025  
**Status**: ABSOLUTE - NO EXCEPTIONS  
**Mantra**: "Use phpstan.neon, never modify it."
