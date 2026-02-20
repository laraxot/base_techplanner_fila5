# Filament 5.x compatibility - modulo User

**Versione Filament:** v5.2.1

## Stato compatibilità

Il modulo User è **compatibile** con Filament 5.x. Nessun breaking change funzionale rispetto a Filament 4.x.

## Note specifiche modulo

- I fix PHPStan per type safety (abstract methods, type comparisons, traits) da Filament 4.x restano validi
- `RegisterWidget` e `LoginWidget` seguono i pattern Livewire/Volt e non dipendono direttamente da API Filament modificate
- Il `BaseUser Model` con alias di estensione resta compatibile

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
- [x] Fix PHPStan type safety (da Filament 4.x) confermati compatibili
- [ ] Verificare `RegisterWidget` con Livewire 4.x dopo upgrade
- [ ] Verificare `LoginWidget` con Livewire 4.x dopo upgrade
- [ ] Verificare Tailwind CSS 4.1+ dopo upgrade

## Riferimenti

- [Guida upgrade Filament 5 (Xot)](../../Xot/docs/filament-5-upgrade-guide.md)
- [Regole Laraxot per Filament 5 (Xot)](../../Xot/docs/filament-5-laraxot-rules.md)
- [Documentazione ufficiale](https://filamentphp.com/docs/5.x/upgrade-guide)
