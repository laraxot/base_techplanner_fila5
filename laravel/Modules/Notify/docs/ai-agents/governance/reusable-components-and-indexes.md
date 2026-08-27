# Reusable Components And Indexes

<<<<<<< .merge_file_Ajg6M2
> Indice: [./00-INDEX.md](./00-INDEX.md)
=======
<<<<<<< .merge_file_ZruegN
> Indice: [./00-INDEX.md](./00-INDEX.md)
=======
>>>>>>> .merge_file_aG4XBY
> Indice: [./00-index.md](./00-index.md)
>>>>>>> .merge_file_fdWh6G
> Policy correlata: [../policies/filament-widget-tables-policy.md](../policies/filament-widget-tables-policy.md)

## Visione

Ogni fix o nuova feature deve preferire componenti riusabili, documentazione canonica e indici bidirezionali. L'obiettivo non e solo ridurre righe di codice, ma ridurre le decisioni duplicate che fanno divergere agenti, moduli e temi.

## Regole pratiche

- prima estrarre il pattern riusabile, poi applicarlo alla pagina specifica
- ogni cartella documentale significativa deve avere `00-INDEX.md`
- ogni documento deve linkare il proprio `00-INDEX.md` con percorso relativo
<<<<<<< .merge_file_Ajg6M2
- modulo e tema aggiornano i rispettivi `docs/00-INDEX.md` quando si tocca il loro perimetro
=======
<<<<<<< .merge_file_ZruegN
- modulo e tema aggiornano i rispettivi `docs/00-INDEX.md` quando si tocca il loro perimetro
=======
>>>>>>> .merge_file_aG4XBY
- modulo e tema aggiornano i rispettivi `docs/00-index.md` quando si tocca il loro perimetro
>>>>>>> .merge_file_fdWh6G
- `AGENTS.md`, `CLAUDE.md`, `QWEN.md` devono puntare a documenti canonici, non duplicarne il contenuto

## Anti pattern

- file quasi identici in rules, guidelines e docs
- skill che ripetono policy gia descritte in forma canonica
- pagine specifiche che reimplementano componenti o query gia esistenti
- indici mancanti o con link unidirezionali

## Metodo

- BMAD per chiarire il pattern e la decisione
- GSD per distribuire discovery, implementazione, verifica e handoff tra agenti
