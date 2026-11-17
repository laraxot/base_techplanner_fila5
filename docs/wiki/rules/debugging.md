# Regola Debugging - NO Log::debug / NO Log::info

## Regola Fondamentale

**Vietato utilizzare `Log::debug()` per debugging temporaneo nel codice.**
**Vietato utilizzare `Log::info()` come logging applicativo di routine.**

## Motivazione

- I log di debug rimangono nel codice e inquinano i log di produzione
- `Log::info()` aggiunge rumore, I/O inutile e spesso dati inutili o sensibili
- Sono difficili da trovare e rimuovere dopo il debugging
- Non forniscono un feedback immediato come `dd()` o `ddd()`

## Approccio Corretto

### Per Debugging Immediato
```php
// ✅ Usare dd(), ddd(), dump() per debug rapido
public function mount(int|string $record): void
{
    dd($record);  // OK per debug, DA RIMUOVERE prima del commit
    // ...
}
```

### Per Debugging Strutturato
- Usare Xdebug con breakpoint
- Laravel Telescope per sviluppo
- Laravel Debugbar per query

### Per Logging Permanente
```php
// ✅ usare livelli coerenti col problema reale
Log::warning('Tentativo non autorizzato', ['ip' => $ip]);
Log::error('Errore durante salvataggio', ['error' => $e->getMessage()]);
```

### Per Audit e Monitoring
- Audit trail: `activity()` / tabelle dedicate
- Monitoring: Telescope, Pulse, metriche, tracing
- Success path ordinari: evitare logging applicativo

## Pattern Anti (VIETATO)

```php
// ❌ MAI FARE QUESTO
public function mount(int|string $record): void
{
    Log::debug('Debug message: ' . $record);
    // ...
}

Log::info('User logged in');
Log::info('Request received', ['url' => $url]);
Log::info('Operazione completata');
```

## Checklist Pre-commit

- [ ] Nessun `Log::debug()` nel codice
- [ ] Nessun `Log::info()` nel codice applicativo di routine
- [ ] Nessun `dd()`, `dump()`, `ddd()` nel codice
- [ ] Solo warning/error o audit/telemetry coerenti

---

**Data**: 2026-02-24
**Status**: Attivo
