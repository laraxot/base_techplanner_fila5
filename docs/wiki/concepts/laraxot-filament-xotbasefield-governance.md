# Laraxot: form Filament — estendere solo XotBaseField

**Status:** policy di progetto  
**Aggiornato:** 2026-04-20

## Regola

Nei **campi form Filament** (componenti in `Modules\...\Filament\Forms\Components\`):

- **non** estendere direttamente `Filament\Forms\Components\Field` (né altre classi Filament di primo livello dove esiste un wrapper Xot);
- **estendere** `Modules\Xot\Filament\Forms\Components\XotBaseField`, che a sua volta estende `Field` e centralizza il punto di aggancio Laraxot.

## Perché

- Coerenza con la documentazione Laraxot e le regole `.cursor` / moduli: un solo livello di estensione controllato dal modulo `Xot`.
- Evoluzioni future (hook comuni, convenzioni, telemetria) su un’unica base.
- Evita che ogni modulo aggiunga direttamente dipendenze da API Filament senza passare dal core condiviso.

## Riferimento codice

- `laravel/Modules/Xot/app/Filament/Forms/Components/XotBaseField.php`

## Esempio (Geo)

- `Modules\Geo\Filament\Forms\Components\MapPicker` → `extends XotBaseField`
- `Modules\Geo\Filament\Forms\Components\CoordinatePicker` → `extends XotBaseField`
- `Modules\Geo\Filament\Forms\Components\LatitudeLongitudeInput` → `extends XotBaseField`
- `LocationPicker` → `extends MapPicker` (alias DRY)

## Audit operativo minimo

Quando si apre o si crea un field in `Modules\...\Filament\Forms\Components\`:

1. verificare subito la riga `extends`;
2. se il field estende `Field` direttamente, fermarsi e correggere prima di ogni altra modifica;
3. documentare il fix nel wiki locale del modulo e nel log globale se la regola emerge come memoria persistente.

## Regola di memoria operativa

Quando emerge una violazione o un dubbio su questa gerarchia:

1. correggere il codice;
2. correggere gli esempi obsoleti nei docs/wiki;
3. aggiornare i README e gli indici canonici del modulo o tema coinvolto;
4. aggiornare il log wiki root e locale;
5. aggiornare memories o rules locali dell'agente se la regola va ricordata cross-sessione.

## Backlink

- [wiki log](../log.md)
- [map-picker-filament-field](../../../../laravel/Modules/Geo/docs/wiki/concepts/map-picker-filament-field.md) (modulo Geo)
