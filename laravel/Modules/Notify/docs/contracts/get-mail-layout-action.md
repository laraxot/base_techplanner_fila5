---
title: "Contratto — GetMailLayoutAction"
type: contract
action: "Modules\\Notify\\Actions\\Mail\\GetMailLayoutAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail, layout, tema]
created: 2026-11-26
updated: 2026-11-26
---

# GetMailLayoutAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/Mail/GetMailLayoutAction.php`. Risolve e legge il layout HTML
dell'email dal tema corrente (`Themes/{pub_theme}/resources/mail-layouts/`).

## Input

- `string $baseName = 'base'`: nome base del layout (`welcome`, ...).

## Output

- `string`: contenuto HTML del layout risolto; `'{{{ body }}}'` come fallback minimo se
  nemmeno `base.html` esiste.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-LAYOUT-INV-1 | Priorita' dei candidati: `{base}_{context}.html`, poi `{base}.html` (solo se `baseName != 'base'`), poi `christmas-professional.html` (solo se context `christmas`), poi `{context}.html`, poi `base.html`. | — (non dimostrato) |
| NOTIFY-LAYOUT-INV-2 | Il context viene da `GetThemeContextAction` (stagione corrente); il tema da `XotData::pub_theme` (default `theme`). | — (non dimostrato) |
| NOTIFY-LAYOUT-INV-3 | Se il file risolto non esiste il ritorno e' esattamente `'{{{ body }}}'`, mai una stringa vuota o eccezione. | — (non dimostrato) |

## Effetti collaterali

- Lettura file su filesystem (nessuna scrittura).

## Errori

- Nessuna eccezione prevista: i file mancanti degradano al fallback.

## Non fa

- Non compila placeholder: restituisce il file cosi' com'e' (con `{{{ body }}}` inclusa).
- Non usa `DetermineSeasonalContentViewPathAction`: il context e' di `GetThemeContextAction` (Xot).
- Non verifica permessi o dimensione del file.
