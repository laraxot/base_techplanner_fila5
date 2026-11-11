---
title: "Controllo e correzione periodica degli errori di produzione"
type: story
status: in-progress
created: 2026-11-06
tags: [monitoring, cron, codex, production]
---

# Controllo errori ogni cinque minuti

## Richiesta

Controllare i log di sottana.com ogni cinque minuti e correggere gli errori applicativi individuati, anche dopo la fine della conversazione.

## Perimetro e coordinamento

- Un solo worker alla volta tramite `flock`; questa story e' il riferimento canonico per setup e worker successivi.
- Leggere gli incrementi dei log Laravel, browser e Nginx dei domini sottana.com e sottana.net.
- Avviare Codex soltanto in presenza di nuovi errori, con sandbox workspace-write e approvazioni non interattive.
- Rispettare i lock e le modifiche degli altri agenti; mai commit, push, reset, migrazioni o modifiche ai dati di produzione.
- Conservare i log originali; registrare controlli, correzioni e blocchi nello stato locale privato del monitor.

## GitHub (tracciamento)

Issue da collegare dopo la creazione dell'artefatto.

## Criteri di accettazione

- [ ] Scanner incrementale verificato con test isolati, inclusa rotazione/troncamento.
- [ ] Codex non interattivo autenticato e comando shell verificati.
- [ ] Primo ciclo reale eseguito e risultato ispezionato.
- [ ] Cron ogni cinque minuti installato senza alterare altri job.
- [ ] Report e procedura di disattivazione documentati.
