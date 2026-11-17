<<<<<<< HEAD
# Roadmap risoluzione errori PHPStan (modulo base)

## Scopo
Definire un flusso ripetibile per ridurre gli errori PHPStan fino a **0** nel modulo base, con priorita' sulle dipendenze che impattano gli altri moduli.

## Principi
- Individuare prima gli errori che bloccano l'esecuzione o generano regressioni.
- Correggere per classi di errore (tipi, property, method, generics).
- Evitare soluzioni ad hoc: privilegiare pattern riutilizzabili.

## Flusso operativo
1. **Raccolta**: eseguire l'analisi PHPStan e raggruppare gli errori per categoria.
2. **Classificazione**: separare errori di tipo, accesso a property, e metodi mancanti.
3. **Correzione**: risolvere un gruppo alla volta, con fix minimi e tipizzati.
4. **Verifica**: rilanciare l'analisi e registrare la riduzione degli errori.
5. **Documentazione**: aggiornare le note di workaround e i pattern consigliati.

## Checklist di chiusura
- [ ] 0 errori PHPStan nel modulo base
- [ ] Nessun uso di pattern deprecati
- [ ] Tipi espliciti su metodi e ritorni
- [ ] Note di correzione allineate con i pattern del modulo

## Collegamenti correlati
- [indice documentazione](./00-index.md)
- [roadmap del modulo](./roadmap.md)
- [guida qualita' phpstan](./phpstan-code-quality-guide.md)
- [sessione phpstan](./phpstan-session-january-2026-summary.md)
- [best practices](./best-practices-1.md)
# Xot Module - PHPStan Level 10 Errors Resolution Roadmap

**Data**: 2026-01-14  
**Modulo**: Xot (Base Module)  
**Livello PHPStan**: 10  
**Status**: 🧘 **QUASI COMPLETATO - BASE FONDAMENTALE**

---

## 📊 Stato Attuale

**PHPStan Level**: 10
**Totale Errori**: 2 errori in 2 file
**Stato**: ✅ **OTTIMO** - Base quasi stabile

**Nota**: Xot è il modulo base che influenza tutti gli altri moduli. Con solo 2 errori, è un'ottima base di partenza!

## 🎯 Obiettivo

Ridurre gli errori PHPStan a **0**.

## 🔍 Errori Identificati

1. **`app/Console/Commands/OptimizeFilamentMemoryCommand.php`**: Offset 1 might not exist on array<string>|null.
2. **`app/Services/ArtisanService.php`**: Offset 1 might not exist on array|null.

## 🗺️ Roadmap di Risoluzione

### Fase 1: Fix Errori Offset (Priorità Immediata)

**Obiettivo**: Risolvere i 2 errori di offset array.

**Task**:
1. Fix `OptimizeFilamentMemoryCommand.php`: Verificare esistenza indice prima dell'accesso.
2. Fix `ArtisanService.php`: Verificare esistenza indice prima dell'accesso.

### Fase 2: Verifica Finale

**Obiettivo**: Confermare 0 errori.
=======
# Xot Module - PHPStan Level 10 Errors Resolution Roadmap

## 📊 Stato Attuale

**Data Analisi**: Gennaio 2025  
**PHPStan Level**: 10  
**Totale Errori**: 242 errori in 63 file  
**Comando**: `./vendor/bin/phpstan analyse Modules/Xot --level=10`

## 🎯 Obiettivo

Ridurre gli errori PHPStan a **0** mantenendo la funzionalità esistente. Il modulo Xot è **CRITICO** perché fornisce le classi base per tutti gli altri moduli.

## 📈 Distribuzione Errori per Tipo

1. **argument.type**: 127 errori (52.5%) - Problemi con tipi degli argomenti
2. **method.nonObject**: 25 errori (10.3%) - Chiamate a metodi su mixed
3. **return.type**: 21 errori (8.7%) - Problemi con tipi di ritorno
4. **method.notFound**: 17 errori (7.0%) - Metodi non trovati
5. **staticMethod.notFound**: 11 errori (4.5%) - Metodi statici non trovati
6. **Altri**: 41 errori (17.0%)

## 🔍 Top 15 File con Più Errori

1. `ColumnBuilder.php` - 16 errori
2. `StatesChartWidget.php` - 14 errori
3. `ArtisanCommandsManager.php` - 12 errori
4. `ActionPresets.php` - 11 errori
5. `MainDashboard.php` - 10 errori
6. `HasXotTable.php` (vari contesti) - 9 errori ciascuno
7. `ExportXlsLazyAction.php` - 8 errori
8. `ArtisanService.php` - 8 errori
9. `Helper.php` - 7 errori
10. `XotBaseComponent.php` - 7 errori
11. `InformationSchemaTable.php` - 6 errori
12. Altri file con errori minori

## 🎯 Pattern di Errori Identificati

### Pattern 1: Problemi con Tipi degli Argomenti (127 errori - 52.5%)

**Problema**: Argomenti di tipo `array|string|null` o `mixed` passati dove è richiesto un tipo specifico.

**Causa**: 
- Metodi base che accettano parametri flessibili
- Traduzioni che possono restituire array o string
- Configurazioni Filament che accettano multiple tipologie

**Soluzione**:
- Usare `SafeStringCastAction` per le traduzioni
- Aggiungere type casting esplicito con `(string)` o `strval()`
- Verificare null safety prima di passare argomenti
- Usare union types appropriati nei type hints

**File più interessati**:
- `ColumnBuilder.php` (16 errori)
- `StatesChartWidget.php` (14 errori)
- `ActionPresets.php` (11 errori)

### Pattern 2: Chiamate a Metodi su Mixed (25 errori - 10.3%)

**Problema**: Metodi chiamati su variabili di tipo `mixed`.

**Causa**: 
- Query builder che restituiscono `mixed` invece di tipi specifici
- Variabili senza type hints espliciti

**Soluzione**:
- Aggiungere type hints espliciti ai risultati delle query
- Usare `@var` annotations per specificare i tipi
- Implementare type casting appropriato

### Pattern 3: Problemi con Tipi di Ritorno (21 errori - 8.7%)

**Problema**: Metodi che dovrebbero restituire un tipo specifico ma restituiscono `mixed`.

**Soluzione**:
- Aggiungere return type hints espliciti
- Usare type casting per i risultati
- Verificare che i metodi restituiscano sempre il tipo atteso

### Pattern 4: Metodi Non Trovati (17 errori - 7.0%)

**Problema**: Metodi chiamati su oggetti che PHPStan non riconosce.

**Soluzione**:
- Aggiungere `@method` annotations nei PHPDoc
- Verificare che i trait siano importati correttamente
- Aggiungere type hints per i metodi dinamici

## 🗺️ Roadmap di Risoluzione

### Fase 1: Fix ColumnBuilder e Componenti Base (Priorità Critica)

**Obiettivo**: Risolvere errori nei componenti base più utilizzati.

**Task**:
1. `ColumnBuilder.php` (16 errori)
   - Fix tipi degli argomenti per traduzioni
   - Fix return types
   - Verificare type hints
2. `XotBaseComponent.php` (7 errori)
   - Fix tipi degli argomenti
   - Fix return types

**Tempo stimato**: 3-4 ore

**⚠️ IMPORTANTE**: Questi file sono utilizzati da tutti gli altri moduli. Qualsiasi modifica deve essere retrocompatibile.

### Fase 2: Fix Widgets Base (Priorità Alta)

**Obiettivo**: Risolvere errori nei widget base.

**Task**:
1. `StatesChartWidget.php` (14 errori)
   - Fix tipi degli argomenti
   - Fix return types
2. `MainDashboard.php` (10 errori)
   - Fix tipi degli argomenti
   - Fix metodi su mixed

**Tempo stimato**: 2-3 ore

### Fase 3: Fix Trait HasXotTable (Priorità Alta)

**Obiettivo**: Risolvere i 9 errori in `HasXotTable.php` che si ripetono in vari contesti.

**Task**:
1. Analizzare tutti i contesti dove `HasXotTable` viene utilizzato
2. Fix tipi degli argomenti
3. Fix return types
4. Verificare che non ci siano regressioni

**Tempo stimato**: 2-3 ore

### Fase 4: Fix Actions e Services (Priorità Media)

**Obiettivo**: Risolvere errori nelle Actions e Services.

**Task**:
1. `ActionPresets.php` (11 errori)
2. `ExportXlsLazyAction.php` (8 errori)
3. `ArtisanService.php` (8 errori)
4. `ArtisanCommandsManager.php` (12 errori)

**Tempo stimato**: 3-4 ore

### Fase 5: Fix File Rimanenti (Priorità Bassa)

**Obiettivo**: Risolvere errori rimanenti.

**Task**:
1. `Helper.php` (7 errori)
2. `InformationSchemaTable.php` (6 errori)
3. Altri file con errori minori

**Tempo stimato**: 2-3 ore

### Fase 6: Verifica Finale e Testing (Priorità Critica)

**Obiettivo**: Verificare che tutti gli errori siano risolti e che non ci siano regressioni.

**Task**:
1. Eseguire PHPStan completo sul modulo
2. Verificare che non ci siano regressioni
3. Eseguire test funzionali
4. **Test di regressione su tutti i moduli che usano Xot** (CRITICO)
5. Aggiornare documentazione

**Tempo stimato**: 2-3 ore

## 📝 Best Practices da Applicare

1. **Sempre usare type hints espliciti** per parametri e return types
2. **Usare `@var` annotations** per variabili di tipo mixed
3. **Verificare null safety** prima di chiamare metodi su oggetti
4. **Usare `SafeStringCastAction`** per le traduzioni
5. **Testare dopo ogni fix** per evitare regressioni
6. **Documentare i cambiamenti** nelle classi base
7. **Verificare retrocompatibilità** prima di ogni modifica

## ⚠️ Note Critiche

Il modulo Xot è **FONDAMENTALE** perché:

1. **Fornisce classi base** per tutti gli altri moduli
2. **Qualsiasi modifica** può impattare tutti i moduli dipendenti
3. **Deve essere retrocompatibile** con il codice esistente
4. **Deve essere ben testato** prima di ogni release

**Prima di ogni modifica**:
- Verificare l'impatto su tutti i moduli che usano Xot
- Eseguire test di regressione
- Documentare i cambiamenti
- Verificare che non ci siano breaking changes

## 🔗 Collegamenti Correlati

- [PHPStan Patterns Dec 2025](./phpstan-patterns-dec-2025.md)
- [Filament Extension Rules](./filament-class-extension-rules.md)
- [Project Best Practices](./project-best-practices.md)
- [PHPStan Workflow](./phpstan-workflow.md)

## ✅ Checklist di Verifica

Prima di considerare completata la risoluzione:

- [ ] Tutti i file elencati sono stati corretti
- [ ] PHPStan Level 10 passa senza errori
- [ ] Test funzionali passano
- [ ] **Test di regressione su tutti i moduli che usano Xot** (CRITICO)
- [ ] Documentazione aggiornata
- [ ] Code review completata
- [ ] Verificato che non ci siano breaking changes

---

*Roadmap creata il: Gennaio 2025*  
*Ultimo aggiornamento: Gennaio 2025*  
*⚠️ MODULO CRITICO - Richiede attenzione particolare*
>>>>>>> 6ed19256f (.)
