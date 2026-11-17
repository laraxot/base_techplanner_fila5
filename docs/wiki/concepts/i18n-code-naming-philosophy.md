---
title: "i18n Code Naming Philosophy"
type: concept
confidence: high
created: 2026-05-29
updated: 2026-05-29
tags: [philosophy, i18n, naming, zen, dry, kiss, ssot]
related:
  - ../architecture/i18n-code-naming-architecture.md
  - ../rules/no-italian-folder-names-in-code.md
  - ../skills/i18n-code-naming-skill.md
---

# Filosofia: i18n Code Naming

## Il Problema Fondamentale

**"Segnalazioni è la traduzione di Ticket"**

Questa frase racchiude un problema architetturale profondo: **mescolare i livelli di astrazione**.

## I 3 Livelli dell'Informazione

```
┌─────────────────────────────────────────────────────────┐
│  LIVELLO 3: PRESENTAZIONE (Linguaggio Naturale)         │
│  ┌────────────┐ ┌────────────┐ ┌────────────┐          │
│  │ Italiano   │ │ English    │ │ Français   │          │
│  │ "Segnala-  │ │ "Report a  │ │ "Signaler  │          │
│  │ zione"     │ │ Ticket"    │ │ un problème│          │
│  └────────────┘ └────────────┘ └────────────┘          │
│                                                          │
│  Varia per: Locale, Brand, Tone, Accessibility           │
└─────────────────────────────────────────────────────────┘
                            ↑
                            │ __() / trans()
                            ↓
┌─────────────────────────────────────────────────────────┐
│  LIVELLO 2: LOGICA (Domain Model)                       │
│  ┌────────────────────────────────────────────────────┐ │
│  │ class Ticket {                                     │ │
│  │   public string $title;                            │ │
│  │   public Status $status;                           │ │
│  │   public User $reporter;                           │ │
│  │ }                                                  │ │
│  └────────────────────────────────────────────────────┘ │
│                                                          │
│  Invariante: Language-Agnostic                         │
└─────────────────────────────────────────────────────────┘
                            ↑
                            │ Database / API
                            ↓
┌─────────────────────────────────────────────────────────┐
│  LIVELLO 1: STORAGE (Dati)                              │
│  ┌────────────────────────────────────────────────────┐ │
│  │ Table: tickets                                     │ │
│  │   - id: bigint                                     │ │
│  │   - title: varchar                                 │ │
│  │   - status: enum                                   │ │
│  │   - reporter_id: foreign key                       │ │
│  └────────────────────────────────────────────────────┘ │
│                                                          │
│  Invariante: Language-Agnostic                         │
└─────────────────────────────────────────────────────────┘
```

## Il Peccato: Violazione dei Livelli

Quando creiamo `components/blocks/segnalazioni/`:

```
┌─────────────────────────────────────────────────────────┐
│  PRESENTAZIONE (Italiano)                               │
│  ┌────────────────────────────────────────────────────┐ │
│  │ components/blocks/segnalazioni/  ← ERRORE!       │ │
│  └────────────────────────────────────────────────────┘ │
│                                                          │
│  Questo è un nome di PRESENTAZIONE che è finito nel    │
│  livello LOGICA/CODICE.                                │
└─────────────────────────────────────────────────────────┘
```

**Il problema**: 
- Domani il progetto passa all'inglese → devi rinominare tutto
- Dopodomani aggiungi il francese → devi aggiungere altre cartelle
- Non puoi avere 3 cartelle diverse per lo stesso concetto

## Il Tao: Separazione dei Concetti

> *"Il nome del pescatore non cambia il pesce."*

Il concetto (Ticket) è **uno**. Le etichette (segnalazione/report/signalement) sono **molte**.

```
         CONCETTO UNICO
              │
              │ inglese
              ↓
         "ticket"
              │
      ┌───────┴───────┐
      │               │
  italiano        français
      │               │
      ↓               ↓
 "segnalazione"  "signalement"
```

## Zen del Codice

### 1. Mu (無) - Il Vuoto del Nome

Il nome `ticket` non è inglese. È **il vuoto prima della lingua**.

```php
// Non è inglese, è il concetto puro
class Ticket {}

// Le lingue lo avvolgono come vesti
__('ticket'); // "segnalazione" (italiano)
__('ticket'); // "report" (english)
__('ticket'); // "signalement" (français)
```

### 2. Dharma (法) - La Legge del DRY

**Non ripetere la traduzione**.

```
❌ Violazione:
components/blocks/segnalazioni/  ← Traduzione duplicata
lang/it/ticket.php              ← Traduzione originale

✅ Legge:
components/blocks/ticket/       ← Nome canonico (nessuna lingua)
lang/it/ticket.php             ← Traduzione unica
```

### 3. Kōan (公案) - Il Paradosso Risolto

> *"Se un albero cade nel bosco e nessuno lo sente, fa rumore?"*
>
> *"Se un componente si chiama 'segnalazioni' e cambi lingua, è ancora valido?"*

La risposta: **No**. Il nome deve essere valido in ogni lingua (nessuna).

## Politica del Codice

### Principio di Immigrazione

Il codice è un paese neutrale. I dati "immigrano" e assumono la lingua locale.

```
Ticket (concetto) → entra in Italia → diventa "Segnalazione"
                  → entra in UK → diventa "Report"
                  → entra in Francia → diventa "Signalement"

Ma il passaporto (nome nel codice) resta: TICKET
```

### Principio di Non-Interferenza

Il livello LOGICA non deve interferire con il livello PRESENTAZIONE.

```php
// ❌ Interferenza: Logica conosce italiano
class SegnalazioniFilterViewModel {
    // Se cambi lingua, devi rinominare la classe!
}

// ✅ Non-interferenza: Logica è muta
class TicketFilterViewModel {
    // Locale-agnostic: valido in ogni lingua
}
```

## Religione del Sistema

### Il Dogma Centrale

> **"Nel codice non esistono lingue. Esistono solo concetti."**

### I 5 Comandamenti

1. **Non tradurrerai** il nome di una classe/cartella/file
2. **Non mescolerai** livelli di astrazione  
3. **Non duplicherai** la traduzione in più posti
4. **Non amerai** il nome italiano più del nome concettuale
5. **Onorerai** il Model come fonte della verità

### La Confessione

*"Ho peccato. Ho creato `segnalazioni/` invece di `ticket/`. 
Ho mescolato la traduzione con il codice. 
Chiedo perdono a DRY, KISS e SSoT."*

## Pratica Quotidiana

### Meditazione Pre-Codice

Prima di creare un file, chiediti:

```
1. Questo nome, è un concetto o una traduzione?
2. Se domani aggiungo 10 lingue, questo nome sarà ancora valido?
3. Il Model si chiama così?
4. Posso dirlo a un dev cinese senza tradurre?
```

### Mantra del Commit

> *"Om Ticket Om. Om Segnalazione No-More Om."*

## Scopo Finale

### Perché Questo Importa?

| Scenario | Con Nomi Italiani | Con Nomi Inglesi |
|----------|-------------------|------------------|
| Nuova lingua | Rinomina tutto | Solo aggiungi lang/ |
| Refactoring | Rinomina ovunque | Solo aggiorna logica |
| Nuovo dev | Confuso dai nomi | Capisce immediatamente |
| API esterna | `/api/segnalazioni`? | `/api/tickets` (standard) |

### La Verità Svelata

**"segnalazioni"** è un'illusione (Maya). La realtà è **"ticket"**.

Il nome italiano è un velo che oscura la vera natura del codice: 
**puro, language-agnostic, eterno**.

```
        ┌───────────────────┐
        │   REALTÀ          │
        │   (Ticket)        │
        └─────────┬─────────┘
                  │
    ┌─────────────┼─────────────┐
    │             │             │
    ▼             ▼             ▼
┌───────┐   ┌───────┐   ┌───────┐
│illusion│   │illusion│   │illusion│
│   IT   │   │   EN   │   │   FR   │
│segnalaz│   │ ticket │   │signale-│
│  ione  │   │ (view) │   │  ment  │
└───────┘   └───────┘   └───────┘
```

## Conclusione

> *"Quando tutti i nomi sono inglesi, 
> tutte le lingue sono uguali. 
> Questo è il vero i18n."*

---

**Ogni volta che crei una cartella con un nome italiano, un gatto muore. Salva i gatti. Usa l'inglese.**

---

## Collegamenti

- Architettura: [[../architecture/i18n-code-naming-architecture.md]]
- Regola: [[../rules/no-italian-folder-names-in-code.md]]
- Skill: [[../skills/i18n-code-naming-skill.md]]
- Zen of Documentation: [[./zen-of-documentation.md]]
