---
title: "Audit qualità modulo Gdpr — nomi docs, duplicati, tipi, test"
type: story
module: Gdpr
status: review
created: 2026-11-19
updated: 2026-11-19
issues: ["https://github.com/laraxot/base_techplanner_fila5/issues/64"]
discussions: []
tags: [audit, qualita, docs, phpstan, bmad]
---

# Story: audit qualità modulo Gdpr

## Contesto

Audit parallelo dei moduli (issue #64). Ambito: `laravel/Modules/Gdpr`.
Ingresso documentazione: [../README.md](../README.md) · indice completo: [../index.md](../index.md).

## Baseline

| Controllo | Prima | Dopo |
|-----------|-------|------|
| PHPStan `Modules/Gdpr` (livello max) | 0 errori | 0 errori |
| Pest `Modules/Gdpr/tests` | suite **non eseguibile** (`Pest\Exceptions\TestCaseAlreadyInUse`) | 169 passati, 77 falliti, 10 skipped, 3 risky |
| `mixed` in `app/` | 14 | 8 |
| File `.md` in `docs/` | 415 | ~350 |

## Cosa è stato fatto

### Documentazione

- **Date nei nomi**: rimosse da tutti i file. Story `2026-10-1x-dcp-*.story.md`, `2026-10-06-phpstan-cleanup-gdpr.*`,
  `continuation-2026-09-11.story.md` rinominate senza prefisso/suffisso data (data in `created:`).
  `register-page-design-research-2026.md`, `redundancy-audit-2026-05-21.md`,
  `wiki/troubleshooting/git-merge-conflict-inventory-2026-04-28.md`, `roadmap/2025-q4-roadmap.md` (e il residuo
  `roadmap/-q4-roadmap.md`) unificati sul nome senza data. Residui di rinomine precedenti con trattino finale
  (`dry-kiss-analysis-.md`, `phpstan-fixes-.md`, `register-widget-fix-.md`, `register-page-design-research-.md`)
  uniti nel nome pulito: il contenuto unico della variante è stato accodato sotto "Contenuto unito da …".
- **Duplicati esatti** (stesso corpo a meno del frontmatter) rimossi, tenendo la copia meglio posizionata/più linkata:
  copie in `raw/root-import/` e `root-md-files/`, coppie `snake_case`/`kebab-case`, copie in `analysis/`, `agents/`,
  `consent/`, `merge-conflicts/`, `architecture/`, varianti `-1.md`, `roadmap/0N-*.md` identici ai non numerati.
- **Indici**: rimossi `INDEX.md` (stub vuoto), `00-INDEX.md` (copia di `00-index.md`), `readme.md` (unito in
  `README.md`) e gli `INDEX.md` maiuscoli in `wiki/{commands,rules,skills,memories}/` identici agli `index.md`:
  su filesystem case-insensitive collidevano. `README.md` riscritto come mappa delle aree.
- Link interni al modulo aggiornati (frontmatter `related:`, link markdown, `story:`).

### Codice

- `tests/Unit/Providers/CookieConsentWiringTest.php`: tolto `uses(TestCase::class)`. Il commento sosteneva che il
  `Pest.php` del modulo non venisse caricato, ma `laravel/tests/Pest.php` lo include: il doppio binding bloccava
  **tutta** la suite del modulo.
- `database/factories/ConsentFactory.php`: la factory scriveva colonne inesistenti (`subject_type`, `consent_type`,
  `accepted`) → `QueryException` in 5 test. Ora usa `type` e `accepted_at`, come lo schema.
- `lang/it/register.php`: aggiunte `consents.privacy_checkbox_html` / `terms_checkbox_html` (presenti in en/de/es/fr/ru),
  corretto `art. 6(1](b]` → `art. 6(1)(b)`.
- `app/Filament/Widgets/Auth/GdprConsentForm.php` **rimosso**: copia morta e più debole di `RegisterWidget`
  (nessun rate limit, password senza `Password::defaults()`), mai montata (grep su tutto `laravel/`), già segnalata
  in `Themes/Sixteen/docs/compliance/03-front-office-scheda-per-pagina.md`.
- `RegisterWidget`: `CollectGdprConsentsAction` chiamata una volta sola invece di tre; `logRegistrationAttempt(string,
  array<string,bool>)` al posto di `array<string,mixed>` + cast; rimosso override `getFormSchema()` identico al parent;
  `rules()` tipizzato `array<string, list<string|Password>|string>`.
- `ValidateUserDataAction`: ritorno con array shape esatta. Ha fatto emergere un test stantio
  (`RegistrationTest` leggeva `state`, che l'action non restituisce): asserzioni corrette.
- `HasGdpr::giveConsent()`: PHPDoc `@param` duplicato rimosso.

## Cosa resta

- **Test falliti (77)**: in gran parte ambientali/ereditati da Fixcity — pagine register che cercano testi del tema
  ("Create Your FREE Account"), colonna `users.name` obbligatoria nel DB di test, `PublicPropertyNotFound $data` su
  `RegisterWidget` (test scritti per un form Filament con `statePath('data')`). Alcuni (`UniqueConstraintViolation`
  su `treatments.name`) dipendono da dati residui nel DB condiviso fra run paralleli.
- Coppie `snake_case`/`kebab-case` con contenuto **diverso** (`algolia_docsearch.md`/`algolia-docsearch.md`,
  `cookie_consent.md`/`cookie-consent.md`, …) e `roadmap/0N-*.md` vs non numerati diversi: da consolidare a mano.
- Link esterni al modulo non modificati (fuori ambito): `Modules/Xot/docs/standards/README.md` punta a
  `Gdpr/docs/readme.md` (ora `README.md`).
- `InjectCookieBanner::handle(mixed, …): mixed` resta `mixed`: la firma del parent `CookieConsentMiddleware` è non tipizzata.
