# Ticket Naming Convention Rule

## Summary
> **Rule**: Il naming tecnico deve SEMPRE usare il termine inglese "ticket/tickets". "segnalazioni" è la traduzione italiana e va usata SOLO nel testo UI, mai nei nomi di file, directory, classi CSS, include view, o tipi JSON blocchi CMS.

## Scope
Questo vale per tutti i moduli Laraxot/Fixcity.

## Details

### Cosa NON va bene
- `blocks/segnalazioni/` come directory blocco
- `ticket-elenco` come classe CSS
- `pub_theme::components.blocks.segnalazioni.*` come include
- `type: "segnalazioni-layout"` nei JSON blocchi CMS
- Qualsiasi altra forma di "segnalazioni" nel codice

### Cosa va bene
- `blocks/ticket/` come directory
- `ticket-list` come classe CSS
- `pub_theme::components.blocks.ticket.*` come include
- `type: "ticket-list"` nei JSON blocchi CMS
- Traduzioni UI: ` __('fixcity::ticket.*` usa chiavi italiane)

## Examples

### ✅ Corretto
```php
@include('pub_theme::components.blocks.ticket.filters-sidebar')
```
```css
.ticket-list .fi-tabs { }
```
```json
{ "type": "ticket-list" }
```

### ❌ Errato
```php
@include('pub_theme::components.blocks.segnalazioni.filters-sidebar')
```
```css
.segnalazioni-elenco .fi-tabs { }
```
```json
{ "type": "segnalazioni-layout" }
```

## Related
- STORY-072: Implementazione della regola
- STORY-073: Business rationale
- [No Page-Specific Blocks](../rules/011-blocks-view-convention.md)

---

**Created**: 2026-05-29  
**Author**: Claude Code — modello claude-opus-4-8 (Opus 4.8)  
**Status**: ✅ Active