<<<<<<< HEAD
# Consigli e Best Practice - <nome progetto>ion Market
=======
# Consigli e Best Practice - Prediction Market
>>>>>>> 6ed19256f (.)

## Refactoring e Miglioramenti
- Separare sempre comandi (write) e query (read) secondo CQRS
- Usare aggregate per incapsulare la logica di dominio
- Gestire la validazione lato comando e lato evento
- Implementare proiezioni per query performanti
- Usare snapshot periodici per mercati molto attivi
- Integrare fallback su activitylog per audit trail

## Checklist di Implementazione
- [ ] Definire eventi e comandi principali
- [ ] Implementare aggregate Market, Bet, Outcome
- [ ] Gestire proiezioni e query
- [ ] Scrivere test per ogni evento/aggregate
- [ ] Documentare i flussi principali
- [ ] Prevedere rollback e replay

## Errori Comuni
- Non validare input lato comando
- Non gestire la concorrenza sugli aggregate
<<<<<<< HEAD
- Dimenticare il rollback in caso di errore
=======
- Dimenticare il rollback in caso di errore
>>>>>>> 6ed19256f (.)
