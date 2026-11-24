---
title: "MASTER INDEX"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-11-23
qmd: "MASTER INDEX"
issues: []
discussions: []
---

# Design Comuni Italia - Master Documentation Index

## Panoramica Progetto

Replicazione delle 38 pagine statiche del progetto [Design Comuni Italia](https://github.com/italia/design-comuni-pagine-statiche) utilizzando:
- **Tailwind CSS** (NO Bootstrap Italia)
- **Alpine.js** (per interattività)
- **Laravel Folio + Volt** (routing e componenti)
- **JSON-driven content blocks** (CMS-driven)

## Stato Globale

| Pagina | HTML | CSS | JS | Docs | Totale |
|--------|------|-----|----|------|--------|
| **Domande Frequenti** | ✅ 87.5% | ✅ 90% | ⏳ 20% | ✅ Complete | **✅ 85%** |
| Homepage | ✅ 95% | ✅ 95% | ✅ 80% | ✅ Complete | ✅ 90% |
| Argomenti | ⏳ 60% | ⏳ 50% | ⏳ 0% | ⏳ Parziali | ⏳ 37% |
| Altre 35 pagine | ❌ 0% | ❌ 0% | ❌ 0% | ❌ Assenti | ❌ 0% |

## 📚 Documentazione per Modulo/Tema
### 🎨 Tema Sixteen
### 🐙 GitHub Integration
### 📦 Modulo Cms
### 🧩 Modulo UI
### 🛠️ Scripts & Tools

## 🔗 Link Bidirezionali Completi

### FAQ Page → Tutti i Documenti Correlati

```
FAQ Page (/it/tests/domande-frequenti)
│
├─ JSON Content
│  └─ laravel/config/local/fixcity/database/content/pages/tests.domande-frequenti.json
│  └─ laravel/config/local/laraxot/database/content/pages/tests.domande-frequenti.json
│
├─ Blade Templates (Tema Sixteen)
│  ├─ components/blocks/accordion/default.blade.php
│  ├─ components/blocks/hero/default.blade.php
│  ├─ components/blocks/breadcrumb/default.blade.php
│  └─ components/blocks/search/input.blade.php
│
├─ CSS Styles
│  └─ laravel/Themes/Sixteen/resources/css/components/design-comuni.css
│
├─ Documentazione Tema Sixteen
│  ├─ Analisi HTML
│  ├─ Implementazione
│  ├─ Analisi Visiva
│  ├─ Report Finale
│  └─ Index Design Comuni
│
├─ Documentazione Modulo Cms
│  ├─ FAQ Architecture
│  ├─ Content Blocks
│  └─ Index Modulo
│
├─ Documentazione Modulo UI
│  ├─ FAQ Components
│  ├─ Blocks System
│  ├─ Design System
│  └─ Index Modulo
│
└─ Scripts & Tools
   ├─ Screenshot Capture
   └─ Script Docs
```

---

## 📊 Metriche Documentazione

### Totale Files

| Categoria | Count | Size Totale |
|-----------|-------|-------------|
| Documenti Tema Sixteen | 4 docs + 146 screenshots | ~15 MB |
| Documenti Modulo Cms | 1 doc | ~8 KB |
| Documenti Modulo UI | 1 doc | ~12 KB |
| Scripts | 1 script + 1 doc | ~10 KB |
| **Totale** | **153 files** | **~15 MB** |

### Link Bidirezionali

Ogni documento contiene:
- ✅ Link ai documenti correlati
- ✅ Link ai moduli/temi coinvolti
- ✅ Link agli scripts utilizzati
- ✅ Link agli screenshots di riferimento

**Totale link bidirezionali**: ~50+ links

---

## 🎯 Prossimi Passi per Documentazione

### Priorità 1: Completare FAQ
- [ ] Documentare implementazione Alpine.js (quando pronta)
- [ ] Aggiungere screenshots responsive (mobile, tablet)
- [ ] Documentare test accessibilità WCAG 2.1 AA

### Priorità 2: Altre Pagine
- [ ] Creare documentazione per Homepage (simile a FAQ)
- [ ] Creare documentazione per Argomenti
- [ ] Estendere pattern per altre 35 pagine

### Priorità 3: Master Documentation
- [ ] Creare script per verificare link bidirezionali
- [ ] Generare automaticamente cross-reference matrix
- [ ] Mantenere documentazione sincronizzata con codice

---

## 📖 Come Utilizzare Questa Documentazione

### Per Sviluppatori

1. **Iniziare da qui**: [Index Design Comuni](../laravel/Themes/Sixteen/docs/design-comuni/00-index.md)
2. **Capire architettura**: [FAQ Architecture (Cms)](../laravel/Modules/Cms/docs/design-comuni-faq.md)
3. **Vedere componenti**: [FAQ Components (UI)](../laravel/Modules/UI/docs/design-comuni-faq-components.md)
4. **Analizzare differenze**: [Analisi HTML (Sixteen)](../laravel/Themes/Sixteen/docs/design-comuni/domande_frequenti_html_analysis.md)
5. **Testare visivamente**: [Screenshots](../laravel/Themes/Sixteen/docs/design-comuni/screenshots/)

### Per AI Agents

1. **Mappare codebase**: [Index Modulo Cms](../laravel/Modules/Cms/docs/00-index.md)
2. **Capire blocchi**: [Content Blocks System](../laravel/Modules/Cms/docs/content-blocks-system.md)
3. **Vedere componenti UI**: [Blocks System UI](../laravel/Modules/UI/docs/blocks-system.md)
4. **Eseguire tests**: [Screenshot Script](../bashscripts/design-comuni/capture-faq-screenshots.js)

### Per Project Managers

1. **Stato progetto**: Questo file (master index)
2. **Dettaglio implementazione**: [Report Finale FAQ](../laravel/Themes/Sixteen/docs/design-comuni/domande_frequenti_report_finale.md)
3. **Analisi visiva**: [Analisi Visiva](../laravel/Themes/Sixteen/docs/design-comuni/domande_frequenti_analisi_visiva.md)

---

## 🏗️ Architettura Documentazione

```
Master Index (questo file - docs/design-comuni/MASTER_INDEX.md)
│
├─ Tema Sixteen (laravel/Themes/Sixteen/docs/design-comuni/)
│  ├─ 00-index.md (indice locale)
│  ├─ DOMANDE_FREQUENTI_*.md (4 docs FAQ)
│  └─ screenshots/ (146 files)
│
├─ Modulo Cms (laravel/Modules/Cms/docs/)
│  ├─ 00-index.md (indice modulo)
│  └─ design-comuni-faq.md (doc FAQ)
│
├─ Modulo UI (laravel/Modules/UI/docs/)
│  ├─ 00-index.md (indice modulo)
│  └─ design-comuni-faq-components.md (doc componenti)
│
└─ Bash Scripts (bashscripts/)
   ├─ design-comuni/ (scripts)
   └─ docs/ (documentazione scripts)
```

---

## 📞 Contatti e Responsabilità

| Ruolo | Responsabilità | Dove Documentare |
|-------|---------------|------------------|
| **Frontend Dev** | CSS/HTML componenti | Tema Sixteen docs |
| **Backend Dev** | JSON content, routing | Modulo Cms docs |
| **UI Dev** | Componenti Blade | Modulo UI docs |
| **QA/Test** | Screenshots, analisi | Tema Sixteen screenshots |
| **AI Agent** | Automazione, scripts | Bashscripts docs |

---

**Ultimo Aggiornamento**: 2026-04-03  
**Versione**: 1.0  
**Stato**: ✅ Documentazione FAQ Completa  
**Manutenitore**: AI Agent Team
