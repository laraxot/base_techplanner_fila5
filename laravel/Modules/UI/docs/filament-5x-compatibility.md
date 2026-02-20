# Filament 5.x compatibility - modulo UI

**Versione Filament:** v5.2.1

## Stato compatibilità

Il modulo UI è **compatibile** con Filament 5.x. Nessun breaking change funzionale.

## Note specifiche modulo

- I temi Filament devono essere aggiornati per Tailwind CSS v4.1+
- Verificare che i componenti Blade e le variabili CSS custom siano compatibili con la nuova configurazione Tailwind

## Regole architetturali

Tutte le classi Filament **devono** estendere le classi `XotBase*` (vedi [regole Xot](../../Xot/docs/filament-5-laraxot-rules.md)).

## Checklist modulo

- [x] Nessun import diretto da `Filament\*` base classes
- [ ] Aggiornare temi Filament per Tailwind CSS 4.1+
- [ ] Verificare compatibilità con Livewire 4.x dopo upgrade

## Riferimenti

- [Guida upgrade Filament 5 (Xot)](../../Xot/docs/filament-5-upgrade-guide.md)
- [Requisiti Filament 5 (Xot)](../../Xot/docs/filament-5-requirements.md)
- [Documentazione ufficiale](https://filamentphp.com/docs/5.x/upgrade-guide)
