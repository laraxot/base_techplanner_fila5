---
title: "ADR — Asset GDPR pubblicati nella document root"
type: decision
status: accepted
module: Gdpr
created: 2026-11-23
updated: 2026-11-23
issues: []
---

# Asset GDPR pubblicati nella document root

## Contesto

Il front office include l’asset Filament `gdpr-styles`, ma la document root
del progetto è `public_html`, non `laravel/public`. Un asset registrato soltanto
nel registry Filament produce un link valido ma una risposta HTML 404 se gli
asset non sono stati pubblicati.

## Decisione

Il provider registra il CSS dal percorso sorgente del modulo e il ciclo di
deploy esegue `php artisan filament:upgrade` oppure `php artisan filament:assets`.
Il file deve risultare in `public_html/css/gdpr/gdpr-styles.css` e deve essere
servito con `Content-Type: text/css`.

## Alternative scartate

- Link diretto a `laravel/public`: non è la document root esposta.
- Copiare manualmente asset nel tema: duplica la responsabilità del modulo.
- Disabilitare il CSS: lascia il banner GDPR privo della sua presentazione.

## Conseguenze

- Il deploy deve pubblicare gli asset dopo ogni aggiornamento Filament o modulo.
- Il file pubblicato è generato e non va modificato a mano.
- Una risposta HTML al posto del CSS indica asset non pubblicati o document root
  non allineata e va verificata prima del browser.

## Conferma

```bash
cd laravel
php artisan filament:assets
curl -I http://localhost:8000/css/gdpr/gdpr-styles.css
```

La risposta attesa è `200` con `Content-Type: text/css`.
