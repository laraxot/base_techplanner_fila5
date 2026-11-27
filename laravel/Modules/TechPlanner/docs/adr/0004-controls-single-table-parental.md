---
title: "ADR — I controlli periodici sono una tabella sola con figli Parental per tipo"
type: decision
status: accepted
created: 2026-11-24
updated: 2026-11-24
related:
  - ../../app/Models/Control.php
  - ../../app/Enums/ControlTypeEnum.php
  - ../stories/unified-controls-parental.story.md
  - ../stories/controls-expiry-workflow.story.md
---

# ADR: i controlli periodici sono una tabella sola con figli Parental per tipo

## Contesto

- Il servizio del cliente è fare controlli periodici negli studi: radiologici (RX), endorali, elettromedicali,
  autorizzazioni sanitarie, altro. Dalla data del prossimo controllo dipende quando tornare dal cliente.
- I tipi condividono quasi tutto (cliente, apparecchio, tecnico, data, esito, prossima scadenza, note) e differiscono in
  pochi campi futuri. L'ufficio vuole storico e scadenze cercabili insieme (story `unified-controls-parental`).
- Esiste già `DeviceVerification` (verifiche degli apparecchi, story `device-verifications-fix`) con dati reali.
- Domanda: una tabella per tipo o una per tutti?

## Driver della decisione

- Unicità del dato di pianificazione: scadenze, storico e widget lavorano su una sola tabella.
- Riuso dei campi: i tipi di controllo condividono quasi tutto e differiscono in pochi campi futuri.
- Tutela dei dati esistenti: `DeviceVerification` ha dati reali e non si fonde senza una migrazione provata.
- Estensibilità: un nuovo tipo di controllo deve essere una piccola aggiunta, non un CRUD nuovo.

## Decisione

- Una tabella `controls` (`database/migrations/2026_11_06_000000_create_controls_table.php`), modello
  `app/Models/Control.php` con `HasChildren`, discriminante `control_type` (cast a `ControlTypeEnum`), figli
  `RxControl`, `IntraoralControl`, `ElectromedicalControl`, `HealthAuthorizationControl`, `OtherControl` (`HasParent`).
- Un solo `ControlResource` Filament; `control_type` non si cambia in modifica.
- Cadenza: se `control_date` c'è e `next_control_date` no (e non è stata svuotata a mano), l'hook `saving` imposta
  `control_date + ControlTypeEnum::defaultRecurrenceMonths()` (12 mesi, `null` per `other`).
- `DeviceVerification` resta legacy finché non esiste una migrazione dei dati verificata.

## Alternative scartate

- Una tabella e un CRUD per tipo: codice duplicato, e "tutto ciò che scade a 30 giorni" diventa una UNION.
- Un solo modello senza figli, con `if ($type === ...)`: la logica per tipo finirebbe sparsa in form e tabelle.
- Fondere subito `DeviceVerification` in `controls`: rischio sui dati di produzione senza una migrazione provata.

## Conseguenze

- Pro: scadenze, widget `ExpiringControlsWidget` e promemoria quotidiano lavorano su una tabella.
- Contro: i campi specifici di un tipo vanno in `metadata` o in colonne nullable.
- Debito: due modelli per le verifiche (`Control` e `DeviceVerification`) finché non si migra.
- Un nuovo tipo = un caso di `ControlTypeEnum` + un figlio in `$childTypes`: il test lo pretende.

## Verifica

`Modules/TechPlanner/tests/Unit/Models/ControlTest.php`: ogni caso dell'enum ha un figlio, il discriminante idrata il
figlio giusto, padre e figli usano `controls` (verdi).
