# 🔧 PHPMD PHAR Installation Rule

**Status**: ✅ MANDATORY  
**Version**: 1.0  
**Last Updated**: 2026-03-26  
**Enforcement**: STRICT

---

## 🎯 Core Rule

> **PHPMD DEVE essere installato come file .phar, NON tramite Composer**

**NON installare mai PHPMD con Composer nel progetto.**

---

## ✅ DO - Installazione PHAR

### Installazione Globale (Raccomandata)

```bash
# 1. Scarica PHPMD PHAR
wget https://github.com/phpmd/phpmd/releases/latest/download/phpmd.phar -O /usr/local/bin/phpmd

# 2. Rendi eseguibile
chmod +x /usr/local/bin/phpmd

# 3. Verifica installazione
phpmd --version
```

### Installazione Locale (Alternativa)

```bash
# 1. Scarica nella cartella del progetto
wget https://github.com/phpmd/phpmd/releases/latest/download/phpmd.phar -O tools/phpmd.phar

# 2. Rendi eseguibile
chmod +x tools/phpmd.phar

# 3. Esegui
php tools/phpmd.phar
```

---

## ❌ DON'T - Installazione Composer

```bash
# ❌ MAI FARE QUESTO
composer require --dev phpmd/phpmd

# ❌ NON aggiungere a composer.json
{
    "require-dev": {
        "phpmd/phpmd": "^2.15"  # ❌ SBAGLIATO!
    }
}
```

---

## 📋 Perché PHAR e NON Composer

### 1. **Separazione Strumenti di Sviluppo**

- ✅ **PHAR**: Strumento globale, non legato al progetto
- ❌ **Composer**: Dipendenza del progetto, installata in `vendor/`

### 2. **Performance**

- ✅ **PHAR**: Esecuzione diretta, nessun autoload
- ❌ **Composer**: Caricamento tramite vendor, più lento

### 3. **Versioning**

- ✅ **PHAR**: Versione globale, aggiornabile indipendentemente
- ❌ **Composer**: Versione legata al progetto, aggiornamenti accoppiati

### 4. **composer.json Pulito**

```json
// ✅ CORRETTO: composer.json senza PHPMD
{
    "require-dev": {
        "phpstan/phpstan": "^1.10",
        "pestphp/pest": "^2.0"
    }
}

// ❌ SBAGLIATO: PHPMD tra le dipendenze
{
    "require-dev": {
        "phpmd/phpmd": "^2.15",  # ❌ Non qui!
        "phpstan/phpstan": "^1.10"
    }
}
```

### 5. **DRY + KISS**

- **DRY**: PHPMD installato una volta, usato in tutti i progetti
- **KISS**: Nessun conflitto di versioni tra progetti

---

## 🔧 Configurazione

### File di Configurazione

```xml
<!-- phpmd.xml -->
<?xml version="1.0"?>
<ruleset name="Laraxot PHPMD Rules"
         xmlns="http://pmd.sf.net/ruleset/1.0.0"
         xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:schemaLocation="http://pmd.sf.net/ruleset/1.0.0
                             http://pmd.sf.net/ruleset_xml_schema.xsd"
         xsi:noNamespaceSchemaLocation="http://pmd.sf.net/ruleset_xml_schema.xsd">

    <description>Laraxot PTVX - PHP Mess Detector Rules</description>

    <!-- Codesize Rules -->
    <rule ref="rulesets/codesize.xml">
        <exclude name="TooManyPublicMethods" />
    </rule>

    <!-- Controversial Rules -->
    <rule ref="rulesets/controversial.xml" />

    <!-- Design Rules -->
    <rule ref="rulesets/design.xml">
        <exclude name="CouplingBetweenObjects" />
    </rule>

    <!-- Naming Rules -->
    <rule ref="rulesets/naming.xml">
        <exclude name="ShortVariable" />
        <exclude name="LongVariable" />
    </rule>

    <!-- Unused Code Rules -->
    <rule ref="rulesets/unusedcode.xml" />

    <!-- Cleancode Rules -->
    <rule ref="rulesets/cleancode.xml">
        <exclude name="StaticAccess" />
    </rule>
</ruleset>
```

### Script Bash (Quality Gate)

```bash
#!/bin/bash
# bashscripts/quality-gate-phpmd.sh

set -e

echo "🔍 Running PHPMD..."

# Esegui PHPMD PHAR
phpmd laravel/Modules/Predict/app xml phpmd.xml

echo "✅ PHPMD passed!"
```

---

## 📊 Comparison Table

| Aspect | PHAR Installation | Composer Installation |
|--------|-------------------|----------------------|
| **Location** | `/usr/local/bin/phpmd` | `vendor/phpmd/phpmd` |
| **Scope** | ✅ Globale (tutti i progetti) | ❌ Locale (singolo progetto) |
| **composer.json** | ✅ Pulito | ❌ Appesantito |
| **Performance** | ✅ Diretto | ❌ Tramite autoload |
| **Updates** | ✅ Indipendente | ❌ Legato al progetto |
| **Version Control** | ✅ Git ignore | ❌ In vendor/ |
| **DRY** | ✅ Una installazione | ❌ Per ogni progetto |
| **KISS** | ✅ Semplice | ❌ Complesso |

---

## 🚨 Violations & Fixes

### Violation 1: PHPMD in composer.json

```json
// ❌ VIOLATION
{
    "require-dev": {
        "phpmd/phpmd": "^2.15"
    }
}
```

**Fix**:
```bash
# 1. Rimuovi da composer.json
composer remove phpmd/phpmd

# 2. Installa PHAR globale
wget https://github.com/phpmd/phpmd/releases/latest/download/phpmd.phar -O /usr/local/bin/phpmd
chmod +x /usr/local/bin/phpmd
```

### Violation 2: PHPMD in vendor/

```bash
# ❌ VIOLATION
ls vendor/phpmd/
# Output: phpmd/
```

**Fix**:
```bash
# 1. Rimuovi da composer.json
composer remove phpmd/phpmd

# 2. Installa PHAR
wget https://github.com/phpmd/phpmd/releases/latest/download/phpmd.phar -O /usr/local/bin/phpmd
```

---

## ✅ Enforcement Checklist

- [ ] **PHPMD non in composer.json**: Verifica `composer.json`
- [ ] **PHPMD non in vendor/**: Verifica `vendor/phpmd/`
- [ ] **PHAR installato**: `phpmd --version` funziona
- [ ] **Globale**: `/usr/local/bin/phpmd` esiste
- [ ] **Eseguibile**: `chmod +x /usr/local/bin/phpmd`
- [ ] **Configurazione**: `phpmd.xml` nel progetto

---

## 📚 Related Documents

- [PHPStan Complete](../workflow/phpstan-complete.md)
- [Quality Gates](../workflow/quality-gates/01-no-commit-without-tests.md)
- [Code Quality Tools](../common/coding-style.md)

---

## 🔗 Resources

- [PHPMD Official](https://phpmd.org/)
- [PHPMD GitHub](https://github.com/phpmd/phpmd/releases)
- [PHAR Best Practices](https://www.php.net/manual/en/intro.phar.php)

---

**Maintained By**: AI Agents Team  
**Last Review**: 2026-03-26  
**Next Review**: 2026-04-26  
**Enforcement**: MANDATORY
