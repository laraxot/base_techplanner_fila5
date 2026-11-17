# Document Root Architecture: public_html

In questo progetto, la `document_root` del server web è configurata per puntare a `public_html` invece della cartella standard di Laravel `laravel/public`.

## Struttura delle Directory

```
/var/www/_bases/base_fixcity_fila5/
├── laravel/            # Sorgente dell'applicazione (non accessibile via web)
│   ├── app/
│   ├── config/
│   ├── ...
│   └── public/        # Cartella public "ombra" (non usata come root)
└── public_html/        # Document Root effettiva (accessibile via web)
    ├── assets/
    ├── data/          # GeoJSON e altri dati statici
    ├── index.php      # Entry point configurato per puntare a ../laravel
    └── ...
```

## Vantaggi di questa Configurazione

1. **Sicurezza (Isolation)**: Il codice sorgente dell'applicazione, le configurazioni (`.env`) e i file di vendor sono situati al di fuori della web root. Anche in caso di misconfigurazione del server web (es. mancata esecuzione del PHP), i file sensibili non sono scaricabili.
2. **Standard Hosting**: Molti provider di hosting condiviso o pannelli di controllo (cPanel, DirectAdmin) forzano l'uso di `public_html` come entry point. Questa struttura garantisce la massima compatibilità senza dover rinominare la cartella `public` di Laravel nel repository, mantenendo la pulizia del framework.
3. **Gestione Asset**: Gli asset compilati da Vite o Mix vengono copiati o generati direttamente in `public_html`, garantendo che i link `/assets/...` funzionino correttamente senza mapping complessi.

## Implicazioni per lo Sviluppo

- **Dati Statici**: I file caricati via JS (es. `tickets.json`) devono risiedere in `public_html/data/`.
- **Comandi Artisan**: I comandi che generano link simbolici (`php artisan storage:link`) devono essere configurati per puntare a `public_html/storage`.
- **Riferimenti nei Workflow**: Quando si creano nuovi asset pubblici, usare sempre `public_html` come destinazione.

## Note Tecniche
L'`index.php` in `public_html` è stato modificato per caricare l'autoloader e l'istanza dell'app da `../laravel/vendor/autoload.php` e `../laravel/bootstrap/app.php`.
