# 🎯 Multi-Outcome Core Principle

**Priorità**: 🔴 CRITICAL  
**Data**: 2026-03-26  
**Version**: 1.0

---

## Principio Fondamentale

> **TUTTI i predict sono MULTI-RISPOSTA**
>
> Il SÌ/NO è solo un caso particolare con 2 opzioni.
> NON esiste un "tipo" sì/no nel dominio del problema.

---

## ✅ Cosa Significa

### 1. Contratto di Dominio Unificato

```
┌─────────────────────────────────────┐
│        PREDICTION MARKET            │
│                                     │
│  Outcomes: Array di N opzioni       │
│  - Minimo: 2 (SÌ/NO)                │
│  - Massimo: 30+                     │
│  - Stessa UI per tutti              │
└─────────────────────────────────────┘
```

### 2. Esempi Reali

| Mercato | Outcomes | Tipo |
|---------|----------|------|
| "Pioverà domani?" | SÌ, NO | 2-outcome |
| "Chi vincerà F1 2026?" | Verstappen, Hamilton, Leclerc, Norris, Alonso, Russell | 6-outcome |
| "Quale prezzo Bitcoin a Marzo?" | <$50k, $50-60k, $60-70k, $70-80k, $80-90k, $90-100k, >$100k | 7-outcome |
| "Chi sarà prossimo Papa?" | Lista 20+ cardinali | 20+-outcome |

**Tutti usano lo STESSO contratto UI e dominio.**

---

## ❌ Errori da Non Commettere

### 1. Trattate SÌ/NO come Tipo Speciale

```php
// ❌ SBAGLIATO
if ($predict->type === 'binary') {
    // Gestione speciale per SÌ/NO
} else {
    // Gestione per multi-outcome
}

// ✅ CORRETTO
$outcomes = BuildOutcomesAction::make()->execute($predict);
// Funziona per 2-30+ outcomes senza if
```

### 2. Campi yes/no Hardcoded nel DB

```sql
-- ❌ SBAGLIATO (legacy)
ALTER TABLE predicts ADD sum_credit_yes DECIMAL;
ALTER TABLE predicts ADD sum_credit_no DECIMAL;

-- ✅ CORRETTO
-- Usare rating_morph per ogni outcome
-- sum_credit_yes/no sono DEPRECATI
```

### 3. UI Diversa per Binary vs Multi

```blade
{{-- ❌ SBAGLIATO --}}
@if($predict->is_binary)
    @include('binary-predict')
@else
    @include('multi-outcome-predict')
@endif

{{-- ✅ CORRETTO --}}
@foreach($outcomes as $outcome)
    @include('outcome-card', ['outcome' => $outcome])
@endforeach
{{-- Funziona per 2-30+ outcomes --}}
```

---

## 🏗️ Architettura Corretta

### Database Schema

```
┌──────────────┐       ┌──────────────────┐       ┌─────────────┐
│   predicts   │──────<│   rating_morph   │>──────│   ratings   │
│              │       │                  │       │             │
│ id           │       │ model_type       │       │ id          │
│ title (JSON) │       │ model_id         │       │ title (JSON)│
│ slug         │       │ rating_id        │       │ color       │
│ ...          │       │ percentage       │       │ ...         │
└──────────────┘       │ is_winner        │       └─────────────┘
                       │ sum_credit (opt) │
                       └──────────────────┘
```

### Actions

```php
// BuildOutcomesAction - SEMPRE multi-outcome
$outcomes = BuildOutcomesAction::make()->execute($predict);
// Returns: array di N outcomes (2-30+)

// BuildOrderBookAction - Order book per outcome
$orderBook = BuildOrderBookAction::make()->execute($predict);
// Returns: ['markets' => [outcome1, outcome2, ...]]
```

### UI Components

```blade
{{-- outcome-card.blade.php --}}
@props(['outcome'])

<div class="outcome-card" data-outcome-id="{{ $outcome['id'] }}">
    <h3>{{ $outcome['title'] }}</h3>
    <span class="probability">{{ number_format($outcome['probability'] * 100) }}%</span>
    <span class="price">{{ $outcome['price'] }} credits</span>
    
    <button wire:click="buy({{ $outcome['id'] }})">Buy</button>
    <button wire:click="sell({{ $outcome['id'] }})">Sell</button>
</div>

{{-- Usage --}}
@foreach($outcomes as $outcome)
    <x-predict::outcome-card :outcome="$outcome" />
@endforeach
```

---

## 📋 Migration Path

### Da Binary a Multi-Outcome

1. **Identificare predict binary legacy**
   ```sql
   SELECT id, slug, sum_credit_yes, sum_credit_no 
   FROM predicts 
   WHERE sum_credit_yes > 0 OR sum_credit_no > 0;
   ```

2. **Creare ratings SÌ/NO**
   ```php
   Rating::create(['title' => ['it' => 'SÌ', 'en' => 'YES'], 'color' => '#10B981']);
   Rating::create(['title' => ['it' => 'NO', 'en' => 'NO'], 'color' => '#EF4444']);
   ```

3. **Collegare tramite rating_morph**
   ```php
   RatingMorph::create([
       'model_type' => Predict::class,
       'model_id' => $predictId,
       'rating_id' => $yesRatingId,
       'percentage' => ($sumYes / $total) * 100,
   ]);
   ```

4. **Aggiornare UI**
   - Rimuovere `if ($predict->is_binary)`
   - Usare `@foreach($outcomes as $outcome)`

---

## 🎯 Best Practices

### 1. Nomenclatura

```
✅ "outcome" o "rating"
✅ "multi-outcome"
✅ "binary outcome" (solo per descrivere 2 outcomes)

❌ "binary predict"
❌ "yes/no type"
❌ "special case"
```

### 2. Codice

```php
// ✅ Usare sempre array di outcomes
$outcomes = $predict->ratings->map(fn ($rating) => [
    'id' => $rating->id,
    'title' => $rating->title,
    'price' => $this->calculatePrice($rating),
]);

// ❌ Non creare variabili separate per yes/no
$yesPrice = ...;
$noPrice = ...;
```

### 3. UI

```blade
{{-- ✅ Dinamica, supporta N outcomes --}}
<div class="outcomes-grid">
    @foreach($outcomes as $outcome)
        <x-outcome-card :outcome="$outcome" />
    @endforeach
</div>

{{-- ❌ Hardcoded per 2 outcomes --}}
<div class="binary-container">
    <div class="yes-option">SÌ</div>
    <div class="no-option">NO</div>
</div>
```

---

## 📚 Riferimenti

- [Futuur.com](https://futuur.com/) - Tutti i mercati sono multi-outcome
- [Polymarket](https://polymarket.com/) - Esempio 6+ outcomes
- [Kalshi](https://kalshi.com/) - Binary come caso particolare
- [Multi-Outcome Architecture](../../../Modules/Predict/docs/00-INDEX.md)

---

## ✅ Checklist Compliance

- [ ] Tutte le Actions gestiscono 2-30+ outcomes
- [ ] UI usa `@foreach` dinamico, non `if/else`
- [ ] DB non ha campi `yes/no` hardcoded
- [ ] Documentazione aggiornata
- [ ] Tests coprono casi 2-30+ outcomes

---

**Ultimo aggiornamento**: 2026-03-26  
**Review**: Da completare con team AI  
**Status**: ✅ Active
