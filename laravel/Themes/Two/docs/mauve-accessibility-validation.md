# MAUVE++ Accessibility Validation

## Cos'è MAUVE++

MAUVE++ è un validatore di accessibilità sviluppato dal CNR (ISTI - HIIS Lab) che verifica la conformità WCAG 2.1 dei siti web.

**Sito**: https://mauve.isti.cnr.it/

## Caratteristiche

- Validazione WCAG 2.1 (livelli A, AA, AAA)
- Supporto per pagine web e PDF
- Report dettagliati con suggerimenti di correzione
- Possibilità di creare progetti di audit

## Come Validare

### 1. Registrazione

1. Vai su https://mauve.isti.cnr.it/
2. Clicca "Register"
3. Compila il form con i tuoi dati

### 2. Validazione Singola Pagina

1. Dopo il login, vai su "Single page evaluation"
2. Inserisci l'URL della pagina da validare
3. Scegli le linee guida (WCAG 2.1)
4. Scegli il livello di conformità (A, AA, AAA)
5. Clicca "Validate"

### 3. Validazione Intero Sito

1. Crea un nuovo progetto
2. Inserisci l'URL del sito
3. Il crawler analizza automaticamente le pagine
4. Scarica il report in CSV

## Pagine da Validare (Sottana Service)

- Home: http://127.0.0.1:8002/it
- Contatti: http://127.0.0.1:8002/it/contatti
- Servizi: http://127.0.0.1:8002/it/servizi

## Regole di Accessibilità (WCAG 2.1)

### Priorità Alta (A)
- Alternative testuali per contenuti non testuali
- Contenuti informativi non presentati solo con colore
- Uso corretto del linguaggio HTML
- Navigazione da tastiera

### Priorità Media (AA)
- Contrasto minimo 4.5:1 per testo
- Ridimensionamento testo fino al 200%
- Navigazione consistente
- Nomi e ruoli chiari

## Note per Sviluppatori

- Usare attributi `alt` per tutte le immagini
- Garantire contrasto colori conforme
- Form labels per tutti gli input
- Heading strutturati correttamente (h1, h2, h3...)
- Links con testi descriptivi
