# Filament Summary Infolist Rule

## Sintesi

`getSummarySchema()` nei wizard Filament deve rappresentare dati riepilogativi read-only con Filament Infolists, seguendo la documentazione ufficiale Filament 5: <https://filamentphp.com/docs/5.x/infolists/overview>.

## Regola

- Usare componenti `Filament\Infolists\Components\*` per dati strutturati e read-only.
- Non usare `SchemaView` per costruire riepiloghi di wizard.
- Non usare componenti form disabilitati o placeholder come surrogati di riepilogo.
- Usare `Filament\Schemas\Components\Utilities\Get` quando serve leggere lo stato corrente del wizard e mapparlo negli entry dell'infolist.

## Motivazione

Gli Infolists sono il meccanismo Filament dedicato alla visualizzazione di dati read-only con semantica label-valore. `SchemaView` va riservato a casi di rendering custom esplicito, non a riepiloghi che possono essere espressi come dati strutturati. Questo mantiene DRY + KISS: meno Blade custom, meno ambiguita tra input e output, piu coerenza con il runtime Filament.

## Applicazione

Quando una story o un refactor tocca un wizard:

1. Cercare `getSummarySchema()`.
2. Verificare che il ritorno usi Infolist entries.
3. Rimuovere `SchemaView` se usato per il riepilogo.
4. Aggiornare docs locali del modulo/tema e linkare questa pagina invece di duplicare la regola.

## Fonti

- Regola operativa: [docs/rules/filament-summary-infolist-rule.md](../../rules/filament-summary-infolist-rule.md)
- Documentazione ufficiale Filament: <https://filamentphp.com/docs/5.x/infolists/overview>
