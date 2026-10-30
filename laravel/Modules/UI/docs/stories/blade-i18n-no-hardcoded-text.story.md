---
title: "Niente testi fissi nelle Blade del modulo UI (multilingua it/en/de/es)"
type: story
status: implemented
module: UI
updated: 2026-10-30
tags: [i18n, blade, multilingua]
---

# Niente testi fissi nelle Blade del modulo UI

## Scopo

Il sito risponde in italiano, inglese, tedesco e spagnolo: un testo scritto dentro una Blade esce uguale in ogni lingua. Il `fallback_locale` e' `it`, quindi una chiave mancante in `en`/`de`/`es` non da' errore e mostra l'italiano.

## Regola operativa

- Ogni testo visibile passa da `{{ __('ui::contesto.collezione.chiave.tipo') }}`: cinque elementi, dove `contesto` e' il nome del file lingua e `tipo` il genere di testo (`label`, `title`, `description`, `placeholder`, `tooltip`, `helper_text`, `message`, `aria_label`, `alt`; [regola 008](../../../../../docs/wiki/rules/008-translation-5-level-protocol.md)). Mai la frase come chiave: nessun file la traduce, e il traduttore ignora `['default' => ...]`.
- La stringa va in `Modules/UI/lang/{it,en,de,es}/<contesto>.php`, con le stesse chiavi e gli stessi `:parametri` nelle quattro lingue. `it` e' l'originale; `en`, `de`, `es` sono traduzioni vere. Se l'originale era inglese, `en` lo conserva e `it` e' la traduzione.
- Vale anche per `aria-label`, `placeholder`, `title`, `alt`, per i default testuali di `@props` e, in PHP, per `->label()`, `->placeholder()`, `->tooltip()`, `->helperText()`.
- Frasi con variabili: segnaposto `:param` e `trans_choice` per i plurali; il markup resta nella Blade e la frase si spezza solo dove serve.
- Link a pagine CMS: niente `href="/it/..."`, niente `url('/...')`, niente nomi di rotta inventati per pagina. Si usa la rotta generica della shell Folio, `route('container0.view', ['container0' => 'area-personale', 'slug0' => 'notifiche'])`: il prefisso lingua lo aggiunge Folio. L'indice ha un nome diverso per tema (`container0` in Two e Meetup, `container0.index` in Sixteen e TwentyOne): una vista di modulo condivisa tra temi usa `view` oppure riceve l'URL dal chiamante. I nomi Folio veri (`home`, `login`, `logout`) restano validi.
- Non sono errori: marchi e nomi propri, sigle, numeri, valori che arrivano dal modello o dal CMS, `alt=""` decorativo.

## Cosa e' stato fatto

- Rilevatore `bashscripts/tools/i18n/find-hardcoded-blade-text.py` sul modulo: da 2.685 occorrenze in 192 file a 135 in 50 file (stesso strumento, commit di partenza contro stato attuale).
- Oltre 180 Blade convertite: blocchi CMS (hero, CTA, blog, sezioni di funzioni, header, galleria, newsletter, listini, statistiche, testimonianze, appuntamenti, documenti, materiali, idoneita', dashboard paziente, notifiche, profilo), componenti `ui/`, `filament/` e `livewire/`. Portati a `__()` anche i default testuali di `@props` e i `?? 'Testo'`.
- Creati 24 file lingua per ognuna delle quattro lingue, circa 860 chiavi per lingua: 21 di blocchi (`blocks_hero`, `blocks_cta`, `blocks_blog`, `blocks_feature_sections`, `blocks_header`, `blocks_gallery`, `blocks_newsletter`, `blocks_newsletter_archivied`, `blocks_appointments`, `blocks_documents_list`, `blocks_educational_materials`, `blocks_eligibility_checker`, `blocks_notifications_list`, `blocks_patient_dashboard`, `blocks_pricing`, `blocks_pricing_plans`, `blocks_slider`, `blocks_stats`, `blocks_testimonials`, `blocks_user_profile`, `blocks_demo_shared`) e 3 di componenti (`components_ui`, `components_shell`, `components_common`).
- Completati de/es nei file condivisi per le chiavi usate dalle Blade: `auth`, `components`, `datepicker`, `interactive_map`, `navigation`, `redirect`, `services`, `stepper`, `studio-selector`, `widgets`.
- Scelte: gli originali italiani restano identici in `it`; gli originali inglesi (demo Tailwind) sono identici in `en`; il riempitivo latino e' uguale in tutte le lingue; le date demo seguono il formato di ogni lingua; le frasi spezzate dal markup sono scritte perche' la coda resti valida; i parametri sono `:plan`, `:price`, `:count`, `:company`, `:number`.

## Residui dichiarati (135 occorrenze)

| Categoria | N |
|---|---:|
| Direttive Blade e frammenti Alpine (`@error`, `@csrf`, `@svg`, `@teleport`, ...): falsi positivi | 40 |
| Nomi di persona nei blocchi demo (autori, testimonianze) | 37 |
| Riempitivo latino (lorem ipsum), senza lingua | 31 |
| Marchi (social, loghi di clienti demo) | 10 |
| Segnaposto e scaffold di sviluppo | 6 |
| Codice valuta `USD` | 4 |
| Nomi di file in pannelli di codice demo | 4 |
| Luogo (nome proprio) in un annuncio demo | 3 |

Testi in PHP (`->label()` e simili): non cercati in questa campagna sul modulo, quindi non toccati.

## Limiti

- Nessuna verifica a video: chiavi e compilazione sono controllate in modo statico.
- In `blocks_pricing_plans`, `blocks_stats` e `blocks_testimonials` i valori `it` erano l'originale inglese dei demo Tailwind. Sono stati tradotti (148 valori: 100, 44 e 4) con `:parametri` ed entita' `&nbsp;` invariati; restano uguali il lorem ipsum, che e' segnaposto in tutte le lingue, e i nomi di piano che sono nomi di prodotto (Enterprise, Hobby, Premium, Scale, Starter, Startup, Team).
- Alcuni file `de` preesistenti contengono ancora voci in italiano, non sovrascritte; alcune chiavi preesistenti hanno quattro elementi invece di cinque e non sono state rinominate.
- Verifica del 2026-10-30: PHPStan sui moduli senza errori, compilazione Blade dei file convertiti senza errori, nessuna chiave usata dalla campagna manca in `it`, `en`, `de`, `es`.

## Riferimenti

Metodo e regola completa: [story del tema Two](../../../../Themes/Two/docs/stories/blade-i18n-no-hardcoded-text.story.md); protocollo a cinque elementi: [regola 008](../../../../../docs/wiki/rules/008-translation-5-level-protocol.md). Il dettaglio per file e' nel repo privato di audit.
