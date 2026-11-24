---
title: "email template landscape"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-11-23
qmd: "email template landscape"
issues: []
discussions: []
---

# Panoramica e Analisi dei Template Email in Laravel

Questo documento raggruppa e analizza le principali risorse, pacchetti e tutorial per la gestione dei template email in Laravel, con vantaggi e svantaggi di ciascuna soluzione.

## 1. Pacchetti GitHub Principali
### 1.1 laravel-email-templates (simplepleb)
### 1.2 spatie/laravel-database-mail-templates
### 1.3 mlanin/laravel-email-templates-optimization
### 1.4 Qoraiche/laravel-mail-editor
### 1.5 filamentphp Visual Builder Email Templates
## 2. Framework e Template Engine

- **Blade + Mailable** (core Laravel): leggero, nativo, ottimo per layout semplici
- **Markdown Mailables** (`->markdown()`): responsive via Tailwind, rapido
- **MJML** (https://mjml.io/): email responsive, dipende da Node.js, build step
- **Mailgun Templates**: template hostati su Mailgun, analytics avanzate, vendor lock-in

### Vantaggi vs Svantaggi Generali
| Soluzione               | Pro                                     | Contro                                          |
|-------------------------|-----------------------------------------|-------------------------------------------------|
| Blade (local files)     | Nativo, semplice                        | No UI, editing manuale                         |
| DB Templates (Spatie)   | Multilingua, CRUD via UI                | Overhead DB, migrazioni                        |
| Visual Editor (Qoraiche)| UX migliore, anteprima                  | Dipendenze, complessità                        |
| MJML                    | Responsive garantito                   | Node.js, curva apprendimento                   |
| Mailgun                 | API + Analytics                        | Costo, lock-in                                 |

---
## 3. Tutorial & Articoli Selezionati

- StackOverflow: [Creare nuovo Mail Component/Template](https://stackoverflow.com/questions/63791532/how-to-create-new-laravel-mail-componenttemplate-and-use-it-in-email-blade-fil)
- Medium: [Customizing Mail in Laravel](https://medium.com/@timothy.withers/customizing-mail-and-notification-templates-in-laravel-4f8c37ce51a)
- LaravelDaily: [Mail Notifications & Templates](https://laraveldaily.com/post/mail-notifications-customize-templates)
- Laracasts: [Responsive Email Templates Tips](https://laracasts.com/discuss/channels/tips/responsive-email-templates)
- CleanCommit: [Sending Emails in Laravel](https://cleancommit.io/blog/sending-emails-in-laravel-mailable-classes-templates-laravel-versions/)
- Dev.to: [How to send emails easily](https://dev.to/iankumu/laravel-mail-how-to-send-emails-easily-in-laravel-35jc)
- Mailtrap Blog: [Laravel Send HTML Email](https://mailtrap.io/blog/laravel-send-html-email/)
- Ractoon: [Preview Laravel Email Templates Locally](https://www.ractoon.com/articles/preview-laravel-email-templates-locally)

---
## 4. Strumenti & Servizi Esterni

- **Stripo**, **Beefree**, **Unlayer**: editor drag-and-drop per template HTML
- **Mailersend**, **Mailjet**: servizi SMTP con template manager
- **Mailtrap**: sandbox per test email
- **LaravelMail.com**, **Mailcarrier**: build-in package per mail performance

---
## 5. Raccomandazioni per il Modulo Notify

1. **Sistema Ibrido**: spostare template comuni in risorse file + DB per versioning
2. **UI Filament**: usare Spatie DB Templates + Filament Resource per CRUD
3. **Performance**: caching dei template (Redis) + ottimizzazione asset
4. **Testing & Preview**: PreviewController per anteprima in browser, test automatici
5. **Standard**: Blade Components, traduzioni `notify::emails.*`, PSR-12, PHP 8.2

---

**Prossimi Passi**:
- Valutare pacchetti Spatie vs Simplepleb in staging
- Configurare MJML o Markdown se richiesto
- Creare interfaccia Filament per CRUD + Preview
- Integrare pipeline CI/CD per lint e test email

---
*Documento generato il [DATE]T21:41:18+02:00*
