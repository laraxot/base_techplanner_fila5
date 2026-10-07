# BMAD — Iniziativa: Migrazione const → enum per stati

## Stato
- Iniziata: 2026-10-06
- Motivo: `public const string STATUS_*` genera `classConstant.nativeTypeNotSupported` su PHP 8.4; enum (PHP 8.1+) risolve.
- Scopo: sostituire const con enum string-backed nei moduli Employee, AI, Notify; mantenere compatibilità DB (`status` string).
- Documenti collegati: `docs/bmad/incidenti/2026-10-06-multiple-records.json-restore.md`
- Second brain: `MEMORY.md` aggiornato.
- Principio ponytail: riusare `EnumTrait` esistente (`Modules/Xot`), non reinventare.

## Decisone chiave
Uso `enum X: string` con `EnumTrait` (già esistente in `NotificationLogStatusEnum`). Non tocco `vendor/`. Non rompo la funzionalità (DB resta `string`).
