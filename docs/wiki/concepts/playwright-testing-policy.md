---
type: concept
module: cross-module
theme: cross-theme
created: 2026-04-30
updated: 2026-04-30
status: active
---

# Playwright Test Placement Policy

## REGOLA PERMANENTE: I test Playwright appartengono al modulo o al tema che testano

### Vincolo assoluto

```
OBBLIGATORIO: collocare i test Playwright nella directory `tests/Playwright/` 
              del modulo o tema specifico
              
VIETATO: creare una directory `tests/Playwright/` globale nella root del progetto

PATTERN CORRETTO:
- Modulo:   laravel/Modules/<Nome>/tests/Playwright/<nome-test>.spec.js
- Tema:     laravel/Themes/<Nome>/tests/Playwright/<nome-test>.spec.js
```

### Perché

I test end-to-end (Playwright) verificano il comportamento di componenti e pagine
specifiche di un modulo o tema. La loro collocazione naturale è nella directory
del componente testato per:

- **Isolamento**: ogni modulo mantiene i propri test
- **Deployment**: rilascio di un modulo comporta rilascio dei suoi test
- **Riuso**: moduli condivisi tra progetti portano con sé i test
- **Ownership**: responsabilità chiara di mantenimento
- **CI/CD**: pipeline per modulo eseguono solo i test pertinenti

### Esempi di collocazione corretta

#### Modulo Geo (mappa Leaflet)
```
laravel/Modules/Geo/tests/Playwright/segnalazioni-elenco.spec.js
laravel/Modules/Geo/tests/Playwright/map-picker-lit.spec.js
laravel/Modules/Geo/tests/Playwright/coordinate-picker-lit.spec.js
```

#### Modulo Fixcity (ticket workflow)
```
laravel/Modules/Fixcity/tests/Playwright/ticket-create.spec.js
laravel/Modules/Fixcity/tests/Playwright/ticket-list.spec.js
```

#### Tema Sixteen (UI Design Comuni)
```
laravel/Themes/Sixteen/tests/Playwright/header-responsive.spec.js
laravel/Themes/Sixteen/tests/Playwright/footer-mobile.spec.js
```

### Struttura del progetto

```
laravel/
├── Modules/
│   ├── Geo/
│   │   ├── resources/js/components/geo-map-lit.js      ← componente
│   │   ├── docs/wiki/...                                ← documentazione
│   │   └── tests/Playwright/                           ← ✅ TEST QUI
│   │       └── segnalazioni-elenco.spec.js
│   │
│   └── Fixcity/
│       ├── app/Actions/GenerateTicketsJsonAction.php  ← logica
│       ├── docs/wiki/...                                ← documentazione
│       └── tests/Playwright/                           ← ✅ TEST QUI
│           └── ticket-create.spec.js
│
└── Themes/
    └── Sixteen/
        ├── resources/views/...                        ← template Blade
        ├── docs/wiki/...                                ← documentazione
        └── tests/Playwright/                           ← ✅ TEST QUI
            └── header-responsive.spec.js
```

### Convenzioni di naming

- **File di test**: `<descrizione-funzionalità>.spec.js`
- **Descrizione**: kebab-case, esprime il comportamento testato
- **Esempi**: 
  - `segnalazioni-elenco.spec.js` (lista segnalazioni)
  - `ticket-create.spec.js` (creazione ticket)
  - `map-picker-lit.spec.js` (componente mappa)
  - `header-responsive.spec.js` (header reattivo)

### Dipendenze di test

Se un modulo dipende da un altro modulo per i test:

1. Documentare la dipendenza nel file README.md del modulo
2. Usare fixtures o mock per isolare il test
3. Specificare nell'header del file:

```js
/**
 * @depends ModuleName
 * Test che verifica ...
 */
```

### Esecuzione in CI/CD

#### Esempio GitHub Actions per modulo

```yaml
name: Geo Module Tests
on:
  push:
    paths:
      - 'laravel/Modules/Geo/**'
      - 'laravel/Themes/Sixteen/**'

jobs:
  playwright:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - name: Run Geo module tests
        run: |
          cd laravel/Modules/Geo
          npx playwright test tests/Playwright/
```

### Best practices

1. **Non duplicare test**: se due moduli testano la stessa funzionalità condivisa,
   creare un modulo "shared-test" o usare fixtures

2. **Isolamento**: ogni test dovrebbe essere indipendente e non dipendere 
   dall'ordine di esecuzione

3. **Setup e teardown**: usare `beforeEach` e `afterEach` per isolamento

4. **Tempi di attesa**: evitare `waitForTimeout()` arbitrari; preferire 
   `waitForSelector()` o `waitForResponse()`

5. **Selettori**: preferire attributi `data-testid` o classi semantiche
   evitando selettori CSS fragili

6. **Documentazione**: ogni file di test dovrebbe avere un commento 
   iniziale che spiega cosa testa e perché

### Documentazione cross-modulo

Per funzionalità che coinvolgono più moduli (es. flusso completo segnalazione):

1. Creare file di test nel modulo principale (es. Fixcity)
2. Documentare la dipendenza nei moduli coinvolti
3. Mantenere test di integrazione separati da test unitari

### Referenze

- [Playwright Best Practices](https://playwright.dev/docs/best-practices)
- [Component Testing](https://playwright.dev/docs/test-components)
- Project structure: `docs/wiki/concepts/project-structure.md`

### Violazioni comuni

- ❌ `tests/Playwright/` nella root del progetto
- ❌ Test fuori dalla directory del modulo/tema
- ❌ Mancata documentazione del test nel modulo
- ❌ Test che dipendono da stato globale non documentato

### Azione correttiva

Se si trova un test nella posizione sbagliata:

1. Spostarlo nella directory corretta del modulo/tema
2. Aggiornare i percorsi relativi (imports, fixtures)
3. Verificare che il test passi dopo lo spostamento
4. Aggiornare la documentazione del modulo

---

**Ultimo aggiornamento**: 2026-04-30  
**Stato**: policy attiva  
**Proprietario**: fixcity dev team