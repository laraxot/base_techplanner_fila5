# FixCity — Master Philosophy

> Synthesis of 16 module philosophies into unified architectural vision

---

## 🏛️ The Ten Commandments of FixCity

From reading all 16 module PHILOSOPHY.md files, 10 universal truths emerge:

### 1. **Actions Over Services**

**Observation**: 620+ Actions across all modules. Zero Service classes.

**Why**: Actions are explicit, testable, composable, queueable. Services hide complexity. The system treats business logic as immutable, single-purpose operations that can be:
- Dispatched immediately or queued
- Tested in isolation
- Traced through audit trails
- Reused without side effects

**Modules**: Xot (220 actions), Geo (71), Notify (46), Media (49), User (57), AI (32), Job (15), Lang (14), Employee (10), Cms (10), Activity (18), Tenant (15)...

**Anti-Pattern**: Service classes tempt god-object design. They hide intent. FixCity forbids them.

---

### 2. **Composition Over Inheritance**

**Observation**: Every module extends Xot base classes, then specializes through traits.

**Why**: Single Table Inheritance (User → Employee, Doctor, etc.) is the only exception. It's validated, intentional, and rare.

Inheritance creates rigid hierarchies. Composition (traits + dependency injection) creates flexible combinations.

**Example**:
```php
// ✅ XotBaseModel extends, then...
class Employee extends User {
    use HasWorkHours, HasDocuments, HasApprovals;
}

// ❌ Never deep inheritance chains
class SpecializedTechnicianWithPermissions extends TechnicianWithApprovals extends Technician...
```

---

### 3. **State Machines Are Sacred**

**Observation**: Employee (ACTIVE ↔ INACTIVE ↔ ON_LEAVE → TERMINATED), Job (dispatch → reserved → executing), Geo (normalizing → verified), Appointment (pending → scheduled → completed).

**Why**: Business rules are about transitions, not states. State machines force validation at boundaries.

**Consequence**: Direct property modification (`->update(['status' => 'SOMETHING'])`) is forbidden. All changes flow through validated transitions.

---

### 4. **Enums Are Single Sources of Truth**

**Observation**: TechPlanner, Notify, Lang, AI, Employee, Seo all centralize constants in Enum classes.

**Why**: Enums enable:
- Automatic translation (Lang module)
- Type safety (PHPStan autocomplete)
- Exhaustiveness checking (match expressions catch missing cases)
- Database consistency (can't typo a status)

**Consequence**: Hardcoded strings (`'ACTIVE'`, `'pending'`, `'email'`) are red flags.

---

### 5. **Audit Trails Are Immutable Historical Records**

**Observation**: Activity module (7-year retention for healthcare), Employee (status history), User (login tracking), Xot (Updater trait on every model).

**Why**: Legal defense. Regulatory compliance. Debugging. Historical analysis.

**Consequence**: Never hard-delete. Soft-delete + retention policies. Log everything critical.

---

### 6. **Async Is Default, Not Exception**

**Observation**: Job (19 models for task processing), Notify (46 actions queued), Media (file conversions queued), Activity (event-driven queueing).

**Why**: User requests must return fast. Heavy work (sending 100K notifications, transcoding video, geocoding batches) happens later.

**Consequence**: Every action implements `QueueableAction` or explicitly declares why it's synchronous.

---

### 7. **Type Safety Is Relentless**

**Observation**: PHPStan Level 10 target everywhere. `declare(strict_types=1)` on all new code. Eloquent relationships have generics: `BelongsToMany<TModel, $this>`.

**Why**: Catches bugs at static analysis time, not production. Enables IDE autocomplete.

**Consequence**: No `any` types. No untyped parameters. Larastan screams = code is broken.

---

### 8. **Data Isolation Is Structural, Not Procedural**

**Observation**: Tenant module separates databases per tenant. User module uses STI with owned relationships. Activity tracks causer context.

**Why**: Procedural isolation (code review, discipline) fails. Structural isolation (database boundaries, query scopes) holds.

**Consequence**: Tenant context is immutable per request. A query that leaks tenant boundaries is a critical bug.

---

### 9. **Configuration Is Minimized; Defaults Are Safe**

**Observation**: AI defaults to low token budgets (128–256 per action). Seo defaults to noindex until explicitly published. Notify defaults to async-only.

**Why**: Misconfiguration is the primary production risk. Safe defaults prevent catastrophic failures.

**Consequence**: `config()` values are typed, validated, documented. No string-based toggles.

---

### 10. **Immutability Is Beautiful**

**Observation**: Seo metadata is request-scoped (computed fresh each time, not persisted). Activity records never update (append-only log). Gdpr treats consent as immutable events.

**Why**: Immutable data = easier reasoning. No "when did this change?" puzzles. No race conditions in updates.

**Consequence**: If data must change, append a new record with timestamp. Never overwrite.

---

## 🗺️ The Dependency Hierarchy

```
Level 0: FOUNDATION (no dependencies)
├─ Xot (50+ base classes, 220 actions, TypeSafe foundation)

Level 1: IDENTITY & GOVERNANCE
├─ User (50 models, STI, Passport, Spatie Roles)
├─ Lang (i18n, 3 languages, PHP file hierarchy)
├─ Gdpr (consent, privacy by design)
├─ Tenant (multi-tenancy, 4 sacred covenants)
└─ Seo (metadata, adapter pattern, no models)

Level 2: INFRASTRUCTURE & SERVICES
├─ Geo (71 actions, addresses, coordinates, mapping)
├─ Media (49 actions, file storage, S3, conversions)
├─ Activity (audit trails, immutable logs, 7-year retention)
├─ UI (components, Tailwind, Filament integration)
├─ Cms (headless, blocks, translations)
└─ Job (19 models, async task queue)

Level 3: DOMAIN & OPERATIONS
├─ TechPlanner (15 models, DDD, Client-centric, Verification-first)
├─ Employee (STI from User, state machine, WorkHour, 3 dogmas)
└─ AI (32 actions, LLM integration, token budgets, no hallucination)

Level 4: CROSS-CUTTING (depended on by all)
└─ Notify (46 actions, multi-channel, async, fallback chains)
```

**Key Insight**: TechPlanner and Notify are the system's nervous system. Everything else is infrastructure or mechanics.

---

## 📊 Coverage Landscape

### Excellent (85%+)
- Xot: 95% (core, battle-tested)
- User: 90% (auth paths solid, edge cases tested)
- Geo: 85% (core distance/address paths)
- Activity: 91% (audit trail exhaustive)

### Good (70-85%)
- TechPlanner: 80% (core flows, gaps in API)
- Notify: 75% (channels mostly tested, fallback edge cases)
- Media: 80% (conversions, edge cases around cleanup)
- Employee: 85% (time tracking core, leave management complete)

### Needs Work (<70%)
- UI: 42% (widget bootstrap issues, need 60%+)
- Job: 38% (failure scenarios missing, need batch/import tests)
- Cms: Low (zero test coverage, spec written, implementation deferred)
- AI: 50% (happy path solid, fallback chain needs expansion)

**Pattern**: Older modules (Xot, User, Geo) have mature tests. Newer modules (Cms, AI) are spec-first, test-later.

**Strategy**: Test coverage debt ~15% across portfolio. Achievable in Q4 2026.

---

## 🏗️ Architectural Patterns Confirmed

### Pattern 1: Adapter/Façade for Cross-Module Communication
- **Seo**: MetatagManager adapter (request-scoped state)
- **Notify**: Channel adapters (each provider is independent)
- **Geo**: Provider adapters (Nominatim, Google, Here)
- **Media**: Disk adapters (local, S3, etc.)

**Pattern**: Public API through façade/manager, internal adapters for variation.

---

### Pattern 2: Enum-Driven Configuration
- **TechPlanner**: CompanyItemEnum, AddressItemEnum (centralized, form-schema auto-generated)
- **Notify**: ChannelEnum, NotificationTypeEnum (drives template selection)
- **Lang**: LanguageEnum (defines supported languages)
- **Employee**: EmployeeStatusEnum, WorkHourTypeEnum (state machine)
- **Seo**: RobotsDirectiveEnum (canonical combinations)

**Pattern**: One enum = form schema + validation + database values + i18n keys.

---

### Pattern 3: Polymorph Relations at Scale
- **Geo**: Address belongs to any model via morph (Ticket, Client, Facility)
- **Activity**: Activity loggable for any model (Ticket, User, Document)
- **Media**: Any model can have attachments via morph

**Pattern**: Single table + model_type/model_id = flexible without schema explosion.

---

### Pattern 4: Immutable Events with Append-Only Logs
- **Activity**: StoredEvent (Spatie event sourcing) + Snapshot strategy
- **Employee**: EmployeeStatusHistory (immutable, one record per transition)
- **Job**: JobResult (success/failure recorded atomically)

**Pattern**: No updates. Only appends. Queries read "latest" or "as of timestamp".

---

### Pattern 5: Multi-Channel with Preferences & Fallbacks
- **Notify**: 6 channels (Email, SMS, Push, Telegram, WhatsApp, In-App) with user preference matrix
- **Employee**: Multi-contact (phone, mobile, email, PEC, WhatsApp)
- **TechPlanner**: Client multi-contact for outreach

**Pattern**: Store all channels. Respect user preference. Fallback chain if preferred fails.

---

## 🎯 The Fixed City Theology

### What FixCity Believes

**1. Identity is layered.**
- User: digital identity (email, password, roles, team)
- Employee: organizational identity (manager, department, hours)
- Profile: personal identity (name, avatar, preferences)

Separation enables: contractors can be User (access) without Employee (no timesheet). Doctors can Employee (shift) without high-level User roles.

**2. Verification proves compliance.**
- In regulated industries, possession is not proof. Verification is.
- TechPlanner's core: "Was this device inspected? By whom? When? With what result?"
- Without audit trail, you have no defense against regulator.

**3. Geography is infrastructure.**
- Coordinates, addresses, proximity queries are not features. They are the nervous system.
- Distance-based routing, map visualization, location-aware notifications require geo as first-class.
- Geo module's 71 actions are justified: every operation on maps is explicit.

**4. Communication is async and multi-channel.**
- Never block request for sending mail/SMS/push. Queue it.
- User may prefer email. If mail server down, try SMS. If SMS quota hit, try in-app. Never fail.
- Notify's 46 actions encode this complexity into manageable units.

**5. Time tracking is a contract.**
- Every clock_in/clock_out is a micro-transaction: "I owe you 8 hours of labor."
- The sequence (CLOCK_IN → CLOCK_OUT → BREAK) is legally binding.
- WorkHour's "next action" enforcement prevents double-bookings and invalid sequences.

**6. Audit trails are irreversible promises.**
- Once logged, immutable (soft-delete only).
- 7-year retention for healthcare (legal minimum).
- Logs are the system's memory. They are sacred.

**7. Privacy is baked in, not bolted on.**
- GDPR module enforces consent + encryption + retention + erasure.
- Consent is sovereign and revocable. Cannot be silently overridden.
- Data minimization: collect only what's necessary.

**8. Simplicity hiding depth.**
- User writes one line: `Ticket::where('location_distance', '<', 5)->get()`
- Under the hood: 71 Geo actions, coordinate math, WGS84 precision, fallback geocoding.
- Complexity is organized, not eliminated.

---

## 🔮 The 2026-2027 Vision

### Phase 1: Foundation (Complete)
- ✅ Xot base classes
- ✅ User auth (Passport)
- ✅ Geo mapping (71 actions)
- ✅ Notify multi-channel
- ✅ TechPlanner core (Client, Device, Appointment)

### Phase 2: Maturity (Q1-Q2 2026)
- Mobile field operations (TechPlanner)
- Predictive maintenance (Geo + Job + AI)
- Advanced reporting (Job + Activity)
- Payroll engine (Employee)
- Draft/published states (Cms)
- Auto-translation (Lang + AI)

### Phase 3: Intelligence (Q3-Q4 2026)
- AI route optimization (Geo + AI)
- Shift management (Employee + Job)
- Performance reviews (Employee)
- Webhook integrations (Notify)
- Fine-tuned models (AI)

### Phase 4: Enterprise (2027 H1)
- Real-time monitoring (Activity + Job + Notify)
- Compliance automation (Gdpr + Activity)
- Distributed workers (Job)
- Multi-tenancy perfected (Tenant)
- Mobile offline-first (TechPlanner)

---

## 📚 Universal Best Practices (Top 20)

1. **Use Actions, never call $service->method()** — Xot pattern
2. **All state changes flow through state machines** — Employee, Job, TechPlanner
3. **Extend XotBaseModel, XotBaseResource, XotBaseServiceProvider** — Xot pattern
4. **Log everything critical (Activity module)** — Immutability = defense
5. **Queue async work by default** — Notify, Media, Job
6. **Validate at system boundaries, trust internal code** — Laravel way
7. **Use Enum for state, type, choice** — Type safety
8. **Never hardcode translations** — Lang module
9. **Eager-load relationships to avoid N+1** — Geo, User queries
10. **Tenant scope all queries automatically** — Tenant middleware
11. **Use Spatie\Translatable for model attributes** — Lang pattern
12. **Implement QueueableAction for heavy lifting** — Async pattern
13. **Encapsulate validation in Form Request** — Laravel convention
14. **Use Filament resources as admin standard** — Xot pattern
15. **Implement soft deletes on important models** — Audit trail
16. **Store created_by/updated_by via Updater trait** — Xot pattern
17. **Use polymorphic relations to avoid schema explosion** — Geo, Activity
18. **Immutable Data objects for API responses** — Type safety
19. **Test behavior, not implementation** — TDD over details
20. **Review false-friends for your domain module** — Gotchas are known

---

## ⚠️ Top 20 False Friends (Gotchas by Risk)

**Critical (will break production)**:
1. **N+1 queries in relationship loops** — Geo, User, Activity all vulnerable
2. **Forgetting tenant scoping** — Data leak risk, Tenant module
3. **Hardcoding strings instead of Enums** — Type confusion, TechPlanner
4. **Synchronous heavy lifting in request** — Timeouts, Notify/Job
5. **Double-booking via concurrent clock_in** — Race condition, Employee

**High (silent failures)**:
6. **Missing audit trail on critical model changes** — Legal exposure, Activity
7. **Ignoring state machine, updating status directly** — Broken invariants, Employee
8. **Caching without tenant context** — Cross-tenant leakage, Tenant
9. **Timezone vs Language confusion** — Wrong audience, Lang
10. **Allowing hallucinations in AI output** — False data to users, AI

**Medium (bugs, not failures)**:
11. **Permission scope leakage** — Wrong user sees data, User
12. **Coordinate precision loss** — Rounding errors, Geo
13. **Missing fallback in multi-channel** — Silent send failure, Notify
14. **Forgetting encryption for PII** — Compliance violation, Gdpr, Media
15. **Database connection affinity in queued jobs** — Session loss, Job

**Low (maintenance debt)**:
16. **Service classes instead of Actions** — Code decay, Xot pattern
17. **Skipping test coverage** — Future regression risk, all modules
18. **Mixing UI logic into models** — Tight coupling, UI
19. **SEO metadata in database rows** — Immutability broken, Seo
20. **Unversioned API payloads** — Breaking clients, TechPlanner API (future)

---

## 🎨 The Zen of FixCity

> A system where every decision serves five masters: simplicity, safety, scale, compliance, and beauty.
> 
> Complexity is organized into small, tested, named pieces (Actions).
> Authority flows through structure (state machines, enums, scopes), not procedure.
> Data is immutable by default, audit trails are historical truth, and tenants are isolated by design.
> Developers see simple APIs hiding well-engineered depth.
> Regulatory auditors see complete, unbroken chains of evidence.
> Users experience multi-channel communication that always reaches them.
> The system is honest: it fails visibly, logs completely, retries intelligently.

---

## 📖 How to Read the Philosophy Files

1. **Start with Xot** (foundation) + **TechPlanner** (domain) — understand architecture + business
2. **Read RELIGIONE + ZEN first** for each module — fast, essence only
3. **Deep-dive FILOSOFIA + POLITICA** when implementing in that domain
4. **Reference FALSE FRIENDS before debugging** — gotchas are documented
5. **Check COME USARLO for code examples** — practical patterns
6. **Review COVERAGE ANALYSIS to know test readiness** — debt visibility

**Time estimate**: 30 min skimming (RELIGIONE + ZEN × 16), 2-3 hours deep-diving (FILOSOFIA + FALSE FRIENDS for 3 modules).

---

**Master Philosophy created 2026-09-06 from 16 module analyses, 30K+ LOC, 8K+ documentation pages.**

*This is the system as it exists. Read it. Believe it. Build with it.*
