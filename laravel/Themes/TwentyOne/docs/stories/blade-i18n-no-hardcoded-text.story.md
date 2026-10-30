---
title: "Niente testi fissi nelle Blade del tema TwentyOne (multilingua it/en/de/es)"
type: story
status: implemented
theme: TwentyOne
updated: 2026-10-30
tags: [i18n, blade, multilingua]
---

# Niente testi fissi nelle Blade del tema TwentyOne

## Scopo

Il sito risponde in italiano, inglese, tedesco e spagnolo: un testo scritto dentro una Blade esce uguale in ogni lingua. Il `fallback_locale` e' `it`, quindi una chiave mancante in `en`/`de`/`es` non da' errore e mostra l'italiano.

## Regola operativa

- Ogni testo visibile passa da `{{ __('pub_theme::contesto.collezione.chiave.tipo') }}`: cinque elementi, dove `contesto` e' il nome del file lingua e `tipo` il genere di testo (`label`, `title`, `description`, `placeholder`, `tooltip`, `helper_text`, `message`, `aria_label`, `alt`; [regola 008](../../../../../docs/wiki/rules/008-translation-5-level-protocol.md)). Mai la frase come chiave, e il traduttore ignora `['default' => ...]`.
- Namespace: solo `pub_theme::`, mai `twentyone::` ne' `two::`. Il tema non registra un namespace proprio: il CMS mappa `pub_theme` su `Themes/<tema attivo>/lang`, quindi le chiavi si risolvono quando il tema attivo e' TwentyOne.
- La stringa va in `Themes/TwentyOne/lang/{it,en,de,es}/<contesto>.php`, con le stesse chiavi e gli stessi `:parametri` nelle quattro lingue. `it` e' l'originale; `en`, `de`, `es` sono traduzioni vere. Se l'originale era inglese (quasi tutte le viste di articolo e di trading), `en` lo conserva e `it` e' la traduzione.
- Vale anche per `aria-label`, `placeholder`, `title`, `alt`. Frasi con variabili: `:param` e `trans_choice`; il markup resta nella Blade.
- Link a pagine CMS: niente `href="/it/..."`, niente `url('/...')`, niente nomi di rotta inventati per pagina. Si usano le rotte generiche della shell Folio, `route('container0.index', ['container0' => 'tickets'])` e `route('container0.view', ['container0' => 'area-personale', 'slug0' => 'notifiche'])`: il prefisso lingua lo aggiunge Folio. I nomi Folio veri (`home`, `login`, `logout`) restano validi.
- Non sono errori: marchi e nomi propri, unita' di valuta, numeri, valori che arrivano dal modello o dal CMS.

## Cosa e' stato fatto

- Rilevatore `bashscripts/tools/i18n/find-hardcoded-blade-text.py` sul tema: da 1.022 occorrenze in 149 file a 650 in 105 file (stesso strumento, commit di partenza contro stato attuale). La riduzione viene dalla prima meta' del tema.
- 56 Blade convertite: pagina dell'articolo e relativi blocchi, elenco articoli, schede e filtri dei mercati, dettaglio mercato, modulo di trading, footer, hero, navigazione, condivisione social, blocchi di marketing.
- Creati 12 file lingua per ognuna delle quattro lingue, circa 290 chiavi per lingua: `article_list`, `article_show`, `blocks_footer`, `blocks_hero`, `blocks_marketing`, `blocks_markets`, `blocks_nav`, `blocks_social`, `blocks_trading`, `market_common`, `market_detail`, `market_filters`. Creati in `de` ed `es` anche `404` e `headernav`, che esistevano solo in `it`/`en`.

## Residui dichiarati (650 occorrenze)

| Categoria | N |
|---|---:|
| Seconda meta' del tema, non convertita (pagine, accesso e registrazione, widget Filament dei mercati, home, footer crypto, intestazioni) | 596 |
| Prima meta' del tema: dati di esempio di mercato (commenti, tag, importi, date), direttive Blade, marchi | 54 |

Testi in PHP: non cercati in questa campagna sul tema, quindi non toccati.

## Limiti

- Il tema e' un clone di un altro prodotto (mercati di previsione): le viste che dipendono dal suo modulo, assente in questo repo, non sono state toccate. La seconda meta' resta da convertire se il tema verra' usato.
- Nessuna verifica a video, e il tema non e' quello servito oggi: le viste convertite non hanno effetto a video finche' TwentyOne non diventa il tema attivo, e questo non e' stato provato.
- Verifica del 2026-10-30: compilazione Blade dei file convertiti senza errori, nessuna chiave usata dalla campagna manca in `it`, `en`, `de`, `es`.

## Riferimenti

Metodo e regola completa: [story del tema Two](../../../Two/docs/stories/blade-i18n-no-hardcoded-text.story.md); protocollo a cinque elementi: [regola 008](../../../../../docs/wiki/rules/008-translation-5-level-protocol.md). Il dettaglio per file e' nel repo privato di audit.

## Seguito: forma delle chiavi

Le chiavi a 2-3 segmenti create da questa campagna sono state in parte portate a `ns::file.collezione.chiave.tipo`: **11 chiavi spostate** in questo proprietario (stesso testo, tutte le lingue, usi riscritti, nessun uso della vecchia chiave rimasto). Una chiave non e' stata spostata (`404.no_article`, usata anche dal modulo User). La frase sui «tre o quattro elementi» qui sopra descrive lo stato precedente: le chiavi rimaste a 3-4 elementi non sono state verificate una per una; la misura assoluta, lo strumento e i residui sono in [la story di Lang](../../../../Modules/Lang/docs/stories/translation-key-shape-rekey.story.md).
