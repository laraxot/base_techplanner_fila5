# Claim: PHPStan analyse Modules — HasXotFactory generics fix

Data: 2026-09-03
Agente: claude-sonnet-5 (sessione interattiva, pts/0)

## Contesto

Altro agente (claim: `phpstan-modules-fixall-claim-2026-09-03.md`) gia' al lavoro sullo
stesso scope, senza lock presi. Trovata collisione live: edit reciprocamente sovrascritti
su Geo/PlaceType.php, Province.php, Region.php, Media/TemporaryUpload.php.

## Scope mio (con lock, vedi bashscripts/lock/)

Al momento in cui ho iniziato, `phpstan analyse Modules` era gia' sceso a 57 errori
(lavoro dell'altro agente su Notify/Xot/UI gia' fatto). Errori residui, 2 cause radice:

1. `Xot/app/Models/Traits/HasXotFactory.php` — 19 model class usano il trait generico
   senza specificare `@use HasXotFactory<Factory<static>>` (pattern gia' in uso in
   XotBaseModel/XotBasePivot/XotBaseMorphPivot). Fix: aggiungo l'annotazione mancante
   + import `Factory` dove assente, sui 19 model file.
2. `Xot/app/Filament/Traits/HasXotTable.php` — method_exists/property_exists sempre
   true/false (ignore comment con identifier sbagliato). LOCKATO dall'altro agente,
   NON tocco.

File lockati da me: tutti i 19 model + HasXotFactory.php trait.
File saltati (lock altrui): Geo/Province.php, Xot/Filament/Traits/HasXotTable.php.

Nessun tocco a phpstan.neon. Nessun baseline/@phpstan-ignore per silenziare.

## Esito (CHIUSO)

18 model + trait: fix con `@use HasXotFactory<Factory<static>>` (import `Factory`
aggiunto dove mancava). Verificato pulito con `phpstan analyse` isolato per modulo
(Activity, Geo, Job, Lang, Media, User: 0 errori) dopo `clear-result-cache` (la cache
condivisa in /tmp/phpstan tra sessioni concorrenti dava falsi transitori).

Eccezione: `Tenant/app/Models/Domain.php` — la stessa annotazione con `Factory` importato
(short name) falliva con `class.notFound: Modules\Tenant\Models\Factory` (Larastan non
risolveva l'import per questo file specifico, causa non isolata). Fix: FQCN esplicito
`@use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>>`. Modulo
Tenant verificato pulito dopo il fix.

Lock rilasciati su tutti i 19 file. Non toccati Province.php e HasXotTable.php (lock
altrui, ancora attivi a fine lavoro).
