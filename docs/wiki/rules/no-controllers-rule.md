---
title: "No Controllers — Folio + Actions + Filament"
type: rule
confidence: high
created: 2026-06-01
updated: 2026-06-01
tags: [controllers, folio, actions, filament, routing, architecture, dogma]
related:
  - ../concepts/folio-api-no-controllers.md
  - ../memories/no-http-controllers-folio-actions.md
  - ../rules/filament-first-rule.md
  - ../rules/git-forward-only.md
---

# No Controllers — Folio + Actions + Filament

## La Regola (Assoluta)

**Non creare `Http\Controllers` nel codice applicativo.**

```
MAI:  laravel/app/Http/Controllers/*.php
MAI:  Modules/{Nome}/app/Http/Controllers/*.php
```

Questo non è uno stile, è una **scelta architetturale** del progetto.
Violare questa regola significa rompere il contratto del framework.

---

## Perché (Filosofia + Architettura + Pratica)

### 1. Separazione delle responsabilità

Laraxot decentralizza per design:

| Concern | Dove vive | Perché |
|---------|-----------|--------|
| **Routing applicativo** | Folio `resources/views/pages/api/` | Vicino alla vista, dichiarativo |
| **Business logic** | `app/Actions/*Action.php` | Riutilizzabile, testabile, invocabile |
| **Admin UI** | Filament Resources/Pages | Backoffice generico |
| **Frontoffice HTML** | Folio + CMS + Blade | Tema neutrale |

Un `Controller` mescola questi tre layer in un punto solo → viola SRP, rende difficile testare, spezza la "dress" del tema.

### 2. Il tema è un vestito

Il tema (`Themes/Sixteen/`) non deve sapere **cosa** sta renderizzando, solo **come**.
Un `TicketController` o `RatingController` nel codice dominio (app/, Modules/*) non rompe il tema, ma:

- Crea un **collante nascosto** tra il tema e la feature
- Rende difficile sostituire il tema con un altro
- Inserisce logica di routing in un punto dove non dovrebbe esistere

### 3. Folio è già il routing

`FolioVoltServiceProvider` monta automaticamente:
- `Modules/*/resources/views/pages/api/` → `/api/*`
- `resources/views/pages/` → `/`

Non serve un `Route::post('/api/ratings', ...)` in `RouteServiceProvider`.
Folio fa già questo lavoro.

### 4. Actions > Controllers

`app/Actions/CreateRatingAction.php`:
- È invocabile direttamente (`app()->make(Action::class)->execute()`)
- È testabile in isolamento (mock DTO, non HTTP)
- È riutilizzabile da Folio, Filament, CLI, Jobs
- Non dipende da `Request` HTTP

Un `RatingController::store()` è accoppiato a HTTP: non puoi chiamarlo da un Action job.

### 5. Velocità di sviluppo

Con Folio:
```blade
<!-- Modules/Rating/resources/views/pages/api/ratings/store.blade.php -->
<?php
use function Laravel\Folio\{middleware, render};
use Modules\Rating\Actions\CreateRatingAction;

middleware(['auth']);
render(function () {
    $validated = validator(request()->all(), [
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:500',
    ])->validate();

    return response()->json(
        app(CreateRatingAction::class)->execute($validated),
        201
    );
});
```

Con Controller:
```php
// 3 file, 2 namespace, 1 facade, 1 service provider
// + dipendenza da Route:: in config/routes/api.php
```

Folio è **meno codice, meno file, meno errori**.

### 6. Storia: RatingController (2026-05-31)

Abbiamo generato `laravel/app/Http/Controllers/RatingController.php`.
Questo file **non è mai dovuto esistere**.

- Autore: agente AI in contesto overflow
- Causa: dev-story ha ricaricato il progetto "da zero" invece di usare il contesto esistente
- Fix: cancellato + documentato in STORY-079 (context overflow) + questa regola

---

## Pattern Canonico (Sempre Usare Questi)

### API JSON
```
Modules/{X}/resources/views/pages/api/{endpoint}.blade.php
+ app/Actions/*Action.php
```

### Frontoffice HTML
```
Folio page → include blade component → component usa dati da Action
```

### Backoffice
```
Filament Resource/Page/Widget
```

### Submit form (POST)
```
Folio con middleware CSRF + validator inline
o
Livewire component dentro Filament se serve stato complesso
```

---

## Checklist Anti-Controller (da eseguire PRIMA di creare qualsiasi Controller)

- [ ] Esiste già un Folio page in `resources/views/pages/api/`?
- [ ] Posso mettere la logica in un'`Action` in `app/Actions/`?
- [ ] Sto usando Filament per il backoffice?
- [ ] Ho senso di colpa nel creare un Controller?
- [ ] Posso delegare a Folio/Azione?

Se una qualsiasi risposta è "no", **fermati e ripensa**.
Torna qui e leggi questa regola di nuovo.

---

## Deroghe (Quasi Inesistenti)

| Caso | Perché si può |
|------|---------------|
| Vendor/package Laravel standard (Passport, Sanctum) | Non sono codice applicativo |
| Controller ereditati da moduli di terze parti (Spatie, etc.) | Non modifichiamo vendor |

**Non conta**:
- "È più veloce fare un Controller"
- "È sempre stato fatto così"
- "Il cliente vuole un endpoint REST"
- "È solo per un test"

Risposta a tutte: **Folio + Action**.

---

## Come Enforzare la Regola

### Per gli agenti AI
1. Leggere questa regola PRIMA di proporre qualsiasi file in `Http/Controllers/`
2. Se la proposta viola la regola, proporre Folio/Action invece
3. Segnalare la violazione come **errore critico** in self-review

### Per gli sviluppatori
1. Code review: ogni PR che tocca `Http/Controllers/` deve avere giustificazione **eccezionale**
2. Pre-commit hook: verificare che nessun file nuovo in `app/Http/Controllers/` appaia senza discussione preventiva
3. Wiki onboarding: aggiungere questa regola in README progetto

---

## Meta-Regola

Questa regola è **non negoziabile**.
Se pensi che il tuo caso sia un'eccezione:
1. Rileggi "Perché" sopra
2. Chiedi al team
3. Solo se nessuno solleva obiezioni, proponi eccezione con motivazione scritta

L'obiettivo non è rendere difficile lo sviluppo.
L'obiettivo è rendere lo sviluppo **coerente, testabile, riutilizzabile e decoupled**.

Un Controller Laravel rompe tutti e quattro questi obiettivi in questo progetto.

---

## Riferimenti Interni

- [No Http Controllers — Folio + Actions](../memories/no-http-controllers-folio-actions.md) — memoria agente
- [API HTTP senza Controller — Folio + Actions](../concepts/folio-api-no-controllers.md) — concetto
- [Clean Volt Route Files Pattern](../concepts/clean-volt-route-files-pattern.md) — pattern alternativo
- [routing-architecture.md](../guidelines/routing-architecture.md) — architettura routing

## Riferimenti Esterni

- Laravel Folio docs: https://laravel.com/docs/folio
- BMAD Method guardrails: `docs/wiki/concepts/bmad-laraxot-implementation-guardrails.md`

---

*Questa regola è un articolo di fede architetturale. Non è soggetta a votazione. È il modo in cui scriviamo codice in questo progetto.*
