# Compatibilità Filament 5.x - Modulo Cms

**Status**: attivo  
**Versione Filament**: ^5.0 (progetto base)  
**Regola**: i nomi dei file .md sono in minuscolo con trattino; un solo file per la compatibilità Filament (5.x).

## Contesto

Questo progetto usa **Filament 5.x**. La documentazione di compatibilità deve riferirsi alla versione in uso, non alla 4.x. Per la migrazione da 4 a 5 vedi la [guida ufficiale](https://filamentphp.com/docs/5.x/panels/upgrade) e i requisiti (Livewire 4, Tailwind 4, Laravel 11.28+, PHP 8.2+).

## Riferimenti da 4.x (storico)

Le correzioni applicate in passato per Filament 4.x restano valide dove le API non sono cambiate in 5.x:

- **SectionPreview / make()**: uso di `parent::make($name)` dove richiesto.
- **Dashboard / getNavigationIcon()**: tipo `string|null`; cast `(string) $icon->value` per BackedEnum se presente.
- **Proprietà view**: non statica dove Filament lo richiede.
- **PHPDoc**: tipi di ritorno e parametri espliciti per PHPStan.

In caso di dubbi su API 5.x: [Filament 5.x Docs](https://filamentphp.com/docs/5.x).

## Modulo Cms e Filament 5.x

- Risorse, pagine e widget Filament nel modulo estendono le classi base Xot (es. `XotBaseResource`, `XotBasePage`), non le classi Filament direttamente.
- Pattern e convenzioni Filament 5.x sono descritti in:
  - [Modules/Xot/docs/filament](../../Xot/docs/filament) (se esiste guida 5.x)
  - Regola progetto: [.cursor/rules/filament-version.mdc](../../../../../../.cursor/rules/filament-version.mdc)

## Collegamenti

- [Filament 5.x Documentation](https://filamentphp.com/docs/5.x)
- [Filament 5.x Upgrade Guide](https://filamentphp.com/docs/5.x/panels/upgrade)
- [Indice documentazione Cms](00-index.md)
- Documentazione storica 4.x: [archive/filament-4x-compatibility.md](archive/filament-4x-compatibility.md) (solo riferimento)
