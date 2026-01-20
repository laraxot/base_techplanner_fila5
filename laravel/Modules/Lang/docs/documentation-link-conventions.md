# Convenzioni per i Link nella Documentazione

## Collegamenti correlati
- [Composer merge plugin](composer-merge-plugin.md)

## Regole Fondamentali per i Link Markdown

### 1. Utilizzare Sempre Percorsi Relativi

I collegamenti nei file di documentazione devono **sempre** utilizzare percorsi relativi, mai percorsi assoluti.

✅ **CORRETTO**:
```markdown
<<<<<<< HEAD
[Regole Generali](../../xot/project_docs/translations.md)
[Best Practices](../translation_keys_best_practices.md)
=======
[Regole Generali](../../Xot/project_docs/translations.md)
[Best Practices](../TRANSLATION_KEYS_BEST_PRACTICES.md)
>>>>>>> 4b6b99016 (first commit)
```

❌ **ERRATO**:
```markdown
<<<<<<< HEAD
[Regole Generali](modules/xot/project_docs/translations.md)
[Best Practices](modules/lang/project_docs/translation_keys_best_practices.md)
=======
[Regole Generali](Modules/Xot/project_docs/translations.md)
[Best Practices](Modules/Lang/project_docs/TRANSLATION_KEYS_BEST_PRACTICES.md)
>>>>>>> 4b6b99016 (first commit)
```

### 2. Navigazione Tra Cartelle

Per navigare nella struttura delle cartelle, utilizzare:
- `../` per salire di un livello
- `../../` per salire di due livelli
- E così via...

Esempi:
- Per collegare a un file nello stesso modulo: `[File](./altro_file.md)` o `[File](altro_file.md)`
<<<<<<< HEAD
- Per collegare a un file in un altro modulo: `[File](../../altromodulo/project_docs/file.md)`
=======
- Per collegare a un file in un altro modulo: `[File](../../AltroModulo/project_docs/file.md)`
>>>>>>> 4b6b99016 (first commit)

### 3. Struttura della Documentazione

Quando si creano collegamenti, considerare la struttura standard dei moduli :

```
laravel/
├── Modules/
│   ├── ModuloA/
│   │   ├── docs/
│   │   │   └── file.md
│   ├── ModuloB/
│   │   ├── docs/
│   │   │   └── file.md
├── docs/
│   └── file.md
```

### 4. Collegamenti Tra Moduli

Per collegare documenti tra moduli diversi:

```markdown
<!-- Da Modules/ModuloA/project_docs/file.md a Modules/ModuloB/project_docs/file.md -->
<<<<<<< HEAD
[Link a ModuloB](../../modulob/project_docs/file.md)
=======
[Link a ModuloB](../../ModuloB/project_docs/file.md)
>>>>>>> 4b6b99016 (first commit)

<!-- Da Modules/ModuloA/project_docs/file.md a docs/file.md nella root -->
[Link a docs root](../../../project_docs/file.md)
```

### 5. Verificare Sempre i Link

Prima di fare commit dei documenti:
1. Verificare che tutti i link siano relativi
2. Testare i link per assicurarsi che puntino al file corretto
3. Evitare link circolari o riferimenti a file inesistenti

## Esempi Pratici

### Da Modules/Lang/project_docs/ a Modules/Notify/project_docs/
```markdown
<<<<<<< HEAD
[Convenzioni Notify](../../notify/project_docs/translation_conventions.md)
=======
[Convenzioni Notify](../../Notify/project_docs/TRANSLATION_CONVENTIONS.md)
>>>>>>> 4b6b99016 (first commit)
```

### Da Modules/Lang/project_docs/ a docs/ nella root
```markdown
<<<<<<< HEAD
[Documentazione Principale](../../../project_docs/readme.md)
=======
[Documentazione Principale](../../../project_docs/README.md)
>>>>>>> 4b6b99016 (first commit)
```

### Da Modules/Lang/project_docs/ a un altro file nella stessa cartella
```markdown
<<<<<<< HEAD
[Best Practices](translation_keys_best_practices.md)
=======
[Best Practices](TRANSLATION_KEYS_BEST_PRACTICES.md)
>>>>>>> 4b6b99016 (first commit)
```

## Vantaggi dei Percorsi Relativi

1. **Portabilità**: La documentazione funziona in qualsiasi ambiente
2. **Manutenibilità**: Se la struttura cambia, sono necessarie meno modifiche
3. **Collaborazione**: Facilita il lavoro di più sviluppatori
4. **Coerenza**: Rispetta gli standard del progetto
# Convenzioni per i Link nella Documentazione

## Regole Fondamentali per i Link Markdown

### 1. Utilizzare Sempre Percorsi Relativi

I collegamenti nei file di documentazione devono **sempre** utilizzare percorsi relativi, mai percorsi assoluti.

✅ **CORRETTO**:
```markdown
<<<<<<< HEAD
[Regole Generali](../../xot/docs/translations.md)
[Best Practices](../translation_keys_best_practices.md)
=======
[Regole Generali](../../Xot/docs/translations.md)
[Best Practices](../TRANSLATION_KEYS_BEST_PRACTICES.md)
>>>>>>> 4b6b99016 (first commit)
```

❌ **ERRATO**:
```markdown
<<<<<<< HEAD
[Regole Generali](modules/xot/docs/translations.md)
[Best Practices](modules/lang/docs/translation_keys_best_practices.md)
=======
[Regole Generali](Modules/Xot/docs/translations.md)
[Best Practices](Modules/Lang/docs/TRANSLATION_KEYS_BEST_PRACTICES.md)
>>>>>>> 4b6b99016 (first commit)
```

### 2. Navigazione Tra Cartelle

Per navigare nella struttura delle cartelle, utilizzare:
- `../` per salire di un livello
- `../../` per salire di due livelli
- E così via...

Esempi:
- Per collegare a un file nello stesso modulo: `[File](./altro_file.md)` o `[File](altro_file.md)`
<<<<<<< HEAD
- Per collegare a un file in un altro modulo: `[File](../../altromodulo/docs/file.md)`
=======
- Per collegare a un file in un altro modulo: `[File](../../AltroModulo/docs/file.md)`
>>>>>>> 4b6b99016 (first commit)

### 3. Struttura della Documentazione

Quando si creano collegamenti, considerare la struttura standard dei moduli <nome progetto>:

```
laravel/
├── Modules/
│   ├── ModuloA/
│   │   ├── docs/
│   │   │   └── file.md
│   ├── ModuloB/
│   │   ├── docs/
│   │   │   └── file.md
├── docs/
│   └── file.md
```

### 4. Collegamenti Tra Moduli

Per collegare documenti tra moduli diversi:

```markdown
<!-- Da Modules/ModuloA/docs/file.md a Modules/ModuloB/docs/file.md -->
<<<<<<< HEAD
[Link a ModuloB](../../modulob/docs/file.md)
=======
[Link a ModuloB](../../ModuloB/docs/file.md)
>>>>>>> 4b6b99016 (first commit)

<!-- Da Modules/ModuloA/docs/file.md a docs/file.md nella root -->
[Link a docs root](../../../docs/file.md)
```

### 5. Verificare Sempre i Link

Prima di fare commit dei documenti:
1. Verificare che tutti i link siano relativi
2. Testare i link per assicurarsi che puntino al file corretto
3. Evitare link circolari o riferimenti a file inesistenti

## Esempi Pratici

### Da Modules/Lang/docs/ a Modules/Notify/docs/
```markdown
<<<<<<< HEAD
[Convenzioni Notify](../../notify/docs/translation_conventions.md)
=======
[Convenzioni Notify](../../Notify/docs/TRANSLATION_CONVENTIONS.md)
>>>>>>> 4b6b99016 (first commit)
```

### Da Modules/Lang/docs/ a docs/ nella root
```markdown
<<<<<<< HEAD
[Documentazione Principale](../../../docs/readme.md)
=======
[Documentazione Principale](../../../docs/README.md)
>>>>>>> 4b6b99016 (first commit)
```

### Da Modules/Lang/docs/ a un altro file nella stessa cartella
```markdown
<<<<<<< HEAD
[Best Practices](translation_keys_best_practices.md)
=======
[Best Practices](TRANSLATION_KEYS_BEST_PRACTICES.md)
>>>>>>> 4b6b99016 (first commit)
```

## Vantaggi dei Percorsi Relativi

1. **Portabilità**: La documentazione funziona in qualsiasi ambiente
2. **Manutenibilità**: Se la struttura cambia, sono necessarie meno modifiche
3. **Collaborazione**: Facilita il lavoro di più sviluppatori
4. **Coerenza**: Rispetta gli standard del progetto <nome progetto>
