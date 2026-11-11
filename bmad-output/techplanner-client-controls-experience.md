---
title: TechPlanner client list experience contract
type: bmad-ux
owner: TechPlanner
updated: 2026-11-06
---

# Experience contract

## Primary journey

1. Technician opens Clients.
2. The table shows company, compact distance, address, contacts and latest
   control dates.
3. Technician chooses a coordinate origin or selects “Usa come punto di
   partenza” on a client/map popup.
4. Technician filters for missing or present control categories.
5. Technician opens the client or launches navigation.

## States

- **No origin:** distance is `—`; the coordinate widget explains how to set one.
- **No coordinates:** the client remains in the table but has no map marker and
  offers the existing coordinate update action.
- **No control:** the relevant date is `—`; the negative filter finds it.
- **Controls table pending:** the client list still renders; control columns and
  control-dependent filters become useful after migration.
- **Map loading/error:** the table remains the primary accessible workflow.

## UX contract

Date columns are sortable and compact; the distance column is five rems wide and
never wraps. The map is supplementary, has keyboard-focusable links/actions in
each popup, and must not be the only way to reach a client. Empty states use
explicit language rather than zero values. Any future overdue highlighting must
use the persisted `next_control_date`, not infer legal deadlines from a generic
interval.
