# FixCity Modules — Navigation Map

Quick reference for finding what you need.

---

## 🎯 By Role

### Backend Engineer
1. **Start here**: [Xot PHILOSOPHY](../laravel/Modules/Xot/docs/PHILOSOPHY.md) — foundation, base classes, patterns
2. **Then**: [User PHILOSOPHY](../laravel/Modules/User/docs/PHILOSOPHY.md) — auth, 50 models, STI pattern
3. **Domain**: [TechPlanner PHILOSOPHY](../laravel/Modules/TechPlanner/docs/PHILOSOPHY.md) — DDD, 15 models
4. **Cross-cutting**: [Notify](../laravel/Modules/Notify/docs/PHILOSOPHY.md), [Activity](../laravel/Modules/Activity/docs/PHILOSOPHY.md), [Job](../laravel/Modules/Job/docs/PHILOSOPHY.md)

### Frontend Engineer
1. **Start here**: [UI PHILOSOPHY](../laravel/Modules/UI/docs/PHILOSOPHY.md) — design system, Tailwind, components
2. **Then**: [Seo PHILOSOPHY](../laravel/Modules/Seo/docs/PHILOSOPHY.md) — meta tags, OG, structured data
3. **Content**: [Cms PHILOSOPHY](../laravel/Modules/Cms/docs/PHILOSOPHY.md) — headless CMS, blocks
4. **Reference**: [Xot](../laravel/Modules/Xot/docs/PHILOSOPHY.md) for shared patterns

### DevOps/Platform
1. **Start here**: [Tenant PHILOSOPHY](../laravel/Modules/Tenant/docs/PHILOSOPHY.md) — multi-tenancy, isolation
2. **Then**: [Job PHILOSOPHY](../laravel/Modules/Job/docs/PHILOSOPHY.md) — async, queue, workers
3. **Monitoring**: [Activity PHILOSOPHY](../laravel/Modules/Activity/docs/PHILOSOPHY.md) — audit trails
4. **Compliance**: [Gdpr PHILOSOPHY](../laravel/Modules/Gdpr/docs/PHILOSOPHY.md) — privacy, retention

### Security/Compliance
1. **Start here**: [User PHILOSOPHY](../laravel/Modules/User/docs/PHILOSOPHY.md) — auth, STI, roles
2. **Privacy**: [Gdpr PHILOSOPHY](../laravel/Modules/Gdpr/docs/PHILOSOPHY.md) — consent, data handling
3. **Audit**: [Activity PHILOSOPHY](../laravel/Modules/Activity/docs/PHILOSOPHY.md) — immutable logs
4. **Data**: [Tenant PHILOSOPHY](../laravel/Modules/Tenant/docs/PHILOSOPHY.md) — isolation

### Product Manager
1. **Domain**: [TechPlanner PHILOSOPHY](../laravel/Modules/TechPlanner/docs/PHILOSOPHY.md) — core business logic
2. **Logistics**: [Geo PHILOSOPHY](../laravel/Modules/Geo/docs/PHILOSOPHY.md) — mapping, dispatch
3. **Users**: [Employee PHILOSOPHY](../laravel/Modules/Employee/docs/PHILOSOPHY.md) — workforce
4. **Communications**: [Notify PHILOSOPHY](../laravel/Modules/Notify/docs/PHILOSOPHY.md) — multi-channel
5. **Future**: [AI PHILOSOPHY](../laravel/Modules/AI/docs/PHILOSOPHY.md) — intelligence layer

---

## 📚 By Topic

### Architecture & Foundation
- **Base Classes**: [Xot](../laravel/Modules/Xot/docs/PHILOSOPHY.md) (50+ base classes, XotBase pattern)
- **Service Pattern**: [Xot](../laravel/Modules/Xot/docs/PHILOSOPHY.md) (Actions, not Services)
- **Type Safety**: [Xot](../laravel/Modules/Xot/docs/PHILOSOPHY.md) (PHPStan Level 10, strict types)

### Authentication & Authorization
- **Auth**: [User](../laravel/Modules/User/docs/PHILOSOPHY.md) (50 models, Passport, STI)
- **Roles**: [User](../laravel/Modules/User/docs/PHILOSOPHY.md) (Spatie permission integration)
- **Teams**: [User](../laravel/Modules/User/docs/PHILOSOPHY.md) (multi-team support)

### Data & Storage
- **Files**: [Media](../laravel/Modules/Media/docs/PHILOSOPHY.md) (49 actions, S3, conversions)
- **Database**: [Xot](../laravel/Modules/Xot/docs/PHILOSOPHY.md) (migrations, factories, models)
- **Multi-tenancy**: [Tenant](../laravel/Modules/Tenant/docs/PHILOSOPHY.md) (separate DB per tenant)

### Geography & Mapping
- **Coordinates**: [Geo](../laravel/Modules/Geo/docs/PHILOSOPHY.md) (71 actions, polymorph addresses)
- **Dispatch**: [Geo](../laravel/Modules/Geo/docs/PHILOSOPHY.md) (distance, routing prep)

### Business Logic
- **Core Domain**: [TechPlanner](../laravel/Modules/TechPlanner/docs/PHILOSOPHY.md) (15 models, DDD)
- **Workforce**: [Employee](../laravel/Modules/Employee/docs/PHILOSOPHY.md) (STI, state machine, timesheets)

### Communications
- **Notifications**: [Notify](../laravel/Modules/Notify/docs/PHILOSOPHY.md) (46 actions, async, multi-channel)
- **Email/SMS**: [Notify](../laravel/Modules/Notify/docs/PHILOSOPHY.md) (queueable, fallback, preferences)

### Content & SEO
- **Pages**: [Cms](../laravel/Modules/Cms/docs/PHILOSOPHY.md) (headless, blocks, translations)
- **Meta Tags**: [Seo](../laravel/Modules/Seo/docs/PHILOSOPHY.md) (adapter pattern, request-scoped)
- **UI**: [UI](../laravel/Modules/UI/docs/PHILOSOPHY.md) (components, Tailwind, Filament)

### Async & Scheduling
- **Jobs**: [Job](../laravel/Modules/Job/docs/PHILOSOPHY.md) (19 models, layered dispatch)
- **Notifications**: [Notify](../laravel/Modules/Notify/docs/PHILOSOPHY.md) (queueable async)

### Compliance & Privacy
- **GDPR**: [Gdpr](../laravel/Modules/Gdpr/docs/PHILOSOPHY.md) (5 commandments, consent, encryption)
- **Audit Trails**: [Activity](../laravel/Modules/Activity/docs/PHILOSOPHY.md) (immutable, 7-year retention)

### Localization
- **i18n**: [Lang](../laravel/Modules/Lang/docs/PHILOSOPHY.md) (3 languages, PHP files, Filament auto-labels)

### AI & Intelligence
- **LLM Integration**: [AI](../laravel/Modules/AI/docs/PHILOSOPHY.md) (32 actions, token budgets, fallbacks)

---

## 🔄 By Dependency

### Level 0 (Foundation — no dependencies)
- **Xot**: Everything extends from here

### Level 1 (Depends on Xot)
- **User**: Authentication, identity
- **Lang**: Internationalization
- **Gdpr**: Privacy layer
- **Tenant**: Multi-tenancy
- **Seo**: Meta tags (request-scoped)

### Level 2 (Depends on Level 0-1)
- **Geo**: Maps, addresses (depends on Xot, Tenant)
- **Media**: Files (depends on Xot, User)
- **Activity**: Audit logging (depends on Xot, User, Tenant)
- **UI**: Components (depends on Xot)
- **Cms**: Content (depends on Xot, Lang, Seo)
- **Employee**: Workforce (depends on User, Activity)
- **Job**: Async (depends on Xot, Activity)

### Level 3 (Domain — depends on everything)
- **TechPlanner**: Core business logic (depends on Geo, Notify, Employee, Media, Activity)
- **AI**: Intelligence (depends on TechPlanner, Notify, User)

### Level 4 (Cross-cutting — every level)
- **Notify**: Communications (used by all, especially TechPlanner, Employee, Activity)

---

## 🚀 Learning Path

1. **Day 1**: Read Xot + User → understand foundation + auth
2. **Day 2**: Read Geo + TechPlanner → understand domain + logistics
3. **Day 3**: Read Notify + Activity + Job → understand async + logging
4. **Day 4**: Read Tenant + Gdpr → understand isolation + compliance
5. **Day 5**: Read specific domain (Media, Cms, Employee, AI, etc.)

**Pro tip**: Skim RELIGIONE + ZEN sections first (fast, essence), then deep-dive FILOSOFIA + POLITICA (why designed this way).

---

## 📋 Quick Lookup

**"How do I...?"**

- ...create a model? → [Xot](../laravel/Modules/Xot/docs/PHILOSOPHY.md) (base classes)
- ...handle authentication? → [User](../laravel/Modules/User/docs/PHILOSOPHY.md)
- ...send a notification? → [Notify](../laravel/Modules/Notify/docs/PHILOSOPHY.md)
- ...store a file? → [Media](../laravel/Modules/Media/docs/PHILOSOPHY.md)
- ...add a domain entity? → [TechPlanner](../laravel/Modules/TechPlanner/docs/PHILOSOPHY.md)
- ...track something for audit? → [Activity](../laravel/Modules/Activity/docs/PHILOSOPHY.md)
- ...handle GDPR request? → [Gdpr](../laravel/Modules/Gdpr/docs/PHILOSOPHY.md)
- ...add a page? → [Cms](../laravel/Modules/Cms/docs/PHILOSOPHY.md)
- ...optimize for SEO? → [Seo](../laravel/Modules/Seo/docs/PHILOSOPHY.md)
- ...create UI component? → [UI](../laravel/Modules/UI/docs/PHILOSOPHY.md)
- ...queue async work? → [Job](../laravel/Modules/Job/docs/PHILOSOPHY.md)
- ...translate content? → [Lang](../laravel/Modules/Lang/docs/PHILOSOPHY.md)
- ...work with geo data? → [Geo](../laravel/Modules/Geo/docs/PHILOSOPHY.md)
- ...manage employees? → [Employee](../laravel/Modules/Employee/docs/PHILOSOPHY.md)
- ...use AI? → [AI](../laravel/Modules/AI/docs/PHILOSOPHY.md)

---

## 📊 Master Summary

See [MASTER_PHILOSOPHY.md](./MASTER_PHILOSOPHY.md) for:
- Architectural patterns synthesis
- Cross-module best practices
- Dependency matrix
- Technology roadmap
- Coverage landscape

---

## 📖 All Modules

| Module | Role | LOC | Models | Actions | Docs |
|--------|------|-----|--------|---------|------|
| Xot | Foundation | 42.7K | 45 | 220 | [→](../laravel/Modules/Xot/docs/PHILOSOPHY.md) |
| User | Auth | 38.6K | 104 | 57 | [→](../laravel/Modules/User/docs/PHILOSOPHY.md) |
| Geo | Mapping | 18.2K | 34 | 71 | [→](../laravel/Modules/Geo/docs/PHILOSOPHY.md) |
| Notify | Comms | 16.8K | 29 | 46 | [→](../laravel/Modules/Notify/docs/PHILOSOPHY.md) |
| Media | Files | 8.8K | 8 | 49 | [→](../laravel/Modules/Media/docs/PHILOSOPHY.md) |
| Job | Async | 8.5K | 34 | 15 | [→](../laravel/Modules/Job/docs/PHILOSOPHY.md) |
| Cms | Content | 8.3K | 21 | 10 | [→](../laravel/Modules/Cms/docs/PHILOSOPHY.md) |
| Employee | Workforce | 7.4K | 10 | 10 | [→](../laravel/Modules/Employee/docs/PHILOSOPHY.md) |
| UI | Design | 6.3K | 5 | 6 | [→](../laravel/Modules/UI/docs/PHILOSOPHY.md) |
| TechPlanner | Domain | 5.7K | 15 | 1 | [→](../laravel/Modules/TechPlanner/docs/PHILOSOPHY.md) |
| Lang | i18n | 4.6K | 14 | 14 | [→](../laravel/Modules/Lang/docs/PHILOSOPHY.md) |
| AI | Intelligence | 4.4K | 4 | 32 | [→](../laravel/Modules/AI/docs/PHILOSOPHY.md) |
| Tenant | Multi-tenant | 3.6K | 15 | 15 | [→](../laravel/Modules/Tenant/docs/PHILOSOPHY.md) |
| Activity | Audit | 3.5K | 10 | 18 | [→](../laravel/Modules/Activity/docs/PHILOSOPHY.md) |
| Gdpr | Privacy | 3.4K | 13 | 7 | [→](../laravel/Modules/Gdpr/docs/PHILOSOPHY.md) |
| Seo | SEO | 1.6K | 0 | 4 | [→](../laravel/Modules/Seo/docs/PHILOSOPHY.md) |

---

**Last updated**: 2026-09-06  
**Master Index**: [INDEX.md](../laravel/Modules/INDEX.md)  
**Master Philosophy**: [MASTER_PHILOSOPHY.md](./MASTER_PHILOSOPHY.md)
