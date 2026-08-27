<<<<<<< .merge_file_rjV8Jd
# Base Fixcity Fila5 — PROJECT.md
=======
<<<<<<< .merge_file_x7Zstd
# Base Fixcity Fila5 — PROJECT.md
=======
>>>>>>> .merge_file_Kjhv7N
# Base App Fila5 — PROJECT.md
>>>>>>> .merge_file_kQGXG3

## Context
Laravel + Filament v5 modular monolith (Laraxot architecture).
Theme: Sixteen (Bootstrap Italia → Tailwind parity).
Frontend wizard: Ticket creation wizard via `CreateTicketWizardWidget` (Filament v5 Schemas).

## Current Milestone
<<<<<<< .merge_file_rjV8Jd
**M0: Fixcity Ticket Wizard — Visual & HTML Parity** ✅ DONE
=======
<<<<<<< .merge_file_x7Zstd
**M0: Fixcity Ticket Wizard — Visual & HTML Parity** ✅ DONE
=======
>>>>>>> .merge_file_Kjhv7N
**M0: App Ticket Wizard — Visual & HTML Parity** ✅ DONE
>>>>>>> .merge_file_kQGXG3

Target: `segnalazione-crea` wizard page → 90%+ parity with Design Comuni `segnalazione-02-dati.html`

### Phase Results
- **Phase 1**: Filament Schemas correction ✅
  - Replaced non-existent `Text::make()` with `Placeholder` (HTML) + `TextEntry` (data)
  - Verified: `Filament\Schemas\Components\Text` does NOT exist
- **Phase 2**: Filament CSS Visual Parity ✅
  - Created `filament-wizard-parity.css` with scoped overrides
  - Added `app-test.css` as Vite entry point (841KB build)
  - Added Filament `.fi-*` classes to Tailwind safelist
  - Updated `test.blade.php` to use `app-test.css`
- **Phase 3**: Bootstrap Italia section structure ✅
  - 3 sections: Luogo, Disservizio, Autore
  - Grid 3-col for author data (name, fiscal code, phone)
  - TextEntry with icons for read-only author info
- **Phase 4**: Responsive parity — pending
- **Phase 5**: Multilingual verification — IT/EN translations verified

## Rules
- Filament Schemas = unified system (v5). Forms + Infolists coexist.
- Widget → NO model binding (`getFormModel() → null`)
- CSS scoped overrides → never mutate Filament markup
<<<<<<< .merge_file_rjV8Jd
- Multilingual: all strings via `__('fixcity::ticket.*')`
=======
<<<<<<< .merge_file_x7Zstd
- Multilingual: all strings via `__('fixcity::ticket.*')`
=======
>>>>>>> .merge_file_Kjhv7N
- Multilingual: all strings via `__('laraxot::ticket.*')`
>>>>>>> .merge_file_kQGXG3
