# Processo di Build del Tema in il progetto

<<<<<<< HEAD
<<<<<<< HEAD
Questo documento fornisce una panoramica del processo di build e pubblicazione del tema principale di il progetto. Per una documentazione più dettagliata, consultare il [documento completo nel modulo CMS](../../laravel/modules/cms/project_docs/theme-build-process.md).
=======
Questo documento fornisce una panoramica del processo di build e pubblicazione del tema principale di il progetto. Per una documentazione più dettagliata, consultare il [documento completo nel modulo CMS](../../laravel/Modules/Cms/project_docs/theme-build-process.md).
>>>>>>> 4b6b99016 (first commit)
=======
Questo documento fornisce una panoramica del processo di build e pubblicazione del tema principale di il progetto. Per una documentazione più dettagliata, consultare il [documento completo nel modulo CMS](../../laravel/modules/cms/project_docs/theme-build-process.md).
>>>>>>> dev

## Comandi Principali

Il tema principale di il progetto ("One") richiede due step separati per compilare e pubblicare le modifiche:

1. **Build degli asset** - Compila i file sorgente in file ottimizzati:

```bash
cd /var/www/html/<directory progetto>/laravel/Themes/One
npm run build
```

2. **Pubblicazione degli asset** - Copia i file compilati nella directory pubblica:

```bash
npm run copy
```

È fondamentale eseguire entrambi i comandi per vedere le modifiche nel frontend dell'applicazione.

## Struttura e Processo

Il tema utilizza:
- **Vite** come bundler
- **Tailwind CSS** per lo styling
- **AlpineJS** per l'interattività

Il processo di build genera asset ottimizzati in `resources/dist` e il comando `copy` li sposta in `public_html/themes/One`.

## Integrazione con il Modulo CMS

Il tema è strettamente integrato con il modulo CMS di il progetto, che fornisce:
- Gestione dei contenuti
- Configurazione dei template
- Definizione dei blocchi di contenuto

<<<<<<< HEAD
<<<<<<< HEAD
Per ulteriori dettagli su come funziona l'integrazione, consultare la [documentazione del modulo CMS](../../laravel/modules/cms/project_docs/theme-cms-integration.md).
=======
Per ulteriori dettagli su come funziona l'integrazione, consultare la [documentazione del modulo CMS](../../laravel/Modules/Cms/project_docs/theme-cms-integration.md).
>>>>>>> 4b6b99016 (first commit)
=======
Per ulteriori dettagli su come funziona l'integrazione, consultare la [documentazione del modulo CMS](../../laravel/modules/cms/project_docs/theme-cms-integration.md).
>>>>>>> dev

## Risorse Aggiuntive

- [Sviluppo Frontend in il progetto](./frontend-overview.md)
- [Personalizzazione del Tema](./theme-customization.md)
- [Struttura dei Componenti](./theme-components.md)
<<<<<<< HEAD
<<<<<<< HEAD
- [Integrazione con Filament](./filament-integration.md) 
=======
- [Integrazione con Filament](./filament-integration.md)
>>>>>>> 4b6b99016 (first commit)
=======
- [Integrazione con Filament](./filament-integration.md) 
>>>>>>> dev
