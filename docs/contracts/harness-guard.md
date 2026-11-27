---
title: "Contratto del guard harness"
type: contract
action: ".harness/bin/guard"
status: accepted
created: 2026-11-27
updated: 2026-11-27
---

# Contratto del guard harness

## Input

JSON su stdin con `tool_name` e `tool_input`. Il guard legge `command`, `file_path`,
`content`, `new_string` ed eventuali `edits`; il percorso è relativo o assoluto come
fornito dal chiamante.

## Output

Exit `0` per consentire l'azione. Exit `2` per bloccarla, con una spiegazione su stderr
e, quando possibile, una riga JSON in `.harness/runs/trace.jsonl`.

## Invarianti

- `.env` e varianti non di test non vengono lette o scritte.
- Le migrazioni non usano operazioni distruttive.
- Non si azzera il database e non si usa `RefreshDatabase`.
- Non si riscrive la storia Git né si cancellano modifiche altrui.
- Il comportamento del payload illeggibile resta compatibile: il guard lascia passare.

## Effetti collaterali

Una violazione può appendere un evento `guard.block` al trace configurato da
`HARNESS_RUNS_DIR`, se la directory è disponibile.

## Errori

Il guard non lancia un bootstrap Laravel. Un payload JSON non valido viene ignorato con
exit `0`; una regola attiva termina con exit `2`.

## Non fa

- Non carica `.harness/config.php`.
- Non carica `.harness/rules/*`.
- Non implementa il payload tipizzato, i Task Contract o i checkpoint del workshop.
- Non sostituisce i test o la revisione umana.
