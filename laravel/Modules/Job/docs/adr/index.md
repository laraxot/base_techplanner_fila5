---
title: "Indice degli ADR — Job"
type: index
module: Job
status: active
updated: 2026-11-26
---

# Indice degli ADR — Job

| ADR | Stato | Perché | Conferma |
|---|---|---|---|
| [0001-artisan-commands-from-ui-exact-match-allowlist](0001-artisan-commands-from-ui-exact-match-allowlist.md) | accepted | Comandi Artisan dalla UI: solo super-admin, match esatto con i pulsanti, controllo ripetuto nel metodo Livewire. | Sì: `JobStatusAuthorizationTest.php`, `--group=JOB-ARTISAN-INV-1` |
| [0002-jobs-table-read-only-in-admin](0002-jobs-table-read-only-in-admin.md) | accepted | La tabella `jobs` nel pannello è in sola lettura: niente create/edit su `JobResource`. | No: il test esiste ma è stale (Stato attuale) |
| [0003-queue-worker-flags-from-tenant-settings](0003-queue-worker-flags-from-tenant-settings.md) | accepted | Flag del worker dalle impostazioni del tenant, solo interi nella riga di shell. | Sì: `JobConfigDataTest.php`, `--group=JOB-WORKER-CMD-INV-1`, `JOB-WORKER-CMD-INV-2` |

Formato e regole: [README](README.md).
