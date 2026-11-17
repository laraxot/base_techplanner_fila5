# Runtime URL Verification Rule

## Regola

Quando l'utente indica una URL precisa da correggere, il task non e' finito finche' quella URL non viene verificata di nuovo dopo la modifica.

## Closure Criteria

- HTTP `200`
- nessun `Internal Server Error`
- nessun stack trace/fatal nel body
- nessun errore browser rilevante per il bug segnalato
- controllo DOM/visivo minimo dell'elemento interessato

## Bad Practice

- fermarsi a `php -l`
- fermarsi a `npm run build`
- fermarsi alla sola analisi statica

## False Friend

- "il file ora sembra giusto" non significa che la pagina reale stia caricando il componente corretto
