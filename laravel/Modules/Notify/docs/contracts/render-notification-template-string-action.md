---
title: "Contratto — RenderNotificationTemplateStringAction"
type: contract
action: "Modules\\Notify\\Actions\\RenderNotificationTemplateStringAction"
module: Notify
status: accepted
tags: [contract, action, notify, template, placeholder, sicurezza]
created: 2026-11-26
updated: 2026-11-26
---

# RenderNotificationTemplateStringAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/RenderNotificationTemplateStringAction.php`. Sostituzione sicura
dei segnaposto `{{ ... }}` nei template di notifica da database: niente `Blade::render`,
quindi niente esecuzione di PHP (DCP-283).

## Input

- `string $template`: testo del template.
- `array<string, mixed> $data`: valori per i segnaposto.

## Output

- `string`: template con i placeholder risolti (scalar/`Stringable` → `e()` escaped);
  tutto il resto resta testo invariato.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIFY-TPL-INV-1 | Solo `{{ nome }}`, `{{ $nome }}` e percorsi con punti (`user.address.city`) sono sostituiti: niente chiamate, operatori, indici, `->`, virgolette. | NOTIFY-TPL-INV-1 |
| NOTIFY-TPL-INV-2 | Un'espressione non ammessa resta **come testo** nel risultato e logga `Log::warning`; non viene eseguita. Limite noto: i test provano che non si esegue nulla; il `Log::warning` è asserito solo per variabili mancanti o non stampabili (INV-3, INV-4). | NOTIFY-TPL-INV-2 |
| NOTIFY-TPL-INV-3 | Variabile mancante in `$data` → stringa vuota + warning; `null` → stringa vuota senza warning. Limite noto: «`null` senza warning» non è asserito. | NOTIFY-TPL-INV-3 |
| NOTIFY-TPL-INV-4 | Valori non stampabili (array, oggetto non `Stringable`) → vuoto + warning. Limite noto: coperto l'array; l'oggetto non `Stringable` no. | NOTIFY-TPL-INV-4 |
| NOTIFY-TPL-INV-5 | `{{{ }}}`, `{!! !!}`, direttive `@php/@if/@include` e triple graffe non sono toccate. Limite noto: «non toccate» è asserito per `@php`; per le altre forme il test prova solo che non si esegue codice. | NOTIFY-TPL-INV-5 |
| NOTIFY-TPL-INV-6 | I valori scalar sono escapati con `e()`: stesso escaping di `{{ }}` Blade. | — (non dimostrato) |

## Effetti collaterali

- `Log::warning` su espressione non ammessa, variabile mancante o non stampabile.

## Errori

- Nessuna eccezione: `preg_replace_callback` fallita ritorna il template originale.

## Non fa

- Non esegue Blade: e' la ragione di esistere (anti `{{ system('id') }}`).
- Non supporta `{{!! !!}}` unescaped o espressioni complesse.
- Non valida il template: un placeholder errato resta testo.
