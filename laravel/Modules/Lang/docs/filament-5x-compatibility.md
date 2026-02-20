# Filament 5.x compatibility - modulo Lang

**Versione Filament:** v5.2.1

## Stato compatibilità

Il modulo Lang è **compatibile** con Filament 5.x. Nessun breaking change funzionale.

## Note specifiche modulo

- `LangServiceProvider` gestisce le traduzioni automatiche per tutte le labels Filament — non impattato dall'upgrade
- Le traduzioni in `Modules/{ModuleName}/lang/` restano compatibili

## Regole architetturali

Tutte le classi Filament **devono** estendere le classi `XotBase*` (vedi [regole Xot](../../Xot/docs/filament-5-laraxot-rules.md)).

## Checklist modulo

- [x] `LangServiceProvider` compatibile con Filament 5.x
- [ ] Verificare compatibilità con Livewire 4.x dopo upgrade
- [ ] Verificare Tailwind CSS 4.1+ dopo upgrade

## Riferimenti

- [Guida upgrade Filament 5 (Xot)](../../Xot/docs/filament-5-upgrade-guide.md)
- [Documentazione ufficiale](https://filamentphp.com/docs/5.x/upgrade-guide)
