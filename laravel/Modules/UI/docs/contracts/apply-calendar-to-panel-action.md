---
title: "Contratto — ApplyCalendarToPanelAction"
type: contract
action: "Modules\\UI\\Actions\\Panel\\ApplyCalendarToPanelAction"
module: UI
status: accepted
created: 2026-11-26
updated: 2026-11-26
tags: [contract, action, filament, panel, calendar, disabled]
qmd: "ApplyCalendarToPanelAction calendario pannello Filament FullCalendar disabilitato no-op Filament v4"
---

# ApplyCalendarToPanelAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/Panel/ApplyCalendarToPanelAction.php`.
**Oggi non fa niente**: il registro del calendario (pacchetto `Saade\FilamentFullCalendar`) è spento «temporaneamente» per la migrazione a Filament v4 (docblock della classe, righe 12-14).
Il contratto descrive questo comportamento di ripiego, non quello previsto. Chiamanti nel codice: nessuno (`rg ApplyCalendarToPanelAction Modules --glob '*.php'` trova solo la classe).

## Input

- `Filament\Panel $panel`: il pannello.
- `string $calendarClass`: la classe del calendario da montare; **non è letta** (riga 24).

## Output

- `Filament\Panel`: la stessa istanza ricevuta, invariata.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| UI-CALENDAR-INV-1 | Ritorna la stessa istanza di `Panel` ricevuta e non la modifica: nessun plugin, nessuna pagina, nessuna risorsa viene aggiunta (riga 34). | — (non dimostrato) |
| UI-CALENDAR-INV-2 | `$calendarClass` non viene validata né usata: qualunque stringa, anche vuota o di una classe inesistente, è accettata. | — (non dimostrato) |
| UI-CALENDAR-INV-3 | Scrive un solo messaggio fisso `Log::info` solo se `config('app.debug')` è vero, altrimenti non scrive niente (righe 30-32). | — (non dimostrato) |

Test: nessuno.

## Effetti collaterali

- Al più una riga di log di livello `info` (INV-3). Nessuna scrittura su database, nessun evento, nessuna coda, nessuna chiamata di rete.

## Errori

- Nessuna eccezione propria. Un errore del canale di log risale al chiamante.

## Non fa

- Non registra nessun calendario: chi la chiama aspettandosi un calendario nel pannello non lo ottiene e non riceve nessun errore.
- Non controlla `$calendarClass`.
- Non tocca permessi, tenancy o percorsi del pannello.

## Limiti noti

- Limite noto: ritorna silenziosamente il pannello senza calendario. L'implementazione precedente è in `app/Actions/Panel/ApplyCalendarToPanelAction.php.disabled` (firma diversa: `Panel &$panel`, senza `$calendarClass`; usava `FilamentFullCalendarPlugin`, fuso e lingua da `config('fullcalendar.localization.*')`).
  Chi la riattiva deve riscrivere questo contratto: ci sarebbe un plugin registrato, una configurazione letta e un confine di permessi da dichiarare.
- Il messaggio di log è una stringa fissa non tradotta (riga 31).
