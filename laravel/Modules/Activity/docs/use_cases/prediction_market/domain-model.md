<<<<<<< .merge_file_qZUNRf
---
title: "Modello di Dominio - <nome progetto>ion Market"
type: note
status: draft
updated: 2026-10-07
tags: [docs, activity, use_cases]
qmd: "modello di dominio - <nome progetto>ion market activity"
---
=======
<<<<<<< HEAD
>>>>>>> .merge_file_ifBlHi
# Modello di Dominio - <nome progetto>ion Market
=======
# Modello di Dominio - Prediction Market
>>>>>>> 6ed19256f (.)

## Aggregate
- **Market**: rappresenta un mercato predittivo
- **Bet**: rappresenta una scommessa
- **Outcome**: rappresenta un possibile esito

## Eventi
- `MarketCreated`
- `BetPlaced`
- `MarketClosed`
- `PayoutProcessed`

## Comandi
- `CreateMarket`
- `PlaceBet`
- `CloseMarket`
- `ProcessPayout`

## Proiezioni
- **MarketStatus**: stato attuale dei mercati
- **UserBalance**: saldo utente aggiornato in tempo reale
- **BetHistory**: storico delle scommesse

## Esempio di evento
```php
class BetPlaced implements ShouldBeStored
{
    public function __construct(
        public string $marketUuid,
        public string $userUuid,
        public float $amount,
        public string $outcome
    ) {}
}
<<<<<<< HEAD
```
=======
```
>>>>>>> 6ed19256f (.)
