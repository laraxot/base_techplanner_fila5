# 📚 **Indice Documentazione Modulo Cms**

**Last Update**: 31 Gennaio 2026
**Status**: ✅ PHPStan Level 10 Compliant
**Module Version**: 2.3.0

## 🎯 **Lettura Essenziale**
1. [README.md](./README.md) - Panoramica completa, Quick Start e Architettura.
2. [roadmap.md](./roadmap.md) - Stato avanzamento e obiettivi 2026.
3. [philosophy.md](./philosophy.md) - Visione "Zen" della gestione contenuti modulare.

## 🏗️ **Architettura e Blocchi**
- 🧱 **[Content Blocks System](./blocks/)** - Guida al sistema di blocchi trascinabili.
- 🔄 **[Block Data Flow](./block-data-flow.md)** - Come i dati fluiscono dal JSON ai Blade del tema.
- 🧬 **[XotData Pattern](./architecture-xotdata-pattern.md)** - Gestione dei dati tipizzati nel CMS.
- 🧩 **[Page Rendering](./livewire/page-show.md)** - Ciclo di vita del rendering delle pagine Volt.
- 📜 **[Folio Dynamic Pages Philosophy](../../Themes/Two/docs/folio-dynamic-pages-philosophy.md)** - Filosofia, Religione, Politica e Zen del routing Folio per pagine dinamiche. CRITICO: leggere prima di creare qualsiasi pagina!

## 🎨 **Frontend & Theming**
- 💅 **[Theming System](./themes/)** - Creazione e personalizzazione dei temi.
- 🌐 **[SEO & Metatags](./metatag-population-strategy.md)** - Strategie per l'ottimizzazione sui motori di ricerca.
- ⚡ **[Volt Components](./components/)** - Libreria di componenti interattivi pronti all'uso.

## 🧪 **Qualità e Sviluppo**
- ✅ **[PHPStan Compliance](./phpstan-level-10-compliance.md)** - Traguardi di analisi statica.
- 🔬 **[Testing Guidelines](./tests/architecture-separation-rules.md)** - Come scrivere test per il CMS.
- 🧹 **[PHPMD & Complexity](./cyclomatic-complexity-report.md)** - Report sulla pulizia del codice.

## 🔗 **Moduli Correlati**
- [UI](../../UI/docs/README.md) - Componenti grafici base.
- [Media](../../Media/docs/README.md) - Gestione file e immagini cloud.
- [Xot](../../Xot/docs/README.md) - Core framework.

## 📁 **Regole Organizzazione File Target**

**CRITICAL**: Tutti i file HTML di riferimento del sito target devono essere salvati dentro:
```
laravel/Themes/{ThemeName}/Main_files/
```

**MAI** nella root di `laravel/` o del progetto!

Vedi: [Main Files Organization Rule](../../Themes/Two/docs/main-files-organization-rule.md)

## 🚨 **Risoluzione Errori Critici**

### Errore: SerializableClosure in isset or empty

**Causa**: Cache bootstrap corrotte dopo modifiche al codice.

**Soluzione**:
```bash
cd /var/www/_bases/base_techplanner_fila5/laravel && \
rm -rf bootstrap/cache/* && \
php artisan cache:clear && \
php artisan config:clear && \
php artisan route:clear && \
php artisan view:clear && \
php artisan optimize
```

Vedi: [SerializableClosure Error Fix](../../Themes/Two/docs/serializable-closure-error-fix.md)

**Quando usare**: Dopo modifiche al codice, aggiornamenti, o errori di routing Folio

### Errore: htmlspecialchars() Argument Type Mismatch

**Causa**: Il footer v1.blade.php passava array a `{{ }}` che chiama `htmlspecialchars()`.

**Soluzione**: Rimuovere controllo `is_array()` e trattare sempre items come array con chiavi 'label' e 'description'.

Vedi: [Footer Error Resolution](./footer-error-resolution-2026-02-08.md)

**Quando usare**: Quando si ottiene errore `htmlspecialchars(): Argument #1 ($string) must be of type string, array given` nel footer

### Workflow Improvements - 2026-02-08

**Nuovo**: Sistema migliorato per prevenire errori frontend e migliorare qualità codice.

**Caratteristiche**:
- Validazione automatica componenti
- Standardizzazione strutture dati
- Validazione contrasto WCAG
- Workflow Git automatizzato

Vedi: [Workflow Improvements 2026-02-08](./2026-02-08-workflow-improvements.md)

**Quando usare**: Come riferimento per miglioramenti processo sviluppo e prevenzione errori

### Errore: Unable to locate a class or view for component [theme::...]

**Causa**: Tentativo di chiamare direttamente un componente del tema bypassando il sistema CMS. I componenti del tema sono auto-registrati e gestiti dal componente `Section`.

**Soluzione corretta**: 
Usare sempre il componente Section del modulo CMS:
```blade
<x-section slug="footer" />
```
**MAI** usare `<x-two::... />` o simili per componenti gestiti via JSON.

---
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*
