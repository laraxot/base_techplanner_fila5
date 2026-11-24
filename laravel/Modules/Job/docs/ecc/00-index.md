---
title: "ECC — indice operativo Job"
type: index
status: in-progress
updated: 2026-11-16
module: Job
<<<<<<< .merge_file_JIzeg2
<<<<<<< .merge_file_lNPgAC
<<<<<<< .merge_file_vSOvJZ
qmd: "ECC indice Job verification gates"
=======
qmd: "ECC indice Job stato controlli verification gates PHPStan Pest security"
>>>>>>> .merge_file_sLh7E9
=======
qmd: "ECC indice Job stato controlli verification gates PHPStan Pest security"
>>>>>>> .merge_file_W8RZfP
=======
qmd: "ECC indice Job stato controlli verification gates PHPStan Pest security"
>>>>>>> .merge_file_Pt4rga
---

# ECC — modulo Job

Collega le verifiche ECC al workflow PTVX (BMAD → lock → fix → PHPStan/Pest → docs).

| Controllo | Stato | Evidenza |
|---|---|---|
<<<<<<< .merge_file_JIzeg2
<<<<<<< .merge_file_lNPgAC
<<<<<<< .merge_file_vSOvJZ
=======
<<<<<<< .merge_file_FKPk0I
>>>>>>> .merge_file_W8RZfP
=======
<<<<<<< .merge_file_FKPk0I
>>>>>>> .merge_file_Pt4rga
| Inventario statico | verificato | ../bmad/audits/job-audit.md |
| PHPStan | 0 su tree Modules (2026-11-16) | comando in audit |
| Pest | pending | ambiente testing |
| Security review | pending | story figlie P0/P1 |
| Docs pack | aggiornato | questo indice + audit ECC |
=======
<<<<<<< .merge_file_JIzeg2
<<<<<<< .merge_file_lNPgAC
=======
>>>>>>> .merge_file_Ze8PrT
>>>>>>> .merge_file_W8RZfP
=======
>>>>>>> .merge_file_Ze8PrT
>>>>>>> .merge_file_Pt4rga
| Inventario statico | verificato (2026-11-16) | [audit profondo](../bmad/audits/job-audit.md) |
| PHPStan `Modules/Job` | **0 errori**; 0 anche sul tree `Modules` (2026-11-16) | comando in audit |
| Pest | parziale: 17 pass (`JobStatusAuthorizationTest`), suite completa non eseguita | [audit § Gate](../bmad/audits/job-audit.md#gate) |
| Security review | **aperta** — 2 P0, 2 P1 alla baseline; P0-1 (policy create) chiuso da E1 ([story](../bmad/stories/e1-job-policy-create-deny.story.md), in review) | [finding](../bmad/audits/job-audit.md#finding) |
| Docs pack | aggiornato (gap-fill) | [audit](../bmad/audit.md), [epics](../bmad/epics.md), [architecture](../bmad/architecture.md) |
<<<<<<< .merge_file_JIzeg2
<<<<<<< .merge_file_lNPgAC
>>>>>>> .merge_file_sLh7E9
=======
>>>>>>> .merge_file_W8RZfP
=======
>>>>>>> .merge_file_Pt4rga

Dettaglio: [job-ecc-audit.md](./job-ecc-audit.md)
