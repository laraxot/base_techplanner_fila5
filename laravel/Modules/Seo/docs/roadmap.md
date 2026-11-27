---
title: "Seo: stato e roadmap"
type: roadmap
status: active
module: Seo
tags: [seo, roadmap, schema-org, json-ld]
qmd: "seo roadmap stato implementato pianificato schema.org json-ld analytics fuori ambito obiettivi"
related:
  - ./architecture.md
  - ./configuration.md
---

# Stato e roadmap

Verificato sul codice del modulo. Solo cio' che e' elencato come "Fatto" esiste in `app/`.

## Obiettivi e fuori ambito

- Obiettivo: contenuti pubblici scopribili e indicizzati in modo coerente (metadati, segnali leggibili dalle macchine,
  canonicalizzazione), senza esporre le aree private.
- Fuori ambito: sostituire il CMS o il rendering dei temi; conoscere i modelli dei moduli consumatori (la sitemap si
  alimenta per contratto, vedi [architecture.md](./architecture.md)).

## Fatto

### Snapshot legacy: obiettivi 2025
- [ ] All planned features implemented
- [ ] Test coverage > 80%
- [ ] Performance optimized
- [ ] Documentation complete
- [ ] Production ready
- [ ] User satisfaction > 4.5/5

---

**Next Review**: 2025-11-01
**Status**: 🚧 PLANNING
**Confidence Level**: 70%

---

*Questa roadmap è specifica per il modulo Seo e viene aggiornata regolarmente in base ai progressi e alle nuove esigenze.*
---
### Roadmap documentale
# Roadmap (Module Seo)

## Current roadmap

- Overview
- Now
- Next
- Later
- Risks and dependencies

## Legacy / existing roadmap docs

- [phpstan-roadmap.md](phpstan-roadmap.md)
- [roadmap/00-index.md](roadmap/00-index.md)
- roadmap/00-overview.md
- [roadmap/01-current-state.md](roadmap/01-current-state.md)
- roadmap/01-now.md
- [roadmap/02-goals.md](roadmap/02-goals.md)
- roadmap/02-next.md
- roadmap/03-later.md
- [roadmap/03-workstreams.md](roadmap/03-workstreams.md)
- [roadmap/04-milestones.md](roadmap/04-milestones.md)
- roadmap/04-risks.md
- [roadmap/05-risks.md](roadmap/05-risks.md)
- [roadmap/legacy-roadmap.md](roadmap/legacy-roadmap.md)
- [roadmap/legacy/legacy-roadmap-x.md](roadmap/legacy/legacy-roadmap-x.md)
- [roadmap/phases.md](roadmap/phases.md)
- [roadmap/quality.md](roadmap/quality.md)
- [roadmap/vision.md](roadmap/vision.md)
- [seo-optimization-roadmap.md](seo-optimization-roadmap.md)
# Roadmap Modulo Seo

**Versione**: 2025.10
**Status**: 🚧 IN CORSO (80%)
**Priorità**: HIGH
**Allineamento**: Laravel 11.x/12-ready · Filament 4.x compatibile · PHPStan Level 9 (0 errori)

## 📊 Progress Overview
| Categoria | Progresso | Note |
|-----------|-----------|------|
| Core Features | 85% | Base solida |
| Performance | 80% | Ottimizzato |
| Documentation | 70% | Da aggiornare |
| Test Coverage | 75% | Buona copertura |
| Security | 85% | Standard elevati |
| Code Quality | 80% | Analisi PHPStan in corso |

## Stato Attuale
- **Versione**: 2025.10
- **Stato Implementazione**: 80%
- **Priorità**: HIGH
- **Dipendenze**: UI, User, Activity
- **Tech Stack**: Laravel 11.x, Filament 4.x, PHPStan Level 9

## Analisi PHPStan
- [Livello 1](phpstan/level_1.md) _(target mancante, verificato 2026-10-08)_ - Errori base e struttura
- [Livello 2](phpstan/level_2.md) _(target mancante, verificato 2026-10-08)_ - Tipi di base
- [Livello 3](phpstan/level_3.md) _(target mancante, verificato 2026-10-08)_ - Tipi più rigorosi
- [Livello 4](phpstan/level_4.md) _(target mancante, verificato 2026-10-08)_ - Tipi di array
- [Livello 5](phpstan/level_5.md) _(target mancante, verificato 2026-10-08)_ - Tipi di oggetti
- [Livello 6](phpstan/level_6.md) _(target mancante, verificato 2026-10-08)_ - Tipi di callback
- [Livello 7](phpstan/level_7.md) _(target mancante, verificato 2026-10-08)_ - Tipi generici
- [Livello 8](phpstan/level_8.md) _(target mancante, verificato 2026-10-08)_ - Tipi union
- [Livello 9](phpstan/level_9.md) _(target mancante, verificato 2026-10-08)_ - Tipi avanzati
- [Livello 10](phpstan/level_10.md) _(target mancante, verificato 2026-10-08)_ - Tipi massimi
- [Livello Max](phpstan/level_max.md) _(target mancante, verificato 2026-10-08)_ - Analisi completa

## Task & Progress

### Completato (100%)
- [x] SEO management base
- [x] Meta tags system
- [x] Sitemap generation
- [x] API endpoints
- [x] Basic analytics

### In Progress (50%)
- [ ] Performance optimization
- [ ] Advanced analytics
- [ ] Integration tests
- [ ] API documentation
- [ ] Content analysis
- [ ] Risoluzione errori PHPStan

### Da Fare (0%)
- [ ] AI content optimization
- [ ] Advanced reporting
- [ ] Real-time monitoring
- [ ] Competitor analysis
- [ ] Training system

## Analisi di Sistema

### Performance
- [Analisi Performance](roadmap/performance.md) _(target mancante, verificato 2026-10-08)_
  - Page analysis
  - Sitemap generation
  - Analytics processing
  - Cache strategy

### Design e UX
- [Design System](roadmap/design_ux.md) _(target mancante, verificato 2026-10-08)_
  - SEO Manager
  - Analytics Dashboard
  - Content Analyzer
  - Report Generator

### Sicurezza
- [Analisi Sicurezza](roadmap/sicurezza.md) _(target mancante, verificato 2026-10-08)_
  - Data Protection
  - Access Control
  - Analytics Security
  - System Security

## Metriche di Successo

### Performance
- Analysis Time < 1s
- Sitemap Gen < 5s
- Analytics Process < 2s
- Cache Hit Rate > 95%

### Qualità
- Test Coverage > 85%
- Zero Critical Bugs
- Documentation Complete
- Code Quality High
- PHPStan Level 10 Passed

### Business
- SEO Ranking +40%
- Traffic Growth +35%
- Conversion Rate +25%
- API Usage +50%

## Piano di Testing

### Unit Testing
- SEO Tests
- Analytics Tests
- Sitemap Tests
- Security Tests

### Integration Testing
- API Tests
- UI Tests
- Performance Tests
- Security Tests

### Security Testing
- Data Protection
- Access Control
- Analytics Security
- System Security

## Documentazione

### Tecnica
- [API Reference](roadmap/api_reference.md) _(target mancante, verificato 2026-10-08)_
- [Architecture](roadmap/architecture.md) _(target mancante, verificato 2026-10-08)_
- [Performance Guide](roadmap/performance_guide.md) _(target mancante, verificato 2026-10-08)_
- [Security Guide](roadmap/security_guide.md) _(target mancante, verificato 2026-10-08)_
- [PHPStan Analysis](phpstan/) _(target mancante, verificato 2026-10-08)_

### Utente
- [SEO Guide](roadmap/seo_guide.md) _(target mancante, verificato 2026-10-08)_
- [Admin Guide](roadmap/admin_guide.md) _(target mancante, verificato 2026-10-08)_
- [Best Practices](roadmap/best_practices.md) _(target mancante, verificato 2026-10-08)_
- [Troubleshooting](roadmap/troubleshooting.md) _(target mancante, verificato 2026-10-08)_

## Next Steps

### Immediati
1. [ ] Optimize Performance
2. [ ] Complete Analytics
3. [ ] Add Content Analysis
4. [ ] Risolvere errori PHPStan

### A Medio Termine
1. [ ] Implement AI Optimization
2. [ ] Improve API Docs
3. [ ] Enhance Security
4. [ ] Migliorare tipizzazione

### A Lungo Termine
1. [ ] Real-time Monitoring
2. [ ] Competitor Analysis
3. [ ] Training System
4. [ ] Raggiungere livello max PHPStan

## Analisi Statica del Codice (PHPStan)

L'analisi statica del codice è stata effettuata utilizzando PHPStan a diversi livelli di rigore.
I risultati completi sono disponibili nella cartella [docs/phpstan](phpstan/) _(target mancante, verificato 2026-10-08)_.

### Stato Attuale

| Livello | Stato | Errori | Azioni Richieste |
|---------|-------|--------|------------------|
| Livello 1 | ⚠️ Non analizzato | - | Eseguire analisi |
| Livello 2 | ⚠️ Non analizzato | - | Eseguire analisi |
| Livello 3 | ⚠️ Non analizzato | - | Eseguire analisi |
| Livello 4 | ⚠️ Non analizzato | - | Eseguire analisi |
| Livello 5 | ⚠️ Non analizzato | - | Eseguire analisi |
| Livello 6 | ⚠️ Non analizzato | - | Eseguire analisi |
| Livello 7 | ⚠️ Non analizzato | - | Eseguire analisi |
| Livello 8 | ⚠️ Non analizzato | - | Eseguire analisi |
| Livello 9 | ⚠️ Non analizzato | - | Eseguire analisi |
| Livello 10 | ⚠️ Non analizzato | - | Eseguire analisi |
| Livello max | ⚠️ Non analizzato | - | Eseguire analisi |

### Obiettivi di Qualità

Secondo le "Regole Windsurf per base_predict_fila5_mono", gli obiettivi per l'analisi PHPStan sono:

- Iniziare dal livello 1 per i nuovi moduli
- Assicurarsi che tutto il codice passi almeno il livello 5
- Mirare al livello 9 come obiettivo finale per tutto il codice
- Documentare i problemi non risolvibili con annotazioni @phpstan-ignore

### Piano d'Azione

1. Risolvere gli errori partendo dal livello più basso
2. Prioritizzare gli errori più critici e ripetitivi
3. Aggiornare la documentazione del codice con annotazioni PHPDoc complete
4. Implementare test unitari per verificare il comportamento corretto
5. Eseguire regolarmente l'analisi PHPStan durante lo sviluppo

---
### Capacità implementate
- `sitemap.xml` multi-lingua con hreflang e `<lastmod>`, alimentata dalle pagine CMS e dai moduli che si registrano col tag
  `SitemapPathsContract::TAG`.
- `robots.txt` dinamico con aree riservate chiuse in ogni lingua e `Sitemap:` assoluta; comando `seo:robots`.
- Redirect canonico 301 (lingua minuscola, niente doppio slash, alias di pagina configurabili per tenant).
- IndexNow: file di verifica della chiave e invio delle URL nuove (`seo:indexnow`).
- Metatag per richiesta (facade `Metatag`), componente `seo::components.head` con Open Graph, Twitter Card e JSON-LD
  `WebSite`.
- Condivisione social (Action, componente Blade, widget Filament).
- PHPStan livello max a 0 errori, suite Pest del modulo.

## Pianificato, non implementato

| Tema | Note |
|------|------|
| JSON-LD per le pagine di dettaglio (Event, EventSeries, Place, Organization, Person, Breadcrumb, FAQ) | Seo assembla il grafo e lo inietta nella pagina; i dati vengono dai moduli proprietari (eventi, luoghi) tramite un contratto/DTO, non da Seo. Vincoli di modellazione: con `eventSchedule` non emettere anche `startDate`/`endDate` sullo stesso `Event`; usare `attendee`, non `attendees` (superseded). Validare con il Rich Results Test di Google e con validator.schema.org. |
| Analytics e monitoraggio dello stato SEO delle pagine | integrazione con strumenti esterni; nessun codice oggi |
| Suggerimenti di ottimizzazione e punteggio SEO | idea futura (anche assistita da AI); nessun codice oggi |
| Core Web Vitals, report periodici, analisi dei concorrenti | idee future, nessun codice oggi |
| Policy e test sui formati dei metatag, caching dei metatag frequenti | lacune note dell'adapter |
| Sitemap index per volumi molto grandi | la sitemap attuale e' un unico file |

Le idee pianificate non sono impegni: prima di iniziarne una va scritta la story nel modulo (`docs/stories/`).
