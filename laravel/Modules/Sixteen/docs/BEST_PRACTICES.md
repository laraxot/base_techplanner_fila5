# Best Practices – Sixteen

## Principi DRY/KISS
- **DRY**: Usa `SixteenServiceProvider` per registrazione componenti globali.
- **KISS**: Limita setup a 10 minuti o meno (usa default se non necessario).
- **Clean Code**: Evita eredità da `ViewServiceProvider` in favore di trait dedicati.

## Componenti
- Usa `Facade::sixteen()` per configurazioni complesse.
- Implementa `ServiceProvider::bindings()` per servizi condivisi.

## Test
- Testa configurazioni globali con casi limite (binding failures).
- Verifica disponibilità componenti critici in `tests/Feature`.

## Documentazione
- Collega in `docs/INDEX.md` ai componenti più usati.
- Documenta problemi comuni in `README.md`.
