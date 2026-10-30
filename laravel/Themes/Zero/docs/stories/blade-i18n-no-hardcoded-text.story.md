---
title: "Niente testi fissi nelle Blade del tema Zero (multilingua it/en/de/es)"
type: story
status: implemented
theme: Zero
updated: 2026-10-30
tags: [i18n, blade, multilingua, bmad]
---

# Niente testi fissi nelle Blade del tema Zero

## GitHub (tracciamento)

| Tipo | Repo | # | Stato |
|------|------|---|-------|
| Issue | `laraxot/base_techplanner_fila5` | 18 | solo riferimento, nulla pubblicato |
| Discussion | `laraxot/base_techplanner_fila5` | 54 | solo riferimento, nulla pubblicato |

## Story

Come **visitatore del sito in italiano, inglese, tedesco o spagnolo**,
voglio **leggere ogni testo delle viste del tema Zero nella mia lingua**,
cosi' che **una frase scritta dentro una Blade non esca uguale in ogni lingua**.

## Scopo

Il sito risponde in quattro lingue e il `fallback_locale` e' `it`: una chiave mancante in `en`/`de`/`es` non da' errore e mostra l'italiano. Le viste di Zero avevano due difetti: testi scritti dentro la Blade (`pages/home`, `welcome`, `pages/index`, blocchi) e frasi intere usate come chiave (`__('Accedi al tuo account')`, `__('Quick Links')`), che nessun file lingua traduce.

## Acceptance Criteria

1. Nessun testo visibile resta scritto in una Blade di Zero, salvo marchi, nomi propri, direttive Blade e dati di esempio.
2. Ogni `__('Frase')` diventa `{{ __('pub_theme::<contesto>.<collezione>.<chiave>.<tipo>') }}` a cinque elementi (namespace + quattro segmenti), con la voce in `lang/{it,en,de,es}/<contesto>.php`.
3. `it` conserva il testo originale quando l'originale e' italiano; quando l'originale e' inglese (`layouts/guest`, `layouts/main`, `welcome`, `pages/index`, `navigation_simple`) `en` conserva l'originale e `it` e' la traduzione, come nelle story di Two, Meetup e User.
4. I `:parametri` sono uguali nelle quattro lingue; il markup resta nella Blade.
5. `check-blade-keys` sul tema: 0 chiavi mancanti; `check-key-shape`: nessuna chiave storta; ogni Blade toccata compila; `php -l` pulito sui file lingua.

## Tasks / Subtasks

- [x] Misurare con `find-hardcoded-blade-text.py` (prima: 79 occorrenze in 13 file).
- [x] Creare `lang/{it,en,de,es}/{layout,auth,home,welcome,blocks}.php` (61 chiavi per lingua; `es` non esisteva).
- [x] Sostituire testi e frasi-chiave in 12 Blade con `blade-replace.py`.
- [x] Verificare chiavi, forma, compilazione, sintassi.
- [x] Registrare i residui.

## Dev Notes

- Namespace `pub_theme::`, mai `zero::`/`theme::`. I file `navigation.php` e `ui.php` esistenti (chiavi piatte, solo `it`, `en`, `de`) non sono stati toccati.
- Le chiavi `pub_theme::` si risolvono sulla `lang` del tema attivo: valgono solo con Zero attivo.
- Le righe vuote e i ritorni a capo dentro i paragrafi di `pages/home` sono stati assorbiti nella voce lingua (una riga sola): il rendering HTML e' lo stesso, il sorgente no.
- `Email: info@example.com` e `Phone: +1 234 567 890` sono diventati `Email: :email` e `Phone: :phone` con i valori di esempio passati come parametri.

## Testing

Strumenti statici, nessun Pest e nessuna richiesta HTTP (Zero non e' il tema servito): scanner, `check-blade-keys.php`, `check-key-shape.py`, `blade-compile-check.php`, `php -l`.

## Dev Agent Record

### Passata 2026-10-30 (sessione 97f16a39, i18n-two-meetup-zero-user: Zero)

Scanner `Themes/Zero`: prima 79 occorrenze in 13 file (37 text, 1 attr, 41 phrase-key), dopo 4 in 4 file (4 text).

- Blade toccate (12): `components/layouts/{guest,main,auth}`, `components/navigation`, `components/blocks/{features/grid,navigation/simple,sidebar/system-info}`, `filament/widgets/auth/login`, `pages/{auth/login,home,index}`, `welcome`. In `blocks/navigation/simple` anche il fallback `?? 'Menu Item'` e il testo segnaposto.
- Chiavi nuove in `it`, `en`, `de`, `es` (61 per lingua): `layout` 11, `auth` 16, `home` 26, `welcome` 3, `blocks` 5. Vengono tutte dalle 41 frasi-chiave e dai testi fissi; `oppure` (non rilevata dallo scanner) e le voci social `Google`/`GitHub` sono incluse.
- Originale inglese: `layout.footer.*`, `layout.skip_link.main_content.label` (in `auth.blade` l'originale era italiano), `welcome.*`, `blocks.navigation_simple.*`: `en` = originale, `it` = traduzione. Per le frasi italiane `it` e' identico all'originale.
- Una chiave nata a 5 segmenti dopo `::` (`blocks.system_info.status.operational.label`) e' stata corretta a 4 e le voci spostate a mano nei 4 file (tutti nuovi).
- Residui (4): `@filamentScripts(withCore: true)` (3, direttiva) e `logo zero` in `components/ui/logo` (segnaposto del logo, non e' testo da tradurre).
- Controlli: `check-blade-keys` Zero: 23 Blade, 77 usi, 0 mancanti (it/en/de/es); `check-key-shape`: 77 chiavi, 0 storte; compilazione: 23 file, 0 non compilano (avviso preesistente: componente `navigation` non risolto in `layouts/guest` e `layouts/main`); `php -l` pulito sui 20 file lingua.
- Non verificato: nessun rendering (tema non servito); traduzioni `de`/`es` non riviste da un madrelingua; `Sistema Operativo` in `system-info` e' letto come «sistema operativo = in funzione» (indicatore verde), tradotto «System operational».
