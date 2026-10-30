---
title: "Niente testi fissi nelle Blade del tema Two (multilingua it/en/de/es)"
type: story
theme: Two
status: done
updated: 2026-10-30
tags: [docs, two, i18n, blade, translations, bmad]
---

# Niente testi fissi nelle Blade del tema Two

**Fase BMAD**: Dev + QA (diff minimo, ponytail). **Richiesta utente**: «il progetto e' in multilingua percio' nelle blade non puoi fare per esempio `<span class="text-gray-700">Le mie segnalazioni</span>` ! analizza trova gli errori simili e correggili».

## Perche'

Il sito risponde in italiano, inglese, tedesco e spagnolo. Un testo scritto dentro una Blade esce uguale in ogni lingua, anche quando in italiano sembra giusto. Il `fallback_locale` e' `it`: una chiave mancante in `en`/`de`/`es` non da' errore, mostra l'italiano, e nessun test fallisce.

## Regola per il tema

- Ogni testo visibile passa da `{{ __('pub_theme::contesto.collezione.chiave.tipo') }}` (cinque elementi; tipi `label`, `title`, `placeholder`, `help`, `message`). Il testo deve esistere davvero nei file lingua: il traduttore del progetto non legge `['default' => ...]`.
- Namespace: `pub_theme::`. Il namespace `two::` dichiarato dal provider del tema non viene caricato (il provider e' indicato in `composer.json` con un percorso di classe sbagliato); `pub_theme::` e' quello che il CMS mappa su `Themes/<tema attivo>/lang`, ed e' gia' usato dalle Blade del tema.
- File lingua in `lang/{it,en,de,es}/<contesto>.php`. `it` e' il testo originale; `en`, `de`, `es` sono traduzioni vere. Se l'originale era in inglese (es. le viste Livewire di login e registrazione), `en` conserva l'originale e `it` e' la traduzione.
- Testi comuni (Cerca, Categoria, Tutti, paginazione, Indietro, Continua, Chiudi) in `common.php`, una chiave sola riusata.
- Frasi con variabili: segnaposto `:param`, plurali con `trans_choice`, mai pezzi di frase concatenati. Il markup resta nella Blade e la frase si spezza.
- Testi dentro `<script>`: `@js(__('...'))`. Default testuali di `@props` e fallback `?? 'Testo'`: `__()`.
- Link con lingua fissa (`/it/blog/...`): nome di route Folio (`route('blog')`, `route('blog.show', ...)`). Dove non esiste un nome affidabile il link non si inventa.
- Non sono errori: marchi e nomi propri, numeri, sigle, valori che arrivano dal modello o dal CMS, `alt=""` decorativo, pagine demo.

## Cosa e' stato fatto

- Misurato il tema col rilevatore `bashscripts/tools/i18n/find-hardcoded-blade-text.py` (sola lettura): da 384 occorrenze in 55 file a 98 in 31, tutte residue classificate (falsi positivi, dati di esempio, pagine demo, link senza route).
- Corrette 51 Blade (blocchi servizi con prenotazione e ricerca, ricerca e filtri del blog, newsletter, CTA, footer, header Bootstrap Italia, viste Livewire di login/registrazione/recupero password, elenco articoli, form contatti, dashboard) e i default dei blocchi.
- Creati 13 file lingua per ognuna delle quattro lingue: `common`, `booking`, `services`, `blog`, `auth_forms`, `post_list`, `contact_form`, `dashboard`, `footer_section`, `header_portal`, `a11y_labels`, `block_defaults`, `block_fallbacks` (288 chiavi per lingua).
- Le correzioni di accessibilita' dell'audit WCAG (ruoli ARIA, `sr-only`, dimensioni minime dei bersagli) sono state mantenute: sono cambiati solo i testi.

## Verifica

- Rilevatore prima e dopo sullo stesso perimetro.
- Compilazione Blade di ogni file toccato (solo compilazione, nessun rendering) e `php -l` sui file lingua.
- Controllo statico: ogni `pub_theme::...` del tema (651 usi) esiste in `it`, `en`, `de`, `es`; stesse chiavi e stessi `:parametri` nelle quattro lingue.
- Non provato in browser: la resa a video, il comportamento di `@js()` nei template JavaScript e la risoluzione di `route()` con il prefisso lingua.

## Fuori perimetro e residui

- Layout, header, hero, breadcrumb e barra cookie sono seguiti da un'altra sessione.
- Restano da decidere pochi link senza nome di route (form contatti, due voci del footer legacy) e la sorte dei contenuti di esempio (card articolo demo, prototipo di header Bootstrap Italia, dati di esempio nei `@props` dei blocchi blog). L'elenco puntuale e' nel repo privato.
- La configurazione `pub_theme` ripete la chiave piu' volte: vale l'ultimo valore. Va ripulita per evitare che il tema attivo cambi per un semplice riordino.

## Come non reintrodurre il difetto

Prima di chiudere una Blade: `python3 -I bashscripts/tools/i18n/find-hardcoded-blade-text.py <cartella>` dalla radice del repo e controllo che ogni chiave nuova esista in tutte e quattro le lingue.

## Seguito: forma delle chiavi

Le chiavi a 2-3 segmenti create da questa campagna sono state in parte portate a `ns::file.collezione.chiave.tipo`: **93 chiavi spostate** in questo proprietario (stesso testo, tutte le lingue, usi riscritti, nessun uso della vecchia chiave rimasto). Quattordici chiavi non sono state spostate: `coming-soon.*` (il file lingua ha commenti) e due chiavi del footer usate anche da Sixteen. La frase sui «tre o quattro elementi» qui sopra descrive lo stato precedente: le chiavi rimaste a 3-4 elementi non sono state verificate una per una; la misura assoluta, lo strumento e i residui sono in [la story di Lang](../../../../Modules/Lang/docs/stories/translation-key-shape-rekey.story.md).
