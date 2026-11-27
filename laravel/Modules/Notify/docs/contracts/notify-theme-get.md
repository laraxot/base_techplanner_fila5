---
title: "Contratto — NotifyTheme\\Get"
type: contract
action: "Modules\\Notify\\Actions\\NotifyTheme\\Get"
module: Notify
status: accepted
tags: [contract, action, notify, theme, template]
created: 2026-11-26
updated: 2026-11-26
---

# NotifyTheme\Get

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/NotifyTheme/Get.php`. Risolve il `NotifyTheme` per
`(lang, type, post_type, post_id)` creandolo se manca, lo popola dalle `trans()` del
modulo corrente e sostituisce i segnaposto `##chiave##` in subject/body.

## Input

- `string $name`: `post_type` del tema (es. nome del template).
- `string $type`: canale (`email`, `sms`, `whatsapp`, `pdf`, ...).
- `array<string, mixed> $view_params`: parametri; `post_id` (default 0) e `lang`
  (default `app()->getLocale()`) identificano il tema.

## Output

- `NotifyThemeData`: `from_email`, `from`, `subject`, `body_html`, `view_params` gia'
  interpolati.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-THEME-INV-1 | Il tema si risolve per `firstOrCreate` su `(lang, type, post_type, post_id)`: due chiamate con gli stessi parametri usano la stessa riga. | — (non dimostrato) |
| NOTIFY-THEME-INV-2 | `subject`, `theme`, `body_html` nulli vengono popolati una volta (subject/theme da config o `trans()`); i valori gia' impostati non sono sovrascritti. | — (non dimostrato) |
| NOTIFY-THEME-INV-3 | I segnaposto sono `##chiave##` (non `{{ }}`): solo le chiavi stringa di `view_params` vengono sostituite, in subject e body_html. | — (non dimostrato) |
| NOTIFY-THEME-INV-4 | `theme='empty'` produce `logo` come tag `<img>` HTML dai campi `logo.path/width/height`; gli altri temi usano `$theme->logo` grezzo. | — (non dimostrato) |
| NOTIFY-THEME-INV-5 | `view_params` persistiti solo se `view_params` del tema era vuoto: non si riscrive un tema gia' completo. | — (non dimostrato) |

## Effetti collaterali

- `INSERT`/`UPDATE` su `notify_themes` (creazione lazy + backfill di campi nulli).
- `trans()` sul modulo `main_module` di `XotData` (`{module}::{type}.{name}.subject|body_html`).

## Errori

- Nessuna eccezione esplicita: le `trans()` mancanti tornano la chiave stessa, che viene
  confrontata con `$trad_mod.'.body_html'` per decidere se usare `##body_html##`.

## Non fa

- Non invia: e' la fase di risoluzione del contenuto (usata da `BuildMailMessageAction` e `Attachment\Pdf`).
- Non valida i `view_params`: i segnaposto non trovati restano `##chiave##` nel testo.
