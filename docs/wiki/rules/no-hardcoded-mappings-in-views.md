---
title: "No Hardcoded Mappings in Views — Anti-Pattern Rule"
type: rule
sources: ["session-2026-05-21"]
confidence: high
created: 2026-05-21
updated: 2026-05-21
tags: [anti-pattern, hardcoded, views, volt, folio, routing, wizard, DRY, separation-of-concerns]
related:
  - rules/quality-gate-after-edit.md
  - rules/file-lock-workflow.md
  - concepts/second-brain-usage-gaps-and-improvements.md
---

# No Hardcoded Mappings in Views — Anti-Pattern Rule

**REGOLA**: MAI inserire mapping hardcoded, costanti di business logic, o configurazioni di routing all'interno di file view (Blade, Volt, Folio route files).

## Caso Fixcity: `tests/[slug].blade.php`

Il file `laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php` deve restare una **shell generica CMS-driven**:

1. riceve lo slug dalla route Folio;
2. costruisce `tests.{slug}`;
3. carica `Page::getBlocksBySlug($pageSlug, 'content')`;
4. include le view dichiarate dai blocchi CMS.

Non deve importare `LaravelLocalization`, non deve chiamare `redirect()`, non deve contenere costanti tipo `LEGACY_WIZARD_STEP_SLUGS`, non deve conoscere gli step Filament del wizard `segnalazione-crea`.

Nel repo esistono gia' metadati CMS come `_legacy_slug` e `_legacy_redirect_step` dentro i JSON `tests.segnalazione-01-privacy`, `tests.segnalazione-02-dati`, `tests.segnalazione-03-riepilogo`: duplicarli in Blade produce drift. Se serve compatibilita' legacy, va gestita da dati CMS/config/middleware/service dedicato o dal widget che riceve `blockData`, mai dal renderer dinamico generico.

## Esempio di Merda (VIETATO)

```php
// ❌ SBAGLIATO — In un file Volt/Folio route ([slug].blade.php)
new class extends Component {
    private const LEGACY_WIZARD_STEP_SLUGS = [
        'segnalazione-01-privacy' => 1,
        'segnalazione-02-dati' => 2,
        'segnalazione-03-riepilogo' => 3,
    ];

    public function mount(string $slug = ''): void
    {
        if (isset(self::LEGACY_WIZARD_STEP_SLUGS[$slug])) {
            $step = self::LEGACY_WIZARD_STEP_SLUGS[$slug];
            // redirect logic...
        }
    }
};
```

## Perche e' Merda

1. **Separazione delle responsabilita violata**: Il view renderer non deve conoscere mapping di business logic
2. **Accoppiamento forte**: Il route file e' accoppiato a slugs specifici del wizard
3. **Non estensibile**: Nuovo step wizard → modificare questo file (violazione Open/Closed)
4. **Violazione DRY**: Lo stesso mapping esiste probabilmente nel widget, config, ecc. → drift garantito
5. **Magic strings**: Slug hardcoded senza source of truth validata
6. **Debito tecnico**: Commentato come "legacy" ma ancora attivo → va risolto, non lasciato

## Dove Dovrebbe Vivere

| Tipo di Mapping | Dove |
|----------------|------|
| Wizard step slugs | Widget/config/CMS block data, non view |
| Route redirects | Middleware dedicato o service |
| Slug mappings | Config file (`config/fixcity/wizard.php`) |
| Legacy redirects | CMS/config/middleware dedicato; non `pages/tests/[slug].blade.php` |

## Pattern Corretto

```php
// ✅ CORRETTO — Config file (config/fixcity/wizard.php)
return [
    'legacy_redirects' => [
        'segnalazione-01-privacy' => 1,
        'segnalazione-02-dati' => 2,
        'segnalazione-03-riepilogo' => 3,
    ],
];

// ✅ CORRETTO — Middleware dedicato
class LegacyWizardRedirectMiddleware
{
    public function handle($request, Closure $next)
    {
        $slugs = config('fixcity.wizard.legacy_redirects', []);
        $slug = $request->route('slug');

        if (isset($slugs[$slug])) {
            return redirect()->route('tests.view', [
                'slug' => 'segnalazione-crea',
                'step' => $slugs[$slug],
            ]);
        }

        return $next($request);
    }
}

// ✅ CORRETTO — Volt file pulito, solo rendering
new class extends Component {
    public string $slug = '';
    public array $blocks = [];

    public function mount(string $slug = ''): void
    {
        $this->slug = $slug;
        $this->blocks = Page::getBlocksBySlug('tests.'.$slug, 'content');
    }
};
```

## Anti-Pattern (VIETATO)

- ❌ Costanti di business logic in file view
- ❌ Mapping hardcoded in Volt/Folio route files
- ❌ Logica di redirect in componenti di rendering
- ❌ Magic strings senza source of truth
- ❌ Commentare come "legacy" senza risolvere
- ❌ Usare il renderer CMS per tradurre slug legacy in step Filament

## Best Practices

- ✅ Mapping in config file o service dedicato
- ✅ Redirect in middleware dedicato
- ✅ View file solo per rendering (single responsibility)
- ✅ Derivare mapping da configurazione wizard, non hardcoded
- ✅ Se i metadati legacy sono gia' nel JSON CMS, consumarli nel layer applicativo corretto
- ✅ Risolvere debito tecnico, non lasciarlo

---

*Creato: 2026-05-21 — Analisi `LEGACY_WIZARD_STEP_SLUGS` in [slug].blade.php*
