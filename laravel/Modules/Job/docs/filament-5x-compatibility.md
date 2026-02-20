# Filament 5.x compatibility - modulo Job

**Versione Filament:** v5.2.1

## Stato compatibilità

Il modulo Job è **compatibile** con Filament 5.x. Nessun breaking change funzionale rispetto a Filament 4.x.

## Regole architetturali

Tutte le classi Filament **devono** estendere le classi `XotBase*`:

| Tipo | Classe base |
|------|------------|
| Resource | `XotBaseResource` |
| ListRecords | `XotBaseListRecords` |
| CreateRecord | `XotBaseCreateRecord` |
| EditRecord | `XotBaseEditRecord` |
| ViewRecord | `XotBaseViewRecord` |
| Widget | `XotBaseWidget` |

## Checklist modulo

- [x] Nessun import diretto da `Filament\*` base classes
- [ ] Verificare compatibilità con Livewire 4.x dopo upgrade
- [ ] Verificare Tailwind CSS 4.1+ dopo upgrade

## Riferimenti

- [Guida upgrade Filament 5 (Xot)](../../Xot/docs/filament-5-upgrade-guide.md)
- [Regole Laraxot per Filament 5 (Xot)](../../Xot/docs/filament-5-laraxot-rules.md)
- [Documentazione ufficiale](https://filamentphp.com/docs/5.x/upgrade-guide)
