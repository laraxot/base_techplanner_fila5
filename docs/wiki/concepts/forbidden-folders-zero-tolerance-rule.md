# forbidden folders zero tolerance rule

## Regola

Nel repository non devono esistere cartelle con questi pattern:

- `docs/archive`
- `_docs`
- `docs.old`
- `lang/lang`

La regola vale per root, moduli e temi.

## Motivazione

- riduce duplicazioni e drift documentale;
- evita strutture ambigue per traduzioni e documentazione;
- mantiene indicizzazione wiki e strumenti di ricerca coerenti.

## Azione operativa

Quando uno dei pattern viene trovato:

1. spostare/mergere i contenuti in percorsi canonici;
2. eliminare la cartella non conforme;
3. aggiornare wiki log + memoria operativa;
4. rieseguire scansione di conferma.

## Percorsi canonici

- documentazione viva: `docs/wiki` e `docs/raw`
- archivio wiki ammesso: solo `docs/wiki/_archive` o `*/docs/wiki/_archive`
- documentazione modulo/tema: `*/docs/`
- traduzioni modulo/tema: `*/lang/<locale>/`
- traduzioni host Laravel 12: `laravel/lang/<locale>/`

## Controllo

```bash
find . -type d \( -path '*/docs/archive' -o -name '_docs' -o -name 'docs.old' -o -path '*/lang/lang' \) -print
```

L'output deve essere vuoto.
