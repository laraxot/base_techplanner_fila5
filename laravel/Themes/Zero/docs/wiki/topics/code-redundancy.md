---
title: "Topic code-redundancy"
type: digest
status: active
qmd: "digest ceiling 100 code-redundancy"
---

# Topic code-redundancy

Sintesi automatica di 3 documenti (chiave `code-redundancy`).

## Code redundancy audit — Zero

_Fonte: `bmad/code-redundancy-audit.md`_

# Code redundancy audit — Zero

## Scopo

Ridurre rumore, duplicazione e ambiguita' nel codice di questo theme, senza perdere conoscenza storica.

## Metriche

| Voce | Valore |
|---|---:|
| File PHP analizzati | 21 |
| Rischio ridondanza | high |
| Basename duplicati locali | 3 |
| Hash normalizzati duplicati cross-owner | 19 |
| Class/trait/interface name ripetuti nel monorepo | 0 |
| File grandi >=350 righe | 0 |
| File PHP con marker Git | 0 |

## Evidenze

### Basename duplicati locali
- `app.blade.php` x2
- `login.blade.php` x2
- `main.blade.php` x2

### File grandi
- Nessuno sopra soglia.

### Nomi classe ripetuti

## Code redundancy audit — Zero

_Fonte: `code-redundancy-audit.md`_

# Code redundancy audit — Zero

## Scopo

Ridurre rumore, duplicazione e ambiguita' nel codice di questo theme, senza perdere conoscenza storica.

## Metriche

| Voce | Valore |
|---|---:|
| File PHP analizzati | 21 |
| Rischio ridondanza | high |
| Basename duplicati locali | 3 |
| Hash normalizzati duplicati cross-owner | 19 |
| Class/trait/interface name ripetuti nel monorepo | 0 |
| File grandi >=350 righe | 0 |
| File PHP con marker Git | 0 |

## Evidenze

### Basename duplicati locali
- `app.blade.php` x2
- `login.blade.php` x2
- `main.blade.php` x2

### File grandi
- Nessuno sopra soglia.

### Nomi classe ripetuti

## Ridondanza — Theme Zero

_Fonte: `wiki/concepts/code-redundancy-theme.md`_

# Ridondanza — Theme Zero

## Scopo

Stesso ruolo di **One**: presentazione e wiring Livewire verso **User**. Zero non è owner di notifiche, performance o PTV.

## Zen

Due temi non sono «duplicati sbagliati» se servono **brand/UX** diversi. Diventano debito solo quando il diff è zero e nessuno documenta perché esistono due cartelle.

## P1 — login blade

Allineamento con One: stesso `@livewire` su `Auth\LoginWidget`. Estrarre partial comune se il markup converge.

## Attenzione commenti

Verificare che i commenti Blade non dicano «tema Zero» dentro file One (confusione agent).

## Collegamenti

- [One](code-redundancy-theme.md)
- [Filosofia](../../../../Modules/Xot/docs/wiki/concepts/code-redundancy-philosophy.md)
