# REGOLA COMBINATA: NO ROOT FOLDERS

## FONDAMENTO

In un progetto modulare come Laraxot (multi-modulo, multi-tema), 
**ogni risorsa belong al suo modulo/tema**.

## CARTELLE VIETATE IN ROOT

### 0. Directory strutturali vietate ovunque

Queste directory non sono ammesse ne in root ne in moduli/temi:

```
# ❌ VIETATO:
docs/archive/
laravel/Modules/Xot/_docs/
laravel/Modules/Xot/lang/lang/

# ✅ CORRETTO:
docs/wiki/_archive/                 # solo sezione canonica LLM Wiki
laravel/Modules/Xot/docs/
laravel/Modules/Xot/lang/it/
```

`docs/archive/` e diverso da `docs/wiki/_archive/`: il primo e vietato, il secondo e una cartella canonica della wiki.

---

### 1. `lang/` - VIETATO ASSOLUTAMENTE

Le traduzioni devono essere nei moduli/temi:

```
# ❌ VIETATO:
lang/en/notification.php

# ✅ CORRETTO:
laravel/Modules/Notify/lang/en/notification.php
laravel/Modules/Activity/lang/it/activities.php
laravel/Themes/Sixteen/lang/it/segnalazione.php
```

**NOTA CRITICA (Laravel 12):** per questo repository la root corretta delle traduzioni host è `lang/`, non `resources/lang/`.

---

### 2. `docs/` - VIETATO ASSOLUTAMENTE

La documentazione deve essere nei moduli/temi:

```
# ❌ VIETATO:
docs/test-smtp.md

# ✅ CORRETTO:
laravel/Modules/Notify/docs/test-smtp.md
```

**ECCEZIONE:** `docs/wiki/` è accettabile per overview globali della LLM Wiki.

---

### 3. `tests/` - VIETATO ASSOLUTAMENTE

I test del modulo devono essere nel modulo:

```
# ❌ VIETATO:
tests/Unit/Actions/SendEmailActionTest.php

# ✅ CORRETTO:
laravel/Modules/Notify/tests/Unit/Actions/SendEmailActionTest.php
```

---

## TABELLA RIASSUNTIVA

| Risorsa | Root | Modulo/Tema |
|--------|------|-------------|
| Traduzioni lang/ | ❌ VIETATO | ✅ `Modules/{X}/lang/` |
| Traduzioni resources/lang/ | ❌ ERRATO (legacy/non usato) | - |
| Traduzioni lang/lang/ | ❌ VIETATO | ✅ `Modules/{X}/lang/{locale}/` |
| Documentazione docs/ | ❌ VIETATO | ✅ `Modules/{X}/docs/` |
| Documentazione docs/archive/ | ❌ VIETATO | ✅ `docs/wiki/_archive/` solo per wiki |
| Documentazione _docs/ | ❌ VIETATO | ✅ `docs/` del modulo/tema |
| Documentazione docs/wiki/ | ✅ OK (overview) | ✅ |
| Test tests/ | ❌ VIETATO | ✅ `Modules/{X}/tests/` |

---

## ESEMPIO PRATICO

|资源 类型 |路径 错误 |路径 正确 |
|----------|----------|----------|
| Notifiche italiano | `lang/it/notification.php` | `Modules/Notify/lang/it/notification.php` |
| UI inglese | `lang/en/ui.php` | `Modules/UI/lang/en/ui.php` |
| Tema segnalazioni | `lang/it/segnalazione.php` | `Themes/Sixteen/lang/it/segnalazione.php` |
| Test email | `tests/Unit/MailTest.php` | `Modules/Notify/tests/Unit/MailTest.php` |
| Docs SMTP test | `docs/test-smtp.md` | `Modules/Notify/docs/test-smd.md` |

---

## DOVE SPOSTARE LE RISORSE ESISTENTI

| Tipo | Root → Modulo/Tema |
|------|------------------|
| `lang/*` traduzione | → `Modules/{Modulo}/lang/` |
| `tests/Feature/*` test | → `Modules/{Modulo}/tests/Feature/` |
| `tests/Unit/*` test | → `Modules/{Modulo}/tests/Unit/` |
| `docs/*` doc | → `Modules/{Modulo}/docs/` |

---

## CONTROLLI AUTOMATICI

```bash
# Verificare lang in root (dovrebbe essere vuoto)
ls -la lang/

# Verificare docs in root (dovrebbe essere vuoto)
ls -la docs/

# Verificare test docs in root (dovrebbe essere vuoto)
find docs/ -name "*test*.md"

# Verificare directory strutturali vietate
find . -type d \( -path '*/docs/archive' -o -name '_docs' -o -path '*/lang/lang' \) -print
```

---

## DATA IMPLEMENTAZIONE

2026-04-21 - Regola combinata estesa

## RICORDA

> **Lang nei moduli, docs nei moduli, tests nei moduli**
> **Lang nella root = ERRORE**
> **Docs nella root = ERRORE**
> **Tests nella root = ERRORE**

## VEDI ANCHE

- [module-test-location-rule](./module-test-location-rule.md): Test PHP nei moduli
- [no-root-test-docs-rule](./no-root-test-docs-rule.md): Docs test nei moduli
- [no-docs-archive-rule](./no-docs-archive-rule.md): `docs/archive` vietato
- [no-lang-lang-and-no-underscore-docs-rule](./no-lang-lang-and-no-underscore-docs-rule.md): `_docs` e `lang/lang` vietati
- [llm-wiki-governance](./llm-wiki-governance.md): LLM Wiki pattern
