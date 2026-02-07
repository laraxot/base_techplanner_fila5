# Regola Organizzazione File Target - Main Files

## 📁 Regola Fondamentale

**Tutti i file HTML di riferimento del sito target devono essere salvati dentro:**
```
laravel/Themes/Two/Main_files/
```

## ❌ POSIZIONI ERRATE (MAI FARE)

```bash
# ERRATO - File nella root di laravel
laravel/target_about.html
laravel/target_home.html

# ERRATO - File nella root del progetto
target_about.html
target_home.html
```

## ✅ POSIZIONI CORRETTE

```bash
# CORRETTO - File dentro Main_files del tema
laravel/Themes/Two/Main_files/target-about.html
laravel/Themes/Two/Main_files/target-home.html
laravel/Themes/Two/Main_files/target-site-full.html
laravel/Themes/Two/Main_files/marco-sottana-site.html
```

## 📋 Struttura Consigliata Main_files

```
laravel/Themes/Two/Main_files/
├── target-home.html           # Homepage target
├── target-about.html          # Chi Siamo target
├── target-services.html       # Servizi target
├── target-blog.html           # Blog target
├── target-faq.html            # FAQ target
├── target-contacts.html       # Contatti target
├── target-site-full.html      # Sito completo target
├── target-header.html         # Header target
├── target-footer.html         # Footer target
└── images/                    # Immagini scaricate dal target
    ├── hero-bg.jpg
    ├── services/
    ├── testimonials/
    └── ...
```

## 🎯 Perché Questa Regola?

1. **Organizzazione Coerente**: Tutti i file di riferimento per il tema Two sono nello stesso posto
2. **Modularità**: Se crei un nuovo tema, i suoi file target sono separati
3. **Chiarezza**: Sapere dove cercare i file di riferimento del target
4. **Manutenzione**: Facile aggiornare o rimuovere i file quando non servono più
5. **Versioning**: I file target del tema Two non interferiscono con altri temi

## 🚨 Errori da Evitare

1. ❌ Salvare file nella root di `laravel/`
2. ❌ Salvare file nella root del progetto
3. ❅ Mescolare file target di diversi temi
4. ❅ Creare sottocartelle al di fuori di `Main_files/` senza motivo

## ✅ Best Practice

Quando scarichi file dal sito target:
1. Usa sempre `laravel/Themes/Two/Main_files/` come base
2. Nomi file: usa `target-{nome-pagina}.html` per chiarezza
3. Crea sottocartelle se hai molti file: `images/`, `screenshots/`, etc.
4. Se cambi tema, sposta i file nel nuovo tema

## 📚 Riferimenti

- Tema Two: `laravel/Themes/Two/`
- File target: `laravel/Themes/Two/Main_files/`
- Documentazione tema: `laravel/Themes/Two/docs/`

---
**Regola applicata**: 7 Febbraio 2026
**Agente**: iFlow CLI
**Obiettivo**: Mantenere organizzazione coerente per tutti i temi