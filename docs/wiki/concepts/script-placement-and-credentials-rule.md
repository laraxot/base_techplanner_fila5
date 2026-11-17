# Script Placement and Credentials Security Rule

> **CRITICAL ARCHITECTURE RULE**: Tutti gli script di automazione/devono seguire queste convenzioni

---

## 📍 Posizione degli Script (File System Hierarchy)

### ✅ DO - Posizioni Consentite

Gli script di automazione, diagnostica e utility DEVONO essere posizionati **solo** in:

```
# Root del progetto
/var/www/_bases/base_fixcity_fila5/
├── bashscripts/              # ✅ Script bash/python (cross-project)
└── laravel/
    ├── bashscripts/          # ✅ Script specifici Laravel
    └── Themes/Sixteen/
        ├── bashscripts/      # ✅ Script tema Sixteen  
        └── scripts/          # ✅ Script Node.js tema (già esistente)
    └── Modules/
        └── {ModuleName}/
            └── bashscripts/  # ✅ Script modulo specifico
```

### ❌ DON'T - Vietato Assoluto

- **MAI** creare nuove cartelle `scripts/` o `bashscripts/` dove non esistono già
- **MAI** mettere script nella root del progetto (`./map_diagnostic.py` ❌)
- **MAI** mettere script in `laravel/Modules/{X}/scripts/` se non esiste già

**Rationale**: DRY + KISS - Usare la struttura esistente, non duplicare/creare nuove convenzioni

---

## 🔐 Sicurezza Credenziali (Security Policy)

### ✅ DO - Leggere da .env

```python
# Python example (map_diagnostic.py)
from dotenv import load_dotenv
import os

# Load from laravel/.env (2 livelli sopra da bashscripts/)
env_path = os.path.join(os.path.dirname(__file__), '..', 'laravel', '.env')
load_dotenv(env_path)

# Read credentials - fallback chain for flexibility
ADMIN_EMAIL = os.getenv('FIXCITY_ADMIN_EMAIL') or os.getenv('ADMIN_EMAIL') or os.getenv('FILAMENT_ADMIN_EMAIL')
ADMIN_PASSWORD = os.getenv('FIXCITY_ADMIN_PASSWORD') or os.getenv('ADMIN_PASSWORD') or os.getenv('FILAMENT_ADMIN_PASSWORD')
```

```javascript
// Node.js example (inspect-fixcity-admin-ticket-create-map.cjs)
const path = require('path');
require('dotenv').config({ 
  path: path.resolve(__dirname, '../../../.env') 
});

const email = process.env.FIXCITY_ADMIN_EMAIL || 
              process.env.ADMIN_EMAIL || 
              process.env.FILAMENT_ADMIN_EMAIL;
              
const password = process.env.FIXCITY_ADMIN_PASSWORD || 
                 process.env.ADMIN_PASSWORD || 
                 process.env.FILAMENT_ADMIN_PASSWORD;
```

### ❌ DON'T - Hardcoded Credentials (SECURITY BREACH)

```python
# ❌ MAI FARE QUESTO - Security breach!
ADMIN_EMAIL = "marco.sottana@gmail.com"  # VIETATO!
ADMIN_PASSWORD = "<hardcoded-password>"  # VIETATO!
```

```javascript
// ❌ MAI FARE QUESTO - Security breach!
const email = 'marco.sottana@gmail.com';    // VIETATO!
const password = '<hardcoded-password>';    // VIETATO!
```

**Rationale**: 
- **Security**: Credenziali hardcoded = breach di sicurezza
- **Portability**: `.env` è specifico per environment (dev/staging/prod)
- **Git Safety**: `.env` è in `.gitignore`, mai committato

---

## 🗂️ Struttura Corretta (Esempio Pratico)

### Scenario: Diagnostica Mappa Ticket

**Prima (Errato)**:
```
/var/www/_bases/base_fixcity_fila5/
├── map_diagnostic.py              # ❌ Root - posizione sbagliata
├── credentials.txt                # ❌ File password hardcoded (!!!)
└── laravel/Themes/Sixteen/
    └── scripts/
        └── inspect-fixcity-admin-ticket-create-map.cjs  # ❌ Hardcoded credentials
```

**Dopo (Corretto)**:
```
/var/www/_bases/base_fixcity_fila5/
├── bashscripts/
│   └── map_diagnostic.py          # ✅ Posizione corretta
│       # Legge da laravel/.env - no hardcoded
├── laravel/
│   └── .env                       # ✅ Credenziali qui (protetto, gitignored)
│   └── Themes/Sixteen/
│       └── scripts/
│           └── inspect-fixcity-admin-ticket-create-map.cjs  # ✅ Posizione corretta
│               # Legge da ../../../.env - no hardcoded
```

---

## 🔍 Chiave di Configurazione .env

Il file `laravel/.env` deve contenere (gitignored):

```bash
# Admin credentials for testing/automation
FIXCITY_ADMIN_EMAIL=marco.sottana@gmail.com
FIXCITY_ADMIN_PASSWORD=<read-from-local-env>

# Fallback per altri moduli (opzionale)
ADMIN_EMAIL=marco.sottana@gmail.com
ADMIN_PASSWORD=<read-from-local-env>
FILAMENT_ADMIN_EMAIL=marco.sottana@gmail.com
FILAMENT_ADMIN_PASSWORD=<read-from-local-env>
```

**⚠️ IMPORTANTE**: 
- `.env` è in `.gitignore` - **mai committare**
- Ogni developer ha il proprio `.env` locale
- In produzione, usare variabili d'ambiente server

---

## 🎯 Zen/Philosophy

### Regola Fondamentale
> "Uno script senza credenziali è come un samurai senza spada: inutile. 
> Uno script con credenziali hardcoded è come un samurai che urla la sua password: suicida."

### Principi (DRY + KISS + Security)

1. **Single Source of Truth**: `.env` è l'unica fonte di verità per credenziali
2. **No Duplication**: Non replicare credenziali in file diversi
3. **Keep It Simple**: Usare `dotenv` standard, non inventare soluzioni custom
4. **Security by Default**: Mai hardcoded, sempre da environment
5. **Convention over Configuration**: Usare le cartelle `bashscripts/` e `scripts/` esistenti

---

## 🛠️ Implementazione

### Dipendenze Richieste

**Python**:
```bash
pip install python-dotenv
# o
pip3 install python-dotenv
```

**Node.js**:
```bash
npm install dotenv
# già incluso in molti progetti
```

### Template Script Python (per bashscripts/)

```python
#!/usr/bin/env python3
"""
Script diagnostica - legge credenziali da .env
Posizione: bashscripts/{nome_script}.py
"""

import os
import sys
from pathlib import Path
from dotenv import load_dotenv

# Setup path to .env (2 livelli sopra da bashscripts/)
SCRIPT_DIR = Path(__file__).parent.resolve()
PROJECT_ROOT = SCRIPT_DIR.parent
ENV_PATH = PROJECT_ROOT / 'laravel' / '.env'

# Load environment
if ENV_PATH.exists():
    load_dotenv(ENV_PATH)
else:
    print(f"❌ .env non trovato: {ENV_PATH}")
    sys.exit(1)

# Read credentials with fallback chain
ADMIN_EMAIL = (
    os.getenv('FIXCITY_ADMIN_EMAIL') or 
    os.getenv('ADMIN_EMAIL') or 
    os.getenv('FILAMENT_ADMIN_EMAIL')
)
ADMIN_PASSWORD = (
    os.getenv('FIXCITY_ADMIN_PASSWORD') or 
    os.getenv('ADMIN_PASSWORD') or 
    os.getenv('FILAMENT_ADMIN_PASSWORD')
)

if not ADMIN_EMAIL or not ADMIN_PASSWORD:
    print("❌ Credenziali admin mancanti in .env")
    print("Definisci FIXCITY_ADMIN_EMAIL e FIXCITY_ADMIN_PASSWORD")
    sys.exit(1)

# Script logic here...
print(f"✅ Credenziali caricate per: {ADMIN_EMAIL}")
```

### Template Script Node.js (per scripts/)

```javascript
#!/usr/bin/env node
/**
 * Script ispezione - legge credenziali da .env
 * Posizione: laravel/Themes/{Theme}/scripts/{nome_script}.cjs
 */

const path = require('path');
const fs = require('fs');

// Load dotenv
try {
    require('dotenv').config({ 
        path: path.resolve(__dirname, '../../../.env') 
    });
} catch (e) {
    console.error('❌ dotenv non installato: npm install dotenv');
    process.exit(1);
}

function loadAdminCredentials() {
    const email = process.env.FIXCITY_ADMIN_EMAIL || 
                  process.env.ADMIN_EMAIL || 
                  process.env.FILAMENT_ADMIN_EMAIL;
                  
    const password = process.env.FIXCITY_ADMIN_PASSWORD || 
                     process.env.ADMIN_PASSWORD || 
                     process.env.FILAMENT_ADMIN_PASSWORD;
    
    if (!email || !password) {
        throw new Error(
            'Credenziali admin mancanti in laravel/.env. ' +
            'Definisci FIXCITY_ADMIN_EMAIL e FIXCITY_ADMIN_PASSWORD'
        );
    }
    
    return { email, password };
}

// Script logic here...
const creds = loadAdminCredentials();
console.log(`✅ Credenziali caricate per: ${creds.email}`);
```

---

## 📚 References

- [dotenv Python](https://github.com/theskumar/python-dotenv)
- [dotenv Node.js](https://github.com/motdotla/dotenv)
- [OWASP Secrets Management](https://cheatsheetseries.owasp.org/cheatsheets/Secrets_Management_CheatSheet.html)
- [Laravel Environment Configuration](https://laravel.com/docs/configuration#environment-configuration)

---

## ✅ Checklist Review

Prima di committare qualsiasi script di automazione:

- [ ] Script è in `bashscripts/` o `scripts/` **esistente**
- [ ] **MAI** creare nuove cartelle `scripts/` o `bashscripts/`
- [ ] Credenziali lette da `.env` via `dotenv`
- [ ] **ZERO** hardcoded passwords/tokens/credentials
- [ ] Fallback chain per variabili d'ambiente (FIXCITY_* → ADMIN_* → FILAMENT_*)
- [ ] Error handling se credenziali mancanti
- [ ] `.env` è in `.gitignore` (verificato)

---

**Data**: 2026-04-27
**Severity**: 🔴 CRITICAL - Security & Architecture
**Applies to**: All automation/diagnostic scripts
