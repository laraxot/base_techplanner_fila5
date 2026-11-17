<<<<<<< HEAD
=======
---
title: "markdown linking conventions 1"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "markdown linking conventions 1"
issues: []
discussions: []
---

>>>>>>> laraxot/dev
# Convenzioni per i Collegamenti nei File Markdown

## Regola Fondamentale

, **tutti i collegamenti nei file Markdown devono utilizzare percorsi relativi** e non percorsi assoluti.

## Esempi Corretti e Incorretti

### ❌ ERRATO: Percorsi Assoluti

```markdown
<<<<<<< HEAD
<<<<<<< HEAD
[Convenzioni di Naming per le Interfacce](Modules/Notify/docs/INTERFACE_NAMING_CONVENTION.md)
[Chiarimento sulla Struttura delle Interfacce](Modules/Notify/docs/INTERFACE_STRUCTURE_CLARIFICATION.md)
[Architettura dei Contratti](Modules/Notify/docs/CONTRACTS_ARCHITECTURE.md)
=======
[Convenzioni di Naming per le Interfacce](/var/www/html/saluteora/laravel/Modules/Notify/docs/INTERFACE_NAMING_CONVENTION.md)
[Chiarimento sulla Struttura delle Interfacce](/var/www/html/saluteora/laravel/Modules/Notify/docs/INTERFACE_STRUCTURE_CLARIFICATION.md)
[Architettura dei Contratti](/var/www/html/saluteora/laravel/Modules/Notify/docs/CONTRACTS_ARCHITECTURE.md)
>>>>>>> 6ed19256f (.)
=======
[Convenzioni di Naming per le Interfacce](Modules/Notify/docs/INTERFACE_NAMING_CONVENTION.md)
[Chiarimento sulla Struttura delle Interfacce](Modules/Notify/docs/INTERFACE_STRUCTURE_CLARIFICATION.md)
[Architettura dei Contratti](Modules/Notify/docs/CONTRACTS_ARCHITECTURE.md)
>>>>>>> laraxot/dev
```

### ✅ CORRETTO: Percorsi Relativi

```markdown
[Convenzioni di Naming per le Interfacce](./INTERFACE_NAMING_CONVENTION.md)
[Chiarimento sulla Struttura delle Interfacce](./INTERFACE_STRUCTURE_CLARIFICATION.md)
[Architettura dei Contratti](./CONTRACTS_ARCHITECTURE.md)
```

Per collegamenti a documenti in altre directory:

```markdown
[Regole Generali per le Chiavi di Traduzione](../../Lang/docs/TRANSLATION_KEYS_RULES.md)
[Best Practices per le Chiavi di Traduzione](../../Lang/docs/TRANSLATION_KEYS_BEST_PRACTICES.md)
```

## Motivazione

1. **Portabilità**: I percorsi relativi funzionano indipendentemente dalla posizione di installazione del progetto
2. **Compatibilità tra ambienti**: I percorsi assoluti potrebbero non funzionare in ambienti diversi
3. **Manutenibilità**: I percorsi relativi sono più facili da mantenere quando la struttura del progetto cambia
<<<<<<< HEAD
<<<<<<< HEAD
4. **Standard del progetto**: <nome progetto> segue lo standard di utilizzare percorsi relativi in tutti i documenti Markdown
=======
4. **Standard del progetto**: SaluteOra segue lo standard di utilizzare percorsi relativi in tutti i documenti Markdown
>>>>>>> 6ed19256f (.)
=======
4. **Standard del progetto**: <nome progetto> segue lo standard di utilizzare percorsi relativi in tutti i documenti Markdown
>>>>>>> laraxot/dev

## Regole per i Collegamenti Relativi

1. **File nella stessa directory**: Utilizzare `./nome-file.md`
2. **File in una sottodirectory**: Utilizzare `./sottodirectory/nome-file.md`
3. **File in una directory superiore**: Utilizzare `../nome-file.md`
4. **File in una directory parallela**: Utilizzare `../directory-parallela/nome-file.md`

## Verifica dei Collegamenti

Prima di committare un file Markdown, verificare sempre che tutti i collegamenti utilizzino percorsi relativi e non assoluti. È possibile utilizzare questo comando per trovare collegamenti assoluti nei file Markdown:

```bash
grep -r "\[.*\](/var" --include="*.md" /percorso/al/progetto
```

## Collegamenti Correlati

<<<<<<< HEAD
<<<<<<< HEAD
- [Convenzioni di Documentazione](../../../../docs/documentation-conventions.md)
- [Markdown Best Practices](../../../../docs/markdown-best-practices.md)
=======
- [Convenzioni di Documentazione](../../../docs/documentation-conventions.md)
- [Markdown Best Practices](../../../docs/markdown-best-practices.md)
>>>>>>> 6ed19256f (.)
=======
- [Convenzioni di Documentazione](../../../../docs/documentation-conventions.md)
- [Markdown Best Practices](../../../../docs/markdown-best-practices.md)
>>>>>>> laraxot/dev
