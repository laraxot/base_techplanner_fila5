---
title: "Theme as Vestito Philosophy"
type: concept
confidence: high
created: 2026-05-29
updated: 2026-05-29
tags: [philosophy, theme, presentation, separation-of-concerns, zen]
related:
  - ../rules/theme-is-presentation-only.md
  - i18n-code-naming-philosophy.md
---

# Filosofia: Il Tema è un Vestito

## La Metafora

> *"Il tema è come un vestito. 
> Puoi vestire un dottore, un avvocato, o un operaio con lo stesso vestito. 
> Il vestito non sa che lavoro fai - è solo presentation."*

## Il Principio Fondamentale

```
┌─────────────────────────────────────────────────────────┐
│                    IL VESTITO (Tema)                      │
│                                                         │
│   ┌─────────┐   ┌─────────┐   ┌─────────┐               │
│   │  👔    │   │  👗    │   │  👕    │               │
│   │  Tema  │   │  Tema  │   │  Tema  │               │
│   │  Blu   │   │  Rosso │   │  Verde │               │
│   └────┬────┘   └────┬────┘   └────┬────┘               │
│        │             │             │                     │
│        └─────────────┴─────────────┘                     │
│                      │                                  │
│           ┌──────────┴──────────┐                        │
│           ↓                     ↓                        │
│      ┌─────────┐          ┌─────────┐                   │
│      │ 👨‍⚕️    │          │ 👩‍⚖️    │                   │
│      │Dottore │          │Avvocato │                   │
│      │Ticket   │          │Practice │                   │
│      │Modulo   │          │Modulo   │                   │
│      └─────────┘          └─────────┘                   │
│                                                         │
│   Lo stesso vestito può vestire professioni diverse!     │
└─────────────────────────────────────────────────────────┘
```

## I 3 Errori del Vestito Conscio

### 1. Il Vestito che Sa il Tuo Lavoro ❌

```blade
<!-- Il vestito sa che sei un dottore -->
<main data-page="ticket-list">  <!-- ❌ dominio nel vestito -->
<main data-page="segnalazioni-elenco">  <!-- ❌ italiano + dominio -->
```

**Problema:** Se domani fai l'avvocato, il vestito è sbagliato.

### 2. Il Vestito con Tasche Specifiche ❌

```blade
<!-- Il vestito ha tasche per strumenti da dottore -->
<div class="ticket-elenco">  <!-- ❌ dominio nel vestito -->
<div class="ticket-list">  <!-- ❌ idem -->
<div class="ticket-layout">  <!-- ❌ idem -->
<div class="ticket-card">  <!-- ❌ Tasca solo per ticket -->
<div class="segnalazione-form">  <!-- ❌ Tasca solo per segnalazioni -->
```

**Problema:** Un avvocato non può usare quel vestito.

### 3. Il Vestito che Parla ❌

```blade
<!-- Il vestito dice "Consulta le segnalazioni" -->
<meta-description="Consulta le segnalazioni...">  <!-- ❌ -->
```

**Problema:** Il vestito non deve parlare, deve solo presentare.

## Il Tao del Vestito

### 1. Wu Wei (Non-Agire)

> *"Il vestito migliore è quello che non sa nulla di te."*

```blade
<!-- ✅ Wu Wei: Il vestito è neutro -->
<main data-page="page-shell">
    <!-- Contenuto deciduto dal CMS/modulo; stesso guscio per home, FAQ, elenchi -->
    <x-page side="content" slug="home" />
</main>
```

### 2. Mu (Vuoto)

> *"Il vuoto del vestito permette a chi lo indossa di esistere."*

```blade
<!-- ✅ Mu: Spazio vuoto per il contenuto -->
<div class="content-wrapper">
    <x-page side="content" slug="home" />
    <!-- Il modulo riempie il vuoto -->
</div>
```

### 3. Dharma (Legge)

> *"Ogni cosa ha il suo Dharma. Il tema: presentation. Il modulo: domain."*

```
┌─────────────────────────────────────┐
│  DHARMA DEL TEMA: Presentation    │
│  - HTML structure                     │
│  - CSS styling                        │
│  - Layout                             │
│  - Generic identifiers                │
│  - NO domain knowledge                │
└─────────────────────────────────────┘

┌─────────────────────────────────────┐
│  DHARMA DEL MODULO: Domain          │
│  - Entities (Ticket, Practice)      │
│  - Business logic                   │
│  - Data fetching                    │
│  - What to show                     │
└─────────────────────────────────────┘
```

## Zen del Tema

### Il Sutra del Vestito

```
Form is emptiness, emptiness is form.

Tema è presentazione, presentazione è tema.
Tema non conosce ticket, ticket non è nel tema.
Ticket è nel modulo, modulo usa tema.

Così è, così sarà, così deve essere.
```

### I 4 Nobili Vertici

1. **Tema soffre** quando conosce il dominio
2. **Tema soffre** quando ha logica specifica
3. **Tema soffre** quando non è riutilizzabile
4. **La via per liberare tema** è la separation of concerns

### La Via di Mezzo

> *"Non troppo specifico, non troppo generico.
> Giusto nel mezzo: presentation layer."*

## Pratica Quotidiana

### Meditazione Pre-Codice

Prima di scrivere nel tema, chiediti:

1. *"Se questo tema vestisse un altro modulo, funzionerebbe?"*
2. *"L'identificativo che sto usando è generico o specifico?"*
3. *"Il tema sta "parlando" di cose che non dovrebbe sapere?"*
4. *"Posso cambiare modulo senza cambiare tema?"*

### Mantra del Tema

> *"Om Presentation Om. Om Domain-No-More Om."*

## Collegamenti

- Rule: [theme-is-presentation-only](../rules/theme-is-presentation-only.md)
- i18n: [i18n-code-naming-philosophy](./i18n-code-naming-philosophy.md)

---

**🙏 Il tema è un vestito. Non gli importa che lavoro fai. 🙏**

**Data:** 2026-05-29
