# 🔴 REGOLA SACRALE: I DATI SONO SACRI

## MAI E POI MAI usare:

- ❌ `php artisan migrate:fresh` - DISTRUGGE TUTTE LE TABELLE
- ❌ `php artisan migrate:refresh` - RIAZZERA TUTTE LE MIGRAZIONI
- ❌ `php artisan db:wipe` - CANCELLA INTERO DATABASE
- ❌ `RefreshDatabase` trait nei test - CANCELLA DATI
- ❌ Qualsiasi comando che distrugge dati

## SEMPRE usare:

- ✅ `php artisan migrate` (solo avanti, mai rollback)
- ✅ `DatabaseTransactions` nei test (non distrugge dati, usa transazioni)
- ✅ Backup prima di qualsiasi modifica schema
- ✅ Prima di ogni migrate: verifica che non ci siano dati importanti

## Perché questa regola è SACRALE:

1. **I dati di produzione sono irrecuperabili** - una volta cancellati, sono persi per sempre
2. **Il database è evidenza** - i dati servono per ispezionare, capire, evolvere - non per essere resettati
3. **I dati sono condivisi** - altri moduli, altri team, altri progetti potrebbero usare lo stesso database

## Cosa fare quando serve aggiungere una colonna:

1. Creare una nuova migrazione con `php artisan make:migration add_column_to_table`
2. Usare `Schema::table()` con `after()` per aggiungere colonne
3. Eseguire SOLO `php artisan migrate` (forward-only)
4. Testare in locale prima

## Cosa fare nei test:

- ✅ Usare `DatabaseTransactions` trait
- ✅ Usare `LazilyRefreshDatabase` solo se strettamente necessario
- ❌ Mai usare `RefreshDatabase` che distrugge dati

## Workflow corretto per fixare errori database:

1. NON usare `migrate:fresh`
2. Analizzare l'errore
3. Creare migrazione correttiva
4. Eseguire `php artisan migrate`
5. Verificare che funzioni
