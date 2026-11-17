# Rule: Traduzioni — Formato e Fallback

## Applies to: All modules

## Formato chiavi

Forma canonica obbligatoria:

`<namespace>::<contesto>.<collezione>.<key>.<tipo>`

Esempi validi:

- `predict::home.hero.title.label`
- `predict::home.hero.cta_learn.label`
- `predict::predict_table.filters.category.label`
- `pub_theme::header.navigation.markets.label`

Esempi non validi per nuove chiavi o refactor:

- `predict::hero.title`
- `predict::home.hero.cta_learn`
- `predict::common.view`

La regola vale anche quando il testo e' usato dentro JSON CMS o builder config: la chiave deve gia' distinguere contesto, collezione, elemento e tipo.

## MAI usare __() con fallback stringa

```php
// ❌ SBAGLIATO — in Laravel 12 il secondo arg è $replace (array)
__('predict::labels.volume_24h.label', 'Volume 24h')

// ✅ CORRETTO — senza fallback
__('predict::labels.volume_24h.label')

// ✅ CORRETTO — con helper $tx nelle view
$tx('predict::labels.volume_24h', 'Volume 24h')
```

## Struttura file per nuove chiavi

Creare file separati per contesto o macro-collezione, mantenendo al loro interno la gerarchia a 4 nodi dopo il namespace:

- `home.php` — homepage, hero, social proof, stats, faq
- `predict_table.php` — listing, filtri, empty state, sorting
- `market.php` — detail page e meta del mercato
- `navigation.php` — header, footer, mobile tabs
- `messages.php` — messaggi di stato trasversali solo se davvero cross-context

Creare per tutte le lingue: `it/`, `en/`, `es/`.

## Chiavi che ritornano array

Se una chiave ritorna un array (es. `['label' => '...']`), usare `{{ __('key.label') }}`
non `{{ __('key') }}` — altrimenti `htmlspecialchars()` fallisce con "array given".


## Governance di refactor

- Non introdurre nuove chiavi corte per comodita'.
- Quando tocchi una chiave legacy corta, portala verso il formato a 5 segmenti.
- Evita bucket generici come `common` salvo casi realmente cross-context e comunque con `collection.key.type`.
- Nei componenti Blade del tema preferire fallback helper locali solo come rete temporanea, non come contratto finale.
